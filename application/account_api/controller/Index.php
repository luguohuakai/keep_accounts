<?php
namespace app\account_api\controller;

use app\account\model\Bill;
use app\account\model\UsersGroup;
use app\account_api\interfaces\BillStatistics;
use app\account\model\Month;
use app\account\model\MonthMore;
use app\common\Tools;
use think\Controller;

class Index extends Controller implements BillStatistics
{
    // 上月11日 凌晨
    public $last_month_11;
    // 上上月11日 凌晨
    public $last_last_month_11;
    // 本月10日 深夜
    public $this_month_10;
    // 上月10日 深夜
    public $last_month_10;
    // 上月
    public $last_month;
    // 上上月
    public $last_last_month;

    public function _initialize()
    {
        parent::_initialize();
        // 本年
        $this_year = date('Y');
        // 本月
        $this_month = date('m');
        if($this_month != 1){
            $this->last_month_11 = strtotime($this_year . '-' . ($this_month - 1) . '-11');
            $this->last_month_10 = strtotime($this_year . '-' . ($this_month - 1) . '-10 23:59:59');
            $this->last_month = strtotime($this_year . '-' . ($this_month - 1));
        }else{
            $this->last_month_11 = strtotime(($this_year - 1) . '-12-11');
            $this->last_month_10 = strtotime(($this_year - 1) . '-12-10 23:59:59');
            $this->last_month = strtotime(($this_year - 1) . '-12');
        }
        if($this_month > 2){
            $this->last_last_month_11 = strtotime($this_year . '-' . ($this_month - 2) . '-11');
            $this->last_last_month = strtotime($this_year . '-' . ($this_month - 2));
        }elseif ($this_month == 2){
            $this->last_last_month_11 = strtotime(($this_year - 1) . '-12-11');
            $this->last_last_month = strtotime(($this_year - 1) . '-12');
        }elseif ($this_month == 1){
            $this->last_last_month_11 = strtotime(($this_year - 1) . '-11-11');
            $this->last_last_month = strtotime(($this_year - 1) . '-11');
        }
        $this->this_month_10 = strtotime(date('Y-m')) + 10 * 24 * 60 * 60 - 1;
    }

    public function index()
    {
        return '
        <style>
            .out{height: 100%;justify-content: center;align-items: center;display: flex;}
            .in{line-height: 2.8em;font-family: 黄彦文行书字体,良怀行书,行书,行楷,楷体;font-size: 30px;writing-mode: tb-rl;}
        </style>
        <div class="out">
            <div class="in">
            弃我去者<br>昨日之日不可留<br>
            乱我心者<br>今日之日多烦忧<br>
            长风万里送秋雁<br>对此可以酣高楼<br>
            蓬莱文章建安骨<br>中间小谢又清发<br>
            俱怀逸兴壮思飞<br>欲上青天揽明月<br>
            抽刀断水水更流<br>举杯消愁愁更愁<br>
            人生在世不称意<br>明朝散发弄扁舟<br>
            ——李白
            </div>
        </div>
        ';
    }

    /**
     * 按月份统计
     * 需求:
     * 输入年月 获取当月每天明细
     */
    public function monthlyStatistics(){}

    /**
     * 按年份统计
     * 需求:
     * 输入年 获取当年每月明细
     */
    public function yearlyStatistics(){}

    /**
     * 按月查询总消费
     */
    public function totalConsumptionByMonth(){}

    /**
     * 按时间段查询总消费
     */
    public function totalConsumptionByTime(){}

    /**
     * 自动结算上月11日到本月10日的总消费 每人消费总额
     *
     * 如果当前时间在本月10日之前则显示上上个月11日到上个月10日之间的数据
     * 在本月10日之后则显示上个月11日到本月10日之间的数据
     */
    public function autoClear(){
        $gid = input('post.gid');

        // 今天
        $today = date('d');
        // 本月
        $year_month = date('Y-m');
        // 上月
        $year_month_last = date('Y-m',$this->last_month);
        // 上上月
        $year_month_last2 = date('Y-m',$this->last_last_month);

        $month_more = new MonthMore();
        $month = new Month();

        if($today > 10){
            // 本月 10 日时间戳
            $year_month_10 = strtotime($year_month) + 10 * 24 * 60 * 60 - 1;
            // 上月 11 日时间戳
            $year_month_11 = $this->last_month_11;
            // 结算月
            $settlement_month = $year_month_last;

            $rs = $month_more->getMonthMore($gid,$settlement_month);
        }else{
            // 上月 10 日时间戳
            $year_month_10 = $this->last_month_10;
            // 上上月 11 日时间戳
            $year_month_11 = $this->last_last_month_11;
            // 结算月
            $settlement_month = $year_month_last2;

            $rs = $month_more->getMonthMore($gid,$settlement_month);
        }

        if(!$rs){
            // 开始自动结算
            $rs_auto = $month_more->autoClear($gid,$year_month_11,$year_month_10,$settlement_month);
            if($rs_auto){
                $rs = $month_more->getMonthMore($gid,$settlement_month);
            }else{
                $re['msg'] = '自动结算失败1';
                $re['status'] = 0;

                return json($re);
            }
        }

        // 获取 每人月数据
        $rss = $month->getMonth($gid,$settlement_month);
        if($rs and $rss){
            $re['msg'] = '获取成功';
            $re['status'] = 1;
            $re['data']['month_more'] = $rs;
            $re['data']['month'] = $rss;

            return json($re);
        }else{
            $re['msg'] = '自动结算失败2';
            $re['status'] = 0;

            return json($re);
        }
    }

    /**
     * 查询月表记录 如果没有则创建 有则查询
     */

    /**
     * 最近消费记录
     */
    public function recentRecord(){}

    /**
     * 按组查询每个成员的本月消费情况和总消费情况
     * 最近3个月消费走势
     */
    public function getDataByTime(){
        $gid = input('post.gid',1);
        $type = input('post.type',1);

        if($type == 2){
            // 最近3个月消费走势
            $start_time = strtotime(date('Y-m-01',strtotime("-2 month")));
        }else{
            // 上月11日 按组查询每个成员的本月消费情况和总消费情况
            $start_time = $this->last_month_11;
        }

        $users_group = new UsersGroup();
        $bill = new Bill();

        // 现在
        $end_time = time();

        $rs_group = $users_group->getMembersByGroupId($gid);
        if($rs_group){

            foreach ($rs_group as $item) {
                $legend_data[] = $item['user_name'];
                $re['series'][] = [
                    'name' => $item['user_name'],
                    'type' => 'line',
                    'smooth' => true,
//                    'areaStyle' => ['normal' => []],
                    'data' => $bill->getSeriesDataByUid($item['uid'],$gid,$start_time,$end_time)
                ];
            }
            $legend_data[] = '总金额';
            $re['series'][] = [
                'name' => '总金额',
                'type' => 'bar',
                'label' => [
                    'normal' => [
                        'show' => true,
                        'position' => 'top',
                    ],
                ],
                'data' => $bill->getSeriesDataByGid($gid,$start_time,$end_time)
            ];
//            $re['series'] = json_encode($re['series']);

            $re['msg'] = '获取成功';
            $re['status'] = 1;
            $re['legend_data'] = $legend_data;
            $re['xaxis_data'] = Tools::format_time_to_data($start_time,$end_time);

            return json($re);
        }else{
            $re['msg'] = '组错误';
            $re['status'] = 0;

            return json($re);
        }
    }

    /**
     * 最近消费时间轴
     */
    public function getTimeLineData(){
        $gid = input('post.gid',1);
        $page = input('post.page',1);
        $size = input('post.size',10);

        $rs = (new Bill())->getTimeLineData($gid,$page,$size);

        if($rs){
            return json(['msg'=>'获取成功','status'=>1,'rs'=>$rs]);
        }else{
            return json(['msg'=>'没有更多数据','status'=>0]);
        }
    }
}



















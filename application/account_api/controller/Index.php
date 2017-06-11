<?php
namespace app\account_api\controller;

use app\account\model\Bill;
use app\account\model\UsersGroup;
use app\account_api\interfaces\BillStatistics;
use app\account\model\Month;
use app\account\model\MonthMore;
use app\common\Tools;
use think\Controller;
use think\Log;

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
            // 获取 每人月数据
            $rss = $month->getMonth($gid,$settlement_month);
            if($rs_auto){
                $rs = $month_more->getMonthMore($gid,$settlement_month);
                // 发送邮件
                $this->autoSendEmail($gid,$year_month_11,$year_month_10,$settlement_month,$rs,$rss);
            }else{
                $re['msg'] = '自动结算失败1';
                $re['status'] = 0;

                return json($re);
            }
        }else{
            // 获取 每人月数据
            $rss = $month->getMonth($gid,$settlement_month);
        }

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

    // 发送邮件
    private function autoSendEmail($gid,$year_month_11,$year_month_10,$settlement_month,$_rs,$_rss){
        $start = date('Y-m-d',$year_month_11);
        $end = date('Y-m-d',$year_month_10);
        $total = $_rs['total_amount'];
        $avg = $_rs['avg_amount'];

        $str = '';
        if($_rss){
            foreach ($_rss as $rss) {
                $user_name = $rss['user_name'];
                $total_amount = $rss['total_amount'];
                $diff = $total_amount - $avg;
                $str = "<blockquote style='margin: 0.8em 0px 0.8em 2em; padding: 0px 0px 0px 0.7em; border-left: 2px solid rgb(221, 221, 221);' formatblock='1'>
                    <img src='https://rescdn.qqmail.com/zh_CN/images/mo/EMOJI/103.png'>
                    $user_name
                    <br>
                    <font size='2'>
                        支出 :
                    </font>
                    <span style='color: rgb(255, 0, 0);'>
                        <font size='2'>
                        </font>
                        ￥$total_amount
                    </span>
                    <br>
                    <font size='2'>
                        应收 :
                    </font>
                    <span style='color: rgb(255, 0, 0);'>
                        ￥$diff
                    </span>
                    <br>
                </blockquote>";
            }
        }
        $body = "<table style='width: 99.8%; '>
    <tbody>
        <tr>
            <td id='QQMAILSTATIONERY' style='background:url(https://rescdn.qqmail.com/zh_CN/htmledition/images/xinzhi/bg/a_08.jpg) no-repeat #f3f3eb; min-height:550px; padding: 100px 55px 200px 120px;'>
                <font size='5'>
                    <span style='font-family: 楷体,楷体_GB2312;'>
                        <span style='color: rgb(153, 51, 0);'>
                            $settlement_month 已出账
                        </span>
                    </span>
                </font>
                <br>
                <blockquote style='margin: 0.8em 0px 0.8em 2em; padding: 0px 0px 0px 0.7em; border-left: 2px solid rgb(221, 221, 221);' formatblock='1'>
                    <font size='2'>
                        $start
                        <br>
                        $end
                    </font>
                    <br>
                </blockquote>
                <blockquote style='margin: 0.8em 0px 0.8em 2em; padding: 0px 0px 0px 0.7em; border-left: 2px solid rgb(221, 221, 221);' formatblock='1'>
                    <img src='https://rescdn.qqmail.com/zh_CN/images/mo/EMOJI/077.png'>
                    总消费
                    <br>
                    <span style='color: rgb(255, 0, 0);'>
                        ￥$total
                    </span>
                    <br>
                </blockquote>
                $str
                <blockquote style='margin: 0.8em 0px 0.8em 2em; padding: 0px 0px 0px 0.7em; border-left: 2px solid rgb(221, 221, 221);' formatblock='1'>
                    <img src='https://rescdn.qqmail.com/zh_CN/images/mo/EMOJI/050.png'>
                    平均
                    <br>
                    <span style='color: rgb(255, 0, 0);'>
                        ￥$avg
                    </span>
                    <br>
                </blockquote>
            </td>
        </tr>
    </tbody>
</table>";
        $users_group = new UsersGroup();
        $rs_u = $users_group->getMembersByGroupId($gid,['email','user_name']);
        if($rs_u){
            foreach ($rs_u as $item) {
                $rs = send_email($item['email'],$settlement_month . '生活账单',$body);
                Log::record(print_r($rs,true) . "\r\n" . json_encode($item));
            }
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

    /**
     * 本月预览
     */
    public function getThisMonth(){
        $gid = input('post.gid',1);
        $this_year = date('Y');
        $this_month = date('m');
        $this_day = date('d');

        $end_time = time();
        if($this_day >= 11){
            $start_time = $this->this_month_10 + 1;
        }else{
            $start_time = $this->last_month_11;
        }

        $users_group = new UsersGroup();
        $bill = new Bill();
        $rs_group = $users_group->getMembersByGroupId($gid);

        // 根据gid获取总消费
        $rs_sum = $bill->getSumByGid($gid,$start_time,$end_time);
        // 计算平均消费
        $rs_avg = $rs_sum / count($rs_group);
        // 根据gid uid获取总消费
        $rs_u_sum = [];
        foreach ($rs_group as $item) {
            $rs_u_sum_pre = $bill->getSumByGidAndUid($gid,$item['uid'],$start_time,$end_time);
            $rs_u_sum[$item['user_name']][] = $rs_u_sum_pre;
            $rs_u_sum[$item['user_name']][] = $rs_u_sum_pre - $rs_avg;
        }

        $re['msg'] = '获取成功';
        $re['status'] = 1;
        $re['data']['sum'] = $rs_sum;
        $re['data']['avg'] = $rs_avg;
        $re['data']['u_sum'] = $rs_u_sum;

        return json($re);
    }
}



















<?php
namespace app\account_api\controller;

use app\account_api\interfaces\BillStatistics;
use think\Controller;

class Index extends Controller implements BillStatistics
{
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
     */
    public function autoClear(){}

    /**
     * 查询月表记录 如果没有则创建 有则查询
     */
}



















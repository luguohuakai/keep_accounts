<?php
namespace app\account_api\interfaces;
/**
 * Created by PhpStorm.
 * User: DM
 * Date: 2017/5/15
 * Time: 11:49
 */


interface BillStatistics{
    /**
     * 按月份统计
     * 需求:
     * 输入年月 获取当月每天明细
     */
    function monthlyStatistics();

    /**
     * 按年份统计
     * 需求:
     * 输入年 获取当年每月明细
     */
    function yearlyStatistics();

    /**
     * 按月查询总消费
     */
    function totalConsumptionByMonth();

    /**
     * 按时间段查询总消费
     */
    function totalConsumptionByTime();

    /**
     * 自动结算上月11日到本月10日的总消费 每人消费总额
     */
    function autoClear();
}
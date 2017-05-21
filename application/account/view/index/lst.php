<?php
/**
 * Created by PhpStorm.
 * User: DM
 * Date: 2017/5/14
 * Time: 21:47
 */
?>
<!-- 鼠标悬停 -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">消费列表</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>购买时间</th>
                    <th>创建时间</th>
                    <th>修改时间</th>
                    <th>商品</th>
                    <th>金额</th>
                    <th>消费者</th>
                </tr>
                </thead>
                <tbody>
                {volist name='lst' id='bill'}
                <tr>
                    <td>{$bill.id}</td>
                    <td>{$bill.buy_time > 10000000 ? date('Y-m-d',$bill.buy_time) : $bill.buy_time}</td>
                    <td>{$bill.create_time > 10000000 ? date('Y-m-d',$bill.create_time) : $bill.create_time}</td>
                    <td>{$bill.update_time > 10000000 ? date('Y-m-d',$bill.update_time) : $bill.update_time}</td>
                    <td>{$bill.goods}</td>
                    <td>{$bill.amount}</td>
                    <td>{$bill.user_name}</td>
                </tr>
                {/volist}
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel-footer">{$lst->render()}</div>
</div>

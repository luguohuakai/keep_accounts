<?php
/**
 * Created by PhpStorm.
 * User: DM
 * Date: 2017/5/14
 * Time: 20:01
 */
?>

<!-- 表单 -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">新的消费</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" method="post" action="/ac/add_handle">

<!--            <div class="form-group">-->
<!--                <label class="control-label col-sm-2" for="goods">购买物品</label>-->
<!--                <div class="col-sm-9">-->
<!--                    <input type="text" class="form-control" id="goods" style="" name="goods">-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="form-group">-->
<!--                <label class="control-label col-sm-2" for="amount">金额</label>-->
<!--                <div class="col-sm-9">-->
<!--                    <input type="text" class="form-control" id="amount" style="" name="amount">-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="form-group">-->
<!--                <label class="control-label col-sm-2" for="giver">谁掏钱</label>-->
<!--                <div class="col-sm-9">-->
<!--                    <input type="text" class="form-control" id="giver" style="" name="giver">-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="form-group has-success has-feedback">-->
<!--                <label class="control-label col-sm-2" for="inputSuccess3">Input with success</label>-->
<!--                <div class="col-sm-9">-->
<!--                    <input type="text" class="form-control" id="inputSuccess3" aria-describedby="inputSuccess3Status">-->
<!--                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>-->
<!--                    <span id="inputSuccess3Status" class="sr-only">(success)</span>-->
<!--                </div>-->
<!--            </div>-->

            <div class="form-group has-success has-feedback">
                <label class="control-label col-sm-1" for="goods"></label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <span class="input-group-addon">购买物品</span>
                        <input type="text" class="form-control" id="goods" name="goods" aria-describedby="goodsStatus">
                    </div>
                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                    <span id="goodsStatus" class="sr-only">(success)</span>
                </div>
            </div>

            <div class="form-group has-success has-feedback">
                <label class="control-label col-sm-1" for="amount"></label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <span class="input-group-addon">金额</span>
                        <input type="text" class="form-control" id="amount" name="amount" aria-describedby="amountStatus">
                    </div>
                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                    <span id="amountStatus" class="sr-only">(success)</span>
                </div>
            </div>

            <div class="form-group has-success has-feedback">
                <label class="control-label col-sm-1" for="giver"></label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <span class="input-group-addon">谁掏的钱</span>
                        <input type="text" class="form-control" id="giver" name="giver" aria-describedby="giverStatus">
                    </div>
                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                    <span id="giverStatus" class="sr-only">(success)</span>
                </div>
            </div>

            <div class="form-group has-success has-feedback">
                <label class="control-label col-sm-1" for="giver"></label>
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary btn-block">提交</button>
                </div>
            </div>

        </form>

    </div>
</div>
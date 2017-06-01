<?php

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">admin 添加</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" method="post" action="add_handle">

            {:token()}
            <div class="form-group">
                <label class="control-label col-sm-2" for="id">ID</label>
                <div class="col-sm-8">
                    <input type="text" readonly disabled class="form-control" id="id" name="id" style="">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">管理员名</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" style="">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="password">密码</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="password" name="password" style="">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="create_time">创建时间</label>
                <div class="col-sm-8">
                    <input type="text" readonly disabled class="form-control" id="create_time" name="create_time" style="">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="update_time">更新时间</label>
                <div class="col-sm-8">
                    <input type="text" readonly disabled class="form-control" id="update_time" name="update_time" style="">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="avatar">头像</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="avatar" name="avatar" style="">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="simpleInput"></label>
                <div class="col-sm-4">
                    <button type="submit" class="form-control btn btn-primary">确认</button>
                </div>
                <div class="col-sm-4">
                    <button type="reset" class="form-control btn btn-warning">重置</button>
                </div>
            </div>

        </form>
    </div>
</div>

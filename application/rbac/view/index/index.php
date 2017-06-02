<?php
/**
 * Created by PhpStorm.
 * User: DM
 * Date: 2017/6/1
 * Time: 14:57
 */
css('static/toastr/toastr.min.css', 'public');
js('static/toastr/toastr.min.js', 'public');
?>
<div class="row">
    <div class="col-lg-2">
        <div class="panel panel-default">
            <div class="panel-heading">管理员</div>
            <ul class="list-group" id="admin">
                <?php foreach ($all_admin as $v): ?>
                    <li class="list-group-item" id="admin_<?= $v['id'] ?>"
                        data-admin_id="<?= $v['id'] ?>"><?= $v['name'] ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="panel panel-default">
            <div class="panel-heading">已拥有角色</div>
            <div class="panel-body">
                <ul class="list-group" id="role">
                    <?php foreach ($all_role as $v): ?>
                        <li class="list-group-item" id="role_<?= $v['id'] ?>"
                            data-role_id="<?= $v['id'] ?>"><?= $v['name'] ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">已拥有权限</div>
            <div class="panel-body">
                <ul class="list-group" id="auth">
                    <?php foreach ($all_auth as $v): ?>
                        <li class="list-group-item" id="auth_<?= $v['id'] ?>"
                            data-auth_id="<?= $v['id'] ?>"><?= $v['name'] ?></li>
                    <?php endforeach; ?>
                </ul>
                <style>
                    fieldset {
                        padding: 10px;
                        margin: 10px;
                        color: #333;
                        border: #aaa dashed 0px;
                        background: #eee;
                    }
                    legend {
                        font-size: 16px;
                        font-weight: bold;
                        padding: 5px 10px;
                        color: #444;
                        border: 0px solid #aaa;
                        width: auto;
                        background: #fff;
                        position: relative;
                        top:8px;
                        box-shadow: 3px 3px 15px #bbb;
                        border-radius: 5px;
                    }
                    fieldset>div>span{display:inline-block !important;margin-bottom:4px;}
                </style>
                <fieldset>
                    <legend>xxx组</legend>
                    <div>
                        <span class="label label-default">xxxx</span>
                        <span class="label label-default">xxxx</span>
                        <span class="label label-default">xxxx</span>
                        <span class="label label-default">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                        <span class="label label-success">xxxx</span>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>xxx组</legend>
                    <div>
                        <span class="label label-default">xxxx</span>
                        <span class="label label-default">xxxx</span>
                        <span class="label label-default">xxxx</span>
                        <span class="label label-default">xxxx</span>
                        <span class="label label-success">xxxx</span>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>xxx组</legend>
                    <div>
                        <span class="label label-default">xxxx</span>
                        <span class="label label-default">xxxx</span>
                        <span class="label label-default">xxxx</span>
                        <span class="label label-default">xxxx</span>
                        <span class="label label-success">xxxx</span>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>xxx组</legend>
                    <div>
                        <span class="label label-default">xxxx</span>
                        <span class="label label-default">xxxx</span>
                        <span class="label label-default">xxxx</span>
                        <span class="label label-default">xxxx</span>
                        <span class="label label-success">xxxx</span>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>

<script>
    $("#admin>li").click(function () {
        $(this).addClass('active');
        $(this).siblings().removeClass('active');

        $("#role>li").removeClass('active');
        $("#auth>li").removeClass('active');

        var admin_id = $(this).data('admin_id');
        $.post(
            '{:url("getroleandauthbyadminid")}',
            {admin_id: admin_id},
            function (e) {
                if (e.status === 1) {
                    var role = e.data.role;
                    var auth = e.data.auth;
                    for (var k in role) {
                        $("#role_" + role[k].role_id).addClass('active');
                    }
                    for (var j in auth) {
                        for (var i in auth[j]) {
                            $("#auth_" + auth[j][i].auth_id).addClass('active');
                        }
                    }
                } else {
                    toastr.error(e.msg);
                }
            }, 'json');
    })
</script>

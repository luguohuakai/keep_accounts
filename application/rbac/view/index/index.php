<?php
/**
 * Created by PhpStorm.
 * User: DM
 * Date: 2017/6/1
 * Time: 14:57
 */
css('static/toastr/toastr.min.css','public');
js('static/toastr/toastr.min.js','public');
?>
<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">管理员</div>
            <ul class="list-group" id="admin">
                <?php foreach ($all_admin as $v):?>
                <li class="list-group-item" id="admin_<?=$v['id']?>" data-admin_id="<?=$v['id']?>"><?=$v['name']?></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">角色</div>
            <div class="panel-body">
                <ul class="list-group" id="role">
                    <?php foreach ($all_role as $v):?>
                    <li class="list-group-item" id="role_<?=$v['id']?>" data-role_id="<?=$v['id']?>"><?=$v['name']?></li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">权限</div>
            <div class="panel-body">
            </div>
            <ul class="list-group" id="auth">
                <?php foreach ($all_auth as $v):?>
                <li class="list-group-item" id="auth_<?=$v['id']?>" data-auth_id="<?=$v['id']?>"><?=$v['name']?></li>
                <?php endforeach;?>
            </ul>
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
                if(e.status === 1){
                    toastr.success(e.msg);
                    var role = e.data.role;
                    var auth = e.data.auth;
                    for(var k in role){
                        $("#role_" + role[k].role_id).addClass('active');
                        toastr.success(role[k].role_id);
                    }
                    for(var j in auth){
                        for(var i in auth[j]){
                            $("#auth_" + auth[j][i].auth_id).addClass('active');
                        }
                    }
                }else {
                    toastr.error(e.msg);
                }
            },'json');
    })
</script>

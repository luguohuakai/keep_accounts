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
<style type="text/css">
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
<div class="row">
    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">选择角色</div>
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
    <div class="col-lg-9">
        <div class="panel panel-default">
            <div class="panel-heading">选择权限</div>
            <div class="panel-body" id="auth">
                {volist name="all_auth" id="v"}
                <fieldset>
                    <legend>{$key}</legend>
                    {volist name="v" id="vv"}
                        <label class="checkbox-inline" for="auth_{$vv.id}">
                        <input type="checkbox" value="{$vv.id}" name="auth_{$vv.id}" id="auth_{$vv.id}">{$vv['name']}
                        </label>
<!--                    <button class="btn btn-default btn-xs">{$vv['name']}</button>-->
                    {/volist}
                </fieldset>
                {/volist}
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        var id = '<?=input('param.id')?>';
        $("#role_" + id).addClass('active');
        if(id !== ''){
            $.post(
                '{:url("getauthbyroleid")}',
                {id: id},
                function (e) {
                    if(e.status === 1){
                        var da = e.data;
                        for(var k in da){
                            $("#auth_" + da[k]['auth_id']).prop('checked',true);
                        }
                    }else {
                        toastr.error(e.msg);
                    }
                },'json'
            )
        }
    });

    // role 点击事件
    $("#role").find(">li").click(function () {
        var role_id = $(this).data('role_id');

        $(this).addClass('active').siblings().removeClass('active');
        $("#auth input").each(function () {
            $(this).prop('checked',false);
        });

        $.post(
            '{:url("getauthbyroleid")}',
            {id: role_id},
            function (e) {
                if(e.status === 1){
                    var da = e.data;
                    for(var k in da){
                        $("#auth_" + da[k]['auth_id']).prop('checked',true);
                    }
                }else {
                    toastr.error(e.msg);
                }
            },'json'
        )
    });

    // 为选中的角色分配权限
    $("#auth input").click(function () {
        var role_id = $("#role").find(">li.active").data('role_id');
        var auth_id = $(this).val();
        var bind = $(this).is(':checked');

        $.post(
            '{:url("bindauthforrole")}',
            {role_id: role_id,auth_id: auth_id,bind: bind},
            function (e) {
                if(e.status === 1){
                    toastr.error(e.msg);
                }else {
                    if(bind){
                        $(this).prop('checked',false);
                    }else {
                        $(this).prop('checked',true);
                    }
                    toastr.error(e.msg);
                }
            }
        )
    })
</script>

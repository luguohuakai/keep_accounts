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
        <h3 class="panel-title">管理员表</h3>
        <a href="add.html">添加</a>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>管理员名</th>
                    <th>密码</th>
                    <th>创建时间</th>
                    <th>更新时间</th>
                    <th>头像</th>
                    <th>状态(1正常 2已删除)</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                {volist name='lst' id='vo'}
                <tr>
                    <td>{$vo.id}</td>
                    <td>{$vo.name}</td>
                    <td>{$vo.password}</td>
                    <td>{$vo.create_time}</td>
                    <td>{$vo.update_time}</td>
                    <td>{$vo.avatar}</td>
                    <td>{$vo.status}</td>
                    <td>
                        <a href="{:url('edit',['id' => $vo.id])}">修改</a>
                        <a href="{:url('del_soft',['id' => $vo.id])}">删除</a>
                    </td>
                </tr>
                {/volist}
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel-footer">{$lst->render()}</div>
</div>

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
        <h3 class="panel-title"><?=$rs_table_info[0]['Comment']?></h3>
        <a href="{:url('add')}">添加</a>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <?php foreach ($rs_col_info as $rci):?>
                    <th><?=$rci['Comment']?></th>
                    <?php endforeach;?>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                {volist name='lst' id='vo'}
                <tr>
                    <?php foreach ($field as $fi):?>
                    <td>{$vo.<?=$fi;?>}</td>
                    <?php endforeach;?>
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

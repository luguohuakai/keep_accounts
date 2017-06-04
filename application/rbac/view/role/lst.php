<!-- 鼠标悬停 -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">角色表</h3>
        <a href="{:url('add')}">添加</a>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>角色名</th>
                    <th>状态 (1正常 2已删除)</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                {volist name='lst' id='vo'}
                <tr>
                    <td>{$vo.id}</td>
                    <td>{$vo.name}</td>
                    <td>{$vo.status}</td>
                    <td>
                        <a href="{:url('edit',['id' => $vo.id])}">修改</a>
                        <a href="{:url('del_soft',['id' => $vo.id])}">删除</a>
                        <a href="{:url('auth_manage',['id' => $vo.id])}">权限管理</a>
                    </td>
                </tr>
                {/volist}
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel-footer">{$lst->render()}</div>
</div>

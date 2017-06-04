
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">auth 修改</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" method="post" action="{:url('edit_handle')}">

            {:token()}
                        <div class="form-group">
                <label class="control-label col-sm-2" for="id">ID</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" readonly id="id" name="id" value="{$rs.id}" style="">
                </div>
            </div>
                        <div class="form-group">
                <label class="control-label col-sm-2" for="name">权限名称</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  id="name" name="name" value="{$rs.name}" style="">
                </div>
            </div>
                        <div class="form-group">
                <label class="control-label col-sm-2" for="rule">路由规则</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  id="rule" name="rule" value="{$rs.rule}" style="">
                </div>
            </div>
                        <div class="form-group">
                <label class="control-label col-sm-2" for="create_time">创建时间</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" disabled id="create_time" name="create_time" value="{$rs.create_time}" style="">
                </div>
            </div>
                        <div class="form-group">
                <label class="control-label col-sm-2" for="update_time">更新时间</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" disabled id="update_time" name="update_time" value="{$rs.update_time}" style="">
                </div>
            </div>
                        <div class="form-group">
                <label class="control-label col-sm-2" for="status">状态 (1正常 2已删除)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  id="status" name="status" value="{$rs.status}" style="">
                </div>
            </div>
                        <div class="form-group">
                <label class="control-label col-sm-2" for="group_id">权限组ID</label>
                <div class="col-sm-8">
                    <select class="form-control" name="group_id" id="group_id">
                        {volist name="rs_group" id="vo"}
                        <option value="{$vo.id}" <?=$rs['group_id'] == $vo['id'] ? 'selected' : ''?>>{$vo.name}</option>
                        {/volist}
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-2"></label>
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

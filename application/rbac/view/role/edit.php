
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">role 修改</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" method="post" action="{:url('edit_handle')}">

            {:token()}
                        <div class="form-group">
                <label class="control-label col-sm-2" for="id">ID</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="id" name="id" value="{$rs.id}" style="">
                </div>
            </div>
                        <div class="form-group">
                <label class="control-label col-sm-2" for="name">角色名</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" value="{$rs.name}" style="">
                </div>
            </div>
                        <div class="form-group">
                <label class="control-label col-sm-2" for="status">状态 (1正常 2已删除)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="status" name="status" value="{$rs.status}" style="">
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

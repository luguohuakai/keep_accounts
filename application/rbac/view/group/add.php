
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">group 添加</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" method="post" action="{:url('add_handle')}">

            {:token()}
                                                                            <div class="form-group">
                <label class="control-label col-sm-2" for="name">组名</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" style="">
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

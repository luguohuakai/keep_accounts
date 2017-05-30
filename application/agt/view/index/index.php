<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Auto Generation Tool</h3>
    </div>
    <div class="panel-body">
        <form action="{:url('agt/index/generation')}" method="post" class="form-horizontal">
            <div class="row">
                <div class="form-group">
                    <label for="database" class="col-sm-2 control-label">数据库</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="database" id="database">
                            <option value="">请选择数据库</option>
                        </select>
                    </div>
                    <label for="table" class="col-sm-1 control-label">表</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="table" id="table">
                            <option value="">请选择表</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="module" class="col-sm-2 control-label">生成到哪个模块</label>
                    <div class="col-sm-9">
<!--                        <input type="text" class="form-control" name="module" id="module" placeholder="模块名称">-->
                        <div class="row">
                            {volist name="dir" id="vo"}
                            <div class="col-sm-2">
                                <label class="radio-inline">
                                    <input type="radio" name="module" value="{$vo}"> {$vo}
                                </label>
                            </div>
                            {/volist}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-9">
                        <button type="submit" class="btn btn-primary">确定</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(function () {
        $.get(
            '{:url("agt/api/getdatabases")}',
            {},
            function (e) {
                var str = '';
                if(e.status === 1){
                    for(var i in e.data){
                        str += '<option value="'+e.data[i]['Database']+'">'+e.data[i]['Database']+'</option>';
                    }
                    $("#database").append(str);
                }else{
                    alert(e.msg);
                }
            },'json'
        )
    });

    $("#database").change(function () {
        $.post(
            '{:url("agt/api/gettables")}',
            {database: $(this).val()},
            function (e) {
                if(e.status === 1){
                    var str = '';
                    $("#table").find(">option:first").nextAll().remove();
                    for(var i in e.data){
                        for(var k in e.data[i]){
                            str += '<option value="'+e.data[i][k]+'">'+e.data[i][k]+'</option>';
                        }
                    }
                    $("#table").append(str);
                }else {
                    alert(e.msg);
                }
            },'json'
        );
    })
</script>
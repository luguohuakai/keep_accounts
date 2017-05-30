<?php

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?=$table_name?> 修改</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" method="post" action="{:url('edit_handle')}">

            {:token()}
            <?php foreach ($rs_col_info as $rci):?>
            <div class="form-group">
                <label class="control-label col-sm-2" for="<?=$rci['Field']?>"><?=$rci['Comment']?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="<?=$rci['Field']?>" name="<?=$rci['Field']?>" value="{$rs.<?=$rci['Field']?>}" style="">
                </div>
            </div>
            <?php endforeach;?>

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

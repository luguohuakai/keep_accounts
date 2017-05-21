<?php
/**
 * Created by PhpStorm.
 * User: DM
 * Date: 2017/5/14
 * Time: 20:01
 */
css('eonasdan/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css');
//js('moment/moment/min/moment.min.js');
//js('eonasdan/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js');
js([
    'moment/moment/min/moment.min.js',
    'eonasdan/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
]);
?>

<!-- 表单 -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">新的消费</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal form-inline" method="post" action="/ac/add_handle">
            <div class="row">
                <div class="col-sm-2">
                    <input type="text" class="form-control input-sm" id="buy_time" name="buy_time" placeholder="购买时间">
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control input-sm" id="goods" name="goods" placeholder="购买物品">
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control input-sm" id="amount" name="amount" placeholder="金额">
                </div>
                <div class="col-sm-2">
<!--                    <input type="text" class="form-control input-sm" id="giver" name="giver" placeholder="谁掏的钱">-->
                    <select class="form-control input-sm" name="giver" id="giver" style="width: 100%;">
                        {volist name="rs" id="vo"}
                            <option value="{$vo.uid}">{$vo.user_name}</option>
                        {/volist}
                    </select>
                </div>
                <input type="hidden" name="gid" value="{$group_id}">
<!--                <div class="col-sm-2">-->
<!--                    <input type="text" class="form-control input-sm" id="exampleInputName2" name="" placeholder="Jane Doe">-->
<!--                </div>-->
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-default btn-sm">确定</button>
                </div>
            </div>
        </form>

    </div>
</div>

<!-- 表单 -->
<!--<div class="panel panel-default">-->
<!--    <div class="panel-heading">-->
<!--        <h3 class="panel-title">新的消费</h3>-->
<!--    </div>-->
<!--    <div class="panel-body">-->
<!--        <form class="form-horizontal" method="post" action="/ac/add_handle">-->

<!--            <div class="form-group">-->
<!--                <label class="control-label col-sm-2" for="goods">购买物品</label>-->
<!--                <div class="col-sm-9">-->
<!--                    <input type="text" class="form-control" id="goods" style="" name="goods">-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="form-group">-->
<!--                <label class="control-label col-sm-2" for="amount">金额</label>-->
<!--                <div class="col-sm-9">-->
<!--                    <input type="text" class="form-control" id="amount" style="" name="amount">-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="form-group">-->
<!--                <label class="control-label col-sm-2" for="giver">谁掏钱</label>-->
<!--                <div class="col-sm-9">-->
<!--                    <input type="text" class="form-control" id="giver" style="" name="giver">-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="form-group has-success has-feedback">-->
<!--                <label class="control-label col-sm-2" for="inputSuccess3">Input with success</label>-->
<!--                <div class="col-sm-9">-->
<!--                    <input type="text" class="form-control" id="inputSuccess3" aria-describedby="inputSuccess3Status">-->
<!--                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>-->
<!--                    <span id="inputSuccess3Status" class="sr-only">(success)</span>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="form-group has-success has-feedback">-->
<!--                <label class="control-label col-sm-1" for="buy_time"></label>-->
<!--                <div class="col-sm-9">-->
<!--                    <div class="input-group">-->
<!--                        <span class="input-group-addon">购买时间</span>-->
<!--                        <input type="text" class="form-control" id="buy_time" name="buy_time" aria-describedby="buy_timeStatus">-->
<!--                    </div>-->
<!--                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>-->
<!--                    <span id="buy_timeStatus" class="sr-only">(success)</span>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="form-group has-success has-feedback">-->
<!--                <label class="control-label col-sm-1" for="goods"></label>-->
<!--                <div class="col-sm-9">-->
<!--                    <div class="input-group">-->
<!--                        <span class="input-group-addon">购买物品</span>-->
<!--                        <input type="text" class="form-control" id="goods" name="goods" aria-describedby="goodsStatus">-->
<!--                    </div>-->
<!--                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>-->
<!--                    <span id="goodsStatus" class="sr-only">(success)</span>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="form-group has-success has-feedback">-->
<!--                <label class="control-label col-sm-1" for="amount"></label>-->
<!--                <div class="col-sm-9">-->
<!--                    <div class="input-group">-->
<!--                        <span class="input-group-addon">金额</span>-->
<!--                        <input type="text" class="form-control" id="amount" name="amount" aria-describedby="amountStatus">-->
<!--                    </div>-->
<!--                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>-->
<!--                    <span id="amountStatus" class="sr-only">(success)</span>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="form-group has-success has-feedback">-->
<!--                <label class="control-label col-sm-1" for="giver"></label>-->
<!--                <div class="col-sm-9">-->
<!--                    <div class="input-group">-->
<!--                        <span class="input-group-addon">谁掏的钱</span>-->
<!--                        <input type="text" class="form-control" id="giver" name="giver" aria-describedby="giverStatus">-->
<!--                    </div>-->
<!--                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>-->
<!--                    <span id="giverStatus" class="sr-only">(success)</span>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="form-group has-success has-feedback">-->
<!--                <label class="control-label col-sm-1" for="giver"></label>-->
<!--                <div class="col-sm-9">-->
<!--                    <button type="submit" class="btn btn-primary btn-block">提交</button>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--        </form>-->
<!---->
<!--    </div>-->
<!--</div>-->

<link rel="stylesheet" type="text/css" media="all" href="/assets/css/time_line.css">
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-info-sign"></span> 近期消费日志</h3>
    </div>
    <div class="panel-body">
        <ul class="timeline">
            <li><div class="tldate">Apr 2014</div></li>

            <li>
                <div class="tl-circ"></div>
                <div class="timeline-panel">
                    <div class="tl-heading">
                        <h4>Surprising Headline Right Here</h4>
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 3 hours ago</small></p>
                    </div>
                    <div class="tl-body">
                        <p>Lorem Ipsum and such.</p>
                    </div>
                </div>
            </li>

            <li class="timeline-inverted">
                <div class="tl-circ"></div>
                <div class="timeline-panel">
                    <div class="tl-heading">
                        <h4>Breaking into Spring!</h4>
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 4/07/2014</small></p>
                    </div>
                    <div class="tl-body">
                        <p>Hope the weather gets a bit nicer...</p>

                        <p>Y'know, with more sunlight.</p>
                    </div>
                </div>
            </li>

            <li><div class="tldate">Mar 2014</div></li>

            <li>
                <div class="tl-circ"></div>
                <div class="timeline-panel">
                    <div class="tl-heading">
                        <h4>New Apple Device Release Date</h4>
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 3/22/2014</small></p>
                    </div>
                    <div class="tl-body">
                        <p>In memory of Steve Jobs.</p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-panel">
                    <div class="tl-heading">
                        <h4>No icon here</h4>
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 3/16/2014</small></p>
                    </div>
                    <div class="tl-body">
                        <p>Here you'll find some beautiful photography for your viewing pleasure, courtesy of <a href="http://lorempixel.com/">lorempixel</a>.</p>

                        <p><img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1493305964027&di=7faa9a856045b10d0a52e114fb5407fe&imgtype=0&src=http%3A%2F%2Fs2.sinaimg.cn%2Fmw690%2F44a2d702tdf6617d7e4c1%26690" alt="lorem pixel"></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="tl-circ"></div>
                <div class="timeline-panel">
                    <div class="tl-heading">
                        <h4>Some Important Date!</h4>
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 3/03/2014</small></p>
                    </div>
                    <div class="tl-body">
                        <p>Write up a quick summary of the event.</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-panel noarrow">
                    <div class="tl-heading">
                        <h4>Secondary Timeline Box</h4>
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 3/01/2014</small></p>
                    </div>
                    <div class="tl-body">
                        <p>This might be a follow-up post with related info. Maybe we include some extra links, tweets, user comments, photos, etc.</p>
                    </div>
                </div>
            </li>

            <li><div class="tldate">Feb 2014</div></li>

            <li class="timeline-inverted">
                <div class="tl-circ"></div>
                <div class="timeline-panel">
                    <div class="tl-heading">
                        <h4>The Winter Months</h4>
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 02/23/2014</small></p>
                    </div>
                    <div class="tl-body">
                        <p>Gee time really flies when you're having fun.</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="tl-circ"></div>
                <div class="timeline-panel">
                    <div class="tl-heading">
                        <h4>Yeah we're pretty much done here</h4>
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 02/11/2014</small></p>
                    </div>
                    <div class="tl-body">
                        <p>Wasn't this fun though?</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('#buy_time').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            showClose: true,
            showClear: true,
            showTodayButton: true,
            defaultDate: 'now'
        });
    });
</script>
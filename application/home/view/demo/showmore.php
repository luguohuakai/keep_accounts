<?php
js('static\toastr\toastr.min.js', 'public');
css('static\toastr\toastr.min.css', 'public');
?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="tabbable" id="tabs-260755">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#panel-576254" data-toggle="tab">第一部分</a>
                    </li>
                    <li>
                        <a href="#panel-793166" data-toggle="tab">第二部分</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="panel-576254">
                        <p>
                            第一部分内容.
                        </p>
                    </div>
                    <div class="tab-pane" id="panel-793166">
                        <p>
                            第二部分内容.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Tooltip on left">
    Tooltip on left
</button>

<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Tooltip
    on top
</button>

<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
    Tooltip on bottom
</button>

<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Tooltip on right">
    Tooltip on right
</button>

<button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="left"
        data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
    Popover on 左侧
</button>

<button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top"
        data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
    Popover on 顶部
</button>

<button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="bottom"
        data-content="Vivamus
sagittis lacus vel augue laoreet rutrum faucibus.">
    Popover on 底部
</button>

<button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="right"
        data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
    Popover on 右侧
</button>

<a tabindex="0" type="button" data-placement="auto left" data-title="haoahao" data-container="body" class="btn btn-lg btn-danger" role="button"
   data-toggle="popover" data-trigger="focus"
   data-content="--">可消失的弹出框</a>

<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false"
   aria-controls="collapseExample">
    Link with href
</a>
<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
        aria-expanded="false" aria-controls="collapseExample">
    Button with data-target
</button>
<div class="collapse" id="collapseExample">
    <div class="well">
        ...
    </div>
</div>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                   aria-expanded="true" aria-controls="collapseOne">
                    Collapsible Group Item #1
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                   aria-expanded="false" aria-controls="collapseTwo">
                    Collapsible Group Item #2
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                   aria-expanded="false" aria-controls="collapseThree">
                    Collapsible Group Item #3
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>
</div>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="http://attach.bbs.miui.com/forum/201704/15/065614ynk3in9yqtik8qss.jpg" alt="..." width="100%"
                 style="height: 500px">
            <div class="carousel-caption">
                鱼
            </div>
        </div>
        <div class="item">
            <img src="https://zos.alipayobjects.com/cmsmng/cms/images/ix0ehxi5/0dba1071-476f-480c-ba91-8462b3b3a0e2.jpeg"
                 width="100%" style="height: 500px" alt="...">
            <div class="carousel-caption">
                支付宝
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<!-- HTML to write -->
<a href="#" data-toggle="tooltip" title="<li>0001</li>">Hover over me</a>
<!-- Generated markup by the plugin -->
<div class="tooltip top" role="tooltip">
    <div class="tooltip-arrow"></div>
    <div class="tooltip-inner">
        <ul>
            <li>0001</li>
            <li>0002</li>
            <li>0003</li>
            <li>0004</li>
            <li>0005</li>
            <li>0006</li>
            <li>0007</li>
            <li>0008</li>
        </ul>
    </div>
</div>

<style>
    .refresh_hovertree {
        animation: changehovertree 1s linear infinite;
    }

    @-webkit-keyframes changehovertree {
        0% {
            -webkit-transform: rotate(0)
        }
        50% {
            -webkit-transform: rotate(180deg)
        }
        100% {
            -webkit-transform: rotate(360deg)
        }
    }

    @keyframes changehovertree {
        0% {
            transform: rotate(0)
        }
        50% {
            transform: rotate(180deg)
        }
        100% {
            transform: rotate(360deg)
        }
    }
</style>

<span class="glyphicon glyphicon-refresh refresh_hovertree"></span>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip({
            html: true
        })
    });

    //    $(function () {
    //        $('[data-toggle="popover"]').popover({
    //            html: true
    //        })
    //    });

    $(function () {
        var t = $('[data-toggle="popover"]');

        t
            .click(function () {
                var a = $(this);
                if (a.attr('data-content') === '--') {
                    a
                        .attr('data-content', "<span class='glyphicon glyphicon-refresh refresh_hovertree'></span>")
                        .popover({html: true}).popover('show');
                    $.post(
                        'tooltips',
                        {},
                        function (e) {
                            a.attr('data-content', e.data).popover('show');
                            toastr.error(e.msg)
                        }, 'json'
                    )
                }
            })
    })
</script>

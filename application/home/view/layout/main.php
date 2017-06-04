<?php
    use think\Url;

    $title = $title ?? '^_^';

    $ka_route = substr(str_replace('.html','',Url::build()),1);

    // 仪表盘
    $ka_bash = [
        'home/index/index',
    ];

    // 记一笔
    $ka_record = [
        'account/index/add',
        'account/index/lst',
    ];

    // 统计分析
    $ka_count = [
        'home/count/index',
    ];

    // 管理员中心
    $ka_admin = [
        'rbac/admin/lst',
        'rbac/admin/add',
        'rbac/admin/edit',
        'rbac/role/lst',
        'rbac/role/add',
        'rbac/role/edit',
        'rbac/auth/lst',
        'rbac/auth/add',
        'rbac/auth/edit',
        'rbac/group/lst',
        'rbac/group/add',
        'rbac/group/edit',
        'rbac/index/index',
    ];

    // Demos选项卡
    $ka_demos = [
        'home/demo/showtable',
        'home/demo/showform',
        'home/demo/showmore',
    ];

    // AngularJs选项卡
    $ka_angular = [
        'home/angular/index',
    ];

    // AGT
    $ka_agt = [
        'agt/index/index',
    ];
//dump($ka_demos);
//dump($ka_route);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- bootswatch 主题文件 -->
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
    <!--<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">-->

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!--  stickUp 页面元素固定  -->
<!--    <script src="/assets/js/stickUp.min.js"></script>-->
    <title>{$title}</title>
    <style>
        *{margin-bottom: 0;padding:0;}
        body{
            background-image:linear-gradient(to right,#999,#eee);
        }
        .right{
            float: right;
        }
        .navbar-fixed-bottom{
            z-index: 999999;
            width:100%;
        }
        .navbar-static-top{
            z-index: 999999;
            width:100%;
        }
        .content_right{
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
<!--导航条-->
<nav class="navbar-wrapper navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">{$title} <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!--左边栏菜单-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 menu_left">
            <div class="panel-group table-responsive" role="tablist">

                <div class="panel <?=in_array($ka_route,$ka_bash) ? 'panel-success' : 'panel-primary'?> leftMenu">
                    <!-- 利用data-target指定要折叠的分组列表 -->
                    <div class="panel-heading down_up" id="collapseListGroupHeading1" data-toggle="collapse" data-url="/home/index/index.html" role="tab" >
                        <h4 class="panel-title">
                            仪表盘
                        </h4>
                    </div>
                </div>

                <div class="panel panel-primary leftMenu">
                    <!-- 利用data-target指定要折叠的分组列表 -->
                    <div class="panel-heading down_up" id="collapseListGroupHeading1" data-toggle="collapse" data-target="#collapseListGroup1" role="tab" >
                        <h4 class="panel-title">
                            记一笔
                            <span class="glyphicon glyphicon-chevron-<?=in_array($ka_route,$ka_record) ? 'up' : 'down'?> right"></span>
                        </h4>
                    </div>
                    <!-- .panel-collapse和.collapse标明折叠元素 .in表示要显示出来 -->
                    <div id="collapseListGroup1" class="panel-collapse collapse <?=in_array($ka_route,$ka_record) ? 'in' : ''?>" role="tabpanel" aria-labelledby="collapseListGroupHeading1">
                        <ul class="list-group">
                            <li class="list-group-item">
                                    <a href="/ac/add"><span class="glyphicon glyphicon-triangle-right"></span>新的消费</a>
                            </li>
                            <li class="list-group-item">
                                    <a href="/ac/lst"><span class="glyphicon glyphicon-triangle-right"></span>消费列表</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="panel panel-primary leftMenu">
                    <div class="panel-heading down_up" id="collapseListGroupHeading2" data-toggle="collapse" data-target="#collapseListGroup2" role="tab" >
                        <h4 class="panel-title">
                            统计分析
                            <span class="glyphicon glyphicon-chevron-<?=in_array($ka_route,$ka_count) ? 'up' : 'down'?> right"></span>
                        </h4>
                    </div>
                    <div id="collapseListGroup2" class="panel-collapse collapse <?=in_array($ka_route,$ka_count) ? 'in' : ''?>" role="tabpanel" aria-labelledby="collapseListGroupHeading2">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <button class="menu-item-left">
                                    <span class="glyphicon glyphicon-triangle-right"></span>分组项2-1
                                </button>
                            </li>
                            <li class="list-group-item">
                                <button class="menu-item-left">
                                    <span class="glyphicon glyphicon-triangle-right"></span>分组项2-2
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="panel panel-primary leftMenu">
                    <div class="panel-heading down_up" id="collapseListGroupHeading2" data-toggle="collapse" data-target="#collapseListGroup3" role="tab" >
                        <h4 class="panel-title">
                            管理员中心
                            <span class="glyphicon glyphicon-chevron-<?=in_array($ka_route,$ka_admin) ? 'up' : 'down'?> right"></span>
                        </h4>
                    </div>
                    <div id="collapseListGroup3" class="panel-collapse collapse <?=in_array($ka_route,$ka_admin) ? 'in' : ''?>" role="tabpanel" aria-labelledby="collapseListGroupHeading2">
                        <ul class="list-group">
                            <a href="{:url('rbac/index/index')}">
                                <li class="list-group-item">
                                    <span class="glyphicon glyphicon-triangle-right"></span> 权限查询
                                </li>
                            </a>
                            <a href="{:url('rbac/admin/lst')}">
                                <li class="list-group-item">
                                    <span class="glyphicon glyphicon-triangle-right"></span> 管理员列表
                                </li>
                            </a>
                            <a href="{:url('rbac/role/lst')}">
                                <li class="list-group-item">
                                    <span class="glyphicon glyphicon-triangle-right"></span> 角色列表
                                </li>
                            </a>
                            <a href="{:url('rbac/auth/lst')}">
                                <li class="list-group-item">
                                    <span class="glyphicon glyphicon-triangle-right"></span> 权限列表
                                </li>
                            </a>
                            <a href="{:url('rbac/group/lst')}">
                                <li class="list-group-item">
                                    <span class="glyphicon glyphicon-triangle-right"></span> 权限组列表
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>

                <div class="panel panel-primary leftMenu">
                    <div class="panel-heading down_up" id="collapseListGroupHeading2" data-toggle="collapse" data-target="#collapseListGroup4" role="tab" >
                        <h4 class="panel-title">
                            用户中心
                            <span class="glyphicon glyphicon-chevron-down right"></span>
                        </h4>
                    </div>
                    <div id="collapseListGroup4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading2">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <button class="menu-item-left">
                                    <span class="glyphicon glyphicon-triangle-right"></span>分组项4-1
                                </button>
                            </li>
                            <li class="list-group-item">
                                <button class="menu-item-left">
                                    <span class="glyphicon glyphicon-triangle-right"></span>分组项4-2
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="panel panel-primary leftMenu">
                    <div class="panel-heading down_up" id="collapseListGroupHeading2" data-toggle="collapse" data-target="#collapseListGroup5" role="tab" >
                        <h4 class="panel-title">
                            Demos
                            <span class="glyphicon glyphicon-chevron-<?=in_array($ka_route,$ka_demos) ? 'up' : 'down'?> right"></span>
                        </h4>
                    </div>
                    <div id="collapseListGroup5" class="panel-collapse collapse <?=in_array($ka_route,$ka_demos) ? 'in' : ''?>" role="tabpanel" aria-labelledby="collapseListGroupHeading2">
                        <ul class="list-group">
                            <a href="/home/demo/showtable">
                                <li class="list-group-item">
    <!--                                <button class="menu-item-left">-->
                                        <span class="glyphicon glyphicon-triangle-right"></span> 表格
    <!--                                </button>-->
                                </li>
                            </a>
                            <a href="/home/demo/showform">
                                <li class="list-group-item">
    <!--                                <button class="menu-item-left">-->
                                        <span class="glyphicon glyphicon-triangle-right"></span> 表单
    <!--                                </button>-->
                                </li>
                            </a>
                            <a href="/home/demo/showmore">
                                <li class="list-group-item">
    <!--                                <button class="menu-item-left">-->
                                        <span class="glyphicon glyphicon-triangle-right"></span> 更多
    <!--                                </button>-->
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>

                <div class="panel panel-primary leftMenu">
                    <div class="panel-heading down_up" id="collapseListGroupHeading2" data-toggle="collapse" data-target="#angular" role="tab" >
                        <h4 class="panel-title">
                            AngularJs
                            <span class="glyphicon glyphicon-chevron-<?=in_array($ka_route,$ka_angular) ? 'up' : 'down'?> right"></span>
                        </h4>
                    </div>
                    <div id="angular" class="panel-collapse collapse <?=in_array($ka_route,$ka_angular) ? 'in' : ''?>" role="tabpanel" aria-labelledby="collapseListGroupHeading2">
                        <ul class="list-group">
                            <a href="/home/angular/index">
                                <li class="list-group-item">
                                    <span class="glyphicon glyphicon-triangle-right"></span> demo1
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>

                <div class="panel panel-primary leftMenu">
                    <div class="panel-heading down_up" id="collapseListGroupHeading2" data-toggle="collapse" data-target="#agt" role="tab" >
                        <h4 class="panel-title">
                            AGT
                            <span class="glyphicon glyphicon-chevron-<?=in_array($ka_route,$ka_agt) ? 'up' : 'down'?> right"></span>
                        </h4>
                    </div>
                    <div id="agt" class="panel-collapse collapse <?=in_array($ka_route,$ka_agt) ? 'in' : ''?>" role="tabpanel" aria-labelledby="collapseListGroupHeading2">
                        <ul class="list-group">
                            <a href="{:url('agt/index/index')}">
                                <li class="list-group-item">
                                    <span class="glyphicon glyphicon-triangle-right"></span> 自动生成(CURD)
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-10 content_right" style="border: 0px solid red;">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Library</a></li>
                <li class="active">Data</li>
            </ol>
            {__CONTENT__}
        </div>
    </div>
</div>
<script>
    $(function(){
        $(".down_up").click(function(e){
            /*切换折叠指示图标*/
            $(this).find("span").toggleClass("glyphicon-chevron-down");
            $(this).find("span").toggleClass("glyphicon-chevron-up");
            if($(this).data('url') != undefined){
                window.location.href = $(this).data('url');
            }
        });
        $(".navbar-brand").click(function (e) {
            $(".menu_left").toggleClass('hidden');
            $(".content_right").toggleClass('col-md-10').toggleClass('col-md-12');
        })
    });
</script>
<!--页脚-->
<footer>
    <nav class="navbar navbar-default navbar-fixed-bottom hide">
        <div class="container" style="text-align: center;">
            <p style="padding-top: 18px;">©{:date('Y')} {:lang('keep_accounts')}</p>
        </div>
    </nav>
</footer>
<script>
    $(function () {
        $(window).scroll(function(){
            var scrollTop = $(this).scrollTop();    // 滚动条距离顶部距离
            var scrollHeight = $(document).height();    // 滚动条高度
            var windowHeight = $(this).height();    // 窗口高度
            // 滚动到底部触发事件
//            if(scrollTop + windowHeight == scrollHeight){
//                $(".navbar-fixed-bottom").addClass('show');
//            }else {
//                $(".navbar-fixed-bottom").removeClass('show');
//            }
            // 向下滚动40px后显示导航条
//            if(scrollTop >= 50){
//                $(".navbar-static-top").css('position','fixed');
//            }else {
//                $(".navbar-static-top").css('position','relative');
//            }
            // 判断页面向上还是向下滚动

        });
    })
</script>
<script type="text/javascript">
//    //initiating jQuery
//    jQuery(function($) {
//         $(document).ready( function() {
//         // enabling stickUp on the '.navbar-wrapper' class
//         $('.navbar-wrapper').stickUp();
//         });
//    });
</script>
</body>
</html>
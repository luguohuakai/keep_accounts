<?php
js('static\echart\echarts.min.js', 'public');
?>
<style>
    span > blockquote > p {
        font-size: 12px;
    }
</style>
<div class="row">

    <div class="col-lg-5">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-info-sign"></span> <span id="settlement_month">--</span>
                    已结算</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <span class="badge" id="total_amount">--</span>
                                总消费
                            </li>
                            <li class="list-group-item">
                                <span class="badge" id="difference">--</span>
                                平均
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            $.post(
                '/account_api/index/autoClear',
                {gid: 1},
                function (e) {
                    $('#settlement_month').html(e.data.month_more.year_month);
                    $('#total_amount').html(e.data.month_more.total_amount);
                    var month = e.data.month;
                    var str = '';
                    for (var k in month) {
                        str +=
                            '<li class="list-group-item">' +
                            '<sapn class="badge">应收 : ' + (month[k].total_amount - e.data.month_more.avg_amount) + '</sapn>' +
                            '<span class="badge">支出 : ' + month[k].total_amount + '</span>' +
                            month[k].user_name +
                            '</li>';
                    }
                    $('#total_amount').parent().after(str);
                    $('#difference').html(e.data.month_more.avg_amount)

                }, 'json'
            )
        })
    </script>

    <div class="col-lg-7">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-info-sign"></span> 本月消费走势</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
                        <div id="recent_month_1" style="width: 100%;height:200px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-info-sign"></span> 近三月消费走势</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
                        <div id="recent_month_3" style="width: 100%;height:350px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-info-sign"></span> 恩格尔系数</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
                        <div id="engels_coefficient" style="width: 100%;height:350px;"></div>
                    </div>
                    <div class="col-lg-12">
                        <span>
                            <blockquote>
                                <p>恩格尔系数:食物支出金额÷总支出金额x100%=恩格尔系数</p>
                                <p>食物支出变动百分比÷总支出变动百分比x100%=食物支出对总支出的比率(R1)</p>
                                <p>食物支出变动百分比÷收入变动百分比x100%=食物支出对收入的比率(R2 又称为食物支出的收入弹性)</p>
                                <p>平均家庭恩格尔系数大于60%为贫穷；50%-60%为温饱；40%-50%为小康；30%-40%属于相对富裕；20%-30%为富足；20%以下为极其富裕</p>
                            </blockquote>
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<link rel="stylesheet" type="text/css" media="all" href="/assets/css/time_line.css">
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-info-sign"></span> 近期消费日志</h3>
    </div>
    <div class="panel-body">
        <ul class="timeline">
            <li>
                <div class="tldate">Apr 2014</div>
            </li>

            <li>
                <div class="tl-circ"></div>
                <div class="timeline-panel">
                    <div class="tl-heading">
                        <h4>Surprising Headline Right Here</h4>
                        <p>
                            <small class="text-muted"><i class="glyphicon glyphicon-time"></i> 3 hours ago</small>
                        </p>
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
                        <p>
                            <small class="text-muted"><i class="glyphicon glyphicon-time"></i> 4/07/2014</small>
                        </p>
                    </div>
                    <div class="tl-body">
                        <p>Hope the weather gets a bit nicer...</p>

                        <p>Y'know, with more sunlight.</p>
                    </div>
                </div>
            </li>

            <li>
                <div class="tldate">Mar 2014</div>
            </li>

            <li>
                <div class="tl-circ"></div>
                <div class="timeline-panel">
                    <div class="tl-heading">
                        <h4>New Apple Device Release Date</h4>
                        <p>
                            <small class="text-muted"><i class="glyphicon glyphicon-time"></i> 3/22/2014</small>
                        </p>
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
                        <p>
                            <small class="text-muted"><i class="glyphicon glyphicon-time"></i> 3/16/2014</small>
                        </p>
                    </div>
                    <div class="tl-body">
                        <p>Here you'll find some beautiful photography for your viewing pleasure, courtesy of <a
                                    href="http://lorempixel.com/">lorempixel</a>.</p>

                        <p>
                            <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1493305964027&di=7faa9a856045b10d0a52e114fb5407fe&imgtype=0&src=http%3A%2F%2Fs2.sinaimg.cn%2Fmw690%2F44a2d702tdf6617d7e4c1%26690"
                                 alt="lorem pixel"></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="tl-circ"></div>
                <div class="timeline-panel">
                    <div class="tl-heading">
                        <h4>Some Important Date!</h4>
                        <p>
                            <small class="text-muted"><i class="glyphicon glyphicon-time"></i> 3/03/2014</small>
                        </p>
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
                        <p>
                            <small class="text-muted"><i class="glyphicon glyphicon-time"></i> 3/01/2014</small>
                        </p>
                    </div>
                    <div class="tl-body">
                        <p>This might be a follow-up post with related info. Maybe we include some extra links, tweets,
                            user comments, photos, etc.</p>
                    </div>
                </div>
            </li>

            <li>
                <div class="tldate">Feb 2014</div>
            </li>

            <li class="timeline-inverted">
                <div class="tl-circ"></div>
                <div class="timeline-panel">
                    <div class="tl-heading">
                        <h4>The Winter Months</h4>
                        <p>
                            <small class="text-muted"><i class="glyphicon glyphicon-time"></i> 02/23/2014</small>
                        </p>
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
                        <p>
                            <small class="text-muted"><i class="glyphicon glyphicon-time"></i> 02/11/2014</small>
                        </p>
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
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('recent_month_1'));

    // 指定图表的配置项和数据
    var option = {
        title: {
//            text: '本月消费'
        },

        dataZoom: [
            {   // 这个dataZoom组件，默认控制x轴。
                type: 'slider', // 这个 dataZoom 组件是 slider 型 dataZoom 组件
                start: 50,      // 左边在 10% 的位置。
                end: 100         // 右边在 60% 的位置。
            },
            {   // 这个dataZoom组件，也控制x轴。
                type: 'inside', // 这个 dataZoom 组件是 inside 型 dataZoom 组件
                start: 50,      // 左边在 10% 的位置。
                end: 100         // 右边在 60% 的位置。
            }
        ],
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'cross',
                label: {
                    backgroundColor: '#6a7985'
                }
            }
        },

        legend: {
            data: []
        },
        xAxis: {
            boundaryGap: false,
            data: []
        },
        yAxis: {}
    };

    myChart.setOption(option);

    var url = '/account_api/index/getdatabytime';
    var data = {gid:1,type:1};
    var type = 'json';
    myChart.showLoading();
    var fun = function (e) {
        myChart.hideLoading();
        if (e.status === 1) {
            myChart.setOption({
                legend: {
                    data: e.legend_data
                },
                xAxis: {
                    data: e.xaxis_data
                },
                series: [
                    e.series[0],
                    e.series[1],
//                    e.series[2]
                    {
                        name: e.series[2].name,
                        type: e.series[2].type,
                        label: {
                            normal: {
                                show: true,
                                position: 'top',
                                formatter: function (params) {
                                    return params.data === 0 ? '' : params.data.replace(/.00/,'');
                                }
                            }
                        },
                        data: e.series[2].data
                    }
                ]
            });
        } else {
            alert(e.msg);
        }
    };
    $.post(url, data, fun, type);
</script>

<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart2 = echarts.init(document.getElementById('recent_month_3'));

    // 指定图表的配置项和数据
    var option2 = {
    title: {
//    text: '近三月消费一览'
    },
    tooltip: {},
    legend: {
    data:[]
    },
    xAxis: {
    data: []
    },
    yAxis: {},
    series: []
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart2.setOption(option2);

    var url = '/account_api/index/getdatabytime';
    var data = {gid:1,type:2};
    var type = 'json';
    myChart2.showLoading();
    var fun = function (e) {
        myChart2.hideLoading();
        if (e.status === 1) {
            myChart2.setOption({
                legend: {
                    data: e.legend_data
                },
                xAxis: {
                    data: e.xaxis_data
                },
                series: [
                    e.series[0],
                    e.series[1],
//                    e.series[2]
                    {
                        name: e.series[2].name,
                        type: e.series[2].type,
                        label: {
                            normal: {
                                show: true,
                                position: 'top',
                                formatter: function (params) {
                                    return params.data === 0 ? '' : params.data.replace(/.00/,'');
                                }
                            }
                        },
                        data: e.series[2].data
                    }
                ]
            });
        } else {
            alert(e.msg);
        }
    };
    $.post(url, data, fun, type);
</script>
<!---->
<!--<script type="text/javascript">-->
<!--    // 基于准备好的dom，初始化echarts实例-->
<!--    var myChart3 = echarts.init(document.getElementById('engels_coefficient'));-->
<!---->
<!--    // 指定图表的配置项和数据-->
<!--    var option3 = {-->
<!--    title: {-->
<!--    text: '示例'-->
<!--    },-->
<!--    tooltip: {},-->
<!--    legend: {-->
<!--    data:['销量']-->
<!--    },-->
<!--    xAxis: {-->
<!--    data: ["衬衫","羊毛衫","雪纺衫","裤子","高跟鞋","袜子"]-->
<!--    },-->
<!--    yAxis: {},-->
<!--    series: [{-->
<!--    name: '销量',-->
<!--    type: 'bar',-->
<!--    data: [5, 20, 36, 10, 10, 20]-->
<!--    }]-->
<!--    };-->
<!---->
<!--    // 使用刚指定的配置项和数据显示图表。-->
<!--    myChart3.setOption(option3);-->
<!--</script>-->
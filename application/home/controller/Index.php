<?php
namespace app\home\controller;

class Index
{
    // 空操作
    public function _empty(){
        return $this->_index();
    }

    // 空操作
    public function _index()
    {
        return '
        <style>
            .out{height: 100%;justify-content: center;align-items: center;display: flex;}
            .in{line-height: 2.8em;font-family: 黄彦文行书字体,良怀行书,行书,行楷,楷体;font-size: 30px;writing-mode: tb-rl;}
        </style>
        <div class="out">
            <div class="in">
            弃我去者<br>昨日之日不可留<br>
            乱我心者<br>今日之日多烦忧<br>
            长风万里送秋雁<br>对此可以酣高楼<br>
            蓬莱文章建安骨<br>中间小谢又清发<br>
            俱怀逸兴壮思飞<br>欲上青天揽明月<br>
            抽刀断水水更流<br>举杯消愁愁更愁<br>
            人生在世不称意<br>明朝散发弄扁舟<br>
            ——李白
            </div>
        </div>
        ';
    }

    // 首页
    public function index(){
        return view('index',['title' => lang('Home')]);
    }

    // 获取系统信息
    public function getSysInfo(){
        $command_arr = ['arch', 'uname', 'hostname'];

        for($i=0; $i < count($command_arr); $i++) {
            $system_msg[$command_arr[$i]] =exec($command_arr[$i]);
        }
        $system_msg['core'] = exec("grep 'core id' /proc/cpuinfo | sort -u | wc -l");
        $system_msg['uname_r'] = exec("uname -r");
        $system_msg['branch'] = exec("cat /etc/redhat-release");
        $system_msg['version'] = exec("uname -r");
        $system_msg['ip'] =$_SERVER['HTTP_HOST'];

        return $system_msg;
    }
}

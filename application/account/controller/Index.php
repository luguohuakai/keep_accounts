<?php
namespace app\account\controller;

use think\console\command\make\Model;
use think\Controller;

class Index extends Controller
{
    public function index()
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

    public function lst(){
        $bill = db('bill');

        $lst = $bill->field('id,create_time,update_time,goods,amount,giver')->paginate(10);
        $this->assign('lst', $lst);

        return view('lst',['lst'=>$lst]);
    }

    // 添加一笔账单 页面
    public function add(){
        return view('add');
    }

    // 添加一笔账单 操作
    public function add_handle(){
        $bill = db('bill');

        $data = [
            'create_time' => time(),
            'update_time' => time(),
            'goods' => input('post.goods'),
            'amount' => input('post.amount'),
            'giver' => input('post.giver'),
        ];

        $rs = $bill->insert($data);

        if($rs){
            $this->success('新增成功','/ac/add');
        }else{
            $this->error('新增失败');
        }
    }
}



















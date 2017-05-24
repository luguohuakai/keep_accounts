<?php
/**
 * Created by PhpStorm.
 * User: DM
 * Date: 2017/5/24
 * Time: 15:38
 */

namespace app\account_api\controller;


use think\Controller;

class Test extends Controller
{
    public function index(){
        $id = input('post.id',1);

        $re['id'] = $id;
        $re['name'] = 'maoge';

        return json($re);
    }
}
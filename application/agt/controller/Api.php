<?php
namespace app\agt\controller;

use think\Db;

class Api
{
    // 获取所有数据库
    public function getDatabases()
    {
        $rs = Db::query('show databases;');

        if($rs){
            $re['msg'] = '获取成功';
            $re['status'] = 1;
            $re['data'] = $rs;

            return json($re);
        }else{
            $re['msg'] = '获取失败';
            $re['status'] = 0;

            return json($re);
        }
    }

    // 获取所有表
    public function getTables(){
        $database = input('post.database');

        $rs = Db::connect("mysql://root:@127.0.0.1:3306/$database#utf8")->query("show tables");

        if($rs){
            $re['msg'] = '获取成功';
            $re['status'] = 1;
            $re['data'] = $rs;

            return json($re);
        }else{
            $re['msg'] = '获取失败';
            $re['status'] = 0;

            return json($re);
        }
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: DM
 * Date: 17/4/28
 * Time: 09:58
 */

namespace app\home\controller;


class Demo
{
    // 展示表格
    public function showTable(){
        return view();
    }

    // 展示表单
    public function showForm(){
        return view();
    }

    // 展示更多
    public function showMore(){
        return view();
    }

    // 邮件发送
    public function send_email(){
        $rs = send_email('1102313831@qq.com','maoge','<h1>Hello</h1><h2 style="color: red;">你好</h2>');
        dump($rs);
    }
}
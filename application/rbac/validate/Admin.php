<?php
/**
 * Created by PhpStorm.
 * User: DM
 * Date: 2017/5/30
 * Time: 12:02
 */

namespace app\rbac\validate;


use think\Validate;

class Admin extends Validate
{
    protected $rule = [
        'name' => 'require|max:20',
        'password' => 'require'
    ];

    protected $message = [
//        'name.require' => '昵称必须填写',
//        'name.max' => '昵称最大20个字符串',
//        'password.require' => '密码必须填写',
    ];

    protected $field = [
        'name' => '昵称',
        'password' => '密码',
    ];
}
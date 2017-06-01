<?php
namespace app\rbac\validate;


use think\Validate;

class Group extends Validate
{
    protected $rule = [
                                                                    'name' => 'require|max:20',
                                                    'status' => 'number',
            ];

    protected $message = [
    //        'name.require' => '昵称必须填写',
    //        'name.max' => '昵称最大20个字符串',
    //        'password.require' => '密码必须填写',
    ];

    protected $field = [
            'id' => '权限组ID',
            'name' => '组名',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
            'status' => '1正常 2删除',
        ];
}
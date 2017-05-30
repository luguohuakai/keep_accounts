<?php
namespace app\rbac\validate;


use think\Validate;

class Role extends Validate
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
            'id' => 'ID',
            'name' => '角色名',
            'status' => '状态 (1正常 2已删除)',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
        ];
}
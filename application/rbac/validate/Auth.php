<?php
namespace app\rbac\validate;


use think\Validate;

class Auth extends Validate
{
    protected $rule = [
                                                                    'name' => 'require|max:20',
                                                                        'rule' => 'require|max:100',
                                                    'status' => 'number',
                                                    'group_id' => 'number',
            ];

    protected $message = [
    //        'name.require' => '昵称必须填写',
    //        'name.max' => '昵称最大20个字符串',
    //        'password.require' => '密码必须填写',
    ];

    protected $field = [
            'id' => 'ID',
            'name' => '权限名称',
            'rule' => '路由规则',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
            'status' => '状态 (1正常 2已删除)',
            'group_id' => '权限组ID',
        ];
}

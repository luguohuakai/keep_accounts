<?php
namespace app\rbac\controller;

use app\rbac\model\AdminRole;
use app\rbac\model\RoleAuth;

class Index
{
    public function index()
    {
        // 所有管理员
        $all_admin = (new \app\rbac\model\Admin())->getAllAdmin();
        // 所有角色
        $all_role = (new \app\rbac\model\Role())->getAllRole();
        // 所有权限
        $all_auth = (new \app\rbac\model\Auth())->getAllAuth();

        return view('index',['all_admin' => $all_admin,'all_role' => $all_role,'all_auth' => $all_auth]);
    }

    // 根据admin_id获取所有role_id auth_id
    public function getRoleAndAuthByAdminId(){
        $admin_id = input('post.admin_id');

        $rs_admin_role = (new AdminRole())->getIdsByAdminId($admin_id);
        $rs_role_auth = [];
        if($rs_admin_role){
            $role_auth = new RoleAuth();
            foreach ($rs_admin_role as $value) {
                $r_a = $role_auth->getIdsByRoleId($value['role_id']);
                if($r_a){
                    $rs_role_auth[] = $r_a;
                }
            }
        }

        if($rs_role_auth || $rs_admin_role){
            $re['status'] = 1;
            $re['msg'] = '获取成功';
            $re['data']['role'] = $rs_admin_role;
            $re['data']['auth'] = $rs_role_auth;

            return json($re);
        }else{
            $re['status'] = 0;
            $re['msg'] = '为获取到相关数据';

            return json($re);
        }
    }
}

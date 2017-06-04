<?php
namespace app\rbac\controller;

use app\rbac\model\RoleAuth;
use think\Controller;
use think\Loader;

class Role extends Controller
{
    // 列表 分页
    public function lst(){
        $role = new \app\rbac\model\Role();
        $lst = $role->getList();
        $this->assign('lst', $lst);

        return view('lst');
    }

    // 添加 页面
    public function add(){
        return view('add');
    }

    // 添加 操作
    public function add_handle(){
        $validate = Loader::validate('Role');
        if(!$validate->check($_POST)){
            $this->error($validate->getError());
        }
        $role = new \app\rbac\model\Role($_POST);
        $rs = $role->allowField(true)->save();

        if(FALSE !== $rs){
            $this->success('新增成功','add');
        }else{
            $this->error('新增失败');
        }
    }

    // 修改 页面
    public function edit(){
        $id = input('param.id');

        $rs = \app\rbac\model\Role::get($id);
        $this->assign('rs',$rs);

        return view('edit');
    }

    // 修改 操作
    public function edit_handle(){
        $role = new \app\rbac\model\Role();
        $rs = $role->allowField(true)->save($_POST,['id' => $_POST['id']]);

        if(FALSE !== $rs){
            $this->success('修改成功','lst');
        }else{
            $this->error('修改失败');
        }
    }

    // 删除 软删除
    public function del_soft(){
        $id = input('param.id');

        $role = new \app\rbac\model\Role();
        $rs = $role->save(['status' => 2],['id' => $id]);

        if(FALSE !== $rs){
            $this->success('删除成功','lst');
        }else{
            $this->error('删除失败');
        }
    }

    // 删除 硬删除
    public function del_hard(){
        $id = input('param.id');

        $rs = \app\rbac\model\Role::destroy($id);

        if($rs){
            $this->success('删除成功','lst');
        }else{
            $this->error('删除失败');
        }
    }

    // 权限管理
    public function auth_manage(){
        // 所有角色
        $all_role = (new \app\rbac\model\Role())->getAllRole();
        // 所有权限
        $all_auth = (new \app\rbac\model\Auth())->getAllAuth();

        return view('auth_manage',['all_role' => $all_role,'all_auth' => $all_auth]);
    }

    // 根据role_id 获取 auth
    public function getAuthByRoleId(){
        $role_id = input('post.id');

        $rs = (new RoleAuth())->getAuthByRoleId($role_id);

        if($rs){
            $re['status'] = 1;
            $re['msg'] = '获取成功';
            $re['data'] = $rs;

            return json($re);
        }else{
            $re['status'] = 0;
            $re['msg'] = '未获取到相关数据';

            return json($re);
        }
    }

    // 为选中的角色分配权限
    public function bindAuthForRole(){
        $bind = input('post.bind');
        $role_id = input('post.role_id');
        $auth_id = input('post.auth_id');

        if($bind == 'true'){  // 去绑定
            $r_a = new RoleAuth($_POST);
            $rs = $r_a->allowField(true)->save();
        }else{  // 去解绑
            $r_a = RoleAuth::get(['role_id'=>$role_id,'auth_id'=>$auth_id]);
//            $rs = RoleAuth::destroy(['role_id'=>$role_id,'auth_id'=>$auth_id]);
            $rs = $r_a->delete();
        }
        if($rs){
            $re['status'] = 1;
            $re['msg'] = '操作成功';
            $re['data'] = $rs;

            return json($re);
        }else{
            $re['status'] = 0;
            $re['msg'] = '操作失败';

            return json($re);
        }
    }
}
<?php
namespace app\rbac\controller;

use think\Controller;
use think\Loader;

class Admin extends Controller
{
    // 列表 分页
    public function lst(){
        $admin = new \app\rbac\model\Admin();
        $lst = $admin->getList();
        $this->assign('lst', $lst);

        return view('lst');
    }

    // 添加 页面
    public function add(){
        return view('add');
    }

    // 添加 操作
    public function add_handle(){
        $validate = Loader::validate('Admin');
        if(!$validate->check($_POST)){
            $this->error($validate->getError());
        }
        $admin = new \app\rbac\model\Admin($_POST);
        $rs = $admin->allowField(true)->save();

        if(FALSE !== $rs){
            $this->success('新增成功','add');
        }else{
            $this->error('新增失败');
        }
    }

    // 修改 页面
    public function edit(){
        $id = input('param.id');

        $rs = \app\rbac\model\Admin::get($id);
        $this->assign('rs',$rs);

        return view('edit');
    }

    // 修改 操作
    public function edit_handle(){
        $admin = new \app\rbac\model\Admin();
//        if(isset($_POST['password']) && $_POST['password'] != $admin->getFieldById($_POST['id'],'password')){
//            $_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);
//        }
        $rs = $admin->allowField(['name','password','avatar'])->save($_POST,['id' => $_POST['id']]);

        if(FALSE !== $rs){
            $this->success('修改成功','lst');
        }else{
            $this->error('修改失败');
        }
    }

    // 删除 软删除
    public function del_soft(){
        $id = input('param.id');

        $admin = new \app\rbac\model\Admin();
        $rs = $admin->save(['status' => 2],['id' => $id]);

        if(FALSE !== $rs){
            $this->success('删除成功','lst');
        }else{
            $this->error('删除失败');
        }
    }

    // 删除 硬删除
    public function del_hard(){
        $id = input('param.id');

        $rs = \app\rbac\model\Admin::destroy($id);

        if($rs){
            $this->success('删除成功','lst');
        }else{
            $this->error('删除失败');
        }
    }
}
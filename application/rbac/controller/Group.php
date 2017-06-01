<?php
namespace app\rbac\controller;

use think\Controller;
use think\Loader;

class Group extends Controller
{
    // 列表 分页
    public function lst(){
        $group = new \app\rbac\model\Group();
        $lst = $group->getList();
        $this->assign('lst', $lst);

        return view('lst');
    }

    // 添加 页面
    public function add(){
        return view('add');
    }

    // 添加 操作
    public function add_handle(){
        $validate = Loader::validate('Group');
        if(!$validate->check($_POST)){
            $this->error($validate->getError());
        }
        $group = new \app\rbac\model\Group($_POST);
        $rs = $group->allowField(true)->save();

        if(FALSE !== $rs){
            $this->success('新增成功','add');
        }else{
            $this->error('新增失败');
        }
    }

    // 修改 页面
    public function edit(){
        $id = input('param.id');

        $rs = \app\rbac\model\Group::get($id);
        $this->assign('rs',$rs);

        return view('edit');
    }

    // 修改 操作
    public function edit_handle(){
        $group = new \app\rbac\model\Group();
        $rs = $group->allowField(true)->save($_POST,['id' => $_POST['id']]);

        if(FALSE !== $rs){
            $this->success('修改成功','lst');
        }else{
            $this->error('修改失败');
        }
    }

    // 删除 软删除
    public function del_soft(){
        $id = input('param.id');

        $group = new \app\rbac\model\Group();
        $rs = $group->save(['status' => 2],['id' => $id]);

        if(FALSE !== $rs){
            $this->success('删除成功','lst');
        }else{
            $this->error('删除失败');
        }
    }

    // 删除 硬删除
    public function del_hard(){
        $id = input('param.id');

        $rs = \app\rbac\model\Group::destroy($id);

        if($rs){
            $this->success('删除成功','lst');
        }else{
            $this->error('删除失败');
        }
    }
}
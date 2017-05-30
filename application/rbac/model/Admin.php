<?php
namespace app\rbac\model;

use think\Model;

class Admin extends Model
{
    // 自动完成
    protected $autoWriteTimestamp = true;
    protected $auto = [];
    protected $insert = ['status' => 1,'password'];
    protected $update = [];

    protected static function init()
    {
//        parent::init(); // TODO: Change the autogenerated stub
//        self::beforeUpdate(function ($admin){
////            dump($admin);die;
//            dump((self::get($admin->id))['password']);die;
////            if()
//        });

//        self::event('before_update',function(&$data){
//            dump($data);die;
//        });
    }

    protected function setPasswordAttr($value){
        if($value == self::getFieldById(input('post.id'),'password')){
            return $value;
        }else{
            return password_hash($value,PASSWORD_DEFAULT);
        }
    }

    // admin 表分页查询
    public function getList()
    {
        $rs = $this
            ->field('id,name,password,create_time,update_time,avatar,status')
            ->order('create_time desc')
            ->paginate(10);
        if($rs){
            return $rs;
        }else{
            return false;
        }
    }

    // 修改密码
    private function modify_password($id,$pwd){
        $pwd = password_hash($pwd,PASSWORD_DEFAULT);
        $rs = $this->save(['password' => $pwd],['id' => $id]);

        if(FALSE !== $rs){
            return true;
        }else{
            return false;
        }
    }
}
<?php
namespace app\rbac\model;

use think\Model;

class Role extends Model
{
    // 自动完成
    protected $autoWriteTimestamp = true;
    protected $auto = [];
    protected $insert = [];
    protected $update = [];

    protected static function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    // role 表分页查询
    public function getList()
    {
        $rs = $this
            ->field('id,name,status')
            ->order('create_time desc')
            ->paginate(10);
        if($rs){
            return $rs;
        }else{
            return false;
        }
    }
}
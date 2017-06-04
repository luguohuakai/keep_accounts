<?php
namespace app\rbac\model;

use think\Model;

class RoleAuth extends Model
{

    public function getIdsByRoleId($role_id)
    {
        $rs = $this
            ->where('role_id',$role_id)
            ->field('auth_id')
            ->select();

        return $rs;
    }

    public function getAuthByRoleId($role_id)
    {
        $rs = $this
            ->field('role_id,auth_id')
            ->where('role_id',$role_id)
            ->select();

        if ($rs){
            return $rs;
        }else{
            return false;
        }
    }
}
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
}
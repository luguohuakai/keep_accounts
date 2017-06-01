<?php
namespace app\rbac\model;

use think\Model;

class AdminRole extends Model
{

    public function getIdsByAdminId($admin_id)
    {
        $rs = $this
            ->where('admin_id',$admin_id)
            ->field('role_id')
            ->select();

        return $rs;
    }
}
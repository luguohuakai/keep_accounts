<?php
/**
 * Created by PhpStorm.
 * User: DM
 * Date: 2017/5/15
 * Time: 11:40
 */

namespace app\account\model;


use think\Model;

class UsersGroup extends Model
{
    // 根据group_id获取成员
    public function getMembersByGroupId($group_id){
        $rs = $this->where('gid',$group_id)->field('gid,uid')->select();
        if($rs){
            $users = new Users();
            foreach ($rs as &$r) {
                $r['user_name'] = $users->getFieldById($r['uid'],'user_name');
            }

            return $rs;
        }else{
            return false;
        }
    }
}
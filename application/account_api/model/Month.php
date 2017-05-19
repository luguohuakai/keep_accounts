<?php
/**
 * Created by PhpStorm.
 * User: DM
 * Date: 2017/5/15
 * Time: 11:40
 */

namespace app\account_api\model;


use think\Model;

class Month extends Model
{
    // 根据gid获取月数据
    public function getMonth($gid,$year_month){
        $rs = $this
            ->field('id,create_time,uid,total_amount,gid,year_month')
            ->where('gid',$gid)
            ->where('year_month',$year_month)
            ->select();
        if($rs){
            $users = new Users();
            foreach ($rs as &$r) {
                $r['user_name'] =  $users->getFieldById($r['uid'],'user_name');
            }
            return $rs;
        }else{
            return false;
        }
    }
}
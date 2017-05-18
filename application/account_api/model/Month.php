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
    public function getMonth($gid,$year_month_11,$year_month_10){
        $rs = $this
            ->field('id,create_time,uid,total_amount,gid')
            ->where('gid',$gid)
            ->whereBetween('create_time',[$year_month_11,$year_month_10])
            ->select();
        echo $this->getLastSql();
        dump($rs);die;
        if($rs){
            return $rs;
        }else{
            return false;
        }
    }
}
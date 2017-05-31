<?php
/**
 * Created by PhpStorm.
 * User: DM
 * Date: 2017/5/15
 * Time: 11:40
 */

namespace app\account\model;


use app\common\Tools;
use think\Model;

class Bill extends Model
{
    // 根据用户id获取用户每日数据
    public function getSeriesDataByUid($uid,$gid,$start_time,$end_time){
        $data = [];

        $rs = $this
            ->field('from_unixtime(buy_time,\'%Y-%m-%d\') as buy_date,sum(amount) as amount')
            ->where('gid',$gid)
            ->where('giver',$uid)
            ->whereBetween('buy_time',[$start_time,$end_time])
            ->order('buy_date')
            ->group('buy_date')
            ->select();
        if($rs){
            $xaxis_date = Tools::format_time_to_data($start_time,$end_time);
            foreach ($xaxis_date as $k => $item) {
                foreach ($rs as $r) {
                    if($r['buy_date'] == $item){
                        $data[$k] = $r['amount'];
                        break;
                    }else{
                        $data[$k] = 0;
                    }
                }
            }

            return $data;
        }else{
            return false;
        }
    }

    // 根据gid获取每日总数据
    public function getSeriesDataByGid($gid,$start_time,$end_time){
        $data = [];

        $rs = $this
            ->field('from_unixtime(buy_time,\'%Y-%m-%d\') as buy_date,sum(amount) as amount')
            ->where('gid',$gid)
            ->whereBetween('buy_time',[$start_time,$end_time])
            ->order('buy_date')
            ->group('buy_date')
            ->select();
        if($rs){
            $xaxis_date = Tools::format_time_to_data($start_time,$end_time);
            foreach ($xaxis_date as $k => $item) {
                foreach ($rs as $r) {
                    if($r['buy_date'] == $item){
                        $data[$k] = $r['amount'];
                        break;
                    }else{
                        $data[$k] = 0;
                    }
                }
            }

            return $data;
        }else{
            return false;
        }
    }

    // 按时间倒序获取最近消费
    public function getTimeLineData($gid, $page, $size)
    {
        $rs = $this->field('id,buy_time,goods,amount,giver')
            ->where('gid',$gid)
            ->order('buy_time desc')
            ->page($page,$size)
            ->select();

        if($rs){
            $users = new Users();
            $arr = [];
            foreach ($rs as &$r) {
                $d = date('Y-m-d',$r['buy_time']);
                $r['buy_time'] = date('H : i : s',$r['buy_time']);
                $r['user_name'] = $users->getFieldById($r['giver'],'user_name');
                $arr[$d][] = $r;
            }

            return $arr;
        }else{
            return false;
        }
    }
}
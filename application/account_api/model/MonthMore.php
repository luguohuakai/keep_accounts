<?php
/**
 * Created by PhpStorm.
 * User: DM
 * Date: 2017/5/15
 * Time: 11:40
 */

namespace app\account_api\model;


use think\Model;

class MonthMore extends Model
{
    // 根据 gid year_month 获取
    public function getMonthMore($gid,$year_month){
        $rs = $this
            ->where('gid',$gid)
            ->where('year_month',$year_month)
            ->field('id,year_month,create_time,total_amount,avg_amount,gid')
            ->select();
        if ($rs){
            return $rs;
        }else{
            return false;
        }
    }

    // 自动结算
    public function autoClear($gid,$year_month_11,$year_month_10){
        $bill = new Bill();
        $users_group = new UsersGroup();
        $month = new Month();

        $rs = $bill
            ->where('gid',$gid)
            ->whereBetween('create_time',[$year_month_11,$year_month_10])
            ->sum('amount');

        // 查询当前组有多少人
        $count = $users_group->where('gid',$gid)->count();
//        $rs_users_group = $users_group->where('gid',$gid)->field('uid')->select();
//        $uids = [];
//        foreach ($rs_users_group as $item) {
//            $uids[] = $item['uid'];
//        }

        if($rs){
            $bill->startTrans();
            $data['year_month'] = date('Y-m');
            $data['create_time'] = time();
            $data['total_amount'] = $rs['tp_sum'];
            $data['avg_amount'] = $rs['tp_sum'] / $count;
            $rs_insert = $this->insert($data);

            $rsss = $bill
                ->where('gid',$gid)
                ->whereBetween('create_time',[$year_month_11,$year_month_10])
                ->field('sum(amount) as amount,giver')
                ->group('giver')
                ->select();

            if($rsss){
                foreach ($rsss as $k => $v) {
                    $data2[$k]['total_amount'] = $rsss['amount'];
                    $data2[$k]['uid'] = $rsss['giver'];
                    $data2[$k]['gid'] = $gid;
                    $data2[$k]['create_time'] = time();
                }
                if(isset($data2)){
                    $rs_save_all = $month->saveAll($data2);
                    if($rs_insert and $rs_save_all){
                        $bill->commit();
                    }else{
                        $bill->rollback();
                    }
                }else{
                    $bill->rollback();
                    return false;
                }
            }else{
                $bill->rollback();
                return false;
            }
        }else{
            return false;
        }
    }
}
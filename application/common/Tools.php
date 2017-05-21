<?php
/**
 * Created by PhpStorm.
 * User: DM
 * Date: 2017/5/21
 * Time: 0:32
 */

namespace app\common;


class Tools
{
    public static function format_time_to_data($start_time,$end_time){
        $data = [];
        $_start_time = strtotime(date('Y-m-d',$start_time));
        $_end_time = strtotime(date('Y-m-d',$end_time));
        $what = ( $_end_time - $_start_time ) / ( 24 * 60 * 60 );
        for($i = 0;$i <= $what;$i++){
            $data[] = date('Y-m-d',$_start_time + $i * 24 * 60 * 60);
        }
        return $data;
    }
}
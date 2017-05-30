<?php
namespace app\agt\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {
        $all = scandir(APP_PATH);
        $dir = [];
        if($all){
            foreach ($all as $item) {
                if(is_dir(APP_PATH . $item) and ($item != '.' and $item != '..')){
                    $dir[] = $item;
                }
            }
        }
        $this->assign('dir',$dir);

        return view();
    }

    // 自动生成控制器 模型 视图
    public function generation(){
        define('AGT_PATH',APP_PATH . 'agt/template/');
        $database = input('post.database');
        $table = input('post.table');
        $module = input('post.module');
        // 无表前缀表名
        $table_name = substr($table,strpos($table,'_') + 1);

        $type = config('database.type');
        $username = config('database.username');
        $hostname = config('database.hostname');
        $hostport = config('database.hostport');
        $charset = config('database.charset');

        $db = Db::connect("$type://$username:@$hostname:$hostport/$database#$charset");
        // 获取表信息
        $rs_table_info = $db->query("show table status WHERE Name = '$table'");
        // 获取列信息
        $rs_col_info = $db->query("SHOW FULL FIELDS FROM $table");

//        dump($rs_col_info);die;

        $field = [];
        foreach ($rs_col_info as $r_c_i) {
            $field[] = $r_c_i['Field'];
        }
        $field_str = implode(',',$field);

        // 从模板生成控制器文件
        ob_start();
        include(AGT_PATH . 'Controller.php');
        $str = ob_get_clean();
        $file_controller = APP_PATH . $module . '/Controller/' . ucfirst($table_name) . '.php';
        if(!file_exists($file_controller)){
            file_put_contents($file_controller,"<?php\r\n" . $str);
        }
        // 从模板生成模型文件
        ob_start();
        include(AGT_PATH . 'Model.php');
        $str = ob_get_clean();
        $file_model = APP_PATH . $module . '/model/' . ucfirst($table_name) . '.php';
        if(!file_exists($file_model)){
            file_put_contents($file_model,"<?php\r\n" . $str);
        }
        // 从模板生成视图文件 lst add edit
        ob_start();
        include(AGT_PATH . 'lst.php');
        $str = ob_get_clean();
        $file_lst = APP_PATH . $module . '/view/' . $table_name .  '/' . 'lst.php';
        if(!file_exists($file_lst)){
            file_put_contents($file_lst,$str);
        }
        ob_start();
        include(AGT_PATH . 'add.php');
        $str = ob_get_clean();
        $file_add = APP_PATH . $module . '/view/' . $table_name .  '/' . 'add.php';
        if(!file_exists($file_add)){
            file_put_contents($file_add,$str);
        }
        ob_start();
        include(AGT_PATH . 'edit.php');
        $str = ob_get_clean();
        $file_edit = APP_PATH . $module . '/view/' . $table_name .  '/' . 'edit.php';
        if(!file_exists($file_edit)){
            file_put_contents($file_edit,$str);
        }
        // 从模板生成验证文件
        ob_start();
        include(AGT_PATH . 'Validate.php');
        $str = ob_get_clean();
        $file_validate = APP_PATH . $module . '/validate/' . ucfirst($table_name) . '.php';
        if(!file_exists($file_validate)){
            file_put_contents($file_validate,"<?php\r\n" . $str);
        }

        $this->success('OK',"/$module/$table_name/lst");
        redirect(url("$module/$table_name/lst.php"));
    }
}

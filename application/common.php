<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

if (!function_exists('send_email')) {
    /**
     * 功能函数 - 发送email
     * @param string | array $toemail 要发送到的email地址, 多个使用一维数组即可
     * @param string $subject email标题
     * @param string $body email主体内容
     * @return bool
     * @throws phpmailerException
     */
    function send_email($toemail, $subject, $body)
    {
        //vendor模式
//        vendor('phpmailer.phpmailer#class');
//        $mail = new PHPMailer();

        //namespace 模式;
        $mail = new PHPMailer;
        //是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
        $mail->SMTPDebug = 0;

        //使用smtp鉴权方式发送邮件，当然你可以选择pop方式 sendmail方式等 本文不做详解
        //可以参考http://phpmailer.github.io/PHPMailer/当中的详细介绍
        $mail->isSMTP();
        //加密方式 "ssl" or "tls"
        $mail->SMTPSecure = config('email_config.secure'); //这里要注意, QQ发送邮件使用的ssl方式,如果不设置, 则会失败! 请认真查看下面的配置文件!!!
        //smtp需要鉴权 这个必须是true
        $mail->SMTPAuth = true;
        //链接qq域名邮箱的服务器地址
        $mail->Host = config('email_config.host');
        //设置ssl连接smtp服务器的远程服务器端口号 可选465或587
        $mail->Port = config('email_config.port');
        //smtp登录的账号 这里填入字符串格式的qq号即可
        $mail->Username = config('email_config.username');
        //smtp登录的密码 这里填入“独立密码” 若为设置“独立密码”则填入登录qq的密码 建议设置“独立密码”
        $mail->Password = config('email_config.psw');
        //设置发件人邮箱地址 这里填入上述提到的“发件人邮箱”
        $mail->From = config('email_config.From');
        //设置发件人姓名（昵称） 任意内容，显示在收件人邮件的发件人邮箱地址前的发件人姓名
        $mail->FromName = config('email_config.FromName');

        //设置发送的邮件的编码 可选GB2312 我喜欢utf-8 据说utf8在某些客户端收信下会乱码
        $mail->CharSet = 'UTF-8';
        //邮件正文是否为html编码 注意此处是一个方法 不再是属性 true或false
        $mail->isHTML(true);
        //设置收件人邮箱地址 该方法有两个参数 第一个参数为收件人邮箱地址 第二参数为给该地址设置的昵称 不同的邮箱系统会自动进行处理变动 这里第二个参数的意义不大
        // 添加收件人地址，可以多次使用来添加多个收件人
        if (is_array($toemail)) {
            foreach ($toemail as $to_email) {
                $mail->AddAddress($to_email);
            }
        } else {
            $mail->AddAddress($toemail);
        }
        //添加该邮件的主题
        $mail->Subject = $subject;
        //添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取本地的html文件
        $mail->Body = $body;

        //为该邮件添加附件 该方法也有两个参数 第一个参数为附件存放的目录（相对目录、或绝对目录均可） 第二参数为在邮件附件中该附件的名称
        //$mail->addAttachment('./d.jpg','mm.jpg');
        //同样该方法可以多次调用 上传多个附件
        //$mail->addAttachment('./Jlib-1.1.0.js','Jlib.js');
        //dump($mail);exit;

        //发送命令 返回布尔值
        //PS：经过测试，要是收件人不存在，若不出现错误依然返回true 也就是说在发送之前 自己需要些方法实现检测该邮箱是否真实有效
        $rs = $mail->send();

        //简单的判断与提示信息
        if ($rs === true) {
            //echo 'success';
            return true;
        } else {
            //dump($mail->ErrorInfo);
            return false;
        }
    }
}

if (!function_exists('out_to_excel')) {
    function out_to_excel($data, $name = 'Excel')
    {
        error_reporting(E_ALL);
        date_default_timezone_set('Europe/London');
        $objPHPExcel = new PHPExcel();

        /*以下是一些设置 ，什么作者  标题啊之类的*/
        $objPHPExcel->getProperties()->setCreator("脆香甜")
            ->setLastModifiedBy("脆香甜")
            ->setTitle("数据EXCEL导出")
            ->setSubject("数据EXCEL导出")
            ->setDescription("备份数据")
            ->setKeywords("excel")
            ->setCategory("result file");
        /*以下就是对处理Excel里的数据， 横着取数据，主要是这一步，其他基本都不要改*/
        $i = 1;
        foreach ($data as $k => $v) {
            $j = ord('A');
            $k = 0;
            foreach ($v as $kk => $vv) {
                if ($i != 1) {
                    $objPHPExcel->setActiveSheetIndex(0)
                        //Excel的第A列，uid是你查出数组的键值，下面以此类推
                        ->setCellValue(chr($j) . $i, $vv);
                } else {
                    $objPHPExcel->setActiveSheetIndex(0)
                        //Excel的第A列，uid是你查出数组的键值，下面以此类推
                        ->setCellValue(chr($j) . 1, $kk)
                        ->setCellValue(chr($j) . 2, $vv);
                    if ($k == count($v) - 1) {
                        $i++;
                    }
                    $k++;
                }
                $j++;
            }
            $i++;
        }

        $objPHPExcel->getActiveSheet()->setTitle('User');
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $name . '.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }
}

if (!function_exists('excel_to_database')) {
    function excel_to_database()
    {
        if (!empty ($_FILES ['file_excel'] ['name'])) {
            $tmp_file = $_FILES ['file_excel'] ['tmp_name'];
            $file_types = explode(".", $_FILES ['file_excel'] ['name']);
            $file_type = $file_types [count($file_types) - 1];

            /*判别是不是.xls文件，判别是不是excel文件*/
            if (strtolower($file_type) != "xls") {
                $this->error('不是Excel文件，重新上传');
            }

            /*设置上传路径*/
            $savePath = SITE_PATH . '/public/upfile/Excel/';

            /*以时间来命名上传的文件*/
            $str = date('Ymdhis');
            $file_name = $str . "." . $file_type;

            /*是否上传成功*/
            if (!copy($tmp_file, $savePath . $file_name)) {
                $this->error('上传失败');
            }

            /*
        
               *对上传的Excel数据进行处理生成编程数据,这个函数会在下面第三步的ExcelToArray类中
        
              注意：这里调用执行了第三步类里面的read函数，把Excel转化为数组并返回给$res,再进行数据库写入
        
            */
            $res = Service('ExcelToArray')->read($savePath . $file_name);

            /*
         
                 重要代码 解决Thinkphp M、D方法不能调用的问题  
         
                 如果在thinkphp中遇到M 、D方法失效时就加入下面一句代码
         
             */
            //spl_autoload_register ( array ('Think', 'autoload' ) );

            /*对生成的数组进行数据库的写入*/
            foreach ($res as $k => $v) {
                if ($k != 0) {
                    $data ['uid'] = $v [0];
                    $data ['password'] = sha1('111111');
                    $data ['email'] = $v [1];

                    $data ['uname'] = $v [3];

                    $data ['institute'] = $v [4];
                    $result = M('user')->add($data);
                    if (!$result) {
                        $this->error('导入数据库失败');
                    }
                }
            }

        }
    }
}
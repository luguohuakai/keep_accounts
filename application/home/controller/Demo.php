<?php
/**
 * Created by PhpStorm.
 * User: DM
 * Date: 17/4/28
 * Time: 09:58
 */

namespace app\home\controller;

use PHPExcel;
use PHPExcel_IOFactory;
use think\Exception;

class Demo
{
    // 展示表格
    public function showTable()
    {
        return view();
    }

    // 展示表单
    public function showForm()
    {
        return view();
    }

    // 展示更多
    public function showMore()
    {
        return view();
    }

    // 邮件发送
    public function sendEmail()
    {
        $rs = send_email('769245396@qq.com', 'maoge', "<table style='width: 99.8%; '>
    <tbody>
        <tr>
            <td id='QQMAILSTATIONERY' style='background:url(https://rescdn.qqmail.com/zh_CN/htmledition/images/xinzhi/bg/a_08.jpg) no-repeat #f3f3eb; min-height:550px; padding: 100px 55px 200px 120px;'>
                <font size='5'>
                    <span style='font-family: 楷体,楷体_GB2312;'>
                        <span style='color: rgb(153, 51, 0);'>
                            2017-05 已结算
                        </span>
                    </span>
                </font>
                <br>
                <blockquote style='margin: 0.8em 0px 0.8em 2em; padding: 0px 0px 0px 0.7em; border-left: 2px solid rgb(221, 221, 221);' formatblock='1'>
                    <font size='2'>
                        2016-09-12
                        <br>
                        2016-09-12
                    </font>
                    <br>
                </blockquote>
                <blockquote style='margin: 0.8em 0px 0.8em 2em; padding: 0px 0px 0px 0.7em; border-left: 2px solid rgb(221, 221, 221);' formatblock='1'>
                    <img src='https://rescdn.qqmail.com/zh_CN/images/mo/EMOJI/077.png'>
                    总消费
                    <br>
                    <span style='color: rgb(255, 0, 0);'>
                        ￥456.60
                    </span>
                    <br>
                </blockquote>
                <blockquote style='margin: 0.8em 0px 0.8em 2em; padding: 0px 0px 0px 0.7em; border-left: 2px solid rgb(221, 221, 221);' formatblock='1'>
                    <img src='https://rescdn.qqmail.com/zh_CN/images/mo/EMOJI/103.png'>
                    maoge
                    <br>
                    <font size='2'>
                        支出 :
                    </font>
                    <span style='color: rgb(255, 0, 0);'>
                        <font size='2'>
                        </font>
                        ￥372.50
                    </span>
                    <br>
                    <font size='2'>
                        应收 :
                    </font>
                    <span style='color: rgb(255, 0, 0);'>
                        ￥144.2
                    </span>
                    <br>
                </blockquote>
                <blockquote style='margin: 0.8em 0px 0.8em 2em; padding: 0px 0px 0px 0.7em; border-left: 2px solid rgb(221, 221, 221);' formatblock='1'>
                    <img src='https://rescdn.qqmail.com/zh_CN/images/mo/EMOJI/103.png'>
                    maoge
                    <br>
                    <font size='2'>
                        支出 :
                    </font>
                    <span style='color: rgb(255, 0, 0);'>
                        ￥372 .50
                    </span>
                    <br>
                    <font size='2'>
                        应收 :
                    </font>
                    <span style='color: rgb(255, 0, 0);'>
                        ￥144.2
                    </span>
                    <br>
                </blockquote>
                <blockquote style='margin: 0.8em 0px 0.8em 2em; padding: 0px 0px 0px 0.7em; border-left: 2px solid rgb(221, 221, 221);' formatblock='1'>
                    <img src='https://rescdn.qqmail.com/zh_CN/images/mo/EMOJI/050.png'>
                    平均
                    <br>
                    <span style='color: rgb(255, 0, 0);'>
                        ￥228.3000
                    </span>
                    <br>
                </blockquote>
            </td>
        </tr>
    </tbody>
</table>");
        dump($rs);
    }

    // 导出到excel
    public function outToExcel()
    {
        $rs = [['name' => 'zs', 'age' => 12, 'sex' => '男'], ['name' => 'xh', 'age' => 15, 'sex' => '女']];
        $rss = out_to_excel($rs);
        dump($rss);
    }

    // 导出到excel
    public function outToExcel2()
    {
        $objPHPExcel = new PHPExcel();
        // 第一步 设置文件属性
        $objPHPExcel
            ->getProperties()//获得文件属性对象，给下文提供设置资源
            ->setCreator('脆香甜')//设置文件的创建者
            ->setLastModifiedBy('脆香甜')//设置最后修改者
            ->setTitle('excel_demo1')//设置标题
            ->setSubject('excel_demo2')//设置主题
            ->setDescription('excel_demo3')//设置描述
            ->setKeywords('excel_demo4')//设置标记
            ->setCategory('excel_demo5');//设置类别
        // 第二步 给表格添加数据
        $objPHPExcel
            ->setActiveSheetIndex(0)//设置第一个内置表（一个xls文件里可以有多个表）为活动的
            ->setCellValue('A1', 'Hello')//给表的单元格设置数据
            ->setCellValue('B2', 'world!')//数据格式可以为字符串
            ->setCellValue('C1', 12)//数字型
            ->setCellValue('D2', 122)
            ->setCellValue('D3', true)//布尔型
            ->setCellValue('D4', '=SUM(C1:D2)');//公式
        // 第三步 得到当前活动的表,注意下文教程中会经常用到$objActSheet
        $objActSheet = $objPHPExcel->getActiveSheet();
        $objActSheet->setTitle('excel_demo6');//给当前活动的表设置名称

        // 直接生成一个文件
//        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//        $rs1 = $objWriter->save('myexchel.xlsx');
//        dump($rs1);//null

        // 提示下载文件 excel2003
//        header('Content-Type: application/vnd.ms-excel');
//        header('Content-Disposition: attachment;filename="01simple.xls"');
//        header('Cache-Control: max-age=0');
//        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//        $objWriter->save('php://output');
//        exit;

        // 提示下载文件 excel2007
//        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//        header('Content-Disposition: attachment;filename="01simple.xlsx"');
//        header('Cache-Control: max-age=0');
////        try{
//            $objWriter = PHPExcel_IOFactory:: createWriter($objPHPExcel, 'Excel2007');
//            $objWriter->save('php://output');
////        }catch (Exception $e){
////            echo $e->getMessage();
////            die('123');
////        }
//        exit;

        // Redirect output to a client’s web browser (Excel2007)
//        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//        header('Content-Disposition: attachment;filename="01simple.xlsx"');
//        header('Cache-Control: max-age=0');
//// If you're serving to IE 9, then the following may be needed
//        header('Cache-Control: max-age=1');
//
//// If you're serving to IE over SSL, then the following may be needed
//        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
//        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
//        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
//        header ('Pragma: public'); // HTTP/1.0
//
//        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//        $objWriter->save('php://output');
//        exit;


        // 提示下载文件 pdf 不支持?
//        $rendererName = \PHPExcel_Settings::PDF_RENDERER_MPDF;
//        $rendererLibraryPath = '../vendor/mpdf/mpdf';
//        if (!\PHPExcel_Settings::setPdfRenderer(
//            $rendererName,
//            $rendererLibraryPath
//        )) {
//            die(
//                'NOTICE: Please set the $rendererName and $rendererLibraryPath values' .
//                '<br />' .
//                'at the top of this script as appropriate for your directory structure'
//            );
//        }
//        header('Content-Type: application/pdf');
//        header('Content-Disposition: attachment;filename="01simple.pdf"');
//        header('Cache-Control: max-age=0');
//        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
//        $objWriter->save('php://output');
//        exit;

        // 生成一个pdf文件
//        $rendererName = \PHPExcel_Settings::PDF_RENDERER_MPDF;
//        $rendererLibraryPath = '../vendor/mpdf/mpdf';
//        if (!\PHPExcel_Settings::setPdfRenderer(
//            $rendererName,
//            $rendererLibraryPath
//        )) {
//            die(
//                'NOTICE: Please set the $rendererName and $rendererLibraryPath values' .
//                '<br />' .
//                'at the top of this script as appropriate for your directory structure'
//            );
//        }
//        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
//        $rs2 = $objWriter->save('a.pdf');
//        dump($rs2);die;

        // 生成CSV文件
//        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV')
//            ->setDelimiter(',')//设置分隔符
//            ->setEnclosure('"')//设置包围符
//            ->setLineEnding("\r\n")//设置行分隔符
//            ->setSheetIndex(0)//设置活动表
//            ->save(str_replace('.php', '.csv', __FILE__));
//        dump($objWriter);die;

        // 生成HTML文件
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'HTML');//将$objPHPExcel对象转换成html格式的
        $objWriter->setSheetIndex(0);  //设置活动表
        //$objWriter->setImagesRoot('http://www.example.com');
        $objWriter->save(str_replace('.php', '.htm', __FILE__));//保存文件
    }
    
    // 测试接口
    public function toolTips(){
        sleep(1);
        $re['msg'] = '加载成功';
        $re['status'] = 1;
        $re['data'] = '
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Panel_title</h3>
    </div>
    <div class="panel-body">
        Panel_content
    </div>
</div>
        ';

        return json($re);
    }
}













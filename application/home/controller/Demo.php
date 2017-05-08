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
        $rs = send_email('1102313831@qq.com', 'maoge', '<h1>Hello</h1><h2 style="color: red;">你好</h2>');
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
}













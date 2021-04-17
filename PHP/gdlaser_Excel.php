<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/5/20
 * Time: 20:41
 */

//导出文创赛详细信息


require_once "../PHPExcel/Classes/PHPExcel.php";
require_once "../BaseSql.php";


$base=new BaseSql();
//连接数据库
$mysqli = $base->mysqlConn('laserfair_com');

//32
$sql="SELECT `id`,`title`,`description`,`writer`,`source`,`create_time`,`update_time` FROM `gdlaser_news` WHERE `cate_id` = '39' AND `status` = 0 ORDER BY `update_time` DESC limit 100";

//$sql="SELECT `id`,`company`,`address`,`corporate`,`name`,`mobile`,`prize`,`subhead`,`status`,`create_time` FROM `ims_awards_apply` GROUP BY company ORDER BY status ASC";

$result = $mysqli->query($sql);
if($result){
    $row = $result->fetch_all(MYSQLI_ASSOC);
}




$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'ID')
    ->setCellValue('B1', '标题')
    ->setCellValue('C1', '简介')
    ->setCellValue('D1', '作者')
    ->setCellValue('E1', '来源')
    ->setCellValue('F1', '创建时间')
    ->setCellValue('G1', '更新时间')
    ->setCellValue('H1', '分类');
;

;


//遍历sql结果集
foreach($row as $key => $value){
    //+2不让把标题给付给咯
    $a=$key+2;
//    $wdes=trim($value['wdes']);

    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue("A{$a}", "{$value['id']}")
        ->setCellValue("B{$a}", "{$value['title']}")
        ->setCellValue("C{$a}", "{$value['description']}")
        ->setCellValue("D{$a}", "{$value['writer']}")

        ->setCellValue("E{$a}", "{$value['source']}")
        ->setCellValue("F{$a}", date('Y-m-d H:i',$value['create_time']))
        ->setCellValue("G{$a}", date('Y-m-d H:i',$value['update_time']))

        ->setCellValue("H{$a}", "协会公告")


    ;



    ;
}

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

//$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
$objWriter->save("../ExcelOut/gdlaser_2021.xlsx");

//$objWriter->save("../ExcelOut/awards_sole.xlsx");
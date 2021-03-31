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
$mysqli = $base->mysqlConn('local_wq_laserfair');

//32
$sql="SELECT `id`,`company`,`address`,`corporate`,`name`,`mobile`,`prize`,`subhead`,`status` FROM `ims_awards_apply` where status=1";

$result = $mysqli->query($sql);
if($result){
    $row = $result->fetch_all(MYSQLI_ASSOC);
}




$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'ID')
    ->setCellValue('B1', '公司')
    ->setCellValue('C1', '地址')
    ->setCellValue('D1', '公司法人')
    ->setCellValue('E1', '联系人')
    ->setCellValue('F1', '联系人电话')
    ->setCellValue('G1', '报名奖项')
    ->setCellValue('H1', '参赛作品')
    ->setCellValue('I1', '状态');
;


//遍历sql结果集
foreach($row as $key => $value){
    //+2不让把标题给付给咯
    $a=$key+2;
//    $wdes=trim($value['wdes']);
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue("A{$a}", "{$value['id']}")
        ->setCellValue("B{$a}", "{$value['company']}")
        ->setCellValue("C{$a}", "{$value['address']}")
        ->setCellValue("D{$a}", "{$value['corporate']}")

        ->setCellValue("E{$a}", "{$value['name']}")
        ->setCellValue("F{$a}", "{$value['mobile']}")
        ->setCellValue("G{$a}", "{$value['prize']}")

        ->setCellValue("H{$a}", "{$value['subhead']}")
        ->setCellValue("I{$a}", "已审核")

    ;
}

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

//$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
$objWriter->save("../ExcelOut/awards_2021.xlsx");
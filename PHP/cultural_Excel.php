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
$mysqli = $base->mysqlConn('laser_shop');

//32
$sql="SELECT `id`,`name`,`mobile`,`tel`,`email`,`company`,`wname`,`wdes`,`score` FROM `destoon_participator`";

$result = $mysqli->query($sql);
if($result){
    $row = $result->fetch_all(MYSQLI_ASSOC);
}




$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'ID')
    ->setCellValue('B1', '姓名')
    ->setCellValue('C1', '电话')
    ->setCellValue('D1', '座机')
    ->setCellValue('E1', '邮箱')
    ->setCellValue('F1', '公司')
    ->setCellValue('G1', '作品名称')
    ->setCellValue('H1', '创意简介')
    ->setCellValue('I1', '分数');
;


//遍历sql结果集
foreach($row as $key => $value){
    //+2不让把标题给付给咯
    $a=$key+2;
    $wdes=trim($value['wdes']);
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue("A{$a}", "{$value['id']}")
        ->setCellValue("B{$a}", "{$value['name']}")
        ->setCellValue("C{$a}", "{$value['mobile']}")
        ->setCellValue("D{$a}", "{$value['tel']}")

        ->setCellValue("E{$a}", "{$value['email']}")
        ->setCellValue("F{$a}", "{$value['company']}")
        ->setCellValue("G{$a}", "{$value['wname']}")

        ->setCellValue("H{$a}", "{$wdes}")
        ->setCellValue("I{$a}", "{$value['score']}")

    ;
}

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

//$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
$objWriter->save("../ExcelOut/cultural_2020.xlsx");
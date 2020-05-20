<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/5/20
 * Time: 20:41
 */

$dir=dirname(__FILE__);
echo $dir;
require_once "$dir/PHPExcel/Classes/PHPExcel.php";
require_once "$dir/BaseSql.php";

$base=new BaseSql();
//连接数据库
$mysqli = $base->mysqlConn('gdlaser');
//返回最新的数据
$sql = "SELECT * FROM `game_award`";
$result = $mysqli->query($sql);
if($result){
    $row = $result->fetch_all(MYSQLI_ASSOC);
//    echo '<pre>';
//    var_dump($row);die();
}




$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ID')
            ->setCellValue('B1', 'name')
            ->setCellValue('C1', 'order')
            ->setCellValue('D1', 'option');
//遍历sql结果集
foreach($row as $key => $value){
    //+2不让把标题给付给咯
    $a=$key+2;
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue("A{$a}", "{$value['id']}")
        ->setCellValue("B{$a}", "{$value['name']}")
        ->setCellValue("C{$a}", "{$value['order']}")
        ->setCellValue("D{$a}", "{$value['option']}");
}

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

//$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
$objWriter->save("ExcelOut/zxcxzc.xlsx");
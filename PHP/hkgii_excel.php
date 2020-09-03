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
$mysqli = $base->mysqlConn('new_hkgii_com');

//门户栏目
//$sql="SELECT f_c_1.c1_id,f_c_1.c1_name,f_c_2.c2_name,f_c_2.c2_id,f_c_2.c1_id AS c2_c1_id
//FROM `f_c_1` LEFT JOIN `f_c_2` ON f_c_1.c1_id=f_c_2.c1_id ";

//文章类目
$sql="SELECT news.id,news.title,class1.class1name,class2.class2name  FROM news left JOIN `class1` ON news.class1=class1.noid left JOIN `class2` ON news.class2=class2.noid";

$result = $mysqli->query($sql);
if($result){
    $row = $result->fetch_all(MYSQLI_ASSOC);
}




$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'ID')
    ->setCellValue('B1', '文章标题')
    ->setCellValue('C1', '文章所属主分类')
    ->setCellValue('D1', '文章所属子分类')
   ;


//遍历sql结果集
foreach($row as $key => $value){

    //+2不让把标题给付给咯
    $a=$key+2;
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue("A{$a}", "{$value['id']}")
        ->setCellValue("B{$a}", "{$value['title']}")
        ->setCellValue("C{$a}", "{$value['class1name']}")
        ->setCellValue("D{$a}", "{$value['class2name']}")
    ;
}

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

//$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
$objWriter->save("../ExcelOut/hkgii2.xlsx");
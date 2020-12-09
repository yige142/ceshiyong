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
$sql="SELECT a.itemid,c.catname,a.title,a.introduce,a.hits,a.addtime 
        FROM `destoon_article_21` AS a LEFT JOIN `destoon_category` AS c ON a.catid=c.catid 
         WHERE title like '%华工%'  AND addtime>1546304400 AND addtime<1577840400  ORDER BY addtime DESC";

$result = $mysqli->query($sql);
if($result){
    $row = $result->fetch_all(MYSQLI_ASSOC);
}




$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'ID')
    ->setCellValue('B1', '分类名称')
    ->setCellValue('C1', '标题')
    ->setCellValue('D1', '简介')
    ->setCellValue('E1', '用户查看数')
    ->setCellValue('F1', '创建时间')
  ;



//遍历sql结果集
foreach($row as $key => $value){
    //+2不让把标题给付给咯
    $a=$key+2;
    $date=date('Y-m-d H-i',$value['addtime']);
    $rand_num=mt_rand(412,1411);
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue("A{$a}", "{$value['itemid']}")
        ->setCellValue("B{$a}", "{$value['catname']}")
        ->setCellValue("C{$a}", "{$value['title']}")
        ->setCellValue("D{$a}", "{$value['introduce']}")

        ->setCellValue("E{$a}", $rand_num)
        ->setCellValue("F{$a}", $date)
    ;
}

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

//$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
$objWriter->save("../ExcelOut/huagong.xlsx");
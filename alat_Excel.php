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
$mysqli = $base->mysqlConn('alat');

//32
$sql="SELECT `name`,`sex`,mobile,mail,company,position,tel,address,purpose,channel,business,care,nature,regtime,department FROM laser_reg_2018 LIMIT 12000,14000";

$result = $mysqli->query($sql);
if($result){
    $row = $result->fetch_all(MYSQLI_ASSOC);
//    echo '<pre>';
}




$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '名称')
            ->setCellValue('B1', '性别')
            ->setCellValue('C1', '电话')
            ->setCellValue('D1', '邮箱')
            ->setCellValue('E1', '公司')
            ->setCellValue('F1', '职位')
            ->setCellValue('G1', '座机')
            ->setCellValue('H1', '地址')
            ->setCellValue('I1', '目的')
    ->setCellValue('J1', '渠道')
    ->setCellValue('K1', '行业_business')
    ->setCellValue('L1', 'care')
    ->setCellValue('M1', 'nature')
    ->setCellValue('N1', '注册时间')
    ->setCellValue('O1', '部门');
//遍历sql结果集
foreach($row as $key => $value){
    //+2不让把标题给付给咯
    $a=$key+2;
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue("A{$a}", "{$value['name']}")
        ->setCellValue("B{$a}", "{$value['sex']}")
        ->setCellValue("C{$a}", "{$value['mobile']}")
        ->setCellValue("D{$a}", "{$value['mail']}")

        ->setCellValue("E{$a}", "{$value['company']}")
        ->setCellValue("F{$a}", "{$value['position']}")
        ->setCellValue("G{$a}", "{$value['tel']}")
        ->setCellValue("H{$a}", "{$value['address']}")
        ->setCellValue("I{$a}", "{$value['purpose']}")
        ->setCellValue("J{$a}", "{$value['channel']}")
        ->setCellValue("K{$a}", "{$value['business']}")
        ->setCellValue("L{$a}", "{$value['care']}")
        ->setCellValue("M{$a}", "{$value['nature']}")
        ->setCellValue("N{$a}", "{$value['regtime']}")
        ->setCellValue("O{$a}", "{$value['department']}")
    ;
}

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

//$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
$objWriter->save("ExcelOut/alat2018_2.xlsx");
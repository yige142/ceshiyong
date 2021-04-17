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
$sql="SELECT `id`,`company`,`subhead`,`prize`,`status`,`create_time` FROM `ims_awards_apply`  WHERE `status`=1 ORDER BY prize ASC,create_time DESC";

//$sql="SELECT `id`,`company`,`address`,`corporate`,`name`,`mobile`,`prize`,`subhead`,`status`,`create_time` FROM `ims_awards_apply` GROUP BY company ORDER BY status ASC";

$result = $mysqli->query($sql);
if($result){
    $row = $result->fetch_all(MYSQLI_ASSOC);
}




$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'ID')
    ->setCellValue('B1', '公司')
    ->setCellValue('C1', '参赛作品')
    ->setCellValue('D1', '报名奖项')
    ->setCellValue('E1', '状态')
    ->setCellValue('F1', '创建时间');
;

;


//遍历sql结果集
foreach($row as $key => $value){
    //+2不让把标题给付给咯
    $a=$key+2;
//    $wdes=trim($value['wdes']);
    if($value['status']==0){
        $status='未审核';
    }elseif($value['status']==1){
        $status='已审核';
    }elseif($value['status']==2){
        $status='暂做废';
    }elseif($value['status']==3){
        $status='待审核';
    }
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue("A{$a}", "{$value['id']}")
        ->setCellValue("B{$a}", "{$value['company']}")
        ->setCellValue("C{$a}", "{$value['subhead']}")
        ->setCellValue("D{$a}", "{$value['prize']}")

        ->setCellValue("E{$a}", $status)
        ->setCellValue("F{$a}", date('Y-m-d H:i',$value['create_time']))
    ;



    ;
}

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

//$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
$objWriter->save("../ExcelOut/group2021.xlsx");

//$objWriter->save("../ExcelOut/awards_sole.xlsx");
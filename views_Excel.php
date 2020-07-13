<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/5/20
 * Time: 20:41
 *
 */

//sql 语句在PHP/views_SQL 目录下

$dir=dirname(__FILE__);
echo $dir;
require_once "$dir/PHPExcel/Classes/PHPExcel.php";
require_once "$dir/BaseSql.php";

$base=new BaseSql();
//连接数据库
$mysqli = $base->mysqlConn('aaaaa');

$sql="SELECT  l.id,l.bookname,l.visit_number,l_play.duration FROM `ims_fy_lesson_parent` AS l  
              left join`ims_fy_lesson_playrecord` l_play ON l_play.lessonid=l.id    ";

$result = $mysqli->query($sql);
if($result){
    $laArray = $result->fetch_all(MYSQLI_ASSOC);
//    echo '<pre>';
//  var_dump($row);die();
}

$tmpArray = array();
foreach ($laArray as $row) {
    $key = $row['bookname'];
    if (array_key_exists($key, $tmpArray)) {
        // $tmpArray[$key]['id'] = $tmpArray[$key]['id'] . '+' . $row['id'];
        if (is_array($tmpArray[$key]['duration'])) {
            $tmpArray[$key]['duration'][] = $row['duration'];
        } else {
            $tmpArray[$key]['duration'] = array($tmpArray[$key]['duration'], $row['duration']);
            // $tmpArray[$key]['num']=count($tmpArray[$key]['moeny']);
        }
    } else {
        $tmpArray[$key] = $row;

    }
    $tmpArray[$key]['num']=count($tmpArray[$key]['duration']);
}







$objPHPExcel = new PHPExcel();

$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'ID')
    ->setCellValue('B1', '视频标题')
    ->setCellValue('C1', '脚本观看数')
    ->setCellValue('D1', '实际观看记录');
//遍历sql结果集
$k=0;
foreach($tmpArray as $key => $value){
    //+2不让把标题给付给咯
    $a=$k+2;
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue("A{$a}", "{$value['id']}")
        ->setCellValue("B{$a}", "{$value['bookname']}")
        ->setCellValue("C{$a}", "{$value['visit_number']}")
        ->setCellValue("D{$a}", "{$value['num']}")
    ;
    $k++;
}

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

//$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
$objWriter->save("ExcelOut/views.xlsx");
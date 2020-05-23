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
$mysqli = $base->mysqlConn('laser_shop');
//返回最新的数据
//21
//$sql= "SELECT a.itemid,a.title,module.name,category.catname,module.linkurl,a.linkurl AS oldurl
//FROM  `destoon_article_data_25` AS d LEFT JOIN  `destoon_article_25` AS a ON  d.itemid=a.itemid
//                                     LEFT JOIN  `destoon_category` as category ON a.catid=category.catid
//																		 LEFT JOIN  `destoon_module` as module ON  category.moduleid=module.moduleid
//WHERE content=\"<a href='http://www.v550.com'>&nbsp; </a>\" OR content=NULL OR content=\"\"";

//26表
//$sql="SELECT a.itemid,a.title,module.name,category.catname,module.linkurl,a.linkurl AS oldurl
//FROM  `destoon_article_data_26` AS d LEFT JOIN  `destoon_article_26` AS a ON  d.itemid=a.itemid
//                                     LEFT JOIN  `destoon_category` as category ON a.catid=category.catid
//																		 LEFT JOIN  `destoon_module` as module ON  category.moduleid=module.moduleid
//WHERE content=\"<a href='http://www.v550.com'>&nbsp; </a>\" OR content=NULL OR content=\"\"";


//30表
//$sql="SELECT a.itemid,a.title,module.name,category.catname,module.linkurl,a.linkurl AS oldurl
//FROM  `destoon_article_data_30` AS d LEFT JOIN  `destoon_article_30` AS a ON  d.itemid=a.itemid
//                                     LEFT JOIN  `destoon_category` as category ON a.catid=category.catid
//																		 LEFT JOIN  `destoon_module` as module ON  category.moduleid=module.moduleid
//WHERE content=\"<a href='http://www.v550.com'>&nbsp; </a>\" OR content=NULL OR content=\"\"";

//32
$sql="SELECT a.itemid,a.title,module.name,category.catname,module.linkurl,a.linkurl AS oldurl
FROM  `destoon_article_data_32` AS d LEFT JOIN  `destoon_article_32` AS a ON  d.itemid=a.itemid 
                                     LEFT JOIN  `destoon_category` as category ON a.catid=category.catid
																		 LEFT JOIN  `destoon_module` as module ON  category.moduleid=module.moduleid
WHERE content=\"<a href='http://www.v550.com'>&nbsp; </a>\" OR content=NULL OR content=\"\"";

$result = $mysqli->query($sql);
if($result){
    $row = $result->fetch_all(MYSQLI_ASSOC);
//    echo '<pre>';
//   var_dump($row);die();
}




$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'itemid')
            ->setCellValue('B1', '标题')
            ->setCellValue('C1', '主分类名称')
            ->setCellValue('D1', '主分类子名称')
            ->setCellValue('E1', '主分类URL')
            ->setCellValue('F1', '子分类URL')
            ->setCellValue('G1', '现URL');
//遍历sql结果集
foreach($row as $key => $value){
    //+2不让把标题给付给咯
    $a=$key+2;
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue("A{$a}", "{$value['itemid']}")
        ->setCellValue("B{$a}", "{$value['title']}")
        ->setCellValue("C{$a}", "{$value['name']}")
        ->setCellValue("D{$a}", "{$value['catname']}")

        ->setCellValue("E{$a}", "{$value['linkurl']}")
        ->setCellValue("F{$a}", "{$value['oldurl']}")
        ->setCellValue("G{$a}", "{$value['linkurl']}{$value['oldurl']}")
    ;
}

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

//$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
$objWriter->save("ExcelOut/art32.xlsx");
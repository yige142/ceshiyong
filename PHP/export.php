<?php
//红光奖 导出word文档
require'./common.php';

    //创建当天日期导出的目录文件夹
    $date=date("Ymd",time());

    $dir = iconv("UTF-8", "UTF-8", "./export_file/".$date);
    if (!file_exists($dir)){
        mkdir ($dir,0777,true);
        echo '创建文件夹/export_file/'.$date.'文件夹成功';
    } else {
        echo '需创建的文件夹/export_file/'.$date.'已经存在'.'<br>';
    }

    $sql="SELECT id,company,word,prize FRdOM `ims_awards_apply` WHERE  status=1 ORDER by prize DESC";

    $result=pdo_fetchall($sql);

    foreach ($result as $key=> $value){
        $company=$value['company'];
        $company_dir = iconv("UTF-8", "GBK", "./export_file/".$date."/".$value['prize'].'-'.$company);
        if (!file_exists($company_dir)){
            mkdir ($company_dir,0777,true);
            //echo '创建文件夹'.$r['company'].'文件夹成功';
        } else {
            //  echo '需创建的文件夹'.$r['company'].'已经存在';
        }
        $wname=iconv("UTF-8","GBK",$company);
        copy($value['word'],$company_dir."/{$wname}.docx");
    }



    $zip = new ZipArchive();

    try {
        //输出打包zip到./export_file/目录下
        $zip->open('./export_file/sign_'.$date.'.zip', ZipArchive::CREATE);

        addFileToZip($dir, $zip); //调用方法，对要打包的根目录进行操作，并将ZipArchive的对象传递给方法
        $zip->close(); //关闭处理的zip文件

        echo "<br>操作完成";

    } catch (\Exception $exception) {
        return $exception->getMessage();
    }




    function addFileToZip($path, $zip) {
        $handler = opendir($path); //打开当前文件夹由$path指定。

        while (($filename = readdir($handler)) !== false) {
            if ($filename != "." && $filename != "..") {//文件夹文件名字为'.'和‘..’，不要对他们进行操作
                if (is_dir($path . "/" . $filename)) {// 如果读取的某个对象是文件夹，则递归

                    addFileToZip($path . "/" . $filename, $zip);
                } else { //将文件加入zip对象
                    $zip->addFile($path . "/" . $filename);
                }
            }
        }
        @closedir($path);
    }







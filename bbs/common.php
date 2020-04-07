<?php
/**
 * Created by PhpStorm.
 * User: yige142
 * Date: 2019/11/20
 * Time: 16:01
 */

function I($key , $default_val=null){
    $param = isset($_POST[$key]) ? trim($_POST[$key]) : $default_val;
    if(get_magic_quotes_gpc()){
        return htmlspecialchars($param);
    }
    return addslashes(htmlspecialchars($param));
}


if (!function_exists('jsonSuccess')) {
    function jsonSuccess($msg = 'success', array $data = [])
    {
        return json_encode(['code'=>1, 'msg'=>$msg, 'data'=> $data]);
    }
}

if (!function_exists('json_fail')) {
    function json_fail($msg = 'fail', array $data = [])
    {
        return json_encode(['code'=>0, 'msg'=>$msg, 'data'=> $data]);
    }
}
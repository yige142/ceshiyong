<?php
header('Content-type: text/html; charset=UTF8');
//调试文件引用 正斜杠 反斜杠问题
define('IA_ROOT', str_replace('\\', '/', dirname(dirname(__FILE__))));
var_dump('file路径：'.dirname(__FILE__));
var_dump('file路径：'.dirname(dirname(__FILE__)));
var_dump(IA_ROOT);
<?php
use home\home2\cat;

//命名了namespace  就要usenamespace,否则调用不了namespace命名下的类
require 'ddd/cat.php';

$a=new cat();
$a->eat();

<?php
namespace home\home2;

use home\home2\animal;
require 'ccc\ccc\animal.php';

class cat extends animal
{
   public $name;
   public $age;

   function eat(){
       echo "吃猫粮";
   }

   static function yundong(){
       echo "抓老鼠";
   }
}
<?php
namespace core;

class Autoloader{

function spl(){
  spl_autoload_register("myAutoloader");
}

function myAutoloader($class)
{
    if (file_exists("core/".$class.".php")) {
        include "core/".$class.".php";
    } elseif (file_exists("models/".$class.".php")) {
        include "models/".$class.".php";
    }
}
}
 ?>

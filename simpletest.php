<?php
    echo "From simple test";

    require 'config.php';
require 'util/Auth.php';
require 'libs/XmlHelper.php';

if(!function_exists('classAutoLoader')){
    function classAutoLoader($class){
        //$class=strtolower($class);
        //$classFile=$_SERVER['DOCUMENT_ROOT'].'/include/class/'.$class.'.class.php';
        $classFile = LIBS . $class .".php";
        if(is_file($classFile)&&!class_exists($class)) require $classFile;
    }
}
spl_autoload_register('classAutoLoader');


XmlHelper::loadData();

//echo "<br>Data loaded " . date("j-n-Y G:i:s");

$bootstrap = new Bootstrap();

$bootstrap->init();

//echo "<br>Bootstrap initiated " . date("j-n-Y G:i:s");
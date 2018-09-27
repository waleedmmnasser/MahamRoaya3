<?php

require 'config.php';
require 'util/Auth.php';
require 'libs/XmlHelper.php';

// Also spl_autoload_register (Take a look at it if you like)
//function __autoload($class) {
//    require LIBS . $class .".php";
//}

if(!function_exists('classAutoLoader')){
    function classAutoLoader($class){
        //$class=strtolower($class);
        //$classFile=$_SERVER['DOCUMENT_ROOT'].'/include/class/'.$class.'.class.php';
        //echo "<br>[" . date("Y-n-j  G:i:s") . "] Class: " . $class . "<br>";

        $classFile = LIBS . $class .".php";
        if(is_file($classFile)&&!class_exists($class)) require $classFile;
    }
}
spl_autoload_register('classAutoLoader');

XmlHelper::loadData();

//echo "Data loaded";

//Auth::handleLogin();
// Load the Bootstrap!
$bootstrap = new Bootstrap();

// Optional Path Settings
//$bootstrap->setControllerPath();
//$bootstrap->setModelPath();
//$bootstrap->setDefaultFile();
//$bootstrap->setErrorFile();

echo "<br>[" . date("G:i:s") . "] Calling init...";

$bootstrap->init();
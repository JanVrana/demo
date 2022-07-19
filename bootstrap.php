<?php
/** path to class directory */
const CLASSDIR = "./class/";
/** path to settings.ini */
const CONFIG_PATH = "./etc/settings.ini";
include "debug.php";
use tools\config;
use reader\rss;
/**
 * autoload class registration
 */
spl_autoload_register(function ($class_name) {
	$class_name = str_replace("\\", "/", $class_name );
	$class_name = strtolower($class_name);
	$file = CLASSDIR.$class_name . '.php';
	if(file_exists($file)){
		require $file;
	}else{
		return false;
	}
});


$config = new config(CONFIG_PATH);



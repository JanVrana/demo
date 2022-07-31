<?php
/** path to class directory */
const CLASSDIR = "../app/class/";
/** path to settings.ini */
const CONFIG_PATH = "../etc/settings.ini";
//include "debug.php";


use tools\{router, config};
use reader\rssReader;

/**
 * Print $exception 
 * @param  \Exception $exception; - Exception 
 *
 * @return void
 */
function exception_handler($exception) {
	echo "Error: " , $exception->getMessage();
}

/**
 * Register exception handler
 */
set_exception_handler('exception_handler');

/**
 * autoload class registration
 */
spl_autoload_register(function ($class_name) {
	$class_name = str_replace("\\", "/", $class_name);
	//$class_name = strtolower($class_name);
	$file = CLASSDIR . $class_name . '.php';
	if (file_exists($file)) {
		require $file;
		return true;
	} else {
		throw new \Exception ("error include file '$file' ");
		return false;
	}
});




$config = new config(CONFIG_PATH);
$presenter = router::getPresenter($config);
$presenter->show();


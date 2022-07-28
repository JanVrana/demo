<?php
$vrStartDate = microtime(true);
$vrLastRunTime = 0;
const PATHLOGFILE = '/logs/debug.php';
/**
 * Created by PhpStorm.
 * User: Standard
 * Date: 18.07.2018
 * Time: 8:10
 */

ini_set('xdebug.var_display_max_data', '-1');
ini_set('xdebug.var_display_max_depth', '10');
ini_set('xdebug.var_display_max_children', '128');

if (!function_exists("vrRunTime")) {
	function vrRunTime()
	{
		global $vrStartDate;
		global $vrLastRunTime;
		global $vrCurrentRuntTime;
		$vrNewRunTime = microtime(true) - $vrStartDate;
		$vrCurrentRuntTime = $vrNewRunTime - $vrLastRunTime;
		$vrLastRunTime = $vrNewRunTime;
		return $vrNewRunTime;
	}
}

if (!function_exists("vrGetCurrentRuntTime")) {
	function vrGetCurrentRuntTime()
	{
		global $vrCurrentRuntTime;
		return $vrCurrentRuntTime;
	}
}


if (!function_exists("vrDump")) {
	function vrDump($var, $title = "")
	{
		$date = date("H:i:s");
		$runTime = round(vrRunTime(), 3);
		$currentRuntTime = number_format(vrGetCurrentRuntTime(), 6);
		$call = debug_backtrace();
		$dr = $_SERVER["DOCUMENT_ROOT"];
		$file = substr($call[0]["file"], strlen($dr));
		$line = $call[0]["line"];
		$title = $title ? " - " . $title : "";
		echo "<span class='dumpitem'>$date - $runTime s - $currentRuntTime s - <b>" . $file . ":" . $line . $title . "</b><br>";
		if (is_int($var) and $var >= 631148400) {
			$var = "int $var (" . date("Y-m-d H:i:s", $var) . ")";
		}
		//Debug::dump($var);
		var_dump($var);
		echo "</span>";
	}
}

if (!function_exists("vrDumpTxt")) {
	function vrDumpTxt($var, $title = "")
	{
		$call = debug_backtrace();

		$dr = $_SERVER["DOCUMENT_ROOT"];
		$file = substr($call[0]["file"], strlen($dr));
		$line = $call[0]["line"];
		$title = $title ? " - " . $title : "";
		echo "\r\n===============================================\r\n" . $file . ":" . $line . $title . "\r\n";
		var_export($var);
		echo "\r\n-----------------------------------------------\r\n";
	}
}

if (!function_exists("vrDumpLog")) {
	function vrDumpLog($var, $title = "")
	{
		$call = debug_backtrace();

		$dr = $_SERVER["DOCUMENT_ROOT"];
		$file = substr($call[0]["file"], strlen($dr));
		$line = $call[0]["line"];
		$title = $title ? "\t |" . $title : "";

		$logFile = PATHLOGFILE;
		$str = date("Y-m-d H:i:s") . "\t |" . $file . ":" . $line . $title . "\r\n";
		$str .= var_export($var, true);
		$str .= "\r\n=================================\r\n\r\n";

		file_put_contents($logFile, $str, FILE_APPEND);

	}
}

if (!function_exists("vrClearLog")) {
	function vrClearLog()
	{
		$logFile = PATHLOGFILE;
		file_put_contents($logFile, "");

	}
}
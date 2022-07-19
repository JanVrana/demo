<?php
include ("./bootstrap.php");

use reader\rss;
use vendor\Template;

var_dump($config->get("feed", "url"));

$requestPath = parse_url($_SERVER['REQUEST_URI'])['path'];
preg_match('/\/?([^\/]*)\/([^\/]*)\/?/', $requestPath , $matches, PREG_UNMATCHED_AS_NULL);

if($matches[1]){
	list($feed, $respose) = $matches;
	$rss = new rss();
	foreach ($config->get("feed", "url") as $url){
		$rss->load($url);
		$respose = $rss->parse();
	}
	$json = json_encode($respose);
	var_dump($respose);
}else{
	Template::view('templates/home.html', [
		'title' => 'Demo App',
		'colors' => ['red','blue','green']
	]);
}




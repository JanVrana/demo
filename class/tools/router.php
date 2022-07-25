<?php

namespace tools;

use presenter\feedPresenter;
use presenter\homePresenter;

class router
{
		
	public static function getPresenter($config){
		$requestPath = parse_url($_SERVER['REQUEST_URI'])['path'];
		preg_match('/\/?([^\/]*)\/([^\/]*)\/?/', $requestPath, $matches, PREG_UNMATCHED_AS_NULL);
		if ($matches[1]) {
			$feed = $matches[1];
			$resposeType = $matches[2];
			$presenter = new feedPresenter($feed, $resposeType);
			
		}else{
			$presenter = new homePresenter();
		}
		$presenter->config = $config;
		return $presenter;
	} 
	
}
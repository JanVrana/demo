<?php

namespace tools;

use controller\feedController;
use controller\homeController;
use controller\controllerInterface;

/**
 * URL router class
 */
class router
{

	/**
	 * return page presenter
	 *
	 * @param config $config - config object
	 *
	 * @return \controller\controllerInterface
	 */
	public static function getController(config $config): controllerInterface|null
	{
		try {
			$requestPath = parse_url($_SERVER['REQUEST_URI'])['path'];
			preg_match('/\/?([^\/]*)\/([^\/]*)\/?/', $requestPath, $matches, PREG_UNMATCHED_AS_NULL);
			if ($matches[1]) {
				$feed = $matches[1];
				$resposeType = $matches[2];
				$controller = new feedController($feed, $resposeType);

			} else {
				$controller = new homeController();
			}
			$controller->config = $config;
			return $controller;
		} catch (\Exception $e) {
			echo "cat:".$e->getMessage();
			return null;
		}
	}


}
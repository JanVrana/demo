<?php

namespace tools;

use presenter\feedPresenter;
use presenter\homePresenter;
use presenter\presenterInterface;

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
	 * @return \presenter\presenterInterface
	 */
	public static function getPresenter(config $config): presenterInterface|null
	{
		try {
			$requestPath = parse_url($_SERVER['REQUEST_URI'])['path'];
			preg_match('/\/?([^\/]*)\/([^\/]*)\/?/', $requestPath, $matches, PREG_UNMATCHED_AS_NULL);
			if ($matches[1]) {
				$feed = $matches[1];
				$resposeType = $matches[2];
				$presenter = new feedPresenter($feed, $resposeType);

			} else {
				$presenter = new homePresenter();
			}
			$presenter->config = $config;
			return $presenter;
		} catch (\Exception $e) {
			echo "cat:".$e->getMessage();
			return null;
		}
	}


}
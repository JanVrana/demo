<?php

namespace controller;

use vendor\Template;

/**
 * Home page Controller
 */
class homeController extends baseController
{

	/**
	 *  Render home page
	 * @return void
	 */
	public function show(): void
	{

		$feeds = $this->config->get("feed");
		$resposeTypes = ['json', 'html', 'markdown'];

		Template::view('../app/templates/home.html', [
			'title' => "Demo konverzní mikroslužby ",
			'feeds' => $feeds,
			'resposeTypes' => $resposeTypes
		]);
	}
}
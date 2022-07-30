<?php

namespace presenter;

use vendor\Template;

/**
 * Home page presenter
 */
class homePresenter extends basePresenter
{

	/**
	 *  Render home page
	 * @return void
	 */
	public function show(): void
	{

		$feeds = $this->config->get("feed");
		$resposeTypes = ['json', 'html', 'markdown'];

		Template::view('templates/home.html', [
			'title' => "Demo konverzní mikroslužby ",
			'feeds' => $feeds,
			'resposeTypes' => $resposeTypes
		]);
	}
}
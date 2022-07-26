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
	public function show(){
		
		$feeds = $this->config->get("feed");
		$resposeTypes = ['json', 'html', 'markdown'];
		
		Template::view('templates/home.html', [
			'title' => "Trasformace kanálů",
			'feeds' => $feeds,
			'resposeTypes' => $resposeTypes
		]);
	}
}
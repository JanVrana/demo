<?php

namespace presenter;

use vendor\Template;
class homePresenter extends basePresenter
{

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
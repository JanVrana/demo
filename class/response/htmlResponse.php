<?php

namespace response;
use vendor\Template;

class htmlResponse extends baseResponse
{
	public function view(){
			Template::view('templates/htmlResponse.html', [
				'title' => "Html response",
				'items' => $this->itemModel
			]);
		}
}
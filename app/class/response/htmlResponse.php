<?php

namespace response;

use vendor\Template;

/**
 * html response
 */
class htmlResponse extends baseResponse
{
	/**
	 * path to template file
	 * @var string
	 */
	public string $templatePath = '../app/templates/htmlResponse.html';

	/**
	 * views the HTML response
	 * @return void
	 */
	public function view(): void
	{
		Template::view($this->templatePath, [
			'title' => "Html response",
			'items' => $this->itemModel
		]);
	}
}
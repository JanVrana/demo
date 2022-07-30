<?php

namespace response;

/**
 * Markdown Response
 */
class markdownResponse extends baseResponse
{

	/**
	 * views the markdown response TODO: refaktoring using template, inherit from HTML respose
	 * @return void
	 */
	public function view(): void
	{
		foreach ($this->itemModel as $item) {
			echo "## [" . $item->title . "](" . $item->link . ")\n";
			echo "> " . $item->description . "\n\n";
		}
	}

}
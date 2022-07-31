<?php

namespace response;

use model\itemModel;

/**
 * json response
 */
class jsonResponse extends baseResponse
{
	/**
	 * views the JSON response
	 * @return void
	 */
	public function view(): void
	{
		$json = json_encode($this->itemModel);
		echo $json;
	}


}
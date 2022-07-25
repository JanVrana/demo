<?php

namespace response;

use model\itemModel;

class jsonResponse extends baseResponse
{
	public function view(){
		$json = json_encode($this->itemModel);
		echo $json;
	}
	
	
}
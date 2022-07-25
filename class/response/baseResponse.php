<?php

namespace response;

use model\itemModel;

class baseResponse implements responseInterface
{
	public array $itemModel;

	public function __construct(array $itemModel)
	{
		$this->itemModel = $itemModel;
	}

	public function view(){
		;
	}


}
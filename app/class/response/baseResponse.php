<?php

namespace response;

use model\itemModel;

/**
 * abstract class of responses
 */
abstract class baseResponse implements responseInterface
{
	/**
	 * array of the itemModel object
	 * @var array|\model\itemModel[]
	 */
	public array $itemModel;

	/**
	 * Constructor
	 *
	 * @param \model\itemModel[] $itemModel
	 */
	public function __construct(array $itemModel)
	{
		$this->itemModel = $itemModel;
	}
	
}
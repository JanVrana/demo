<?php

namespace response;
use model\itemModel;


/**
 * Interface for response classes
 */
interface responseInterface
{
	/**
	 * constructor 
	 * @param \model\itemModel[] $itemModel - array of items
	 */
	public function __construct(array $itemModel);

	/**
	 * views the response
	 * @return void
	 */
	public function view(): void;

}
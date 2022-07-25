<?php

namespace presenter;

/**
 * Interface of presenter 
 */
interface presenterInterface
{
	/**
	 * sends the output to the presenter
	 * @return mixed
	 */
	public function show();
}
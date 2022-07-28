<?php

namespace reader;

use model\itemModel;

/**
 * Interface for reader classes
 */
interface readerInterface
{
	/**
	 * source loading function
	 *
	 * @param $sourceFile - URL or Filename
	 *
	 * @return void
	 */
	public function load($sourceFile): void;

	/**
	 * parses the input data, and returns the resulting object itemModel
	 * @return itemModel
	 */
	public function parse(): array;

}
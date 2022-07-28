<?php

namespace reader;

/**
 * abstract class of readers
 */
abstract class baseReader implements readerInterface
{
	/**
	 * @var string - loaded data
	 */
	protected string $data;

	/**
	 * source loading function
	 *
	 * @param $sourceFile - URL or Filename
	 *
	 * @return void
	 */
	public function load($sourceFile): void
	{
		$this->data = file_get_contents($sourceFile);
	}
}
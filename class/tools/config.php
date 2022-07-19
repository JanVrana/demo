<?php

namespace tools;
/**
 * simple class for reading the configuration
 */
class config
{
	/** @var array   */
	protected $data;

	/**
	 * @param $file
	 */
	public function __construct($file)
	{
		$this->data = parse_ini_file($file, true);
	}

	/**
	 * @return array
	 */
	public function get($section, $var=null): bool|array
	{
		return $var !== null ? $this->data[$section][$var] : $this->data[$section];
	}
	
}
<?php

namespace tools;
/**
 * simple class for reading the configuration
 */
class config
{
	/** @var array - parsed configuration data */
	protected $data;

	/**
	 * Constructor
	 *
	 * @param string $file - path to the configuration file
	 */
	public function __construct($file)
	{
		$this->data = parse_ini_file($file, true);
	}

	/**
	 * returns the value from the configuration
	 * config file example
	 * [section]
	 * var[key] = return value
	 *
	 * @param $section - section
	 * @param $var     - var
	 * @param $key     - key
	 *
	 * @return mixed
	 */
	public function get($section, $var = null, $key = null): mixed
	{
		if ($var and $key) {
			$result = $this->data[$section][$var][$key];
		} elseif ($var and !$key) {
			$result = $this->data[$section][$var];
		} else {
			$result = $this->data[$section];
		}
		return $result;
	}

}
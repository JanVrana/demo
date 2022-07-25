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
	 * @param $section
	 * @param $var
	 * @param $key
	 *
	 * @return mixed
	 */
	public function get($section, $var=null, $key=null): mixed
	{
		if($var and $key ){
			$result = $this->data[$section][$var][$key]; 
		}elseif ($var and !$key){
			$result =  $this->data[$section][$var];
		}else {
			$result = $this->data[$section];
		}
		return $result;
	}
	
}
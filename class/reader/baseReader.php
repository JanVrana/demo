<?php

namespace reader;

class baseReader
{
	protected $data;

	public function __construct()
	{
		;
	}

	public function load($sourceFile){
		$curl = curl_init($sourceFile);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HEADER, false);

		$this->data = curl_exec($curl);

		curl_close($curl);

	}
}
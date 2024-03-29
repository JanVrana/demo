<?php

namespace controller;

use mysql_xdevapi\Exception;
use response;
use reader;

/**
 * feed Controller
 */
class feedController extends baseController
{
	/**
	 * @var string feed name
	 */
	public string $feed;

	/**
	 * @var string response type
	 */
	public string $responseType;

	/**
	 * Constructor
	 *
	 * @param string $feed         feed name
	 * @param string $responseType response type
	 */
	public function __construct(string $feed, string $responseType)
	{
		$this->feed = $feed;
		$this->responseType = $responseType;
	}


	/**
	 * Render presenter
	 * @return void
	 */
	public function show(): void
	{
		$url = $this->config->get("feed", $this->feed, "url");
		$readerClass = "reader\\" . $this->config->get("feed", $this->feed, "type") . "Reader";
		try{
			$reader = new $readerClass();
		}catch (\Exception $e){
			throw new \RuntimeException('unable to load reader: '.$readerClass);
		}
		$reader->load($url);
		$itemModel = $reader->parse();
		$responseClass = "response\\" . $this->responseType . "Response";
		$res = new $responseClass($itemModel);
		$res->view();
	}

}

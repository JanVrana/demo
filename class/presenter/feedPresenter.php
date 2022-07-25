<?php

namespace presenter;
use response;
use reader;

class feedPresenter extends basePresenter
{
	public string $feed;
	public string $responseType;

	/**
	 * @param string $feed
	 * @param string $responseType
	 */
	public function __construct(string $feed, string $responseType)
	{
		$this->feed = $feed;
		$this->responseType = $responseType;
	}


	public function show(){
		$url = $this->config->get("feed", $this->feed, "url");
		$readerClass = "reader\\".$this->config->get("feed", $this->feed, "type")."Reader";
		$reader = new $readerClass();
		$reader->load($url);
		$itemModel = $reader->parse();
		$responseClass = "response\\".$this->responseType . "Response";
		$res = new $responseClass($itemModel);
		$res->view();
	}
}
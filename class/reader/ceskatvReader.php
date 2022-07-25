<?php

namespace reader;

use model\itemModel;

class ceskatvReader extends baseReader
{
	
	public function load($sourceFile)
	{
		$date = date("d.m.Y");
		$sourceFile = str_replace("[date]", $date, $sourceFile);
		parent::load($sourceFile); 
	}

	public function parse(){
		$items = [];
		$xml = simplexml_load_string($this->data);
		foreach ($xml->porad as $xmlItem ){
			$items[] = $this->createItemFromXml($xmlItem);
		}
		return $items;
	}

	protected function createItemFromXml(\SimpleXMLElement $SimpleXMLElement){
		$item = new itemModel();
		$item->title        = $SimpleXMLElement->nazvy->nazev;
		$item->title       .= $SimpleXMLElement->nazvy->nazev_casti !="" ? ": ".$SimpleXMLElement->nazvy->nazev_casti : "";
		$item->link         = $SimpleXMLElement->linky->program;
		$item->description  = $SimpleXMLElement->noticka;
		$item->pubDate      = "";
		$item->category     = $SimpleXMLElement->zanr;
		$item->guid         = "";
		return $item;
	}
}
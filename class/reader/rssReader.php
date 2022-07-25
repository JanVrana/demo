<?php

namespace reader;
use model\itemModel;

class rssReader extends baseReader
{
	
	public function parse(){
		$items = [];
		$xml = simplexml_load_string($this->data);
		foreach ($xml->channel->item as $xmlItem ){
			$items[] = $this->createItemFromXml($xmlItem);
		}
		return $items;
	}
	
	protected function createItemFromXml(\SimpleXMLElement $SimpleXMLElement){
		$item = new itemModel();
		$item->title        = $SimpleXMLElement->title;
		$item->link         = $SimpleXMLElement->link;
        $item->description  = $SimpleXMLElement->description;
        $item->pubDate      = $SimpleXMLElement->pubDate;
        $item->category     = $SimpleXMLElement->category;
        $item->guid         = $SimpleXMLElement->guid;
		return $item;
	}
	
	
}
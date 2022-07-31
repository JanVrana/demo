<?php

namespace reader;

use model\itemModel;

/**
 * loads rss feeds
 */
class rssReader extends baseReader
{

	/**
	 * parses the input data, and returns the resulting object itemModel
	 * @return itemModel[]
	 */
	public function parse(): array
	{
		$items = [];
		$xml = simplexml_load_string($this->data);
		foreach ($xml->channel->item as $xmlItem) {
			$items[] = $this->createItemFromXml($xmlItem);
		}
		return $items;
	}

	/**
	 * creates individual items from XML
	 *
	 * @param \SimpleXMLElement $SimpleXMLElement
	 *
	 * @return \model\itemModel
	 */
	protected function createItemFromXml(\SimpleXMLElement $SimpleXMLElement): itemModel
	{
		$item = new itemModel();
		$item->title = $SimpleXMLElement->title;
		$item->link = $SimpleXMLElement->link;
		$item->description = $SimpleXMLElement->description;
		$item->pubDate = $SimpleXMLElement->pubDate;
		$item->category = $SimpleXMLElement->category;
		$item->guid = $SimpleXMLElement->guid;
		return $item;
	}


}
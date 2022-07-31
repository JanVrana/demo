<?php

namespace reader;

use model\itemModel;

/**
 * loads a TV programme from the Czech TV website
 * https://www.ceskatelevize.cz/xml/tv-program/
 */
class ceskatvReader extends baseReader
{

	/**
	 * source loading function
	 * the [date] pattern is replaced by the current date (dd.mm.yyyy)
	 *
	 * @param $sourceFile - URL or Filename
	 *
	 * @return void
	 */
	public function load($sourceFile): void
	{
		$date = date("d.m.Y");
		$sourceFile = str_replace("[date]", $date, $sourceFile);
		parent::load($sourceFile);
	}

	/**
	 * parses the input data, and returns the resulting object itemModel
	 * @return itemModel[]
	 */
	public function parse(): array
	{
		$items = [];
		$xml = simplexml_load_string($this->data);
		foreach ($xml->porad as $xmlItem) {
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
		$item->title = $SimpleXMLElement->nazvy->nazev;
		$item->title .= $SimpleXMLElement->nazvy->nazev_casti != "" ? ": " . $SimpleXMLElement->nazvy->nazev_casti : "";
		$item->link = $SimpleXMLElement->linky->program;
		$item->description = $SimpleXMLElement->noticka;
		$item->pubDate = "";
		$item->category = $SimpleXMLElement->zanr;
		$item->guid = "";
		return $item;
	}
}
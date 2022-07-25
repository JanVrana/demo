<?php

namespace model;

/**
 *The class stores one feed item
 */
class itemModel
{
	/**
	* @var string Title
	 */
	public string $title;
	
	/**
	 * @var string Link
	 */
	public string $link;
	
	/**
	 * @var string Description
	 */
	public string $description;
	
	/**
	 * @var string date of publication 
	 */
	public string $pubDate;
	
	/**
	 * @var string category
	 */
	public string $category;
	
	/**
	 * @var string rss guid
	 */
	public string $guid;

	/**
	 * converts the object to an array
	 * @return array 
	 */
	public function toArray(){ 
		$array = [];
		foreach (get_class_vars(static::class) as  $name => $value) {
			$array[$name] = $value; 
		}
		return $array;
	}
	
}
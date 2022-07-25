<?php

namespace model;

class itemModel
{
	public string $title;
	public string $link; 
	public string $description; 
	public string $pubDate;
	public string $category; 
	public string $guid; 
	
	public function toArray(){ 
		$array = [];
		foreach (get_class_vars(static::class) as  $name => $value) {
			$array[$name] = $value; 
		}
		return $array;
	}
	
}
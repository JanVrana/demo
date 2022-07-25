<?php

namespace response;

class markdownResponse extends baseResponse
{
	public function view(){
		foreach ($this->itemModel as $item) {
			echo "<pre>";
			echo "## [".$item->title."](".$item->link.")\n";
			echo "> ".$item->description."\n";
			echo "</pre>";
			//var_dump($item);
		}
	}
	
}
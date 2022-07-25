<?php

namespace response;
use model\itemModel;


interface responseInterface
{
	public function __construct(array $itemModel);
	public function view();

}
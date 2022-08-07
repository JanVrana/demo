<?php

namespace controller;

/**
 * Interface of Controller 
 */
interface controllerInterface
{
	/**
	 * sends the output to the Controller
	 * @return void
	 */
	public function show(): void;
}
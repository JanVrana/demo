<?php

namespace controller;

use tools\config;

/**
 * Base Controller
 */
abstract class baseController implements controllerInterface
{
	/**
	 * Config object
	 * @var \tools\config
	 */
	public config $config;
}
<?php

namespace presenter;

use tools\config;

/**
 * Base Presenter
 */
abstract class basePresenter implements presenterInterface
{
	/**
	 * Config object
	 * @var \tools\config
	 */
	public config $config;
}
<?php

namespace presenter;

use tools\config;

/**
 * Base Presenter
 */
class basePresenter implements presenterInterface
{
	/**
	 * Con
	 * @var \tools\config
	 */
	public config $config;
}
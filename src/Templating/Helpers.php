<?php

/**
 * This file is part of the Nette Framework (https://nette.org)
 * Copyright (c) 2004 David Grudl (https://davidgrudl.com)
 */

namespace Nette\Templating;

use Latte;
use Nette;
use Nette\Utils\Strings;


/**
 * @deprecated
 */
class Helpers extends Latte\Runtime\Filters
{
	private static $helpers = array(
		'normalize' => 'Nette\Utils\Strings::normalize',
		'toascii' => 'Nette\Utils\Strings::toAscii',
		'webalize' => 'Nette\Utils\Strings::webalize',
		'padleft' => 'Nette\Utils\Strings::padLeft',
		'padright' => 'Nette\Utils\Strings::padRight',
		'reverse' => 'Nette\Utils\Strings::reverse',
		'url' => 'rawurlencode',
	);


	/**
	 * Try to load the requested helper.
	 * @param  string  helper name
	 * @return callable
	 */
	public static function loader($helper)
	{
		trigger_error(__CLASS__ . ' is deprecated.', E_USER_DEPRECATED);
		if (method_exists(__CLASS__, $helper)) {
			return array(__CLASS__, $helper);
		} elseif (isset(self::$helpers[$helper])) {
			return self::$helpers[$helper];
		}
	}


	/**
	 * Date/time modification.
	 * @param  string|int|\DateTime
	 * @param  string|int
	 * @param  string
	 * @return Nette\Utils\DateTime
	 */
	public static function modifyDate($time, $delta, $unit = null)
	{
		return $time == null // intentionally ==
			? null
			: Nette\Utils\DateTime::from($time)->modify($delta . $unit);
	}


	/**
	 * Returns array of string length.
	 * @param  mixed
	 * @return int
	 */
	public static function length($var): int
	{
		return is_string($var) ? Strings::length($var) : count($var);
	}


	/**
	 * /dev/null.
	 * @param  mixed
	 * @return string
	 */
	public static function null()
	{
		return '';
	}


	public static function optimizePhp($source, $lineLength = 80)
	{
		return Latte\Helpers::optimizePhp($source, $lineLength);
	}
}

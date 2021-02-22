<?php
/** 
 * @package   	VikWP - Libraries
 * @subpackage 	adapter.html
 * @author    	E4J s.r.l.
 * @copyright 	Copyright (C) 2020 E4J s.r.l. All Rights Reserved.
 * @license  	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @link 		https://vikwp.com
 */

// No direct access
defined('ABSPATH') or die('No script kiddies please!');

/**
 * Utility class for jQuery behaviors.
 *
 * @since 10.0
 */
abstract class JHtmlJQuery
{
	/**
	 * Includes jQuery framework.
	 *
	 * @return 	void
	 */
	public static function framework()
	{
		// Do nothing, jQuery framework is included by default.
		// Used to avoid portability errors.
	}
}

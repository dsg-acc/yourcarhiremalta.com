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
 * Utility class for Form behaviors.
 *
 * @since 10.0
 */
abstract class JHtmlForm
{
	/**
	 * Generates an input hidden containing a form token.
	 *
	 * @return 	string 	The form token.
	 */
	public static function token()
	{
		$token = JSession::getFormToken();

		return "<input type=\"hidden\" name=\"$token\" value=\"1\" />";
	}
}

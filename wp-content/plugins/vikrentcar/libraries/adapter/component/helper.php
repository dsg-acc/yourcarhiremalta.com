<?php
/** 
 * @package   	VikWP - Libraries
 * @subpackage 	adapter.component
 * @author    	E4J s.r.l.
 * @copyright 	Copyright (C) 2020 E4J s.r.l. All Rights Reserved.
 * @license  	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @link 		https://vikwp.com
 */

// No direct access
defined('ABSPATH') or die('No script kiddies please!');

JLoader::import('adapter.component.registry');

/**
 * Component helper class
 *
 * @since 10.0
 */
class JComponentHelper
{
	/**
	 * Gets the parameter object for the component.
	 *
	 * @param   string   $option  The option for the component.
	 * @param   boolean  $strict  If set and the component does not exist, false will be returned.
	 *
	 * @return  JComponentRegistry
	 */
	public static function getParams($option, $strict = false)
	{
		return new JComponentRegistry($option);
	}

	/**
	 * Get the component information.
	 *
	 * @param   string   $option  The component option.
	 * @param   boolean  $strict  If set and the component does not exist, the enabled attribute will be set to false.
	 *
	 * @return  mixed    An object with the information for the component.
	 *
	 * @since   10.1.16
	 */
	public static function getComponent($option, $strict = false)
	{
		// always return NULL on WordPress to avoid triggering native Joomla updates
		return null;
	}
}

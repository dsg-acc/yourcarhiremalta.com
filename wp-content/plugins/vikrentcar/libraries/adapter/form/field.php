<?php
/** 
 * @package   	VikWP - Libraries
 * @subpackage 	adapter.form
 * @author    	E4J s.r.l.
 * @copyright 	Copyright (C) 2020 E4J s.r.l. All Rights Reserved.
 * @license  	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @link 		https://vikwp.com
 */

// No direct access
defined('ABSPATH') or die('No script kiddies please!');

/**
 * Form field class to handle XML fields.
 *
 * @since 10.0
 */
abstract class JFormField
{
	/**
	 * A list of paths in which to search for the fields to load.
	 *
	 * @var array
	 */
	private static $_paths = array();

	/**
	 * A map of relationships between the types and the handlers classnames.
	 *
	 * @var array
	 */
	private static $_cache = array();

	/**
	 * The layout identifier.
	 * Overwrite in children classes.
	 *
	 * @var   string
	 * @since 10.1.20
	 */
	protected $layoutId = null;

	/**
	 * Tries to instantiate the class used to handle
	 * the specified field XML element.
	 *
	 * @param 	SimpleXMLElement 	$field 	The field element.
	 *
	 * @return 	JFormField 			A new field instance.
	 */
	public static function getInstance($field)
	{
		// get field type
		$type = (string) $field->attributes()->type;

		// text by default
		if (empty($type))
		{
			$type = 'text';
		}

		// if not cached, search for a handler classname
		if (!isset(static::$_cache[$type]))
		{
			// find the handler
			$res = static::findField($type);

			// on failure, text handler by default
			if (!$res)
			{
				$res = 'JFormFieldText';
			}

			// cache the handler
			static::$_cache[$type] = $res;
		}

		// obtain the classname from the cache
		$classname = static::$_cache[$type];

		// instantiate the handler
		return new $classname($field);
	}

	/**
	 * Tries to search for the specified field type.
	 *
	 * @param 	string 	$type 	The field type.
	 *
	 * @return 	mixed 	The field classname on success, otherwise false.
	 */
	protected static function findField($type)
	{
		// get default fields pool (./fields)
		$paths = array();
		$paths[] = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'fields';

		// merge the default and additional paths
		$paths = array_merge($paths, static::$_paths); 
		
		// iterate the paths
		foreach ($paths as $path)
		{
			// try to load the handler
			if (JLoader::import($type, $path))
			{
				// build classname
				$classname = 'JFormField' . ucwords($type);

				// make sure the handler exists
				if (class_exists($classname))
				{
					// file found, return the classname
					return $classname;
				}
			}
		}

		// load text field for unknown types
		JLoader::import('adapter.form.fields.text');

		return false;
	}

	/**
	 * Adds a new path containing custom fields handlers.
	 *
	 * @param 	string 	$path 	The directory path.
	 *
	 * @return 	void
	 */
	public static function addIncludePath($path)
	{
		if (!in_array($path, static::$_paths))
		{
			static::$_paths[] = $path;
		}
	}

	/**
	 * Class constructor.
	 *
	 * @param 	SimpleXMLElement 	$field 	The field element.
	 */
	public function __construct($field)
	{
		$this->setup($field);
	}

	/**
	 * Helper method to setup the field.
	 *
	 * @param 	SimpleXMLElement 	$field 	The field element.
	 *
	 * @return 	void
	 */
	protected function setup($element)
	{
		// workaround for sql fields with no default option
		$this->option = array();

		// iterate the attributes
		foreach ($element->attributes() as $k => $v)
		{
			$this->{$k} = (string) $v;
		}

		if (count($element))
		{
			// iterate the children
			foreach ($element as $k => $child)
			{
				// create the container if not set
				if (!isset($this->{$k}))
				{
					$this->{$k} = array();
				}

				// get the value from attributes
				$value = $child->attributes()->value;

				if (is_null($value))
				{
					// push the element without key if the value is NULL
					$this->{$k}[] = (string) $child;
				}
				else
				{
					// the value is set, make an associative list
					$this->{$k}[(string) $value] = (string) $child;
				}
			}
		}

		/**
		 * In case value is not set, use default one.
		 *
		 * @since 10.1.29
		 */
		if (!isset($this->value) && isset($this->default))
		{
			$this->value = $this->default;
		}

		/**
		 * Automatically generate a field ID if not specified.
		 *
		 * @since 10.1.29
		 */
		if (!isset($this->id))
		{
			$this->id = 'jform_' . preg_replace("/[^a-z0-9_\-]+/i", '', $this->name);
		}
	}

	/**
	 * Magic method to access internal properties.
	 *
	 * @param 	string 	$name 	The property to access.
	 *
	 * @return 	mixed 	The property value.
	 */
	public function __get($name)
	{
		// protected properties are not allowed
		$name = ltrim($name, '_');

		// check if the property exists
		if (isset($this->{$name}))
		{
			return $this->{$name};
		}
		// if name is equals to 'element' return an assoc
		// list containing all the field attributes
		else if ($name === 'element')
		{
			// get a list of public properties
			return (array) get_object_vars($this);
		}

		return null;
	}

	/**
	 * Method used to bind the field properties.
	 *
	 * @param 	mixed 	$value 	The property value.
	 * @param 	string 	$key 	The property name (value by default).
	 *
	 * @return 	self 	This object to support chaining.
	 */
	public function bind($value, $key = 'value')
	{
		$this->{$key} = $value;

		return $this;
	}

	/**
	 * Placeholder used to render the form field.
	 *
	 * @return 	string 	The HTML field.
	 *
	 * @uses 	getInput()
	 */
	public function render()
	{
		return $this->getInput();
	}

	/**
	 * Placeholder used to render the form field.
	 *
	 * @return 	string 	The HTML field.
	 *
	 * @uses 	getLayoutData()
	 */
	public function getInput()
	{
		// make sure we have a layout id
		if (!$this->layoutId)
		{
			return;
		}

		// create layout file
		$layout = new JLayoutFile($this->layoutId);

		if (!empty($this->modowner))
		{
			// in case of modowner property, add plugin include path to access layout files properly
			$layout->addIncludePath(implode(DIRECTORY_SEPARATOR, array(WP_PLUGIN_DIR, $this->modowner, 'libraries')));
		}

		// obtain layout data and complete field rendering
		return $layout->render($this->getLayoutData());
	}

	/**
	 * Method to get the data to be passed to the layout for rendering.
	 *
	 * @return 	array 	An associative array of display data.
	 *
	 * @since 	10.1.20
	 */
	public function getLayoutData()
	{
		return array();
	}
}

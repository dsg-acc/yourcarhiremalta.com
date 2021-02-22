<?php
/** 
 * @package   	VikWP - Libraries
 * @subpackage 	adapter.event
 * @author    	E4J s.r.l.
 * @copyright 	Copyright (C) 2020 E4J s.r.l. All Rights Reserved.
 * @license  	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @link 		https://vikwp.com
 */

// No direct access
defined('ABSPATH') or die('No script kiddies please!');

JLoader::import('adapter.event.event');

/**
 * Class to handle dispatching of events.
 *
 * @since 10.1.11
 */
class JEventDispatcher
{
	/**
	 * Stores the singleton instance of the dispatcher.
	 *
	 * @var JEventDispatcher
	 */
	protected static $instance = null;

	/**
	 * A list of observed classes.
	 *
	 * @var string
	 */
	protected $observers = array();

	/**
	 * Returns the global Event Dispatcher object, only creating it
	 * if it doesn't already exist.
	 *
	 * @return  JEventDispatcher  The EventDispatcher object.
	 */
	public static function getInstance()
	{
		if (self::$instance === null)
		{
			self::$instance = new static();
		}

		return self::$instance;
	}

	/**
	 * Triggers an event by dispatching arguments to all observers that handle
	 * the event and returning their return values.
	 *
	 * @param   string  $event  The event to trigger.
	 * @param   array   $args   An array of arguments.
	 *
	 * @return  array  An array of results from each called function.
	 */
	public function trigger($event, $args = array())
	{
		// make sure we are passing an array of arguments
		$args = (array) $args;

		// Push an empty value at the beginning of the list for being 
		// manipulated at every execution of the filter.
		array_unshift($args, null);

		/**
		 * Trigger the event.
		 * Use `apply_filters_ref_array` instead of `do_action_ref_array`
		 * to start supporting return values.
		 *
		 * @since 10.1.23
		 */
		$return = apply_filters_ref_array($event, $args);

		if (is_null($return))
		{
			// return an empty list as none manipulated the return value
			return array();
		}

		// push the returned value within a list for Joomla standards
		return array($return);
	}

	/**
	 * Registers an event handler to the event dispatcher
	 *
	 * @param   string  $event    Name of the event to register handler for.
	 * @param   string  $handler  Name of the event handler.
	 *
	 * @return  void
	 *
	 * @since   10.1.30
	 * @throws  InvalidArgumentException
	 */
	public function register($event, $handler)
	{
		// are we dealing with a class or callback type handler?
		if (is_callable($handler))
		{
			// function type event handler, let's attach it
			$method = array('event' => $event, 'handler' => $handler);
			$this->attach($method);
		}
		else if (class_exists($handler))
		{
			// class type event handler, let's instantiate and attach it
			$this->attach(new $handler($this));
		}
		else
		{
			throw new InvalidArgumentException('Invalid event handler.');
		}
	}

	/**
	 * Attach an observer object.
	 *
	 * @param   mixed  $observer  An observer object to attach.
	 *
	 * @return  void
	 *
	 * @since   10.1.29
	 */
	public function attach($observer)
	{
		if (is_array($observer))
		{
			if (!isset($observer['handler']) || !isset($observer['event']) || !is_callable($observer['handler']))
			{
				return;
			}

			// make sure we haven't already attached this array as an observer
			foreach ($this->observers as $check)
			{
				if (is_array($check) && $check['event'] === $observer['event'] && $check['handler'] === $observer['handler'])
				{
					// callback already registered
					return;
				}
			}

			// obtain callback reflection and retrieve arguments
			$reflection = new ReflectionFunction($observer['handler']);
			$params     = $reflection->getParameters();

			// Register filter.
			// Always increase parameters counter by one in order to
			// accept the return value, which is never passed on Joomla.
			add_filter($observer['event'], $observer['handler'], 10, count($params) + 1);
		}
		else
		{
			// make sure we haven't already attached this object as an observer
			$class = get_class($observer);

			foreach ($this->observers as $check)
			{
				if ($check instanceof $class)
				{
					// class already observed
					return;
				}
			}

			// obtain class reflection
			$reflection = new ReflectionClass($observer);

			// retrieve all methods
			$methods = $reflection->getMethods();

			// retrieve all JEvent methods
			$default = get_class_methods('JEvent');

			foreach ($methods as $method)
			{
				// make sure the method is not already used by the parent class,
				// it is public and it is not static
				if (!in_array($method->name, $default) && $method->isPublic() && !$method->isStatic())
				{	
					// get method parameters
					$params = $method->getParameters();

					// Register filter.
					// Always increase parameters counter by one in order to
					// accept the return value, which is never passed on Joomla.
					add_filter($method->name, array($observer, $method->name), 10, count($params) + 1);
				}
			}
		}

		// cache observer to avoid registering the same events more than once
		$this->observers[] = $observer;
	}
}

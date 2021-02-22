<?php
/** 
 * @package   	VikWP - Libraries
 * @subpackage 	adapter.session
 * @author    	E4J s.r.l.
 * @copyright 	Copyright (C) 2020 E4J s.r.l. All Rights Reserved.
 * @license  	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @link 		https://vikwp.com
 */

// No direct access
defined('ABSPATH') or die('No script kiddies please!');

/**
 * Class adapter for managing HTTP sessions using the Joomla standard interface.
 *
 * @since 10.0
 */
class JSession
{
	/**
	 * The session adapter instance.
	 *
	 * @var JSession
	 */
	private static $instance = null;

	/**
	 * Session data pool.
	 *
	 * @var array
	 */
	private $data;

	/**
	 * Class constructor.
	 */
	public function __construct()
	{
		$this->data = &$_SESSION;
	}

	/**
	 * Returns the global Session object, only creating it if it doesn't already exist.
	 *
	 * @return 	self 	The session object.
	 */
	public static function getInstance()
	{
		if (static::$instance === null)
		{
			static::$instance = new JSession();
		}

		return static::$instance;
	}

	/**
	 * Gets data from the session store.
	 *
	 * @param 	string 	$name 		Name of a variable.
	 * @param 	mixed 	$default 	Default value of a variable if not set.
	 * @param 	string 	$namespace 	Namespace to use.
	 *
	 * @return 	mixed 	Value of a variable.
	 */
	public function get($name, $default = null, $namespace = 'default')
	{
		// add prefix and namespace to avoid collisions
		$key = '__' . $namespace . '.' . $name;

		// check if the key is contained in the SESSION
		if (isset($this->data[$key]))
		{
			return $this->data[$key];
		}

		return $default;
	}

	/**
	 * Sets data into the session store.
	 *
	 * @param 	string 	$name 		Name of a variable.
	 * @param 	mixed 	$value 		Value of a variable.
	 * @param 	string 	$namespace 	Namespace to use.
	 *
	 * @return 	mixed 	Old value of a variable.
	 *
	 * @uses 	get()
	 */
	public function set($name, $value = null, $namespace = 'default')
	{
		$prev = $this->get($name, null, $namespace);

		// add prefix and namespace to avoid collisions
		$key = '__' . $namespace . '.' . $name;

		// push the value in the session
		$this->data[$key] = $value;

		return $prev;
	}

	/**
	 * Checks whether data exists in the session store.
	 *
	 * @param 	string 	 $name 		 Name of variable.
	 * @param 	string 	 $namespace  Namespace to use.
	 *
	 * @return  boolean  True if the variable exists.
	 *
	 * @uses 	get()
	 */
	public function has($name, $namespace = 'default')
	{
		return !is_null($this->get($name, null, $namespace));
	}

	/**
	 * Unsets data from the session store.
	 *
	 * @param 	string 	$name 		Name of variable.
	 * @param 	string 	$namespace 	Namespace to use.
	 *
	 * @return 	mixed 	The value from session or NULL if not set.
	 *
	 * @uses 	set()
	 */
	public function clear($name, $namespace = 'default')
	{
		return $this->set($name, null, $namespace);
	}

	/**
	 * Get a session token, if a token isn't set yet one will be generated.
	 *
	 * Tokens are used to secure forms from spamming attacks. Once a token
	 * has been generated the system will check the post request to see if
	 * it is present, if not it will invalidate the session.
	 *
	 * @param   boolean  $forceNew  If true, force a new token to be created.
	 *
	 * @return  string  The session token.
	 *
	 * @uses 	get()
	 * @uses 	_createToken()
	 */
	public function getToken($forceNew = false)
	{
		$token = $this->get('session.token');

		// create a token
		if ($token === null || $forceNew)
		{
			$token = $this->_createToken();
			$this->set('session.token', $token);
		}

		return $token;
	}

	/**
	 * Create a token-string
	 *
	 * @param   integer  $length  Length of string
	 *
	 * @return  string  Generated token
	 *
	 * @since   11.1
	 */
	protected function _createToken($length = 32)
	{
		return md5(uniqid() . rand(1000, 9999));
	}

	/**
	 * Method to determine a hash for anti-spoofing variable names.
	 *
	 * @param   boolean  $forceNew  If true, force a new token to be created.
	 *
	 * @return  string   Hashed var name.
	 *
	 * @uses 	getToken()
	 */
	public static function getFormToken($forceNew = false)
	{
		$user 	 = JFactory::getUser();
		$session = JFactory::getSession();

		return md5($user->id . $session->getToken($forceNew));
	}

	/**
	 * Checks for a form token in the request.
	 * Use with JHtml::_('form.token') or Session::getFormToken().
	 *
	 * @param   string   $method  The request method in which to look for the token key.
	 *
	 * @return  boolean  True if found and valid, false otherwise.
	 */
	public static function checkToken($method = 'post')
	{
		$token  = static::getFormToken();
		$app 	= JFactory::getApplication();

		// check from header first
		if ($token === $app->input->server->get('HTTP_X_CSRF_TOKEN', '', 'alnum'))
		{
			return true;
		}

		// then fallback to HTTP query
		if (!$app->input->$method->get($token, '', 'alnum'))
		{
			return false;
		}

		return true;
	}
}

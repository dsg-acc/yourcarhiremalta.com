<?php
/** 
 * @package   	VikWP - Libraries
 * @subpackage 	adapter.payment
 * @author    	E4J s.r.l.
 * @copyright 	Copyright (C) 2020 E4J s.r.l. All Rights Reserved.
 * @license  	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @link 		https://vikwp.com
 */

// No direct access
defined('ABSPATH') or die('No script kiddies please!');

JLoader::import('adapter.payment.status');

/**
 * This class describes the events that an abstract payment should handle.
 * 
 * @since 10.1
 */
abstract class JPayment
{
	/**
	 * The name of the plugin that has requested the payment.
	 *
	 * @var string
	 */
	protected $caller;

	/**
	 * The driver identifier of the gateway.
	 *
	 * @var string
	 */
	protected $driver;

	/**
	 * The order details.
	 *
	 * @var JObject
	 */
	protected $order;

	/**
	 * The payment configuration parameters.
	 *
	 * @var JObject
	 */
	protected $params;

	/**
	 * Class constructor.
	 *
	 * @param 	string 	$caller  The name of the plugin that requested the payment.
	 * @param 	mixed 	$order 	 The order details to start the transaction.
	 * @param 	mixed 	$params  The configuration of the payment.
	 */
	public function __construct($caller, $order, $params = array())
	{
		if (is_string($params))
		{
			$params = (array) json_decode($params);
		}

		$this->caller 	= $caller;
		$this->order 	= new JObject($order);
		$this->params 	= new JObject($params);
	}

	/**
	 * Returns the name of the plugin that dispatched the payment.
	 *
	 * @return 	string
	 */
	public function getCaller()
	{
		return $this->caller;
	}

	/**
	 * Checks if the given caller matches the current one.
	 *
	 * @param 	string 	 $caller  The caller to check.
	 *
	 * @return 	boolean  True if the callers are equal, otherwise false.
	 *
	 * @uses 	getCaller()
	 *
	 * @since 	10.1.1
	 */
	public function isCaller($caller)
	{
		return !strcasecmp($this->getCaller(), $caller);
	}

	/**
	 * Returns the name of the driver.
	 *
	 * @return 	string
	 */
	public function getDriver()
	{
		if (!$this->driver)
		{
			/**
			 * Fixed driver name calculation, which was
			 * based on the file name instead of the classname.
			 *
			 * @since 10.1.1 
			 */

			$class = get_class($this);

			$this->driver = preg_replace_callback("/{$this->caller}(.*?)Payment/i", function($match)
			{
				return $match[1];
			}, $class);

			$this->driver = strtolower($this->driver);
		}

		return $this->driver;
	}

	/**
	 * Checks if the given driver matches the current one.
	 *
	 * @param 	string 	 $driver  The driver to check.
	 *
	 * @return 	boolean  True if the drivers are equal, otherwise false.
	 *
	 * @uses 	getDriver()
	 */
	public function isDriver($driver)
	{
		return !strcasecmp($this->getDriver(), $driver);
	}

	/**
	 * Returns the order detail related to the specified key.
	 *
	 * @param 	string 	$key 	The registry key.
	 * @param 	mixed 	$def 	The default value if the key is not set.
	 *
	 * @return 	mixed 	The registry value, or the default one.
	 */
	public function get($key, $def = null)
	{
		return $this->order->get($key, $def);
	}

	/**
	 * Updates the specified key into the order details object.
	 *
	 * @param 	string 	$key 	The registry key.
	 * @param 	mixed 	$val 	The value to update.
	 *
	 * @param 	mixed 	The old value.
	 */
	public function set($key, $val)
	{
		return $this->order->set($key, $val);
	}

	/**
	 * Returns an associative array containing the order details.
	 *
	 * @return 	array
	 *
	 * @since 	10.1.30
	 */
	public function getOrder()
	{
		return $this->order->getProperties();
	}

	/**
	 * Returns the configuration parameter related to the specified key.
	 *
	 * @param 	string 	$key 	The registry key.
	 * @param 	mixed 	$def 	The default value if the key is not set.
	 *
	 * @return 	mixed 	The registry value, or the default one.
	 */
	public function getParam($key, $def = null)
	{
		return $this->params->get($key, $def);
	}

	/**
	 * Updates the specified key into the configuration object.
	 *
	 * @param 	string 	$key 	The registry key.
	 * @param 	mixed 	$val 	The value to update.
	 *
	 * @param 	mixed 	The old value.
	 */
	public function setParam($key, $val)
	{
		return $this->params->set($key, $val);
	}

	/**
	 * Returns an associative array containing the payments parameters.
	 *
	 * @return 	array
	 *
	 * @since 	10.1.30
	 */
	public function getParams()
	{
		return $this->params->getProperties();
	}

	/**
	 * Returns an associative array containing the form
	 * fields used to construct the configuration of the payment.
	 *
	 * This method triggers two ACTIONS to manipulate the 
	 * configuration array before it is returned:
	 * - payment_before_admin_params
	 * - payment_after_admin_params
	 *
	 * @return 	array 	The payment configuration.
	 *
	 * @uses 	buildAdminParameters()
	 */
	public function getAdminParameters()
	{
		/**
		 * Plugins can manipulate the properties of this object.
		 * Fires before the configuration array is generated.
		 *
		 * @param 	self 	A reference to this object.
		 *
		 * @since 	10.1.1
		 */
		do_action('payment_before_admin_params_' . $this->caller, array(&$this));

		// children payment will create the configuration form (as array)
		$config = $this->buildAdminParameters();

		/**
		 * Plugins can manipulate the configuration form of the payment.
		 * Fires after generating the config form.
		 *
		 * @param 	self 	A reference to this object.
		 * @param 	array 	A reference to the configuration array.
		 *
		 * @since 	10.1.1
		 */
		do_action_ref_array('payment_after_admin_params_' . $this->caller, array(&$this, &$config));

		return $config;
	}

	/**
	 * Abstract method used to build the associative array 
	 * to allow the plugins to construct a configuration form.
	 *
	 * In case the payment needs an API Key, the array should
	 * be built as follows:
	 *
	 * {"apikey": {"type": "text", "label": "API Key"}}
	 *
	 * @return 	array 	The associative array.
	 */
	protected function buildAdminParameters()
	{
		// return an empty array because a payment
		// may not need a configuration
		return array();
	}

	/**
	 * Returns the HTML of the payment that should be used
	 * to begin the transaction, such as a "Pay Now" button
	 * for hosted integrations or a credit card form for seamleass
	 * solutions.
	 *
	 * This method triggers the ACTION below to manipulate the payment details
	 * before they are used to display the HTML form:
	 * - payment_before_begin_transaction
	 *
	 * This method triggers the ACTION below to manipulate the HTML form
	 * before it is returned to the plugin that requested it:
	 * - payment_after_begin_transaction
	 *
	 * @return 	string 	The payment form.
	 *
	 * @uses 	beginTransaction()
	 */
	public function showPayment()
	{
		/**
		 * Plugins can manipulate the properties of this object.
		 * Fires before the payment form is initiated.
		 *
		 * @param 	self 	A reference to this object.
		 *
		 * @since 	10.1.1
		 */
		do_action('payment_before_begin_transaction_' . $this->caller, array(&$this));

		// start buffer
		ob_start();
		// children payment will start the transaction
		$this->beginTransaction();
		// get buffered contents
		$html = ob_get_contents();
		// clean buffer
		ob_end_clean();

		/**
		 * Plugins can manipulate the generated HTML form.
		 * Fires after generating the HTML payment form.
		 *
		 * @param 	self 	A reference to this object.
		 * @param 	string	A reference to the resulting HTML string.
		 *
		 * @since 	10.1.1
		 */
		do_action_ref_array('payment_after_begin_transaction_' . $this->caller, array(&$this, &$html));

		return $html;
	}

	/**
	 * Abstract method used to begin a payment transaction.
	 * This method usually generates the HTML form of the payment.
	 * The HTML contents can be echoed directly because this method
	 * is executed always within a buffer.
	 *
	 * @return 	void
	 */
	abstract protected function beginTransaction();

	/**
	 * Provides the validation of the payment transaction.
	 *
	 * This method triggers the ACTION below to manipulate the payment details
	 * before they are used to validate the transaction:
	 * - payment_before_validate_transaction
	 *
	 * This method triggers the ACTION below to manipulate the
	 * response evaluated by the payment:
	 * - payment_after_validate_transaction
	 *
	 * @return 	mixed 	An object describing the status of the transaction.
	 *
	 * @uses 	validateTransaction()
	 */
	public function validatePayment()
	{
		$status = new JPaymentStatus();

		/**
		 * Plugins can manipulate the properties of this object.
		 * Fires before the payment transaction is validated.
		 *
		 * @param 	self 	A reference to this object.
		 *
		 * @since 	10.1.1
		 */
		do_action('payment_before_validate_transaction_' . $this->caller, array(&$this));

		// children payment will validate the transaction to confirm the owner has been paid
		$this->validateTransaction($status);

		$response = null;

		/**
		 * Plugins can manipulate the response object to return.
		 * By filling the &$response variable, this method will return
		 * it instead of the default &$status one.
		 * Fires after validating the payment transaction.
		 *
		 * @param 	self 			A reference to this object.
		 * @param 	JPaymentStatus 	A reference to the status object.
		 * @param 	mixed 			A reference to the final response (null by default).
		 *
		 * @since 	10.1.1
		 */
		do_action_ref_array('payment_after_validate_transaction_' . $this->caller, array(&$this, &$status, &$response));

		if (is_null($response))
		{
			// no hook fired, the response will be equals to the status object
			$response = $status;
		}

		return $response;
	}

	/**
	 * Abstract method used to validate the payment transaction.
	 * It is usually an end-point that the providers use to POST the
	 * transaction data.
	 *
	 * @param 	JPaymentStatus 	&$status 	The status object. In case the payment was 
	 * 										successful, you should invoke: $status->verified().
	 *
	 * @return 	void
	 *
	 * @see 	JPaymentStatus
	 */
	abstract protected function validateTransaction(JPaymentStatus &$status);

	/**
	 * Method called to complete the transaction, for example to redirect
	 * the customers to a specific landing page.
	 *
	 * This method triggers the ACTION below before the payment is finalised:
	 * - payment_on_after_validation
	 *
	 * @param 	boolean  $res 	True if the payment was successful, otherwise false.
	 *
	 * @return 	void
	 *
	 * @uses 	complete()
	 */
	public function afterValidation($res = false)
	{
		/**
		 * Plugins can manipulate the properties of this object.
		 * Fires before the payment process is completed.
		 *
		 * @param 	self 	 A reference to this object.
		 * @param 	boolean  The result of the transaction.
		 *
		 * @since 	10.1.1
		 */
		do_action_ref_array('payment_on_after_validation_' . $this->caller, array(&$this, $res));

		$this->complete($res);
	}

	/**
	 * Abstract method used to finalise the payment.
	 * e.g. enter here the code used to redirect the
	 * customers to a specific landing page.
	 *
	 * @param 	boolean  $res 	True if the payment was successful, otherwise false.
	 *
	 * @return 	void
	 */
	protected function complete($res)
	{
		// do nothing as a plugin may
		// not need to finalise the payment
	}
}

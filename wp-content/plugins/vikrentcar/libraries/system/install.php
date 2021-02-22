<?php
/** 
 * @package   	VikRentCar - Libraries
 * @subpackage 	system
 * @author    	E4J s.r.l.
 * @copyright 	Copyright (C) 2018 E4J s.r.l. All Rights Reserved.
 * @license  	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @link 		https://vikwp.com
 */

// No direct access
defined('ABSPATH') or die('No script kiddies please!');

VikRentCarLoader::import('update.manager');
VikRentCarLoader::import('update.license');

/**
 * Class used to handle the activation, deactivation and 
 * uninstallation of VikRentCar plugin.
 *
 * @since 1.0
 */
class VikRentCarInstaller
{
	/**
	 * Flag used to init the class only once.
	 *
	 * @var boolean
	 */
	protected static $init = false;

	/**
	 * Initialize the class attaching wp actions.
	 *
	 * @return 	void
	 */
	public static function onInit()
	{
		// init only if not done yet
		if (static::$init === false)
		{
			// handle installation message
			add_action('admin_notices', array('VikRentCarInstaller', 'handleMessage'));

			/**
			 * Register hooks and actions here
			 */

			// mark flag as true to avoid init it again
			static::$init = true;
		}
	}

	/**
	 * Handles the activation of the plugin.
	 *
	 * @param 	boolean  $message 	True to display the activation message,
	 * 								false to ignore it.
	 *
	 * @return 	void
	 */
	public static function activate($message = true)
	{
		// get installed software version
		$version = get_option('vikrentcar_software_version', null);

		// check if the plugin has been already installed
		if (is_null($version))
		{
			// dispatch UPDATER to launch installation queries
			VikRentCarUpdateManager::install();

			// mark the plugin has installed to avoid duplicated installation queries
			update_option('vikrentcar_software_version', VIKRENTCAR_SOFTWARE_VERSION);
		}

		if ($message)
		{
			// set activation flag to display a message
			add_option('vikrentcar_onactivate', 1);
		}
	}

	/**
	 * Handles the deactivation of the plugin.
	 *
	 * @return 	void
	 */
	public static function deactivate()
	{
		// do nothing for the moment
	}

	/**
	 * Handles the uninstallation of the plugin.
	 *
	 * @param 	boolean  $drop 	True to drop the tables of VikRentCar from the database.
	 *
	 * @return 	void
	 */
	public static function uninstall($drop = true)
	{
		// dispatch UPDATER to drop database tables
		VikRentCarUpdateManager::uninstall($drop);

		// delete installation flag
		delete_option('vikrentcar_software_version');
	}

	/**
	 * Handles the uninstallation of the plugin.
	 * Proxy for uninstall method which always force database drop.
	 *
	 * @return 	void
	 *
	 * @uses 	uninstall()
	 *
	 * @since 	1.2.6
	 */
	public static function delete()
	{
		// complete uninstallation by dropping the database
		static::uninstall(true);
	}

	/**
	 * Checks if the current version should be updated
	 * and, eventually, processes it.
	 * 
	 * @return 	void
	 */
	public static function update()
	{
		// get installed software version
		$version = get_option('vikrentcar_software_version', null);

		$app = JFactory::getApplication();

		// check if we are running an older version
		if (VikRentCarUpdateManager::shouldUpdate($version))
		{
			/**
			 * Avoid useless redirections if doing ajax.
			 * 
			 * @since 1.1.6
			 */
			if (!wp_doing_ajax() && $app->isAdmin())
			{
				// process the update (we don't need to raise an error)
				VikRentCarUpdateManager::update($version);

				// update cached plugin version
				update_option('vikrentcar_software_version', VIKRENTCAR_SOFTWARE_VERSION);

				// check if pro version
				if (VikRentCarLicense::isPro())
				{
					// go to the pro-package download page
					$app->redirect('index.php?option=com_vikrentcar&view=getpro&version=' . $version);
					exit;
				}
			}
		}
		// check if the current instance is a new blog of a network
		else if (is_null($version))
		{
			/**
			 * The version is NULL, vikrentcar_software_version doesn't
			 * exist as an option of this blog.
			 * We need to launch the installation manually.
			 *
			 * @see 	activate()
			 *
			 * @since 	1.0.6
			 */

			// Use FALSE to ignore the activation message
			static::activate(false);
		}
	}

	/**
	 * Method used to check for any installation message to show.
	 *
	 * @return 	void
	 */
	public static function handleMessage()
	{
		$app = JFactory::getApplication();

		// if we are in the admin section and the plugin has been activated
		if ($app->isAdmin() && get_option('vikrentcar_onactivate') == 1)
		{
			// delete the activation flag to avoid displaying the message more than once
			delete_option('vikrentcar_onactivate');

			?>
			<div class="notice is-dismissible notice-success">
				<p>
					<strong>Thanks for activating our plugin!</strong>
					<a href="https://vikwp.com" target="_blank">https://vikwp.com</a>
				</p>
			</div>
			<?php
		}
	}
}

<?php
/**
 * @package     VikRentCar
 * @subpackage  com_vikrentcar
 * @author      Alessio Gaggii - e4j - Extensionsforjoomla.com
 * @copyright   Copyright (C) 2018 e4j - Extensionsforjoomla.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        https://vikwp.com
 */

defined('ABSPATH') or die('No script kiddies please!');

// import Joomla view library
jimport('joomla.application.component.view');

class VikRentCarViewCronexec extends JViewVikRentCar {
	
	function display($tpl = null) {
		// This view is usually called within a modal box, so it does not require the toolbar or page title
		
		$dbo = JFactory::getDbo();
		$pcron_id = VikRequest::getInt('cron_id', '', 'request');
		$pcronkey = VikRequest::getString('cronkey', '', 'request');
		if ($pcronkey != VikRentCar::getCronKey()) {
			echo 'Error1';
			die;
		}
		$q = "SELECT * FROM `#__vikrentcar_cronjobs` WHERE `id`=".(int)$pcron_id.";";
		$dbo->setQuery($q);
		$dbo->execute();
		if ($dbo->getNumRows() == 1) {
			$cron_data = $dbo->loadAssoc();
			if (is_file(VRC_ADMIN_PATH.DIRECTORY_SEPARATOR.'cronjobs'.DIRECTORY_SEPARATOR.$cron_data['class_file'])) {
				//
				ob_start();
				require_once(VRC_ADMIN_PATH.DIRECTORY_SEPARATOR.'cronjobs'.DIRECTORY_SEPARATOR.$cron_data['class_file']);
				$cron_obj = new VikCronJob($cron_data['id'], json_decode($cron_data['params'], true));
				$cron_obj->debug = true;
				$run_res = $cron_obj->run();
				$cron_output = ob_get_contents();
				ob_end_clean();
				$cron_obj->afterRun();
				//
				$this->cron_data = &$cron_data;
				$this->run_res = &$run_res;
				$this->cron_output = &$cron_output;
				$this->cron_obj = &$cron_obj;
				
				// Display the template
				parent::display($tpl);
			} else {
				echo 'Error2';
				die;
			}
		}
	}

}

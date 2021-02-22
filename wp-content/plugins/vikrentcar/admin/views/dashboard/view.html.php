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

class VikRentCarViewDashboard extends JViewVikRentCar {
	
	function display($tpl = null) {
		// Set the toolbar
		$this->addToolBar();
		
		/**
		 * @wponly - trigger back up of extendable files
		 */
		VikRentCarLoader::import('update.manager');
		VikRentCarUpdateManager::triggerExtendableClassesBackup('languages', "/^.+\-((?!en_US|it_IT).)+$/");
		//

		$pidplace = VikRequest::getInt('idplace', '', 'request');
		$dbo = JFactory::getDbo();
		$list_limit = (int)JFactory::getApplication()->get('list_limit');
		$list_limit = $list_limit < 10 ? 10 : $list_limit;
		$q = "SELECT COUNT(*) FROM `#__vikrentcar_prices`;";
		$dbo->setQuery($q);
		$dbo->execute();
		$totprices = $dbo->loadResult();
		$q = "SELECT `id`,`name` FROM `#__vikrentcar_places` ORDER BY `#__vikrentcar_places`.`name` ASC;";
		$dbo->setQuery($q);
		$dbo->execute();
		$totlocations = $dbo->getNumRows();
		if ($totlocations > 0) {
			$allplaces = $dbo->loadAssocList();
		} else {
			$allplaces = "";
		}
		$q = "SELECT COUNT(*) FROM `#__vikrentcar_categories`;";
		$dbo->setQuery($q);
		$dbo->execute();
		$totcategories = $dbo->loadResult();
		$q = "SELECT COUNT(*) FROM `#__vikrentcar_cars`;";
		$dbo->setQuery($q);
		$dbo->execute();
		$totcars = $dbo->loadResult();
		$q = "SELECT COUNT(*) FROM `#__vikrentcar_dispcost`;";
		$dbo->setQuery($q);
		$dbo->execute();
		$totdailyfares = $dbo->loadResult();
		$arrayfirst = array('totprices' => $totprices, 'totlocations' => $totlocations, 'totcategories' => $totcategories, 'totcars' => $totcars, 'totdailyfares' => $totdailyfares);
		$nextrentals = "";
		$totnextrentconf = 0;
		$totnextrentpend = 0;
		$today_start_ts = mktime(0, 0, 0, date("n"), date("j"), date("Y"));
		$today_end_ts = mktime(23, 59, 59, date("n"), date("j"), date("Y"));
		$pickup_today = array();
		$dropoff_today = array();
		$cars_locked = array();
		if ($totprices > 0 && $totcars > 0) {
			$q = "SELECT `id`,`custdata`,`status`,`idcar`,`ritiro`,`consegna`,`idplace`,`idreturnplace`,`country`,`nominative` FROM `#__vikrentcar_orders` WHERE `ritiro`>".$today_end_ts." ".($pidplace > 0 ? "AND `idplace`='".$pidplace."' " : "")."ORDER BY `#__vikrentcar_orders`.`ritiro` ASC LIMIT ".$list_limit.";";
			$dbo->setQuery($q);
			$dbo->execute();
			if ($dbo->getNumRows() > 0) {
				$nextrentals = $dbo->loadAssocList();
			}
			$q = "SELECT `id`,`custdata`,`status`,`idcar`,`ritiro`,`consegna`,`idplace`,`idreturnplace`,`country`,`nominative` FROM `#__vikrentcar_orders` WHERE `ritiro`>=".$today_start_ts." AND `ritiro`<=".$today_end_ts." ORDER BY `#__vikrentcar_orders`.`ritiro` ASC LIMIT ".$list_limit.";";
			$dbo->setQuery($q);
			$dbo->execute();
			if ($dbo->getNumRows() > 0) {
				$pickup_today = $dbo->loadAssocList();
			}
			$q = "SELECT `id`,`custdata`,`status`,`idcar`,`ritiro`,`consegna`,`idplace`,`idreturnplace`,`country`,`nominative` FROM `#__vikrentcar_orders` WHERE `consegna`>=".$today_start_ts." AND `consegna`<=".$today_end_ts." ORDER BY `#__vikrentcar_orders`.`consegna` ASC LIMIT ".$list_limit.";";
			$dbo->setQuery($q);
			$dbo->execute();
			if ($dbo->getNumRows() > 0) {
				$dropoff_today = $dbo->loadAssocList();
			}
			$q = "DELETE FROM `#__vikrentcar_tmplock` WHERE `until`<" . time() . ";";
			$dbo->setQuery($q);
			$dbo->execute();
			$q = "SELECT `lock`.*,`c`.`name` AS `car_name`,`o`.`custdata`,`o`.`idcar`,`o`.`country`,`o`.`nominative` FROM `#__vikrentcar_tmplock` AS `lock` LEFT JOIN `#__vikrentcar_orders` `o` ON `lock`.`idorder`=`o`.`id` LEFT JOIN `#__vikrentcar_cars` `c` ON `lock`.`idcar`=`c`.`id` WHERE `lock`.`until`>".time()." ORDER BY `lock`.`id` DESC;";
			$dbo->setQuery($q);
			$dbo->execute();
			if ($dbo->getNumRows() > 0) {
				$cars_locked = $dbo->loadAssocList();
			}
			$q = "SELECT COUNT(*) FROM `#__vikrentcar_orders` WHERE `ritiro`>".time()." AND `status`='confirmed';";
			$dbo->setQuery($q);
			$dbo->execute();
			$totnextrentconf = $dbo->loadResult();
			$q = "SELECT COUNT(*) FROM `#__vikrentcar_orders` WHERE `ritiro`>".time()." AND `status`='standby';";
			$dbo->setQuery($q);
			$dbo->execute();
			$totnextrentpend = $dbo->loadResult();
		}

		$this->pidplace = &$pidplace;
		$this->arrayfirst = &$arrayfirst;
		$this->allplaces = &$allplaces;
		$this->nextrentals = &$nextrentals;
		$this->pickup_today = &$pickup_today;
		$this->dropoff_today = &$dropoff_today;
		$this->cars_locked = &$cars_locked;
		$this->totnextrentconf = &$totnextrentconf;
		$this->totnextrentpend = &$totnextrentpend;
		
		// Display the template
		parent::display($tpl);
	}

	/**
	 * Sets the toolbar
	 */
	protected function addToolBar() {
		JToolBarHelper::title(JText::_('VRMAINDASHBOARDTITLE'), 'vikrentcar');
		if (JFactory::getUser()->authorise('core.admin', 'com_vikrentcar')) {
			JToolBarHelper::preferences('com_vikrentcar');

			/**
			 * @wponly
			 */
			JToolBarHelper::shortcodes('com_vikrentcar');
		}
	}

}

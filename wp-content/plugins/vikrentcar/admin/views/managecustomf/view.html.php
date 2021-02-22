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

class VikRentCarViewManagecustomf extends JViewVikRentCar {
	
	function display($tpl = null) {
		// Set the toolbar
		$this->addToolBar();

		$cid = VikRequest::getVar('cid', array(0));
		if (!empty($cid[0])) {
			$fid = $cid[0];
		}

		$dbo = JFactory::getDBO();
		$row = array();
		// @wponly lite
		$app = JFactory::getApplication();
		if (!empty($cid[0])) {
			$q = "SELECT * FROM `#__vikrentcar_custfields` WHERE `id`=".$dbo->quote($fid)." AND `type`='checkbox';";
			$dbo->setQuery($q);
			$dbo->execute();
			if ($dbo->getNumRows() > 0) {
				$row = $dbo->loadAssoc();
			} else {
				$app->redirect('admin.php?option=com_vikrentcar');
				exit;
			}
		} else {
			$app->redirect('admin.php?option=com_vikrentcar');
			exit;
		}
		
		$this->row = &$row;
		
		// Display the template
		parent::display($tpl);
	}

	/**
	 * Sets the toolbar
	 */
	protected function addToolBar() {
		$cid = VikRequest::getVar('cid', array(0));
		
		if (!empty($cid[0])) {
			//edit
			JToolBarHelper::title(JText::_('VRMAINCUSTOMFTITLE'), 'vikrentcar');
			if (JFactory::getUser()->authorise('core.edit', 'com_vikrentcar')) {
				JToolBarHelper::save( 'updatecustomf', JText::_('VRSAVE'));
				JToolBarHelper::spacer();
			}
			JToolBarHelper::cancel( 'cancelcustomf', JText::_('VRANNULLA'));
			JToolBarHelper::spacer();
		} else {
			// @wponly lite
			$app = JFactory::getApplication();
			$app->redirect('admin.php?option=com_vikrentcar');
			exit;
		}
	}

}

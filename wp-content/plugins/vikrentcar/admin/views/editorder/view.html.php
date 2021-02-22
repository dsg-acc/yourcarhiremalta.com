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

class VikRentCarViewEditorder extends JViewVikRentCar {
	
	function display($tpl = null) {
		// Set the toolbar
		$this->addToolBar();

		$cid = VikRequest::getVar('cid', array(0));
		$ido = $cid[0];
		$dbo = JFactory::getDbo();
		$cpin = VikRentCar::getCPinIstance();
		$q = "SELECT * FROM `#__vikrentcar_orders` WHERE `id`=".$dbo->quote($ido).";";
		$dbo->setQuery($q);
		$dbo->execute();
		if ($dbo->getNumRows() != 1) {
			$mainframe = JFactory::getApplication();
			$mainframe->redirect("index.php?option=com_vikrentcar&task=orders");
			exit;
		}
		$row = $dbo->loadAssoc();
		// check if it's a closure (stop_sales)
		$row['closure'] = 0;
		if (!empty($row['idbusy'])) {
			$q = "SELECT `stop_sales` FROM `#__vikrentcar_busy` WHERE `id`=".(int)$row['idbusy'].";";
			$dbo->setQuery($q);
			$dbo->execute();
			if ($dbo->getNumRows() > 0) {
				$row['closure'] = (int)$dbo->loadResult();
			}
		}
		//
		$q = "SELECT `id`,`name` FROM `#__vikrentcar_gpayments` ORDER BY `#__vikrentcar_gpayments`.`name` ASC;";
		$dbo->setQuery($q);
		$dbo->execute();
		$payments = $dbo->getNumRows() > 0 ? $dbo->loadAssocList() : '';
		// VRC 1.13 - change customer assigned to this order
		$pnewcustid = VikRequest::getInt('newcustid', 0, 'request');
		if (!empty($pnewcustid)) {
			$cpin->updateCustomerBooking($row['id'], $pnewcustid);
		}
		//
		$customer = $cpin->getCustomerFromBooking($row['id']);
		if (count($customer) && !empty($customer['country'])) {
			if (is_file(VRC_ADMIN_PATH.DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'countries'.DIRECTORY_SEPARATOR.$customer['country'].'.png')) {
				$customer['country_img'] = '<img src="'.VRC_ADMIN_URI.'resources/countries/'.$customer['country'].'.png'.'" title="'.$customer['country'].'" class="vrc-country-flag vrc-country-flag-left"/>';
			}
		}
		$padminnotes = VikRequest::getString('adminnotes', '', 'request');
		$pupdadmnotes = VikRequest::getString('updadmnotes', '', 'request');
		$pnewpayment = VikRequest::getString('newpayment', '', 'request');
		$pnewlang = VikRequest::getString('newlang', '', 'request');
		$padmindisc = VikRequest::getString('admindisc', '', 'request');
		$pcustmail = VikRequest::getString('custmail', '', 'request');
		$pcustphone = VikRequest::getString('custphone', '', 'request');
		$pnominative = VikRequest::getString('nominative', '', 'request');
		$pcarindex = VikRequest::getInt('carindex', '', 'request');
		if (!empty($padminnotes) || !empty($pupdadmnotes)) {
			$q = "UPDATE `#__vikrentcar_orders` SET `adminnotes`=".$dbo->quote($padminnotes)." WHERE `id`=".$row['id'].";";
			$dbo->setQuery($q);
			$dbo->execute();
			$row['adminnotes'] = $padminnotes;
		}
		if (!empty($pnewpayment) && is_array($payments)) {
			foreach ($payments as $npay) {
				if ((int)$npay['id'] == (int)$pnewpayment) {
					$newpayvalid = $npay['id'].'='.$npay['name'];
					$q = "UPDATE `#__vikrentcar_orders` SET `idpayment`=".$dbo->quote($newpayvalid)." WHERE `id`=".$row['id'].";";
					$dbo->setQuery($q);
					$dbo->execute();
					$row['idpayment'] = $newpayvalid;
					break;
				}
			}
		}
		if (!empty($pnewlang)) {
			$q = "UPDATE `#__vikrentcar_orders` SET `lang`=".$dbo->quote($pnewlang)." WHERE `id`=".$row['id'].";";
			$dbo->setQuery($q);
			$dbo->execute();
			$row['lang'] = $pnewlang;
		}
		if (strlen($padmindisc) > 0) {
			if (floatval($padmindisc) > 0.00) {
				$admincoupon = '-1;'.floatval($padmindisc).';'.JText::_('VRCADMINDISCOUNT');
			} else {
				$admincoupon = '';
			}
			$q = "UPDATE `#__vikrentcar_orders` SET `coupon`=".$dbo->quote($admincoupon)." WHERE `id`=".$row['id'].";";
			$dbo->setQuery($q);
			$dbo->execute();
			$row['coupon'] = $admincoupon;
		}
		if (strlen($pcustmail) > 0) {
			$q = "UPDATE `#__vikrentcar_orders` SET `custmail`=".$dbo->quote($pcustmail)." WHERE `id`=".$row['id'].";";
			$dbo->setQuery($q);
			$dbo->execute();
			$row['custmail'] = $pcustmail;
		}
		if (strlen($pcustphone) > 0) {
			$q = "UPDATE `#__vikrentcar_orders` SET `phone`=".$dbo->quote($pcustphone)." WHERE `id`=".$row['id'].";";
			$dbo->setQuery($q);
			$dbo->execute();
			$row['phone'] = $pcustphone;
		}
		if (isset($_REQUEST['carindex'])) {
			$q = "UPDATE `#__vikrentcar_orders` SET `carindex`=".(!empty($pcarindex) ? $dbo->quote($pcarindex) : 'NULL')." WHERE `id`=".$row['id'].";";
			$dbo->setQuery($q);
			$dbo->execute();
			$row['carindex'] = $pcarindex;
		}
		if (strlen($pnominative) > 0) {
			$q = "UPDATE `#__vikrentcar_orders` SET `nominative`=".$dbo->quote($pnominative)." WHERE `id`=".$row['id'].";";
			$dbo->setQuery($q);
			$dbo->execute();
			$row['nominative'] = $pnominative;
		}
		
		$this->row = &$row;
		$this->customer = &$customer;
		$this->payments = &$payments;
		
		// Display the template
		parent::display($tpl);
	}

	/**
	 * Sets the toolbar
	 */
	protected function addToolBar() {
		JToolBarHelper::title(JText::_('VRMAINORDERTITLEEDIT'), 'vikrentcar');
		JToolBarHelper::cancel( 'canceledorder', JText::_('VRBACK'));
		JToolBarHelper::spacer();
	}

}

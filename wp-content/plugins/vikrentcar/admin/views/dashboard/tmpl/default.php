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

$pidplace = $this->pidplace;
$arrayfirst = $this->arrayfirst;
$allplaces = $this->allplaces;
$nextrentals = $this->nextrentals;
$pickup_today = $this->pickup_today;
$dropoff_today = $this->dropoff_today;
$cars_locked = $this->cars_locked;
$totnextrentconf = $this->totnextrentconf;
$totnextrentpend = $this->totnextrentpend;

$nowdf = VikRentCar::getDateFormat(true);
$nowtf = VikRentCar::getTimeFormat(true);
if ($nowdf == "%d/%m/%Y") {
	$df = 'd/m/Y';
} elseif ($nowdf == "%m/%d/%Y") {
	$df = 'm/d/Y';
} else {
	$df = 'Y/m/d';
}
$selplace = "";
if (is_array($allplaces)) {
	$selplace = "<form action=\"index.php?option=com_vikrentcar\" method=\"post\" name=\"vrcdashform\" style=\"display: inline; margin: 0;\"><label for=\"vrc-filt-idplace\">".JText::_('VRCDASHPICKUPLOC')."</label> <select id=\"vrc-filt-idplace\" name=\"idplace\" onchange=\"javascript: document.vrcdashform.submit();\" style=\"margin: 0;\">\n<option value=\"0\">".JText::_('VRCDASHALLPLACES')."</option>\n";
	foreach ($allplaces as $place) {
		$selplace .= "<option value=\"".$place['id']."\"".($place['id'] == $pidplace ? " selected=\"selected\"" : "").">".$place['name']."</option>\n";
	}
	$selplace .= "</select></form>\n";
}

/**
 * @wponly - check if some shortcodes have been defined before showing the Dashboard
 */
$model 		= JModel::getInstance('vikrentcar', 'shortcodes');
$shortcodes = $model->all('post_id');
//

?>
<div class="vrc-dashboard-fullcontainer">
	<div class="vrc-dashboard-today-bookings">
		<?php
		//Todays Pick Up
		?>
		<div class="vrc-dashboard-today-pickup-wrapper">
			<h4><i class="fas fa-sign-in-alt"></i> <?php echo JText::_('VRCDASHTODAYPICKUP'); ?></h4>
			<div class="vrc-dashboard-today-pickup table-responsive">
				<table class="table">
					<tr class="vrc-dashboard-today-pickup-firstrow">
						<td align="center"><?php echo JText::_('VRCDASHUPRESONE'); ?></td>
						<td align="center"><?php echo JText::_('VRCDASHUPRESTWO'); ?></td>
						<td align="center"><?php echo JText::_('VRPVIEWORDERSTWO'); ?></td>
						<td align="center"><?php echo JText::_('VRCDASHUPRESTHREE'); ?></td>
						<td align="center"><?php echo JText::_('VRCDASHUPRESFOUR'); ?></td>
						<td><?php echo JText::_('VRCDASHUPRESFIVE'); ?></td>
					</tr>
				<?php
				foreach ($pickup_today as $next) {
					$car = VikRentCar::getCarInfo($next['idcar']);
					$nominative = strlen($next['nominative']) > 1 ? $next['nominative'] : VikRentCar::getFirstCustDataField($next['custdata']);
					$country_flag = '';
					if (file_exists(VRC_ADMIN_PATH.DS.'resources'.DS.'countries'.DS.$next['country'].'.png')) {
						$country_flag = '<img src="'.VRC_ADMIN_URI.'resources/countries/'.$next['country'].'.png'.'" title="'.$next['country'].'" class="vrc-country-flag vrc-country-flag-left"/>';
					}
					$status_lbl = '';
					if ($next['status'] == 'confirmed') {
						$status_lbl = '<span style="font-weight: bold; color: green;">'.strtoupper(JText::_('VRCONFIRMED')).'</span>';
					} elseif ($next['status'] == 'standby') {
						$status_lbl = '<span style="font-weight: bold; color: #f89406;">'.strtoupper(JText::_('VRSTANDBY')).'</span>';
					} elseif ($next['status'] == 'cancelled') {
						$status_lbl = '<span style="font-weight: bold; color: red;">'.strtoupper(JText::_('VRCANCELLED')).'</span>';
					}
					?>
					<tr class="vrc-dashboard-today-pickup-rows">
						<td align="center"><a class="vrc-orderid" href="index.php?option=com_vikrentcar&amp;task=editorder&amp;cid[]=<?php echo $next['id']; ?>"><?php echo $next['id']; ?></a></td>
						<td align="center"><?php echo $car['name']; ?></td>
						<td align="center"><?php echo $country_flag.$nominative; ?></td>
						<td align="center"><?php echo (!empty($next['idplace']) && empty($pidplace) ? VikRentCar::getPlaceName($next['idplace'])." " : "").date($nowtf, $next['ritiro']); ?></td>
						<td align="center"><?php echo (!empty($next['idreturnplace']) ? VikRentCar::getPlaceName($next['idreturnplace'])." " : "").date($df.' '.$nowtf, $next['consegna']); ?></td>
						<td align="center"><?php echo $status_lbl; ?></td>
					</tr>
					<?php
				}
				?>
				</table>
			</div>
		</div>
		<?php
		//Todays Drop Off
		?>
		<div class="vrc-dashboard-today-dropoff-wrapper">
			<h4><i class="fas fa-sign-out-alt"></i> <?php echo JText::_('VRCDASHTODAYDROPOFF'); ?></h4>
			<div class="vrc-dashboard-today-dropoff table-responsive">
				<table class="table">
					<tr class="vrc-dashboard-today-dropoff-firstrow">
						<td align="center"><?php echo JText::_('VRCDASHUPRESONE'); ?></td>
						<td align="center"><?php echo JText::_('VRCDASHUPRESTWO'); ?></td>
						<td align="center"><?php echo JText::_('VRPVIEWORDERSTWO'); ?></td>
						<td align="center"><?php echo JText::_('VRCDASHUPRESTHREE'); ?></td>
						<td align="center"><?php echo JText::_('VRCDASHUPRESFOUR'); ?></td>
						<td><?php echo JText::_('VRCDASHUPRESFIVE'); ?></td>
					</tr>
				<?php
				foreach ($dropoff_today as $next) {
					$car = VikRentCar::getCarInfo($next['idcar']);
					$nominative = strlen($next['nominative']) > 1 ? $next['nominative'] : VikRentCar::getFirstCustDataField($next['custdata']);
					$country_flag = '';
					if (file_exists(VRC_ADMIN_PATH.DS.'resources'.DS.'countries'.DS.$next['country'].'.png')) {
						$country_flag = '<img src="'.VRC_ADMIN_URI.'resources/countries/'.$next['country'].'.png'.'" title="'.$next['country'].'" class="vrc-country-flag vrc-country-flag-left"/>';
					}
					$status_lbl = '';
					if ($next['status'] == 'confirmed') {
						$status_lbl = '<span style="font-weight: bold; color: green;">'.strtoupper(JText::_('VRCONFIRMED')).'</span>';
					} elseif ($next['status'] == 'standby') {
						$status_lbl = '<span style="font-weight: bold; color: #f89406;">'.strtoupper(JText::_('VRSTANDBY')).'</span>';
					} elseif ($next['status'] == 'cancelled') {
						$status_lbl = '<span style="font-weight: bold; color: red;">'.strtoupper(JText::_('VRCANCELLED')).'</span>';
					}
					?>
					<tr class="vrc-dashboard-today-pickup-rows">
						<td align="center"><a class="vrc-orderid" href="index.php?option=com_vikrentcar&amp;task=editorder&amp;cid[]=<?php echo $next['id']; ?>"><?php echo $next['id']; ?></a></td>
						<td align="center"><?php echo $car['name']; ?></td>
						<td align="center"><?php echo $country_flag.$nominative; ?></td>
						<td align="center"><?php echo (!empty($next['idplace']) && empty($pidplace) ? VikRentCar::getPlaceName($next['idplace'])." " : "").date($df.' '.$nowtf, $next['ritiro']); ?></td>
						<td align="center"><?php echo (!empty($next['idreturnplace']) ? VikRentCar::getPlaceName($next['idreturnplace'])." " : "").date($nowtf, $next['consegna']); ?></td>
						<td align="center"><?php echo $status_lbl; ?></td>
					</tr>
					<?php
				}
				?>
				</table>
			</div>
		</div>
	</div>

	<div class="vrc-dashboard-next-bookings-block">
		<h4><i class="fas fa-calendar-alt"></i> <?php echo JText::_('VRCDASHUPCRES'); ?></h4>
		<div class="vrc-dashboard-next-bookings table-responsive">
			<div class="vrc-dash-location-filter"><?php echo $selplace; ?></div>
	<?php
	if (is_array($nextrentals)) {
		?>
			<table class="table">
				<tr class="vrc-dashboard-today-dropoff-firstrow">
					<td align="center"><?php echo JText::_('VRCDASHUPRESONE'); ?></td>
					<td align="center"><?php echo JText::_('VRCDASHUPRESTWO'); ?></td>
					<td align="center"><?php echo JText::_('VRPVIEWORDERSTWO'); ?></td>
					<td align="center"><?php echo JText::_('VRCDASHUPRESTHREE'); ?></td>
					<td align="center"><?php echo JText::_('VRCDASHUPRESFOUR'); ?></td>
					<td align="center"><?php echo JText::_('VRCDASHUPRESFIVE'); ?></td>
				</tr>
		<?php
		foreach ($nextrentals as $next) {
			$car = VikRentCar::getCarInfo($next['idcar']);
			$nominative = strlen($next['nominative']) > 1 ? $next['nominative'] : VikRentCar::getFirstCustDataField($next['custdata']);
			$country_flag = '';
			if (file_exists(VRC_ADMIN_PATH.DS.'resources'.DS.'countries'.DS.$next['country'].'.png')) {
				$country_flag = '<img src="'.VRC_ADMIN_URI.'resources/countries/'.$next['country'].'.png'.'" title="'.$next['country'].'" class="vrc-country-flag vrc-country-flag-left"/>';
			}
			$status_lbl = '';
			if ($next['status'] == 'confirmed') {
				$status_lbl = '<span style="font-weight: bold; color: green;">'.strtoupper(JText::_('VRCONFIRMED')).'</span>';
			} elseif ($next['status'] == 'standby') {
				$status_lbl = '<span style="font-weight: bold; color: #f89406;">'.strtoupper(JText::_('VRSTANDBY')).'</span>';
			} elseif ($next['status'] == 'cancelled') {
				$status_lbl = '<span style="font-weight: bold; color: red;">'.strtoupper(JText::_('VRCANCELLED')).'</span>';
			}
			?>
				<tr class="vrc-dashboard-today-dropoff-rows">
					<td align="center"><a class="vrc-orderid" href="index.php?option=com_vikrentcar&amp;task=editorder&amp;cid[]=<?php echo $next['id']; ?>"><?php echo $next['id']; ?></a></td>
					<td align="center"><?php echo $car['name']; ?></td>
					<td align="center"><?php echo $country_flag.$nominative; ?></td>
					<td align="center"><?php echo (!empty($next['idplace']) && empty($pidplace) ? VikRentCar::getPlaceName($next['idplace'])." " : "").date($df.' '.$nowtf, $next['ritiro']); ?></td>
					<td align="center"><?php echo (!empty($next['idreturnplace']) ? VikRentCar::getPlaceName($next['idreturnplace'])." " : "").date($df.' '.$nowtf, $next['consegna']); ?></td>
					<td align="center"><?php echo $status_lbl; ?></td>
				</tr>
			<?php
		}
		?>
			</table>
		<?php
	}
	?>
		</div>
	</div>

	<?php
	//Cars Locked
	if (count($cars_locked)) {
		?>
	<div class="vrc-dashboard-cars-locked-block">
		<div class="vrc-dashboard-cars-locked table-responsive">
			<h4 id="vrc-dashboard-cars-locked-toggle"><i class="fas fa-lock"></i> <?php echo JText::_('VRCDASHCARSLOCKED'); ?><span>(<?php echo count($cars_locked); ?>)</span></h4>
			<table class="table" style="display: none;">
				<tr class="vrc-dashboard-cars-locked-firstrow">
					<td align="center"><?php echo JText::_('VRCDASHUPRESTWO'); ?></td>
					<td align="center"><?php echo JText::_('VRPVIEWORDERSTWO'); ?></td>
					<td align="center"><?php echo JText::_('VRCDASHLOCKUNTIL'); ?></td>
					<td align="center"><?php echo JText::_('VRCDASHUPRESONE'); ?></td>
					<td align="center">&nbsp;</td>
				</tr>
			<?php
			foreach ($cars_locked as $lock) {
				$country_flag = '';
				if (file_exists(VRC_ADMIN_PATH.DS.'resources'.DS.'countries'.DS.$lock['country'].'.png')) {
					$country_flag = '<img src="'.VRC_ADMIN_URI.'resources/countries/'.$lock['country'].'.png'.'" title="'.$lock['country'].'" class="vrc-country-flag vrc-country-flag-left"/>';
				}
				?>
				<tr class="vrc-dashboard-cars-locked-rows">
					<td align="center"><?php echo $lock['car_name']; ?></td>
					<td align="center"><?php echo $country_flag.$lock['nominative']; ?></td>
					<td align="center"><?php echo date($df.' '.$nowtf, $lock['until']); ?></td>
					<td align="center"><a class="vrc-orderid" href="index.php?option=com_vikrentcar&amp;task=editorder&amp;cid[]=<?php echo $lock['idorder']; ?>" target="_blank"><?php echo $lock['idorder']; ?></a></td>
					<td align="center"><button type="button" class="btn btn-danger" onclick="if (confirm('<?php echo addslashes(JText::_('VRCDELCONFIRM')); ?>')) location.href='index.php?option=com_vikrentcar&amp;task=unlockrecords&amp;cid[]=<?php echo $lock['id']; ?>';"><?php echo JText::_('VRCDASHUNLOCK'); ?></button></td>
				</tr>
				<?php
			}
			?>
			</table>
		</div>
	</div>
	<script type="text/JavaScript">
	jQuery(document).ready(function() {
		jQuery("#vrc-dashboard-cars-locked-toggle").click(function(){
			jQuery(this).next("table").fadeToggle();
		});
	});
	</script>
		<?php
	}
	?>

	<div class="vrcdashdivright">
		<h4><?php VikRentCarIcons::e('tasks'); ?> <?php echo JText::_('VRCDASHSTATS'); ?></h4>
		<div class="vrc-dash-reports">
		<?php
		if ($arrayfirst['totprices'] < 1) {
			?>
			<p class="vrcdashparagred">
				<span><?php echo JText::_('VRCDASHNOPRICES'); ?></span>
				<span class="vrc-dash-report-val">0</span>
				<a href="index.php?option=com_vikrentcar&task=prices" class="button button-secondary"><?php echo JText::_('VRCCONFIGURETASK'); ?></a>
			</p>
			<?php
		}
		if ($arrayfirst['totlocations'] < 1 && $arrayfirst['totcars'] < 1) {
			?>
			<p class="vrcdashparagred">
				<span><?php echo JText::_('VRCDASHNOLOCATIONS'); ?></span>
				<span class="vrc-dash-report-val">0</span>
				<a href="index.php?option=com_vikrentcar&task=places" class="button button-secondary"><?php echo JText::_('VRCCONFIGURETASK'); ?></a>
			</p>
			<?php
		} else {
			?>
			<p class="vrcdashparag">
				<span><?php echo JText::_('VRCDASHNOLOCATIONS'); ?></span>
				<span class="vrc-dash-report-val"><?php echo $arrayfirst['totlocations']; ?></span>
			</p>
			<?php
		}
		if ($arrayfirst['totcategories'] < 1) {
			?>
			<p class="vrcdashparagred">
				<span><?php echo JText::_('VRCDASHNOCATEGORIES'); ?></span>
				<span class="vrc-dash-report-val">0</span>
				<a href="index.php?option=com_vikrentcar&task=categories" class="button button-secondary"><?php echo JText::_('VRCCONFIGURETASK'); ?></a>
			</p>
			<?php
		} else {
			?>
			<p class="vrcdashparag">
				<span><?php echo JText::_('VRCDASHNOCATEGORIES'); ?></span>
				<span class="vrc-dash-report-val"><?php echo $arrayfirst['totcategories']; ?></span>
			</p>
			<?php
		}
		if ($arrayfirst['totcars'] < 1) {
			?>
			<p class="vrcdashparagred">
				<span><?php echo JText::_('VRCDASHNOCARS'); ?></span>
				<span class="vrc-dash-report-val">0</span>
				<a href="index.php?option=com_vikrentcar&task=cars" class="button button-secondary"><?php echo JText::_('VRCCONFIGURETASK'); ?></a>
			</p>
			<?php
		} else {
			?>
			<p class="vrcdashparag">
				<span><?php echo JText::_('VRCDASHNOCARS'); ?></span>
				<span class="vrc-dash-report-val"><?php echo $arrayfirst['totcars']; ?></span>
			</p>
			<?php
		}
		if ($arrayfirst['totdailyfares'] < 1) {
			?>
			<p class="vrcdashparagred">
				<span><?php echo JText::_('VRCDASHNODAILYFARES'); ?></span>
				<span class="vrc-dash-report-val">0</span>
				<a href="index.php?option=com_vikrentcar&task=tariffs" class="button button-secondary"><?php echo JText::_('VRCCONFIGURETASK'); ?></a>
			</p>
			<?php
		}
		if (count($shortcodes) < 1) {
			/**
			 * @wponly  we use this IF statement by enclosing the rest in an ELSE statement
			 */
			?>
			<p class="vrcdashparagred">
				<span><?php echo JText::_('VRCFIRSTSETSHORTCODES'); ?></span>
				<span class="vrc-dash-report-val">0</span>
				<a href="index.php?option=com_vikrentcar&view=shortcodes" class="button button-secondary"><?php echo JText::_('VRCCONFIGURETASK'); ?></a>
			</p>
			<?php
		} else {
		?>
			<p class="vrcdashparag">
				<span><?php echo JText::_('VRCDASHTOTRESCONF'); ?></span>
				<span class="vrc-dash-report-val"><?php echo $totnextrentconf; ?></span>
			</p>
			<p class="vrcdashparag">
				<span><?php echo JText::_('VRCDASHTOTRESPEND'); ?></span>
				<span class="vrc-dash-report-val"><?php echo $totnextrentpend; ?></span>
			</p>
		<?php
		}
		?>
		</div>
	</div>

</div>

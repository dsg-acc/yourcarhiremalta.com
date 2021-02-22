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

JHtml::_('jquery.framework', true, true);
JHtml::_('script', VRC_SITE_URI.'resources/jquery-ui.sortable.min.js', false, true, false, false);

$vrc_app  = VikRentCar::getVrcApplication();
$timeopst = VikRentCar::getTimeOpenStore(true);
$openat   = array(0, 0);
$closeat  = array(0, 0);
$alwopen  = true;
if (is_array($timeopst) && $timeopst[0] != $timeopst[1]) {
	$openat  = VikRentCar::getHoursMinutes($timeopst[0]);
	$closeat = VikRentCar::getHoursMinutes($timeopst[1]);
	$alwopen = false;
}
$calendartype = VikRentCar::calendarType(true);
$aehourschbasp = VikRentCar::applyExtraHoursChargesBasp();
$damageshowtype = VikRentCar::getDamageShowType();
$nowdf = VikRentCar::getDateFormat(true);
$nowtf = VikRentCar::getTimeFormat(true);

$maxdatefuture = VikRentCar::getMaxDateFuture(true);
$maxdate_val = intval(substr($maxdatefuture, 1, (strlen($maxdatefuture) - 1)));
$maxdate_interval = substr($maxdatefuture, -1, 1);

$vrcsef = file_exists(VRC_SITE_PATH.DS.'router.php');
?>

<div class="vrc-config-maintab-left">
	<fieldset class="adminform">
		<div class="vrc-params-wrap">
			<legend class="adminlegend"><?php echo JText::_('VRCCONFIGBOOKINGPART'); ?></legend>
			<div class="vrc-params-container">
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGONEFIVE'); ?></div>
					<div class="vrc-param-setting"><?php echo $vrc_app->printYesNoButtons('allowrent', JText::_('VRYES'), JText::_('VRNO'), (int)VikRentCar::allowRent(), 1, 0); ?></div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGONESIX'); ?></div>
					<div class="vrc-param-setting"><textarea name="disabledrentmsg" rows="5" cols="50"><?php echo VikRentCar::getDisabledRentMsg(); ?></textarea></div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGONETENSIX'); ?></div>
					<div class="vrc-param-setting"><input type="text" name="adminemail" value="<?php echo VikRentCar::getAdminMail(); ?>" size="30"/></div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGSENDERMAIL'); ?></div>
					<div class="vrc-param-setting"><input type="text" name="senderemail" value="<?php echo VikRentCar::getSenderMail(); ?>" size="30"/></div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGONESEVEN'); ?></div>
					<div class="vrc-param-setting">&nbsp;</div>
				</div>
				<div class="vrc-param-container vrc-param-nested">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGONEONE'); ?></div>
					<div class="vrc-param-setting"><?php echo $vrc_app->printYesNoButtons('timeopenstorealw', JText::_('VRYES'), JText::_('VRNO'), ($alwopen ? 'yes' : 0), 'yes', 0); ?></div>
				</div>
				<div class="vrc-param-container vrc-param-nested">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGONETWO'); ?></div>
					<div class="vrc-param-setting">
						<div style="display: block; margin-bottom: 3px;">
							<span class="vrcrestrdrangesp"><?php echo JText::_('VRCONFIGONETHREE'); ?></span>
							<select name="timeopenstorefh">
							<?php
							for ($i = 0; $i <= 23; $i++) {
								$in = $i < 10 ? ("0" . $i) : $i;
								?>
								<option value="<?php echo $i; ?>"<?php echo $openat[0] == $i ? ' selected="selected"' : ''; ?>><?php echo $in; ?></option>
								<?php
							}
							?>
							</select>
							&nbsp;
							<select name="timeopenstorefm">
							<?php
							for ($i = 0; $i <= 59; $i++) {
								$in = $i < 10 ? ("0" . $i) : $i;
								?>
								<option value="<?php echo $i; ?>"<?php echo $openat[1] == $i ? ' selected="selected"' : ''; ?>><?php echo $in; ?></option>
								<?php
							}
							?>
							</select>
						</div>
						<div style="display: block; margin-bottom: 3px;">
							<span class="vrcrestrdrangesp"><?php echo JText::_('VRCONFIGONEFOUR'); ?></span>
							<select name="timeopenstoreth">
							<?php
							for ($i = 0; $i <= 23; $i++) {
								$in = $i < 10 ? ("0" . $i) : $i;
								?>
								<option value="<?php echo $i; ?>"<?php echo $closeat[0] == $i ? ' selected="selected"' : ''; ?>><?php echo $in; ?></option>
								<?php
							}
							?>
							</select>
							&nbsp;
							<select name="timeopenstoretm">
							<?php
							for ($i = 0; $i <= 59; $i++) {
								$in = $i < 10 ? ("0" . $i) : $i;
								?>
								<option value="<?php echo $i; ?>"<?php echo $closeat[1] == $i ? ' selected="selected"' : ''; ?>><?php echo $in; ?></option>
								<?php
							}
							?>
							</select>
						</div>
					</div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGONEELEVEN'); ?></div>
					<div class="vrc-param-setting">
						<select name="dateformat">
							<option value="%d/%m/%Y"<?php echo ($nowdf == "%d/%m/%Y" ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRCONFIGONETWELVE'); ?></option>
							<option value="%Y/%m/%d"<?php echo ($nowdf=="%Y/%m/%d" ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRCONFIGONETENTHREE'); ?></option>
							<option value="%m/%d/%Y"<?php echo ($nowdf == "%m/%d/%Y" ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRCONFIGUSDATEFORMAT'); ?></option>
						</select>
					</div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGTIMEFORMAT'); ?></div>
					<div class="vrc-param-setting">
						<select name="timeformat">
							<option value="H:i"<?php echo ($nowtf=="H:i" ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRCONFIGTIMEFORMATLAT'); ?></option>
							<option value="h:i A"<?php echo ($nowtf=="h:i A" ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRCONFIGTIMEFORMATENG'); ?></option>
						</select>
					</div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGONEEIGHT'); ?></div>
					<div class="vrc-param-setting"><input type="number" name="hoursmorerentback" value="<?php echo VikRentCar::getHoursMoreRb(); ?>" min="0"/></div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGEHOURSBASP'); ?></div>
					<div class="vrc-param-setting">
						<select name="ehourschbasp">
							<option value="1"<?php echo ($aehourschbasp == true ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRCONFIGEHOURSBEFORESP'); ?></option>
							<option value="0"<?php echo ($aehourschbasp == false ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRCONFIGEHOURSAFTERSP'); ?></option>
						</select>
					</div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCCONFIGDAMAGESHOWTYPE'); ?></div>
					<div class="vrc-param-setting">
						<select name="damageshowtype">
							<option value="1"<?php echo ($damageshowtype == 1 ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRCCONFIGDAMAGETYPEONE'); ?></option>
							<option value="2"<?php echo ($damageshowtype == 2 ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRCCONFIGDAMAGETYPETWO'); ?></option>
							<option value="3"<?php echo ($damageshowtype == 3 ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRCCONFIGDAMAGETYPETHREE'); ?></option>
						</select>
					</div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGONENINE'); ?></div>
					<div class="vrc-param-setting"><input type="number" name="hoursmorecaravail" value="<?php echo VikRentCar::getHoursCarAvail(); ?>" min="0"/> <?php echo JText::_('VRCONFIGONETENEIGHT'); ?></div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCPICKONDROP'); ?> <?php echo $vrc_app->createPopover(array('title' => JText::_('VRCPICKONDROP'), 'content' => JText::_('VRCPICKONDROPHELP'))); ?></div>
					<div class="vrc-param-setting"><?php echo $vrc_app->printYesNoButtons('pickondrop', JText::_('VRYES'), JText::_('VRNO'), (int)VikRentCar::allowPickOnDrop(true), 1, 0); ?></div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCTODAYBOOKINGS'); ?></div>
					<div class="vrc-param-setting"><?php echo $vrc_app->printYesNoButtons('todaybookings', JText::_('VRYES'), JText::_('VRNO'), (int)VikRentCar::todayBookings(), 1, 0); ?></div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGONECOUPONS'); ?></div>
					<div class="vrc-param-setting"><?php echo $vrc_app->printYesNoButtons('enablecoupons', JText::_('VRYES'), JText::_('VRNO'), (int)VikRentCar::couponsEnabled(), 1, 0); ?></div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGENABLECUSTOMERPIN'); ?></div>
					<div class="vrc-param-setting"><?php echo $vrc_app->printYesNoButtons('enablepin', JText::_('VRYES'), JText::_('VRNO'), (int)VikRentCar::customersPinEnabled(), 1, 0); ?></div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGONETENFIVE'); ?></div>
					<div class="vrc-param-setting"><?php echo $vrc_app->printYesNoButtons('tokenform', JText::_('VRYES'), JText::_('VRNO'), (VikRentCar::tokenForm() ? 'yes' : 0), 'yes', 0); ?></div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGREQUIRELOGIN'); ?></div>
					<div class="vrc-param-setting"><?php echo $vrc_app->printYesNoButtons('requirelogin', JText::_('VRYES'), JText::_('VRNO'), (int)VikRentCar::requireLogin(), 1, 0); ?></div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCICALKEY'); ?></div>
					<div class="vrc-param-setting"><input type="text" name="icalkey" value="<?php echo VikRentCar::getIcalSecretKey(); ?>" size="10"/></div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGONETENSEVEN'); ?></div>
					<div class="vrc-param-setting"><input type="number" name="minuteslock" value="<?php echo VikRentCar::getMinutesLock(); ?>" min="0"/></div>
				</div>
			</div>
		</div>
	</fieldset>
</div>

<div class="vrc-config-maintab-right">

	<fieldset class="adminform">
		<div class="vrc-params-wrap">
			<legend class="adminlegend"><?php echo JText::_('VRCCONFIGSEARCHPART'); ?></legend>
			<div class="vrc-params-container">
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGONEDROPDPLUS'); ?></div>
					<div class="vrc-param-setting"><input type="number" name="setdropdplus" value="<?php echo VikRentCar::setDropDatePlus(true); ?>" min="0"/></div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGMINDAYSADVANCE'); ?></div>
					<div class="vrc-param-setting"><input type="number" name="mindaysadvance" value="<?php echo VikRentCar::getMinDaysAdvance(true); ?>" min="0"/></div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGMAXDATEFUTURE'); ?></div>
					<div class="vrc-param-setting">
						<input type="number" name="maxdate" value="<?php echo $maxdate_val; ?>" min="0" style="float: none; vertical-align: top; max-width: 50px;"/> 
						<select name="maxdateinterval" style="float: none; margin-bottom: 0;">
							<option value="d"<?php echo $maxdate_interval == 'd' ? ' selected="selected"' : ''; ?>><?php echo JText::_('VRCONFIGMAXDATEDAYS'); ?></option>
							<option value="w"<?php echo $maxdate_interval == 'w' ? ' selected="selected"' : ''; ?>><?php echo JText::_('VRCONFIGMAXDATEWEEKS'); ?></option>
							<option value="m"<?php echo $maxdate_interval == 'm' ? ' selected="selected"' : ''; ?>><?php echo JText::_('VRCONFIGMAXDATEMONTHS'); ?></option>
							<option value="y"<?php echo $maxdate_interval == 'y' ? ' selected="selected"' : ''; ?>><?php echo JText::_('VRCONFIGMAXDATEYEARS'); ?></option>
						</select>
					</div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGONETEN'); ?></div>
					<div class="vrc-param-setting"><?php echo $vrc_app->printYesNoButtons('placesfront', JText::_('VRYES'), JText::_('VRNO'), (VikRentCar::showPlacesFront(true) ? 'yes' : 0), 'yes', 0); ?></div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGONETENFOUR'); ?></div>
					<div class="vrc-param-setting"><?php echo $vrc_app->printYesNoButtons('showcategories', JText::_('VRYES'), JText::_('VRNO'), (VikRentCar::showCategoriesFront(true) ? 'yes' : 0), 'yes', 0); ?></div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCCONFIGSEARCHFILTCHARACTS'); ?></div>
					<div class="vrc-param-setting"><?php echo $vrc_app->printYesNoButtons('charatsfilter', JText::_('VRYES'), JText::_('VRNO'), (VikRentCar::useCharatsFilter(true) ? 'yes' : 0), 'yes', 0); ?></div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCPREFCOUNTRIESORD'); ?> <?php echo $vrc_app->createPopover(array('title' => JText::_('VRCPREFCOUNTRIESORD'), 'content' => JText::_('VRCPREFCOUNTRIESORDHELP'))); ?></div>
					<div class="vrc-param-setting">
						<ul class="vrc-preferred-countries-sortlist">
						<?php
						$preferred_countries = VikRentCar::preferredCountriesOrdering(true);
						foreach ($preferred_countries as $ccode => $langname) {
							?>
							<li class="vrc-preferred-countries-elem">
								<span><?php VikRentCarIcons::e('ellipsis-v'); ?> <?php echo $langname; ?></span>
								<input type="hidden" name="pref_countries[]" value="<?php echo $ccode; ?>" />
							</li>
							<?php
						}
						?>
						</ul>
						<script type="text/javascript">
						jQuery(document).ready(function() {
							jQuery('.vrc-preferred-countries-sortlist').sortable();
							jQuery('.vrc-preferred-countries-sortlist').disableSelection();
						});
						</script>
					</div>
				</div>
			</div>
		</div>
	</fieldset>
	<fieldset class="adminform">
		<div class="vrc-params-wrap">
			<legend class="adminlegend"><?php echo JText::_('VRCCONFIGSYSTEMPART'); ?></legend>
			<div class="vrc-params-container">
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCCONFIGCRONKEY'); ?></div>
					<div class="vrc-param-setting"><input type="text" name="cronkey" value="<?php echo VikRentCar::getCronKey(); ?>" size="6" /></div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCCONFENMULTILANG'); ?></div>
					<div class="vrc-param-setting"><?php echo $vrc_app->printYesNoButtons('multilang', JText::_('VRYES'), JText::_('VRNO'), (int)VikRentCar::allowMultiLanguage(), 1, 0); ?></div>
				</div>
				<!-- @wponly  we cannot display the setting for the SEF Router -->
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCLOADFA'); ?></div>
					<div class="vrc-param-setting"><?php echo $vrc_app->printYesNoButtons('usefa', JText::_('VRYES'), JText::_('VRNO'), (int)VikRentCar::isFontAwesomeEnabled(true), 1, 0); ?></div>
				</div>
				<!-- @wponly  jQuery main library should not be loaded as it's already included by WP -->
				<div class="vrc-param-container">
					<div class="vrc-param-label"><?php echo JText::_('VRCONFIGONECALENDAR'); ?></div>
					<div class="vrc-param-setting">
						<select name="calendar">
							<option value="jqueryui"<?php echo ($calendartype == "jqueryui" ? " selected=\"selected\"" : ""); ?>>jQuery UI</option>
						</select>
					</div>
				</div>
				<div class="vrc-param-container">
					<div class="vrc-param-label">Google Maps API Key</div>
					<div class="vrc-param-setting"><input type="text" name="gmapskey" value="<?php echo VikRentCar::getGoogleMapsKey(); ?>" size="30" /></div>
				</div>
			</div>
		</div>
	</fieldset>

</div>

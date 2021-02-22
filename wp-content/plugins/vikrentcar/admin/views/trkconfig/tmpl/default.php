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

$trksettings = $this->trksettings;

$trksettings['trkcampaigns'] = empty($trksettings['trkcampaigns']) ? array() : json_decode($trksettings['trkcampaigns'], true);
$trksettings['trkcampaigns'] = !is_array($trksettings['trkcampaigns']) ? array() : $trksettings['trkcampaigns'];

$vrc_app 	= new VrcApplication();
$vrcbaseuri = JUri::root();

?>
<script type="text/javascript">
var randspool  = new Array;
var vrcbaseuri = '<?php echo $vrcbaseuri; ?>';
jQuery(document).ready(function() {
	jQuery('#vrc-add-trkcampaign').click(function() {
		var randkey = Math.floor(Math.random() * (9999 - 1000)) + 1000;
		if (randspool.indexOf(randkey) > -1) {
			while (randspool.indexOf(randkey) > -1) {
				randkey = Math.floor(Math.random() * (9999 - 1000)) + 1000;
			}
		}
		randspool.push(randkey);
		// for Nginx compatibility, we concatenate to the numeric key a random 3 char string
		randkey += vrcGetRandString(3);
		//
		var ind = jQuery('.vrc-trackings-custcampaign').length + 1;
		var campcont = '<div class="vrc-trackings-custcampaign">'+
							'<div class="vrc-trackings-custcampaign-box vrc-trackings-custcampaign-name">'+
								'<label for="vrc-name-'+ind+'"><?php echo addslashes(JText::_('VRCTRKCAMPAIGNNAME')); ?></label>'+
								'<input type="text" name="trkcampname[]" id="vrc-name-'+ind+'" value="" size="20" placeholder="<?php echo addslashes(JText::_('VRCTRKCAMPAIGNNAME')); ?>" />'+
							'</div>'+
							'<div class="vrc-trackings-custcampaign-box vrc-trackings-custcampaign-key">'+
								'<label for="vrc-key-'+ind+'"><?php echo addslashes(JText::_('VRCTRKCAMPAIGNKEY')); ?></label>'+
								'<input type="text" name="trkcampkey[]" id="vrc-key-'+ind+'" onkeyup="vrcCustCampaignUri(this);" value="'+randkey+'" size="10" />'+
							'</div>'+
							'<div class="vrc-trackings-custcampaign-box vrc-trackings-custcampaign-val">'+
								'<label for="vrc-val-'+ind+'"><?php echo addslashes(JText::_('VRCTRKCAMPAIGNVAL')); ?></label>'+
								'<input type="text" name="trkcampval[]" id="vrc-val-'+ind+'" onkeyup="vrcCustCampaignUri(this);" value="" size="10" />'+
							'</div>'+
							'<div class="vrc-trackings-custcampaign-box vrc-trackings-custcampaign-rm">'+
								'<a class="btn btn-danger" href="javascript: void(0);" onclick="vrcRmCustCampaign(this);">&times;</a>'+
							'</div>'+
							'<div class="vrc-trackings-custcampaign-box vrc-trackings-custcampaign-uri"></div>'+
						'</div>';
		jQuery('.vrc-trackings-custcampaigns').append(campcont);
		setTimeout(function() {
			vrcCustCampaignUri(document.getElementById('vrc-key-'+ind));
		}, 300);
	});
});
function vrcGetRandString(len) {
	var randstr = "";
	var charsav = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	for (var i = 0; i < len; i++) {
		randstr += charsav.charAt(Math.floor(Math.random() * charsav.length));
	}
	return randstr;
}
function vrcRmCustCampaign(elem) {
	jQuery(elem).closest('.vrc-trackings-custcampaign').remove();
}
function vrcCustCampaignUri(elem) {
	var cont = jQuery(elem);
	var sval = cont.val();
	if (/\s/g.test(sval)) {
		sval = sval.replace(/\s/g, '');
		cont.val(sval);
	}
	var rkey = '';
	var rval = '';
	if (cont.parent('.vrc-trackings-custcampaign-box').hasClass('vrc-trackings-custcampaign-key')) {
		rkey = sval;
		rval = cont.closest('.vrc-trackings-custcampaign').find('.vrc-trackings-custcampaign-val').find('input').val();
	} else {
		rval = sval;
		rkey = cont.closest('.vrc-trackings-custcampaign').find('.vrc-trackings-custcampaign-key').find('input').val();
	}
	cont.closest('.vrc-trackings-custcampaign').find('.vrc-trackings-custcampaign-uri').text(vrcbaseuri+'?'+rkey+(rval.length ? '='+rval : ''));
}
</script>

<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">

	<fieldset class="adminform">
		<legend class="adminlegend"><?php echo JText::_('VRCTRKSETTINGS'); ?></legend>
		<table cellspacing="1" class="admintable table">
			<tbody>
				<tr>
					<td width="200" class="vrc-config-param-cell"> <b><?php echo JText::_('VRCTRKENABLED'); ?></b> </td>
					<td><?php echo $vrc_app->printYesNoButtons('trkenabled', JText::_('VRYES'), JText::_('VRNO'), (int)$trksettings['trkenabled'], 1, 0); ?></td>
				</tr>
				<tr>
					<td width="200" class="vrc-config-param-cell">
						<?php echo $vrc_app->createPopover(array('title' => JText::_('VRCTRKCOOKIERFRDUR'), 'content' => JText::_('VRCTRKCOOKIERFRDURHELP'))); ?>
						<b><?php echo JText::_('VRCTRKCOOKIERFRDUR'); ?></b>
					</td>
					<td><input type="number" step="any" min="0" name="trkcookierfrdur" value="<?php echo $trksettings['trkcookierfrdur']; ?>" /> (<?php echo strtolower(JText::_('VRDAYS')); ?>)</td>
				</tr>
				<tr>
					<td width="200" class="vrc-config-param-cell" style="vertical-align: top !important;">
						<?php echo $vrc_app->createPopover(array('title' => JText::_('VRCTRKCAMPAIGNS'), 'content' => JText::_('VRCTRKCAMPAIGNSHELP'))); ?>
						<b><?php echo JText::_('VRCTRKCAMPAIGNS'); ?></b>
						<br />
						<button class="btn" type="button" id="vrc-add-trkcampaign"><i class="icon-new" style="float: none;"></i> <?php echo JText::_('VRCTRKADDCAMPAIGN'); ?></button>
					</td>
					<td>
						<div class="vrc-trackings-custcampaigns">
						<?php
						$i = 0;
						foreach ($trksettings['trkcampaigns'] as $rkey => $rvalue) {
							?>
							<div class="vrc-trackings-custcampaign">
								<div class="vrc-trackings-custcampaign-box vrc-trackings-custcampaign-name">
									<label for="vrc-name-<?php echo $i; ?>"><?php echo JText::_('VRCTRKCAMPAIGNNAME'); ?></label>
									<input type="text" name="trkcampname[]" id="vrc-name-<?php echo $i; ?>" value="<?php echo $rvalue['name']; ?>" size="20" />
								</div>
								<div class="vrc-trackings-custcampaign-box vrc-trackings-custcampaign-key">
									<label for="vrc-key-<?php echo $i; ?>"><?php echo JText::_('VRCTRKCAMPAIGNKEY'); ?></label>
									<input type="text" name="trkcampkey[]" id="vrc-key-<?php echo $i; ?>" onkeyup="vrcCustCampaignUri(this);" value="<?php echo $rkey; ?>" size="10" />
								</div>
								<div class="vrc-trackings-custcampaign-box vrc-trackings-custcampaign-val">
									<label for="vrc-val-<?php echo $i; ?>"><?php echo JText::_('VRCTRKCAMPAIGNVAL'); ?></label>
									<input type="text" name="trkcampval[]" id="vrc-val-<?php echo $i; ?>" onkeyup="vrcCustCampaignUri(this);" value="<?php echo $rvalue['value']; ?>" size="10" />
								</div>
								<div class="vrc-trackings-custcampaign-box vrc-trackings-custcampaign-rm">
									<a class="btn btn-danger" href="javascript: void(0);" onclick="vrcRmCustCampaign(this);">&times;</a>
								</div>
								<div class="vrc-trackings-custcampaign-box vrc-trackings-custcampaign-uri"><?php echo $vrcbaseuri.'?'.$rkey.(!empty($rvalue['value']) ? '='.$rvalue['value'] : ''); ?></div>
							</div>
							<?php
							$i++;
						}
						?>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<p class="vrc-trackings-cookiediscl"><?php VikRentCarIcons::e('info-circle'); ?> <?php echo JText::_('VRCTRKCOOKIEEXPL'); ?></p>
	</fieldset>

	<input type="hidden" name="option" value="com_vikrentcar" />
	<input type="hidden" name="task" value="" />
</form>

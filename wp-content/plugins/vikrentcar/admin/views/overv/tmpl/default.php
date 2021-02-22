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

$rows = $this->rows;
$lim0 = $this->lim0;
$navbut = $this->navbut;
$arrbusy = $this->arrbusy;
$wmonthsel = $this->wmonthsel;
$tsstart = $this->tsstart;
$all_locations = $this->all_locations;
$plocation = $this->plocation;
$plocationw = $this->plocationw;

$nowtf = VikRentCar::getTimeFormat(true);
$wdays_map = array(
	JText::_('VRSUN'),
	JText::_('VRMON'),
	JText::_('VRTUE'),
	JText::_('VRWED'),
	JText::_('VRTHU'),
	JText::_('VRFRI'),
	JText::_('VRSAT')
);
$currencysymb = VikRentCar::getCurrencySymb(true);

$session = JFactory::getSession();
$show_type = $session->get('vrcUnitsShowType', '');
$mnum = $session->get('vrcOvwMnum', '1');
$mnum = intval($mnum);

$cookie = JFactory::getApplication()->input->cookie;
$cookie_uleft = $cookie->get('vrcAovwUleft', '', 'string');

// Cars Units Distinctive Features
$cars_features_map = array();
$cars_features_bookings = array();
$cars_bids_pools = array();
$index_loop = 0;
foreach ($rows as $kr => $car) {
	if ($car['units'] > 1 && !empty($car['params']) && $car['units'] <= 250) {
		// sub-car units only if car type has 250 units at most
		$car_params = json_decode($car['params'], true);
		if (is_array($car_params) && array_key_exists('features', $car_params) && @count($car_params['features']) > 0) {
			$cars_features_map[$car['id']] = array();
			foreach ($car_params['features'] as $rind => $rfeatures) {
				foreach ($rfeatures as $fname => $fval) {
					if (strlen($fval)) {
						$cars_features_map[$car['id']][$rind] = '#'.$rind.' - '.JText::_($fname).': '.$fval;
						break;
					}
				}
			}
			if (!(count($cars_features_map[$car['id']]) > 0)) {
				unset($cars_features_map[$car['id']]);
			} else {
				foreach ($cars_features_map[$car['id']] as $rind => $indexdata) {
					$clone_car = $car;
					$clone_car['unit_index'] = (int)$rind;
					$clone_car['unit_index_str'] = $indexdata;
					array_splice($rows, ($kr + 1 + $index_loop), 0, array($clone_car));
					$index_loop++;
				}
			}
		}
	}
}
//
?>
<form class="vrc-avov-form" action="index.php?option=com_vikrentcar&amp;task=overv" method="post" name="vroverview">
	<div class="btn-toolbar vrc-avov-toolbar" id="filter-bar" style="width: 100%; display: inline-block;">
		<div class="btn-group pull-left">
			<?php echo $wmonthsel; ?>
		</div>
		<div class="btn-group pull-left">
			<select name="mnum" onchange="document.vroverview.submit();">
			<?php
			for ($i = 1; $i <= 12; $i++) { 
				?>
				<option value="<?php echo $i; ?>"<?php echo $i == $mnum ? ' selected="selected"' : ''; ?>><?php echo JText::_('VRCONFIGMAXDATEMONTHS').': '.$i; ?></option>
				<?php
			}
			?>
			</select>
		</div>
		<div class="btn-group pull-left">
			<select name="units_show_type" id="uleftorbooked" onchange="vrcUnitsLeftOrBooked();">
				<option value="units-booked"<?php echo (!empty($cookie_uleft) && $cookie_uleft == 'units-booked' ? ' selected="selected"' : ''); ?>><?php echo JText::_('VRCVERVIEWUBOOKEDFILT'); ?></option>
				<option value="units-left"<?php echo $show_type == 'units-left' || (!empty($cookie_uleft) && $cookie_uleft == 'units-left') ? ' selected="selected"' : ''; ?>><?php echo JText::_('VRCVERVIEWULEFTFILT'); ?></option>
			</select>
		</div>
	<?php
	if (is_array($all_locations)) {
		$loc_options = '<option value="">'.JText::_('VRCORDERSLOCFILTERANY').'</option>'."\n";
		foreach ($all_locations as $location) {
			$loc_options .= '<option value="'.$location['id'].'"'.($location['id'] == $plocation ? ' selected="selected"' : '').'>'.$location['name'].'</option>'."\n";
		}
		?>
		<div class="btn-group pull-right">
			<button type="submit" class="btn btn-secondary"><?php echo JText::_('VRCORDERSLOCFILTERBTN'); ?></button>
		</div>
		<div class="btn-group pull-right">
			<select name="locationw" id="locwfilter">
				<option value="pickup"><?php echo JText::_('VRCORDERSLOCFILTERPICK'); ?></option>
				<option value="dropoff"<?php echo $plocationw == 'dropoff' ? ' selected="selected"' : ''; ?>><?php echo JText::_('VRCORDERSLOCFILTERDROP'); ?></option>
				<option value="both"<?php echo $plocationw == 'both' ? ' selected="selected"' : ''; ?>><?php echo JText::_('VRCORDERSLOCFILTERPICKDROP'); ?></option>
			</select>
		</div>
		<div class="btn-group pull-right">
			<label for="locfilter" style="display: inline-block; margin-right: 5px;"><?php echo JText::_('VRCORDERSLOCFILTER'); ?></label>
			<select name="location" id="locfilter"><?php echo $loc_options; ?></select>
		</div>
		<?php
	}
	?>
	</div>
</form>

<?php
$todayymd = date('Y-m-d');
$nowts = getdate($tsstart);
$curts = $nowts;
for ($mind = 1; $mind <= $mnum; $mind++) {
?>
<table class="vrcoverviewtable vrc-overview-table">
	<tr class="vrcoverviewtablerow">
		<td class="bluedays vrcoverviewtdone"><strong><?php echo VikRentCar::sayMonth($curts['mon'])." ".$curts['year']; ?></strong></td>
	<?php
	$moncurts = $curts;
	$mon = $moncurts['mon'];
	while ($moncurts['mon'] == $mon) {
		$curdayymd = date('Y-m-d', $moncurts[0]);
		echo '<td align="center" class="bluedays'.($todayymd == $curdayymd ? ' vrc-overv-todaycell' : '').'"><span class="vrc-overv-mday">'.$moncurts['mday'].'</span><span class="vrc-overv-wday">'.$wdays_map[$moncurts['wday']].'</td>';
		$moncurts = getdate(mktime(0, 0, 0, $moncurts['mon'], ($moncurts['mday'] + 1), $moncurts['year']));
	}
	?>
	</tr>
	<?php
	foreach ($rows as $car) {
		$moncurts = $curts;
		$mon = $moncurts['mon'];
		$is_subunit = (array_key_exists('unit_index', $car));
		echo '<tr class="vrcoverviewtablerow'.($is_subunit ? ' vrcoverviewtablerow-subunit' : '').'"'.($is_subunit ? ' data-subcarid="'.$car['id'].'-'.$car['unit_index'].'"' : '').'>'."\n";
		if ($is_subunit) {
			echo '<td class="carname subcarname" data-carid="-'.$car['id'].'"><span class="vrc-overview-subcarunits"><i class="'.VikRentCarIcons::i('car').'"></i></span><span class="vrc-overview-subcarname">'.$car['unit_index_str'].'</span></td>';
		} else {
			echo '<td class="carname" data-carid="'.$car['id'].'"><span class="vrc-overview-carunits">'.$car['units'].'</span><span class="vrc-overview-carname">'.$car['name'].'</span>'.(array_key_exists($car['id'], $cars_features_map) ? '<span class="vrc-overview-subcar-toggle"><i class="'.VikRentCarIcons::i('chevron-down', 'hasTooltip').'" style="margin: 0;" title="'.addslashes(JText::_('VRCOVERVIEWTOGGLESUBCAR')).'"></i></span>' : '').'</td>';
		}
		$car_bids_pool = array();
		while ($moncurts['mon'] == $mon) {
			$dclass = !array_key_exists('unit_index', $car) ? "notbusy" : "subnotbusy";
			$dalt = "";
			$bid = "";
			$bids_pool = array();
			$totfound = 0;
			$cur_day_key = date('Y-m-d', $moncurts[0]);
			if (is_array($arrbusy[$car['id']]) && !array_key_exists('unit_index', $car)) {
				foreach ($arrbusy[$car['id']] as $b) {
					$tmpone = getdate($b['ritiro']);
					$ritts = mktime(0, 0, 0, $tmpone['mon'], $tmpone['mday'], $tmpone['year']);
					$tmptwo = getdate($b['consegna']);
					$conts = mktime(0, 0, 0, $tmptwo['mon'], $tmptwo['mday'], $tmptwo['year']);
					if ($moncurts[0] >= $ritts && $moncurts[0] <= $conts) {
						$dclass = "busy";
						$bid = $b['idorder'];
						if (!in_array($bid, $bids_pool)) {
							$bids_pool[] = '-'.$bid.'-';
						}
						if (array_key_exists($car['id'], $cars_features_map)) {
							if (!array_key_exists($cur_day_key, $car_bids_pool)) {
								$car_bids_pool[$cur_day_key] = array();
							}
							$car_bids_pool[$cur_day_key][] = (int)$bid;
						}
						if ($moncurts[0] == $ritts) {
							$dalt = JText::_('VRPICKUPAT')." ".date($nowtf, $b['ritiro']);
						} elseif ($moncurts[0] == $conts) {
							$dalt = JText::_('VRRELEASEAT')." ".date($nowtf, $b['consegna']);
						}
						$totfound += $b['stop_sales'] > 0 ? $car['units'] : 1;
					}
				}
			}
			$useday = ($moncurts['mday'] < 10 ? "0".$moncurts['mday'] : $moncurts['mday']);
			$dclass .= ($totfound < $car['units'] && $totfound > 0 ? ' vrc-partially' : '');
			$write_units = $show_type == 'units-left' || (!empty($cookie_uleft) && $cookie_uleft == 'units-left') ? ($car['units'] - $totfound) : $totfound;
			if (array_key_exists('unit_index', $car) && array_key_exists($car['id'], $cars_features_bookings) && array_key_exists($cur_day_key, $cars_bids_pools[$car['id']]) && array_key_exists($car['unit_index'], $cars_features_bookings[$car['id']])) {
				foreach ($cars_bids_pools[$car['id']][$cur_day_key] as $bid) {
					$bid = intval(str_replace('-', '', $bid));
					if (in_array($bid, $cars_features_bookings[$car['id']][$car['unit_index']])) {
						$car['units'] = 1;
						$totfound = 1;
						$dclass = "subcar-busy";
						break;
					}
				}
			}
			// check today's date
			$curdayymd = date('Y-m-d', $moncurts[0]);
			if ($todayymd == $curdayymd) {
				$dclass .= ' vrc-overv-todaycell';
			}
			//
			if ($totfound == 1) {
				$write_units = strpos($dclass, "subcar-busy") !== false ? '&bull;' : $write_units;
				/**
				 * @wponly lite - link changed to "editorder"
				 */
				$dlnk = "<a href=\"index.php?option=com_vikrentcar&task=editorder&goto=overv&cid[]=".$bid."\" class=\"".(strpos($dclass, "subcar-busy") === false ? 'vrc-overview-redday' : 'vrc-overview-subredday')."\" style=\"color: #ffffff;\" data-units-booked=\"".$totfound."\" data-units-left=\"".($car['units'] - $totfound)."\">".$write_units."</a>";
				//
				$cal = "<td align=\"center\" class=\"".$dclass."\"".(!empty($dalt) ? " title=\"".$dalt."\"" : "")." data-day=\"".$cur_day_key."\" data-bids=\"".(strpos($dclass, "subcar-busy") !== false ? '-'.$bid.'-' : implode(',', $bids_pool))."\">".$dlnk."</td>\n";
			} elseif ($totfound > 1) {
				$dlnk = "<a href=\"index.php?option=com_vikrentcar&task=choosebusy&goto=overv&idcar=".$car['id']."&ts=".$moncurts[0]."\" class=\"vrc-overview-redday\" style=\"color: #ffffff;\" data-units-booked=\"".$totfound."\" data-units-left=\"".($car['units'] - $totfound)."\">".$write_units."</a>";
				$cal = "<td align=\"center\" class=\"".$dclass."\" data-day=\"".$cur_day_key."\" data-bids=\"".implode(',', $bids_pool)."\">".$dlnk."</td>\n";
			} else {
				$dlnk = $useday;
				$cal = "<td align=\"center\" class=\"".$dclass."\" data-day=\"".$cur_day_key."\" data-bids=\"\">&nbsp;</td>\n";
			}
			echo $cal;
			$moncurts = getdate(mktime(0, 0, 0, $moncurts['mon'], ($moncurts['mday'] + 1), $moncurts['year']));
		}
		if (array_key_exists($car['id'], $cars_features_map) && !array_key_exists('unit_index', $car) && count($car_bids_pool) > 0) {
			// load bookings for distinctive features when parsing the parent $car array
			$car_indexes_bids = VikRentCar::loadCarIndexesOrders($car['id'], $car_bids_pool);
			if (count($car_indexes_bids) > 0) {
				$cars_features_bookings[$car['id']] = $car_indexes_bids;
				$cars_bids_pools[$car['id']] = $car_bids_pool;
			}
			//
		}
		echo '</tr>';
	}
	?>
</table>
<?php echo ($mind + 1) <= $mnum ? '<br/>' : ''; ?>
<?php
	$curts = getdate(mktime(0, 0, 0, ($nowts['mon'] + $mind), $nowts['mday'], $nowts['year']));
}
?>

<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
	<input type="hidden" name="option" value="com_vikrentcar" />
	<input type="hidden" name="task" value="overv" />
	<input type="hidden" name="month" value="<?php echo $tsstart; ?>" />
	<input type="hidden" name="mnum" value="<?php echo $mnum; ?>" />
	<?php echo '<br/>'.$navbut; ?>
</form>

<script type="text/javascript">
var hovtimer;
var hovtip = false;
var vrcMessages = {
	"loadingTip": "<?php echo addslashes(JText::_('VIKLOADING')); ?>",
	"numDays": "<?php echo addslashes(JText::_('VRDAYS')); ?>",
	"pickupLbl": "<?php echo addslashes(JText::_('VRPICKUPAT')); ?>",
	"dropoffLbl": "<?php echo addslashes(JText::_('VRRELEASEAT')); ?>",
	"totalAmount": "<?php echo addslashes(JText::_('VREDITORDERNINE')); ?>",
	"totalPaid": "<?php echo addslashes(JText::_('VRCEXPCSVTOTPAID')); ?>",
	"currencySymb": "<?php echo $currencysymb; ?>"
};

if (jQuery.isFunction(jQuery.fn.tooltip)) {
	jQuery(".hasTooltip").tooltip();
} else {
	jQuery.fn.tooltip = function(){};
}

function vrcUnitsLeftOrBooked() {
	var set_to = jQuery('#uleftorbooked').val();
	if (jQuery('.vrc-overview-redday').length) {
		jQuery('.vrc-overview-redday').each(function(){
			jQuery(this).text(jQuery(this).attr('data-'+set_to));
		});
	}
	var nd = new Date();
	nd.setTime(nd.getTime() + (365*24*60*60*1000));
	document.cookie = "vrcAovwUleft="+set_to+"; expires=" + nd.toUTCString() + "; path=/";
}

/* Hover Tooltip functions */
function registerHoveringTooltip(that) {
	if (hovtip) {
		return false;
	}
	if (hovtimer) {
		clearTimeout(hovtimer);
		hovtimer = null;
	}
	var elem = jQuery(that);
	var cellheight = elem.outerHeight();
	var celldata = new Array();
	if (elem.hasClass('subcar-busy')) {
		celldata.push(elem.parent('tr').attr('data-subcarid'));
		celldata.push(elem.attr('data-day'));
	}
	hovtimer = setTimeout(function() {
		hovtip = true;
		jQuery(
			"<div class=\"vrc-overview-tipblock\">"+
				"<div class=\"vrc-overview-tipinner\"><span class=\"vrc-overview-tiploading\">"+vrcMessages.loadingTip+"</span></div>"+
			"</div>"
		).appendTo(elem);
		jQuery(".vrc-overview-tipblock").css("bottom", "+="+cellheight);
		loadTooltipBookings(elem.attr('data-bids'), celldata);
	}, 900);
}
function unregisterHoveringTooltip() {
	clearTimeout(hovtimer);
	hovtimer = null;
}
function adjustHoveringTooltip() {
	setTimeout(function() {
		var difflim = 35;
		var otop = jQuery(".vrc-overview-tipblock").offset().top;
		if (otop < difflim) {
			jQuery(".vrc-overview-tipblock").css("bottom", "-="+(difflim - otop));
		}
	}, 100);
}
function hideVrcTooltip() {
	jQuery('.vrc-overview-tipblock').remove();
	hovtip = false;
}
function loadTooltipBookings(bids, celldata) {
	if (!bids || bids === undefined || !bids.length) {
		hideVrcTooltip();
		return false;
	}
	var subcardata = celldata.length ? celldata[0] : '';
	//ajax request
	var jqxhr = jQuery.ajax({
		type: "POST",
		url: "index.php",
		data: { option: "com_vikrentcar", task: "getordersinfo", tmpl: "component", idorders: bids, subcar: subcardata }
	}).done(function(res) {
		if (res.indexOf('e4j.error') >= 0 ) {
			console.log(res);
			alert(res.replace("e4j.error.", ""));
			//restore
			hideVrcTooltip();
			//
		} else {
			var obj_res = JSON.parse(res);
			jQuery('.vrc-overview-tiploading').remove();
			var container = jQuery('.vrc-overview-tipinner');
			jQuery(obj_res).each(function(k, v) {
				var bcont = "<div class=\"vrc-overview-tip-bookingcont\">";
				bcont += "<div class=\"vrc-overview-tip-bookingcont-left\">";
				/**
				 * @wponly lite - link changed to "editorder"
				 */
				bcont += "<div class=\"vrc-overview-tip-bid\"><span class=\"vrc-overview-tip-lbl\"><?php echo addslashes(JText::_('VRCDASHUPRESONE')); ?> <span class=\"vrc-overview-tip-lbl-innerleft\"><a href=\"index.php?option=com_vikrentcar&task=editorder&goto=overv&cid[]="+v.id+"\"><i class=\"<?php echo VikRentCarIcons::i('edit'); ?>\"></i></a></span></span><span class=\"vrc-overview-tip-cnt\">"+v.id+"</span></div>";
				//
				bcont += "<div class=\"vrc-overview-tip-bstatus\"><span class=\"vrc-overview-tip-lbl\"><?php echo addslashes(JText::_('VRPVIEWORDERSEIGHT')); ?></span><span class=\"vrc-overview-tip-cnt\"><div class=\"label "+(v.status == 'confirmed' ? 'label-success' : 'label-warning')+"\">"+v.status_lbl+"</div></span></div>";
				bcont += "<div class=\"vrc-overview-tip-bdate\"><span class=\"vrc-overview-tip-lbl\"><?php echo addslashes(JText::_('VRPVIEWORDERSONE')); ?></span><span class=\"vrc-overview-tip-cnt\"><a href=\"index.php?option=com_vikrentcar&task=editorder&goto=overv&cid[]="+v.id+"\">"+v.ts+"</a></span></div>";
				bcont += "</div>";
				bcont += "<div class=\"vrc-overview-tip-bookingcont-right\">";
				bcont += "<div class=\"vrc-overview-tip-bcustomer\"><span class=\"vrc-overview-tip-lbl\"><?php echo addslashes(JText::_('VRPVIEWORDERSTWO')); ?></span><span class=\"vrc-overview-tip-cnt\">"+v.cinfo+"</span></div>";
				bcont += "<div class=\"vrc-overview-tip-bguests\"><span class=\"vrc-overview-tip-lbl\">"+vrcMessages.numDays+"</span><span class=\"vrc-overview-tip-cnt hasTooltip\" title=\""+vrcMessages.pickupLbl+" "+v.pickup+" - "+vrcMessages.dropoffLbl+" "+v.dropoff+"\">" + v.days + (v.pickup_place !== null && v.pickup_place.length ? ", " + v.pickup_place + (v.dropoff_place !== null && v.dropoff_place.length && v.dropoff_place != v.pickup_place ? " - " + v.dropoff_place : "") : "") + "</span></div>";
				if (v.hasOwnProperty('cindexes')) {
					for (var cindexk in v.cindexes) {
						if (v.cindexes.hasOwnProperty(cindexk)) {
							bcont += "<div class=\"vrc-overview-tip-bcindexes\"><span class=\"vrc-overview-tip-lbl\">"+cindexk+"</span><span class=\"vrc-overview-tip-cnt\">"+v.cindexes[cindexk]+"</span></div>";
						}
					}
				}
				bcont += "<div class=\"vrc-overview-tip-pickdt\"><span class=\"vrc-overview-tip-lbl\"><?php echo addslashes(JText::_('VRPVIEWORDERSFOUR')); ?></span><span class=\"vrc-overview-tip-cnt\">"+v.pickup+"</span></div>";
				bcont += "<div class=\"vrc-overview-tip-dropdt\"><span class=\"vrc-overview-tip-lbl\"><?php echo addslashes(JText::_('VRPVIEWORDERSFIVE')); ?></span><span class=\"vrc-overview-tip-cnt\">"+v.dropoff+"</span></div>";
				bcont += "<div class=\"vrc-overview-tip-bookingcont-total\">";
				bcont += "<div class=\"vrc-overview-tip-btot\"><span class=\"vrc-overview-tip-lbl\">"+vrcMessages.totalAmount+"</span><span class=\"vrc-overview-tip-cnt\">"+vrcMessages.currencySymb+" "+v.format_tot+"</span></div>";
				if (v.totpaid > 0.00) {
					bcont += "<div class=\"vrc-overview-tip-btot\"><span class=\"vrc-overview-tip-lbl\">"+vrcMessages.totalPaid+"</span><span class=\"vrc-overview-tip-cnt\">"+vrcMessages.currencySymb+" "+v.format_totpaid+"</span></div>";
				}
				var getnotes = v.adminnotes;
				if (getnotes !== null && getnotes.length) {
					bcont += "<div class=\"vrc-overview-tip-notes\"><span class=\"vrc-overview-tip-lbl\"><span class=\"vrc-overview-tip-notes-inner\"><i class=\"vboicn-info hasTooltip\" title=\""+getnotes+"\"></i></span></span></div>";
				}
				bcont += "</div>";
				bcont += "</div>";
				bcont += "</div>";
				container.append(bcont);
			});
			// adjust the position so that it won't go under other contents
			adjustHoveringTooltip()
			//
			jQuery(".hasTooltip").tooltip();
		}
	}).fail(function() { 
		console.error('Request Failed');
		//restore
		hideVrcTooltip();
		//
	});
	//
}

jQuery(document).ready(function() {
	/**
	 * Render the units view mode
	 */
	vrcUnitsLeftOrBooked();
	/* Toggle Sub-units Start */
	jQuery(".vrc-overview-subcar-toggle").click(function() {
		var carid = jQuery(this).parent("td").attr("data-carid");
		if (jQuery(this).hasClass("vrc-overview-subcar-toggle-active")) {
			jQuery("td.carname[data-carid='"+carid+"']").find("span.vrc-overview-subcar-toggle").removeClass("vrc-overview-subcar-toggle-active").find("i.fa, i.fas").removeClass("fa-chevron-up").addClass("fa-chevron-down");
			jQuery("td.subcarname[data-carid='-"+carid+"']").parent("tr").hide();
		} else {
			jQuery("td.carname[data-carid='"+carid+"']").find("span.vrc-overview-subcar-toggle").addClass("vrc-overview-subcar-toggle-active").find("i.fa, i.fas").removeClass("fa-chevron-down").addClass("fa-chevron-up");
			jQuery("td.subcarname[data-carid='-"+carid+"']").parent("tr").show();
		}
	});
	/* Toggle Sub-units End */

	/* Hover Tooltip Start */
	jQuery('td.busy, td.busytmplock, td.subcar-busy').hover(function() {
		registerHoveringTooltip(this);
	}, unregisterHoveringTooltip);
	jQuery(document).keydown(function(e) {
		if (e.keyCode == 27) {
			if (hovtip === true) {
				hideVrcTooltip();
			}
		}
	});
	jQuery(document).mouseup(function(e) {
		if (!hovtip) {
			return false;
		}
		if (hovtip) {
			var vrc_overlay_cont = jQuery(".vrc-overview-tipblock");
			if (!vrc_overlay_cont.is(e.target) && vrc_overlay_cont.has(e.target).length === 0) {
				hideVrcTooltip();
				return true;
			}
		}
	});
	/* Hover Tooltip End */
});
</script>

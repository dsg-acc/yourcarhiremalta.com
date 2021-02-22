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

/**
 * @wponly lite - placeholder view for Free version
 */
?>
<div class="vrc-free-nonavail-wrap">
	<div class="vrc-free-nonavail-inner">
		<div class="vrc-free-nonavail-logo">
			<img src="<?php echo VRC_SITE_URI; ?>resources/vikwp_free_logo.png" />
		</div>
		<div class="vrc-free-nonavail-expl">
			<h3><?php echo JText::_('VRMENUTENFIVE'); ?></h3>
			<p class="vrc-free-nonavail-descr"><?php echo JText::_('VRCFREEOPTIONSDESCR'); ?></p>
			<p class="vrc-free-nonavail-footer-descr">
				<button type="button" class="btn vrc-free-nonavail-gopro" onclick="document.location.href='admin.php?option=com_vikrentcar&amp;view=gotopro';">
					<?php VikRentCarIcons::e('rocket'); ?> <span><?php echo JText::_('VRCGOTOPROBTN'); ?></span>
				</button>
			</p>
		</div>
	</div>
</div>

<?php
$index = 'cr_' . rand(1, 999999);
$date_format = pjUtil::toBootstrapDate($tpl['option_arr']['o_date_format']);
$months = __('months', true);
ksort($months);
$short_days = __('short_days', true);

$price_groups = [];
if (count($tpl['price_arr']) > 0) {
	foreach ($tpl['price_arr'] as $k => &$price) {
		$key = "$price[date_from]_$price[date_to]";
		if (!isset($price_groups[$key])) {
			$price_groups[$key] = [
				'date_from' => $price['date_from'],
				'date_to' => $price['date_to'],
				'items' => []
			];
		}
		
		$price['group'] = $key;
		
		$price_groups[$key]['items'][$k] = $price;
	}
	unset($price);
}
?>
<div id="datePickerOptions" style="display:none;" data-wstart="<?php echo (int) $tpl['option_arr']['o_week_start']; ?>" data-format="<?php echo $date_format; ?>" data-months="<?php echo implode("_", $months);?>" data-days="<?php echo implode("_", $short_days);?>"></div>
<div>
	<h3 id="calendarMonth" style="float:left"></h3>
	<div class="m-t-xs text-right">
		<div class="form-group">
			<a href="javascript:void(0);" class="btn btn-white crShowPrevMonth"><span class="hidden-sm">« Prev</span></a>
			<a href="javascript:void(0);" class="btn btn-white crShowNextMonth"><span class="hidden-sm">Next »</span></a>
		</div>
	</div>
</div>
<div class="table-responsive table-responsive-secondary">
	<table class="table hideEm" id="calendarTable" data-start="<?php echo date($tpl['option_arr']['o_date_format'], time());?>">
		<thead>
			<tr>
				<th>Sunday</th>
				<th>Monday</th>
				<th>Tuesday</th>
				<th>Wednesday</th>
				<th>Thursday</th>
				<th>Friday</th>
				<th>Saturday</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
				<td class="calendarTableCell">
					<table>
						<thead>
							<tr><th class="calendarTableDay"></th></tr>
						</thead>
						<tbody>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="table-responsive table-responsive-secondary" style="display:none">
	<table class="table table-striped table-hover hideEm" id="tblRateGroups">
		<thead>
			<tr>
				<th><?php __('price_from'); ?></th>
				<th><?php __('price_to'); ?></th>
				<th><?php __('price_price'); ?></th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($price_groups as $group_key => $price_group): ?>
				<tr class="priceGroupRow" data-category="<?php echo $group_key; ?>" data-datefrom="<?php echo pjDateTime::formatDate($price_group['date_from'], 'Y-m-d', $tpl['option_arr']['o_date_format']); ?>" data-dateto="<?php echo pjDateTime::formatDate($price_group['date_to'], 'Y-m-d', $tpl['option_arr']['o_date_format']); ?>">
					<td>
						<?php echo pjDateTime::formatDate($price_group['date_from'], 'Y-m-d', $tpl['option_arr']['o_date_format']); ?>
					</td>
					
					<td>
						<?php echo pjDateTime::formatDate($price_group['date_to'], 'Y-m-d', $tpl['option_arr']['o_date_format']); ?>
					</td>
		
					<td width="320">
						<?php foreach($price_group['items'] as $k => $price_item): ?>
							<p>
								<?php if ($price_item['from'] == $price_item['to']): ?>
								<?php echo $price_item['from']; ?> <?php echo ($price_item['price_per'] == 'day') ? ($price_item['from'] > 1 ? 'days' : 'day') : ($price_item['from'] > 1 ? 'hours' : 'hour'); ?>: <?php echo $price_item['price']; ?>
								<?php else: ?>
								<?php echo $price_item['from'] . ' - ' . $price_item['to']; ?> <?php echo ($price_item['price_per'] == 'day') ? 'days' : 'hours'; ?>: <?php echo $price_item['price']; ?>
								<?php endif; ?>
							</p>
						<?php endforeach; ?>
					</td>
					
					<td>
						<div class="m-t-xs text-right">
							<div class="form-group">
								<a href="javascript:void(0);" class="btn btn-primary btn-outline btn-sm crEditRateGroup" data-category="<?php echo $group_key; ?>" data-datefrom="<?php echo pjDateTime::formatDate($price_group['date_from'], 'Y-m-d', $tpl['option_arr']['o_date_format']); ?>" data-dateto="<?php echo pjDateTime::formatDate($price_group['date_to'], 'Y-m-d', $tpl['option_arr']['o_date_format']); ?>"><i class="fa fa-pencil"></i></a>
								<a href="javascript:void(0);" class="btn btn-danger btn-outline btn-sm crRemoveRateGroup" data-category="<?php echo $group_key; ?>"><i class="fa fa-trash"></i></a>
							</div>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<dialog id="ratesDialog">
	<div id="tblRatesContainer">
		<div>
			<div class="form-group" style="max-width:260px">
				<p><label for="date_to_default"><?php __('price_from'); ?></label></p>
				<div class="input-group">
					<input type="text" name="date_from_default" id="date_from_default" value="<?php echo pjDateTime::formatDate(date('Y-m-d'), 'Y-m-d', $tpl['option_arr']['o_date_format']); ?>" class="form-control datepick required" readonly="readonly" data-msg-required="<?php __('plugin_base_this_field_is_required', false, true);?>" /> 
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
			<div class="form-group" style="max-width:260px">
				<p><label for="date_to_default"><?php __('price_to'); ?></label></p>
				<div class="input-group">
					<input type="text" name="date_to_default" id="date_to_default" value="<?php echo pjDateTime::formatDate(date('Y-m-d'), 'Y-m-d', $tpl['option_arr']['o_date_format']); ?>" class="form-control datepick required" readonly="readonly" data-msg-required="<?php __('plugin_base_this_field_is_required', false, true);?>" /> 
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
		</div>
		<div class="table-responsive table-responsive-secondary">
			<table class="table table-striped table-hover hideEm" id="tblRates">
				<thead>
					<tr>
						<th style="display:none"><?php __('price_from'); ?></th>
						<th style="display:none"><?php __('price_to'); ?></th>
						<th colspan="<?php echo $tpl['option_arr']['o_booking_periods'] == 'both' ? 3 : 2;?>"><?php __('items_length'); ?></th>
						<th colspan="2"><?php __('price_price'); ?></th>
						<th>&nbsp;</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach($tpl['price_arr'] as $k => $price) { 
						$index = $price['id'];
						?>
						<tr data-idx="<?php echo $index;?>" data-category="<?php echo $price['group']; ?>" class="priceTableRow">
							<td style="display:none">
								<div class="form-group">
									<div class="input-group"> 
										<input type="text" data-category="<?php echo $price['group'] ?>" name="date_from[<?php echo $index;?>]" id="date_from_<?php echo $index;?>" value="<?php echo pjDateTime::formatDate($price['date_from'], 'Y-m-d', $tpl['option_arr']['o_date_format']); ?>" class="form-control datepick required dateFromSelector" readonly="readonly" data-msg-required="<?php __('plugin_base_this_field_is_required', false, true);?>" /> 
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									</div>
								</div>
							</td>
							
							<td style="display:none">
								<div class="form-group">
									<div class="input-group"> 
										<input type="text" data-category="<?php echo $price['group'] ?>" name="date_to[<?php echo $index;?>]" id="date_to_<?php echo $index;?>" value="<?php echo pjDateTime::formatDate($price['date_to'], 'Y-m-d', $tpl['option_arr']['o_date_format']); ?>" class="form-control datepick required dateToSelector" readonly="readonly" data-msg-required="<?php __('plugin_base_this_field_is_required', false, true);?>" /> 
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									</div>
								</div>
							</td>
				
							<td width="160">
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3"><?php __('lblFrom');?>:</div>
										<div class="col-sm-9">
											<input class="form-control required touchspin3" type="text" name="from[<?php echo $index;?>]" id="from_<?php echo $index;?>" value="<?php echo (int) $price['from']; ?>" data-msg-required="<?php __('plugin_base_this_field_is_required', false, true);?>" />
										</div>
									</div>
								</div>
							</td>
							<td width="160">
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3"><?php __('lblTo');?>:</div>
										<div class="col-sm-9">
											<input class="form-control required touchspin3" type="text" name="to[<?php echo $index;?>]" id="to_<?php echo $index;?>" value="<?php echo (int) $price['to']; ?>" data-msg-required="<?php __('plugin_base_this_field_is_required', false, true);?>" />
										</div>
									</div>
								</div>
							</td>
							<?php if ($tpl['option_arr']['o_booking_periods'] == 'both') { ?>
							<td>
								<div class="form-group">
									<select name="price_per[<?php echo $index;?>]" class="form-control pPeriod" >
										<option value="hour"<?php echo $price['price_per'] != 'hour' ? NULL : ' selected="selected"'; ?>><?php __('items_hour_plural'); ?></option>
										<option value="day"<?php echo $price['price_per'] != 'day' ? NULL : ' selected="selected"'; ?>><?php __('items_day_plural'); ?></option>
									</select>
								</div>
							</td>
							<?php } ?>
							<td width="160">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><?php echo pjCurrency::getCurrencySign($tpl['option_arr']['o_currency'], false);?></span> 
					
										<input type="text" name="price[<?php echo $index;?>]" id="price_<?php echo $index;?>" value="<?php echo $price['price'];?>" class="form-control required number" data-msg-required="<?php __('plugin_base_this_field_is_required', false, true);?>" data-msg-number="<?php __('prices_invalid_price', false, true);?>"> 
									</div>
								</div>
							</td>
							<td>
								<div class="form-group">
								<?php
								$items_price_per = __('items_price_per', true);
								?>
								<?php
								if($tpl['option_arr']['o_booking_periods'] == 'both'){ 
									?>
									<span class="pHour" style="display: <?php echo $price['price_per'] == 'hour' ? NULL : 'none'; ?>"><?php echo $items_price_per['hour']; ?></span>
									<span class="pDay" style="display: <?php echo  $price['price_per'] == 'day' ? NULL : 'none'; ?>"><?php echo $items_price_per['day']; ?></span>
									<?php
								}elseif($tpl['option_arr']['o_booking_periods'] == 'perday'){
									?>
									<span class="pDay"><?php echo $items_price_per['day']; ?></span>
									<?php
								}elseif($tpl['option_arr']['o_booking_periods'] == 'perhour'){
									?>
									<span class="pHour"><?php echo $items_price_per['hour']; ?></span>
									<?php
								} 
								?>
								</div>
							</td>
							<td>
								<div class="m-t-xs text-right">
									<div class="form-group">
										<a href="javascript:void(0);" class="btn btn-danger btn-outline btn-sm crRemoveRate"><i class="fa fa-trash"></i></a>
									</div>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<a href="javascript:void(0);" class="btn btn-primary btn-outline crAddRate"><i class="fa fa-plus"></i> <?php __('btnAddRate'); ?></a>
	</div>
	<div class="clearfix">
		<button type="submit" class="ladda-button btn btn-primary btn-lg btn-phpjabbers-loader pull-left btnSaveRatesDialog" data-style="zoom-in">
			<span class="ladda-label"><?php __('btnSave', false, true); ?></span>
			<?php include $controller->getConstant('pjBase', 'PLUGIN_VIEWS_PATH') . 'pjLayouts/elements/button-animation.php'; ?>
		</button>

		<button type="button" class="btn btn-white btn-lg pull-right btnCancelRatesDialog"><?php __('btnCancel'); ?></button>
	</div>
</dialog>
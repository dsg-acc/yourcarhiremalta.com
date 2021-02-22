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

jimport('joomla.application.component.view');

class VikrentcarViewSearch extends JViewVikRentCar {

	/**
	 * Response array for the request.
	 * 
	 * @var 	array
	 * 
	 * @since 	1.12
	 */
	protected $response = array('e4j.error' => 'No cars found.');

	public function display($tpl = null) {
		$dbo = JFactory::getDbo();
		$mainframe = JFactory::getApplication();
		$session = JFactory::getSession();
		$vrc_tn = VikRentCar::getTranslator();
		$getjson = VikRequest::getInt('getjson', 0, 'request');
		if ($getjson) {
			// request integrity check before sending to output a JSON
			if (md5('vrc.e4j.vrc') != VikRequest::getString('e4jauth', '', 'request')) {
				$this->setVrcError('Invalid Authentication.');
				return;
			}
		}
		if ($getjson || VikRentCar::allowRent()) {
			$pplace = VikRequest::getInt('place', 0, 'request');
			$returnplace = VikRequest::getInt('returnplace', 0, 'request');
			$ppickupdate = VikRequest::getString('pickupdate', '', 'request');
			$ppickupm = VikRequest::getString('pickupm', '', 'request');
			$ppickuph = VikRequest::getString('pickuph', '', 'request');
			$preleasedate = VikRequest::getString('releasedate', '', 'request');
			$preleasem = VikRequest::getString('releasem', '', 'request');
			$preleaseh = VikRequest::getString('releaseh', '', 'request');
			$pcategories = VikRequest::getString('categories', '', 'request');
			if (!empty($ppickupdate) && !empty($preleasedate)) {
				$nowdf = VikRentCar::getDateFormat();
				if ($nowdf == "%d/%m/%Y") {
					$df = 'd/m/Y';
				} elseif ($nowdf == "%m/%d/%Y") {
					$df = 'm/d/Y';
				} else {
					$df = 'Y/m/d';
				}
				if (VikRentCar::dateIsValid($ppickupdate) && VikRentCar::dateIsValid($preleasedate)) {
					$first = VikRentCar::getDateTimestamp($ppickupdate, $ppickuph, $ppickupm);
					$second = VikRentCar::getDateTimestamp($preleasedate, $preleaseh, $preleasem);
					$actnow = time();
					$midnight_ts = mktime(0, 0, 0, date('n'), date('j'), date('Y'));
					$today_bookings = VikRentCar::todayBookings();
					if ($today_bookings) {
						$actnow = $midnight_ts;
					}
					$checkhourly = false;
					//vikrentcar 1.6
					$checkhourscharges = 0;
					//
					$hoursdiff = 0;
					$min_days_adv = VikRentCar::getMinDaysAdvance();
					$days_to_pickup = floor(($first - $midnight_ts) / 86400);
					if ($second > $first && $first >= $actnow && ($min_days_adv < 1 || $days_to_pickup >= $min_days_adv)) {
						$secdiff = $second - $first;
						$daysdiff = $secdiff / 86400;
						if (is_int($daysdiff)) {
							if ($daysdiff < 1) {
								$daysdiff = 1;
							}
						} else {
							if ($daysdiff < 1) {
								$daysdiff = 1;
								$checkhourly = true;
								$ophours = $secdiff / 3600;
								$hoursdiff = intval(round($ophours));
								if ($hoursdiff < 1) {
									$hoursdiff = 1;
								}
							} else {
								$sum = floor($daysdiff) * 86400;
								$newdiff = $secdiff - $sum;
								$maxhmore = VikRentCar::getHoursMoreRb() * 3600;
								if ($maxhmore >= $newdiff) {
									$daysdiff = floor($daysdiff);
								} else {
									$daysdiff = ceil($daysdiff);
									//vikrentcar 1.6
									$ehours = intval(round(($newdiff - $maxhmore) / 3600));
									$checkhourscharges = $ehours;
									if ($checkhourscharges > 0) {
										$aehourschbasp = VikRentCar::applyExtraHoursChargesBasp();
									}
									//
								}
							}
						}
						// VRC 1.13 - push data to tracker
						VikRentCar::getTracker()->pushDates($first, $second, $daysdiff)->pushLocations($pplace, $returnplace);
						//
						// VRC 1.12 - Restrictions
						$allrestrictions = VikRentCar::loadRestrictions(false);
						$restrictions = VikRentCar::globalRestrictions($allrestrictions);
						$restrcheckin = getdate($first);
						$restrcheckout = getdate($second);
						$restrictionsvalid = true;
						$restrictions_affcount = 0;
						$restrictionerrmsg = '';
						if (count($restrictions) > 0) {
							if (array_key_exists($restrcheckin['mon'], $restrictions)) {
								//restriction found for this month, checking:
								$restrictions_affcount++;
								if (strlen($restrictions[$restrcheckin['mon']]['wday']) > 0) {
									$rvalidwdays = array($restrictions[$restrcheckin['mon']]['wday']);
									if (strlen($restrictions[$restrcheckin['mon']]['wdaytwo']) > 0) {
										$rvalidwdays[] = $restrictions[$restrcheckin['mon']]['wdaytwo'];
									}
									if (!in_array($restrcheckin['wday'], $rvalidwdays)) {
										$restrictionsvalid = false;
										$restrictionerrmsg = JText::sprintf('VRRESTRERRWDAYARRIVAL', VikRentCar::sayMonth($restrcheckin['mon']), VikRentCar::sayWeekDay($restrictions[$restrcheckin['mon']]['wday']).(strlen($restrictions[$restrcheckin['mon']]['wdaytwo']) > 0 ? '/'.VikRentCar::sayWeekDay($restrictions[$restrcheckin['mon']]['wdaytwo']) : ''));
									} elseif ($restrictions[$restrcheckin['mon']]['multiplyminlos'] == 1) {
										if (($daysdiff % $restrictions[$restrcheckin['mon']]['minlos']) != 0) {
											$restrictionsvalid = false;
											$restrictionerrmsg = JText::sprintf('VRRESTRERRMULTIPLYMINLOS', VikRentCar::sayMonth($restrcheckin['mon']), $restrictions[$restrcheckin['mon']]['minlos']);
										}
									}
									$comborestr = VikRentCar::parseJsDrangeWdayCombo($restrictions[$restrcheckin['mon']]);
									if (count($comborestr) > 0) {
										if (array_key_exists($restrcheckin['wday'], $comborestr)) {
											if (!in_array($restrcheckout['wday'], $comborestr[$restrcheckin['wday']])) {
												$restrictionsvalid = false;
												$restrictionerrmsg = JText::sprintf('VRRESTRERRWDAYCOMBO', VikRentCar::sayMonth($restrcheckin['mon']), VikRentCar::sayWeekDay($comborestr[$restrcheckin['wday']][0]).(count($comborestr[$restrcheckin['wday']]) == 2 ? '/'.VikRentCar::sayWeekDay($comborestr[$restrcheckin['wday']][1]) : ''), VikRentCar::sayWeekDay($restrcheckin['wday']));
											}
										}
									}
								} elseif (!empty($restrictions[$restrcheckin['mon']]['ctad']) || !empty($restrictions[$restrcheckin['mon']]['ctdd'])) {
									if (!empty($restrictions[$restrcheckin['mon']]['ctad'])) {
										$ctarestrictions = explode(',', $restrictions[$restrcheckin['mon']]['ctad']);
										if (in_array('-'.$restrcheckin['wday'].'-', $ctarestrictions)) {
											$restrictionsvalid = false;
											$restrictionerrmsg = JText::sprintf('VRRESTRERRWDAYCTAMONTH', VikRentCar::sayWeekDay($restrcheckin['wday']), VikRentCar::sayMonth($restrcheckin['mon']));
										}
									}
									if (!empty($restrictions[$restrcheckin['mon']]['ctdd'])) {
										$ctdrestrictions = explode(',', $restrictions[$restrcheckin['mon']]['ctdd']);
										if (in_array('-'.$restrcheckout['wday'].'-', $ctdrestrictions)) {
											$restrictionsvalid = false;
											$restrictionerrmsg = JText::sprintf('VRRESTRERRWDAYCTDMONTH', VikRentCar::sayWeekDay($restrcheckout['wday']), VikRentCar::sayMonth($restrcheckin['mon']));
										}
									}
								}
								if (!empty($restrictions[$restrcheckin['mon']]['maxlos']) && $restrictions[$restrcheckin['mon']]['maxlos'] > 0 && $restrictions[$restrcheckin['mon']]['maxlos'] > $restrictions[$restrcheckin['mon']]['minlos']) {
									if ($daysdiff > $restrictions[$restrcheckin['mon']]['maxlos']) {
										$restrictionsvalid = false;
										$restrictionerrmsg = JText::sprintf('VRRESTRERRMAXLOSEXCEEDED', VikRentCar::sayMonth($restrcheckin['mon']), $restrictions[$restrcheckin['mon']]['maxlos']);
									}
								}
								if ($daysdiff < $restrictions[$restrcheckin['mon']]['minlos']) {
									$restrictionsvalid = false;
									$restrictionerrmsg = JText::sprintf('VRRESTRERRMINLOSEXCEEDED', VikRentCar::sayMonth($restrcheckin['mon']), $restrictions[$restrcheckin['mon']]['minlos']);
								}
							} elseif (array_key_exists('range', $restrictions)) {
								foreach ($restrictions['range'] as $restr) {
									if ($restr['dfrom'] <= $first && ($restr['dto'] + 82799) >= $first) {
										//restriction found for this date range, checking:
										$restrictions_affcount++;
										if (strlen($restr['wday']) > 0) {
											$rvalidwdays = array($restr['wday']);
											if (strlen($restr['wdaytwo']) > 0) {
												$rvalidwdays[] = $restr['wdaytwo'];
											}
											if (!in_array($restrcheckin['wday'], $rvalidwdays)) {
												$restrictionsvalid = false;
												$restrictionerrmsg = JText::sprintf('VRRESTRERRWDAYARRIVALRANGE', VikRentCar::sayWeekDay($restr['wday']).(strlen($restr['wdaytwo']) > 0 ? '/'.VikRentCar::sayWeekDay($restr['wdaytwo']) : ''));
											} elseif ($restr['multiplyminlos'] == 1) {
												if (($daysdiff % $restr['minlos']) != 0) {
													$restrictionsvalid = false;
													$restrictionerrmsg = JText::sprintf('VRRESTRERRMULTIPLYMINLOSRANGE', $restr['minlos']);
												}
											}
											$comborestr = VikRentCar::parseJsDrangeWdayCombo($restr);
											if (count($comborestr) > 0) {
												if (array_key_exists($restrcheckin['wday'], $comborestr)) {
													if (!in_array($restrcheckout['wday'], $comborestr[$restrcheckin['wday']])) {
														$restrictionsvalid = false;
														$restrictionerrmsg = JText::sprintf('VRRESTRERRWDAYCOMBORANGE', VikRentCar::sayWeekDay($comborestr[$restrcheckin['wday']][0]).(count($comborestr[$restrcheckin['wday']]) == 2 ? '/'.VikRentCar::sayWeekDay($comborestr[$restrcheckin['wday']][1]) : ''), VikRentCar::sayWeekDay($restrcheckin['wday']));
													}
												}
											}
										} elseif (!empty($restr['ctad']) || !empty($restr['ctdd'])) {
											if (!empty($restr['ctad'])) {
												$ctarestrictions = explode(',', $restr['ctad']);
												if (in_array('-'.$restrcheckin['wday'].'-', $ctarestrictions)) {
													$restrictionsvalid = false;
													$restrictionerrmsg = JText::sprintf('VRRESTRERRWDAYCTARANGE', VikRentCar::sayWeekDay($restrcheckin['wday']));
												}
											}
											if (!empty($restr['ctdd'])) {
												$ctdrestrictions = explode(',', $restr['ctdd']);
												if (in_array('-'.$restrcheckout['wday'].'-', $ctdrestrictions)) {
													$restrictionsvalid = false;
													$restrictionerrmsg = JText::sprintf('VRRESTRERRWDAYCTDRANGE', VikRentCar::sayWeekDay($restrcheckout['wday']));
												}
											}
										}
										if (!empty($restr['maxlos']) && $restr['maxlos'] > 0 && $restr['maxlos'] > $restr['minlos']) {
											if ($daysdiff > $restr['maxlos']) {
												$restrictionsvalid = false;
												$restrictionerrmsg = JText::sprintf('VRRESTRERRMAXLOSEXCEEDEDRANGE', $restr['maxlos']);
											}
										}
										if ($daysdiff < $restr['minlos']) {
											$restrictionsvalid = false;
											$restrictionerrmsg = JText::sprintf('VRRESTRERRMINLOSEXCEEDEDRANGE', $restr['minlos']);
										}
										if ($restrictionsvalid == false) {
											break;
										}
									}
								}
							}
						}
						if (!(count($restrictions) > 0) || $restrictions_affcount <= 0) {
							//Check global MinLOS (only in case there are no restrictions affecting these dates or no restrictions at all)
							$globminlos = (int)VikRentCar::setDropDatePlus();
							if ($globminlos > 1 && $daysdiff < $globminlos) {
								$restrictionsvalid = false;
								$restrictionerrmsg = JText::sprintf('VRRESTRERRMINLOSEXCEEDEDRANGE', $globminlos);
							}
							//
						}
						//
						if ($restrictionsvalid === true) {
							$q = "SELECT `p`.*,`tp`.`name` as `pricename` FROM `#__vikrentcar_dispcost` AS `p` LEFT JOIN `#__vikrentcar_prices` AS `tp` ON `p`.`idprice`=`tp`.`id` WHERE `p`.`days`='" . $daysdiff . "' ORDER BY `p`.`cost` ASC, `p`.`idcar` ASC;";
							$dbo->setQuery($q);
							$dbo->execute();
							if ($dbo->getNumRows() > 0) {
								$tars = $dbo->loadAssocList();
								$arrtar = array();
								foreach ($tars as $tar) {
									$arrtar[$tar['idcar']][] = $tar;
								}
								//vikrentcar 1.5
								if ($checkhourly) {
									$arrtar = VikRentCar::applyHourlyPrices($arrtar, $hoursdiff);
								}
								//
								//vikrentcar 1.6
								if ($checkhourscharges > 0 && $aehourschbasp == true) {
									$arrtar = VikRentCar::applyExtraHoursChargesPrices($arrtar, $checkhourscharges, $daysdiff);
								}
								//
								// VRC 1.12 - Closed rate plans on these dates
								$carrpclosed = VikRentCar::getCarRplansClosedInDates(array_keys($arrtar), $first, $daysdiff);
								if (count($carrpclosed) > 0) {
									foreach ($arrtar as $kk => $tt) {
										if (array_key_exists($kk, $carrpclosed)) {
											foreach ($tt as $tk => $tv) {
												if (array_key_exists($tv['idprice'], $carrpclosed[$kk])) {
													unset($arrtar[$kk][$tk]);
												}
											}
											if (!(count($arrtar[$kk]) > 0)) {
												unset($arrtar[$kk]);
											} else {
												$arrtar[$kk] = array_values($arrtar[$kk]);
											}
										}
									}
								}
								//
								$filterplace = (!empty($pplace));
								$filtercat = (!empty($pcategories) && $pcategories != "all");
								//vikrentcar 1.5
								$groupdays = VikRentCar::getGroupDays($first, $second, $daysdiff);
								$morehst = VikRentCar::getHoursCarAvail() * 3600;
								//
								//vikrentcar 1.7 location closing days
								$errclosingdays = '';
								if ($filterplace) {
									$errclosingdays = VikRentCar::checkValidClosingDays($groupdays, $pplace, $returnplace);
								}
								if (empty($errclosingdays)) {
									$all_characteristics = array();
									// VRC 1.13 - Allow pick ups on drop offs
									$picksondrops = VikRentCar::allowPickOnDrop();
									//
									foreach ($arrtar as $kk => $tt) {
										$check = "SELECT * FROM `#__vikrentcar_cars` WHERE `id`='" . $kk . "';";
										$dbo->setQuery($check);
										$dbo->execute();
										$car = $dbo->loadAssocList();
										$vrc_tn->translateContents($car, '#__vikrentcar_cars');
										if (intval($car[0]['avail']) == 0) {
											unset ($arrtar[$kk]);
											continue;
										} else {
											if ($filterplace) {
												$actplaces = explode(";", $car[0]['idplace']);
												if (!in_array($pplace, $actplaces)) {
													unset ($arrtar[$kk]);
													continue;
												}
												$actretplaces = explode(";", $car[0]['idretplace']);
												if (!in_array($returnplace, $actretplaces)) {
													unset ($arrtar[$kk]);
													continue;
												}
											}
											if ($filtercat) {
												$cats = explode(";", $car[0]['idcat']);
												if (!in_array($pcategories, $cats)) {
													unset ($arrtar[$kk]);
													continue;
												}
											}
										}
										$check = "SELECT `b`.`id`,`b`.`ritiro`,`b`.`consegna`,`b`.`stop_sales`,`o`.`id` AS `idorder` FROM `#__vikrentcar_busy` AS `b` LEFT JOIN `#__vikrentcar_orders` `o` ON `b`.`id`=`o`.`idbusy` WHERE `b`.`idcar`=" . (int)$kk . " AND `b`.`consegna` > ".time().";";
										$dbo->setQuery($check);
										$dbo->execute();
										if ($dbo->getNumRows() > 0) {
											$busy = $dbo->loadAssocList();
											foreach ($groupdays as $kgd => $gday) {
												$bfound = 0;
												$bfoundpool = array();
												foreach ($busy as $bu) {
													if ($gday >= $bu['ritiro'] && $gday <= ($morehst + $bu['consegna'])) {
														if ($picksondrops && !($gday > $bu['ritiro'] && $gday < ($morehst + $bu['consegna'])) && $gday != $bu['ritiro']) {
															// VRC 1.13 - pick ups on drop offs allowed
															continue;
														}
														$bfound++;
														if ($bu['stop_sales'] == 1) {
															$bfound = $car[0]['units'];
															break;
														}
														array_push($bfoundpool, array(
															'ritiro' 	=> $bu['ritiro'],
															'consegna' 	=> ($morehst + $bu['consegna']),
														));
													} elseif (count($groupdays) == 2 && $gday == $groupdays[0]) {
														// VRC 1.7
														if ($groupdays[0] < $bu['ritiro'] && $groupdays[0] < ($morehst + $bu['consegna']) && $groupdays[1] > $bu['ritiro'] && $groupdays[1] > ($morehst + $bu['consegna'])) {
															$bfound++;
															if ($bu['stop_sales'] == 1) {
																$bfound = $car[0]['units'];
																break;
															}
															array_push($bfoundpool, array(
																'ritiro' 	=> $bu['ritiro'],
																'consegna' 	=> ($morehst + $bu['consegna']),
															));
														} elseif ($groupdays[0] < $bu['ritiro'] && $groupdays[0] < ($morehst + $bu['consegna']) && $groupdays[1] > $bu['ritiro'] && $groupdays[1] <= ($morehst + $bu['consegna'])) {
															// VRC 1.12 - rentals lasting one day or less touching other hourly/daily rentals with different pickup/dropoff times
															$bfound++;
															if ($bu['stop_sales'] == 1) {
																$bfound = $car[0]['units'];
																break;
															}
															array_push($bfoundpool, array(
																'ritiro' 	=> $bu['ritiro'],
																'consegna' 	=> ($morehst + $bu['consegna']),
															));
														}
													} elseif (isset($groupdays[($kgd + 1)]) && (($bu['consegna'] - $bu['ritiro']) < 86400) && $gday < $bu['ritiro'] && $groupdays[($kgd + 1)] > $bu['consegna']) {
														// VRC 1.10 availability check whith hourly rentals
														$bfound++;
														if ($bu['stop_sales'] == 1) {
															$bfound = $car[0]['units'];
															break;
														}
														array_push($bfoundpool, array(
															'ritiro' 	=> $bu['ritiro'],
															'consegna' 	=> ($morehst + $bu['consegna']),
														));
													} elseif (count($groupdays) > 2 && array_key_exists(($kgd - 1), $groupdays) && array_key_exists(($kgd + 1), $groupdays)) {
														// VRC 1.10 gday is at midnight and the pickup for this date may be at a later time
														if ($groupdays[($kgd - 1)] < $bu['ritiro'] && $groupdays[($kgd - 1)] < ($morehst + $bu['consegna']) && $gday < $bu['ritiro'] && $groupdays[($kgd + 1)] > $bu['ritiro'] && $gday <= ($morehst + $bu['consegna'])) {
															$bfound++;
															if ($bu['stop_sales'] == 1) {
																$bfound = $car[0]['units'];
																break;
															} elseif ($car[0]['units'] > 1 && count($bfoundpool)) {
																foreach ($bfoundpool as $bfp) {
																	if ($bu['ritiro'] > $bfp['consegna'] || $bu['consegna'] < $bfp['ritiro']) {
																		/**
																		 * Given a case of a car with 2 units as full inventory and the following orders:
																		 * #1: Pickup September 3rd 10:00, Dropoff September 4th 10:00
																		 * #2: Pickup September 4th 17:00, Dropoff September 6th 17:00
																		 * A new rental order for the following dates should be allowed:
																		 * #3: Pickup September 2nd 10:00, Dropoff September 7th 10:00
																		 * This is because the order #1 will return the car at a time before the pick up
																		 * of the rental order #2, and so one unit will be free. Basically, the order #2 will
																		 * take the car returned by the order #1 and the order #3 will have the second car.
																		 * 
																		 * @since 	1.13
																		 */
																		$bfound--;
																	}
																}
															}
															array_push($bfoundpool, array(
																'ritiro' 	=> $bu['ritiro'],
																'consegna' 	=> ($morehst + $bu['consegna']),
															));
														}
													} elseif (count($groupdays) > 2 && isset($groupdays[($kgd + 1)])) {
														// VRC 1.12 gday time is prior to pickup time, but next day is inside this range of busy dates
														if ($gday < $bu['ritiro'] && $groupdays[($kgd + 1)] >= $bu['ritiro'] && $groupdays[($kgd + 1)] <= ($morehst + $bu['consegna'])) {
															$bfound++;
															if ($bu['stop_sales'] == 1) {
																$bfound = $car[0]['units'];
																break;
															}
															array_push($bfoundpool, array(
																'ritiro' 	=> $bu['ritiro'],
																'consegna' 	=> ($morehst + $bu['consegna']),
															));
														}
													}
												}
												if ($bfound >= $car[0]['units']) {
													unset ($arrtar[$kk]);
													break;
												}
											}
										}
										if (!VikRentCar::carNotLocked($kk, $car[0]['units'], $first, $second)) {
											unset ($arrtar[$kk]);
											continue;
										}
										// single car restrictions
										if (count($allrestrictions) > 0 && array_key_exists($kk, $arrtar)) {
											$carrestr = VikRentCar::carRestrictions($kk, $allrestrictions);
											if (count($carrestr) > 0) {
												$restrictionerrmsg = VikRentCar::validateCarRestriction($carrestr, $restrcheckin, $restrcheckout, $daysdiff);
												if (strlen($restrictionerrmsg) > 0) {
													unset($arrtar[$kk]);
													continue;
												}
											}
										}
										// end single car restrictions
										// Push Characteristics
										$all_characteristics = VikRentCar::pushCarCharacteristics($all_characteristics, $car[0]['idcarat']);
									}
									if (@ count($arrtar) > 0) {
										//vikrentcar 1.6
										if ($checkhourscharges > 0 && $aehourschbasp == false) {
											$arrtar = VikRentCar::extraHoursSetPreviousFare($arrtar, $checkhourscharges, $daysdiff);
											$arrtar = VikRentCar::applySeasonalPrices($arrtar, $first, $second, $pplace);
											$arrtar = VikRentCar::applyExtraHoursChargesPrices($arrtar, $checkhourscharges, $daysdiff, true);
										} else {
											$arrtar = VikRentCar::applySeasonalPrices($arrtar, $first, $second, $pplace);
										}
										//
										// VRC 1.12 - Process all Types of Price
										$multi_rates = 1;
										foreach ($arrtar as $idr => $tars) {
											$multi_rates = count($tars) > $multi_rates ? count($tars) : $multi_rates;
										}
										if ($multi_rates > 1) {
											for ($r = 1; $r < $multi_rates; $r++) {
												$deeper_rates = array();
												foreach ($arrtar as $idr => $tars) {
													foreach ($tars as $tk => $tar) {
														if ($tk == $r) {
															$deeper_rates[$idr][0] = $tar;
															break;
														}
													}
												}
												if (!count($deeper_rates) > 0) {
													continue;
												}
												$deeper_rates = VikRentCar::applySeasonalPrices($deeper_rates, $first, $second, $pplace);
												foreach ($deeper_rates as $idr => $dtars) {
													foreach ($dtars as $dtk => $dtar) {
														$arrtar[$idr][$r] = $dtar;
													}
												}
											}
										}
										//
										//apply locations fee and store it in session
										if (!empty($pplace) && !empty($returnplace)) {
											$session->set('vrcplace', $pplace);
											$session->set('vrcreturnplace', $returnplace);
											//VRC 1.7 Rev.2
											VikRentCar::registerLocationTaxRate($pplace);
											//
											$locfee = VikRentCar::getLocFee($pplace, $returnplace);
											if ($locfee) {
												//VikRentCar 1.7 - Location fees overrides
												if (strlen($locfee['losoverride']) > 0) {
													$arrvaloverrides = array();
													$valovrparts = explode('_', $locfee['losoverride']);
													foreach($valovrparts as $valovr) {
														if (!empty($valovr)) {
															$ovrinfo = explode(':', $valovr);
															$arrvaloverrides[$ovrinfo[0]] = $ovrinfo[1];
														}
													}
													if (array_key_exists((string)$daysdiff, $arrvaloverrides)) {
														$locfee['cost'] = $arrvaloverrides[$daysdiff];
													}
												}
												//end VikRentCar 1.7 - Location fees overrides
												$locfeecost = intval($locfee['daily']) == 1 ? ($locfee['cost'] * $daysdiff) : $locfee['cost'];
												$lfarr = array ();
												foreach ($arrtar as $kat => $at) {
													$newcost = $at[0]['cost'] + $locfeecost;
													$at[0]['cost'] = $newcost;
													$lfarr[$kat] = $at;
												}
												$arrtar = $lfarr;
											}
										}
										//
										//VRC 1.9 - Out of Hours Fees
										$oohfee = VikRentCar::getOutOfHoursFees($pplace, $returnplace, $first, $second, array(), true);
										if (count($oohfee) > 0) {
											foreach ($arrtar as $kat => $at) {
												if (!in_array($at[0]['idcar'], $oohfee['idcars']) || !array_key_exists($at[0]['idcar'], $oohfee)) {
													continue;
												}
												$newcost = $at[0]['cost'] + $oohfee[$at[0]['idcar']]['cost'];
												$arrtar[$kat][0]['cost'] = $newcost;
											}
										}
										//
										//save in session pickup and drop off timestamps
										$session->set('vrcpickupts', $first);
										$session->set('vrcreturnts', $second);
										//
										$arrtar = VikRentCar::sortResults($arrtar);
										if ($getjson) {
											// return the JSON string and exit process
											$this->response = $arrtar;
											echo json_encode($this->response);
											exit;
										}
										//check whether the user is coming from cardetails
										$pcardetail = VikRequest::getInt('cardetail', '', 'request');
										$pitemid = VikRequest::getInt('Itemid', '', 'request');
										if (!$getjson && !empty($pcardetail) && array_key_exists($pcardetail, $arrtar)) {
											// VRC 1.13 - push data to tracker and close
											VikRentCar::getTracker()->pushCars($pcardetail)->closeTrack();
											//
											$returnplace = VikRequest::getInt('returnplace', '', 'request');
											$mainframe->redirect(JRoute::_("index.php?option=com_vikrentcar&task=showprc&caropt=" . $pcardetail . "&days=" . $daysdiff . "&pickup=" . $first . "&release=" . $second . "&place=" . $pplace . "&returnplace=" . $returnplace . "&fid=" . $pcardetail . (!empty($pitemid) ? "&Itemid=" . $pitemid : ""), false));
										} else {
											if (!$getjson && !empty($pcardetail)) {
												$q="SELECT `id`,`name` FROM `#__vikrentcar_cars` WHERE `id`=".$dbo->quote($pcardetail).";";
												$dbo->setQuery($q);
												$dbo->execute();
												if ($dbo->getNumRows() > 0) {
													$cdet = $dbo->loadAssocList();
													$vrc_tn->translateContents($cdet, '#__vikrentcar_cars');
													$warn_mess = $cdet[0]['name']." ".JText::_('VRCDETAILCNOTAVAIL');
													// VRC 1.13 - push data to tracker and close
													VikRentCar::getTracker()->pushCars($pcardetail)->pushMessage($warn_mess, 'warning')->closeTrack();
													//
													VikError::raiseWarning('', $warn_mess);
												}
											}
											if (!$getjson) {
												// pagination
												$lim = $mainframe->getUserStateFromRequest("com_vikrentcar.limit", 'limit', $mainframe->get('list_limit'), 'int'); //results limit
												$lim0 = VikRequest::getVar('limitstart', 0, '', 'int');
												jimport('joomla.html.pagination');
												$pageNav = new JPagination(count($arrtar), $lim0, $lim);

												/**
												 * @wponly 	forms in WP use POST values, so we need to set additional URL params to the navigation links of the pages
												 */
												$req_vals_diff = array_diff(JFactory::getApplication()->input->post->getArray(), JFactory::getApplication()->input->get->getArray());
												foreach ($req_vals_diff as $pkey => $pval) {
													$pageNav->setAdditionalUrlParam($pkey, $pval);
												}
												//
												
												$navig = $pageNav->getPagesLinks();
												$this->navig = &$navig;
												$tot_res = count($arrtar);
												$arrtar = array_slice($arrtar, $lim0, $lim, true);
												//
											}
											
											$this->res = &$arrtar;
											$this->days = &$daysdiff;
											$this->pickup = &$first;
											$this->release = &$second;
											$this->place = &$pplace;
											$this->all_characteristics = &$all_characteristics;
											$this->tot_res = &$tot_res;
											$this->vrc_tn = &$vrc_tn;
											//theme
											$theme = VikRentCar::getTheme();
											if ($theme != 'default') {
												$thdir = VRC_SITE_PATH . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR . $theme . DIRECTORY_SEPARATOR . 'search';
												if (is_dir($thdir)) {
													$this->_setPath('template', $thdir . DIRECTORY_SEPARATOR);
												}
											}
											//

											if (!$getjson) {
												// VRC 1.13 - close tracker
												VikRentCar::getTracker()->closeTrack();
												//
											}

											parent::display($tpl);
										}
										//
									} else {
										$this->setVrcError((strlen($restrictionerrmsg) > 0 ? $restrictionerrmsg : JText::_('VRNOCARSINDATE')));
									}
								} else {
									//closing days error
									$this->setVrcError($errclosingdays);
								}
							} else {
								$this->setVrcError(JText::_('VRNOCARAVFOR') . " " . $daysdiff . " " . ($daysdiff > 1 ? JText::_('VRDAYS') : JText::_('VRDAY')));
							}
						} else {
							$this->setVrcError($restrictionerrmsg);
						}
					} else {
						if ($first <= $actnow) {
							if (date('d/m/Y', $first) == date('d/m/Y', $actnow)) {
								$errormess = JText::_('VRCERRPICKPASSED');
							} else {
								$errormess = JText::_('VRPICKINPAST');
							}
						} else {
							if ($min_days_adv > 0 && $days_to_pickup < $min_days_adv) {
								$errormess = JText::sprintf('VRERRORMINDAYSADV', $min_days_adv);
							} else {
								$errormess = JText::_('VRPICKBRET');
							}
						}
						$this->setVrcError($errormess);
					}
				} else {
					$this->setVrcError(JText::_('VRWRONGDF') . ": " . VikRentCar::sayDateFormat());
				}
			} else {
				$this->setVrcError(JText::_('VRSELPRDATE'));
			}
		} else {
			echo VikRentCar::getDisabledRentMsg();
		}
	}

	/**
	 * Handles errors with the search results.
	 * 
	 * @param 	string 	$err 	the error message to be displayed or returned.
	 * 
	 * @return 	void
	 * 
	 * @since 	1.12
	 */
	protected function setVrcError($err) {
		$getjson = VikRequest::getInt('getjson', 0, 'request');
		
		if ($getjson) {
			if (!empty($err)) {
				$this->response['e4j.error'] = $err;
			}
			// print the JSON response and exit
			echo json_encode($this->response);
			exit;
		}

		// VRC 1.13 - push data to tracker and close
		VikRentCar::getTracker()->pushMessage($err, 'error')->closeTrack();
		//
		
		showSelect($err);
	}
}

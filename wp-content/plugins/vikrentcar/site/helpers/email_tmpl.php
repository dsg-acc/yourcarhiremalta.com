<?php
/**
 * @package     VikRentCar
 * @subpackage  com_vikrentcar
 * @author      Alessio Gaggii - e4j - Extensionsforjoomla.com
 * @copyright   Copyright (C) 2018 e4j - Extensionsforjoomla.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        https://vikwp.com
 */

/**
 * Some special tags between curly brackets can be used to display certain values such as:
 * {logo}, {company_name}, {order_id}, {confirmnumb}, {order_status}, {order_date}, {customer_info}, {item_name},
 * {pickup_date}, {pickup_location}, {dropoff_date}, {dropoff_location}, {order_details}, {order_total},
 * {order_deposit}, {order_total_paid}, {order_link}, {footer_emailtext}
 *
 * The record of the order can be accessed from the following global array in case you need any extra content or to perform queries for a deeper customization level:
 * $order_details (order array)
 * Example: the ID of the order is contained in $order_details['id'] - you can see the whole array content with the code "print_r($order_details)"
 * 
 * It is also possible to access the customer information array by using this code:
 * $customer = VikRentCar::getCPinIstance()->getCustomerFromBooking($order_details['id']);
 * The variable $customer will always be an array, even if no customers were found. In this case, the array will be empty.
 * Debug the content of the array with the code "print_r($customer)" by placing it on any part of the PHP content below.
 */

defined('ABSPATH') or die('No script kiddies please!');

// defined('VIKRENTCAREXEC') OR die('Restricted Area');

?>

<style type="text/css">
<!--
.clearfix:after {
	content: ".";
	display: block;
	clear: both;
	visibility: hidden;
	line-height: 0;
	height: 0;
}
 
.clearfix {
	display: inline-block;
}
.clearfix  {
	display /*\**/: block\9;
}
.container {
	width:70%;
	font-family: "Century Gothic", Tahoma, Arial;
}
.statusorder {
	width:100%;
	float:none;
	clear:both;
}
.boxstatusorder {
	background:#d9f1ff;
	border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border:1px solid #c4dbdd;
	padding:10px;
	float:left;
	margin:0 5px 10px 0;
	height:25px;
	line-height:25px;
}
.boxstatusorder p {
	margin:0;
	padding:0;
}
.boxstatusorder:last-child {
	margin:0 0 10px 0;
}
.persdetail {
	width:95.8%;
	clear:both;
	float:none;
	padding:10px;
	border:1px solid #eee;
	border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	line-height:1.6em;
}
.persdetail h3 {
	margin:0 0 10px 0;
	padding:0;
}
.hiremainbox {
	background:#fbfbfb;
	border:1px solid #eee;
	-moz-border:1px solid #eee;
	-webkit-border:1px solid #eee;
	border-radius:4px;
	padding:10px;	
	width:95.8%;
	margin:10px 0 0 0;
}
.hirecar {
	float:none;
	clear:both;
}
.hirecar .hiredate {
	float:left;
	border:1px solid #C9E9FC;
	border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	padding:10px;
	margin:0 10px 0 0;
	background:#f6f6f6;
}
.hirecar .hiredate:last-child {
	margin:0;
}
.hirecar .hiredate p {
	padding:0;
	margin:0px 0 5px;
}
.hirecar .hiredate p span {
	display:block;
}
.hireordata {
	margin:0 0 5px 0;
}
.hireordata div {
	float:right;
}
.hiretotal {
	margin:10px 0 0 0;
	color:#144D5C;
	border-top:1px solid #ddd;
	padding:10px 0 0 0;
}
.smalltext {
	font-size:12px;
}
.Stile1 {
	font-size: 18px;
	font-weight: bold;
}
.Stile2 {
	font-size: 18px;
}
.Stile7 {color: #009900;}
.confirmed {color: #009900;}
.standby {color: #ff0000;}
.Stile9 {font-size: 14px; }
.Stile10 {font-size: 14px;font-weight: bold;}
.Stile12 {font-size: 14px;font-weight: bold; }
.Stile16 {font-size: 16px;}
-->
</style>
<p>{logo}</p>

<div class="container">
<p class="Stile1">{company_name}</p>
	<div class="statusorder">
		<div class="boxstatusorder"><span class="Stile1"><?php echo JText::_('VRCORDERNUMBER'); ?>: {order_id}</span></div>
		{confirmnumb_delimiter}<div class="boxstatusorder"><span class="Stile1"><?php echo JText::_('VRCCONFIRMATIONNUMBER'); ?>: {confirmnumb}</span></div>{/confirmnumb_delimiter}
		<div class="boxstatusorder"><span class="Stile1"><?php echo JText::_('VRLIBSEVEN'); ?>: <span class="{order_status_class}">{order_status}</span></span></div>
		<div class="boxstatusorder"><strong><?php echo JText::_('VRLIBEIGHT'); ?>:</strong>{order_date}</div>
	</div>
	<div class="persdetail">
		<h3 class="Stile1"><?php echo JText::_('VRLIBNINE'); ?>:</h3>
		{customer_info}
	</div>
	<div class="hiremainbox">
		<div class="hirecar clearfix">
			<p><span class="Stile1"><?php echo JText::_('VRLIBTEN'); ?>: {item_name}</span></p>
			<div class="hiredate">
				<p><span class="Stile12"><?php echo JText::_('VRLIBELEVEN'); ?>:</span>
				<span class="Stile9">{pickup_date}</span></p>
				<p><span class="Stile12"><?php echo JText::_('VRRITIROCAR'); ?>: </span>
				<span class="Stile9">{pickup_location}</span></p>
			</div>
			<div class="hiredate">
				<p><span class="Stile12"><?php echo JText::_('VRLIBTWELVE'); ?>: </span>
				<span class="Stile9">{dropoff_date}</span></p>
				<p><span class="Stile12"><?php echo JText::_('VRRETURNCARORD'); ?>:</span>
				<span class="Stile9">{dropoff_location}</span></p>
			</div>
		</div>
		<div class="hireorderdetail">
			<p><span class="Stile1"><?php echo JText::_('VRCORDERDETAILS'); ?>:</span></p>
			{order_details}
			<div class="hireordata hiretotal"><span class="Stile10"><?php echo JText::_('VRLIBSIX'); ?></span><div align="right"><strong>{order_total}</strong></div></div>
			{order_deposit}
			{order_total_paid}
		</div>
		<br/>
		<p><br/>
		<span class="smalltext">
		<strong><?php echo JText::_('VRLIBTENTHREE'); ?>:</strong><br/>
		{order_link}
		</span><br/>
		</p>
		<span class="smalltext">{footer_emailtext}</span>
	</div>
</div>
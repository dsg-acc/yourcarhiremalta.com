<?php
/** 
 * @package   	VikRentCar
 * @subpackage 	core
 * @author    	E4J s.r.l.
 * @copyright 	Copyright (C) 2018 E4J s.r.l. All Rights Reserved.
 * @license  	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @link 		https://vikwp.com
 */

// No direct access
defined('ABSPATH') or die('No script kiddies please!');

// include defines
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'defines.php';

/**
 * It is possible to inject debug=on or error_reporting=-1 in
 * query string to force the error reporting to MAXIMUM.
 */
if (VIKRENTCAR_DEBUG || (isset($_GET['debug']) && $_GET['debug'] == 'on') || (isset($_GET['error_reporting']) && (int)$_GET['error_reporting'] === -1))
{
	error_reporting(E_ALL);
	ini_set('display_errors', true);
}

// include internal loader if not exists
if (!class_exists('JLoader'))
{
	$loaded = require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'libraries' . DIRECTORY_SEPARATOR . 'adapter' . DIRECTORY_SEPARATOR . 'loader' . DIRECTORY_SEPARATOR . 'loader.php';

	// setup base path
	JLoader::$base = VIKRENTCAR_LIBRARIES;
}

// load framework dependencies
JLoader::import('adapter.acl.access');
JLoader::import('adapter.loader.utils');
JLoader::import('adapter.mvc.view');
JLoader::import('adapter.mvc.controller');
JLoader::import('adapter.factory.factory');
JLoader::import('adapter.html.html');
JLoader::import('adapter.http.http');
JLoader::import('adapter.input.input');
JLoader::import('adapter.input.request');
JLoader::import('adapter.output.filter');
JLoader::import('adapter.language.text');
JLoader::import('adapter.layout.helper');
JLoader::import('adapter.session.handler');
JLoader::import('adapter.application.route');
JLoader::import('adapter.application.version');
JLoader::import('adapter.uri.uri');
JLoader::import('adapter.toolbar.helper');
JLoader::import('adapter.editor.editor');
JLoader::import('adapter.date.date');
JLoader::import('adapter.event.dispatcher');
JLoader::import('adapter.event.pluginhelper');

// import internal loader
JLoader::import('loader.loader', VIKRENTCAR_LIBRARIES);

// load plugin dependencies
VikRentCarLoader::import('bc.error');
VikRentCarLoader::import('bc.mvc');
VikRentCarLoader::import('layout.helper');
VikRentCarLoader::import('system.body');
VikRentCarLoader::import('system.builder');
VikRentCarLoader::import('system.install');
VikRentCarLoader::import('system.screen');
VikRentCarLoader::import('system.feedback');
VikRentCarLoader::import('system.assets');
VikRentCarLoader::import('wordpress.application');

/**
 * include class JViewVikRentCar that extends JViewBaseVikRentCar
 * to provide methods for any view instances.
 */
VikRentCarLoader::registerAlias('view.vrc', 'viewvrc');
VikRentCarLoader::import('helpers.viewvrc', VRC_SITE_PATH);

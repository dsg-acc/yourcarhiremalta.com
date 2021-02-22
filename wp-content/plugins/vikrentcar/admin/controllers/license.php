<?php
/** 
 * @package   	VikRentCar
 * @subpackage 	core
 * @author    	E4J s.r.l.
 * @copyright 	Copyright (C) 2019 E4J s.r.l. All Rights Reserved.
 * @license  	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @link 		https://vikwp.com
 */

// No direct access
defined('ABSPATH') or die('No script kiddies please!');

JLoader::import('adapter.mvc.controllers.admin');

/**
 * VikRentCar plugin License controller.
 *
 * @since 	1.0
 * @see 	JControllerAdmin
 */
class VikRentCarControllerLicense extends JControllerAdmin
{
	/**
	 * License Key validation through ajax request.
	 * This task takes also the change-log for the current version.
	 *
	 * @return 	void
	 */
	public function validate()
	{
		if (!JFactory::getUser()->authorise('core.admin', 'com_vikrentcar'))
		{
			// not authorised to view this resource
			throw new Exception(JText::_('RESOURCE_AUTH_ERROR'), 403);
		}

		$input = JFactory::getApplication()->input;

		// get input key
		$key = $input->getString('key');

		// validate specified key
		if (!preg_match("/^[a-zA-Z0-9]{16,16}$/", $key))
		{
			throw new Exception(JText::_('VRCEMPTYLICKEY'), 400);
		}

		// update license hash
		VikRentCarLoader::import('update.license');
		$hash = VikRentCarLicense::getHash();

		// validation end-point
		$url = 'https://vikwp.com/api/?task=licenses.validate';

		// init HTTP transport
		$http = new JHttp();

		// build post data
		$data = array(
			'key'         => $key,
			'application' => 'vrc',
			'version'     => VIKRENTCAR_SOFTWARE_VERSION,
			'domain'      => JUri::root(),
			'ip'          => $_SERVER['REMOTE_ADDR'],
			'hash'        => $hash,
		);

		// make connection with VikWP server
		$response = $http->post($url, $data);

		if ($response->code != 200)
		{
			// raise error returned by VikWP
			throw new Exception($response->body, $response->code);
		}

		// try decoding JSON
		$body = json_decode($response->body);

		if (!$body || $body->status != 1)
		{
			throw new Exception(sprintf('Invalid response: %s', $response->body), 500);
		}

		// import necessary libraries
		VikRentCarLoader::import('update.changelog');
		VikRentCarLoader::import('update.license');

		// register values
		VikRentCarChangelog::store((isset($body->changelog) ? $body->changelog : ''));
		VikRentCarLicense::setKey($body->key);
		VikRentCarLicense::setExpirationDate(strtotime($body->expdate));

		echo $response->body;
		exit;
	}

	/**
	 * Downloads the PRO version from VikWP servers.
	 *
	 * @return 	void
	 */
	public function downloadpro()
	{
		if (!JFactory::getUser()->authorise('core.admin', 'com_vikrentcar'))
		{
			// not authorised to view this resource
			throw new Exception(JText::_('RESOURCE_AUTH_ERROR'), 403);
		}

		$input = JFactory::getApplication()->input;

		// get input key
		$key = $input->getString('key');

		// validate specified key
		if (!preg_match("/^[a-zA-Z0-9]{16,16}$/", $key))
		{
			throw new Exception(JText::_('VRCEMPTYLICKEY'), 400);
		}

		// update license hash
		VikRentCarLoader::import('update.license');
		$hash = VikRentCarLicense::getHash();

		JLoader::import('adapter.filesystem.folder');

		// get temporary dir
		$tmp = get_temp_dir();

		// clean temporary path
		$tmp = rtrim(JPath::clean($tmp), DIRECTORY_SEPARATOR);

		// make sure the folder exists
		if (!is_dir($tmp))
		{
			throw new Exception(sprintf('Temporary folder [%s] does not exist', $tmp), 404);
		}

		// make sure the temporary folder is writable
		if (!wp_is_writable($tmp))
		{
			throw new Exception(sprintf('Temporary folder [%s] is not writable', $tmp), 403);
		}

		// download end-point
		$url = 'https://vikwp.com/api/?task=licenses.download';

		// init HTTP transport
		$http = new JHttp();

		// build request headers
		$headers = array(
			// turn on stream to push body within a file
			'stream'   => true,
			// define the filepath in which the data will be pushed
			'filename' => $tmp . DIRECTORY_SEPARATOR . 'vikrentcarpro.zip',
			// make sure the request is non blocking
			'blocking' => true,
		);

		// build post data
		$data = array(
			'key'         => $key,
			'application' => 'vrc',
			'version'     => VIKRENTCAR_SOFTWARE_VERSION,
			'domain'      => JUri::root(),
			'ip'          => $_SERVER['REMOTE_ADDR'],
			'hash'        => $hash,
		);

		// make connection VikWP server
		$response = $http->post($url, $data, $headers, 60);

		if ($response->code != 200)
		{
			// raise error returned by VikWP
			throw new Exception($response->body, $response->code);
		}

		// make sure the file has been saved
		if (!JFile::exists($headers['filename']))
		{
			throw new Exception('ZIP package could not be saved on disk', 404);
		}

		// create destination folder for extracted elements
		$dest = $tmp . DIRECTORY_SEPARATOR . 'vikrentcar';

		// make sure the destination folder doesn't exist
		if (JFolder::exists($dest))
		{
			// remote it before proceeding with the extraction
			JFolder::delete($dest);
		}

		// import archive class handler
		JLoader::import('adapter.filesystem.archive');

		// the package was downloaded successfully, let's extract it (onto TMP folder)
		$extracted = JArchive::extract($headers['filename'], $tmp);

		// we no longer need the archive
		JFile::delete($headers['filename']);

		if (!$extracted)
		{
			// an error occurred while extracting the files
			throw new Exception(sprintf('Cannot extract files to [%s]', $tmp), 500);
		}

		// make sure the folder is intact
		if (!JFolder::exists($dest))
		{
			// impossible to access the extracted elements
			throw new Exception(sprintf('Cannot access extracted elements from [%s] folder', $dest), 404);
		}
		
		// copy the root files
		$root_files = JFolder::files($dest, '.', false, true);

		foreach ($root_files as $file)
		{
			if (!JFile::copy($file, VIKRENTCAR_BASE . DIRECTORY_SEPARATOR . basename($file)))
			{
				// delete folder before throwing the exception
				JFolder::delete($dest);

				// we cannot afford to not be able to copy a root file
				throw new Exception(sprintf('Cannot copy root [%s] file', basename($file)), 500);
			}
		}

		// copy the root folders
		$root_folders = JFolder::folders($dest, '.', false, true);

		foreach ($root_folders as $folder)
		{
			if (!JFolder::copy($folder, VIKRENTCAR_BASE . DIRECTORY_SEPARATOR . basename($folder), '', true))
			{
				// delete folder before throwing the exception
				JFolder::delete($dest);

				// we cannot afford to not be able to copy a root folder
				throw new Exception(sprintf('Cannot copy root [%s] folder', basename($folder)), 500);
			}
		}

		// process complete, clean up the temporary folder before exiting
		JFolder::delete($dest);

		// restore template files that could have been overwritten by the Pro package
		VikRentCarLoader::import('update.manager');
		VikRentCarUpdateManager::restoreTemplateFiles();
		
		echo 'e4j.OK';
		exit;
	}
}

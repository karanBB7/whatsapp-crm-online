<?php
/* * *******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
 * ****************************************************************************** */
include_once('vtlib/Vtiger/Unzip.php');
class Settings_CTWhatsApp_UpdateWhatsappModule_View extends Settings_Vtiger_Index_View {

	function __construct() {
		parent::__construct();
		$this->exposeMethod('updateWhatsappModule');
	}

	function process(Vtiger_Request $request) {
		$mode = $request->get('mode');
		if(!empty($mode)) {
			$this->invokeExposedMethod($mode, $request);
			return;
		}
	}

	function updateWhatsappModule(Vtiger_Request $request) {
		global $site_URL, $root_directory;
		$zipUrl = 'http://whatsappsocket.crmtiger.com/whatsappmodulezip/CTWhatsApp.zip';
		$downloadedFileContents = file_get_contents($zipUrl);
		mkdir($root_directory."/ZipFile/", 0755);
		$destinationPath = $root_directory."/ZipFile/CTWhatsapp.zip"; 
		chmod($root_directory."/ZipFile/CTWhatsapp.zip",0755);
		chmod($root_directory."/ZipFile/",0777);
		file_put_contents($destinationPath, $downloadedFileContents);
		
		$package = new Vtiger_Package();
		if(!getTabid('CTWhatsApp')){
			$package->import($root_directory."/ZipFile/CTWhatsapp.zip",true);
		}else{
			$package->update(Vtiger_Module::getInstance('CTWhatsApp'),$root_directory."/ZipFile/CTWhatsapp.zip");
		}
		$array = array('CTWhatsApp');
		foreach ($array as $key => $value) {
			$path  = $root_directory.'/modules/'.$value;
    		chmod($path, 0777);
    		$path  = $root_directory.'/modules/Settings/'.$value;
    		chmod($path, 0777);
    		$path  = $root_directory.'/layouts/v7/modules/'.$value;
    		chmod($path, 0777);
    		$path  = $root_directory.'/layouts/v7/modules/Settings/'.$value;
    		chmod($path, 0777);
        }
		$response = new Vtiger_Response();
		$response->setResult(array('code'=>1,'message'=>'Your Version updated successfully'));
		$response->emit();
	}
}

<?php
/*+*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ***************************************************************************** */

class Settings_CTWhatsApp_LicenseEdit_View extends Settings_Vtiger_Index_View {
    
    public function process(Vtiger_Request $request){
		global $adb, $current_user;
		$currenUserID = $current_user->id;
        $viewer = $this->getViewer($request);
        $qualifiedName = $request->getModule(false);
        $getLicenseDetail = CTWhatsApp_DashBoard_View::getLicenseDetail();
		$license_key = $getLicenseDetail['licenseKey'];
		
		$configurationData = Settings_CTWhatsApp_Record_Model::getUserConfigurationDataWithId();
		$api_key = Settings_CTWhatsApp_ConfigurationEdit_View::encrypt_decrypt($configurationData['api_url']);
		$auth_token = $configurationData['authtoken'];
		
        $viewer->assign('LICENCE_KEY',$license_key);
        $viewer->assign('API_KEY',$api_key);
        $viewer->assign('AUTH_TOKEN',$auth_token);
        $viewer->assign('MODULE',$qualifiedName);
        $viewer->view('LicenseEdit.tpl',$qualifiedName);
    }
		
   	function getHeaderScripts(Vtiger_Request $request) {
		$headerScriptInstances = parent::getHeaderScripts($request);
		$moduleName = $request->getModule();

		$jsFileNames = array(
			"modules.Settings.$moduleName.resources.CTWhatsApp",
		);

		$jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
		$headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);
		return $headerScriptInstances;
    }
}
    

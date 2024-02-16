<?php
/*+**********************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
 ************************************************************************************/

 class Settings_CTWhatsApp_WhatsAppUserList_View extends Settings_Vtiger_Index_View {

    public function process(Vtiger_Request $request) {
    	global $adb, $current_user;
        $currenUserID = $current_user->id;
    	$qualifiedModuleName = $request->getModule(false);
    	$getUserConfigurations = Settings_CTWhatsApp_Record_Model::getAllUserConfiguration();
        $adminconfigData = Settings_CTWhatsApp_Record_Model::getUserConfigurationDataWithId();
        $whatsappManagement = $adminconfigData['whatsappManagement'];
        $configureUserid = $adminconfigData['configureUserid'];

        $dayRemain = "";
        $getLicenseDetail = CTWhatsApp_DashBoard_View::getLicenseDetail();
        $expirydate = $getLicenseDetail['expiryDate'];
        $license_key = $getLicenseDetail['licenseKey'];
        $licensefield2 = $getLicenseDetail['licensefield2'];
        $expirydate = Settings_CTWhatsApp_ConfigurationDetail_View::encrypt_decrypt($expirydate,'d');
        $today = date('Y-m-d');
        if(strtotime($expirydate) >= strtotime($today)){
            $diff = strtotime($expirydate) - strtotime($today);
            $dayRemain = abs(round($diff / 86400));
        }else{
            $dayRemain = 0;
        }
        $licenseAction = CTWhatsApp_Record_Model::getWhatsappAccountDetail($license_key);
        $latestversion = $licenseAction->latestversion;

        $licenseDetailURL = 'index.php?parent=Settings&module=CTWhatsApp&view=LicenseDetail';
        $editURL = 'index.php?parent=Settings&module=CTWhatsApp&view=ConfigurationEdit&userid='.$configureUserid;

    	$viewer = $this->getViewer($request);
    	$viewer->assign('MODULE', $qualifiedModuleName);
		$viewer->assign('QUALIFIED_MODULE', $qualifiedModuleName);
		$viewer->assign('WHATSAPPUSERS', $getUserConfigurations);
        $viewer->assign('CURRENTUSERID', $currenUserID);
        $viewer->assign('DAYREMAINING', $dayRemain);
        $viewer->assign('LICENSEDETAILURL', $licenseDetailURL);
        $viewer->assign('EDITURL', $editURL);
        $viewer->assign('WHATSAPPMANAGEMENT', $whatsappManagement);
        $viewer->assign('LICENSEACTION', $licenseAction->type);
        $viewer->assign('CURRENTVERSION', $licensefield2);
        $viewer->assign('LATESTVERSION', $latestversion);
        
		$currentdate = date('Y-m-d');
        if(strtotime($expirydate) >= strtotime($currentdate)){
            $viewer->view('WhatsAppUserList.tpl', $qualifiedModuleName);
        }else{
            header("Location: index.php?parent=Settings&module=CTWhatsApp&view=LicenseEdit");
        }
	}

    /**
     * Function to get the list of Script models to be included
     * @param Vtiger_Request $request
     * @return <Array> - List of Vtiger_JsScript_Model instances
     */
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

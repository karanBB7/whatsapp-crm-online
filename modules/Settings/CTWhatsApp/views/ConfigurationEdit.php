<?php
/*+**********************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
 ************************************************************************************/

 class Settings_CTWhatsApp_ConfigurationEdit_View extends Settings_Vtiger_Index_View {

    public function process(Vtiger_Request $request) {
		global $adb;
		$qualifiedModuleName = $request->getModule(false);
		$whatsappUserId = $request->get('userid');
		$whatsappmultiple = $request->get('whatsappmultiple');
		$addMoreUser = $request->get('addMoreUser');
		$currentdate = date('Y-m-d');
		$getLicenseDetail = CTWhatsApp_DashBoard_View::getLicenseDetail();
		$expirydate = $getLicenseDetail['expiryDate'];
		$date = Settings_CTWhatsApp_ConfigurationDetail_View::encrypt_decrypt($expirydate, $action='d');

		$configurationData = Settings_CTWhatsApp_Record_Model::getUserConfigurationDataWithId();
		$api_url = $configurationData['api_url'];
		$api_url=Settings_CTWhatsApp_LicenseDetail_View::encrypt_decrypt($api_url);
		$auth_token = $configurationData['authtoken'];
		$customfield1 = $configurationData['customfield1'];
		$customfield2 = $configurationData['customfield2'];
		$whatsappno = $configurationData['whatsappno'];
		$showunknownmsg = $configurationData['showunknownmsg'];
		$inAppNotification = $configurationData['inapp_notification'];//In App Notification
		if($configurationData['users_groups']){
			$users_groups = explode(',', $configurationData['users_groups']);
		}else{
			$users_groups = '';
		}
		$iconactive = $configurationData['iconactive'];
		$theme_view = $configurationData['theme_view'];
		$whatsappstatus = $configurationData['whatsappstatus'];

		$autoResponder = $configurationData['autoResponder'];
		$autoResponderText = $configurationData['autoResponderText'];

		//Add new functionality
		if($configurationData['allocatedWhatsappUser']){
			$allocatedWhatsappUser = explode(',', $configurationData['allocatedWhatsappUser']);
		}else{
			$allocatedWhatsappUser = '';
		}

		$allocateWhatsappUser = array();
		foreach ($allocatedWhatsappUser as $key => $value) {
			$allocateWhatsappUser[$value] = $value;
		}

		$whatsappManagement = $configurationData['whatsappManagement'];
		$whatsapplog = $configurationData['whatsapplog'];
		$notificationtone = $configurationData['notificationtone'];
		$notification = $configurationData['notification'];
		$configureUserid = $configurationData['configureUserid'];
		$botidealtime = $configurationData['botidealtime'];
		//Add new functionality

		$allModules = Vtiger_Menu_Model::getAll(true);
		$modules = array();
		foreach ($allModules as $key => $value) {
			$modules[$key] = $key;			
		}

		$users_groupsdata = array();
		foreach ($users_groups as $key => $value) {
			$users_groupsdata[$value] = $value;
		}

		$allowmodules = Settings_CTWhatsApp_Record_Model::getAllowModules();

		$recordModel = Vtiger_Record_Model::getCleanInstance("Contacts");
		$recordStructureInstance = Vtiger_RecordStructure_Model::getInstanceFromRecordModel($recordModel, Vtiger_RecordStructure_Model::RECORD_STRUCTURE_MODE_EDIT);

		$batch = array(5,10,15,20,25);
		$timeInterval = array(1,5,10,15,20,25);

		$inAppNotificationArray = array(2,3,4,5,10,25);//In App Notification
		$getMassBatchConfiguration = Settings_CTWhatsApp_ConfigurationDetail_View::getMassBatchConfigurationData();
		$selectBatch = $getMassBatchConfiguration['batch'];
		$selectTimeInterval = $getMassBatchConfiguration['timeInterval'];


		$getMainSubUser = Settings_CTWhatsApp_Record_Model::getMainSubUsers();
		$manualDataTime = array(5,10,15,20,25,30,35,40,45,50,55,60);

		$massMessageAccessUsers = Settings_CTWhatsApp_Record_Model::getMassMessageAccessUsers();

    	$viewer = $this->getViewer($request);
    	$viewer->assign('MODULE', $qualifiedModuleName);
		$viewer->assign('QUALIFIED_MODULE', $qualifiedModuleName);
		$viewer->assign('APIURL', $api_url);
		$viewer->assign('AUTHTOKEN', $auth_token);
		$viewer->assign('CUSTOMFIELD1', $customfield1);
		$viewer->assign('CUSTOMFIELD2', $customfield2);
		$viewer->assign('WHATSAPPNO', $whatsappno);
		$viewer->assign('ALLLOWMODULES', $allowmodules);
		$viewer->assign('ALLOW_WHATSAPP_MODULES', $modules);
		$viewer->assign('RECORD_STRUCTURE_MODEL', $recordStructureInstance);
		$viewer->assign('RECORD_STRUCTURE', $recordStructureInstance->getStructure());
		$viewer->assign('USERSGROUPS', $users_groupsdata);
		$viewer->assign('ICONACTIVE', $iconactive);
		$viewer->assign('SHOWUNKNOWNMSG', $showunknownmsg);
		$viewer->assign('THEME', $theme_view);
		$viewer->assign('WHATSAPPSTATUS', $whatsappstatus);
		$viewer->assign('INAPPNOTIFICATION', $inAppNotification);//In App Notification
		$viewer->assign('INAPPNOTIFICATIONARRAY', $inAppNotificationArray);//In App Notification
		$viewer->assign('ALLBATCH', $batch);
		$viewer->assign('ALLTIMEINTERVAL', $timeInterval);
		$viewer->assign('SELECTBATCH', $selectBatch);
		$viewer->assign('SELECTTIMEINTERVAL', $selectTimeInterval);

		$viewer->assign('AUTORESPONDER', $autoResponder);
		$viewer->assign('AUTORESPONDERTEXT', $autoResponderText);

		$viewer->assign('WHATSAPPMANAGEMENT', $whatsappManagement);
		$viewer->assign('ALLOCATEDWHATSAPPUSERS', $allocateWhatsappUser);
		$viewer->assign('MAINSUBUSERS', $getMainSubUser);
		$viewer->assign('WHATSAPPMULTIPLE', $whatsappmultiple);
		$viewer->assign('ADDMOREUSERS', $addMoreUser);
		$viewer->assign('WHATSAPPLOG', $whatsapplog);
		$viewer->assign('NOTIFICATIONTON', $notificationtone);
		$viewer->assign('WHATSAPPNOTIFICATION', $notification);
		$viewer->assign('CONFIGURATIONUSERID', $configureUserid);
		$viewer->assign('MANUALDATETIME', $manualDataTime);
		$viewer->assign('BOTDEALTIME', $botidealtime);
		$viewer->assign('MASSMESSAGEACCESSUSERS', $massMessageAccessUsers);

		if(strtotime($date) > strtotime($currentdate)){
			$viewer->view('ConfigurationEdit.tpl', $qualifiedModuleName);
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

	public function encrypt_decrypt( $string, $action = 'e' ) {
		// you may change these values to your own
		$secret_key = 'variance12*';
		$secret_iv = 'variance12*';

		$output = false;
		$encrypt_method = "AES-256-CBC";
		$key = hash( 'sha256', $secret_key );
		$iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

		if( $action == 'e' ) {
		$output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
		}
		else if( $action == 'd' ){
		$output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
		}

		return $output;
	}
}

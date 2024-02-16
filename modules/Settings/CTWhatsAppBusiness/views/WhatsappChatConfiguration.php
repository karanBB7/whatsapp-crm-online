<?php
/* * *******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
 * ****************************************************************************** */

class Settings_CTWhatsAppBusiness_WhatsappChatConfiguration_View extends Settings_Vtiger_Index_View {

	function __construct() {
		parent::__construct();
		$this->exposeMethod('getModuleFields');
		$this->exposeMethod('updateAuthenticationCode');
		$this->exposeMethod('getWhatsappStatus');
		$this->exposeMethod('deleteWhatsAppUsers');
		$this->exposeMethod('updateUserActiveInctive');
		$this->exposeMethod('addMultipleWhatsAppNumberPopup');
		$this->exposeMethod('saveMultilpeUserGroupWhatsapp');
		$this->exposeMethod('deleteMultipleWhatsAppNumber');
		$this->exposeMethod('checkMultipleUserWhatsapp');
		$this->exposeMethod('getWhatsappGroups');
		$this->exposeMethod('getScanWhatsappNumbers');
		$this->exposeMethod('addNewWPFieldPopup');
		$this->exposeMethod('saveWPField');
		$this->exposeMethod('logoutAllWhatsAppUser');
	}

	function process(Vtiger_Request $request) {
		$mode = $request->get('mode');
		if(!empty($mode)) {
			$this->invokeExposedMethod($mode, $request);
			return;
		}
	}

	function getModuleFields(Vtiger_Request $request) {
		global $adb;
		$moduleName = $request->getModule();
		$select_module = $request->get('select_module');
		$tabid = getTabid($select_module);

		$whatsaappModuleData = CTWhatsAppBusiness_Record_Model::getWhatsappAllowModuleFields($select_module);
		$phone_field = $whatsaappModuleData['phoneField'];
		$active = $whatsaappModuleData['moduleIconActive'];
		$rows = $whatsaappModuleData['rows'];

		$moduleModel = Vtiger_Module_Model::getInstance($select_module);
		$fields = $moduleModel->getFields();
		$fieldsData = '';
		foreach ($fields as $key => $value) {
			$fieldlabel = $value->label;
			$fieldname = $value->name;
			if($fieldname == $phone_field){
				$fieldsData .= '<option value="'.$value->name.'" selected>'.vtranslate($value->label, $select_module).'</option>';
			}else{
				$fieldsData .= '<option value="'.$value->name.'">'.vtranslate($value->label, $select_module).'</option>';
			}
		}

		$response = new Vtiger_Response();
		$response->setResult(array('picklist' => $fieldsData, 'active' => $active, 'rows' => $rows));
		$response->emit();
	}
	
	function updateAuthenticationCode(Vtiger_Request $request) {
		$updateAuthAuthentication = CTWhatsAppBusiness_Record_Model::updateAuthCode($request);
	}
	
	function getWhatsappStatus(Vtiger_Request $request) {
		$whatsappuseid = $request->get('whatsappuseid');
		if($whatsappuseid == ''){
			global $current_user;
			$whatsappuseid = $current_user->id;
		}
		$whatsappStatusData = Settings_CTWhatsAppBusiness_Record_Model::getUserConfigurationAllDataWithId($whatsappuseid);
		
		$response = new Vtiger_Response();
		$response->setResult(array('whatsappStatus' => $whatsappStatusData['whatsappstatus'], 'whatsappno' => $whatsappStatusData['whatsappno']));
		$response->emit();
	}

	function deleteWhatsAppUsers(Vtiger_Request $request){
		$whatsappUserId = $request->get('userid');
		$configurationData = Settings_CTWhatsAppBusiness_Record_Model::getUserConfigurationAllDataWithId($whatsappUserId);
		$apiUrl = $configurationData['api_url'];
		$auth_token = $configurationData['authtoken'];

		$logoutURL = $apiUrl.'/disconnect';
		$curlLogout = curl_init();
		curl_setopt_array($curlLogout, array(
			CURLOPT_URL => $logoutURL,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 10,
			CURLOPT_CONNECTTIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_USERAGENT=>'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
			CURLOPT_POSTFIELDS => '',
			CURLOPT_HTTPHEADER => array(
		    	'Authorization: '.$auth_token
		  	),
		));
		$resultLogout = curl_exec($curlLogout);
		$responseLogout = json_decode($resultLogout);
		curl_close($curlLogout);

		CTWhatsAppBusiness_Record_Model::updateWhatsAppSatatus($whatsappUserId);

		global $adb;
        $getOtherUsers = $adb->pquery("SELECT * FROM vtiger_users2group WHERE userid = ?", array($whatsappUserId));
        $groupid = $adb->query_result($getOtherUsers, 0, 'groupid');
        CTWhatsAppBusiness_Record_Model::updateWhatsAppSatatus($groupid);
        $getGroupUsers = $adb->pquery("SELECT * FROM vtiger_users2group WHERE groupid = ?", array($groupid));
        $numRows = $adb->num_rows($getGroupUsers);
        for ($i=0; $i < $numRows; $i++) { 
            $userid = $adb->query_result($getGroupUsers, $i, 'userid');
            CTWhatsAppBusiness_Record_Model::updateWhatsAppSatatus($userid);
        }
		header("Location: index.php?module=CTWhatsAppBusiness&parent=Settings&view=WhatsAppUserList");
	}

	function updateUserActiveInctive(Vtiger_Request $request){
		Settings_CTWhatsAppBusiness_Record_Model::updateActiveInctive($request);	
	}

	public function addMultipleWhatsAppNumberPopup(Vtiger_Request $request){
		global $adb, $current_user;
		$moduleName = $request->getModule();
		$qualifiedModuleName = $request->getModule(false);
		//$userid = $request->get('userid');
		$newUser = $request->get('newUser');
		if($newUser != 'Yes'){
			$userid = $current_user->id;
		}

		if($userid){
			$query = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusiness_user_groups WHERE userid = ?", array($userid));
			//$userid = $adb->query_result($query, $i, 'userid');
            $multiple_userid = explode(',', $adb->query_result($query, $i, 'multiple_userid'));
            foreach ($multiple_userid as $key => $value) {
            	$allUser[$value] = $value;
            }
            $active = $adb->query_result($query, $i, 'active');
            $whatsappbot = $adb->query_result($query, $i, 'whatsappbot');

			$configurationData = Settings_CTWhatsAppBusiness_Record_Model::getUserConfigurationAllDataWithId($userid);
			$whatsappAppid = $configurationData['whatsappAppid'];
			$whatsappAccountid = $configurationData['whatsappAccountid'];
			$authToken = $configurationData['authtoken'];
			$whatsappno = $configurationData['whatsappno'];
			$whatsapp_businessnumber = $configurationData['whatsapp_businessnumber'];
		}

		$viewer = $this->getViewer($request);
		$viewer->assign('MODULE',$qualifiedModuleName);
		$viewer->assign('USERID',$userid);
		$viewer->assign('MULTIPLEUSERS',$allUser);
		$viewer->assign('ACTIVE',$active);
		$viewer->assign('WHATSAPPBOT',$whatsappbot);
		$viewer->assign('WHATSAPP_APPID',$whatsappAppid);
		$viewer->assign('WHATSAPP_ACCOINTID',$whatsappAccountid);
		$viewer->assign('WHATSAPP_ACCESS_TOKEN',$authToken);
		$viewer->assign('WHATSAPP_NO',$whatsappno);
		$viewer->assign('WHATSAPPBUSINESS_NO',$whatsapp_businessnumber);
		$viewer->assign('NEWUSER',$newUser);
		$viewer->assign('USER_MODEL', Users_Record_Model::getCurrentUserModel());
		echo $viewer->view('AddMultipleWhatsAppNumberPopup.tpl', $qualifiedModuleName, true);
	}

	public function saveMultilpeUserGroupWhatsapp(Vtiger_Request $request){
		global $adb;
		$moduleName = $request->getModule();
		$qualifiedModuleName = $request->getModule(false);
		$active = $request->get('active');
		if($active == 'on'){
			$active = 1;
		}else{
			$active = 0;
		}
		$whatsappbot = $request->get('whatsappbot');
		if($whatsappbot == 'on'){
			$whatsappbot = 1;
		}else{
			$whatsappbot = 0;
		}

		$mainuser = $request->get('mainuser');
		$subusers = implode(',', $request->get('subusers'));
		$adminUserData = Settings_CTWhatsAppBusiness_Record_Model::getUserConfigurationDataWithId();
		$api_url = $adminUserData['api_url'];
		$apiurl = $adminUserData['api_url'];
	    $authToken = $adminUserData['authtoken'];
	    $customfield1 = $adminUserData['customfield1'];
	    $customfield2 = $adminUserData['customfield2'];
	    $whatsappnos = $adminUserData['whatsappno'];
	    $iconactive = $adminUserData['iconactive'];
	    $showunknownmsg = $adminUserData['showunknownmsg'];
	    $theme_view = $adminUserData['theme_view'];
	    $users_groups = $adminUserData['users_groups'];
	    $whatsappStatus = $adminUserData['whatsappstatus'];
	    $inapp_notification = $adminUserData['inapp_notification'];
	    $allocatedWhatsappUser = $adminUserData['allocatedWhatsappUser'];
	    $whatsappManagement = $adminUserData[']whatsappManagement'];
	    $configureUserid = $adminUserData['configureUserid'];
	    $autoResponder = $adminUserData['autoResponder'];
	    $autoResponderText = $adminUserData['autoResponderText'];

	    $selectUSerQuery = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusinessusers WHERE customfield5 = ?", array($mainuser));
	    $rows = $adb->num_rows($selectUSerQuery);
	    if($rows == 1){
	    	$adb->pquery("DELETE FROM vtiger_ctwhatsappbusinessusers WHERE customfield5 = ?", array($mainuser));
	    	$adb->pquery("DELETE FROM vtiger_ctwhatsappbusiness_user_groups WHERE userid = ?", array($mainuser));
	    }

	    if($mainuser){
	    	if($rows == 1){
	    		$authToken = $adb->query_result($selectUSerQuery, 0, 'auth_token');
		    	//$whatsappnos = $adb->query_result($selectUSerQuery, 0, 'whatsappno');
		    	$whatsappStatus = $adb->query_result($selectUSerQuery, 0, 'whatsappstatus');
	    	}else{
		    	$getSelectUserData = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusinessconfiguration WHERE customfield5 = ?", array($mainuser));
		    	$api_url = $adb->query_result($getSelectUserData, 0, 'api_url');
		    	$authToken = $adb->query_result($getSelectUserData, 0, 'auth_token');
		    	//$whatsappnos = $adb->query_result($getSelectUserData, 0, 'whatsappno');
		    	$whatsappStatus = $adb->query_result($getSelectUserData, 0, 'whatsappstatus');
	    	}
	    	if($api_url == ''){
	    		$api_url = $apiurl;
	    	}
	    	if($whatsappStatus == ''){
	    		$whatsappStatus = 0;
	    	}

	    	$whatsapp_appid = $request->get('whatsapp_appid');
	    	$whatsapp_accountid = $request->get('whatsapp_accountid');
	    	$authToken = $request->get('access_token');
	    	$whatsappnos = $request->get('whatsappno');
	    	$whatsapp_businessnumber = str_replace(' ', '', $request->get('whatsapp_businessnumber'));;
	    	
	    	$api_url = 'https://graph.facebook.com/v15.0/';

			/*$sendmessageUrl = $api_url.$whatsappnos.'/messages';
	    	$language = array("code" => "en_US");
	    	$postfields = array('messaging_product' => "whatsapp",
	    						'to' => "919276351017",
	    						'type' => "template",
	    						'template' => array('name' => "hello_world", 
	    											'language' => $language),
	    						);

	    	$sentTestMessage = CTWhatsAppBusiness_WhatsappChat_View::callCURL($sendmessageUrl, $postfields, $authToken);
	    	$messagesid = $sentTestMessage['messages'][0]['id'];
	    	if($messagesid){*/
				$insertMainUserQuery = $adb->pquery("INSERT INTO vtiger_ctwhatsappbusinessusers(api_url, auth_token, customfield1, customfield2, whatsappno, users_groups,iconactive, showunknownmsg, theme_view, whatsappstatus, customfield3, customfield4, customfield5, customfield6, inapp_notification, customfield7, whatsapp_appid, whatsapp_accountid, whatsapp_businessnumber) VALUES ('".$api_url."', '".$authToken."', '".$customfield1."', '', '".$whatsappnos."', '', '1', '', '', '1', '', '', '".$mainuser."','','','', '".$whatsapp_appid."', '".$whatsapp_accountid."', '".$whatsapp_businessnumber."')", array());

				$insertSubUserQuery = $adb->pquery("INSERT INTO vtiger_ctwhatsappbusiness_user_groups(userid, multiple_userid, active, whatsappbot) VALUES (?,?,?,?)", array($mainuser, $subusers, $active, $whatsappbot));
	    	/*}*/
	    }
	}
	
	public function deleteMultipleWhatsAppNumber(Vtiger_Request $request){
		global $adb;
		$moduleName = $request->getModule();
		$qualifiedModuleName = $request->getModule(false);
		$userid = $request->get('userid');

		$getUserDetailQuery = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusinessusers WHERE 	customfield5 = ?", array($userid));
		$apiUrl = $adb->query_result($getUserDetailQuery, 0, 'api_url');
		$auth_token = $adb->query_result($getUserDetailQuery, 0, 'auth_token');
		
		$logoutURL = $apiUrl.'/disconnect';
		$curlLogout = curl_init();
		curl_setopt_array($curlLogout, array(
			CURLOPT_URL => $logoutURL,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 10,
			CURLOPT_CONNECTTIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_USERAGENT=>'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
			CURLOPT_POSTFIELDS => '',
			CURLOPT_HTTPHEADER => array(
		    	'Authorization: '.$auth_token
		  	),
		));
		$resultLogout = curl_exec($curlLogout);
		$responseLogout = json_decode($resultLogout);
		curl_close($curlLogout);

		$adb->pquery("DELETE FROM vtiger_ctwhatsappbusinessusers WHERE customfield5 = ?", array($userid));
    	$adb->pquery("DELETE FROM vtiger_ctwhatsappbusiness_user_groups WHERE userid = ?", array($userid));
	}

	public function checkMultipleUserWhatsapp(Vtiger_Request $request){
		global $adb;
		$moduleName = $request->getModule();
		$qualifiedModuleName = $request->getModule(false);
		$whatsappUserId = $request->get('whatsappUserId');
		$query = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusiness_user_groups WHERE userid = ?", array($whatsappUserId));
		$row = $adb->num_rows($query);
		if($row == 0){
			$query = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusiness_user_groups", array());
			$row1 = $adb->num_rows($query);
			for ($i=0; $i < $row1; $i++) { 
				$multiple_userid = $adb->query_result($query, $i, 'multiple_userid');
				$allUserId = explode(',', $multiple_userid);
				$existGroup = in_array($whatsappUserId, $allUserId);
				
				if(in_array($whatsappUserId, $allUserId)){
					$row = 1;
					break;
				}
			}
		}

		if($row1 == 0 && $row1 == ''){
			$queryGetGroupId = $adb->pquery("SELECT * FROM vtiger_users2group WHERE userid = ?", array($whatsappUserId));
			$rows = $adb->num_rows($queryGetGroupId);
			for ($i=0; $i < $rows; $i++) { 
				$groupid = $adb->query_result($queryGetGroupId, $i, 'groupid');
				
				$query1 = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusiness_user_groups", array());
				$row1 = $adb->num_rows($query1);
				for ($j=0; $j < $row1; $j++) { 
					$multiple_userid = $adb->query_result($query1, $j, 'multiple_userid');
					$allUserId = explode(',', $multiple_userid);
					
					$existGroup = in_array($groupid, $allUserId);
					
					if(in_array($groupid, $allUserId)){
						$row = 1;
						break;
					}
				}
			}
		}
		echo $row;
	}

	public function getScanWhatsappNumbers(Vtiger_Request $request){
		$getUserConfigurations = Settings_CTWhatsAppBusiness_Record_Model::getAllUserConfiguration();
		
		$whatsappNumbers = "<option value=''></option>";
		foreach ($getUserConfigurations as $key => $value) {
			if($value['whatsappstatus'] == 1 || $value['whatsappstatus'] == 2){
				if($value['whatsappno'] != ''){
					$whatsappNumbers .= "<option value='".$value['whatsappno']."'>".$value['username'].'('.$value['whatsappno'].")</option>";
				}
			}
		}
		echo $whatsappNumbers;
	}

	public function getWhatsappGroups(Vtiger_Request $request){
		global $current_user, $adb;
		$whatsappNumbers = $request->get('whatsappNumbers');
		$currentUserID = $current_user->id;
        $configurationData = Settings_CTWhatsAppBusiness_Record_Model::getUserConfigurationAllDataWithId($currentUserID);
        $getConfigurationDataQuery = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusinessusers WHERE whatsappno = ?", array($whatsappNumbers));
		$whatsaAppRows = $adb->num_rows($getConfigurationDataQuery);
		if($whatsaAppRows == 0){
			$getConfigurationDatasQuery = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusinessconfiguration WHERE whatsappno = ?", array($whatsappNumbers));
			$whatsaAppRow = $adb->num_rows($getConfigurationDatasQuery);
			if($whatsaAppRow == 1){
				$apiUrl = $adb->query_result($getConfigurationDatasQuery, 0, 'api_url');
				$authToken = $adb->query_result($getConfigurationDatasQuery, 0, 'auth_token');
			}
		}else{
			$apiUrl = $adb->query_result($getConfigurationDataQuery, 0, 'api_url');
			$authToken = $adb->query_result($getConfigurationDataQuery, 0, 'auth_token');
		}

		$url = $apiUrl.'/chatlist';
		
		$postfields = array(
			//'number' => $whatsappNumbers
		);
		if($whatsappNumbers){
			$getAllGroups = CTWhatsAppBusiness_WhatsappChat_View::callCURL($url, $postfields, $authToken);
		}

		$groupOption = '<option value="">Select WhatsApp Group</option>';
		foreach ($getAllGroups as $key => $value) {
			$jid = explode('@', $value['id']);
			if($jid[1] == 'g.us'){
				$label = $value['name'];
				$groupid = $value['id'];
				if($label){
					$groupOption .= "<option value=,".$groupid.">".$label."</option>";
				}
			}
		}
		echo $groupOption;
	}

	public function addNewWPFieldPopup(Vtiger_Request $request){
		global $adb;
		$moduleName = $request->getModule();
		$qualifiedModuleName = $request->getModule(false);

		$allModules = Vtiger_Menu_Model::getAll(true);
		$allowWhatsAppModules = array();
		foreach ($allModules as $key => $value) {
			$allowWhatsAppModules[$key] = $key;			
		} 
		
		$viewer = $this->getViewer($request);
		$viewer->assign('QUALIFIED_MODULE',$qualifiedModuleName);
		$viewer->assign('ALLOW_WHATSAPP_MODULES',$allowWhatsAppModules);
		echo $viewer->view('AddNewWPFieldPopup.tpl', $qualifiedModuleName, true);
	}

	public function saveWPField(Vtiger_Request $request){
		global $adb;
		$moduleName = $request->getModule();
		$qualifiedModuleName = $request->getModule(false);
		$select_module = $request->get('select_module');
		$phone_field = $request->get('phone_field');
		$whatsappActive = $request->get('whatsappActive');

		$query = $adb->pquery("SELECT * FROM vtiger_ctwharsappallow_whatsappmodule WHERE module = ?", array($select_module));
		$row = $adb->num_rows($query);
		if($row == 1){
			$adb->pquery("DELETE FROM vtiger_ctwharsappallow_whatsappmodule WHERE module = ?", array($select_module));
		}
		$adb->pquery("INSERT INTO vtiger_ctwharsappallow_whatsappmodule(module, phone_field, active) VALUES (?,?,?)", array($select_module, $phone_field, $whatsappActive));
	}

	public function logoutAllWhatsAppUser(Vtiger_Request $request){
		global $adb;
		$moduleName = $request->getModule();
		$qualifiedModuleName = $request->getModule(false);
		$whatsappManagement = $request->get('whatsappManagement');
		$adb->pquery("UPDATE vtiger_ctwhatsappbusinessconfiguration SET whatsappstatus = 0, customfield4 = ?", array($whatsappManagement));
		if($whatsappManagement == 'singleWhatsapp'){
			$query = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusinessconfiguration");
			$auth_token = $adb->query_result($query, 0, 'auth_token');
			$apiUrl = $adb->query_result($query, 0, 'api_url');

			$logoutURL = $apiUrl.'/disconnect';
			$curlLogout = curl_init();
			curl_setopt_array($curlLogout, array(
				CURLOPT_URL => $logoutURL,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 10,
				CURLOPT_CONNECTTIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_SSL_VERIFYHOST => 0,
				CURLOPT_SSL_VERIFYPEER => 0,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_USERAGENT=>'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
				CURLOPT_POSTFIELDS => '',
				CURLOPT_HTTPHEADER => array(
			    	'Authorization: '.$auth_token
			  	),
			));
			$resultLogout = curl_exec($curlLogout);
			$responseLogout = json_decode($resultLogout);
			curl_close($curlLogout);
			$adb->pquery("DELETE FROM vtiger_ctwhatsappbusiness_user_groups");
			$adb->pquery("DELETE FROM vtiger_ctwhatsappbusinessusers");
			//$adb->pquery("UPDATE vtiger_ctwhatsappbusinessconfiguration SET customfield4 = 'singleWhatsapp'");
			
		}else{
			$query = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusinessusers");
			$rows = $adb->num_rows($query);
			for ($i=0; $i < $rows; $i++) { 
				$auth_token = $adb->query_result($query, $i, 'auth_token');
				$apiUrl = $adb->query_result($query, $i, 'api_url');

				$logoutURL = $apiUrl.'/disconnect';
				$curlLogout = curl_init();
				curl_setopt_array($curlLogout, array(
					CURLOPT_URL => $logoutURL,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => "",
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 10,
					CURLOPT_CONNECTTIMEOUT => 0,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_SSL_VERIFYHOST => 0,
					CURLOPT_SSL_VERIFYPEER => 0,
					CURLOPT_CUSTOMREQUEST => "POST",
					CURLOPT_USERAGENT=>'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
					CURLOPT_POSTFIELDS => '',
					CURLOPT_HTTPHEADER => array(
				    	'Authorization: '.$auth_token
				  	),
				));
				$resultLogout = curl_exec($curlLogout);
				$responseLogout = json_decode($resultLogout);
				curl_close($curlLogout);
			}
			$adb->pquery("UPDATE vtiger_ctwhatsappbusinessconfiguration SET whatsappstatus = 0");
		}
	}
}

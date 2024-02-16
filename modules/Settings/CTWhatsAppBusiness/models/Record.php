<?php
/*+**********************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
 ************************************************************************************/
class Settings_CTWhatsAppBusiness_Record_Model extends Vtiger_Record_Model {

	public function getAllowModules(){
		global $adb;
		$select_query = $adb->pquery("SELECT * FROM vtiger_ctwharsappallow_whatsappmodule");
		$rows = $adb->num_rows($select_query);

		$allowmodules = array();
		for ($i=0; $i < $rows; $i++) {
			$select_module = $adb->query_result($select_query, $i, 'module');
			$moduleLeadsIsEnable = CTWhatsAppBusiness_Record_Model::getmoduleIsEnable($select_module);
			$phone_field = $adb->query_result($select_query, $i, 'phone_field');
			$active = $adb->query_result($select_query, $i, 'active');
			$tabid = getTabid($select_module);
			$lblquery=$adb->pquery("SELECT * FROM vtiger_field WHERE fieldname=? and tabid=?",array($phone_field,$tabid));
			$fieldlabel = $adb->query_result($lblquery, 0, 'fieldlabel');
			if($moduleLeadsIsEnable == 0){
				$allowmodules[$select_module] = array('phone_field' => $phone_field, 'active' => $active,'fieldlabel'=>$fieldlabel);
			}
 		}
 		return $allowmodules;
	}

	public function getUserConfigurationAllData(){
		global $adb, $current_user;
		$currenUserID = $current_user->id;
		$query = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusinessconfiguration WHERE customfield5 = ?", array($currenUserID));
		$numrows = $adb->num_rows($query);
		
		if($numrows == 0){
			$query = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusinessconfiguration WHERE customfield4 != ''", array());
			$numrows = $adb->num_rows($query);
		}
		$configurationData = array();
		if($numrows){
			$apiUrl = $adb->query_result($query, 0, 'api_url');
			$authToken = $adb->query_result($query, 0, 'auth_token');
			$customfield1 = $adb->query_result($query, 0, 'customfield1');
			$customfield2 = $adb->query_result($query, 0, 'customfield2');
			$whatsappno = $adb->query_result($query, 0, 'whatsappno');
			$iconActive = $adb->query_result($query, 0, 'iconactive');
			$showUnknownmsg = $adb->query_result($query, 0, 'showunknownmsg');
			$themeView = $adb->query_result($query, 0, 'theme_view');
			$usersGroups = $adb->query_result($query, 0, 'users_groups');
			$whatsappStatus = $adb->query_result($query, 0, 'whatsappstatus');
			$inAppNotification = $adb->query_result($query, 0, 'inapp_notification');
			$allocatedWhatsappUser = $adb->query_result($query, 0, 'customfield3');
			$whatsappManagement = $adb->query_result($query, 0, 'customfield4');
			$configureUserid = $adb->query_result($query, 0, 'customfield5');
            $autoResponder = $adb->query_result($query, 0, 'customfield6');
            $autoResponderText = $adb->query_result($query, 0, 'customfield7');
            $whatsappAppid = $adb->query_result($query, 0, 'whatsapp_appid');
            $whatsappAccountid = $adb->query_result($query, 0, 'whatsapp_accountid');
            $whatsapp_businessnumber = $adb->query_result($query, 0, 'whatsapp_businessnumber');
			return $configurationData = array('api_url' => $apiUrl, 'authtoken' => $authToken, 'customfield1' => $customfield1, 'customfield2' => $customfield2, 'whatsappno' => $whatsappno, 'iconactive' => $iconActive, 'showunknownmsg' => $showUnknownmsg, 'theme_view' => $themeView, 'users_groups' => $usersGroups, 'whatsappstatus' => $whatsappStatus,'inapp_notification' => $inAppNotification,'allocatedWhatsappUser' => $allocatedWhatsappUser,'whatsappManagement' => $whatsappManagement, 'configureUserid' => $configureUserid, 'autoResponder' => $autoResponder, 'autoResponderText' => $autoResponderText, 'whatsappAppid' => $whatsappAppid, 'whatsappAccountid' => $whatsappAccountid, 'whatsapp_businessnumber' => $whatsapp_businessnumber);
		}
	}

    public function getUserConfigurationAllDataWithId($whatsappUserId){
        global $adb, $current_user;
        //For user scan
        $getAdminData = Settings_CTWhatsAppBusiness_Record_Model::getUserConfigurationDataWithId();
        $whatsappManagemnt = $getAdminData['whatsappManagement'];
        if($whatsappManagemnt == 'multipleWhatsapp'){
            $query = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusinessusers WHERE customfield5 = ?", array($whatsappUserId));
            $numrows = $adb->num_rows($query);
            if($numrows == 0){
                $queryMainUser = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusiness_user_groups WHERE multiple_userid LIKE '%".$whatsappUserId."%' AND active = '1'", array());
                $numrowsWP = $adb->num_rows($queryMainUser);
                if($numrowsWP){
                    for ($i=0; $i < $numrowsWP; $i++) { 
                        $userid = $adb->query_result($queryMainUser, $i, 'userid');
                        $queryWP = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusinessusers WHERE customfield5 = ? AND whatsappstatus = 1", array($userid));
                        $numrows = $adb->num_rows($queryWP);
                        if ($numrows == 1) {
                            break;
                        }
                    }
                }else{

                    $queryGetGroupId = $adb->pquery("SELECT * FROM vtiger_users2group WHERE userid = ?", array($whatsappUserId));
                    $rows = $adb->num_rows($queryGetGroupId);
                    for ($i=0; $i < $rows; $i++) { 
                        $groupid = $adb->query_result($queryGetGroupId, $i, 'groupid');
                        
                        $queryMainUsers = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusiness_user_groups WHERE (multiple_userid LIKE '%".$groupid."%' OR userid LIKE '%".$groupid."%') AND active = '1'", array());
                        $numrows = $adb->num_rows($queryMainUsers);
                        if($numrows){
                            $userid = $adb->query_result($queryMainUsers, 0, 'userid');
                            break;
                        }
                    }
                }
                $query = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusinessusers WHERE customfield5 = ?", array($userid));
                $numrows = $adb->num_rows($query);
            }
            
            if($userid){
                $query = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusinessusers WHERE customfield5 = ?", array($userid));
                $numrows = $adb->num_rows($query);
            }
        }else{
            $query = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusinessconfiguration WHERE users_groups LIKE '%".$whatsappUserId."%'", array());
            $numrows = $adb->num_rows($query);
            if($numrows == 0){
                $queryGetGroupId = $adb->pquery("SELECT * FROM vtiger_users2group WHERE userid = ?", array($whatsappUserId));
                $numRows = $adb->num_rows($queryGetGroupId);
                for ($i=0; $i < $numRows; $i++) { 
                    $groupid = $adb->query_result($queryGetGroupId, $i, 'groupid');
                    $query = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusinessconfiguration WHERE users_groups LIKE '%".$groupid."%'", array());
                    $existGroup = $adb->num_rows($query);
                    if($existGroup){
                        $numrows = 1;
                        break;
                    }else{
                        $numrows = 0;
                    }
                }
            }
        }

        $configurationData = array();
        if($numrows){
            $apiUrl = $adb->query_result($query, 0, 'api_url');
            $authToken = $adb->query_result($query, 0, 'auth_token');
            $customfield1 = $adb->query_result($query, 0, 'customfield1');
            $customfield2 = $adb->query_result($query, 0, 'customfield2');
            $whatsappno = $adb->query_result($query, 0, 'whatsappno');
            $iconActive = $adb->query_result($query, 0, 'iconactive');
            $showUnknownmsg = $adb->query_result($query, 0, 'showunknownmsg');
            $themeView = $adb->query_result($query, 0, 'theme_view');
            $usersGroups = $adb->query_result($query, 0, 'users_groups');
            $whatsappStatus = $adb->query_result($query, 0, 'whatsappstatus');
            $inAppNotification = $adb->query_result($query, 0, 'inapp_notification');
            $allocatedWhatsappUser = $adb->query_result($query, 0, 'customfield3');
            $whatsappManagement = $adb->query_result($query, 0, 'customfield4');
            $configureUserid = $adb->query_result($query, 0, 'customfield5');
            $autoResponder = $adb->query_result($query, 0, 'customfield6');
            $autoResponderText = $adb->query_result($query, 0, 'customfield7');
            $whatsappAppid = $adb->query_result($query, 0, 'whatsapp_appid'); 
            $whatsappAccountid = $adb->query_result($query, 0, 'whatsapp_accountid');
            $whatsapp_businessnumber = $adb->query_result($query, 0, 'whatsapp_businessnumber');
            return $configurationData = array('api_url' => $apiUrl, 'authtoken' => $authToken, 'customfield1' => $customfield1, 'customfield2' => $customfield2, 'whatsappno' => $whatsappno, 'iconactive' => $iconActive, 'showunknownmsg' => $showUnknownmsg, 'theme_view' => $themeView, 'users_groups' => $usersGroups, 'whatsappstatus' => $whatsappStatus,'inapp_notification' => $inAppNotification,'allocatedWhatsappUser' => $allocatedWhatsappUser,'whatsappManagement' => $whatsappManagement, 'configureUserid' => $configureUserid, 'autoResponder' => $autoResponder, 'autoResponderText' => $autoResponderText, 'whatsappAppid' => $whatsappAppid, 'whatsappAccountid' => $whatsappAccountid, 'whatsapp_businessnumber' => $whatsapp_businessnumber);
        }
    }

    public function getUserConfigurationDataWithId(){
        global $adb, $current_user;
        $query = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusinessconfiguration", array());
        $numrows = $adb->num_rows($query);
        $configurationData = array();
        if($numrows){
            $apiUrl = $adb->query_result($query, 0, 'api_url');
            $authToken = $adb->query_result($query, 0, 'auth_token');
            $customfield1 = $adb->query_result($query, 0, 'customfield1');
            $customfield2 = $adb->query_result($query, 0, 'customfield2');
            $whatsappno = $adb->query_result($query, 0, 'whatsappno');
            $iconActive = $adb->query_result($query, 0, 'iconactive');
            $showUnknownmsg = $adb->query_result($query, 0, 'showunknownmsg');
            $themeView = $adb->query_result($query, 0, 'theme_view');
            $usersGroups = $adb->query_result($query, 0, 'users_groups');
            $whatsappStatus = $adb->query_result($query, 0, 'whatsappstatus');
            $inAppNotification = $adb->query_result($query, 0, 'inapp_notification');
            $allocatedWhatsappUser = $adb->query_result($query, 0, 'customfield3');
            $whatsappManagement = $adb->query_result($query, 0, 'customfield4');
            $configureUserid = $adb->query_result($query, 0, 'customfield5');
            $autoResponder = $adb->query_result($query, 0, 'customfield6');
            $autoResponderText = $adb->query_result($query, 0, 'customfield7');
            $notificationtone = $adb->query_result($query, 0, 'notificationtone');
            $whatsapplog = $adb->query_result($query, 0, 'whatsapplog');
            $notification = $adb->query_result($query, 0, 'notification');
            $botidealtime = $adb->query_result($query, 0, 'botidealtime');
            return $configurationData = array('api_url' => $apiUrl, 'authtoken' => $authToken, 'customfield1' => $customfield1, 'customfield2' => $customfield2, 'whatsappno' => $whatsappno, 'iconactive' => $iconActive, 'showunknownmsg' => $showUnknownmsg, 'theme_view' => $themeView, 'users_groups' => $usersGroups, 'whatsappstatus' => $whatsappStatus,'inapp_notification' => $inAppNotification,'allocatedWhatsappUser' => $allocatedWhatsappUser,'whatsappManagement' => $whatsappManagement, 'configureUserid' => $configureUserid, 'autoResponder' => $autoResponder, 'autoResponderText' => $autoResponderText, 'notificationtone' => $notificationtone, 'whatsapplog' => $whatsapplog, 'notification' => $notification, 'botidealtime' => $botidealtime);
        }
    }

	public function getMassMessageBatchData(){
		global $adb;
		$query = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusinessmassbatch");
		$numrows = $adb->num_rows($query);
		$massConfigurationData = array();
		if($numrows){
			$batch = $adb->query_result($query, 0, 'batch');
			$timeInterval = $adb->query_result($query, 0, 'timeinterval');
			if($timeInterval == ''){
				$timeInterval = 5;
			}
			$cronDateTime = $adb->query_result($query, 0, 'crondatetime');
			return $massConfigurationData = array('batch' => $batch, 'timeInterval' => $timeInterval, 'cronDateTime' => $cronDateTime);
		}else{
			$batch = '';
			$timeInterval = 5;
			return $massConfigurationData = array('batch' => $batch, 'timeInterval' => $timeInterval);
		}
	}

	public function getUserAndGroupName($userGroupArray){
		global $adb;
		$userGroupName = '';
		foreach ($userGroupArray as $key => $value) {
			$username = $adb->pquery("SELECT * FROM vtiger_users WHERE id = ?", array($value));
			$num_rows = $adb->num_rows($username);
			if($num_rows == 1){
				$userGroupName .= $adb->query_result($username, 0, 'first_name').' '.$adb->query_result($username, 0, 'last_name').', ';
			}else{
				$groupname = $adb->pquery("SELECT * FROM vtiger_groups WHERE groupid = ?", array($value));
				$userGroupName .= $adb->query_result($groupname, 0, 'groupname').', ';
			}
		}
		return $userNameGroupName = rtrim($userGroupName, ', ');
	}

	public function saveWhatsAppConfiguration($request){
		global $adb, $current_user;
        $moduleName = $request->getModule();
        $qualifiedName = $request->getModule(false);
        $api_url = $request->get('api_url');
        $api_url= Settings_CTWhatsAppBusiness_SaveLicense_Action::encrypt_decrypt($api_url,'d');
        $auth_token = $request->get('auth_token');
        $customfield1 = $request->get('customfield1');
        $customfield2 = $request->get('customfield2');
        $whatsappno = $request->get('whatsappno');
        $select_module = $request->get('select_module');
        $phone_field = $request->get('phone_field');
        $active = $request->get('active');
        $iconactive = $request->get('iconactive');
        $showunknownmsg = $request->get('showunknownmsg');
        $theme_view = $request->get('theme_view');
        $whatsappstatus = $request->get('whatsappstatus');
        $inappNotification = $request->get('inapp_not');//In App Notification
        $batch = $request->get('batch');
        $timeInterval = $request->get('timeinterval');
        $botidealtime = $request->get('botidealtime');
        if($showunknownmsg){
            $showunknownmsg = 1;
        }
        if($iconactive){
            $iconactive = 1;
        }
        if($active){
            $active = 1;
        }
        $assigned_user_id = $request->get('assigned_user_id');
        $notificationtone = $request->get('notificationtone');
        $whatsapplog = $request->get('whatsapplog');
        if($whatsapplog){
            $whatsapplog = 1;
        }
        $notification = $request->get('notification');
        if($notification){
            $notification = 1;
        }

        $users_groups = '';
        foreach ($assigned_user_id as $key => $value) {
            $users_groups .= $value.',';
        }
        $user_groups = rtrim($users_groups, ',');

        $currenUserID = $request->get('configureUserid');
        if($currenUserID == ''){
            $currenUserID = $current_user->id;
        }
        $allocalteWhatsapp = $request->get('allocatewhatsapp');
        $allocatedWhatsapp = '';
        foreach ($allocalteWhatsapp as $key => $value) {
            $allocatedWhatsapp .= $value.',';
        }
        $allocatedWhatsappUser = rtrim($allocatedWhatsapp, ',');

        //$whatsappManagement = $request->get('whatsappmanagement');
        $whatsappManagement = 'multipleWhatsapp';

        $autoResponder = $request->get('autoresponder');
        if($autoResponder){
            $autoResponder = 1;
        }
        $autoResponderText = $request->get('autoresponder_text');


        $configuratioData = Settings_CTWhatsAppBusiness_Record_Model::getUserConfigurationDataWithId();
        $auth_token = $configuratioData['authtoken'];
        $whatsappstatus = $configuratioData['whatsappstatus'];
        $allocatedWhatsappExistUser = $configuratioData['allocatedWhatsappUser'];
        $whatsappno = $configuratioData['whatsappno'];

        $getotherUserQuery = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusinessusers", array());
        $allUserRow = $adb->num_rows($getotherUserQuery);

        if($whatsappManagement == 'singleWhatsapp'){
            $allocatedWhatsappUser = '';
            for ($i=0; $i < $allUserRow; $i++) { 
                $userAPIURL = $adb->query_result($getotherUserQuery, $i, 'api_url');
                $userauth_token = $adb->query_result($getotherUserQuery, $i, 'auth_token');

                $logoutOtherUserURL = $userAPIURL.'/disconnect';
                $curlLogout = curl_init();
                curl_setopt_array($curlLogout, array(
                    CURLOPT_URL => $logoutOtherUserURL,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_SSL_VERIFYHOST => 0,
                    CURLOPT_SSL_VERIFYPEER => 0,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_USERAGENT=>'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
                    CURLOPT_POSTFIELDS => '',
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: '.$userauth_token
                    ),
                ));
                $resultLogout = curl_exec($curlLogout);
                $responseLogout = json_decode($resultLogout, true);
                curl_close($curlLogout);
            }
            $deleteQuery = $adb->pquery("DELETE FROM vtiger_ctwhatsappbusinessusers", array());
            $deleteQuery = $adb->pquery("DELETE FROM vtiger_ctwhatsappbusiness_user_groups", array());
        }
        
        $deleteQuery = $adb->pquery("DELETE FROM vtiger_ctwhatsappbusinessconfiguration", array());
        $insertQuery = $adb->pquery("INSERT INTO vtiger_ctwhatsappbusinessconfiguration(api_url, auth_token, customfield1, customfield2, whatsappno, users_groups,iconactive, showunknownmsg, theme_view, whatsappstatus, inapp_notification, customfield3, customfield4, customfield5, customfield6, customfield7, whatsapplog, notificationtone,notification, botidealtime) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", array($api_url, $auth_token, $customfield1, $customfield2, $whatsappno, $user_groups, $iconactive, $showunknownmsg, $theme_view, $whatsappstatus, $inappNotification, $allocatedWhatsappUser, $whatsappManagement, $currenUserID, $autoResponder , $autoResponderText, $whatsapplog, $notificationtone, $notification, $botidealtime));

        if($whatsappManagement == 'singleWhatsapp'){
            if($allUserRow > 0){
                $update = $adb->pquery("UPDATE vtiger_ctwhatsappbusinessconfiguration SET auth_token = '', whatsappno = '', whatsappstatus = '0'", array());
            }
        }
        
        $currentdate = date('Y-m-d H:i:s');

        $deleteMassBatchQuery = $adb->pquery("DELETE FROM vtiger_ctwhatsappbusinessmassbatch WHERE 1");
        $insertMassBatchQuery = $adb->pquery("INSERT INTO vtiger_ctwhatsappbusinessmassbatch(batch, timeinterval, crondatetime) VALUES (?,?,?)", array($batch, $timeInterval, $currentdate));

        $frequency = $timeInterval * 60;
        $udpateStatusQuery = $adb->pquery("UPDATE vtiger_cron_task SET frequency = $frequency WHERE module = 'CTWhatsAppBusiness'",array());
        $adb->pquery("UPDATE vtiger_ctwhatsappbusinessusers SET customfield1 = ?",array($customfield1));

        header("Location: index.php?module=CTWhatsAppBusiness&parent=Settings&view=WhatsAppUserList");
	}

	public function saveWhatsAppModule($request){
		global $adb;
        $moduleName = $request->getModule();
        $qualifiedName = $request->getModule(false);

        $selectModule = $request->get('select_module');
        $phoneField = $request->get('phone_field');
        $active = $request->get('active');
        $type = $request->get('type');
        if($active){
            $active = 1;
        }
 
        $selectQuery = $adb->pquery("SELECT * FROM vtiger_ctwharsappallow_whatsappmodule WHERE module = ?", array($selectModule));
        $rows = $adb->num_rows($selectQuery);
        if($selectModule != ''){
            if($type==0 && $rows == 1){
                echo "Module Already Exist";
            }else{
                if($rows == 1){
                    $query = $adb->pquery("UPDATE vtiger_ctwharsappallow_whatsappmodule SET phone_field = ?, active = ? WHERE module = ?", array($phoneField, $active, $selectModule));
                }else{
                    $query = $adb->pquery("INSERT INTO vtiger_ctwharsappallow_whatsappmodule(module, phone_field, active) VALUES (?,?,?)", array($selectModule, $phoneField, $active));
                }
            }

            $relatedFieldQuery = $adb->pquery("SELECT * FROM vtiger_field WHERE fieldname = 'whatsapp_contactid' AND tablename = 'vtiger_ctwhatsappbusiness'", array());
            $fieldRow = $adb->num_rows($relatedFieldQuery);
            if($fieldRow){
                $fieldId = $adb->query_result($relatedFieldQuery, 0, 'fieldid');
                $fieldModuleQuery = $adb->pquery("SELECT * FROM vtiger_fieldmodulerel WHERE fieldid = ? AND relmodule = ?", array($fieldId, $selectModule));
                $fieldModuleRow = $adb->num_rows($fieldModuleQuery);
                if($fieldModuleRow == 0){
                    $adb->pquery("INSERT INTO vtiger_fieldmodulerel (fieldid, module, relmodule, status, sequence) VALUES ('$fieldId', 'CTWhatsAppBusiness', '$selectModule', NULL, NULL);");
                }
            }
        }
	}

    public function deleteModuleWhatsAppRelatedData(){
        global $adb, $site_URL;
        $adb->pquery("DELETE FROM vtiger_relatedlists WHERE label = 'WhatsApp");
        $adb->pquery("DELETE FROM vtiger_cron_task WHERE name = 'CTWhatsAppBusiness");
        $adb->pquery("DELETE FROM com_vtiger_workflow_tasktypes WHERE tasktypename = 'SendWhatsAppMsg");
       
        $adb->pquery('DROP TABLE vtiger_ctwhatsappbusinessconfiguration',array());
        $adb->pquery('DROP TABLE vtiger_ctwhatsappbusinessusers',array());
        $adb->pquery('DROP TABLE vtiger_ctwhatsappbusiness',array());
        $adb->pquery('DROP TABLE vtiger_ctwhatsappbusinesscf',array());
        $adb->pquery('DROP TABLE vtiger_ctwharsappallow_whatsappmodule',array());
        $adb->pquery('DROP TABLE vtiger_ctwhatsappbusinessmassbatch',array());
        $adb->pquery('DROP TABLE vtiger_ctwhatsappbusinessschedulesendmsg',array());
        $adb->pquery('DROP TABLE vtiger_ctwhatsappbusiness_license_setting',array());
        $adb->pquery('DROP TABLE vtiger_ctwhatsappbusiness_user_groups',array());

        $query = "DELETE FROM vtiger_settings_field WHERE name = 'WhatsApp Configuration'";
        $results = $adb->pquery($query);
        if ($results) {
            $result = $site_URL;
        }
        return $result;
    }

    public function deleteAllowModule($deleteModule){
        global $adb;
        $deleteQuery = $adb->pquery("DELETE  FROM vtiger_ctwharsappallow_whatsappmodule WHERE module = ?", array($deleteModule));
        return 1;
    }

    public function getAllUserConfiguration(){
        global $adb;
        $query = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusinessconfiguration", array());
        $rows = $adb->num_rows($query);
        $customfield4 = $adb->query_result($query, 0, 'customfield4');
        if($customfield4 != 'multipleWhatsapp'){
            $userid = $adb->query_result($query, 0, 'customfield5');
            $getUserName = $adb->pquery("SELECT * FROM vtiger_users WHERE id = ?", array($userid));
            $userName = $adb->query_result($getUserName, 0, 'first_name').' '.$adb->query_result($getUserName, 0, 'last_name');
            $detailViewURL = 'index.php?module=Users&view=PreferenceDetail&parent=Settings&record='.$userid;
            $isAdmin = $adb->query_result($getUserName, 0, 'is_admin');
            $whatsappno = $adb->query_result($query, 0, 'whatsappno');
            $auth_token = $adb->query_result($query, 0, 'auth_token');
            $whatsappstatus = $adb->query_result($query, 0, 'whatsappstatus');
            $iconactive = $adb->query_result($query, 0, 'iconactive');
            $whatsappUsers[$userid] = array('username' => $userName, 'whatsappno' => $whatsappno, 'whatsappstatus' => $whatsappstatus, 'iconactive' => $iconactive, 'auth_token' => $auth_token, 'isAdmin' => $isAdmin, 'detailViewURL' => $detailViewURL);
        }
       

        $userWhatsappConfigQuery = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusinessusers", array());
        $row = $adb->num_rows($userWhatsappConfigQuery);
        
        for ($i=0; $i < $row; $i++) { 
            $userId = $adb->query_result($userWhatsappConfigQuery, $i, 'customfield5');
            $getUsersName = $adb->pquery("SELECT * FROM vtiger_users WHERE id = ?", array($userId));
            //For user scan
            $userRow = $adb->num_rows($getUsersName);
            if($userRow == 1){
                $userName = $adb->query_result($getUsersName, 0, 'first_name').' '.$adb->query_result($getUsersName, 0, 'last_name');
                $isAdmin = $adb->query_result($getUsersName, 0, 'is_admin');
                $detailViewURL = 'index.php?module=Users&view=PreferenceDetail&parent=Settings&record='.$userId;
            }else{
                $getGroupName = $adb->pquery("SELECT * FROM vtiger_groups WHERE groupid = ?", array($userId));
                $userName = $adb->query_result($getGroupName, 0, 'groupname');
                $detailViewURL = 'index.php?module=Groups&parent=Settings&view=Detail&record='.$userId;
            }
            //For user scan
            $whatsappno = $adb->query_result($userWhatsappConfigQuery, $i, 'whatsappno');
            $auth_token = $adb->query_result($userWhatsappConfigQuery, $i, 'auth_token');
            $whatsappstatus = $adb->query_result($userWhatsappConfigQuery, $i, 'whatsappstatus');
            $iconactive = $adb->query_result($userWhatsappConfigQuery, $i, 'iconactive');
            $whatsappUsers[$userId] = array('username' => $userName, 'whatsappno' => $whatsappno, 'whatsappstatus' => $whatsappstatus, 'iconactive' => $iconactive, 'auth_token' => $auth_token, 'isAdmin' => $isAdmin, 'detailViewURL' => $detailViewURL);
        }
        return $whatsappUsers;
    }

    public function deleteWhatsAppUser($request){
        global $adb;
        $userid = $request->get('userid');
        $query = $adb->pquery("DELETE FROM vtiger_ctwhatsappbusinessconfiguration WHERE customfield5 = ?", array($userid));
        $query = $adb->pquery("DELETE FROM vtiger_ctwhatsappbusinessusers WHERE customfield5 = ?", array($userid));
        header("Location: index.php?module=CTWhatsAppBusiness&parent=Settings&view=WhatsAppUserList");
    }

    public function updateActiveInctive($request){
        global $adb;
        $userid = $request->get('userid');
        $activeInActive = $request->get('activeInActive');
        $query = $adb->pquery("UPDATE vtiger_ctwhatsappbusinessconfiguration SET iconactive = ? WHERE customfield5 = ?", array($activeInActive, $userid));
        $query = $adb->pquery("UPDATE vtiger_ctwhatsappbusinessusers SET iconactive = ? WHERE customfield5 = ?", array($activeInActive, $userid));
    }

    public function getMainSubUsers(){
        global $adb;
        $query = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusiness_user_groups");
        $rows = $adb->num_rows($query);
        $allUsers = array();
        for ($i=0; $i < $rows; $i++) { 
            $userid = $adb->query_result($query, $i, 'userid');
            if($userid){
                $whatsAppnumberQuery = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusinessusers WHERE customfield5 = ?", array($userid));
                $whatsappno = $adb->query_result($whatsAppnumberQuery, 0, 'whatsappno');
            }
            $multiple_userid = explode(',', $adb->query_result($query, $i, 'multiple_userid'));
            $active = $adb->query_result($query, $i, 'active');
            
            $getUsersName = $adb->pquery("SELECT * FROM vtiger_users WHERE id = ?", array($userid));
            $userRow = $adb->num_rows($getUsersName);
            if($userRow == 1){
                $userName = $adb->query_result($getUsersName, 0, 'first_name').' '.$adb->query_result($getUsersName, 0, 'last_name');
            }else{
                $getGroupName = $adb->pquery("SELECT * FROM vtiger_groups WHERE groupid = ?", array($userid));
                $userName = $adb->query_result($getGroupName, 0, 'groupname');
            }

            $subUserName = '';
            foreach ($multiple_userid as $key => $value) {
                $getUsersName = $adb->pquery("SELECT * FROM vtiger_users WHERE id = ?", array($value));
                $userRow = $adb->num_rows($getUsersName);
                if($userRow == 1){
                    $subUserName .= $adb->query_result($getUsersName, 0, 'first_name').' '.$adb->query_result($getUsersName, 0, 'last_name').',';
                }else{
                    $getGroupName = $adb->pquery("SELECT * FROM vtiger_groups WHERE groupid = ?", array($value));
                    $subUserName .= $adb->query_result($getGroupName, 0, 'groupname').',';
                }                
           }
           $allUsers[] = array('userid' => $userid, 'userName' => $userName, 'subUserName' => $subUserName, 'active' => $active, 'whatsappno' => $whatsappno);
        }
        return $allUsers;
    }

    public function getMainUserDetails($userid){
        global $adb;
        $query = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusinessusers WHERE customfield5 = ?", array($userid));
        $rows = $adb->num_rows($query);
        $whatsappstatus = $adb->query_result($query, 0, 'whatsappstatus');
        $result = array('rows' => $rows, 'whatsappstatus' => $whatsappstatus);
        return $result;
    }

    public function deactivateLicense($currenUserID){
        global $adb;
        $deleteLicense = $adb->pquery("DELETE FROM vtiger_ctwhatsappbusiness_license_setting",array()); 
        $udpateStatusQuery = $adb->pquery("UPDATE vtiger_ctwhatsappbusinessconfiguration SET whatsappstatus = 0 WHERE customfield5 = ?",array($currenUserID));
        $udpateStatusQuery = $adb->pquery("UPDATE vtiger_ctwhatsappbusinessusers SET whatsappstatus = 0 WHERE customfield5 = ?",array($currenUserID));
    }
}
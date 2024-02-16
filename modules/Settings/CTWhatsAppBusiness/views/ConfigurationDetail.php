<?php 
/*+**********************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
 ************************************************************************************/

class Settings_CTWhatsAppBusiness_ConfigurationDetail_View extends Settings_Vtiger_Index_View {

    public function process(Vtiger_Request $request) {
    	global $adb, $site_URL, $current_user;
    	$isAdmin = $current_user->is_admin;
    	$whatsappUserId = $request->get('userid');
    	$selectUserid = $request->get('selectUserid');
		$qualifiedModuleName = $request->getModule(false);
		$currentdate = date('Y-m-d');

		$allModules = Vtiger_Menu_Model::getAll(true); 
		$modules = array(); 
		foreach ($allModules as $key => $value) {
			$modules[$key] = $key;			
		}

		$getLicenseDetail = CTWhatsAppBusiness_DashBoard_View::getLicenseDetail();
		$expirydate = $getLicenseDetail['expiryDate'];
		$license_key = $getLicenseDetail['licenseKey'];
		$date = Settings_CTWhatsAppBusiness_ConfigurationDetail_View::encrypt_decrypt($expirydate, $action='d');

		$configurationData = Settings_CTWhatsAppBusiness_Record_Model::getUserConfigurationAllDataWithId($whatsappUserId);
		$apiUrl = $configurationData['api_url'];
		$instance = explode('/',$apiUrl);
		$api_url= Settings_CTWhatsAppBusiness_LicenseDetail_View::encrypt_decrypt($apiUrl);
		$auth_token = $configurationData['authtoken'];
		$customfield1 = $configurationData['customfield1'];
		$customfield2 = $configurationData['customfield2'];
		$whatsappno = $configurationData['whatsappno'];
		$iconactive = $configurationData['iconactive'];
		$showunknownmsg = $configurationData['showunknownmsg'];
		$theme_view = $configurationData['theme_view'];
		$usersGroups = explode(',', $configurationData['users_groups']);
		$whatsappStatus = $configurationData['whatsappstatus'];
		$inAppNotification = $configurationData['inapp_notification'];//In App Notification
		$qrcodeStatus = $_REQUEST['qrcode_status'];
		$whatsappAction = $_REQUEST['whatsapp_action'];

		$autoResponder = $configurationData['autoResponder'];
		$autoResponderText = $configurationData['autoResponderText'];

		//Add new functionality
		$currenUserID = $configurationData['configureUserid'];
		$whatsappManagement = $configurationData['whatsappManagement'];
		$allocatedWhatsappUser = explode(',', $configurationData['allocatedWhatsappUser']);
		//Add new functionality

		$url = $apiUrl.'/contactlist';

		if($whatsappStatus == 1){
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $url,
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
			$contactresult = curl_exec($curl);
			$contactcount = count(json_decode($contactresult, true));
		}
		
		if($whatsappAction == 'logout'){
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
		}

		if($qrcodeStatus == 1 && $whatsappStatus == 0){
			if($whatsappUserId){
				$whatsappBotQuery = $adb->pquery("SELECT * FROM vtiger_ctwhatsappbusiness_user_groups WHERE userid = ?", array($whatsappUserId));
				$whatsappbot = $adb->query_result($whatsappBotQuery, 0, 'whatsappbot');
			}
			
			$qrcodeurl = $apiUrl."/init";
			$fields = array(
				'domain' => $site_URL,
				"licenceKey" => $license_key,
				"statusurl" => $site_URL.'/modules/CTWhatsAppBusiness/WhatsappStatus.php?userid='.$whatsappUserId,
				"url" => $site_URL.'/modules/CTWhatsAppBusiness/CTWhatAppReceiver.php?userid='.$whatsappUserId,
			);
			
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $qrcodeurl,
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
				CURLOPT_POSTFIELDS => json_encode($fields),
				CURLOPT_HTTPHEADER => array(
					'Content-Type: application/json'
			  	),
			));
			$result = curl_exec($curl);
			$response = json_decode($result);
			curl_close($curl);
			$qrcodeurl = $response->qr;
			$authTokenKey = $response->Authorization;
			if($response){
				$scanMessage = $response->message;
			}else{
				$scanMessage = "WhatsApp server is not responding - Please try after sometime...";
			}
		}

		$configurationData = Settings_CTWhatsAppBusiness_Record_Model::getUserConfigurationAllDataWithId($whatsappUserId);
		$whatsappStatus = $configurationData['whatsappstatus'];

		$allowmodules = Settings_CTWhatsAppBusiness_Record_Model::getAllowModules();

		//Add new functionality
		$userNameGroupName = Settings_CTWhatsAppBusiness_ConfigurationDetail_View::getUserGroupName($usersGroups);
		$allocatedWhatsappUsers = Settings_CTWhatsAppBusiness_ConfigurationDetail_View::getUserGroupName($allocatedWhatsappUser);
		//Add new functionality

		//code start for Expiry
		$dayRemain = "";
		
		$expiry_date = $getLicenseDetail['expiryDate'];
		$expirydate = $this->encrypt_decrypt($expiry_date,'d');
		$today = date('Y-m-d');
		if(strtotime($expirydate) >= strtotime($today)){
			$diff = strtotime($expirydate) - strtotime($today);
			$dayRemain = abs(round($diff / 86400));
		}else{
			$dayRemain = 0;
		}
		

		$editURL = 'index.php?parent=Settings&module=CTWhatsAppBusiness&view=ConfigurationEdit';
		$licenseDetailURL = 'index.php?parent=Settings&module=CTWhatsAppBusiness&view=LicenseDetail';
		$scanQRCode = 'index.php?module=CTWhatsAppBusiness&parent=Settings&view=ConfigurationDetail&qrcode_status=1&userid='.$whatsappUserId;
		$logout = 'index.php?module=CTWhatsAppBusiness&parent=Settings&view=ConfigurationDetail&whatsapp_action=logout&userid='.$whatsappUserId;
		$reboot = 'index.php?module=CTWhatsAppBusiness&parent=Settings&view=ConfigurationDetail&qrcode_status=1&whatsapp_action=reboot';
		$importContacts = '/modules/CTWhatsAppBusiness/Exportcon.php';


		$getMassBatchConfiguration = Settings_CTWhatsAppBusiness_ConfigurationDetail_View::getMassBatchConfigurationData();
		$batch = $getMassBatchConfiguration['batch'];
		$timeInterval = $getMassBatchConfiguration['timeInterval'];

    	$viewer = $this->getViewer($request);
    	$viewer->assign('MODULE', $qualifiedModuleName);
		$viewer->assign('QUALIFIED_MODULE', $qualifiedModuleName);
		$viewer->assign('APIURL', $api_url);
		$viewer->assign('WHATSAPPAPIURL', $apiUrl);
		$viewer->assign('AUTHTOKEN', $auth_token);
		$viewer->assign('CUSTOMFIELD1', $customfield1);
		$viewer->assign('CUSTOMFIELD2', $customfield2);
		$viewer->assign('WHATSAPPNO', $whatsappno);
		$viewer->assign('ALLLOWMODULES', $allowmodules);
		$viewer->assign('ALLOW_WHATSAPP_MODULES', $modules);
		$viewer->assign('USERNAMEGROUPNAME', $userNameGroupName);
		$viewer->assign('ICONACTIVE', $iconactive);
		$viewer->assign('SHOWUNKNOWNMSG', $showunknownmsg);
		$viewer->assign('THEME', $theme_view);
		$viewer->assign('QRCODE_STATUS', $qrcodeStatus);
		$viewer->assign('QRCODEURL', $qrcodeurl);
		$viewer->assign('DAYREMAINING', $dayRemain);
		$viewer->assign('EDITURL', $editURL);
		$viewer->assign('LICENSEDETAILURL', $licenseDetailURL);
		$viewer->assign('SCANQRCODE', $scanQRCode);
		$viewer->assign('LOGOUT', $logout);
		$viewer->assign('REBOOT', $reboot);
		$viewer->assign('IMPORTCONTACTS', $importContacts);
		$viewer->assign('AUTHTOKENKEY', $authTokenKey);
		$viewer->assign('WHATSAPPSTATUS', $whatsappStatus);
		$viewer->assign('INAPPNOTIFICATION', $inAppNotification);
		$viewer->assign('BATCH', $batch);
		$viewer->assign('TIMEINTERVAL', $timeInterval);
		$viewer->assign('contactcount', $contactcount);
		$viewer->assign('SCANMESSAGE', $scanMessage);

		$viewer->assign('AUTORESPONDER', $autoResponder);
		$viewer->assign('AUTORESPONDERTEXT', $autoResponderText);

		//Add new functionality
		$viewer->assign('ALLOCATEDWHATSAPPUSERS', $allocatedWhatsappUsers);
		$viewer->assign('WHATSAPPMANAGEMENT', $whatsappManagement);
		$viewer->assign('WHATSAPPUSERID', $whatsappUserId);
		$viewer->assign('SELECTEDUSERID', $selectUserid);
		//Add new functionality

		if(strtotime($date) > strtotime($currentdate)){
			$viewer->view('ConfigurationDetail.tpl', $qualifiedModuleName);
		}else{
			header("Location: index.php?parent=Settings&module=CTWhatsAppBusiness&view=LicenseEdit");
		}
	}

	public function getMassBatchConfigurationData(){
		$massConfigurationData = Settings_CTWhatsAppBusiness_Record_Model::getMassMessageBatchData();
		return $massConfigurationData;
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

	//Add new functionality
	function getUserGroupName($userGroupArray){
		$userNameGroupName = Settings_CTWhatsAppBusiness_Record_Model::getUserAndGroupName($userGroupArray);
		return $userNameGroupName;
	}
	//Add new functionality
}

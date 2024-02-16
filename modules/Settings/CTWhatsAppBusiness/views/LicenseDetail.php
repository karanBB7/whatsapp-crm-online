<?php
/*+*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ***************************************************************************** */

class Settings_CTWhatsAppBusiness_LicenseDetail_View extends Settings_Vtiger_Index_View {
    
    public function process(Vtiger_Request $request){
		global $adb, $site_URL, $current_user;
		$currenUserID = $current_user->id;
        $viewer = $this->getViewer($request);
        $qualifiedName = $request->getModule(false);
		
		$getLicenseDetail = CTWhatsAppBusiness_DashBoard_View::getLicenseDetail();
		$numOfLicense = $getLicenseDetail['rows'];
        if($numOfLicense > 0){
			$license_key = $getLicenseDetail['licenseKey'];
			$expiry_date = $getLicenseDetail['expiryDate'];
			$orderId = $getLicenseDetail['licensefield1'];
			$version = $getLicenseDetail['licensefield2'];
			$expirydate = $this->encrypt_decrypt($expiry_date,'d');
			$today = date('Y-m-d');
			if(strtotime($today) > strtotime($expirydate)){
				$isExpired = 1;
			}else{
				$isExpired = 0;
			}
		}else{
			$license_key = '';
			$expirydate = '';
			$isExpired = 0;
			$orderId = '';
			$version = '';
		}
		
		$configurationData = Settings_CTWhatsAppBusiness_Record_Model::getUserConfigurationDataWithId();
		$apiUrl = $configurationData['api_url'];
		$instance = explode('/',$apiUrl);
		$api_key = $this->encrypt_decrypt($apiUrl,'e');
		$auth_token = $configurationData['authtoken'];
		$whatsappStatus = $configurationData['whatsappstatus'];
		$whatsappNo = $configurationData['whatsappno'];
		
		$qrcodeStatus = $_REQUEST['qrcode_status'];
		$whatsappAction = $_REQUEST['whatsapp_action'];
		
		if($whatsappAction == 'logout'){
			$logoutURL = $apiUrl.$auth_token.'/disconnect';
			$curlLogout = curl_init();
			curl_setopt_array($curlLogout, array(
				CURLOPT_URL => $logoutURL,
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
			));
			$resultLogout = curl_exec($curlLogout);
			$responseLogout = json_decode($resultLogout);
			curl_close($curlLogout);

			if($resultLogout){
				CTWhatsAppBusiness_Record_Model::updateWhatsAppSatatus($currenUserID);
			}
		}
			
		if($qrcodeStatus == 1){
			$qrcodeurl = $apiUrl."/init";
			$fields = array(
				"url" => $site_URL.'/modules/CTWhatsAppBusiness/CTWhatAppReceiver.php',
				"licenceKey" => $license_key,
				"statusurl" => $site_URL.'/modules/CTWhatsAppBusiness/WhatsappStatus.php?userid='.$currenUserID,
			);

			foreach($fields as $key=>$value) { $fieldsString .= $key.'='.$value.'&'; }
			rtrim($fieldsString, '&');
			
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $qrcodeurl,
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
				CURLOPT_POSTFIELDS => $fieldsString,
			));
			$result = curl_exec($curl);
			$response = json_decode($result);
			curl_close($curl);
			$qrcodeurl = $response->qr;
			$authTokenKey = $response->key;
		}

		$whatsappStatus = $configurationData['whatsappstatus'];
		
        $viewer->assign('LICENCE_KEY',$license_key);
        $viewer->assign('EXPIRY_DATE',$expirydate);
        $viewer->assign('IS_EXPIRED',$isExpired);
        $viewer->assign('API_KEY',$api_key);
        $viewer->assign('AUTH_TOKEN',$auth_token);
        $viewer->assign('INSTANCE',$instance[3]);
        $viewer->assign('MODULE',$qualifiedName);
		$viewer->assign('QRCODE_STATUS', $qrcodeStatus);
		$viewer->assign('QRCODEURL', $qrcodeurl);
		$viewer->assign('AUTHTOKENKEY', $authTokenKey);
		$viewer->assign('WHATSAPPSTATUS', $whatsappStatus);
		$viewer->assign('WHATSAPPNO', $whatsappNo);
		$viewer->assign('ORDERID', $orderId);
		$viewer->assign('VERSION', $version);
		if($numOfLicense == 0){
			header("Location: index.php?parent=Settings&module=CTWhatsAppBusiness&view=LicenseEdit");
		}else{
        	$viewer->view('LicenseDetail.tpl',$qualifiedName);
		}
    }
		
   function getHeaderScripts(Vtiger_Request $request) {
		$headerScriptInstances = parent::getHeaderScripts($request);
		$moduleName = $request->getModule();

		$jsFileNames = array(
			"modules.$moduleName.resources.CTWhatsAppBusiness",
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
    

<?php
/* * *******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
 * ****************************************************************************** */

class Settings_CTWhatsApp_SaveLicense_Action extends Settings_Vtiger_Index_Action {
	public function process(Vtiger_Request $request) {
		global $adb,$site_URL, $current_user;
		$currenUserID = $current_user->id;
		$getLicenseQuery=$adb->pquery("SELECT * FROM vtiger_ctwhatsapp_license_setting",array());
		$numOfLicenseCount = $adb->num_rows($getLicenseQuery);
		$License_Key = trim($request->get('license_key'));
		$api_key = trim($request->get('api_key'));
		$api_key=$this->encrypt_decrypt($api_key,'d');
		$auth_token = trim($request->get('auth_token'));
		$qualifiedName = $request->getModule(false);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://crmtiger.com/whatsapp/checklicenseactivatenew.php",
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
		CURLOPT_POSTFIELDS => array('license_key' => $License_Key,'domain' => $site_URL,'action' => 'activate'),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		$result_response = json_decode($response,true);

		$orderId = $result_response['order_id'];
		$curversion = $result_response['curversion'];
		$latversion = $result_response['latestversion'];

		$api_key = trim($result_response['apikey']);
		$api_key = $this->encrypt_decrypt($api_key,'d');
		$domain = trim($result_response['domain']);

		$whatsAppConfSQL=$adb->pquery("SELECT * FROM vtiger_ctwhatsappconfiguration WHERE customfield5 = ?",array($currenUserID));
		$numOfCount = $adb->num_rows($whatsAppConfSQL);
		$iconActive = 1;
		if($numOfCount > 0) {
			$updatequery=$adb->pquery("UPDATE vtiger_ctwhatsappconfiguration SET auth_token=?,api_url=? WHERE customfield5 = ?",array($auth_token,$api_key, $currenUserID)); 
			$updateSubTable = $adb->pquery("UPDATE vtiger_ctwhatsappusers SET auth_token = '', api_url = '$api_key', whatsappstatus = '0'");
		}else{
			$insertquery=$adb->pquery("INSERT INTO vtiger_ctwhatsappconfiguration (api_url,auth_token,iconactive,customfield5,customfield4) values(?,?,?,?,?)",array($api_key,$auth_token,$iconActive,$currenUserID,'multipleWhatsapp'));
		}

		if($result_response['Apirespocetype'] == '1'){
			$expirydate = $this->encrypt_decrypt($result_response['expirydate'],'e');

			if($numOfLicenseCount > 0){
				$record=$adb->query_result($getLicenseQuery,0,'id');
				$query=$adb->pquery("UPDATE vtiger_ctwhatsapp_license_setting SET license_key=?, domain=?, expirydate=?, licensefield1=?, licensefield2=?, licensefield3=? WHERE id=?",array($License_Key, $site_URL, $expirydate, $orderId, $curversion, $latversion, $record));
			}else{
				$query=$adb->pquery("INSERT INTO vtiger_ctwhatsapp_license_setting (license_key,status,domain,expirydate,licensefield1,licensefield2,licensefield3) values(?,?,?,?,?,?,?)",array($License_Key, 1, $site_URL, $expirydate, $orderId, $curversion, $latversion));
			}
			$result = array('msg' => $result_response['message'], 'currenUserID' => $currenUserID);
		}else{
			$result = array('msg' => $result_response['message'], 'currenUserID' => $currenUserID);
		}

		$response = new Vtiger_Response();
		$response->setEmitType(Vtiger_Response::$EMIT_JSON);
		$response->setResult($result);
		$response->emit();

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
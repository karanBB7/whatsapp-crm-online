<?php
 /*+*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ***************************************************************************** */

class Settings_CTWhatsApp_DeactivateLicense_Action extends Settings_Vtiger_Index_Action {
	
    public function process(Vtiger_Request $request) {
        global $adb,$site_URL, $current_user;
        $currenUserID = $current_user->id;

        $getLicenseDetail = CTWhatsApp_DashBoard_View::getLicenseDetail();
		$rows = $getLicenseDetail['rows'];

		if($rows > 0){
			$license_key = $getLicenseDetail['licenseKey'];
			$domain = $getLicenseDetail['domain'];
			$qualifiedName = $request->getModule(false);
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "https://crmtiger.com/whatsapp/checklicenseactivate.php",
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
			CURLOPT_POSTFIELDS => array('license_key' => $license_key,'domain' => $domain,'action' => 'deactivate'),
			));
			$response = curl_exec($curl);
			curl_close($curl);
			$result_response = json_decode($response,true);
			if($result_response['message'] && in_array($result_response['message'],array('Deactivated','Already Deactivated'))){

				Settings_CTWhatsApp_Record_Model::deactivateLicense($currenUserID);

				$response = new Vtiger_Response();
				$response->setEmitType(Vtiger_Response::$EMIT_JSON);
				$response->setResult(array("message"=>vtranslate('Your License Key Deactivated Successfully',$qualifiedName)));
				$response->emit();
			
			}else{
				$response = new Vtiger_Response();
				$response->setEmitType(Vtiger_Response::$EMIT_JSON);
				$response->setResult(array("message"=>vtranslate('License Key Deactivation Failed',$qualifiedName)));
				$response->emit();
			}
		}
	}
}
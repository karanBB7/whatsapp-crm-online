<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Whatsapp_MassSaveAjax_Action extends Vtiger_Mass_Action {

	function checkPermission(Vtiger_Request $request) {
		$moduleName = $request->getModule();
		$moduleModel = Vtiger_Module_Model::getInstance($moduleName);

		$currentUserPriviligesModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();
		if(!$currentUserPriviligesModel->hasModuleActionPermission($moduleModel->getId(), 'Save')) {
			throw new AppException(vtranslate($moduleName, $moduleName).' '.vtranslate('LBL_NOT_ACCESSIBLE'));
		}
	}

	public function process(Vtiger_Request $request) {
		$recordModels = $this->getRecordModelsFromRequest($request);
		foreach($recordModels as $recordId => $recordModel) {
			$recordModel->save();
		}
	}

	/**
	 * Function to get the record model based on the request parameters
	 * @param Vtiger_Request $request
	 * @return Vtiger_Record_Model or Module specific Record Model instance
	 */
	
	 private function getRecordModelsFromRequest(Vtiger_Request $request) {
		$moduleName = $request->getModule();
		$recordIds = $this->getRecordsListFromRequest($request);
		$recordModels = array();
		$currentUserModel = Users_Record_Model::getCurrentUserModel();
		$moduleTableMapping = [
			'Leads' => [
				'column' => 'phone',
				'table' => 'vtiger_leadaddress',
				'identifier' => 'leadaddressid',
			],
			'Contacts' => [
				'column' => 'phone',
				'table' => 'vtiger_contactdetails',
				'identifier' => 'contactid',
			],
		];
	
		$sourceModule = $request->get('source_module');
		$phoneNumbers = array();
		$commentContent = $request->getRaw('commentcontent');
		$adb = PearDatabase::getInstance();
		if (isset($moduleTableMapping[$sourceModule])) {
			$moduleData = $moduleTableMapping[$sourceModule];
			$phoneColumn = $moduleData['column'];
			$identifierColumn = $moduleData['identifier'];
			$table = $moduleData['table'];
	
			foreach ($recordIds as $recordId) {
				$query = "SELECT $phoneColumn FROM $table WHERE $identifierColumn = ?";
				$params = array($recordId);
				$result = $adb->pquery($query, $params);
			
				if ($adb->num_rows($result) > 0) {
					$row = $adb->fetchByAssoc($result);
					$phone = '91' . $row[$phoneColumn];
					$phoneNumbers[$recordId] = $phone;
				}
			}
		}
	
		foreach ($phoneNumbers as $recordId => $phoneNumber) {
			$data = array(
				"to" => $phoneNumber,
				"name" => $commentContent,
			);
			
			$midlewareQuery = "SELECT id, middlewareurl, authtoken FROM middleware";
			$midlewareResult = $adb->pquery($midlewareQuery);
			$midlewareRow = $adb->fetchByAssoc($midlewareResult);
			$middlewareurl = $midlewareRow['middlewareurl'];
			$authtoken = $midlewareRow['authtoken'];	
			echo $middlewareurl;
			
			$data_json = json_encode($data);
			$url = $middlewareurl.'send-template';
			$headers = array(
				'Authorization:'.$authtoken,
				'Content-Type: application/json'
			);
	
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			$return = curl_exec($ch);
			echo $return;
			curl_close($ch);
		}	
		return $recordModels;
	}
}

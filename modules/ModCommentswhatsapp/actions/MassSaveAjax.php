<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
class ModCommentswhatsapp_MassSaveAjax_Action extends Vtiger_Mass_Action {

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
			'Potentials' => [
				'column' => 'cf_1125',
				'table' => 'vtiger_potentialscf',
				'identifier' => 'potentialid',
			],
		];
	
		$sourceModule = $request->get('source_module');
		$phoneNumbers = array();
		$commentContent = $request->getRaw('commentcontent');
	
		if (isset($moduleTableMapping[$sourceModule])) {
			$moduleData = $moduleTableMapping[$sourceModule];
			$phoneColumn = $moduleData['column'];
			$identifierColumn = $moduleData['identifier'];
			$table = $moduleData['table'];
	
			foreach ($recordIds as $recordId) {
				$db = mysqli_connect("localhost", "bitechno_wapp", "8%.I1#RfAd6)", "bitechno_whatsapp");
				$sql = "SELECT $phoneColumn FROM $table WHERE $identifierColumn = '$recordId'";
				$res = mysqli_query($db, $sql);
	
				if ($res && mysqli_num_rows($res) > 0) {
					$row = mysqli_fetch_assoc($res);
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
	
			$data_json = json_encode($data);
			$url = 'https://whatsaapapi.onrender.com/send-template';
			$headers = array(
				'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJPd25lck5hbWUiOiJuZXctdG9rZW4iLCJpYXQiOjE3MDQ5NTEyNDJ9.2JuK2r6DWj41MCwGsa51YizWhU7kXI0fylqfwtNbs3s',
				'Content-Type: application/json',
			);
	
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_exec($ch);
// 			print_r($return);
			curl_close($ch);
		}	
// 		return $recordModels;
		
		$loadUrl = 'index.php?module='.$sourceModule.'&view=List';
		header("Location: $loadUrl");
		return $recordModels;
		
	}
}

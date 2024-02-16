<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Whatsapp_SaveAjax_Action extends Vtiger_SaveAjax_Action {

	public function checkPermission(Vtiger_Request $request) {
		$moduleName = $request->getModule();
		$record = $request->get('record');
		//Do not allow ajax edit of existing comments
		if ($record) {
			throw new AppException(vtranslate('LBL_PERMISSION_DENIED'));
		}
	}

	public function process(Vtiger_Request $request) {
		$currentUserModel = Users_Record_Model::getCurrentUserModel();
        $userId = $currentUserModel->getId();
		$request->set('assigned_user_id', $userId);
		$request->set('userid', $userId);
		
		$recordModel = $this->saveRecord($request);
		$fieldModelList = $recordModel->getModule()->getFields();
		$result = array();
		foreach ($fieldModelList as $fieldName => $fieldModel) {
			if($fieldModel->isViewable()){
				$fieldValue = $recordModel->get($fieldName);
				$result[$fieldName] = array('value' => $fieldValue, 'display_value' => $fieldModel->getDisplayValue($fieldValue));
			}
		}
		$result['id'] = $result['_recordId'] = $recordModel->getId();
		$result['_recordLabel'] = $recordModel->getName();
        
		$response = new Vtiger_Response();
		$response->setEmitType(Vtiger_Response::$EMIT_JSON);
		$response->setResult($result);
		$response->emit();
		

	}
	
	/**
	 * Function to save record
	 * @param <Vtiger_Request> $request - values of the record
	 * @return <RecordModel> - record Model of saved record
	 */
	public function saveRecord($request) {
		$recordModel = $this->getRecordModelFromRequest($request);
		$recordModel->save();
		if($request->get('relationOperation')) {
			$parentModuleName = $request->get('sourceModule');
			$parentModuleModel = Vtiger_Module_Model::getInstance($parentModuleName);
			$parentRecordId = $request->get('sourceRecord');
			$relatedModule = $recordModel->getModule();
			$relatedRecordId = $recordModel->getId();

			$relationModel = Vtiger_Relation_Model::getInstance($parentModuleModel, $relatedModule);
			$relationModel->addRelation($parentRecordId, $relatedRecordId);
		}
		return $recordModel;
	}
	
	/**
	 * Function to get the record model based on the request parameters
	 * @param Vtiger_Request $request
	 * @return Vtiger_Record_Model or Module specific Record Model instance
	 */
	public function getRecordModelFromRequest(Vtiger_Request $request) {
		$recordModel = parent::getRecordModelFromRequest($request);
		$recordModel->set('is_private', $request->get('is_private'));
	
		$commentContent = $recordModel->get('commentcontent');
		$relatedToId = $recordModel->get('related_to');
	
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
	
		$relatedToModule = getSalesEntityType($relatedToId);
	
		if (isset($moduleTableMapping[$relatedToModule])) {
			$moduleData = $moduleTableMapping[$relatedToModule];
			$table = $moduleData['table'];
			$identifierColumn = $moduleData['identifier'];
			$column = $moduleData['column'];
	
			$db = mysqli_connect("localhost", "root", "", "vtiger");
			$sql = "SELECT $column FROM $table WHERE $identifierColumn = '$relatedToId'";
			$res = mysqli_query($db, $sql);
	
			if (mysqli_num_rows($res) > 0) {
				$row = mysqli_fetch_assoc($res);
				$phone = $row[$column];
					$data = array(
					"messaging_product" => "whatsapp",
					"to" => '91' . $phone,
					"text" => array(
						"body" => $commentContent
					)
				);
				$data_json = json_encode($data);
	
				$url = 'https://midware.onrender.com/send-message';
				$headers = array(
					'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJPd25lck5hbWUiOiJrYXJhbkJCIiwiaWF0IjoxNjkyMjU2OTk5fQ.l_e0ynSm3kziO9q4xFLpdehdK9E81M6na8bb0YXt3Dw',
					'Content-Type: application/json'
				);
				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_exec($ch);
				curl_close($ch);
			}
		}
		return $recordModel;
	}
	
}
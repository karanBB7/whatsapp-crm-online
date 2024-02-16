<?php
/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */

class ModTracker_Record_Model extends Vtiger_Record_Model {

	const UPDATE = 0;
	const DELETE = 1;
	const CREATE = 2;
	const RESTORE = 3;
	const LINK = 4;
	const UNLINK = 5;

	/**
	 * Function to get the history of updates on a record
	 * @param <type> $record - Record model
	 * @param <type> $limit - number of latest changes that need to retrieved
	 * @return <array> - list of  ModTracker_Record_Model
	 */
	public static function getUpdates($parentRecordId, $pagingModel,$moduleName) {
		if($moduleName == 'Calendar') {
			if(getActivityType($parentRecordId) != 'Task') {
				$moduleName = 'Events';
			}
		}
		$db = PearDatabase::getInstance();
		$recordInstances = array();
		$startIndex = $pagingModel->getStartIndex();
		$pageLimit = $pagingModel->getPageLimit();

		if($moduleName == 'Contacts'){
			$query1 = $db->pquery("SELECT * FROM vtiger_purchaseorder INNER JOIN vtiger_contactdetails 
				ON vtiger_contactdetails.contactid = vtiger_purchaseorder.contactid 
				WHERE vtiger_purchaseorder.contactid = ?", array($parentRecordId));
			$rowsData1 = $db->num_rows($query1);
			$allCRMIds1 = $parentRecordId . ',';
			for ($i = 0; $i < $rowsData1; $i++) {
				$allCRMIds1 .= $db->query_result($query1, $i, 'purchaseorderid') . ',';
			}
			
			$query2 = $db->pquery("SELECT * FROM vtiger_potential INNER JOIN vtiger_contactdetails
				ON vtiger_contactdetails.contactid = vtiger_potential.contact_id 
				WHERE vtiger_potential.contact_id = ?", array($parentRecordId));
			$rowsData2 = $db->num_rows($query2);
			$allCRMIds2 = $parentRecordId . ',';
			for ($i = 0; $i < $rowsData2; $i++) {
				$allCRMIds2 .= $db->query_result($query2, $i, 'potentialid') . ',';
			}
			
			$query3 = $db->pquery("SELECT * FROM vtiger_salesorder INNER JOIN vtiger_contactdetails 
				ON vtiger_contactdetails.contactid = vtiger_salesorder.contactid 
				WHERE vtiger_salesorder.contactid = ?", array($parentRecordId));
			$rowsData3 = $db->num_rows($query3);
			$allCRMIds3 = $parentRecordId . ',';
			for ($i = 0; $i < $rowsData3; $i++) {
				$allCRMIds3 .= $db->query_result($query3, $i, 'salesorderid') . ',';
			}
			
			$allRecordIds = rtrim($allCRMIds1, ',') . ',' . rtrim($allCRMIds2, ',') . ',' . rtrim($allCRMIds3, ',');
			$listQuery = "SELECT * FROM vtiger_modtracker_basic WHERE crmid IN($allRecordIds) 
			ORDER BY changedon DESC LIMIT $startIndex, $pageLimit";
			$result = $db->pquery($listQuery, array());
			$rows = $db->num_rows($result);
		}else{
			$listQuery = "SELECT * FROM vtiger_modtracker_basic WHERE crmid = ? AND module = ? ".
						"ORDER BY changedon DESC LIMIT $startIndex, $pageLimit";
			$result = $db->pquery($listQuery, array($parentRecordId, $moduleName));
			$rows = $db->num_rows($result);

		}
		for ($i=0; $i<$rows; $i++) {
			$row = $db->query_result_rowdata($result, $i);
			$recordInstance = new self();
			$recordInstance->setData($row)->setParent($row['crmid'], $row['module']);
			$recordInstances[] = $recordInstance;
		}
		return $recordInstances;
	}

	function setParent($id, $moduleName) {
		if(!Vtiger_Util_Helper::checkRecordExistance($id)) {
			$this->parent = Vtiger_Record_Model::getInstanceById($id, $moduleName);
		} else {
			$this->parent = Vtiger_Record_Model::getCleanInstance($moduleName);
			$this->parent->id = $id;
			$this->parent->setId($id);
		}
	}

	function getParent() {
		return $this->parent;
	}

	function checkStatus($callerStatus) {
		$status = $this->get('status');
		if ($status == $callerStatus) {
			return true;
		}
		return false;
	}

	function isCreate() {
		return $this->checkStatus(self::CREATE);
	}

	function isUpdate() {
		return $this->checkStatus(self::UPDATE);
	}

	function isDelete() {
		return $this->checkStatus(self::DELETE);
	}

	function isRestore() {
		return $this->checkStatus(self::RESTORE);
	}

	function isRelationLink() {
		return $this->checkStatus(self::LINK);
	}

	function isRelationUnLink() {
		return $this->checkStatus(self::UNLINK);
	}

	function getModifiedBy() {
		$changeUserId = $this->get('whodid');
		return Users_Record_Model::getInstanceById($changeUserId, 'Users');
	}

	function getActivityTime() {
		return $this->get('changedon');
	}

	function getFieldInstances() {
		$id = $this->get('id');
		$db = PearDatabase::getInstance();

		$fieldInstances = array();
		if($this->isCreate() || $this->isUpdate()) {
			$result = $db->pquery('SELECT * FROM vtiger_modtracker_detail WHERE id = ?', array($id));
			$rows = $db->num_rows($result);
			for($i=0; $i<$rows; $i++) {
				$data = $db->query_result_rowdata($result, $i);
				$row = array_map('decode_html', $data);

				if($row['fieldname'] == 'record_id' || $row['fieldname'] == 'record_module') continue;

				$fieldModel = Vtiger_Field_Model::getInstance($row['fieldname'], $this->getParent()->getModule());
				if(!$fieldModel) continue;
				
				$fieldInstance = new ModTracker_Field_Model();
				$fieldInstance->setData($row)->setParent($this)->setFieldInstance($fieldModel);
				$fieldInstances[] = $fieldInstance;
			}
		}
		return $fieldInstances;
	}

	function getRelationInstance() {
		$id = $this->get('id');
		$db = PearDatabase::getInstance();

		if($this->isRelationLink() || $this->isRelationUnLink()) {
			$result = $db->pquery('SELECT * FROM vtiger_modtracker_relations WHERE id = ?', array($id));
			$row = $db->query_result_rowdata($result, 0);
			$relationInstance = new ModTracker_Relation_Model();
			$relationInstance->setData($row)->setParent($this);
		}
		return $relationInstance;
	}
        
	public static function getTotalRecordCount($recordId) {
    	$db = PearDatabase::getInstance();
        $result = $db->pquery("SELECT COUNT(*) AS count FROM vtiger_modtracker_basic WHERE crmid = ?", array($recordId));
        return $db->query_result($result, 0, 'count');
	}
}
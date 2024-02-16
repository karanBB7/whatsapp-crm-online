<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Whatsapp_DetailAjax_View extends Vtiger_IndexAjax_View {

	public function process(Vtiger_Request $request) {
		$record = $request->get('record');
		$moduleName = $request->getModule();
		$recordModel = Whatsapp_Record_Model::getInstanceById($record);
		$currentUserModel = Users_Record_Model::getCurrentUserModel();
        $whatsappModel = Vtiger_Module_Model::getInstance('Whatsapp');
		
		$viewer = $this->getViewer($request);
		$viewer->assign('CURRENTUSER', $currentUserModel);
		$viewer->assign('COMMENT', $recordModel);
		$viewer->assign('MODULE_NAME', $recordModel->getParentRecordModel()->getModuleName());
        $viewer->assign('COMMENTS_MODULE_MODEL', $whatsappModel);
		$viewer->assign('ROLLUP_STATUS', false);
		$viewer->assign('CHILDS_ROOT_PARENT_MODEL', null);
		echo $viewer->view('Commentwhatsapp.tpl', $moduleName, true);
	}
}
<?php
 /*+*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ***************************************************************************** */

class Settings_CTWhatsApp_Uninstall_Action extends Vtiger_Save_Action {
    public function process(Vtiger_Request $request) {
        global $adb, $site_URL,$root_directory;
        $Vtiger_Utils_Log = true;
		include_once('vtlib/Vtiger/Module.php');

        $array = array('CTWhatsApp','CTWhatsAppTemplates');

        foreach ($array as $key => $value) {
            $module = Vtiger_Module::getInstance($value);
    		if($module) {
    		    $module->delete();
    		}
        }

        $result = Settings_CTWhatsApp_Record_Model::deleteModuleWhatsAppRelatedData();

        $array = array('CTWhatsApp','CTWhatsAppTemplates');
		foreach ($array as $key => $value) {
			$path = $root_directory.'modules/'.$value;
			self::deleteAll($path);
			$path1 = $root_directory.'modules/Settings/'.$value;
			self::deleteAll($path1);
			$path2 = $root_directory.'layouts/v7/modules/'.$value;
			self::deleteAll($path2); 
			$path3 = $root_directory.'layouts/v7/modules/Settings/'.$value;
			self::deleteAll($path3);
		}

        $response = new Vtiger_Response();
        $response->setEmitType(Vtiger_Response::$EMIT_JSON);
        $response->setResult(array($result));
        $response->emit();
    }
	
	static function deleteAll($str) {
		$rename = $str.date("Y-m-d H:i:s");
		rename($str,$rename);
	} 
}

?>

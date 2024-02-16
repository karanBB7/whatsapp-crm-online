<?php
/* * *******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
 * ****************************************************************************** */

class Settings_CTWhatsApp_SaveConfiguration_Action extends Settings_Vtiger_Index_Action {

    public function process(Vtiger_Request $request) {
        $whatsappModuleRow = $request->get('whatsappModuleRow');
        $allocatewhatsapp = $request->get('allocatewhatsapp');
        $whatsappmanagement = $request->get('whatsappmanagement');
      
        Settings_CTWhatsApp_Record_Model::saveWhatsAppConfiguration($request);
    }
}

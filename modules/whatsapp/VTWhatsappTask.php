<?php
require_once('modules/com_vtiger_workflow/VTEntityCache.inc');
require_once('modules/com_vtiger_workflow/VTWorkflowUtils.php');
require_once('modules/com_vtiger_workflow/VTSimpleTemplate.inc');

class VTWhatsappTask extends VTTask {
    public $executeImmediately = true;

    public function getFieldNames() {
        return array('whatsapp_content', 'whatsapp_recipient');
    }

public function doTask($entity) {
    if ($this->isWhatsappIntegrationActive()) {
        global $current_user, $adb, $log;
        $ws_id = $entity->getId();
        $util = new VTWorkflowUtils();
        $admin = $util->adminUser();
        $entityCache = new VTEntityCache($admin);
        $et = new VTSimpleTemplate($this->whatsapp_recipient);
        $recipient = $et->render($entityCache, $ws_id);
        $ct = new VTSimpleTemplate($this->whatsapp_content);
        $content = $ct->render($entityCache, $ws_id);
        
        $whatsappMessage = CRMEntity::getInstance('WhatsAppMessages');
        $whatsappMessage->column_fields['whatsapp_recipient'] = $recipient;
        $whatsappMessage->column_fields['whatsapp_content'] = $content;
        $whatsappMessage->column_fields['assigned_user_id'] = $current_user->id;
        $whatsappMessage->save('WhatsAppMessages');
    }
}


    private function isWhatsappIntegrationActive() {
        return true; 
    }
}
?>

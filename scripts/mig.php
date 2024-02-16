<?php
require_once("modules/com_vtiger_workflow/include.inc");
require_once("modules/com_vtiger_workflow/tasks/VTEntityMethodTask.inc");
require_once("modules/com_vtiger_workflow/VTEntityMethodManager.inc");
require_once("include/database/PearDatabase.php");
$adb = PearDatabase::getInstance();
$emm = new VTEntityMethodManager($adb);
require_once 'vtlib/Vtiger/Module.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 

 

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('Leads');
$blockInstance = Vtiger_Block::getInstance('LBL_CUSTOM_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('job_role', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'candidate_state';
        $fieldInstance->label = 'Candidate State';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'candidate_state';
        $fieldInstance->uitype = '1';
        $fieldInstance->presence = '2';
        $fieldInstance->typeofdata = 'V~O';
        $fieldInstance->columntype = 'VARCHAR(100)';
        $blockInstance->addField($fieldInstance);
    } else {
        echo "field is already Present  <br>";
    }
} else {
    echo " block does not exits --- LBL_CUSTOM_INFORMATION -- <br>";
} 

$moduleInstance = null;
$blockInstance = null;
$fieldInstance = null;
$moduleInstance = Vtiger_Module::getInstance('WhatsappTemplate');
$blockInstance = Vtiger_Block::getInstance('LBL_CUSTOM_INFORMATION', $moduleInstance);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('description', $moduleInstance);
    if (!$fieldInstance) {
        $fieldInstance = new Vtiger_Field();
        $fieldInstance->name = 'description';
        $fieldInstance->label = 'Template Decription';
        $fieldInstance->table = $moduleInstance->basetable;
        $fieldInstance->column = 'description';
        $fieldInstance->uitype = '21';
        $fieldInstance->presence = '2';
        $fieldInstance->typeofdata = 'V~O';
        $blockInstance->addField($fieldInstance);
    } else {
        echo "field is already Present  <br>";
    }
} else {
    echo " block does not exits --- LBL_CUSTOM_INFORMATION -- <br>";
}

 
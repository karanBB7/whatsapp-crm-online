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

$MODULENAME = 'whatsapp';
global $adb;
$database = PearDatabase::getInstance();

$result = $database->pquery(
    "SELECT function_name FROM com_vtiger_workflowtasks_entitymethod WHERE module_name=? AND method_name=?",
    array($MODULENAME, 'whatsappExternalAppSync')
);

if ($database->num_rows($result) == 0) {
    $methodFile = "modules/$MODULENAME/middleware.php";
    $methodClassName = 'whatsappExternalAppSync';
    $emm->addEntityMethod($MODULENAME, $methodClassName, $methodFile, $methodClassName);
} else {
    echo "Custom method already exists for $MODULENAME module.";
}

$emm = null;

?>
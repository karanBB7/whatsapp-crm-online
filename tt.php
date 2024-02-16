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

// Define the task type details
$taskTypeName = 'VTWhatsappTask'; // The name of your task class
$taskTypeLabel = 'WhatsApp Task'; // The label for your task type
$taskTypeClass = 'VTWhatsappTask'; // The name of your task class
$taskTypeClassPath = 'modules/com_vtiger_workflow/VTWhatsappTask.php'; // The relative path to your task class file
$taskTypeMethod = 'doTask'; // The method name to be executed in your task class

// Check if the task type already exists
$query = "SELECT COUNT(*) FROM com_vtiger_workflow_tasktypes WHERE tasktypename = ?";
$params = array($taskTypeName);
$result = $adb->pquery($query, $params);
$count = $adb->query_result($result, 0, 0);

if ($count == 0) {
    // Insert the new task type
    $query = "INSERT INTO com_vtiger_workflow_tasktypes (tasktypename, label, classname, classpath, method) VALUES (?, ?, ?, ?, ?)";
    $params = array($taskTypeName, $taskTypeLabel, $taskTypeClass, $taskTypeClassPath, $taskTypeMethod);
    $adb->pquery($query, $params);
    
    echo "Task type registered successfully.\n";
} else {
    echo "Task type already exists.\n";
}

$emm = null;
?>

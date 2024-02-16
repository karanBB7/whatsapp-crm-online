<?php
include_once 'vtlib/Vtiger/Module.php';
include_once 'vtlib/Vtiger/Menu.php';
include_once 'includes/runtime/Controller.php';

$MODULENAME = 'CustomInvokeFunction';

$moduleInstance = Vtiger_Module::getInstance($MODULENAME);
if ($moduleInstance) {
    echo "$MODULENAME module already exists.";
} else {
    $moduleInstance = new Vtiger_Module();
    $moduleInstance->name = $MODULENAME;
    $moduleInstance->parent = 'Settings:Workflow';
    $moduleInstance->save();

    $moduleInstance->initTables();
    $moduleInstance->initWebservice();
    $moduleInstance->initWorkflow();
    $moduleInstance->initEmailTemplates();
    $moduleInstance->initRelatedList();
    
    // Creating the menu item
    Vtiger_Menu::addMenuItem($moduleInstance->id, 'LBL_' . strtoupper($MODULENAME), 'index.php?module=' . $MODULENAME . '&view=Index', '', 'CustomInvokeFunction', $moduleInstance->parent);
    
    echo "$MODULENAME module is created.";
}
?>

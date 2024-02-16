<?php

include_once 'vtlib/Vtiger/Module.php';
include_once 'vtlib/Vtiger/Package.php';
include_once 'includes/main/WebUI.php';

include_once 'include/Webservices/Utils.php';

$Vtiger_Utils_Log = true;

$MODULENAME = 'Expense';

$moduleInstance = new Vtiger_Module();
$moduleInstance->name = $MODULENAME;
$moduleInstance->parent = "Support";
$moduleInstance->save();

// Schema Setup
$moduleInstance->initTables();

// Webservice Setup
$moduleInstance->initWebservice();

// Field Setup
$block1 = new Vtiger_Block();
$block1->label = 'LBL_' . strtoupper($moduleInstance->name) . '_INFORMATION';
$moduleInstance->addBlock($block1);


// Filter Setup
$filter1 = new Vtiger_Filter();
$filter1->name = 'All';
$filter1->isdefault = true;
$moduleInstance->addFilter($filter1);

// Add field here using normal defination

$field = new Vtiger_Field();
$field->name = 'custom_name';
$field->table = $moduleInstance->basetable;
$field->label = 'Custom Name';
$field->column = $field->name;
$field->columntype = 'VARCHAR(100)';
$field->uitype = 1;
$field->displaytype = 1;
$field->presence = 2;
$field->typeofdata = 'V~M';
$block1->addField($field);
$filter1->addField($field, 2);

$field = new Vtiger_Field();
$field->name = 'assigned_user_id';
$field->label = 'Assigned To';
$field->table = 'vtiger_crmentity'; 
$field->column = 'smownerid';
$field->uitype = 53;
$field->displaytype = 1;
$field->presence = 2;
$field->typeofdata = 'V~M';
$block1->addField($field);

$field = new Vtiger_Field();
$field->name = 'createdtime';
$field->label = 'Created Time';
$field->table = 'vtiger_crmentity';
$field->column = 'createdtime';
$field->displaytype = 2;
$field->uitype = 70;
$field->typeofdata = 'D~O';
$block1->addField($field);

$field = new Vtiger_Field();
$field->name = 'modifiedtime';
$field->label = 'Modified Time';
$field->table = 'vtiger_crmentity';
$field->column = 'modifiedtime';
$field->displaytype = 2;
$field->uitype = 70;
$field->typeofdata = 'D~O';
$block1->addField($field);

// Sharing Access Setup
$moduleInstance->setDefaultSharing('Public');

$targetpath = 'modules/' . $moduleInstance->name;

if (! is_file($targetpath)) {
    mkdir($targetpath);

    $templatepath = 'vtlib/ModuleDir/6.0.0';

    $moduleFileContents = file_get_contents($templatepath . '/ModuleName.php');
    $replacevars = array(
        'ModuleName' => $moduleInstance->name,
        '<modulename>' => strtolower($moduleInstance->name),
        '<entityfieldlabel>' => $field1->label,
        '<entitycolumn>' => $field1->column,
        '<entityfieldname>' => $field1->name
    );

    foreach ($replacevars as $key => $value) {
        $moduleFileContents = str_replace($key, $value, $moduleFileContents);
    }
    file_put_contents($targetpath . '/' . $moduleInstance->name . '.php', $moduleFileContents);
}

if (! file_exists('languages/en_us/ModuleName.php')) {
    $ModuleLanguageContents = file_get_contents($templatepath . '/languages/en_us/ModuleName.php');

    $replaceparams = array(
        'Module Name' => $moduleInstance->name,
        'Custom' => $moduleInstance->name,
        'ModuleBlock' => $moduleInstance->name,
        'ModuleFieldLabel Text' => $field1->label
    );

    foreach ($replaceparams as $key => $value) {
        $ModuleLanguageContents = str_replace($key, $value, $ModuleLanguageContents);
    }

    $languagePath = 'languages/en_us';
    file_put_contents($languagePath . '/' . $moduleInstance->name . '.php', $ModuleLanguageContents);
}

Settings_MenuEditor_Module_Model::addModuleToApp($moduleInstance->name, $moduleInstance->parent);

echo $moduleInstance->name." is Created";

?>
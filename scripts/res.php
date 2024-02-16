<?php

include_once 'vtlib/Vtiger/Module.php';
include_once 'vtlib/Vtiger/Package.php';
include_once 'includes/main/WebUI.php';

include_once 'include/Webservices/Utils.php';

$Vtiger_Utils_Log = true;

$MODULENAME = 'whatsapp';

$moduleInstance = new Vtiger_Module();
$moduleInstance->name = $MODULENAME;
$moduleInstance->parent = "tools";
$moduleInstance->save();

// Schema Setup
$moduleInstance->initTables();

// Webservice Setup
$moduleInstance->initWebservice();

// Field Setup
$block1 = new Vtiger_Block();
$block1->label = 'LBL_' . strtoupper($moduleInstance->name) . '_INFORMATION';
$moduleInstance->addBlock($block1);

// Add fields to the module

$field1 = new Vtiger_Field();
$field1->name = 'template_name';
$field1->table = $moduleInstance->basetable;
$field1->label = 'Template Name';
$field1->column = $field1->name;
$field1->columntype = 'VARCHAR(255)';
$field1->uitype = 1;
$field1->displaytype = 1;
$field1->presence = 2;
$field1->typeofdata = 'V~M';
$block1->addField($field1);

$field2 = new Vtiger_Field();
$field2->name = 'subject';
$field2->table = $moduleInstance->basetable;
$field2->label = 'Subject';
$field2->column = $field2->name;
$field2->columntype = 'VARCHAR(255)';
$field2->uitype = 1;
$field2->displaytype = 1;
$field2->presence = 2;
$field2->typeofdata = 'V~M';
$block1->addField($field2);


$field111 = new Vtiger_Field();
$field111->name = 'description';
$field111->table = $moduleInstance->basetable;
$field111->label = 'Description';
$field111->column = $field111->name;
$field111->columntype = 'VARCHAR(255)';
$field111->uitype = 1;
$field111->displaytype = 1;
$field111->presence = 2;
$field111->typeofdata = 'V~M';
$block1->addField($field111);


// Filter Setup
$filter1 = new Vtiger_Filter();
$filter1->name = 'All';
$filter1->isdefault = true;
$moduleInstance->addFilter($filter1);

// Sharing Access Setup
$moduleInstance->setDefaultSharing('Public');

$targetpath = 'modules/' . $moduleInstance->name;

if (!is_file($targetpath)) {
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

if (!file_exists('languages/en_us/ModuleName.php')) {
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

echo $moduleInstance->name . " is Created";

?>

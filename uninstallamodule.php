<?php
include_once 'config.php';
include_once 'include/Webservices/Relation.php';
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
include_once 'vtlib/Vtiger/Module.php';
include_once 'includes/main/WebUI.php';
include_once 'vtlib/Vtiger/Module.php';
// $invoiceModule = Vtiger_Module::getInstance('Calendar');
// $invogamoduleInstance = Vtiger_Module::getInstance('BankGuarantee');
// $relationLabel  = 'Activities';
// $invogamoduleInstance->setRelatedList(
//     $invoiceModule,
//     $relationLabel,
//     array('ADD'),
//     'get_activities' //you can do select also Array('ADD','SELECT')
// );
// $Vtiger_Utils_Log = true;

$module = Vtiger_Module::getInstance('CTWhatsApp');
if ($module) $module->delete();


// function AddLinks($modulename) {
//     require_once('vtlib/Vtiger/Module.php');
//     $link_module = Vtiger_Module::getInstance($modulename);
//     //$link_module->addLink('DETAILVIEWWIDGET', 'PDFMaker', 'module=PDFMaker&action=PDFMakerAjax&file=getPDFActions&record=$RECORD$');
//     $link_module->addLink('DETAILVIEWSIDEBARWIDGET', 'PDFMaker', 'module=PDFMaker&view=GetPDFActions&record=$RECORD$');
//     if ($modulename != "Events") $link_module->addLink('LISTVIEWMASSACTION', 'PDF Export', 'javascript:PDFMaker_Actions_Js.getPDFListViewPopup2(this,\'$MODULE$\');');
//     // remove non-standardly created links (difference in linkicon column makes the links twice when updating from previous version)
//     global $adb;
//     $tabid = getTabId($modulename);
//     $res = $adb->pquery("SELECT * FROM vtiger_links WHERE tabid=? AND linktype=? AND linklabel=? AND linkurl=? ORDER BY linkid DESC", array($tabid, 'DETAILVIEWWIDGET', 'PDFMaker', 'module=PDFMaker&action=PDFMakerAjax&file=getPDFActions&record=$RECORD$'));
//     $i = 0;
//     while ($row = $adb->fetchByAssoc($res)) {
//         $i++;
//         if ($i > 1)
//             $adb->pquery("DELETE FROM vtiger_links WHERE linkid=?", array($row['linkid']));
//     }
//     $res = $adb->pquery("SELECT * FROM vtiger_links WHERE tabid=? AND linktype=? AND linklabel=? AND linkurl=? ORDER BY linkid DESC", array($tabid, 'LISTVIEWMASSACTION', 'PDF Export', 'javascript:getPDFListViewPopup2(this,\'$MODULE$\');'));
//     $i = 0;
//     while ($row = $adb->fetchByAssoc($res)) {
//         $i++;
//         if ($i > 1)
//             $adb->pquery("DELETE FROM vtiger_links WHERE linkid=?", array($row['linkid']));
//     }
    
//     if ($modulename == "Calendar") $this->AddLinks('Events');
// }

// AddLinks("ServiceReport");
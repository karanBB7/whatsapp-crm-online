<?php
/* Smarty version 3.1.39, created on 2023-09-27 10:36:27
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Settings\CTWhatsAppBusiness\ConfigurationEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_651405ab6606c3_97218101',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '961574c356622aaa1d3c398963b50fb457705e19' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Settings\\CTWhatsAppBusiness\\ConfigurationEdit.tpl',
      1 => 1695618369,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_651405ab6606c3_97218101 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="detailViewContainer" id="WhatsappConfiguration"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="clearfix"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h3 style="margin-top: 0px;"><?php echo vtranslate('LBL_WHATSAPP_CONFIGURATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3></div><div class="pull-right"><span><a href="https://kb.crmtiger.com/article-categories/whatsapp-business-integration-for-vtiger/" target="_blank" title="<?php echo vtranslate('LBL_HELP',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"><img src="layouts/v7/modules/Settings/CTWhatsAppBusiness/images/help.png" style="width: 26px;"></a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="hide" href="#" data-toggle="modal" data-target="#whatsapppolicy" style="color: blue;"><?php echo vtranslate('WHATSAPP_POLICY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a><button class="btn btn-addbutton"><a class="cancelLink" href="javascript:history.back()" type="reset"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></center></button></div></div><hr><div style="float: left;width: 65%;"><div class="block"><form id="EditView" action="index.php" method="post" class="form-horizontal"><input type="hidden" name="module" value="CTWhatsAppBusiness" /><input type="hidden" name="parent" value="Settings" /><input type="hidden" name="action" value="SaveConfiguration" /><br><input type="hidden" name="whatsappstatus" value="<?php echo $_smarty_tpl->tpl_vars['WHATSAPPSTATUS']->value;?>
" /><br><input type="hidden" name="configureUserid" value="<?php echo $_smarty_tpl->tpl_vars['CONFIGURATIONUSERID']->value;?>
" /><br><?php if ($_smarty_tpl->tpl_vars['ADDMOREUSERS']->value != 1) {?><div class="clearfix hide"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4 style="margin-top: 0px;"><?php echo vtranslate('LBL_WHATSAPP_INFORMATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h4></div></div><hr><table class="table editview-table no-border hide"><tbody><tr><td class="fieldLabel alignMiddle" style="width: 25%;"><?php echo vtranslate('API_KEY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 <span class="redColor">*</span></td><td class="fieldValue"><input type="text" class="inputElement" name="api_url" id="api_url" value="<?php echo $_smarty_tpl->tpl_vars['APIURL']->value;?>
" style="width: 100%;" required></td></tr></tbody></table><div class="clearfix"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4 style="margin-top: 0px;"><?php echo vtranslate('LBL_ACCESS_MODULE_TO_WHATSAPP',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h4></div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><button class="btn btn-success btn-sm addNewWPField" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button></div></div><hr><table class="table editview-table no-border"><?php if (count($_smarty_tpl->tpl_vars['ALLLOWMODULES']->value) == 0) {?><span><b><?php echo vtranslate('LBL_SELECT_MODULE_ERROR',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b></span><?php } else { ?><thead><tr><th class="fieldLabel alignMiddle" style="width: 200px;"><?php echo vtranslate('MODULES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th class="fieldLabel alignMiddle" style="width: 200px;"><?php echo vtranslate('WHATSAPP_NO_FIELD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th class="fieldLabel alignMiddle" style="width: 200px;"><?php echo vtranslate('ACTIVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th class="fieldLabel alignMiddle" style="width: 200px;"></th></tr></thead><?php }?><tbody><input type="hidden" name="whatsappModuleRow" value="<?php echo count($_smarty_tpl->tpl_vars['ALLLOWMODULES']->value);?>
"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALLLOWMODULES']->value, 'ALLLOWMODULES_VALUE', false, 'ALLLOWMODULES_KEY');
$_smarty_tpl->tpl_vars['ALLLOWMODULES_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ALLLOWMODULES_KEY']->value => $_smarty_tpl->tpl_vars['ALLLOWMODULES_VALUE']->value) {
$_smarty_tpl->tpl_vars['ALLLOWMODULES_VALUE']->do_else = false;
?><tr><td class="fieldLabel alignMiddle" style="width: 200px;"><?php echo vtranslate($_smarty_tpl->tpl_vars['ALLLOWMODULES_KEY']->value,$_smarty_tpl->tpl_vars['ALLLOWMODULES_KEY']->value);?>
</td><td class="fieldLabel alignMiddle" style="width: 200px;"><?php echo vtranslate($_smarty_tpl->tpl_vars['ALLLOWMODULES_VALUE']->value['fieldlabel'],$_smarty_tpl->tpl_vars['ALLLOWMODULES_KEY']->value);?>
</td><td class="fieldLabel alignMiddle" style="width: 200px;"><?php if ($_smarty_tpl->tpl_vars['ALLLOWMODULES_VALUE']->value['active'] == 1) {
echo vtranslate('LBL_YES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
} else {
echo vtranslate('LBL_NO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
}?></td><td class="fieldLabel alignMiddle" style="width:200px;"><a id="deletedWhatsappModule" data-whatsappModuleName="<?php echo $_smarty_tpl->tpl_vars['ALLLOWMODULES_KEY']->value;?>
"><i class="fa fa-trash" aria-hidden="true"></i></a> &nbsp;&nbsp;<a id="editWhatsappModule" data-whatsappModuleName="<?php echo $_smarty_tpl->tpl_vars['ALLLOWMODULES_KEY']->value;?>
"><i class="fa fa-edit" aria-hidden="true"></i></a></td></tr><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></tbody></table><br><br><div class="clearfix"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4 style="margin-top: 0px;"><?php echo vtranslate('LBL_WHATSAPP_MODULE_NUMBERTO_ACCESS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h4></div></div><hr><?php }?><table class="table editview-table no-border"><tbody><tr class="hide"><td class="fieldLabel alignMiddle" style="width: 25%;"><label class=""><?php echo vtranslate('WHATSAPPMANAGEMENT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></td><td><input type="hidden" id="wpManagement" value="<?php echo $_smarty_tpl->tpl_vars['WHATSAPPMANAGEMENT']->value;?>
"><select name="whatsappmanagement" id="whatsappmanagement" style="width: 100%;" class="inputElement select2"><!-- <option value="singleWhatsapp" <?php if ($_smarty_tpl->tpl_vars['WHATSAPPMULTIPLE']->value == 'singleWhatsapp') {?> selected <?php }
if ($_smarty_tpl->tpl_vars['WHATSAPPMANAGEMENT']->value == 'singleWhatsapp') {?> selected <?php }?>><?php echo vtranslate('SINGLE_WHATSAPP',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option> --><option value="multipleWhatsapp" <?php if ($_smarty_tpl->tpl_vars['WHATSAPPMULTIPLE']->value == 'multipleWhatsapp') {?> selected <?php }
if ($_smarty_tpl->tpl_vars['WHATSAPPMANAGEMENT']->value == 'multipleWhatsapp') {?> selected <?php }?>><?php echo vtranslate('MULTIPLE_WHATSAPP',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option></select></td></tr><tr class="multipleUserSelect"><input type="hidden" name="multi" id="multi" value="<?php echo $_smarty_tpl->tpl_vars['WHATSAPPMULTIPLE']->value;?>
"><td colspan="3"><b><?php echo vtranslate('MULTIPLE_WHATSAPP_NOTES1',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b><button class="btn btn-success addScanUsers" type="button" style="float: right;margin: -4px -46px 7px 8px;"><i class="fa fa-plus"></i></button></td></tr><tr><td></td><td colspan="4"><hr></td></tr><tr class="multipleUserSelect hide"><td></td><td><b><?php echo vtranslate('MW_LABEL1',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b></td><td><b><?php echo vtranslate('MW_LABEL2',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b></td><td><b><?php echo vtranslate('MW_ACTIVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b></td></tr><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MAINSUBUSERS']->value, 'MAINSUBUSERS_VALUE', false, 'MAINSUBUSERS_KEY');
$_smarty_tpl->tpl_vars['MAINSUBUSERS_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['MAINSUBUSERS_KEY']->value => $_smarty_tpl->tpl_vars['MAINSUBUSERS_VALUE']->value) {
$_smarty_tpl->tpl_vars['MAINSUBUSERS_VALUE']->do_else = false;
?><tr class="multipleUserSelect hide"><td></td><td><a href="index.php?module=Users&view=PreferenceDetail&parent=Settings&record=<?php echo $_smarty_tpl->tpl_vars['MAINSUBUSERS_VALUE']->value['userid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['MAINSUBUSERS_VALUE']->value['userName'];?>
(<?php echo $_smarty_tpl->tpl_vars['MAINSUBUSERS_VALUE']->value['whatsappno'];?>
)</a></td><td title="<?php echo $_smarty_tpl->tpl_vars['MAINSUBUSERS_VALUE']->value['subUserName'];?>
" style="overflow: hidden;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;height: 60px;"><?php echo $_smarty_tpl->tpl_vars['MAINSUBUSERS_VALUE']->value['subUserName'];?>
</td><td><?php if ($_smarty_tpl->tpl_vars['MAINSUBUSERS_VALUE']->value['active'] == 1) {?> <?php echo vtranslate('LBL_YES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 <?php } else { ?> <?php echo vtranslate('LBL_NO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 <?php }?></td></tr><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?><tr class="singleUserSelect <?php if ($_smarty_tpl->tpl_vars['WHATSAPPMANAGEMENT']->value == 'multipleWhatsapp') {?> hide <?php }?>"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value, 'BLOCK_FIELDS', false, 'BLOCK_LABEL', 'EditViewBlockLevelLoop', array (
));
$_smarty_tpl->tpl_vars['BLOCK_FIELDS']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['BLOCK_LABEL']->value => $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value) {
$_smarty_tpl->tpl_vars['BLOCK_FIELDS']->do_else = false;
if (count($_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value) <= 0) {
continue 1;
}
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value, 'FIELD_MODEL', false, 'FIELD_NAME', 'blockfields', array (
));
$_smarty_tpl->tpl_vars['FIELD_MODEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_NAME']->value => $_smarty_tpl->tpl_vars['FIELD_MODEL']->value) {
$_smarty_tpl->tpl_vars['FIELD_MODEL']->do_else = false;
if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('label') == 'Assigned To') {?><td class="fieldLabel alignMiddle" style="width: 25%;"><label class=""><?php echo vtranslate('ASSIGNTO',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></td><td><?php $_smarty_tpl->_subTemplateRender(vtemplate_path($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getUITypeModel()->getTemplateName(),$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('BLOCK_FIELDS'=>$_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value), 0, true);
?></td><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></tr></tbody></table><?php if ($_smarty_tpl->tpl_vars['ADDMOREUSERS']->value != 1) {?><br><br><div class="clearfix"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4 style="margin-top: 0px;"><?php echo vtranslate('LBL_GENERAL_SEETINGS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h4></div></div><hr><table class="table editview-table no-border"><tbody><tr><td class="fieldLabel alignMiddle" style="width: 25%;"><?php echo vtranslate('CUSTOMFIELD1',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 <a href="#" data-toggle="modal" data-target="#exampleModalCenter"><span class="fa fa-question-circle"></span></a><br><?php echo vtranslate('COUNRTYCODEINFO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td><td class="fieldValue"><input type="text" class="inputElement" name="customfield1" id="customfield1" value="<?php echo $_smarty_tpl->tpl_vars['CUSTOMFIELD1']->value;?>
" style="width: 100%;"></td></tr><tr><td class="fieldLabel alignMiddle" style="width: 25%;"><?php echo vtranslate('LBL_THEME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td><td class="fieldValue"><select class="inputElement select2 select2-offscreen" id="theme_view" name="theme_view" style="width: 50%;"><option value=""><?php echo vtranslate('LBL_SELECT_AN_OPTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option><option value="RTL" <?php if ($_smarty_tpl->tpl_vars['THEME']->value == 'RTL') {?> selected <?php }?>><?php echo vtranslate('LBL_RTL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option><option value="LTR" <?php if ($_smarty_tpl->tpl_vars['THEME']->value == 'LTR' || $_smarty_tpl->tpl_vars['THEME']->value == '') {?> selected <?php }?>><?php echo vtranslate('LBL_LTR',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option></select></td></tr><tr class=""><td class="fieldLabel alignMiddle" style="width: 25%;"><?php echo vtranslate('LBL_SHOWUNKNOWNMESSAGES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#nonAdminUnknown"><span class="fa fa-question-circle"></span></a></td><td class="fieldValue"><input type="checkbox" name="showunknownmsg" id="showunknownmsg" <?php if ($_smarty_tpl->tpl_vars['SHOWUNKNOWNMSG']->value == 1) {?> checked <?php }?>></td></tr><tr class=""><td class="fieldLabel alignMiddle" style="width: 25%;"><?php echo vtranslate('LBL_ACTIVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td><td class="fieldValue"><input type="checkbox" class="inputElement" name="iconactive" id="iconactive" <?php if ($_smarty_tpl->tpl_vars['ICONACTIVE']->value == 1) {?> checked <?php }?>></td></tr><tr class="hide"><td class="fieldLabel alignMiddle" style="width: 25%;"><?php echo vtranslate('LBL_NOTIFICATION_TONE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td><td class="fieldValue"><select class="inputElement select2 select2-offscreen" id="notificationtone" name="notificationtone" style="width: 50%;"><option value=""><?php echo vtranslate('LBL_SELECT_AN_OPTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option><option <?php if ($_smarty_tpl->tpl_vars['NOTIFICATIONTON']->value == 'layouts/v7/modules/CTWhatsAppBusiness/Whatsapp Default.mp3') {?> selected <?php }?> value="layouts/v7/modules/CTWhatsAppBusiness/Whatsapp Default.mp3">WhatsApp Default</option><option <?php if ($_smarty_tpl->tpl_vars['NOTIFICATIONTON']->value == 'layouts/v7/modules/CTWhatsAppBusiness/Hangout Message.mp3') {?> selected <?php }?> value="layouts/v7/modules/CTWhatsAppBusiness/Hangout Message.mp3">Hangout Message</option><option<?php if ($_smarty_tpl->tpl_vars['NOTIFICATIONTON']->value == 'silent') {?> selected <?php }?> value="silent"><?php echo vtranslate('LBL_SILENT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option></select></td></tr><tr class=""><td class="fieldLabel alignMiddle" style="width: 25%;"><?php echo vtranslate('LBL_WHATSAPPLOG',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td><td class="fieldValue"><input type="checkbox" class="inputElement" name="whatsapplog" id="whatsapplog" <?php if ($_smarty_tpl->tpl_vars['WHATSAPPLOG']->value == 1) {?> checked <?php }?>></td></tr><tr class="hide"><td class="fieldLabel alignMiddle" style="width: 25%;"><?php echo vtranslate('LBL_WHATSAPPNOTIFICATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td><td class="fieldValue"><input type="checkbox" class="inputElement" name="notification" id="notification" <?php if ($_smarty_tpl->tpl_vars['WHATSAPPNOTIFICATION']->value == 1) {?> checked <?php }?>></td></tr><tr class="hide"><td class="fieldLabel alignMiddle" style="width: 25%;"><?php echo vtranslate('Bot Ideal Time',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td><td class="fieldValue"><select class="inputElement select2 select2-offscreen" id="botidealtime" name="botidealtime" style="width: 50%;"><option value=""><?php echo vtranslate('LBL_SELECT_AN_OPTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MANUALDATETIME']->value, 'MANUALDATETIME_VALUE', false, 'MANUALDATETIME_KEY');
$_smarty_tpl->tpl_vars['MANUALDATETIME_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['MANUALDATETIME_KEY']->value => $_smarty_tpl->tpl_vars['MANUALDATETIME_VALUE']->value) {
$_smarty_tpl->tpl_vars['MANUALDATETIME_VALUE']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['MANUALDATETIME_VALUE']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['BOTDEALTIME']->value == $_smarty_tpl->tpl_vars['MANUALDATETIME_VALUE']->value) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['MANUALDATETIME_VALUE']->value;?>
 <?php echo vtranslate('Minutes',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></td></tr></tbody></table><br><br><div class="clearfix"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4 style="margin-top: 0px;"><?php echo vtranslate('LBL_AUTO_MESSAGE_RESPONDER',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h4></div></div><hr><table class="table editview-table no-border"><tbody><tr><td class="fieldLabel alignMiddle" style="width: 25%;"><?php echo vtranslate('LBL_AUTORESPONDER',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td><td class="fieldValue"><input type="checkbox" name="autoresponder" id="autoresponder" <?php if ($_smarty_tpl->tpl_vars['AUTORESPONDER']->value == 1) {?> checked <?php }?>></td></tr><tr><td class="fieldLabel alignMiddle" style="width: 25%;"><?php echo vtranslate('LBL_AUTORESPONDERTEXT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td><td class="fieldValue"><textarea name="autoresponder_text" style="width: 100%;height: 85px;"><?php echo $_smarty_tpl->tpl_vars['AUTORESPONDERTEXT']->value;?>
</textarea><label><b><?php echo vtranslate('LBL_AUTORESPONDER_LABEL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b></label></td></tr></tbody></table><br><br><br><br><div class="clearfix"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h4 style="margin-top: 0px;"><?php echo vtranslate('LBL_MASS_CONFIGURATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h4></div></div><hr><table class="table editview-table no-border"><tbody><tr><td class="fieldLabel alignMiddle" style="width: 25%;"><?php echo vtranslate('LBL_BATCHSIZE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#batchInformation"><span class="fa fa-question-circle"></span></a></td><td class="fieldValue"><select class="inputElement select2 select2-offscreen" id="batch" name="batch" style="width: 50%;"><option value=""><?php echo vtranslate('LBL_SELECT_AN_OPTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALLBATCH']->value, 'ALLBATCH_VALUE', false, 'ALLBATCH_KEY');
$_smarty_tpl->tpl_vars['ALLBATCH_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ALLBATCH_KEY']->value => $_smarty_tpl->tpl_vars['ALLBATCH_VALUE']->value) {
$_smarty_tpl->tpl_vars['ALLBATCH_VALUE']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['ALLBATCH_VALUE']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['SELECTBATCH']->value == $_smarty_tpl->tpl_vars['ALLBATCH_VALUE']->value) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['ALLBATCH_VALUE']->value;?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></td></tr><tr><td class="fieldLabel alignMiddle" style="width: 25%;"><?php echo vtranslate('LBL_TIMEINTERVAL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#timeIntervalInformation"><span class="fa fa-question-circle"></span></a></td><td class="fieldValue"><select class="inputElement select2 select2-offscreen" id="timeinterval" name="timeinterval" style="width: 50%;"><option value=""><?php echo vtranslate('LBL_SELECT_AN_OPTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALLTIMEINTERVAL']->value, 'ALLTIMEINTERVAL_VALUE', false, 'ALLTIMEINTERVAL_KEY');
$_smarty_tpl->tpl_vars['ALLTIMEINTERVAL_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ALLTIMEINTERVAL_KEY']->value => $_smarty_tpl->tpl_vars['ALLTIMEINTERVAL_VALUE']->value) {
$_smarty_tpl->tpl_vars['ALLTIMEINTERVAL_VALUE']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['ALLTIMEINTERVAL_VALUE']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['SELECTTIMEINTERVAL']->value == $_smarty_tpl->tpl_vars['ALLTIMEINTERVAL_VALUE']->value) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['ALLTIMEINTERVAL_VALUE']->value;?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></td></tr></tbody></table><br><br><div class="row-fluid"><div class="span12"><span><center><button class="btn btn-success" id="submit_button" type="submit"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button><a class="cancelLink" href="javascript:history.back()" type="reset"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></center></span><br></div></div><?php }?></form></div></div><div style="float: right;width: 30%;border: 1px solid;background-color: #fffce9;"><div class="block" style="background-color: #fffce9;"><br><div class="clearfix"><div><h5><b><?php echo vtranslate('WHATSAPP_POLICY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b></h5></div></div><hr><p><b><?php echo vtranslate('POLICYINFORMATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 <a href="https://www.whatsapp.com/legal/business-policy/" style="color: blue;" target="_blank"><?php echo vtranslate('WHATSAPP_POLICY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a> <?php echo vtranslate('POLICYINFORMATION1',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b></p></div></div></div></div><div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"><div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLongTitle"><?php echo vtranslate('COUNTRYCODE_POPUP',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><span><b><?php echo vtranslate('COUNTRYCODE_POPUP0',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 : </b> <?php echo vtranslate('COUNTRYCODE_POPUP1',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<br><?php echo vtranslate('COUNTRYCODE_POPUP2',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span><ul><li><b><?php echo vtranslate('COUNTRYCODE_POPUP3',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b> <?php echo vtranslate('COUNTRYCODE_POPUP4',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<br/></li><li><b><?php echo vtranslate('COUNTRYCODE_POPUP5',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b> <?php echo vtranslate('COUNTRYCODE_POPUP6',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li></ul></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo vtranslate('CLOSE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button></div></div></div></div><div class="modal fade" id="batchInformation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"><div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLongTitle"><?php echo vtranslate('LBL_MASS_CONFIGURATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><span><?php echo vtranslate('BATCHINFORMATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span><br><span><?php echo vtranslate('RANDOMINFORMATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span><br></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo vtranslate('LBL_CLOSE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button></div></div></div></div><div class="modal fade" id="timeIntervalInformation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"><div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLongTitle"><?php echo vtranslate('LBL_MASS_CONFIGURATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><span><?php echo vtranslate('TIMEINTREVALINFORMATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span><br></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo vtranslate('CLOSE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button></div></div></div></div><div class="modal fade" id="nonAdminUnknown" tabindex="-1" role="dialog" aria-labelledby="nonAdminUnknown" aria-hidden="true"><div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLongTitle"><?php echo vtranslate('LBL_SHOWUNKNOWNMESSAGES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><span><?php echo vtranslate('LBL_UNKNOWNINFORMATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo vtranslate('CLOSE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button></div></div></div></div><div class="modal fade" id="whatsapppolicy" tabindex="-1" role="dialog" aria-labelledby="whatsapppolicy" aria-hidden="true"><div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLongTitle"><?php echo vtranslate('WHATSAPP_POLICY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" style="background-color:  yellow;"><span><?php echo vtranslate('POLICYINFORMATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo vtranslate('CLOSE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button></div></div></div></div>

<?php echo '<script'; ?>
 type="text/javascript">
  	//<!--Add new functionality-->
	$( document ).ready(function() {
		var wpManagement = jQuery('#wpManagement').val();
		if(wpManagement == 'multipleWhatsapp'){
			jQuery('.multipleUserSelect').removeClass('hide');
		}else{
			jQuery('.multipleUserSelect').addClass('hide');
		}
	});
	//<!--Add new functionality-->

<?php echo '</script'; ?>
>

<?php }
}

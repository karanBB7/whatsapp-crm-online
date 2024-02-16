<?php
/* Smarty version 3.1.39, created on 2023-11-28 04:41:56
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\PurchaseOrder\uitypes\Text.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65656f94773442_34382087',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38dd929ec82599a75b17803edcd863764730ebe7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\PurchaseOrder\\uitypes\\Text.tpl',
      1 => 1696922942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65656f94773442_34382087 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('FIELD_INFO', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldInfo());
$_smarty_tpl->_assignInScope('SPECIAL_VALIDATOR', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getValidator());
$_smarty_tpl->_assignInScope('FIELD_NAME', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('name'));
if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') == '19' || $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') == '20') {?><textarea rows="3" id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_editView_fieldName_<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" class="inputElement textAreaElement col-lg-12 <?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isNameField()) {?>nameField<?php }?>" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldName();?>
" <?php if ($_smarty_tpl->tpl_vars['FIELD_NAME']->value == "notecontent") {?>id="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
"<?php }?> <?php if (!empty($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value)) {?>data-validator='<?php echo Zend_Json::encode($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value);?>
'<?php }
if ($_smarty_tpl->tpl_vars['FIELD_INFO']->value["mandatory"] == true) {?> data-rule-required="true" <?php }
if (php7_count($_smarty_tpl->tpl_vars['FIELD_INFO']->value['validator'])) {?>data-specific-rules='<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['FIELD_INFO']->value["validator"]);?>
'<?php }?>><?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue');?>
</textarea><?php } else {
if ($_REQUEST['view'] != 'Detail') {
$_smarty_tpl->_assignInScope('blockLabel', $_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value['LBL_PO_INFORMATION']);
$_smarty_tpl->_assignInScope('fieldModel', $_smarty_tpl->tpl_vars['blockLabel']->value['accountid']);
$_smarty_tpl->_assignInScope('pickList', array(''=>'LBL_SELECT_ADDRESS_OPTION','company'=>'LBL_COMPANY_ADDRESS','account'=>'LBL_ACCOUNT_ADDRESS','vendor'=>'LBL_VENDOR_ADDRESS','contact'=>'LBL_CONTACT_ADDRESS'));
if ($_smarty_tpl->tpl_vars['FIELD_NAME']->value == "bill_street") {
$_tmp_array = isset($_smarty_tpl->tpl_vars['pickList']) ? $_smarty_tpl->tpl_vars['pickList']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array['bill'] = 'Shipping Address';
$_smarty_tpl->_assignInScope('pickList', $_tmp_array);?><div style="margin-bottom:5px;"><select id="BillingAddress" name="BillingAddress" data-target="bill" class="select2"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pickList']->value, 'value', false, 'keys');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['keys']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
if ($_smarty_tpl->tpl_vars['keys']->value == 'vendor' || $_smarty_tpl->tpl_vars['keys']->value == 'contact' || $_smarty_tpl->tpl_vars['keys']->value == 'account') {
$_smarty_tpl->_assignInScope('modl', ucfirst(($_smarty_tpl->tpl_vars['keys']->value).("s")));
if (vtlib_isModuleActive($_smarty_tpl->tpl_vars['modl']->value)) {?><option value="<?php echo $_smarty_tpl->tpl_vars['keys']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php }
} else { ?><option value="<?php echo $_smarty_tpl->tpl_vars['keys']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></div><?php } elseif ($_smarty_tpl->tpl_vars['FIELD_NAME']->value == "ship_street") {
$_tmp_array = isset($_smarty_tpl->tpl_vars['pickList']) ? $_smarty_tpl->tpl_vars['pickList']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array['ship'] = 'LBL_BILLING_ADDRESS';
$_smarty_tpl->_assignInScope('pickList', $_tmp_array);?><div style="margin-bottom:5px;"><select id="ShippingAddress" name="ShippingAddress" data-target="ship" class="select2" ><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pickList']->value, 'value', false, 'keys');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['keys']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
if ($_smarty_tpl->tpl_vars['keys']->value == 'vendor' || $_smarty_tpl->tpl_vars['keys']->value == 'contact' || $_smarty_tpl->tpl_vars['keys']->value == 'account') {
$_smarty_tpl->_assignInScope('modl', ucfirst(($_smarty_tpl->tpl_vars['keys']->value).("s")));
if (vtlib_isModuleActive($_smarty_tpl->tpl_vars['modl']->value)) {?><option value="<?php echo $_smarty_tpl->tpl_vars['keys']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php }
} else { ?><option value="<?php echo $_smarty_tpl->tpl_vars['keys']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></div><?php }
}?><textarea rows="5" id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_editView_fieldName_<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" class="inputElement <?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isNameField()) {?>nameField<?php }?>" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldName();?>
" <?php if (!empty($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value)) {?>data-validator='<?php echo Zend_Json::encode($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value);?>
'<?php }
if ($_smarty_tpl->tpl_vars['FIELD_INFO']->value["mandatory"] == true) {?> data-rule-required="true" <?php }
if (php7_count($_smarty_tpl->tpl_vars['FIELD_INFO']->value['validator'])) {?>data-specific-rules='<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['FIELD_INFO']->value["validator"]);?>
'<?php }?>><?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue');?>
</textarea><?php }
}
}

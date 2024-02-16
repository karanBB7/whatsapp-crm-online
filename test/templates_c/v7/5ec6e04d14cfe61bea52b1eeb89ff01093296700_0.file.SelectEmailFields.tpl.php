<?php
/* Smarty version 3.1.39, created on 2023-08-31 09:32:36
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Vtiger\SelectEmailFields.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_64f05e34e7f779_17999762',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ec6e04d14cfe61bea52b1eeb89ff01093296700' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Vtiger\\SelectEmailFields.tpl',
      1 => 1669872319,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64f05e34e7f779_17999762 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\vtigercrm\\libraries\\Smarty\\libs\\plugins\\function.counter.php','function'=>'smarty_function_counter',),));
?>

<div id="sendEmailContainer" class="modal-dialog"><form class="form-horizontal" id="SendEmailFormStep1" method="post" action="index.php"><div class="modal-content"><?php ob_start();
echo vtranslate('LBL_SELECT_EMAIL_IDS',$_smarty_tpl->tpl_vars['MODULE']->value);
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender(vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('TITLE'=>$_prefixVariable1), 0, true);
?><div class="modal-body"><input type="hidden" name="selected_ids" value=<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['SELECTED_IDS']->value);?>
 /><input type="hidden" name="excluded_ids" value=<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['EXCLUDED_IDS']->value);?>
 /><input type="hidden" name="viewname" value="<?php echo $_smarty_tpl->tpl_vars['VIEWNAME']->value;?>
" /><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
"/><input type="hidden" name="view" value="ComposeEmail"/><input type="hidden" name="search_key" value= "<?php echo $_smarty_tpl->tpl_vars['SEARCH_KEY']->value;?>
" /><input type="hidden" name="operator" value="<?php echo $_smarty_tpl->tpl_vars['OPERATOR']->value;?>
" /><input type="hidden" name="search_value" value="<?php echo $_smarty_tpl->tpl_vars['ALPHABET_VALUE']->value;?>
" /><input type="hidden" name="tag_params" value=<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['TAG_PARAMS']->value);?>
><?php if ($_smarty_tpl->tpl_vars['SEARCH_PARAMS']->value) {?><input type="hidden" name="search_params" value='<?php echo Vtiger_Util_Helper::toSafeHTML(ZEND_JSON::encode($_smarty_tpl->tpl_vars['SEARCH_PARAMS']->value));?>
' /><?php }?><input type="hidden" name="fieldModule" value=<?php echo $_smarty_tpl->tpl_vars['SOURCE_MODULE']->value;?>
 /><input type="hidden" name="to" value='<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['TO']->value);?>
' /><input type="hidden" name="source_module" value="<?php echo $_smarty_tpl->tpl_vars['SELECTED_EMAIL_SOURCE_MODULE']->value;?>
" /><?php if (!empty($_smarty_tpl->tpl_vars['PARENT_MODULE']->value)) {?><input type="hidden" name="sourceModule" value="<?php echo $_smarty_tpl->tpl_vars['PARENT_MODULE']->value;?>
" /><input type="hidden" name="sourceRecord" value="<?php echo $_smarty_tpl->tpl_vars['PARENT_RECORD']->value;?>
" /><input type="hidden" name="parentModule" value="<?php echo $_smarty_tpl->tpl_vars['RELATED_MODULE']->value;?>
" /><?php }?><input type="hidden" name="prefsNeedToUpdate" id="prefsNeedToUpdate" value="<?php echo $_smarty_tpl->tpl_vars['PREF_NEED_TO_UPDATE']->value;?>
" /><div id="multiEmailContainer" style="padding-left:20px;"><?php echo smarty_function_counter(array('start'=>0,'skip'=>1,'assign'=>"count"),$_smarty_tpl);
if ($_smarty_tpl->tpl_vars['EMAIL_FIELDS_INFO']->value) {
if ($_smarty_tpl->tpl_vars['RECORDS_COUNT']->value > 1) {?><input type="hidden" name="emailSource" value="ListView" /><?php echo smarty_function_counter(array('start'=>0,'skip'=>1,'assign'=>"count"),$_smarty_tpl);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['EMAIL_FIELDS']->value, 'EMAIL_FIELD', false, 'EMAIL_FIELD_NAME');
$_smarty_tpl->tpl_vars['EMAIL_FIELD']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['EMAIL_FIELD_NAME']->value => $_smarty_tpl->tpl_vars['EMAIL_FIELD']->value) {
$_smarty_tpl->tpl_vars['EMAIL_FIELD']->do_else = false;
?><label class="checkbox" style="padding-left: 7%;"><input type="checkbox" class="emailField" name="selectedFields[<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
]" data-moduleName="<?php echo $_smarty_tpl->tpl_vars['EMAIL_FIELD']->value->getModule()->getName();?>
" value='<?php echo Vtiger_Functions::jsonEncode(array('field'=>$_smarty_tpl->tpl_vars['EMAIL_FIELD_NAME']->value,'field_id'=>$_smarty_tpl->tpl_vars['EMAIL_FIELD']->value->getId(),'module_id'=>$_smarty_tpl->tpl_vars['EMAIL_FIELD']->value->getModule()->getId()));?>
' <?php if ($_smarty_tpl->tpl_vars['EMAIL_FIELD']->value->get('isPreferred')) {?>checked="true"<?php }?>/>&nbsp;&nbsp;<?php echo vtranslate($_smarty_tpl->tpl_vars['EMAIL_FIELD']->value->get('label'),$_smarty_tpl->tpl_vars['SOURCE_MODULE']->value);?>
</label><?php echo smarty_function_counter(array(),$_smarty_tpl);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['EMAIL_FIELDS_INFO']->value, 'RECORD_INFO', false, 'EMAIL_MODULE');
$_smarty_tpl->tpl_vars['RECORD_INFO']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['EMAIL_MODULE']->value => $_smarty_tpl->tpl_vars['RECORD_INFO']->value) {
$_smarty_tpl->tpl_vars['RECORD_INFO']->do_else = false;
?><div class="control-group"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RECORD_INFO']->value, 'EMAIL_FIELDS', false, 'RECORD_ID');
$_smarty_tpl->tpl_vars['EMAIL_FIELDS']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['RECORD_ID']->value => $_smarty_tpl->tpl_vars['EMAIL_FIELDS']->value) {
$_smarty_tpl->tpl_vars['EMAIL_FIELDS']->do_else = false;
ob_start();
echo decode_html(textlength_check(Vtiger_Util_Helper::getRecordName($_smarty_tpl->tpl_vars['RECORD_ID']->value)));
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('RECORD_LABEL', $_prefixVariable2);
if ($_smarty_tpl->tpl_vars['RECORDS_COUNT']->value > 1) {?><h5><?php echo $_smarty_tpl->tpl_vars['RECORD_LABEL']->value;?>
</h5><?php }
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['EMAIL_FIELDS']->value, 'EMAIL_FIELD', false, 'EMAIL_VALUE');
$_smarty_tpl->tpl_vars['EMAIL_FIELD']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['EMAIL_VALUE']->value => $_smarty_tpl->tpl_vars['EMAIL_FIELD']->value) {
$_smarty_tpl->tpl_vars['EMAIL_FIELD']->do_else = false;
?><label class="checkbox" style="<?php if ($_smarty_tpl->tpl_vars['RECORDS_COUNT']->value > 1) {?>padding-left: 7%;<?php }?> font-weight:normal"><input type="checkbox" class="emailField" name="selectedFields[<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
]" data-moduleName="<?php echo $_smarty_tpl->tpl_vars['EMAIL_MODULE']->value;?>
" value='<?php echo Vtiger_Functions::jsonEncode(array('record'=>$_smarty_tpl->tpl_vars['RECORD_ID']->value,'field_value'=>$_smarty_tpl->tpl_vars['EMAIL_VALUE']->value,'record_label'=>$_smarty_tpl->tpl_vars['RECORD_LABEL']->value,'field_id'=>$_smarty_tpl->tpl_vars['EMAIL_FIELD']->value->getId(),'module_id'=>$_smarty_tpl->tpl_vars['EMAIL_FIELD']->value->getModule()->getId()));?>
' <?php if ($_smarty_tpl->tpl_vars['EMAIL_FIELD']->value->get('isPreferred')) {?>checked="true"<?php }?>/>&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['EMAIL_VALUE']->value;?>
<span class="muted">&nbsp;-<?php echo vtranslate($_smarty_tpl->tpl_vars['EMAIL_FIELD']->value->get('label'),$_smarty_tpl->tpl_vars['SOURCE_MODULE']->value);?>
</span></label><?php echo smarty_function_counter(array(),$_smarty_tpl);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}?></div><?php if ($_smarty_tpl->tpl_vars['RELATED_LOAD']->value == true) {?><input type="hidden" name="relatedLoad" value=<?php echo $_smarty_tpl->tpl_vars['RELATED_LOAD']->value;?>
 /><?php }?></div><div class="preferenceDiv" style="padding: 0px 0px 10px 35px;"><label class="checkbox displayInlineBlock"><input type="checkbox" name="saveRecipientPrefs" id="saveRecipientPrefs" <?php if ($_smarty_tpl->tpl_vars['RECIPIENT_PREF_ENABLED']->value) {?>checked="true"<?php }?>/>&nbsp;&nbsp;&nbsp;<?php echo vtranslate('LBL_REMEMBER_MY_PREF',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;&nbsp;</label><i class="fa fa-info-circle" title="<?php echo vtranslate('LBL_EDIT_EMAIL_PREFERENCE_TOOLTIP',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"></i></div><?php ob_start();
echo vtranslate('LBL_SELECT',$_smarty_tpl->tpl_vars['MODULE']->value);
$_prefixVariable3 = ob_get_clean();
$_smarty_tpl->_subTemplateRender(vtemplate_path("ModalFooter.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('BUTTON_NAME'=>$_prefixVariable3), 0, true);
?></div></form></div>


<?php }
}

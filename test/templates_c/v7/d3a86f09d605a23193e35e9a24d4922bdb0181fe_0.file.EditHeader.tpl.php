<?php
/* Smarty version 3.1.39, created on 2023-11-29 13:04:52
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Settings\MailConverter\EditHeader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_656736f411a0b0_74902974',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3a86f09d605a23193e35e9a24d4922bdb0181fe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Settings\\MailConverter\\EditHeader.tpl',
      1 => 1696922942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_656736f411a0b0_74902974 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="editViewPageDiv mailBoxEditDiv viewContent"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><input type="hidden" id="create" value="<?php echo $_smarty_tpl->tpl_vars['CREATE']->value;?>
" /><input type="hidden" id="recordId" value="<?php echo $_smarty_tpl->tpl_vars['RECORD_ID']->value;?>
" /><input type="hidden" id="step" value="<?php echo $_smarty_tpl->tpl_vars['STEP']->value;?>
" /><h4><?php if ($_smarty_tpl->tpl_vars['CREATE']->value == 'new') {
echo vtranslate('LBL_ADDING_NEW_MAILBOX',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
} else {
echo vtranslate('LBL_EDIT_MAILBOX',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
}?></h4><hr><div class="editViewContainer" style="padding-left: 2%;padding-right: 2%"><div class="row"><?php $_smarty_tpl->_assignInScope('BREADCRUMB_LABELS', array("step1"=>"MAILBOX_DETAILS","step2"=>"SELECT_FOLDERS"));
if ($_smarty_tpl->tpl_vars['CREATE']->value == 'new') {
$_tmp_array = isset($_smarty_tpl->tpl_vars['BREADCRUMB_LABELS']) ? $_smarty_tpl->tpl_vars['BREADCRUMB_LABELS']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array['step3'] = 'ADD_RULES';
$_smarty_tpl->_assignInScope('BREADCRUMB_LABELS', $_tmp_array);
}
$_smarty_tpl->_subTemplateRender(vtemplate_path("BreadCrumbs.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('BREADCRUMB_LABELS'=>$_smarty_tpl->tpl_vars['BREADCRUMB_LABELS']->value,'MODULE'=>$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), 0, true);
?></div><div class="clearfix"></div><?php }
}

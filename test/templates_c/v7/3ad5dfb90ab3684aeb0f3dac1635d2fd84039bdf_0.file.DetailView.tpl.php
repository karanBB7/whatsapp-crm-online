<?php
/* Smarty version 3.1.39, created on 2023-07-25 04:52:22
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Settings\Webforms\DetailView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_64bf55060a0f94_79446196',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ad5dfb90ab3684aeb0f3dac1635d2fd84039bdf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Settings\\Webforms\\DetailView.tpl',
      1 => 1689932167,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64bf55060a0f94_79446196 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="detailViewContainer"><div class="col-sm-12"><?php $_smarty_tpl->_subTemplateRender(vtemplate_path("DetailViewHeader.tpl",'Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('MODULE_NAME'=>$_smarty_tpl->tpl_vars['MODULE_NAME']->value), 0, true);
$_smarty_tpl->_subTemplateRender(vtemplate_path('DetailViewBlockView.tpl','Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value,'MODULE_NAME'=>$_smarty_tpl->tpl_vars['MODULE_NAME']->value), 0, true);
$_smarty_tpl->_subTemplateRender(vtemplate_path('FieldsDetailView.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value,'MODULE_NAME'=>$_smarty_tpl->tpl_vars['MODULE_NAME']->value), 0, true);
?></div></div></div></div><?php }
}

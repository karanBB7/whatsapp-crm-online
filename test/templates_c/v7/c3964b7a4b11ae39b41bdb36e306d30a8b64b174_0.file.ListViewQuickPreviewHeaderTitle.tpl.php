<?php
/* Smarty version 3.1.39, created on 2023-11-22 05:12:15
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Vtiger\ListViewQuickPreviewHeaderTitle.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_655d8daf577214_02798364',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c3964b7a4b11ae39b41bdb36e306d30a8b64b174' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Vtiger\\ListViewQuickPreviewHeaderTitle.tpl',
      1 => 1696922942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_655d8daf577214_02798364 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('QUICK_PREVIEW', "true");
$_smarty_tpl->_subTemplateRender(vtemplate_path("DetailViewHeaderTitle.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('MODULE_MODEL'=>$_smarty_tpl->tpl_vars['MODULE_MODEL']->value,'RECORD'=>$_smarty_tpl->tpl_vars['RECORD']->value), 0, true);
}
}

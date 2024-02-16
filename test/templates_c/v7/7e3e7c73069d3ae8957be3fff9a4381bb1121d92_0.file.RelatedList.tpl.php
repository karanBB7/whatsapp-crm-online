<?php
/* Smarty version 3.1.39, created on 2023-11-22 09:52:12
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Products\RelatedList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_655dcf4c9896d9_80195625',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e3e7c73069d3ae8957be3fff9a4381bb1121d92' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Products\\RelatedList.tpl',
      1 => 1696922942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_655dcf4c9896d9_80195625 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(vtemplate_path('RelatedList.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
$_smarty_tpl->_assignInScope('RELATED_MODULE_NAME', $_smarty_tpl->tpl_vars['RELATED_MODULE']->value->get('name'));
if ($_smarty_tpl->tpl_vars['MODULE']->value == 'Products' && $_smarty_tpl->tpl_vars['RELATED_MODULE_NAME']->value == 'Products' && $_smarty_tpl->tpl_vars['TAB_LABEL']->value === 'Product Bundles' && $_smarty_tpl->tpl_vars['RELATED_LIST_LINKS']->value && $_smarty_tpl->tpl_vars['PARENT_RECORD']->value->isBundle()) {?><div class="bundleCostContainer"><?php if ($_smarty_tpl->tpl_vars['SUB_PRODUCTS_COSTS_INFO']->value) {
$_smarty_tpl->_subTemplateRender(vtemplate_path('BundleCostView.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}?></div><?php }
}
}

<?php
/* Smarty version 3.1.39, created on 2024-02-15 06:26:43
  from '/home2/bitechnosys/whatsapp.crm-doctor.com/layouts/v7/modules/Vtiger/DetailViewHeader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65cdaea3ea99a9_52232682',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6effb4393625b55148cd53c9c2f5405cf3ae6f11' => 
    array (
      0 => '/home2/bitechnosys/whatsapp.crm-doctor.com/layouts/v7/modules/Vtiger/DetailViewHeader.tpl',
      1 => 1703696228,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65cdaea3ea99a9_52232682 (Smarty_Internal_Template $_smarty_tpl) {
?><div class=" detailview-header-block"><div class="detailview-header"><div class="row"><?php $_smarty_tpl->_subTemplateRender(vtemplate_path("DetailViewHeaderTitle.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
$_smarty_tpl->_subTemplateRender(vtemplate_path("DetailViewActions.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></div></div><?php }
}

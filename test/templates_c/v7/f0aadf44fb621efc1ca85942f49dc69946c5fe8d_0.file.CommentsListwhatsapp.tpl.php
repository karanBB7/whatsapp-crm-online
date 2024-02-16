<?php
/* Smarty version 3.1.39, created on 2024-02-15 06:26:49
  from '/home2/bitechnosys/whatsapp.crm-doctor.com/layouts/v7/modules/Vtiger/CommentsListwhatsapp.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65cdaea99d0610_99241731',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0aadf44fb621efc1ca85942f49dc69946c5fe8d' => 
    array (
      0 => '/home2/bitechnosys/whatsapp.crm-doctor.com/layouts/v7/modules/Vtiger/CommentsListwhatsapp.tpl',
      1 => 1703696228,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65cdaea99d0610_99241731 (Smarty_Internal_Template $_smarty_tpl) {
?> <?php $_smarty_tpl->_assignInScope('IS_CREATABLE', $_smarty_tpl->tpl_vars['COMMENTS_MODULE_MODEL']->value->isPermitted('CreateView'));
$_smarty_tpl->_assignInScope('IS_EDITABLE', $_smarty_tpl->tpl_vars['COMMENTS_MODULE_MODEL']->value->isPermitted('EditView'));
if (!empty($_smarty_tpl->tpl_vars['PARENT_COMMENTS']->value)) {?><ul class="unstyled"><?php if ($_smarty_tpl->tpl_vars['CURRENT_COMMENT']->value) {
$_smarty_tpl->_assignInScope('CHILDS_ROOT_PARENT_MODEL', $_smarty_tpl->tpl_vars['CURRENT_COMMENT']->value);
$_smarty_tpl->_assignInScope('CURRENT_COMMENT_PARENT_MODEL', $_smarty_tpl->tpl_vars['CURRENT_COMMENT']->value->getParentCommentModel());
while ($_smarty_tpl->tpl_vars['CURRENT_COMMENT_PARENT_MODEL']->value != false) {
$_smarty_tpl->_assignInScope('TEMP_COMMENT', $_smarty_tpl->tpl_vars['CURRENT_COMMENT_PARENT_MODEL']->value);
$_smarty_tpl->_assignInScope('CURRENT_COMMENT_PARENT_MODEL', $_smarty_tpl->tpl_vars['CURRENT_COMMENT_PARENT_MODEL']->value->getParentCommentModel());
if ($_smarty_tpl->tpl_vars['CURRENT_COMMENT_PARENT_MODEL']->value == false) {
$_smarty_tpl->_assignInScope('CHILDS_ROOT_PARENT_MODEL', $_smarty_tpl->tpl_vars['TEMP_COMMENT']->value);
}
}
}
if (is_array($_smarty_tpl->tpl_vars['PARENT_COMMENTS']->value)) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PARENT_COMMENTS']->value, 'COMMENT', false, 'Index');
$_smarty_tpl->tpl_vars['COMMENT']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['Index']->value => $_smarty_tpl->tpl_vars['COMMENT']->value) {
$_smarty_tpl->tpl_vars['COMMENT']->do_else = false;
$_smarty_tpl->_assignInScope('PARENT_COMMENT_ID', $_smarty_tpl->tpl_vars['COMMENT']->value->getId());?><li class="commentDetails"><?php $_smarty_tpl->_subTemplateRender(vtemplate_path('Commentwhatsapp.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('COMMENT'=>$_smarty_tpl->tpl_vars['COMMENT']->value,'COMMENT_MODULE_MODEL'=>$_smarty_tpl->tpl_vars['COMMENTS_MODULE_MODEL']->value), 0, true);
if ($_smarty_tpl->tpl_vars['CHILDS_ROOT_PARENT_MODEL']->value) {
if ($_smarty_tpl->tpl_vars['CHILDS_ROOT_PARENT_MODEL']->value->getId() == $_smarty_tpl->tpl_vars['PARENT_COMMENT_ID']->value) {
$_smarty_tpl->_assignInScope('CHILD_COMMENTS_MODEL', $_smarty_tpl->tpl_vars['CHILDS_ROOT_PARENT_MODEL']->value->getChildComments());
$_smarty_tpl->_subTemplateRender(vtemplate_path('CommentsListIteration.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('CHILD_COMMENTS_MODEL'=>$_smarty_tpl->tpl_vars['CHILD_COMMENTS_MODEL']->value), 0, true);
}
}?></li><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else {
$_smarty_tpl->_subTemplateRender(vtemplate_path('Commentwhatsapp.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('COMMENT'=>$_smarty_tpl->tpl_vars['PARENT_COMMENTS']->value), 0, true);
}?></ul><?php } else { ?><div class="noCommentsMsgContainer" style='padding:20px;'><p class="textAlignCenter">No Messages Sent</p></div><?php }?>
    <?php }
}

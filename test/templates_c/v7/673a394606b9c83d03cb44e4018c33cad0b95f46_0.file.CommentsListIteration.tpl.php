<?php
/* Smarty version 3.1.39, created on 2023-09-27 11:38:07
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Vtiger\CommentsListIteration.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6514141fe59948_81007622',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '673a394606b9c83d03cb44e4018c33cad0b95f46' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Vtiger\\CommentsListIteration.tpl',
      1 => 1669872319,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6514141fe59948_81007622 (Smarty_Internal_Template $_smarty_tpl) {
if (!empty($_smarty_tpl->tpl_vars['CHILD_COMMENTS_MODEL']->value)) {?><ul class="unstyled"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CHILD_COMMENTS_MODEL']->value, 'COMMENT');
$_smarty_tpl->tpl_vars['COMMENT']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['COMMENT']->value) {
$_smarty_tpl->tpl_vars['COMMENT']->do_else = false;
?><li class="commentDetails" <?php if ($_smarty_tpl->tpl_vars['COMMENT']->value->get('is_private')) {?>style="background: #fff9ea;"<?php }?>><?php $_smarty_tpl->_subTemplateRender(vtemplate_path('CommentThreadList.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('COMMENT'=>$_smarty_tpl->tpl_vars['COMMENT']->value), 0, true);
$_smarty_tpl->_assignInScope('CHILD_COMMENTS', $_smarty_tpl->tpl_vars['COMMENT']->value->getChildComments());
if (!empty($_smarty_tpl->tpl_vars['CHILD_COMMENTS']->value)) {
$_smarty_tpl->_subTemplateRender(vtemplate_path('CommentsListIteration.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('CHILD_COMMENTS_MODEL'=>$_smarty_tpl->tpl_vars['COMMENT']->value->getChildComments()), 0, true);
}?></li><br><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul><?php }
}
}

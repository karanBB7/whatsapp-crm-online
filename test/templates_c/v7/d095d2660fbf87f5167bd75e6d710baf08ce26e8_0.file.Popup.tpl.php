<?php
/* Smarty version 3.1.39, created on 2023-11-28 11:01:54
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Settings\Roles\Popup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6565c8a2bca741_58199703',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd095d2660fbf87f5167bd75e6d710baf08ce26e8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Settings\\Roles\\Popup.tpl',
      1 => 1696922942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6565c8a2bca741_58199703 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="modal-dialog modal-lg"><div class="modal-content"><?php ob_start();
echo vtranslate('LBL_ASSIGN_ROLE',"Settings:Roles");
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender(vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('TITLE'=>$_prefixVariable1), 0, true);
?><div class="modal-body"><div id="popupPageContainer" class="contentsDiv padding30px"><div class="clearfix treeView"><ul><li data-role="<?php echo $_smarty_tpl->tpl_vars['ROOT_ROLE']->value->getParentRoleString();?>
" data-roleid="<?php echo $_smarty_tpl->tpl_vars['ROOT_ROLE']->value->getId();?>
"><div class="toolbar-handle"><a href="javascript:;" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['ROOT_ROLE']->value->getName();?>
</a></div><?php $_smarty_tpl->_assignInScope('ROLE', $_smarty_tpl->tpl_vars['ROOT_ROLE']->value);
$_smarty_tpl->_subTemplateRender(vtemplate_path("RoleTree.tpl","Settings:Roles"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></li></ul></div></div></div></div></div>
<?php }
}

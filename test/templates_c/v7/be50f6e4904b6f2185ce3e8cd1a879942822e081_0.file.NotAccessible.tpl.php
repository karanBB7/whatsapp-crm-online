<?php
/* Smarty version 3.1.39, created on 2023-10-25 10:13:36
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Vtiger\NotAccessible.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6538ea5002d232_59771924',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be50f6e4904b6f2185ce3e8cd1a879942822e081' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Vtiger\\NotAccessible.tpl',
      1 => 1696922942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6538ea5002d232_59771924 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="sendSmsContainer" class='modal-xs modal-dialog'>
    <div class = "modal-content">
        <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('TITLE'=>$_smarty_tpl->tpl_vars['TITLE']->value), 0, true);
?>

        <div class="modal-body">
        	<?php echo $_smarty_tpl->tpl_vars['BODY']->value;?>

    	</div>

    	<div class="modal-footer">
    	</div>
    </div>
</div><?php }
}

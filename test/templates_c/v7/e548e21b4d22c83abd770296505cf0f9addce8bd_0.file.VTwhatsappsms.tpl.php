<?php
/* Smarty version 3.1.39, created on 2023-09-08 11:32:50
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Settings\Workflows\Tasks\VTwhatsappsms.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_64fb0662d519a1_05680959',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e548e21b4d22c83abd770296505cf0f9addce8bd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Settings\\Workflows\\Tasks\\VTwhatsappsms.tpl',
      1 => 1694172577,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64fb0662d519a1_05680959 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row-fluid"><div class="span2"><?php echo vtranslate('LBL_RECEPIENTS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<span class="redColor">*</span></div><div class="span8 row-fluid"><input type="text" class="span5 fields form-control" data-validation-engine="validate[required]" name="whatsapp_recipient" value="<?php echo $_smarty_tpl->tpl_vars['whatsapp_recipient']->value;?>
" /></div></div><div class="row-fluid"><div class="span2"><?php echo vtranslate('LBL_WHATSAPP_MESSAGE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<span class="redColor">*</span></div><textarea name="whatsapp_content" class="span8 fields form-control"><?php echo $_smarty_tpl->tpl_vars['whatsapp_content']->value;?>
</textarea></div>
<?php }
}

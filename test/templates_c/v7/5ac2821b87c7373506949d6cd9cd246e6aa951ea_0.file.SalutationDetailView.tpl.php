<?php
/* Smarty version 3.1.39, created on 2024-02-15 06:26:44
  from '/home2/bitechnosys/whatsapp.crm-doctor.com/layouts/v7/modules/Vtiger/uitypes/SalutationDetailView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65cdaea411b248_33543123',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ac2821b87c7373506949d6cd9cd246e6aa951ea' => 
    array (
      0 => '/home2/bitechnosys/whatsapp.crm-doctor.com/layouts/v7/modules/Vtiger/uitypes/SalutationDetailView.tpl',
      1 => 1703696230,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65cdaea411b248_33543123 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('salutationtype');?>


<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getDisplayValue($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue'),$_smarty_tpl->tpl_vars['RECORD']->value->getId(),$_smarty_tpl->tpl_vars['RECORD']->value);
}
}

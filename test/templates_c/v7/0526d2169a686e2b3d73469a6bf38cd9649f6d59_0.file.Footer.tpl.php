<?php
/* Smarty version 3.1.39, created on 2024-02-15 05:44:50
  from 'C:\wamp64\www\vtigercrm\layouts\v7\modules\Vtiger\Footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65cda4d28cb0c3_64913573',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0526d2169a686e2b3d73469a6bf38cd9649f6d59' => 
    array (
      0 => 'C:\\wamp64\\www\\vtigercrm\\layouts\\v7\\modules\\Vtiger\\Footer.tpl',
      1 => 1703654827,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65cda4d28cb0c3_64913573 (Smarty_Internal_Template $_smarty_tpl) {
?>
<footer class="app-footer">
	<p>
	Copyright © 2012 – 2023 BIZTECHNOSYS. All Rights Reserved.
	</p>
</footer>
</div>
<div id='overlayPage'>
	<!-- arrow is added to point arrow to the clicked element (Ex:- TaskManagement), 
	any one can use this by adding "show" class to it -->
	<div class='arrow'></div>
	<div class='data'>
	</div>
</div>
<div id='helpPageOverlay'></div>
<div id="js_strings" class="hide noprint"><?php echo Zend_Json::encode($_smarty_tpl->tpl_vars['LANGUAGE_STRINGS']->value);?>
</div>
<div id="maxListFieldsSelectionSize" class="hide noprint"><?php echo $_smarty_tpl->tpl_vars['MAX_LISTFIELDS_SELECTION_SIZE']->value;?>
</div>
<div class="modal myModal fade"></div>
<?php $_smarty_tpl->_subTemplateRender(vtemplate_path('JSResources.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
</body>

</html>
<?php }
}

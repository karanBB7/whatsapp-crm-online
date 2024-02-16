<?php
/* Smarty version 3.1.39, created on 2023-11-29 13:07:30
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Documents\partials\Menubar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_656737929727c9_44063183',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6516b9581850cd08ea6e9eba44ec06a8f542bf25' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Documents\\partials\\Menubar.tpl',
      1 => 1696922942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_656737929727c9_44063183 (Smarty_Internal_Template $_smarty_tpl) {
if ($_REQUEST['view'] == 'Detail') {?>
<div id="modules-menu" class="modules-menu">    
    <ul>
        <li class="active">
            <a href="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getListViewUrl();?>
">
				<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getModuleIcon();?>

                <span><?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
</span>
            </a>
        </li>
    </ul>
</div>
<?php }
}
}

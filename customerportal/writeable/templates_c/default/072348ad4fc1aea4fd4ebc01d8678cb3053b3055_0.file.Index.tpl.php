<?php
/* Smarty version 3.1.39, created on 2023-08-09 06:33:55
  from 'C:\xampp\htdocs\vtigercrm\customerportal\layouts\default\templates\Portal\Index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_64d317336d9821_80269131',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '072348ad4fc1aea4fd4ebc01d8678cb3053b3055' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\customerportal\\layouts\\default\\templates\\Portal\\Index.tpl',
      1 => 1669294712,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64d317336d9821_80269131 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container-fluid"  ng-controller="<?php echo portal_componentjs_class($_smarty_tpl->tpl_vars['MODULE']->value,'IndexView_Component');?>
">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php $_smarty_tpl->_subTemplateRender(portal_template_resolve($_smarty_tpl->tpl_vars['MODULE']->value,"partials/IndexContentBefore.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            <?php $_smarty_tpl->_subTemplateRender(portal_template_resolve($_smarty_tpl->tpl_vars['MODULE']->value,"partials/IndexContent.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            <?php $_smarty_tpl->_subTemplateRender(portal_template_resolve($_smarty_tpl->tpl_vars['MODULE']->value,"partials/IndexContentAfter.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        </div>
    </div>
</div>
<?php }
}

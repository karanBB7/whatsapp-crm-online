<?php
/* Smarty version 3.1.39, created on 2023-11-29 13:05:00
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Vtiger\SearchResults.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_656736fca49f76_66791470',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2fb459861792fa1b7847beef5318ce46314ff1d4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Vtiger\\SearchResults.tpl',
      1 => 1696922942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_656736fca49f76_66791470 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript" src="<?php echo vresource_url('layouts/v7/modules/Vtiger/resources/List.js');?>
"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo vresource_url('layouts/v7/modules/Vtiger/resources/SearchList.js');?>
"><?php echo '</script'; ?>
><div id="searchResults-container" class="modal-body" style="padding:0!important"><div class="col-lg-12 clearfix"><div class="pull-right overlay-close"><button type="button" class="close" aria-label="Close" data-target="#overlayPage" data-dismiss="modal"><span aria-hidden="true" class="fa fa-close"></span></button></div></div><div class="searchResults"><input type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SEARCH_VALUE']->value, ENT_QUOTES, 'UTF-8', true);?>
" id="searchValue"><div class="scrollableSearchContent"><div class="container-fluid moduleResults-container"><input type="hidden" name="groupStart" value="<?php echo $_smarty_tpl->tpl_vars['GROUP_START']->value;?>
" class="groupStart"/><?php $_smarty_tpl->_assignInScope('NORECORDS', false);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MATCHING_RECORDS']->value, 'LISTVIEW_MODEL', false, 'MODULE');
$_smarty_tpl->tpl_vars['LISTVIEW_MODEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['MODULE']->value => $_smarty_tpl->tpl_vars['LISTVIEW_MODEL']->value) {
$_smarty_tpl->tpl_vars['LISTVIEW_MODEL']->do_else = false;
$_smarty_tpl->_assignInScope('RECORDS_COUNT', $_smarty_tpl->tpl_vars['LISTVIEW_MODEL']->value->recordsCount);
$_smarty_tpl->_assignInScope('PAGING_MODEL', $_smarty_tpl->tpl_vars['LISTVIEW_MODEL']->value->pagingModel);
$_smarty_tpl->_assignInScope('LISTVIEW_HEADERS', $_smarty_tpl->tpl_vars['LISTVIEW_MODEL']->value->listViewHeaders);
$_smarty_tpl->_assignInScope('LISTVIEW_ENTRIES', $_smarty_tpl->tpl_vars['LISTVIEW_MODEL']->value->listViewEntries);
$_smarty_tpl->_assignInScope('MODULE_MODEL', $_smarty_tpl->tpl_vars['LISTVIEW_MODEL']->value->getModule());
$_smarty_tpl->_assignInScope('QUICK_PREVIEW_ENABLED', $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isQuickPreviewEnabled());
$_smarty_tpl->_subTemplateRender(vtemplate_path("ModuleSearchResults.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('SEARCH_MODE_RESULTS'=>true), 0, true);
?><br><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if (!$_smarty_tpl->tpl_vars['MATCHING_RECORDS']->value) {?><div class="emptyRecordsDiv"><div class="emptyRecordsContent"><?php echo vtranslate("LBL_NO_RECORDS_FOUND");?>
</div></div><?php }?></div></div></div></div><?php }
}

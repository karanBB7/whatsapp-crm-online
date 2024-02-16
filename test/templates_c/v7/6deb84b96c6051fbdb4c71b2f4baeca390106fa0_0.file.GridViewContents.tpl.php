<?php
/* Smarty version 3.1.39, created on 2023-08-23 11:09:06
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\EmailTemplates\GridViewContents.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_64e5e8d24a5d28_56542927',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6deb84b96c6051fbdb4c71b2f4baeca390106fa0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\EmailTemplates\\GridViewContents.tpl',
      1 => 1689932129,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64e5e8d24a5d28_56542927 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(vtemplate_path("PicklistColorMap.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<div class="col-sm-12 col-xs-12 ">

	<input type="hidden" name="view" id="view" value="<?php echo $_smarty_tpl->tpl_vars['VIEW']->value;?>
" />
	<input type="hidden" name="cvid" value="<?php echo $_smarty_tpl->tpl_vars['VIEWID']->value;?>
" />
	<input type="hidden" name="pageStartRange" id="pageStartRange" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getRecordStartRange();?>
" />
	<input type="hidden" name="pageEndRange" id="pageEndRange" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getRecordEndRange();?>
" />
	<input type="hidden" name="previousPageExist" id="previousPageExist" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->isPrevPageExists();?>
" />
	<input type="hidden" name="nextPageExist" id="nextPageExist" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->isNextPageExists();?>
" />
	<input type="hidden" name="alphabetSearchKey" id="alphabetSearchKey" value= "<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getAlphabetSearchField();?>
" />
	<input type="hidden" name="Operator" id="Operator" value="<?php echo $_smarty_tpl->tpl_vars['OPERATOR']->value;?>
" />
	<input type="hidden" name="totalCount" id="totalCount" value="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_COUNT']->value;?>
" />
	<input type='hidden' name="pageNumber" value="<?php echo $_smarty_tpl->tpl_vars['PAGE_NUMBER']->value;?>
" id='pageNumber'>
	<input type='hidden' name="pageLimit" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getPageLimit();?>
" id='pageLimit'>
	<input type="hidden" name="noOfEntries" value="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value;?>
" id="noOfEntries">
	<input type="hidden" name="currentSearchParams" value="<?php echo Vtiger_Util_Helper::toSafeHTML(Zend_JSON::encode($_smarty_tpl->tpl_vars['SEARCH_DETAILS']->value));?>
" id="currentSearchParams" />
	<input type="hidden" name="noFilterCache" value="<?php echo $_smarty_tpl->tpl_vars['NO_SEARCH_PARAMS_CACHE']->value;?>
" id="noFilterCache" >
	<input type="hidden" name="orderBy" value="<?php echo $_smarty_tpl->tpl_vars['ORDER_BY']->value;?>
" id="orderBy">
	<input type="hidden" name="sortOrder" value="<?php echo $_smarty_tpl->tpl_vars['SORT_ORDER']->value;?>
" id="sortOrder">
	<input type="hidden" name="list_headers" value='<?php echo $_smarty_tpl->tpl_vars['LIST_HEADER_FIELDS']->value;?>
'/>
	<input type="hidden" name="tag" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_TAG']->value;?>
" />
	<input type="hidden" name="folder_id" value="<?php echo $_smarty_tpl->tpl_vars['FOLDER_ID']->value;?>
" />
	<input type="hidden" name="folder_value" value="<?php echo $_smarty_tpl->tpl_vars['FOLDER_VALUE']->value;?>
" />
        <input type="hidden" name="viewType" value="<?php echo $_smarty_tpl->tpl_vars['VIEWTYPE']->value;?>
" />
	<?php if (!$_smarty_tpl->tpl_vars['SEARCH_MODE_RESULTS']->value) {?>
		<?php $_smarty_tpl->_subTemplateRender(vtemplate_path("ListViewActions.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
	<?php }?>

	<div class="table-container" style="padding:5px;border: 0px;">
            <ul class="thumbnails">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES']->value, 'LISTVIEW_ENTRY', false, NULL, 'listview', array (
));
$_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value) {
$_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->do_else = false;
?>
                <?php $_smarty_tpl->_assignInScope('IS_EDITABLE', $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('systemtemplate'));?>
                <?php $_smarty_tpl->_assignInScope('TEMPLATE_PATH', $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('templatepath'));?>
                <?php $_smarty_tpl->_assignInScope('TEMPLATE_NAME', $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('templatename'));?>
                <?php $_smarty_tpl->_assignInScope('TEMPLATE_ID', $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('templateid'));?>
                 <li class="positionRel textCenter">
                    <div class="templateName" title="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_NAME']->value;?>
" style="position: relative;margin-bottom: 5px;overflow: hidden;"><p class="ellipsis"><?php echo $_smarty_tpl->tpl_vars['TEMPLATE_NAME']->value;?>
</p></div>
                    <div class="thumbnail cursorPointer positionRel" data-value="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_ID']->value;?>
" data-label="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_NAME']->value;?>
" style='border: 1px solid #ddd;'>
                            <div class="imageDiv">
                                <img src="test/template_imgfiles/<?php if (!empty($_smarty_tpl->tpl_vars['TEMPLATE_PATH']->value)) {
echo $_smarty_tpl->tpl_vars['TEMPLATE_PATH']->value;
} else { ?>default.png<?php }?>"  data-value="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_ID']->value;?>
" style="width:216px;height:277px;"/>
                            <div class="hide" style="display: block; width: 100%;position: absolute;bottom:0;">
                                <button class="btn btn-default previewTemplate" style="width:49%;" data-value="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_ID']->value;?>
" data-mode="templates" data-label="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_NAME']->value;?>
">
                                    <i class="fa fa-eye cursorPointer" title="Preview"></i>&nbsp;Preview
                                </button>
                                <button class="btn btn-default editTemplate" style="width:49%;" data-value="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_ID']->value;?>
" data-mode="templates" data-label="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_NAME']->value;?>
">
                                    <i class="fa fa-check-circle cursorPointer" title="Edit template" ></i>&nbsp;Select
                                </button>
                            </div>
                    </div>
                </li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>   
</div><?php }
}

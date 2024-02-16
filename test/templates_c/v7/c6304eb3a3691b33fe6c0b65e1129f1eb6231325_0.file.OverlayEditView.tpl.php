<?php
/* Smarty version 3.1.39, created on 2023-11-27 10:20:49
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Inventory\OverlayEditView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65646d811b1d06_94974552',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6304eb3a3691b33fe6c0b65e1129f1eb6231325' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Inventory\\OverlayEditView.tpl',
      1 => 1696922942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65646d811b1d06_94974552 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript" src="<?php echo vresource_url('layouts/v7/modules/Inventory/resources/Edit.js');?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['MODULE']->value;
$_prefixVariable1 = ob_get_clean();
echo vresource_url((('layouts/v7/modules/').($_prefixVariable1)).('/resources/Edit.js'));?>
"><?php echo '</script'; ?>
>

<div class='fc-overlay-modal overlayEdit'>
    <div class = "modal-content">
        <div class="overlayHeader">
            <?php ob_start();
echo vtranslate('LBL_EDITING',$_smarty_tpl->tpl_vars['MODULE']->value);
$_prefixVariable2=ob_get_clean();
ob_start();
echo vtranslate($_smarty_tpl->tpl_vars['SINGLE_MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE']->value);
$_prefixVariable3=ob_get_clean();
$_smarty_tpl->_assignInScope('TITLE', $_prefixVariable2." ".$_prefixVariable3." ".((string)$_smarty_tpl->tpl_vars['RECORD_STRUCTURE_MODEL']->value->getRecordName()));?>
            <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        </div>
        <form class="form-horizontal recordEditView" id="EditView" name="edit" method="post" action="index.php" enctype="multipart/form-data">
            <div class = "modal-body editViewBody">
                <div class="editViewContents">
                    <?php $_smarty_tpl->_assignInScope('WIDTHTYPE', $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('rowheight'));?>
                    <?php ob_start();
echo $_smarty_tpl->tpl_vars['MODULE']->value;
$_prefixVariable4 = ob_get_clean();
$_smarty_tpl->_assignInScope('QUALIFIED_MODULE_NAME', $_prefixVariable4);?>
                    <?php $_smarty_tpl->_assignInScope('IS_PARENT_EXISTS', strpos($_smarty_tpl->tpl_vars['MODULE']->value,":"));?>
                    <?php if ($_smarty_tpl->tpl_vars['IS_PARENT_EXISTS']->value) {?>
                        <?php $_smarty_tpl->_assignInScope('SPLITTED_MODULE', explode(":",$_smarty_tpl->tpl_vars['MODULE']->value));?>
                        <input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['SPLITTED_MODULE']->value[1];?>
" />
                        <input type="hidden" name="parent" value="<?php echo $_smarty_tpl->tpl_vars['SPLITTED_MODULE']->value[0];?>
" />
                    <?php } else { ?>
                        <input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
" />
                    <?php }?>
                    <input type="hidden" name="action" value="Save" />
                    <input type="hidden" name="record" value="<?php echo $_smarty_tpl->tpl_vars['RECORD_ID']->value;?>
" />
                    <input type="hidden" name="defaultCallDuration" value="<?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('callduration');?>
" />
                    <input type="hidden" name="defaultOtherEventDuration" value="<?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('othereventduration');?>
" />
                    <?php if ($_smarty_tpl->tpl_vars['IS_RELATION_OPERATION']->value) {?>
                        <input type="hidden" name="sourceModule" value="<?php echo $_smarty_tpl->tpl_vars['SOURCE_MODULE']->value;?>
" />
                        <input type="hidden" name="sourceRecord" value="<?php echo $_smarty_tpl->tpl_vars['SOURCE_RECORD']->value;?>
" />
                        <input type="hidden" name="relationOperation" value="<?php echo $_smarty_tpl->tpl_vars['IS_RELATION_OPERATION']->value;?>
" />
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['RETURN_VIEW']->value) {?>
                        <input type="hidden" name="returnmodule" value="<?php echo $_smarty_tpl->tpl_vars['RETURN_MODULE']->value;?>
" />
                        <input type="hidden" name="returnview" value="<?php echo $_smarty_tpl->tpl_vars['RETURN_VIEW']->value;?>
" />
                        <input type="hidden" name="returnrecord" value="<?php echo $_smarty_tpl->tpl_vars['RETURN_RECORD']->value;?>
" />
                        <input type="hidden" name="returntab_label" value="<?php echo $_smarty_tpl->tpl_vars['RETURN_RELATED_TAB']->value;?>
" />
                        <input type="hidden" name="returnrelatedModule" value="<?php echo $_smarty_tpl->tpl_vars['RETURN_RELATED_MODULE']->value;?>
" />
                        <input type="hidden" name="returnpage" value="<?php echo $_smarty_tpl->tpl_vars['RETURN_PAGE']->value;?>
" />
                        <input type="hidden" name="returnviewname" value="<?php echo $_smarty_tpl->tpl_vars['RETURN_VIEW_NAME']->value;?>
" />
                        <input type="hidden" name="returnsearch_params" value='<?php echo Vtiger_Util_Helper::toSafeHTML(ZEND_JSON::encode($_smarty_tpl->tpl_vars['RETURN_SEARCH_PARAMS']->value));?>
' />
                        <input type="hidden" name="returnsearch_key" value=<?php echo $_smarty_tpl->tpl_vars['RETURN_SEARCH_KEY']->value;?>
 />
                        <input type="hidden" name="returnsearch_value" value=<?php echo $_smarty_tpl->tpl_vars['RETURN_SEARCH_VALUE']->value;?>
 />
                        <input type="hidden" name="returnoperator" value=<?php echo $_smarty_tpl->tpl_vars['RETURN_SEARCH_OPERATOR']->value;?>
 />
                        <input type="hidden" name="returnsortorder" value=<?php echo $_smarty_tpl->tpl_vars['RETURN_SORTBY']->value;?>
 />
                        <input type="hidden" name="returnorderby" value="<?php echo $_smarty_tpl->tpl_vars['RETURN_ORDERBY']->value;?>
" />
                        <input type="hidden" name="returnmode" value=<?php echo $_smarty_tpl->tpl_vars['RETURN_MODE']->value;?>
 />
                        <input type="hidden" name="returnrelationId" value="<?php echo $_smarty_tpl->tpl_vars['RETURN_RELATION_ID']->value;?>
" />
                    <?php }?>
                    <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("partials/EditViewContents.tpl",'Inventory'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                </div>
            </div>
            <div class='modal-footer overlayFooter'>
                <center>
                    <footer>
                        <button class="btn btn-success saveButton" type="submit">Save</button>
                        <a class="cancelLink" data-dismiss="modal" type="reset">Cancel</a>
                    </footer>
                </center>
            </div>
        </form>
    </div>
</div>
</div><?php }
}

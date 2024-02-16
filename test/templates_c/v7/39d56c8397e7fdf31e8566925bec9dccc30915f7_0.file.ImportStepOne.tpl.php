<?php
/* Smarty version 3.1.39, created on 2023-10-19 12:35:48
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Import\ImportStepOne.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_653122a4602f38_43808923',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '39d56c8397e7fdf31e8566925bec9dccc30915f7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Import\\ImportStepOne.tpl',
      1 => 1696922942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_653122a4602f38_43808923 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class ="importBlockContainer show" id = "uploadFileContainer">
    <table class = "table table-borderless" cellpadding = "30" >
        <span>
			<?php if ($_smarty_tpl->tpl_vars['FORMAT']->value == 'vcf') {?>
				<h4>&nbsp;&nbsp;&nbsp;<?php echo vtranslate('LBL_IMPORT_FROM_VCF_FILE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4>
			<?php } elseif ($_smarty_tpl->tpl_vars['FORMAT']->value == 'ics') {?>
				<h4>&nbsp;&nbsp;&nbsp;<?php echo vtranslate('LBL_IMPORT_FROM_ICS_FILE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4>
			<?php } else { ?>
				<h4>&nbsp;&nbsp;&nbsp;<?php echo vtranslate('LBL_IMPORT_FROM_CSV_FILE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4>
			<?php }?>
        </span>
        <hr>
        <tr id="file_type_container" style="height:50px">
			<?php if ($_smarty_tpl->tpl_vars['FORMAT']->value == 'vcf') {?>
				<td><?php echo vtranslate('LBL_SELECT_VCF_FILE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
			<?php } elseif ($_smarty_tpl->tpl_vars['FORMAT']->value == 'ics') {?>
				<td><?php echo vtranslate('LBL_SELECT_ICS_FILE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
			<?php } else { ?>
				<td><?php echo vtranslate('LBL_SELECT_CSV_FILE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
			<?php }?>
            <td data-import-upload-size="<?php echo $_smarty_tpl->tpl_vars['IMPORT_UPLOAD_SIZE']->value;?>
" data-import-upload-size-mb="<?php echo $_smarty_tpl->tpl_vars['IMPORT_UPLOAD_SIZE_MB']->value;?>
">
                <div>
                    <input type="hidden" id="type" name="type" value="csv" />
                    <input type="hidden" name="is_scheduled" value="1" />
                    <div class="fileUploadBtn btn btn-primary">
                        <span><i class="fa fa-laptop"></i> <?php echo vtranslate('Select from My Computer',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span>
                        <input type="file" name="import_file" id="import_file" onchange="Vtiger_Import_Js.checkFileType(event)" data-file-formats="<?php if ($_smarty_tpl->tpl_vars['FORMAT']->value == '') {?>csv<?php } else {
echo $_smarty_tpl->tpl_vars['FORMAT']->value;
}?>" />
                    </div>
                    <div id="importFileDetails" class="padding10"></div>
                </div>
            </td>
        </tr>
        <?php if ($_smarty_tpl->tpl_vars['FORMAT']->value == 'csv') {?>
            <tr id="has_header_container" style="height:50px">
                <td><?php echo vtranslate('LBL_HAS_HEADER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
                <td>
                    <input type="checkbox" id="has_header" name="has_header" checked />
                </td>
            </tr>
        <?php }?>
		<?php if ($_smarty_tpl->tpl_vars['FORMAT']->value != 'ics') {?>
			<tr id="file_encoding_container" style="height:50px">
				<td><?php echo vtranslate('LBL_CHARACTER_ENCODING',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
				<td>
					<select name="file_encoding" id="file_encoding" class="select2">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SUPPORTED_FILE_ENCODING']->value, '_FILE_ENCODING_LABEL', false, '_FILE_ENCODING');
$_smarty_tpl->tpl_vars['_FILE_ENCODING_LABEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_FILE_ENCODING']->value => $_smarty_tpl->tpl_vars['_FILE_ENCODING_LABEL']->value) {
$_smarty_tpl->tpl_vars['_FILE_ENCODING_LABEL']->do_else = false;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['_FILE_ENCODING']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['_FILE_ENCODING_LABEL']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</select>
				</td>
			</tr>
		<?php }?>
        <?php if ($_smarty_tpl->tpl_vars['FORMAT']->value == 'csv') {?>
            <tr id="delimiter_container" style="height:50px">
                <td><?php echo vtranslate('LBL_DELIMITER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
                <td>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SUPPORTED_DELIMITERS']->value, '_DELIMITER_LABEL', false, '_DELIMITER', 'delimiters', array (
  'index' => true,
));
$_smarty_tpl->tpl_vars['_DELIMITER_LABEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_DELIMITER']->value => $_smarty_tpl->tpl_vars['_DELIMITER_LABEL']->value) {
$_smarty_tpl->tpl_vars['_DELIMITER_LABEL']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_delimiters']->value['index']++;
?>
                        &nbsp;&nbsp;<label class="radio-group"><input type="radio" name="delimiter" value="<?php echo $_smarty_tpl->tpl_vars['_DELIMITER']->value;?>
" <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_delimiters']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_delimiters']->value['index'] : null) == 0) {?> checked="true" <?php }?> style="margin-bottom: -2px;">&nbsp;&nbsp;<?php echo vtranslate($_smarty_tpl->tpl_vars['_DELIMITER_LABEL']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </td>
            </tr>
            <?php if ($_smarty_tpl->tpl_vars['MULTI_CURRENCY']->value) {?>
                <tr id="lineitem_currency_container" style="height:50px">
                    <td><?php echo vtranslate('LBL_IMPORT_LINEITEMS_CURRENCY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
                    <td>
                        <select name="lineitem_currency" id="lineitem_currency" class = "select2">
                            <?php $_smarty_tpl->_assignInScope('i', 0);?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CURRENCIES']->value, 'CURRENCY', false, 'id');
$_smarty_tpl->tpl_vars['CURRENCY']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['CURRENCY']->value) {
$_smarty_tpl->tpl_vars['CURRENCY']->do_else = false;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['CURRENCY']->value['currency_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['CURRENCY']->value['currencycode'];?>
</option>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                    </td>
                </tr>
            <?php }?>
        <?php }?>
    </table>
</div>
<?php }
}

<?php
/* Smarty version 3.1.39, created on 2023-09-27 10:24:34
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Settings\CTWhatsApp\AddMultipleWhatsAppNumberPopup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_651402e2738738_58852374',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a0629ba11b2cd823270ed01f34182493cb0bd0c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Settings\\CTWhatsApp\\AddMultipleWhatsAppNumberPopup.tpl',
      1 => 1695618298,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_651402e2738738_58852374 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="sendWhatsappSmsContainer" class='modal-xs modal-dialog'>
    <div class = "modal-content">
        <div class="modal-header" style="height: 50px;">
            <button type="button" class="close " data-dismiss="modal" aria-hidden="true" style="float: right;">&times;</button>
           <h4 style="font-size: 15px;"><?php echo vtranslate('MULTIPLE_WHATSAPP_NOTES1',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4>&nbsp;
        </div>
		<table class="table editview-table no-border">
			<tbody>
				<tr>
					<td><?php echo vtranslate('MW_LABEL1',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
					<td>
						<?php $_smarty_tpl->_assignInScope('ALL_ACTIVEUSER_LIST', $_smarty_tpl->tpl_vars['USER_MODEL']->value->getAccessibleUsers());?>
						<select name="scanWhatsappUsersGroups" id="scanWhatsappUsersGroups" style="margin: 0px 170px -9px 44px; width: 60%;" class="inputElement select2">
							<option value=""><?php echo vtranslate('LBL_SELECT_AN_OPTION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
							<optgroup label="<?php echo vtranslate('LBL_USERS');?>
">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALL_ACTIVEUSER_LIST']->value, 'OWNER_NAME', false, 'OWNER_ID');
$_smarty_tpl->tpl_vars['OWNER_NAME']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['OWNER_ID']->value => $_smarty_tpl->tpl_vars['OWNER_NAME']->value) {
$_smarty_tpl->tpl_vars['OWNER_NAME']->do_else = false;
?>
				                    <option value="<?php echo $_smarty_tpl->tpl_vars['OWNER_ID']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['USERID']->value == $_smarty_tpl->tpl_vars['OWNER_ID']->value) {?> selected="" <?php }?>>
				                    	<?php echo $_smarty_tpl->tpl_vars['OWNER_NAME']->value;?>

				                    </option>
								<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</optgroup>
							<optgroup label="<?php echo vtranslate('LBL_GROUPS');?>
">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALL_ACTIVEGROUP_LIST']->value, 'OWNER_NAME', false, 'OWNER_ID');
$_smarty_tpl->tpl_vars['OWNER_NAME']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['OWNER_ID']->value => $_smarty_tpl->tpl_vars['OWNER_NAME']->value) {
$_smarty_tpl->tpl_vars['OWNER_NAME']->do_else = false;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['OWNER_ID']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['USERID']->value == $_smarty_tpl->tpl_vars['OWNER_ID']->value) {?> selected="" <?php }?>>
				                    	<?php echo $_smarty_tpl->tpl_vars['OWNER_NAME']->value;?>

				                    </option>
								<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</optgroup>
						</select><br><br>
					</td>
				</tr>
				<tr>
					<td><?php echo vtranslate('MW_LABEL2',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
					<td>
						<?php $_smarty_tpl->_assignInScope('ALL_ACTIVEUSER_LIST', $_smarty_tpl->tpl_vars['USER_MODEL']->value->getAccessibleUsers());?>
						<?php $_smarty_tpl->_assignInScope('ALL_ACTIVEGROUP_LIST', $_smarty_tpl->tpl_vars['USER_MODEL']->value->getAccessibleGroups());?>
						<select name="whatsappUsersGroups[]" id="whatsappUsersGroups" style="margin: 0px 170px -9px 44px; width: 60%;" class="inputElement select2" multiple="">
							<optgroup label="<?php echo vtranslate('LBL_USERS');?>
">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALL_ACTIVEUSER_LIST']->value, 'OWNER_NAME', false, 'OWNER_ID');
$_smarty_tpl->tpl_vars['OWNER_NAME']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['OWNER_ID']->value => $_smarty_tpl->tpl_vars['OWNER_NAME']->value) {
$_smarty_tpl->tpl_vars['OWNER_NAME']->do_else = false;
?>
				                    <option value="<?php echo $_smarty_tpl->tpl_vars['OWNER_ID']->value;?>
"  <?php if ($_smarty_tpl->tpl_vars['MULTIPLEUSERS']->value[$_smarty_tpl->tpl_vars['OWNER_ID']->value] == $_smarty_tpl->tpl_vars['OWNER_ID']->value) {?> selected="" <?php }?>>
				                    	<?php echo $_smarty_tpl->tpl_vars['OWNER_NAME']->value;?>

				                    </option>
								<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</optgroup>
							<optgroup label="<?php echo vtranslate('LBL_GROUPS');?>
">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALL_ACTIVEGROUP_LIST']->value, 'OWNER_NAME', false, 'OWNER_ID');
$_smarty_tpl->tpl_vars['OWNER_NAME']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['OWNER_ID']->value => $_smarty_tpl->tpl_vars['OWNER_NAME']->value) {
$_smarty_tpl->tpl_vars['OWNER_NAME']->do_else = false;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['OWNER_ID']->value;?>
"  <?php if ($_smarty_tpl->tpl_vars['MULTIPLEUSERS']->value[$_smarty_tpl->tpl_vars['OWNER_ID']->value] == $_smarty_tpl->tpl_vars['OWNER_ID']->value) {?> selected="" <?php }?>>
				                    	<?php echo $_smarty_tpl->tpl_vars['OWNER_NAME']->value;?>

				                    </option>
								<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</optgroup>
						</select><br><br>
					</td>
				</tr>
				<tr>
					<td><?php echo vtranslate('MW_ACTIVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
					<td>
						<input type="checkbox" name="whatsappActive" id="whatsappActive" <?php if ($_smarty_tpl->tpl_vars['ACTIVE']->value == 1) {?> checked="" <?php }?> style="margin: 0px 170px -9px 44px;">
					</td>
				</tr>

				<tr>
					<td><?php echo vtranslate('WhatsApp Bot',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
					<td>
						<input type="checkbox" name="whatsappbot" id="whatsappbot" <?php if ($_smarty_tpl->tpl_vars['WHATSAPPBOT']->value == 1) {?> checked="" <?php }?> style="margin: 0px 170px -9px 44px;">
					</td>
				</tr>
			</tbody>
		</table>
		<div class="modal-footer">
			<center>
				<button id="saveMultipleWhatsapp" class="btn btn-success"><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>&nbsp;&nbsp;
				<a type="reset" data-dismiss="modal" class="cancelLink cursorPointer"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
			</center>
        </div>
    </div>
</div>
<?php }
}

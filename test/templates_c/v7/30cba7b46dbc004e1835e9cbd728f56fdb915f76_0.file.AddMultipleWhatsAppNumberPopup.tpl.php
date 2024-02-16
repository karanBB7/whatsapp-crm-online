<?php
/* Smarty version 3.1.39, created on 2023-10-06 09:35:13
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Settings\CTWhatsAppBusiness\AddMultipleWhatsAppNumberPopup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_651fd4d1ab8758_06415434',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30cba7b46dbc004e1835e9cbd728f56fdb915f76' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Settings\\CTWhatsAppBusiness\\AddMultipleWhatsAppNumberPopup.tpl',
      1 => 1696583819,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_651fd4d1ab8758_06415434 (Smarty_Internal_Template $_smarty_tpl) {
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
				<tr class="">
					<td colspan="2">
						<!-- <h4 style="font-size: 13px;float: left;">
							<b><?php echo vtranslate('WHATSAPP_BUSINESS_ACCOUNT_SETUP',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
						</h4>
						<h4 style="font-size: 13px;float: right;">
							<b><?php echo vtranslate('NEED_HELP',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
						</h4> -->
						<div style="font-size: 13px;display: flex;justify-content: space-between;">
							<p style="margin: 0;"><b><?php echo vtranslate('WHATSAPP_BUSINESS_ACCOUNT_SETUP',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b></p>
							<p style="margin: 0;"><b><?php echo vtranslate('NEED_HELP',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b></p>
						</div>
						<hr>
					</td>
				</tr>

				<tr class="">
					<td><?php echo vtranslate('App Id',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <a href="https://kb.crmtiger.com/knowledge-base/install-vtiger-extension-3/" target="_blank"><i class="fa fa-question-circle" aria-hidden="true" style="cursor: pointer;"></i></a></td>
					<td>
						<input type="text" class="inputElement" name="whatsapp_appid" id="whatsapp_appid" style="margin: 0px 170px -9px 44px;width: 60%;" value="<?php echo $_smarty_tpl->tpl_vars['WHATSAPP_APPID']->value;?>
">
					</td>
				</tr>

				<tr class="">
					<td><?php echo vtranslate('Whatsapp Business Account Id',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <a href="https://kb.crmtiger.com/knowledge-base/install-vtiger-extension-3/" target="_blank"><i class="fa fa-question-circle" aria-hidden="true" style="cursor: pointer;"></i></a></td>
					<td>
						<input type="text" class="inputElement" name="whatsapp_accountid" id="whatsapp_accountid" style="margin: 0px 170px -9px 44px;width: 60%;" value="<?php echo $_smarty_tpl->tpl_vars['WHATSAPP_ACCOINTID']->value;?>
">
					</td>
				</tr>

				<tr class="">
					<td><?php echo vtranslate('User Access Token',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <a href="https://kb.crmtiger.com/knowledge-base/install-vtiger-extension-3/" target="_blank"><i class="fa fa-question-circle" aria-hidden="true" style="cursor: pointer;"></i></a></td>
					<td>
						<textarea type="text" class="inputElement" name="access_token" id="access_token" style="margin: 0px 170px -9px 44px;width: 60%;height: 80px;" value="<?php echo $_smarty_tpl->tpl_vars['WHATSAPP_ACCESS_TOKEN']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['WHATSAPP_ACCESS_TOKEN']->value;?>
</textarea>
					</td>
				</tr>

				<tr class="">
					<td><?php echo vtranslate('WhatsApp No',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
					<td>
						<input type="text" class="inputElement" name="whatsappno" id="whatsappno" style="margin: 0px 170px -9px 44px;width: 60%;" value="<?php echo $_smarty_tpl->tpl_vars['WHATSAPP_NO']->value;?>
">
					</td>
				</tr>

				<tr class="">
					<td><?php echo vtranslate('CUSTOMFIELD2',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
					<td>
						<input type="text" class="inputElement" name="whatsapp_businessnumber" id="whatsapp_businessnumber" style="margin: 0px 170px -9px 44px;width: 60%;" value="<?php echo $_smarty_tpl->tpl_vars['WHATSAPPBUSINESS_NO']->value;?>
">
					</td>
				</tr>

				<tr class="">
					<td colspan="2">
						<br>
						<h4 style="font-size: 13px;"><b><?php echo vtranslate('WHATSAPP_USERS_ACCESS_CONFIGURATION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b></h4>
						<hr>
					</td>
				</tr>
				<tr>
					<td><?php echo vtranslate('MW_LABEL1',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
					<td>
						<?php $_smarty_tpl->_assignInScope('ALL_ACTIVEUSER_LIST', $_smarty_tpl->tpl_vars['USER_MODEL']->value->getAccessibleUsers());?>
						<select name="scanWhatsappUsersGroups" id="scanWhatsappUsersGroups" style="margin: 0px 170px -9px 44px; width: 60%;" class="inputElement select2" <?php if ($_smarty_tpl->tpl_vars['NEWUSER']->value != 'Yes') {?> disabled="true" <?php }?>>
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

				<tr class="">
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

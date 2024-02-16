<?php
/* Smarty version 3.1.39, created on 2023-09-27 10:24:24
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Settings\CTWhatsApp\AddNewWPFieldPopup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_651402d874a887_70777803',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a097d90629be564c2736a96b04241e7f8c8caa4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Settings\\CTWhatsApp\\AddNewWPFieldPopup.tpl',
      1 => 1695618298,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_651402d874a887_70777803 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="modal-xs modal-dialog">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title"><?php echo vtranslate('LBL_ACCESS_MODULE_TO_WHATSAPP',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h4>
	</div>
	<div class="modal-body">
		<div class="clearfix">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<h4 style="margin-top: 0px;"><?php echo vtranslate('LBL_ACCESS_MODULE_TO_WHATSAPP',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h4>
			</div>
		</div><hr>
		
		<table class="table editview-table no-border">
			<tbody>
				<tr>
					<td class="fieldLabel alignMiddle" style="width: 300px;"><?php echo vtranslate('ALLOW_MODULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
					<td class="fieldValue">
						<select class="inputElement select2  select2-offscreen" id="select_module" name="select_module" style="width: 50%;">
							<option value=""><?php echo vtranslate('LBL_SELECT_AN_OPTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALLOW_WHATSAPP_MODULES']->value, 'ALLOW_WHATSAPP_VALUE', false, 'ALLOW_WHATSAPP_KEY');
$_smarty_tpl->tpl_vars['ALLOW_WHATSAPP_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ALLOW_WHATSAPP_KEY']->value => $_smarty_tpl->tpl_vars['ALLOW_WHATSAPP_VALUE']->value) {
$_smarty_tpl->tpl_vars['ALLOW_WHATSAPP_VALUE']->do_else = false;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['ALLOW_WHATSAPP_VALUE']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['ALLOW_WHATSAPP_VALUE']->value,$_smarty_tpl->tpl_vars['ALLOW_WHATSAPP_VALUE']->value);?>
</option>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</select>
					</td>
				</tr>

			<tr>
				<td class="fieldLabel alignMiddle" style="width: 300px;"><?php echo vtranslate('WHATSAPP_PHONE_FIELD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
				<td class="fieldValue">
					<select class="inputElement select2 select2-offscreen" id="phone_field" name="phone_field" style="width: 50%;">
						<option value=""><?php echo vtranslate('LBL_SELECT_AN_OPTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="fieldLabel alignMiddle" style="width: 300px;"><?php echo vtranslate('ACTIVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
				<td class="fieldValue">
					<input type="checkbox" class="inputElement" name="active" id="active" value="">
				</td>
			</tr>
			</tbody>
		</table>
		<div class="row-fluid">
			<div class="span12">
				<span>
					<center><button class="btn btn-success" id="submitbutton" type="button"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>
					<a class="cancelLink" data-dismiss="modal"  href="#" type="reset"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></center>
				</span>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo vtranslate('CLOSE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>
	</div>
</div><?php }
}

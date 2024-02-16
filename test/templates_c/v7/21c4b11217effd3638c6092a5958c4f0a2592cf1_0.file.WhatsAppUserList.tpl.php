<?php
/* Smarty version 3.1.39, created on 2023-10-06 09:35:09
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Settings\CTWhatsAppBusiness\WhatsAppUserList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_651fd4cd276de1_69658430',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21c4b11217effd3638c6092a5958c4f0a2592cf1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Settings\\CTWhatsAppBusiness\\WhatsAppUserList.tpl',
      1 => 1696583819,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_651fd4cd276de1_69658430 (Smarty_Internal_Template $_smarty_tpl) {
?><style type="text/css">
	.bootstrap-switch .bootstrap-switch-handle-on.bootstrap-switch-primary, .bootstrap-switch .bootstrap-switch-handle-off.bootstrap-switch-primary {
		background: #70c257 !important;
	}
</style>
<div class="detailViewContainer" id="WhatsappConfiguration1"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="clearfix"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h3 style="margin-top: 0px;"><?php echo vtranslate('LBL_WHATSAPP_CONFIGURATION_USERS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3></div><div class="pull-right"><input type="hidden" id="currenVersion" value="<?php echo $_smarty_tpl->tpl_vars['CURRENTVERSION']->value;?>
"><input type="hidden" id="latestVersion" value="<?php echo $_smarty_tpl->tpl_vars['LATESTVERSION']->value;?>
"><span><a href="https://kb.crmtiger.com/article-categories/whatsapp-business-integration-for-vtiger/" target="_blank" title="<?php echo vtranslate('LBL_HELP',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"><img src="layouts/v7/modules/Settings/CTWhatsAppBusiness/images/help.png" style="width: 26px;"></a></span>&nbsp;&nbsp;&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['DAYREMAINING']->value < 365) {?><label style="color:red;"><?php echo vtranslate('LBL_DAYS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 <strong><?php echo $_smarty_tpl->tpl_vars['DAYREMAINING']->value;?>
</strong> <?php echo vtranslate('LBL_EXPIRE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php }
if ($_smarty_tpl->tpl_vars['LICENSEACTION']->value == 'free') {?><a class="btn hide" href="https://crmtiger.com/whatsapp/" target="_blank" title="<?php echo vtranslate('LBL_UPGRADETITLE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" style="background-color: #055;color: white;"><img src="layouts/v7/modules/Settings/CTWhatsAppBusiness/images/btn-1.png" style="width: 25px;">&nbsp;&nbsp;<?php echo vtranslate('LBL_UPGRADE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php }?><button class="btn btn-success addScanUsers" title="<?php echo vtranslate('LBL_ADD_WHATSAPP_BUSINESS_ACCOUNT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" style="background: limegreen;"><img src="layouts/v7/modules/Settings/CTWhatsAppBusiness/images/license.png" style="width: 25px;">&nbsp;&nbsp;<?php echo vtranslate('LBL_ADD_WHATSAPP_BUSINESS_ACCOUNT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-success" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['LICENSEDETAILURL']->value;?>
'" title="<?php echo vtranslate('LBL_LICENSETITLE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" style="background: limegreen;"><img src="layouts/v7/modules/Settings/CTWhatsAppBusiness/images/license.png" style="width: 25px;">&nbsp;&nbsp;<?php echo vtranslate('LBL_LICENSE_SETUP',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>&nbsp;&nbsp;&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['CURRENTVERSION']->value < $_smarty_tpl->tpl_vars['LATESTVERSION']->value) {?><a class="btn hide" id="updateWhatsappModule" title="<?php echo vtranslate('LBL_UPDATETITLE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" style="background-color: #dcf8c6;"><img src="layouts/v7/modules/Settings/CTWhatsAppBusiness/images/update.png" style="width: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo vtranslate('LBL_UPDATE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php }?><a onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['EDITURL']->value;?>
'"><img src="layouts/v7/modules/CTWhatsAppBusiness/image/settings_green.png" style="width: 24px;"></a></div></div><hr><div style="width: 65%;"><div class="block1"><br><table class="table editview-table userlist" style="width: 153%;max-width: 160%;border: 1px solid thistle;"><thead><tr><th><?php echo vtranslate('ACTIVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_USERS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 / <?php echo vtranslate('LBL_GROUP_NAME','Settings:Groups');?>
</th><th><?php echo vtranslate('AUTH_TOKEN',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('CUSTOMFIELD2',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_STATUS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('ACTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th></tr></thead><tbody><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['WHATSAPPUSERS']->value, 'WHATSAUSER_VAULE', false, 'WHATSAUSER_KEY');
$_smarty_tpl->tpl_vars['WHATSAUSER_VAULE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['WHATSAUSER_KEY']->value => $_smarty_tpl->tpl_vars['WHATSAUSER_VAULE']->value) {
$_smarty_tpl->tpl_vars['WHATSAUSER_VAULE']->do_else = false;
?><tr><td><?php if ($_smarty_tpl->tpl_vars['WHATSAUSER_VAULE']->value['iconactive'] == 1) {?><input type="checkbox" data-id="<?php echo $_smarty_tpl->tpl_vars['WHATSAUSER_KEY']->value;?>
" class="changeStatus" value="1" checked><?php } else { ?><input type="checkbox" data-id="<?php echo $_smarty_tpl->tpl_vars['WHATSAUSER_KEY']->value;?>
" class="changeStatus" value="0"><?php }?></td><td><a href="<?php echo $_smarty_tpl->tpl_vars['WHATSAUSER_VAULE']->value['detailViewURL'];?>
"><?php echo $_smarty_tpl->tpl_vars['WHATSAUSER_VAULE']->value['username'];?>
</a></td><td style="max-width: 200px !important;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;width: 100px !important;word-wrap: break-word;"><span><?php echo $_smarty_tpl->tpl_vars['WHATSAUSER_VAULE']->value['auth_token'];?>
</span></td><td><?php echo $_smarty_tpl->tpl_vars['WHATSAUSER_VAULE']->value['whatsappno'];?>
</td><td><?php if ($_smarty_tpl->tpl_vars['WHATSAUSER_VAULE']->value['whatsappstatus'] == 1) {
echo vtranslate('LBL_CONNECTED',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
} elseif ($_smarty_tpl->tpl_vars['WHATSAUSER_VAULE']->value['whatsappstatus'] == 2) {
echo vtranslate('LBL_PHONECONNECTED',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
} else {
echo vtranslate('LBL_DISCONNECTED',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
}?></td><td><span class="deleteUsers" data-userid="<?php echo $_smarty_tpl->tpl_vars['WHATSAUSER_KEY']->value;?>
" style="cursor: pointer;"><i class="fa fa-trash" title="<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"></i></span>&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['WHATSAPPMANAGEMENT']->value != 'singleWhatsapp') {
if ($_smarty_tpl->tpl_vars['WHATSAUSER_KEY']->value == $_smarty_tpl->tpl_vars['CURRENTUSERID']->value) {?><a class="editUsers" data-userid="<?php echo $_smarty_tpl->tpl_vars['WHATSAUSER_KEY']->value;?>
"><img src="layouts/v7/modules/CTWhatsAppBusiness/image/edit.png" style="width: 12px;" title="<?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"></a>&nbsp;&nbsp;<?php }
}?></td></tr><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></tbody></table><?php if ($_smarty_tpl->tpl_vars['WHATSAPPMANAGEMENT']->value != 'singleWhatsapp') {?><button class="btn btn-success hide" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['EDITURL']->value;?>
&addMoreUser=1'"><?php echo vtranslate('LBL_ADD_MORE_USERS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 &nbsp;&nbsp;<i class="fa fa-plus"></i></button><?php }?><div style="float: right;margin-right: -320px;"><p class="ctbtn hide" title="<?php echo vtranslate('LBL_CLOSE_ACCOUNT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" id="unInstallWhatsapp" style="color: red;"><a href="#"><b><?php echo vtranslate("LBL_CLOSE_ACCOUNT",$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b></a></p></div></div></div></div></div>


	<?php echo '<script'; ?>
 type="text/javascript" src="libraries/jquery/bootstrapswitch/js/bootstrap-switch.min.js"><?php echo '</script'; ?>
>
	<link rel="stylesheet" href="libraries/jquery/bootstrapswitch/css/bootstrap3/bootstrap-switch.min.css">
	<?php echo '<script'; ?>
 type="text/javascript">
		$( document ).ready(function() {
			jQuery("input[type='checkbox']").bootstrapSwitch();
		});
	<?php echo '</script'; ?>
>
<?php }
}

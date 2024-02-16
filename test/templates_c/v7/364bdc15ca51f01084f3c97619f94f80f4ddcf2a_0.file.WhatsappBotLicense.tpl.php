<?php
/* Smarty version 3.1.39, created on 2023-10-06 09:38:50
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\CTWhatsApp\WhatsappBotLicense.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_651fd5aac01238_91226762',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '364bdc15ca51f01084f3c97619f94f80f4ddcf2a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\CTWhatsApp\\WhatsappBotLicense.tpl',
      1 => 1696585094,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_651fd5aac01238_91226762 (Smarty_Internal_Template $_smarty_tpl) {
?><style>#countdowntimer{font-family: sans-serif;color: #fff;display: inline-block;font-weight: 100;text-align: center;font-size: 30px;}#countdowntimer{padding: 10px;border-radius: 3px;background: #00BF96;display: inline-block;}#countdowntimer{padding: 15px;border-radius: 3px;background: #00816A;display: inline-block;}</style><div class="container-fluid" id="EditConfigEditor" style="margin: 0px 0px 0px 26px;"><?php if ($_smarty_tpl->tpl_vars['ISADMIN']->value == 1) {?><div class="widget_header row-fluid"><div class="span8"><h3><?php echo vtranslate('LBL_LICENSE_CONFIGURATION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h3></div><hr><?php if ($_smarty_tpl->tpl_vars['DAYREMAINING']->value == 0 && $_smarty_tpl->tpl_vars['LICENCE_KEY']->value != '') {?><h4 style="color: red;"><?php echo vtranslate('LBL_LICENSE_EXPIRE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4><?php }?><div class="span4"><div class="pull-right"><?php if ($_smarty_tpl->tpl_vars['LICENCE_KEY']->value != '') {?><button class="btn btn-danger" id="deactivateLicense" type="button" title="<?php echo vtranslate('LBL_DEACTIVATE',$_smarty_tpl->tpl_vars['SETTINGMODULE']->value);?>
"><strong><?php echo vtranslate('LBL_DEACTIVATE',$_smarty_tpl->tpl_vars['SETTINGMODULE']->value);?>
</strong></button>&nbsp;&nbsp;<?php }?><button class="btn btn-success editButton" onclick="window.location.href='index.php?module=CTWhatsApp&view=WhatsappBot&mode=WhatsappBotLicenseEdit'" type="button" title="<?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['SETTINGMODULE']->value);?>
"><strong><?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['SETTINGMODULE']->value);?>
</strong></button>&nbsp;&nbsp;<a onclick="window.location.href='index.php?module=CTWhatsApp&view=WhatsappBot&mode=WhatsappBotList'"><img src="layouts/v7/modules/CTWhatsApp/image/wa_chatboat.jpg" style="width: 24px;"></a></div></div></div><div class="contents"><div style="float: left;width: 65%;"><br><table class="table table-bordered table-condensed themeTableColor" style="font-size:14px;"><tbody><input type="hidden" name="instance" value="<?php echo $_smarty_tpl->tpl_vars['INSTANCE']->value;?>
"/><input type="hidden" name="auth_token" value="<?php echo $_smarty_tpl->tpl_vars['AUTH_TOKEN']->value;?>
"/><input type="hidden" name="EXPIRY_DATE" value="<?php echo $_smarty_tpl->tpl_vars['EXPIRY_DATE']->value;?>
"/><input type="hidden" name="IS_EXPIRED" value="<?php echo $_smarty_tpl->tpl_vars['IS_EXPIRED']->value;?>
"/><input type="hidden" id="licensekey" value="<?php echo $_smarty_tpl->tpl_vars['LICENCE_KEY']->value;?>
"/><tr><th colspan="2"><?php ob_start();
echo $_smarty_tpl->tpl_vars['MODULE']->value;
$_prefixVariable1 = ob_get_clean();
echo vtranslate('LBL_LICENSE_CONFIGURATION',$_prefixVariable1);?>
</th></tr><tr class="fieldLabel medium"><td width="20%" class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><label class="muted pull-right marginRight10px"><?php ob_start();
echo $_smarty_tpl->tpl_vars['SETTINGMODULE']->value;
$_prefixVariable2 = ob_get_clean();
echo vtranslate('LICENSEKEY',$_prefixVariable2);?>
</label></td><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
 fieldValue medium"><label class="muted marginRight10px"><?php echo $_smarty_tpl->tpl_vars['LICENCE_KEY']->value;?>
</label></td></tr></tbody></table></div></div><?php } else { ?><div class="widget_header row-fluid"><div class="span8"><h3><?php echo vtranslate('LBL_LICENSE_CONFIGURATION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h3></div><hr><h4><?php echo vtranslate('LBL_LICENSE_ERROR',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4></div><?php }?></div>
<?php }
}

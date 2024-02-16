<?php
/* Smarty version 3.1.39, created on 2023-10-06 09:25:56
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\CTWhatsAppBusiness\WhatsappBotLicenseEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_651fd2a4a01803_54019552',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb20d3382d31de6ef2765124abc5a8e41fabb127' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\CTWhatsAppBusiness\\WhatsappBotLicenseEdit.tpl',
      1 => 1696583819,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_651fd2a4a01803_54019552 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container-fluid" id="EditConfigEditor"><div class="widget_header row-fluid"><div class="span6"><h3><?php ob_start();
echo $_smarty_tpl->tpl_vars['MODULE']->value;
$_prefixVariable1 = ob_get_clean();
echo vtranslate('LBL_LICENSE_CONFIGURATION',$_prefixVariable1);?>
</h3></div><div class="span4"><div class="pull-right"></div></div><div class="contents"><table class="table table-bordered table-condensed themeTableColor"><tbody><tr><th colspan="2"><?php ob_start();
echo $_smarty_tpl->tpl_vars['MODULE']->value;
$_prefixVariable2 = ob_get_clean();
echo vtranslate('LBL_WHATSPP_LICENSE_KEY',$_prefixVariable2);?>
</th></tr><tr class="fieldLabel medium"><td width="30%" class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><label class="muted pull-right marginRight10px"><span class="redColor">*</span><?php ob_start();
echo $_smarty_tpl->tpl_vars['SETTINGMODULE']->value;
$_prefixVariable3 = ob_get_clean();
echo vtranslate('LICENSEKEY',$_prefixVariable3);?>
</label></td><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
 fieldValue medium"><input class="inputElement" type="text" name="licenseKey" id="licenseKey" value="<?php echo $_smarty_tpl->tpl_vars['LICENCE_KEY']->value;?>
"/></td></tr></tbody></table><br><div class="row-fluid"><div class="pull-right"><button type="button" class="btn btn-success saveButton" name="saveBotLicense" id="saveBotLicense"><strong><?php ob_start();
echo $_smarty_tpl->tpl_vars['SETTINGMODULE']->value;
$_prefixVariable4 = ob_get_clean();
echo vtranslate('Save',$_prefixVariable4);?>
</strong></button><a class="" type="reset" onclick="javascript:window.history.back();" style="font-size: 14px;padding-left: 10px;color: red;" ><?php echo vtranslate('Cancel',$_smarty_tpl->tpl_vars['SETTINGMODULE']->value);?>
</a></div></div></div></div>
<?php }
}

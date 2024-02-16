<?php
/* Smarty version 3.1.39, created on 2023-09-25 05:12:15
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Settings\CTWhatsAppBusiness\LicenseDetail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_651116af194d24_68461587',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f9b55b929c3fa5ba1f355518edd875af1a484c22' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Settings\\CTWhatsAppBusiness\\LicenseDetail.tpl',
      1 => 1695618369,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_651116af194d24_68461587 (Smarty_Internal_Template $_smarty_tpl) {
?><style>#countdowntimer{font-family: sans-serif;color: #fff;display: inline-block;font-weight: 100;text-align: center;font-size: 30px;}#countdowntimer{padding: 10px;border-radius: 3px;background: #00BF96;display: inline-block;}#countdowntimer{padding: 15px;border-radius: 3px;background: #00816A;display: inline-block;}</style><div class="container-fluid" id="EditConfigEditor"><div class="widget_header row-fluid"><a class="btn btn-info pull-right" href="index.php?module=CTWhatsAppBusiness&parent=Settings&view=WhatsAppUserList"><i style="font-size:20px !important;" class="fa fa-home"></i></a><div class="span8"><h3><?php echo vtranslate('LBL_LICENSE_CONFIGURATION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h3></div><hr><div class="span4"><div class="pull-right"><?php if ($_smarty_tpl->tpl_vars['LICENCE_KEY']->value != '') {?><button class="btn btn-danger" id="deactivateLicense" type="button" title="<?php echo vtranslate('LBL_DEACTIVATE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><strong><?php echo vtranslate('LBL_DEACTIVATE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>&nbsp;<?php }?><button class="btn btn-success editButton" onclick="window.location.href='index.php?parent=Settings&module=CTWhatsAppBusiness&view=LicenseEdit'" type="button" title="<?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><strong><?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button></div></div></div><br/><div id="successMessage"></div><div class="contents"><div style="float: left;width: 65%;"><br><table class="table table-bordered table-condensed themeTableColor" style="font-size:14px;"><tbody><input type="hidden" name="instance" value="<?php echo $_smarty_tpl->tpl_vars['INSTANCE']->value;?>
"/><input type="hidden" name="auth_token" value="<?php echo $_smarty_tpl->tpl_vars['AUTH_TOKEN']->value;?>
"/><input type="hidden" name="EXPIRY_DATE" value="<?php echo $_smarty_tpl->tpl_vars['EXPIRY_DATE']->value;?>
"/><input type="hidden" name="IS_EXPIRED" value="<?php echo $_smarty_tpl->tpl_vars['IS_EXPIRED']->value;?>
"/><tr><th colspan="2"><?php ob_start();
echo $_smarty_tpl->tpl_vars['MODULE']->value;
$_prefixVariable1 = ob_get_clean();
echo vtranslate('LBL_LICENSE_CONFIGURATION',$_prefixVariable1);?>
</th></tr><tr class="fieldLabel medium"><td width="20%" class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><label class="muted pull-right marginRight10px"><?php ob_start();
echo $_smarty_tpl->tpl_vars['MODULE']->value;
$_prefixVariable2 = ob_get_clean();
echo vtranslate('LICENSEKEY',$_prefixVariable2);?>
</label></td><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
 fieldValue medium"><label class="muted marginRight10px"><?php echo $_smarty_tpl->tpl_vars['LICENCE_KEY']->value;?>
</label></td></tr><tr class="fieldLabel medium"><td width="20%" class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><label class="muted pull-right marginRight10px"><?php ob_start();
echo $_smarty_tpl->tpl_vars['MODULE']->value;
$_prefixVariable3 = ob_get_clean();
echo vtranslate('APIKEY',$_prefixVariable3);?>
</label></td><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
 fieldValue medium" style="width: 545px;display: grid;text-overflow: initial;word-wrap: anywhere;"><label class="muted marginRight10px"><?php echo $_smarty_tpl->tpl_vars['API_KEY']->value;?>
</label></td></tr><tr class="fieldLabel medium"><td width="20%" class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><label class="muted pull-right marginRight10px"><?php ob_start();
echo $_smarty_tpl->tpl_vars['MODULE']->value;
$_prefixVariable4 = ob_get_clean();
echo vtranslate('Order ID',$_prefixVariable4);?>
</label></td><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
 fieldValue medium" style="width: 545px;display: grid;text-overflow: initial;word-wrap: anywhere;"><label class="muted marginRight10px"><?php echo $_smarty_tpl->tpl_vars['ORDERID']->value;?>
</label></td></tr><tr class="fieldLabel medium"><td width="20%" class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><label class="muted pull-right marginRight10px"><?php ob_start();
echo $_smarty_tpl->tpl_vars['MODULE']->value;
$_prefixVariable5 = ob_get_clean();
echo vtranslate('Version',$_prefixVariable5);?>
</label></td><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
 fieldValue medium" style="width: 545px;display: grid;text-overflow: initial;word-wrap: anywhere;"><label class="muted marginRight10px"><?php echo $_smarty_tpl->tpl_vars['VERSION']->value;?>
</label></td></tr></tbody></table></div><br><br><div style="float: right;width: 30%;border: 1px solid;background-color: #fffce9;"><div class="block" style="background-color: #fffce9;"><br><div class="clearfix"><div><h5><b><?php echo vtranslate('WHATSAPP_POLICY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b></h5></div></div><hr><p><b><?php echo vtranslate('POLICYINFORMATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 <a href="https://www.whatsapp.com/legal/business-policy/" style="color: blue;" target="_blank"><?php echo vtranslate('WHATSAPP_POLICY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a> <?php echo vtranslate('POLICYINFORMATION1',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b></p></div></div></div></div>
<?php }
}

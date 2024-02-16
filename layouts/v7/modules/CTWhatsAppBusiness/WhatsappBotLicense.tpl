{*<!--
 /*+*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ***************************************************************************** */
-->*}
{strip}
<style>
#countdowntimer{
    font-family: sans-serif;
    color: #fff;
    display: inline-block;
    font-weight: 100;
    text-align: center;
    font-size: 30px;
}

#countdowntimer{
    padding: 10px;
    border-radius: 3px;
    background: #00BF96;
    display: inline-block;
}

#countdowntimer{
    padding: 15px;
    border-radius: 3px;
    background: #00816A;
    display: inline-block;
}

</style>
<div class="container-fluid" id="EditConfigEditor" style="margin: 0px 0px 0px 26px;">
	{if $ISADMIN eq 'on'}
		<div class="widget_header row-fluid">
			<div class="span8"><h3>{vtranslate('LBL_LICENSE_CONFIGURATION', $MODULE)}</h3></div>
			<hr>
			{if $DAYREMAINING eq 0 && $LICENCE_KEY != ''}
				<h4 style="color: red;">{vtranslate('LBL_LICENSE_EXPIRE', $MODULE)}</h4>
			{/if}
			<div class="span4"><div class="pull-right">
				{if $LICENCE_KEY neq ''}<button class="btn btn-danger" id="deactivateLicense" type="button" title="{vtranslate('LBL_DEACTIVATE', $SETTINGMODULE)}"><strong>{vtranslate('LBL_DEACTIVATE', $SETTINGMODULE)}</strong></button>&nbsp;&nbsp;{/if}

				<button class="btn btn-success editButton" onclick="window.location.href='index.php?module=CTWhatsAppBusiness&view=WhatsappBot&mode=WhatsappBotLicenseEdit'" type="button" title="{vtranslate('LBL_EDIT', $SETTINGMODULE)}"><strong>{vtranslate('LBL_EDIT', $SETTINGMODULE)}</strong></button>
				&nbsp;&nbsp;
				<a onclick="window.location.href='index.php?module=CTWhatsAppBusiness&view=WhatsappBot&mode=WhatsappBotList'"><img src="layouts/v7/modules/CTWhatsAppBusiness/image/wa_chatboat.jpg" style="width: 24px;"></a>
			</div>
			</div>	
		</div>
		<div class="contents">
			<div style="float: left;width: 65%;"><br>
				<table class="table table-bordered table-condensed themeTableColor" style="font-size:14px;">
					<tbody>
							<input type="hidden" name="instance" value="{$INSTANCE}"/>
							<input type="hidden" name="auth_token" value="{$AUTH_TOKEN}"/>
							<input type="hidden" name="EXPIRY_DATE" value="{$EXPIRY_DATE}"/>
							<input type="hidden" name="IS_EXPIRED" value="{$IS_EXPIRED}"/>
							<input type="hidden" id="licensekey" value="{$LICENCE_KEY}"/>
							<tr>
								<th colspan="2">
									{vtranslate('LBL_LICENSE_CONFIGURATION',{$MODULE})}
								</th>
							</tr>
							<tr class="fieldLabel medium">
								<td width="20%" class="{$WIDTHTYPE}">
									<label class="muted pull-right marginRight10px"> 
									{vtranslate('LICENSEKEY',{$SETTINGMODULE})}</label>
								</td>
								<td  class="{$WIDTHTYPE} fieldValue medium">
									<label class="muted marginRight10px">{$LICENCE_KEY}</label>
								</td>
							</tr>
					</tbody>
				</table>
			</div>
		</div>
	{else}
		<div class="widget_header row-fluid">
			<div class="span8"><h3>{vtranslate('LBL_LICENSE_CONFIGURATION', $MODULE)}</h3></div>
			<hr>
			<h4>{vtranslate('LBL_LICENSE_ERROR', $MODULE)}</h4>
		</div>
	{/if}
</div>
{/strip}

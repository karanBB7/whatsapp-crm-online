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
	<div class="container-fluid" id="EditConfigEditor">
		<div class="widget_header row-fluid">
			<a class="btn btn-info pull-right" href="index.php?module=CTWhatsAppBusiness&parent=Settings&view=WhatsAppUserList"><i style="font-size:20px !important;" class="fa fa-home"></i></a>
			<div class="span8"><h3>{vtranslate('LBL_LICENSE_CONFIGURATION', $MODULE)}</h3></div>
			<hr>
			<div class="span4"><div class="pull-right">
			{if $LICENCE_KEY neq ''}<button class="btn btn-danger" id="deactivateLicense" type="button" title="{vtranslate('LBL_DEACTIVATE', $MODULE)}"><strong>{vtranslate('LBL_DEACTIVATE', $MODULE)}</strong></button>&nbsp;{/if}
			<button class="btn btn-success editButton" onclick="window.location.href='index.php?parent=Settings&module=CTWhatsAppBusiness&view=LicenseEdit'" type="button" title="{vtranslate('LBL_EDIT', $MODULE)}"><strong>{vtranslate('LBL_EDIT', $MODULE)}</strong></button>
			</div>
			</div>	
		</div>
		<br/>
		<div id="successMessage">
		</div>
		<div class="contents">
			<div style="float: left;width: 65%;"><br>
				<table class="table table-bordered table-condensed themeTableColor" style="font-size:14px;">
					<tbody>
							<input type="hidden" name="instance" value="{$INSTANCE}"/>
							<input type="hidden" name="auth_token" value="{$AUTH_TOKEN}"/>
							<input type="hidden" name="EXPIRY_DATE" value="{$EXPIRY_DATE}"/>
							<input type="hidden" name="IS_EXPIRED" value="{$IS_EXPIRED}"/>
							<tr>
								<th colspan="2">
									{vtranslate('LBL_LICENSE_CONFIGURATION',{$MODULE})}
								</th>
							</tr>
							<tr class="fieldLabel medium">
								<td width="20%" class="{$WIDTHTYPE}">
									<label class="muted pull-right marginRight10px"> 
									{vtranslate('LICENSEKEY',{$MODULE})}</label>
								</td>
								<td  class="{$WIDTHTYPE} fieldValue medium">
									<label class="muted marginRight10px">{$LICENCE_KEY}</label>
								</td>
							</tr>
							<tr class="fieldLabel medium">
								<td width="20%" class="{$WIDTHTYPE}">
									<label class="muted pull-right marginRight10px"> 
									{vtranslate('APIKEY',{$MODULE})}</label>
								</td>
								<td  class="{$WIDTHTYPE} fieldValue medium" style="width: 545px;display: grid;text-overflow: initial;word-wrap: anywhere;">
									<label class="muted marginRight10px">{$API_KEY}</label>
								</td>
							</tr>
							<tr class="fieldLabel medium">
								<td width="20%" class="{$WIDTHTYPE}">
									<label class="muted pull-right marginRight10px"> 
									{vtranslate('Order ID',{$MODULE})}</label>
								</td>
								<td  class="{$WIDTHTYPE} fieldValue medium" style="width: 545px;display: grid;text-overflow: initial;word-wrap: anywhere;">
									<label class="muted marginRight10px">{$ORDERID}</label>
								</td>
							</tr>
							<tr class="fieldLabel medium">
								<td width="20%" class="{$WIDTHTYPE}">
									<label class="muted pull-right marginRight10px"> 
									{vtranslate('Version',{$MODULE})}</label>
								</td>
								<td  class="{$WIDTHTYPE} fieldValue medium" style="width: 545px;display: grid;text-overflow: initial;word-wrap: anywhere;">
									<label class="muted marginRight10px">{$VERSION}</label>
								</td>
							</tr>
					</tbody>
				</table>
			</div>
			<br><br>
			<div style="float: right;width: 30%;border: 1px solid;background-color: #fffce9;">
				<div class="block" style="background-color: #fffce9;"><br>
					<div class="clearfix">
						<div>
							<h5><b>{vtranslate ('WHATSAPP_POLICY', $QUALIFIED_MODULE)}</b></h5>
						</div>
					</div><hr>

					<p><b>{vtranslate('POLICYINFORMATION',$QUALIFIED_MODULE)} <a href="https://www.whatsapp.com/legal/business-policy/" style="color: blue;" target="_blank">{vtranslate ('WHATSAPP_POLICY', $QUALIFIED_MODULE)}</a> {vtranslate('POLICYINFORMATION1',$QUALIFIED_MODULE)}</b></p>
				</div>
			</div>	   
		</div>
	</div>
{/strip}

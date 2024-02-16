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
	<div class="container-fluid" id="EditConfigEditor">
		<div class="widget_header row-fluid">
			<div class="span6"><h3>{vtranslate('LBL_LICENSE_CONFIGURATION',{$MODULE})}</h3></div>
			<div class="span4"><div class="pull-right">
			</div>
		</div>
		<div class="contents">
			<table class="table table-bordered table-condensed themeTableColor">
				<tbody>
						<tr>
							<th colspan="2">
								{vtranslate('LBL_WHATSPP_LICENSE_KEY',{$MODULE})}
							</th>
						</tr>
						<tr class="fieldLabel medium">
							<td width="30%" class="{$WIDTHTYPE}">
								<label class="muted pull-right marginRight10px"> 
								<span class="redColor">*</span>{vtranslate('LICENSEKEY',{$SETTINGMODULE})}</label>
							</td>
							<td  class="{$WIDTHTYPE} fieldValue medium">
								<input class="inputElement" type="text" name="licenseKey" id="licenseKey" value="{$LICENCE_KEY}"/>
							</td>
						</tr>
				</tbody>
			</table>
		   <br>
			<div class="row-fluid">
				<div class="pull-right">
					<button type="button" class="btn btn-success saveButton" name="saveBotLicense" id="saveBotLicense"><strong>{vtranslate('Save',{$SETTINGMODULE})}</strong></button>
					<a class="" type="reset" onclick="javascript:window.history.back();" style="font-size: 14px;padding-left: 10px;color: red;"
					>{vtranslate('Cancel', $SETTINGMODULE)}</a>
				</div>
			</div>
		</div>
	</div>
{/strip}

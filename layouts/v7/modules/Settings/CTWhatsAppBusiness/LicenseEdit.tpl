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
			{if $LICENCE_KEY neq ''}<button class="btn btn-danger" id="deactivateLicense" type="button" title="{vtranslate('LBL_DEACTIVATE', $MODULE)}"><strong>{vtranslate('LBL_DEACTIVATE', $MODULE)}</strong></button>&nbsp;{/if}
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
										<span class="redColor">*</span>{vtranslate('LICENSEKEY',{$MODULE})}</label>
									</td>
									<td  class="{$WIDTHTYPE} fieldValue medium">
										<input class="inputElement" type="text" name="License_Key" id="License_Key" value="{$LICENCE_KEY}"/>
									</td>
								</tr>
						</tbody>
					</table>
				   <br>
					<div class="row-fluid">
						<div class="pull-right">
							<button type="button" class="btn btn-success saveButton" name="save_license_settings" id="save_license_settings"><strong>{vtranslate('Save',{$MODULE})}</strong></button>
							<a class="cancelLink" type="reset" onclick="javascript:window.history.back();">{vtranslate('Cancel', $MODULE)}</a>
						</div>
					</div>
		</div>
	</div>
{/strip}

{*+**********************************************************************************
* The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
************************************************************************************}

<div id="sendWhatsappSmsContainer" class='modal-xs modal-dialog'>
    <div class = "modal-content">
        <div class="modal-header" style="height: 50px;">
            <button type="button" class="close " data-dismiss="modal" aria-hidden="true" style="float: right;">&times;</button>
           <h4 style="font-size: 15px;">{vtranslate('MULTIPLE_WHATSAPP_NOTES1',$MODULE)}</h4>&nbsp;
        </div>
		<table class="table editview-table no-border">
			<tbody>
				<tr class="">
					<td colspan="2">
						<!-- <h4 style="font-size: 13px;float: left;">
							<b>{vtranslate('WHATSAPP_BUSINESS_ACCOUNT_SETUP',$MODULE)}</b>
						</h4>
						<h4 style="font-size: 13px;float: right;">
							<b>{vtranslate('NEED_HELP',$MODULE)}</b>
						</h4> -->
						<div style="font-size: 13px;display: flex;justify-content: space-between;">
							<p style="margin: 0;"><b>{vtranslate('WHATSAPP_BUSINESS_ACCOUNT_SETUP',$MODULE)}</b></p>
							<p style="margin: 0;"><b>{vtranslate('NEED_HELP',$MODULE)}</b></p>
						</div>
						<hr>
					</td>
				</tr>

				<tr class="">
					<td>{vtranslate('App Id', $MODULE)} <a href="https://kb.crmtiger.com/knowledge-base/install-vtiger-extension-3/" target="_blank"><i class="fa fa-question-circle" aria-hidden="true" style="cursor: pointer;"></i></a></td>
					<td>
						<input type="text" class="inputElement" name="whatsapp_appid" id="whatsapp_appid" style="margin: 0px 170px -9px 44px;width: 60%;" value="{$WHATSAPP_APPID}">
					</td>
				</tr>

				<tr class="">
					<td>{vtranslate('Whatsapp Business Account Id', $MODULE)} <a href="https://kb.crmtiger.com/knowledge-base/install-vtiger-extension-3/" target="_blank"><i class="fa fa-question-circle" aria-hidden="true" style="cursor: pointer;"></i></a></td>
					<td>
						<input type="text" class="inputElement" name="whatsapp_accountid" id="whatsapp_accountid" style="margin: 0px 170px -9px 44px;width: 60%;" value="{$WHATSAPP_ACCOINTID}">
					</td>
				</tr>

				<tr class="">
					<td>{vtranslate('User Access Token', $MODULE)} <a href="https://kb.crmtiger.com/knowledge-base/install-vtiger-extension-3/" target="_blank"><i class="fa fa-question-circle" aria-hidden="true" style="cursor: pointer;"></i></a></td>
					<td>
						<textarea type="text" class="inputElement" name="access_token" id="access_token" style="margin: 0px 170px -9px 44px;width: 60%;height: 80px;" value="{$WHATSAPP_ACCESS_TOKEN}">{$WHATSAPP_ACCESS_TOKEN}</textarea>
					</td>
				</tr>

				<tr class="">
					<td>{vtranslate('WhatsApp No', $MODULE)}</td>
					<td>
						<input type="text" class="inputElement" name="whatsappno" id="whatsappno" style="margin: 0px 170px -9px 44px;width: 60%;" value="{$WHATSAPP_NO}">
					</td>
				</tr>

				<tr class="">
					<td>{vtranslate('CUSTOMFIELD2', $MODULE)}</td>
					<td>
						<input type="text" class="inputElement" name="whatsapp_businessnumber" id="whatsapp_businessnumber" style="margin: 0px 170px -9px 44px;width: 60%;" value="{$WHATSAPPBUSINESS_NO}">
					</td>
				</tr>

				<tr class="">
					<td colspan="2">
						<br>
						<h4 style="font-size: 13px;"><b>{vtranslate('WHATSAPP_USERS_ACCESS_CONFIGURATION',$MODULE)}</b></h4>
						<hr>
					</td>
				</tr>
				<tr>
					<td>{vtranslate(MW_LABEL1, $MODULE)}</td>
					<td>
						{assign var=ALL_ACTIVEUSER_LIST value=$USER_MODEL->getAccessibleUsers()}
						<select name="scanWhatsappUsersGroups" id="scanWhatsappUsersGroups" style="margin: 0px 170px -9px 44px; width: 60%;" class="inputElement select2" {if $NEWUSER neq 'Yes'} disabled="true" {/if}>
							<option value="">{vtranslate('LBL_SELECT_AN_OPTION', $MODULE)}</option>
							<optgroup label="{vtranslate('LBL_USERS')}">
								{foreach key=OWNER_ID item=OWNER_NAME from=$ALL_ACTIVEUSER_LIST}
				                    <option value="{$OWNER_ID}" {if $USERID eq $OWNER_ID} selected="" {/if}>
				                    	{$OWNER_NAME}
				                    </option>
								{/foreach}
							</optgroup>
							<optgroup label="{vtranslate('LBL_GROUPS')}">
								{foreach key=OWNER_ID item=OWNER_NAME from=$ALL_ACTIVEGROUP_LIST}
									<option value="{$OWNER_ID}" {if $USERID eq $OWNER_ID} selected="" {/if}>
				                    	{$OWNER_NAME}
				                    </option>
								{/foreach}
							</optgroup>
						</select><br><br>
					</td>
				</tr>
				<tr>
					<td>{vtranslate(MW_LABEL2, $MODULE)}</td>
					<td>
						{assign var=ALL_ACTIVEUSER_LIST value=$USER_MODEL->getAccessibleUsers()}
						{assign var=ALL_ACTIVEGROUP_LIST value=$USER_MODEL->getAccessibleGroups()}
						<select name="whatsappUsersGroups[]" id="whatsappUsersGroups" style="margin: 0px 170px -9px 44px; width: 60%;" class="inputElement select2" multiple="">
							<optgroup label="{vtranslate('LBL_USERS')}">
								{foreach key=OWNER_ID item=OWNER_NAME from=$ALL_ACTIVEUSER_LIST}
				                    <option value="{$OWNER_ID}"  {if $MULTIPLEUSERS[$OWNER_ID] eq $OWNER_ID} selected="" {/if}>
				                    	{$OWNER_NAME}
				                    </option>
								{/foreach}
							</optgroup>
							<optgroup label="{vtranslate('LBL_GROUPS')}">
								{foreach key=OWNER_ID item=OWNER_NAME from=$ALL_ACTIVEGROUP_LIST}
									<option value="{$OWNER_ID}"  {if $MULTIPLEUSERS[$OWNER_ID] eq $OWNER_ID} selected="" {/if}>
				                    	{$OWNER_NAME}
				                    </option>
								{/foreach}
							</optgroup>
						</select><br><br>
					</td>
				</tr>
				<tr>
					<td>{vtranslate(MW_ACTIVE, $MODULE)}</td>
					<td>
						<input type="checkbox" name="whatsappActive" id="whatsappActive" {if $ACTIVE eq 1} checked="" {/if} style="margin: 0px 170px -9px 44px;">
					</td>
				</tr>

				<tr class="">
					<td>{vtranslate('WhatsApp Bot', $MODULE)}</td>
					<td>
						<input type="checkbox" name="whatsappbot" id="whatsappbot" {if $WHATSAPPBOT eq 1} checked="" {/if} style="margin: 0px 170px -9px 44px;">
					</td>
				</tr>

			</tbody>
		</table>
		<div class="modal-footer">
			<center>
				<button id="saveMultipleWhatsapp" class="btn btn-success">{vtranslate('LBL_SAVE',$MODULE)}</button>&nbsp;&nbsp;
				<a type="reset" data-dismiss="modal" class="cancelLink cursorPointer">{vtranslate('LBL_CANCEL',$MODULE)}</a>
			</center>
        </div>
    </div>
</div>

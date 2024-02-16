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
				<tr>
					<td>{vtranslate(MW_LABEL1, $MODULE)}</td>
					<td>
						{assign var=ALL_ACTIVEUSER_LIST value=$USER_MODEL->getAccessibleUsers()}
						<select name="scanWhatsappUsersGroups" id="scanWhatsappUsersGroups" style="margin: 0px 170px -9px 44px; width: 60%;" class="inputElement select2">
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

				<tr>
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

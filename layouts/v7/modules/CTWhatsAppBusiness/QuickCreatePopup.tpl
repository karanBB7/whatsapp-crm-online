{*+**********************************************************************************
* The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
************************************************************************************}

<div class="modal-xs modal-dialog" style="width: 750px;">
	<div class="modal-header" style="height: 50px;">
        <button type="button" class="close " data-dismiss="modal" aria-hidden="true" style="float: right;">&times;</button>
       	<h4>{vtranslate('LBL_QUICKCREATE', $MODULE)} {vtranslate($RELATEDMODULE, $RELATEDMODULE)}</h4>&nbsp;
    </div>
    <div class ="modal-content" style="border-radius: 0px 0px 0px 0px;">
    <form class="form-horizontal" name="newrecord" id="newrecord" method="post" action="index.php" enctype="multipart/form-data">
		<table class="massEditTable table no-border">
				<br>
				<input type="hidden" name="relatedModule" id="relatedModule" value={$RELATEDMODULE}>
				<input type="hidden" name="{$PHONEFIELDS}" id="{$PHONEFIELDS}" value={$PHONEFIELDVALUE}>
				<tbody>
					{foreach item=ALLFIELDSVALUE key=ALLFIELDSKEY from=$ALLFIELDS}
						<tr>
							{if $ALLFIELDSKEY eq '55' || $ALLFIELDSKEY eq '255' || $ALLFIELDSKEY eq '2' || $ALLFIELDSKEY eq '17' || $ALLFIELDSKEY eq '22' || $ALLFIELDSKEY eq '1'}
								<td class="fieldLabel alignMiddle">
									{vtranslate($ALLFIELDSVALUE['fieldlabel'], $RELATEDMODULE)}
								</td>
								<td class="fieldValue">
									<input type="text" class="inputElement" name="{$ALLFIELDSVALUE['fieldname']}" style="width: 240px;" value="{$ALLFIELDSVALUE['value']}">
								</td>
							{else if $ALLFIELDSKEY eq '11'}
								<td class="fieldLabel alignMiddle">
									{vtranslate($ALLFIELDSVALUE['fieldlabel'], $RELATEDMODULE)}
								</td>
								<td class="fieldValue">
									<input type="phone" class="inputElement" name="{$ALLFIELDSVALUE['fieldname']}" style="width: 240px;" value="{$ALLFIELDSVALUE['value']}">
								</td>
							{else if $ALLFIELDSKEY eq '13'}
								<td class="fieldLabel alignMiddle">
									{vtranslate($ALLFIELDSVALUE['fieldlabel'], $RELATEDMODULE)}
								</td>
								<td class="fieldValue">
									<input type="email" class="inputElement" name="{$ALLFIELDSVALUE['fieldname']}" style="width: 240px;" value="{$ALLFIELDSVALUE['value']}">
								</td>
							{/if}
						</tr>
					{/foreach}
						<tr>
							<td class="fieldLabel alignMiddle">
								{vtranslate('LBL_ASSIGNTO', $MODULE)}
							</td>
							<td class="fieldValue">
								<select class="select2" id="assigned_user_id" name="assigned_user_id" style="width: 240px;">
									<option value="">{vtranslate('LBL_SELECTANOPTION', $MODULE)}</option>
									{foreach item=ASSIGNTOVALUE key=ASSIGNTOKEY from=$ASSIGNTO}
										<option value="{$ASSIGNTOKEY}" {if $CURRENTUSERID eq $ASSIGNTOKEY} selected {/if}>{$ASSIGNTOVALUE}</option>
									{/foreach}
								</select>	
							</td> 
						</tr>
				</tbody>
				
			
		</table>
		</form>
		<div class="modal-footer">
			<center>
				<button class="btn btn-success" id="saverecord">{vtranslate('LBL_SAVE', $MODULE)}</button>
				<a class="cancelLink" type="reset" data-dismiss="modal">{vtranslate('LBL_CANCEL', $MODULE)}</a>
			</center>
		</div>
    </div>
</div>

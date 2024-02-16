{*+**********************************************************************************
* The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
************************************************************************************}

<style>
	.modal-open .modal{
		overflow-y: hidden !important;
	}
</style>
<div id="addGroupNumberInCRMPopup" class='modal-xs modal-dialog'>
	<div class="modal-header">
        <div class="clearfix">
            <div class="pull-right " >
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true" class='fa fa-close'></span>
                </button>
            </div>
            <h4 class="pull-left">
                {vtranslate('LBL_ADD_RECORD', $MODULE)}
            </h4>
        </div>
    </div>
    <div class = "modal-content">
		<table class="table table-borderless">
			<tr>
				<td>
					<b>{vtranslate('LBL_SELECT_MODULE', $MODULE)}</b>
				</td>
				<td>
					<select class="select2" name="sourceModule" id="sourceModule" style="width: 205px;">
						<option value="">{vtranslate('LBL_SELECTANOPTION', $MODULE)}</option>
						{foreach item=WHATSAPPMODULES_VALUE key=WHATSAPPMODULES_KEY from=$WHATSAPPMODULES}
							{if $WHATSAPPMODULES_VALUE['module'] eq 'Contacts' || $WHATSAPPMODULES_VALUE['module'] eq 'Leads'}
								<option value="{$WHATSAPPMODULES_VALUE['module']}">{vtranslate($WHATSAPPMODULES_VALUE['module'], $WHATSAPPMODULES_VALUE['module'])}</option>
							{/if}
						{/foreach}
					</select>
				</td>
			</tr>

			<tr>
				<td>
					<b>{vtranslate('Copy Name to', $MODULE)}</b>
				</td>
				<td>
					<select class="select2" name="copyNameTo" id="copyNameTo" style="width: 205px;">
						<option value="">{vtranslate('LBL_SELECTANOPTION', $MODULE)}</option>
					</select>
				</td>
			</tr>

			<tr>
				<td>
					<b>{vtranslate('Copy WhatsApp number to', $MODULE)}</b>
				</td>
				<td>
					<select class="select2" name="whatsappNumberTo" id="whatsappNumberTo" style="width: 205px;">
						<option value="">{vtranslate('LBL_SELECTANOPTION', $MODULE)}</option>
					</select>
				</td>
			</tr>

		</table>
		<div>
			<div class="modal-footer">
				<center>
					<button class="btn btn-success" id="saveGroupNumber"><strong>{vtranslate('LBL_SAVE', $MODULE)}</strong></button>
					<a class="cancelLink" type="reset" data-dismiss="modal">{vtranslate('LBL_CANCEL', $MODULE)}</a>
				</center>
			</div>
		</div>
    </div>
</div>

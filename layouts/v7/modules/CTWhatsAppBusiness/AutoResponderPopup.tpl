{*+**********************************************************************************
* The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
************************************************************************************}

<div id="sendWhatsappSmsContainer" class='modal-xs modal-dialog'>
	<div class="modal-header">
        <div class="clearfix">
            <div class="pull-right " >
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true" class='fa fa-close'></span>
                </button>
            </div>
            <h4 class="pull-left">
                {vtranslate('LBL_AUTORESPONDERTEXT', 'Settings:CTWhatsAppBusiness')}
            </h4>
        </div>
    </div>
    <div class = "modal-content">
		<table class="table table-borderless">
			
			<tr>
				<td style="width: 19%;">
					<textarea id="autoresponderMessage" style="width: 100%;height: 115px;">{$AUTOREPONDERTEXT}</textarea>
				</td>
			</tr>
			
		</table>
		<div>
			<div class="modal-footer">
				<center>
					<button class="btn btn-success" id="saveAutoResponder"><strong>{vtranslate('LBL_SAVE', $MODULE)}</strong></button>
					<a class="cancelLink" type="reset" data-dismiss="modal">{vtranslate('LBL_CANCEL', $MODULE)}</a>
				</center>
			</div>
		</div>
    </div>
</div>
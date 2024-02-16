{*+**********************************************************************************
* The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
************************************************************************************}

<div id="sendWhatsappSmsContainer" class='modal-xs modal-dialog' style="width: 40%;">
	<div class="modal-header">
        <div class="clearfix">
            <div class="pull-right " >
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true" class='fa fa-close'></span>
                </button>
            </div>
            <h4 class="pull-left">
                {vtranslate('LBL_ALLMESSAGESHISTORY', $MODULE)}
            </h4>
        </div>
    </div>
    <div class = "modal-content">
        <table class="table table-borderless">
			<tr>
				<td style="width: 35%;">
					<label>{vtranslate('LOAD_HISTORY', $MODULE)}</label>
				</td>
				<td style="width: 25%;">
					<select class="select2" name="pastMessageNumber" id="pastMessageNumber" style="width: 100%;margin: 0px 0px 0px -120px;">
						<option value="">{vtranslate('LBL_SELECTANOPTION', $MODULE)}</option>
						<option value="5">5</option>
						<option value="10">10</option>
						<option value="15">15</option>
						<option value="20">20</option>
						<option value="25">25</option>
						<option value="30">30</option>
						<option value="35">35</option>
						<option value="40">40</option>
						<option value="45">45</option>
						<option value="50">50</option>
					</select>
				</td>
			</tr>
			<tr>
        		<td colspan="2">
    				<label>{vtranslate('LOAD_PAST_MESSAGE_HISTORY_NOTE2', $MODULE)}</label>
        		</td>
        	</tr>
		</table>
		
		<div>
			<div class="modal-footer">
				<center>
					<button class="btn btn-success" id="saveLoadHistory"><strong>{vtranslate('LBL_SAVEHISTORY', $MODULE)}</strong></button>
					<a class="cancelLink" type="reset" data-dismiss="modal">{vtranslate('LBL_CANCEL', $MODULE)}</a>
				</center>
			</div>
		</div>
    </div>
</div>

{*+**********************************************************************************
* The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
************************************************************************************}

{strip}
<div id="sendWhatsappSmsContainer" class='modal-xs modal-dialog' style="width: 40%;">
	<div class="modal-header">
        <div class="clearfix">
            <div class="pull-right " >
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true" class='fa fa-close'></span>
                </button>
            </div>
            <h4 class="pull-left">
                {vtranslate('LOAD_PAST_MESSAGE_HISTORY', $MODULE)}
            </h4>
        </div>
    </div>
    <div class = "modal-content">
        <table class="table table-borderless">
        	<tr>
        		<td colspan="2">
    				<label>{vtranslate('LOAD_PAST_MESSAGE_HISTORY_NOTE', $MODULE)}</label>
        		</td>
        	</tr>
        	<tr>
        		<td style="width: 35%;">
					<label>{vtranslate('LBL_PHONEFIELD', $MODULE)}</label>
				</td>
				<td style="width: 25%;">
					<input type="hidden" name="firsttimehistory" id="firsttimehistory" value="">
					<select class="select2" name="multiWPNumber" id="multiWPNumber" style="width: 112%;margin: 0px 10px 0px -124px;">
						<option value="">{vtranslate('LBL_SELECTFROMNUMBER',$MODULE)}</option>
						{foreach item=MULTIPELWHATSAPPNUMBER_VALUE key=MULTIPELWHATSAPPNUMBER_KEY from=$MULTIPELWHATSAPPNUMBER}
							<option value="{$MULTIPELWHATSAPPNUMBER_VALUE['whatsappno']}">{$MULTIPELWHATSAPPNUMBER_VALUE['whatsappno']}</option>
						{/foreach}
					</select>
				</td>
			</tr>
			<tr class="hostorydate">
				<td style="width: 35%;">
					<label>{vtranslate('LBL_STARTDATE', $MODULE)}</label>
				</td>
				<td style="width: 25%;">
					<div class="input-group inputElement" style="width: 40px;margin: 0px 10px 0px -124px;">
						<input id="start_date" name="start_date" type="text" class="dateField form-control" data-date-format="yyyy-mm-dd" data-fieldtype="date" data-fieldname="followup_date_start" value="">
	            		<span class="input-group-addon">
	                		<i class="fa fa-calendar "></i>
	            		</span>
	            	</div>
				</td>
			</tr>
			<tr class="hostorydate"> 
				<td style="width: 35%;">
					<label>{vtranslate('LBL_ENDDATE', $MODULE)}</label>
				</td>
				<td style="width: 25%;">
					<div class="input-group inputElement" style="width: 40px;margin: 0px 10px 0px -124px;">
						<input id="end_date" name="end_date" type="text" class="dateField form-control" data-date-format="yyyy-mm-dd" data-fieldtype="date" data-fieldname="followup_date_start" value="">
		            	<span class="input-group-addon">
		                	<i class="fa fa-calendar "></i>
		            	</span>
		            </div>
				</td>
			</tr>
			<tr class="historydata">
				<td style="width: 35%;">
					<label>{vtranslate('SYNC_HISTORY', $MODULE)}</label>
				</td>
				<td style="width: 25%;">
					<div class="input-group" style="width: 40px;margin: 0px 10px 0px -124px;">
						<input id="history_status" name="history_status" type="checkbox" class="" value="">
		            </div>
				</td>
			</tr>
			<tr>
        		<td colspan="2">
    				<label>{vtranslate('LOAD_PAST_MESSAGE_HISTORY_NOTE1', $MODULE)}</label><br>
    				<label>{vtranslate('LOAD_PAST_MESSAGE_HISTORY_NOTE2', $MODULE)}</label>
        		</td>
        	</tr>
		</table>
		<div>
			<div class="modal-footer">
				<center>
					<button class="btn btn-success" id="saveAllLoadHistory"><strong>{vtranslate('LBL_ALLSAVEHISTORY', $MODULE)}</strong></button>
					<a class="cancelLink" type="reset" data-dismiss="modal">{vtranslate('LBL_CANCEL', $MODULE)}</a>
				</center>
			</div>
		</div>
    </div>
</div>
{/strip}
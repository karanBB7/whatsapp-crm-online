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
<div id="sendWhatsappSmsContainer" class='modal-xs modal-dialog' style="width: 58%;">
	<div class="modal-header">
        <div class="clearfix">
            <div class="pull-right " >
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true" class='fa fa-close'></span>
                </button>
            </div>
            <h4 class="pull-left">
                {vtranslate('LBL_SEND_SMS_WHATSAPP', $MODULE)}
            </h4>
        </div>
    </div>
    <div class = "modal-content">
        {assign var=TITLE value="{vtranslate('LBL_SEND_SMS', $MODULE)}"}
        
        
		<input type="hidden" name="module" value="{$MODULE}" />
		<input type="hidden" name="selected_ids" value={ZEND_JSON::encode($SELECTED_IDS)}>
		
		<table class="table table-borderless">
			<div style="margin-left: 8px;">
				<b>{vtranslate('LBL_MASMESSAGENOTES',$MODULE)}</br>
				{vtranslate('LBL_MASMESSAGENOTES1', $MODULE)}</br>
				{vtranslate('LBL_MASMESSAGENOTES2', $MODULE)}</br>
				{vtranslate('LBL_MASMESSAGENOTES3', $MODULE)}</br></br></b>
			</div>
			<tr class="hide">
				<td style="width: 19%;">
					<label>{vtranslate('LBL_PHONEFIELD', $MODULE)}</label>
				</td>
				<td>
					<select class="select2 task-fields" style="width: 50%;">
						<option value>{$PHONEFIELD}</option>
					</select><br>
				</td>
			</tr>
			<tr>
				<td style="width: 19%;">
					<label>{vtranslate('LBL_PHONEFIELD', $MODULE)}</label>
				</td>
				<td>
					<select class="select2 task-fields" style="width: 50%;" id="whatsappUserID" name="whatsappUserID">
						<option value="">{vtranslate('LBL_SELECTANOPTION',$MODULE)}</option>
						{foreach item=MULTIPELWHATSAPPNUMBER_VALUE key=MULTIPELWHATSAPPNUMBER_KEY from=$MULTIPELWHATSAPPNUMBER}
							<option value="{$MULTIPELWHATSAPPNUMBER_VALUE['userid']}">{$MULTIPELWHATSAPPNUMBER_VALUE['whatsappno']}</option>
						{/foreach}
					</select><br>
				</td>
			</tr>
			<tr>
				<td style="width: 19%;">
					<input type="hidden" name="templatesid" id="templatesid" value="">
					<label>{vtranslate('MSGTEMPLATES', $MODULE)}</label>
				</td>
				<td>
					<select class="select2" id="wptemplatesid" data-placeholder="{vtranslate('LBL_MODULEFIELDS', $QUALIFIED_MODULE)}" style="width: 50%;">
						<option value="">{vtranslate('LBL_SELECTANOPTION',$MODULE)}</option>
						{foreach key=WHATSAPPTEMPLATESKEY item=WHATSAPPTEMPLATESVALUE from=$WHATSAPPTEMPLATES}
							<option value="{$WHATSAPPTEMPLATESKEY}">{$WHATSAPPTEMPLATESVALUE}</option>
						{/foreach}
					</select>
					<a class="addTemplate btn btn-default" href="index.php?module=CTWhatsAppTemplates&view=Edit" target="_blank"><i class="fa fa-plus"></i></a>
					<a class="editTemplate btn btn-default hide" href="index.php?module=CTWhatsAppTemplates&view=Edit" target="_blank"><i class="fa fa-pencil"></i></a>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<label>{vtranslate('LBL_NOTE', $MODULE)}</label>
					{vtranslate('LBL_ATTACHMENT_NOTES', $MODULE)}
				</td>
			</tr>
			<tr>
				<td style="width: 19%;">
					<label>{vtranslate('LBL_MODULEFIELDS', $MODULE)}</label>
				</td>
				<td>
					<select class="select2" id="modulefields" data-placeholder="{vtranslate('LBL_MODULEFIELDS', $QUALIFIED_MODULE)}" style="width: 50%;">
						<option value="">{vtranslate('LBL_SELECTANOPTION',$MODULE)}</option>
						{foreach key=ALLFIELDSKEY item=ALLFIELDSVALUE from=$ALLFIELDS}
							<option value="${$SELECTMODULE}-{$ALLFIELDSVALUE}$">{$ALLFIELDSKEY}</option>
						{/foreach}
					</select>
				</td>
			</tr>
			<tr>
				<td style="width: 19%;">
					<label>{vtranslate('LBL_MESSAGES', $MODULE)}</label>
				</td>
				<td>
					<textarea class="form-control smsTextArea" data-rule-required="true" name="message" id="message"  placeholder="{vtranslate('LBL_WRITE_YOUR_MESSAGE_HERE', $MODULE)}" style="height: 100px;width: 100%"></textarea>
				</td>
			</tr>
			<tr class="messageImageArea hide">
				<td style="width: 19%;">
					<label>{vtranslate('LBL_ATTACHMENT', $MODULE)}</label>
				</td>
				<td class="imageArea" style="cursor: pointer;">
				</td>
			</tr>
			<tr>
				<td style="width: 19%;">
					<label>{vtranslate('LBL_SENDNOWLATER', $MODULE)}</label>
				</td>
				<td>
					<div style="width: 50%; float: left;">
						<div>
							<input type="radio" name="sendtime" value="now">
							<label for="now">&nbsp; {vtranslate('LBL_NOW', $MODULE)}</label>&nbsp;&nbsp;
							<input type="radio" name="sendtime" value="later">
							<label for="later">&nbsp; {vtranslate('LBL_LATER', $MODULE)}</label>
						</div>
					</div>
					<div class="laterdatetime hide" style="width: 50%; float: right;">
						<div style="width: 0%; float: left;">
							<div class="input-group inputElement" style="width: 40px;margin: 0px 10px 0px -124px;">
								<input id="sendmassmessagedate" name="sendmassmessagedate" type="text" class="dateField form-control" data-date-format="{$DATEFORMAT}" data-fieldtype="date" data-fieldname="followup_date_start" value="">
				            	<span class="input-group-addon">
				                	<i class="fa fa-calendar "></i>
				            	</span>
				            </div>
				            <div style="width: 25%; float: right;">
								<input class="timepicker-default timePicker form-control inputElement" name="sendmassmessagetime" id="sendmassmessagetime" type="text" data-format="{$TIMEFORMAT}" style="width: 180px !important;">
							</div>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<label>{vtranslate('LBL_SENDNOWLATERNOTES', $MODULE)}</label>
				</td>
			</tr>
		</table>
		<div>
			<div class="modal-footer">
				<center>
					<button class="btn btn-success" id="sendmessage"><strong>{vtranslate('LBL_SEND', $MODULE)}</strong></button>
					<a class="cancelLink" type="reset" data-dismiss="modal">{vtranslate('LBL_CANCEL', $MODULE)}</a>
				</center>
			</div>
		</div>
    </div>
</div>

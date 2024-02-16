{*+**********************************************************************************
* The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
************************************************************************************}

<div id="sendWhatsappSmsContainer" class='modal-xs modal-dialog' style="background: #fbfbfb;">
	<div class="modal-header">
        <div class="clearfix">
            <div class="pull-right " >
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true" class='fa fa-close'></span>
                </button>
            </div>
            <h4 class="pull-left">
                {vtranslate('LBL_SENDNEWNUMBERMESAGE', $MODULE)}
            </h4>
        </div>
    </div>
    {if $WHATSAPPSTATUS eq 0}
  		<div class="errorDiv" style="width: 100%;display: inline-block;text-align: center;padding: 10px 0;background: rgb(219 76 58 / 0.10);margin: 15px 0 0;">
    		<span style="color: #db4c3a;font-size: 14px;font-weight: 600;">{vtranslate('LBL_ERROR1', $MODULE)}</span><br>
    	</div><br><br>
    {else if $WHATSAPPSTATUS eq 2}
    	<div class="errorDiv" style="width: 100%;display: inline-block;text-align: center;padding: 10px 0;background: rgb(219 76 58 / 0.10);margin: 15px 0 0;">
    		<span style="color: #db4c3a;font-size: 14px;font-weight: 600;">{vtranslate('LBL_NOINTERNET_MESSAGES', $MODULE)} ({$NOINTERNETNUMBER}) {vtranslate('LBL_NOINTERNET_MESSAGES1', $MODULE)}</span><br>
    	</div><br><br>
    {/if}
    <div class = "modal-content">
		<table class="table table-borderless">
			<input type="hidden" name="whatsappStatus" id="whatsappStatus" value="{$WHATSAPPSTATUS}">
			<tr>
				<td>
					<select class="select2" name="multiWPNumber" id="multiWPNumber" style="width: 50%;">
						<option value="">{vtranslate('LBL_SELECTFROMNUMBER',$MODULE)}</option>
						{foreach item=MULTIPELWHATSAPPNUMBER_VALUE key=MULTIPELWHATSAPPNUMBER_KEY from=$MULTIPELWHATSAPPNUMBER}
							{if $MULTIPELWHATSAPPNUMBER_VALUE['whatsappstatus'] eq 1}
								<option value="{$MULTIPELWHATSAPPNUMBER_VALUE['whatsappno']}">{$MULTIPELWHATSAPPNUMBER_VALUE['whatsappno']}</option>
							{/if}
						{/foreach}
					</select>
				</td>
				<td style="width: 19%;">
					<input class="inputElement" type="text" name="newNumber" id="newNumber" value="{$COUNTRYCODE}" style="width: 220px;" placeholder="{vtranslate('LBL_ENTERNEWNUMBER', $MODULE)}">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<textarea name="newTextMessage" id="newTextMessage" style="width: 100%;height: 170px;" placeholder="{vtranslate('LBL_ENTERNEWMESSAGE', $MODULE)}"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<div class="image-upload">
						<label for="filename">
							<input type="hidden" name="selectfile_data" id="selectfile_data" value="">
							<input type="file" name="filename1" id="filename1" class="imageclick"/>
						</label>
					</div>
				</td>
			</tr>
			
		</table>
		<div>
			<div class="modal-footer">
				<center>
					<button class="btn btn-success" id="sendnewnumbermessage"><strong>{vtranslate('LBL_SEND', $MODULE)}</strong></button>
					<a class="cancelLink" type="reset" data-dismiss="modal">{vtranslate('LBL_CANCEL', $MODULE)}</a>
				</center>
			</div>
		</div>
    </div>
</div>
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
                {vtranslate('MSGTEMPLATES', $MODULE)}
            </h4>
        </div>
    </div>
    <div class = "modal-content">
        <table class="table table-borderless">
			<tr>
				<td style="width: 35%;">
					<label>{vtranslate('MSGTEMPLATES', $MODULE)}</label>
				</td>
				<td>
					<select class="select2" id="wptemplatesid" data-placeholder="{vtranslate('LBL_MODULEFIELDS', $QUALIFIED_MODULE)}" style="width: 50%;">
						<option value="">{vtranslate('LBL_SELECTANOPTION',$MODULE)}</option>
						{foreach key=WHATSAPPTEMPLATESKEY item=WHATSAPPTEMPLATESVALUE from=$WHATSAPPTEMPLATES}
							<option value="{$WHATSAPPTEMPLATESKEY}">{$WHATSAPPTEMPLATESVALUE}</option>
						{/foreach}
					</select>
					<a class="editTemplate btn btn-default hide" href="index.php?module=CTWhatsAppTemplates&view=Edit" target="_blank"><i class="fa fa-pencil"></i></a>
					<a class="addTemplate btn btn-default" href="index.php?module=CTWhatsAppTemplates&view=Edit" target="_blank"><i class="fa fa-plus"></i></a>

				</td>
			</tr>
			<tr>
				<td style="width: 35%;">
				</td>
				<td>
					<div class="previewTemplateDataText"></div>
					<div class="previewTemplateDataImage"></div>
				</td>
			</tr>
		</table>
		<div>
			<div class="modal-footer">
				<center>
					<button class="btn btn-success" id="saveTemplates"><strong>{vtranslate('LBL_SELECT', $MODULE)}</strong></button>
					<a class="cancelLink" type="reset" data-dismiss="modal">{vtranslate('LBL_CANCEL', $MODULE)}</a>
				</center>
			</div>
		</div>
    </div>
</div>

{*+**********************************************************************************
* The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
************************************************************************************}

<style>
	.fieldValue.createWhatsAppBotFrom {
		border: 1px solid !important;
		text-align: center;
		cursor: pointer;
		background-color: silver;
	}
	.parent{
        display: flex;
	    flex-wrap: wrap;
	    justify-content: space-evenly;
	    height: 290px;
	    overflow-y: auto;
    }
    .child{
        margin: 10px 0;
        width: 150px;
        height: auto;
        /*border: 1px solid;*/
        cursor: pointer;
    }
    .child button {
    	width: 150px;
    }
    .child button span {
    	overflow: hidden;
		text-overflow: ellipsis;
		display: inline-block;
		width: 100px;
    }
    .fieldValue.createWhatsAppBotFrom:hover {
	  	background-color: white;
	}
	.fieldValue.createWhatsAppBotFrom.hightLightDiv {
	  	background-color: white;
	}
</style>

<div class="modal-xs modal-dialog" style="width: 750px;">
	<div class="modal-header" style="height: 50px;">
        <button type="button" class="close " data-dismiss="modal" aria-hidden="true" style="float: right;">&times;</button>
       	<h4>{vtranslate('LBL_CREATENEWBOT', $MODULENAME)}</h4>&nbsp;
    </div>
    <div class ="modal-content" style="border-radius: 0px 0px 0px 0px;">
    	<form class="form-horizontal" name="newrecord" id="newrecord" method="post" action="index.php" enctype="multipart/form-data">
		<table class="massEditTable table no-border" style="margin-top: 15px;">
			<tbody>
				<tr class="hide">
					<td class="fieldValue">
						<input type="radio" name="createWhatsAppBotFrom" value="BotFormScratch">
						<label for="html">{vtranslate('LBL_CREATENEWBOT_FROM_SCRATCH', $MODULENAME)}</label><br>
					  	<input type="radio" name="createWhatsAppBotFrom" value="BotFormTemplate">
					  	<label for="css">{vtranslate('LBL_CREATENEWBOT_FROM_TEMPLATES', $MODULENAME)}</label><br>	
					</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td class="fieldValue createWhatsAppBotFrom" data-createbot="BotFormScratch">
						<span>{vtranslate('LBL_CREATENEWBOT_FROM_SCRATCH', $MODULENAME)}</span>
					</td>
					<td></td>
					<td class="fieldValue createWhatsAppBotFrom hide" data-createbot="BotFormTemplate">
						<span>{vtranslate('LBL_CREATENEWBOT_FROM_TEMPLATES', $MODULENAME)}</span>
					</td>
					<td></td>
				</tr>

				<tr>
					<td colspan="5" style="text-align: center;"><br>{vtranslate('LBL_OR', $MODULENAME)}</br></td>
				</tr>

				<tr class="templateView">
					<td colspan="5">
						<h4>{vtranslate('LBL_WHATSAPP_TEMPLATE_BOT', $MODULENAME)}</h4>
						<hr>
						<div class="parent">
							{foreach key=ALL_WHATSAPP_BOT_KEY item=ALL_WHATSAPP_BOT_VALUE from=$ALL_WHATSAPP_BOT}
								<div class="child" data-botid="{$ALL_WHATSAPP_BOT_KEY}" onclick='window.location.href = "index.php?module=CTWhatsApp&view=WhatsappBot&mode=WhatsappBotConfiguration&duplicateRecordId={$ALL_WHATSAPP_BOT_KEY}"'>
									<img src="layouts/v7/modules/CTWhatsApp/image/templateBot.png" style="width: 100%;"/>
									<br>
									<button class="btn btn-success" onclick='window.location.href = "index.php?module=CTWhatsApp&view=WhatsappBot&mode=WhatsappBotConfiguration&duplicateRecordId={$ALL_WHATSAPP_BOT_KEY}"' type="button" style="margin: 2px 0px 4px -1px;">
										<span>{$ALL_WHATSAPP_BOT_VALUE}</span>
									</button>
								</div>
							{/foreach}
					    </div>
					</td>
				</tr>
			</tbody>
		</table>
		</form>
		<div class="modal-footer">
			<center>
				<button class="btn btn-success hide" id="addBot">{vtranslate('LBL_SAVE', $MODULE)}</button>
				<a class="cancelLink" type="reset" data-dismiss="modal">{vtranslate('LBL_CANCEL', $MODULE)}</a>
			</center>
		</div>
    </div>
</div>

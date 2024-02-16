{*+**********************************************************************************
* The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
************************************************************************************}

<style type="text/css">
	#countdowntimer{
	    font-family: sans-serif;
	    color: #fff;
	    display: inline-block;
	    font-weight: 100;
	    text-align: center;
	    font-size: 30px;
	}
	#countdowntimer{
	    padding: 10px;
	    border-radius: 3px;
	    background: #00BF96;
	    display: inline-block;
	}
	#countdowntimer{
	    padding: 15px;
	    border-radius: 3px;
	    background: #00816A;
	    display: inline-block;
	}
	.whatsappQRCodeBlock {
		margin: -42px 4px 40px 201px;
	}
	#text{
		width:80%
	}
	#authtokenkey{
		width:80%
	}
	#codeinformation {
		font-size: 16px;
		margin: 16px 0px 10px -63px;
	}
	#loadgif {
		width:150px;
		height:160px;
		margin-top:15px;
	}
	#qrcode {
		width:150px;
		height:160px;
		margin-top:55px;
	}
</style>

<div class="modal-xs modal-dialog">
	<div class="modal-header">
        <button type="button" class="close " data-dismiss="modal" aria-hidden="true" style="float: right;">&times;</button>
       	<h4>{vtranslate('LBL_SCANQRCODE', $MODULENAME)}</h4>&nbsp;
    </div>
    <div class ="modal-content">
    	{if $AUTHTOKENKEY}
			<div class="whatsappQRCodeBlock" style="">
				<input id="text" type="hidden" value="{$SCANQRCODE}" style="" /><br />
				<input id="authtokenkey" type="hidden" value="{$AUTHTOKENKEY}" style="" />
				<input id="whatsAppapiurl" type="hidden" value="{$APIURL}" style="" />
				<input type="hidden" name="whatsappstatus" id="whatsappstatus" value="">
				<input type="hidden" name="whatsapp_bot" id="whatsapp_bot" value="yes">
				<td colspan="2"  style="text-align: center;">
					<label style="font-size: 11px;margin: 39px 9px -25px -111px;width: 109%;"><b>
						{vtranslate('PLEASEWAITSCANQRCODE', 'Settings:CTWhatsAppBusiness')}
					</b></label>
					<div class="hide" id="qrcode" style=""></div>
					<div id="loadgif" style="">
						<img src="layouts/v7/modules/Settings/CTWhatsAppBusiness/images/loader.gif" style="width: 172px;margin-top:40px;"/>
					</div>
				</td>
			</div>
    	{else}
    		<tr class="" {if $QRCODE_STATUS eq 1} style="border: 1px solid;" {/if}>
				<td colspan="2" style="text-align: center;">
					<label style="font-size: 16px;margin: 17px 0px 12px 100px;"><b>{$SCANMESSAGE}</b></label>
				</td>
			</tr>
    	{/if}
    	
		<div class="whatsappStatusBlock hide">
			<td colspan="2" style="text-align: center;">
				<label style="font-size: 16px;margin: 16px 0px 10px 44px;">
					<b>{vtranslate('WHATSAPPCONNECTED', $MODULENAME)}</b>
					<span class="mobilenumber"></span> 
				</label>
			</td>
		</div>
		<br>
    </div>
</div>

<!--//Add new functionality-->
{literal}
<!--//for qrcode with new api-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<script type="text/javascript" src="layouts/v7/modules/Settings/CTWhatsAppBusiness/qrcodejs/qrcode.js"></script>
<!--//for qrcode with new api-->

<script type="text/javascript">
	$( document ).ready(function() {
		//for qrcode with new api
		setTimeout(function(){
			$('#loadgif').addClass('hide');
			$('#qrcode').removeClass('hide');
			$('#codeinformation').removeClass('hide');
		}, 20000);
	});
	
	setTimeout(function(){
		var authtokenkey = $('#authtokenkey').val();
		var whatsAppapiurl = $('#whatsAppapiurl').val();
		
		var socket = io.connect(whatsAppapiurl+'/'+authtokenkey, {
			"transports": ['websocket'],
			withCredentials: true,
			extraHeaders: {
				"my-custom-header": "abcd"
			}
		});
		socket.on('qr', function(data){
			$('#qrcode').html('');
			var qrcode = new QRCode(document.getElementById("qrcode"), {
				text: data,
				width: 160,
				height: 160
			});
			$('#loadgif').addClass('hide');
			$('#qrcode').removeClass('hide');
			$('#codeinformation').removeClass('hide');
		});
	}, 2000);

</script>
{/literal}
<!--//Add new functionality-->
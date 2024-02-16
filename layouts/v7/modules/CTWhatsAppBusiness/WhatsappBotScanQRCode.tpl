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
		margin-top:15px;
	}
</style>

<div class="modal-xs modal-dialog">
	<div class="modal-header">
        <button type="button" class="close " data-dismiss="modal" aria-hidden="true" style="float: right;">&times;</button>
       	<h4>{vtranslate('LBL_SCANQRCODE', $MODULENAME)}</h4>&nbsp;
    </div>
    <div class ="modal-content">
		
		{if $SCANWHATSAPPNO}
			<div>
				<td colspan="2" style="text-align: center;">
					<label style="font-size: 16px;margin: 16px 0px 10px 44px;">
						<b>{vtranslate('WHATSAPPCONNECTED', $MODULENAME)}</b>
						<span class="mobilenumber">{$SCANWHATSAPPNO}</span> 
					</label>
				</td>
			</div>
		{else}
			<div class="whatsappQRCodeBlock" style="">
				<input id="text" type="hidden" value="{$SCANQRCODE}" style="" /><br />
				<input id="authtokenkey" type="hidden" value="{$AUTHTOKENKEY}" style="" /><br />
				<input type="hidden" name="whatsappstatus" id="whatsappstatus" value="">
				<input type="hidden" name="whatsapp_bot" id="whatsapp_bot" value="yes">
				<td colspan="2"  style="text-align: center;">
					<label id="codeinformation" class="hide" style=""><b>{vtranslate('CODEINFORMATION', $MODULENAME)} </b></label>
					<p><b><span class="hide" id="countdowntimer" style="margin-left: 52px;font-size: 16px">60</span></b></p>
					<div class="hide" id="qrcode" style=""></div>
					<div id="loadgif" style="">
						<img src="layouts/v7/modules/Settings/CTWhatsAppBusiness/images/loader.gif" style="width: 172px;"/>
					</div>
				</td>
			</div>
			<div class="whatsappStatusBlock hide">
				<td colspan="2" style="text-align: center;">
					<label style="font-size: 16px;margin: 16px 0px 10px 44px;">
						<b>{vtranslate('WHATSAPPCONNECTED', $MODULENAME)}</b>
						<span class="mobilenumber"></span> 
					</label>
				</td>
			</div>
		{/if}
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
			$('#countdowntimer').removeClass('hide');
			$('#codeinformation').removeClass('hide');

			//set timer for scan qrcode
		  	var timeleft = 60;
		    var downloadTimer = setInterval(function(){
		    timeleft--;
		    document.getElementById("countdowntimer").textContent = timeleft;
		    if(timeleft <= 0)
		        clearInterval(downloadTimer);
		    },1000);
		    //set timer for scan qrcode

		}, 2000);
	});
	var authtokenkey = $('#authtokenkey').val();
	if(authtokenkey){
	  	//for qrcode with new api
	  	var qrcode = new QRCode(document.getElementById("qrcode"), {
			width : 160,
			height : 160
		});

		function makeCode () {
			var elText = document.getElementById("text");

			if (!elText.value) {
				console.log("Input a text");
				elText.focus();
				return;
			}

			qrcode.makeCode(elText.value);
		}

		makeCode();

		$("#text").
			on("blur", function () {
				makeCode();
			}).
			on("keydown", function (e) {
				if (e.keyCode == 13) {
					makeCode();
				}
			});
	  	//for qrcode with new api
	}
</script>
{/literal}
<!--//Add new functionality-->
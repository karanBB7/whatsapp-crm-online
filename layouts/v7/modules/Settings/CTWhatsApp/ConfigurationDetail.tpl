{*<!--
/*********************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
 ********************************************************************************/
-->*}

{strip}
<style>
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

</style>
	<div class="detailViewContainer" id="WhatsappConfiguration">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="clearfix">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<h3 style="margin-top: 0px;">{vtranslate('LBL_WHATSAPP_CONFIGURATION', $QUALIFIED_MODULE)}</h3>
				</div>
				<div class="pull-right">
					{if $SELECTEDUSERID neq ''}
						<span><a href="https://kb.crmtiger.com/article-categories/whatsapp-integration-for-vtiger/" target="_blank" title="{vtranslate('LBL_HELP', $QUALIFIED_MODULE)}"><img src="layouts/v7/modules/Settings/CTWhatsApp/images/help.png" style="width: 26px;"></a></span>&nbsp;&nbsp;&nbsp;&nbsp;

						<a class="hide" href="#" data-toggle="modal" data-target="#whatsapppolicy" style="color: blue;">{vtranslate('WHATSAPP_POLICY',$QUALIFIED_MODULE)}</a>&nbsp;&nbsp;&nbsp;&nbsp;

						{if $DAYREMAINING < 365}
							<label style="color:red;">{vtranslate('LBL_DAYS',$QUALIFIED_MODULE)} <strong>{$DAYREMAINING}</strong> {vtranslate('LBL_EXPIRE',$QUALIFIED_MODULE)} </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						{/if}

						<a class="btn" href="https://crmtiger.com/whatsapp/" target="_blank" title="{vtranslate('LBL_UPGRADETITLE',$QUALIFIED_MODULE)}" style="background-color: #055;color: white;"><img src="layouts/v7/modules/Settings/CTWhatsApp/images/btn-1.png" style="width: 25px;">&nbsp;&nbsp;{vtranslate('LBL_UPGRADE',$QUALIFIED_MODULE)}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

						<button class="btn btn-success" onclick="window.location.href='{$LICENSEDETAILURL}'" title="{vtranslate('LBL_LICENSETITLE',$QUALIFIED_MODULE)}" style="background: limegreen;"><img src="layouts/v7/modules/Settings/CTWhatsApp/images/license.png" style="width: 25px;">&nbsp;&nbsp;{vtranslate('LBL_LICENSE_SETUP', $QUALIFIED_MODULE)}</button>&nbsp;&nbsp;&nbsp;&nbsp;

						<a class="btn hide" id="updateWhatsappModule" title="{vtranslate('LBL_UPDATETITLE',$QUALIFIED_MODULE)}" style="background-color: #dcf8c6;"><img src="layouts/v7/modules/Settings/CTWhatsApp/images/update.png" style="width: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{vtranslate('LBL_UPDATE',$QUALIFIED_MODULE)}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

						<button class="btn btn-default" onclick="window.location.href='{$EDITURL}'">&nbsp;&nbsp;{vtranslate('LBL_EDIT',$QUALIFIED_MODULE)}</button>
					{/if}

					<button class="btn btn-default" onclick="window.location.href='index.php?module=CTWhatsApp&parent=Settings&view=WhatsAppUserList'">&nbsp;&nbsp;{vtranslate('LBL_CANCEL',$QUALIFIED_MODULE)}</button>

				</div>
			</div>
			<hr>
			<div style="float: left;width: 65%;">
				<div class="block"><br>
					<div class="clearfix">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<h4 style="margin-top: 0px;">{vtranslate ('LBL_WHATSAPP_INFORMATION', $QUALIFIED_MODULE)}</h4>
						</div>
					</div><hr>
					<table class="table editview-table no-border">
						<input type="hidden" name="whatsappuseid" id="whatsappuseid" value="{$WHATSAPPUSERID}">
						<input type="hidden" name="whatsAppapiurl" id="whatsAppapiurl" value="{$WHATSAPPAPIURL}">
						<tbody>
							{if $SELECTEDUSERID neq ''}
								<tr>
									<td class="fieldLabel alignMiddle" style="width: 200px;">{vtranslate('API_KEY', $QUALIFIED_MODULE)}</td>
									<td class="fieldValue" style="width: 448px;display: grid;text-overflow: initial;word-wrap: anywhere;">
										<span>{$APIURL}</span>
									</td>
								</tr>
							{/if}
							<input type="hidden" id="qrcodestatus" value="{$QRCODE_STATUS}">
							<tr>
								<td class="fieldLabel alignMiddle" style="width: 200px;">{vtranslate('AUTH_TOKEN', $QUALIFIED_MODULE)}</td>
								<td class="fieldValue">
									<span class="quthTokeForWhatsapp">{$AUTHTOKEN}</span><br/><br/>
								</td>
							</tr>

							<tr>
								<td class="fieldLabel alignMiddle"></td>
								<td class="fieldValue">

									{if $QRCODE_STATUS eq 1}
										<span>&nbsp;&nbsp;<button class="btn btn-success pleasewaitButton">{vtranslate('LBL_PLEASE_WAIT',$QUALIFIED_MODULE)}</button></span>
									{/if}
									<span>&nbsp;&nbsp;<button class="btn btn-success newqrcodescan {if $WHATSAPPSTATUS eq 1} hide {/if} {if $QRCODE_STATUS eq 1} hide {/if}" onclick="window.location.href='{$SCANQRCODE}'">{vtranslate('LBL_SCANQR_CODE',$QUALIFIED_MODULE)}</button></span>

									<span>&nbsp;&nbsp;<button class="btn btn-success" onclick="window.location.href='{$LOGOUT}'">{vtranslate('LBL_LOGOUT',$QUALIFIED_MODULE)}</button></span>
									<span>&nbsp;&nbsp;<button class="btn btn-success hide" onclick="window.location.href='{$REBOOT}'">{vtranslate('LBL_REBOOT_WHATSAPP',$QUALIFIED_MODULE)}</button></span>
									<span>&nbsp;&nbsp;<button class="btn btn-success hide" onclick="window.location.href='{$LOGOUT}'">{vtranslate('LBL_CHANGE_NUMBER',$QUALIFIED_MODULE)}</button></span>
									<span>&nbsp;&nbsp;<button class="btn btn-success importcontacts {if $WHATSAPPSTATUS eq 0} hide {/if}"  id="ShowQRPopup" data-toggle="modal" data-target="#importModalCenter">{vtranslate('LBL_IMPORT_CONTACTS',$QUALIFIED_MODULE)}</button></span>
									<div class="modal fade" id="importModalCenter" tabindex="-1" role="dialog" aria-labelledby="importModalCenterTitle" aria-hidden="true">
									  	<div class="modal-dialog modal-dialog-centered" role="document">
									    	<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle">{vtranslate('LBL_EXPORTRECORD',$QUALIFIED_MODULE)}</h5>
												</div>
												<div class="modal-body">
													<div class="lft-bar">

													<p>{vtranslate('LBL_EXPORTRECORDDES1',$QUALIFIED_MODULE)}</p>

													<p><strong>{vtranslate('LBL_EXPORTRECORDDES2',$QUALIFIED_MODULE)}</strong></p>
													<p>{vtranslate('LBL_EXPORTRECORDDES3',$QUALIFIED_MODULE)} : {$contactcount}</p>
													</div>

													<div class="rgt-bar">
														<p>{vtranslate('LBL_EXPORTRECORDDES4',$QUALIFIED_MODULE)}</p>
													</div>
												</div>

										      	<div class="modal-footer">
										        	<button type="button" class="btn btn-secondary" data-dismiss="modal">{vtranslate('CLOSE',$QUALIFIED_MODULE)}</button>
										        	<button class="btn btn-success"  onclick="window.location.href='{$IMPORTCONTACTS}?whatsappuseid={$WHATSAPPUSERID}'">{vtranslate('LBL_EXPORTRECORDDES5',$QUALIFIED_MODULE)}</button>
										      	</div>
									    	</div>
									  	</div>
									</div>
									<br/><br/>

									<span style="font-weight: bold;">{vtranslate('RQRCODEINFORMATION',$QUALIFIED_MODULE)}</span>
									<span style="background-color: #fff0b3;">{vtranslate('RQRCODEINFORMATION1',$QUALIFIED_MODULE)}</span>
									<span style="font-weight: bold;">{vtranslate('RQRCODEINFORMATION2',$QUALIFIED_MODULE)} <a style="color:blue;text-decoration: underline!important;" href="#" id="ShowQRPopup" data-toggle="modal" data-target="#exampleModalCenter">{vtranslate('CLICKHERE',$MODULE)}</a> {vtranslate('RQRCODEINFORMATION3',$QUALIFIED_MODULE)}</span>

									<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									  	<div class="modal-dialog modal-dialog-centered" role="document">
									    	<div class="modal-content">
										      	<div class="modal-header">
										        	<h5 class="modal-title" id="exampleModalLongTitle">{vtranslate('LBL_SCANQR_CODE',$QUALIFIED_MODULE)}</h5>
										     	 </div>
									      		<div class="modal-body">
									        		<img class="img-responsive" src="layouts/v7/modules/Settings/CTWhatsApp/images/QRScan.gif"/>
									      		</div>
										      	<div class="modal-footer">
										        	<button type="button" class="btn btn-secondary" data-dismiss="modal">{vtranslate('CLOSE',$QUALIFIED_MODULE)}</button>
										      	</div>
									    	</div>
									  	</div>
									</div>
								</td>
							</tr>


							{if $SELECTEDUSERID neq ''}
								<tr class="hide">
									<td class="fieldLabel alignMiddle" style="width: 200px;">{vtranslate('CUSTOMFIELD2', $QUALIFIED_MODULE)}</td>
									<td class="fieldValue">
										<span>{$WHATSAPPNO}</span>
									</td>
								</tr>
							{/if}
							
							{if $AUTHTOKENKEY}
								<tr class="whatsappQRCodeBlock">
									<input id="text" type="hidden" value="{$QRCODEURL}" style="width:80%" /><br />
									<input id="authtokenkey" type="hidden" value="{$AUTHTOKENKEY}" style="width:80%" /><br />
									<td colspan="2"  style="text-align: center;">
										<label style="font-size: 16px;"><b>
											{vtranslate('PLEASEWAITSCANQRCODE', $QUALIFIED_MODULE)}
										</b></label>
										<div class="hide" id="qrcode" style="width:150px; height:160px; margin-top:15px;margin-left: 40%;"></div>
										<div id="loadgif" style="width:150px; height:160px; margin-top:15px;margin-left: 40%;">
											<img src="layouts/v7/modules/Settings/CTWhatsApp/images/loader.gif" style="width: 172px;"/>
										</div>
									</td>
								</tr>			
							{else}
								<tr class="" {if $QRCODE_STATUS eq 1} style="border: 1px solid;" {/if}>
									<td colspan="2" style="text-align: center;">
										<label style="font-size: 16px;margin: 16px 0px 10px 0px;"><b>{$SCANMESSAGE}</b></label>
									</td>
								</tr>
							{/if}

							<tr class="whatsappStatusBlock {if $WHATSAPPSTATUS eq 0} hide {/if}" style="border: 1px solid;">
								<input type="hidden" name="whatsappstatus" id="whatsappstatus" value="{$WHATSAPPSTATUS}">
								<td colspan="2" style="text-align: center;">
									<label style="font-size: 16px;margin: 16px 0px 10px 0px;"><b>{vtranslate('WHATSAPPCONNECTED', $QUALIFIED_MODULE)}  <span class="mobilenumber">{$WHATSAPPNO}</span> </b></label><br>
									<label style="font-size: 16px;"><b><a href="index.php?module=CTWhatsApp&view=WhatsappChat&mode=allWhatsAppMSG" style="color: blue;">{vtranslate('CLICK',$QUALIFIED_MODULE)} {vtranslate('CLICKHERE',$QUALIFIED_MODULE)} </a>{vtranslate('NAVIGATETIMELINE', $QUALIFIED_MODULE)}</b></label>
								</td>
							</tr>
	
							{if $SELECTEDUSERID neq ''}
								<tr>
									<td class="fieldLabel alignMiddle" style="width: 200px;">{vtranslate('CUSTOMFIELD1', $QUALIFIED_MODULE)} <a href="#" data-toggle="modal" data-target="#exampleModalcountry"><span class="fa fa-question-circle"></span></a><br>
									{vtranslate('COUNRTYCODEINFO', $QUALIFIED_MODULE)}</td>
									<td class="fieldValue">
										<span>{$CUSTOMFIELD1}</span>
									</td>
								</tr>
								<tr class="hide">
									<td class="fieldLabel alignMiddle" style="width: 200px;">{vtranslate('WHATSAPPNO', $QUALIFIED_MODULE)}</td>
									<td class="fieldValue">
										<span>{$WHATSAPPNO}</span>
									</td>
								</tr>
								<tr>
									<td class="fieldLabel alignMiddle" style="width:  200px;">{vtranslate('ASSIGNTO', $QUALIFIED_MODULE)}</td>
									<td class="fieldValue">
										<span>{$USERNAMEGROUPNAME}</span>
									</td>
								</tr>
								<tr>
									<td class="fieldLabel alignMiddle" style="width:  200px;">{vtranslate('LBL_SHOWUNKNOWNMESSAGES', $QUALIFIED_MODULE)}&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#nonAdminUnknown"><span class="fa fa-question-circle"></span></a></td>
									<td class="fieldValue">
										<span>{if $SHOWUNKNOWNMSG eq 1} {vtranslate('LBL_YES', $QUALIFIED_MODULE)} {else} {vtranslate('LBL_NO', $QUALIFIED_MODULE)} {/if}</span>
									</td>
								</tr>
								<tr>
									<td class="fieldLabel alignMiddle" style="width:  200px;">{vtranslate('LBL_THEME', $QUALIFIED_MODULE)}</td>
									<td class="fieldValue">
										<span>{if $THEME eq 'RTL'} {vtranslate('LBL_RTL', $QUALIFIED_MODULE)} {else} {vtranslate('LBL_LTR', $QUALIFIED_MODULE)} {/if}</span>
									</td>
								</tr>
								<tr>
									<td class="fieldLabel alignMiddle" style="width:  200px;">{vtranslate('LBL_ACTIVE', $QUALIFIED_MODULE)}</td>
									<td class="fieldValue">
										{if $ICONACTIVE eq 1} {vtranslate('LBL_YES', $QUALIFIED_MODULE)} {else} {vtranslate('LBL_NO', $QUALIFIED_MODULE)} {/if}
									</td>
								</tr>
								<!-- In App Notification -->
								<tr>
									<td class="fieldLabel alignMiddle" style="width:  200px;">{vtranslate('LBL_IN_APP_NOTIFICATION', $QUALIFIED_MODULE)}</td>
									<td class="fieldValue">
										{if $INAPPNOTIFICATION neq ''}
											{$INAPPNOTIFICATION} {vtranslate('LBL_SECONDS', $QUALIFIED_MODULE)}
										{/if}
									</td>
								</tr>
								<!-- In App Notification -->
								<tr>
									<td class="fieldLabel alignMiddle" style="width:  200px;">{vtranslate('WHATSAPPMANAGEMENT', $QUALIFIED_MODULE)}</td>
									<td class="fieldValue">
										{if $WHATSAPPMANAGEMENT eq 'singleWhatsapp'} 
											{vtranslate('SINGLE_WHATSAPP', $QUALIFIED_MODULE)} 
										{else} 
											{vtranslate('MULTIPLE_WHATSAPP', $QUALIFIED_MODULE)} 
										{/if}
									</td>
								</tr>

								<tr>
									<td class="fieldLabel alignMiddle" style="width:  200px;">{vtranslate('ALLOCATEMULTIPLEWHATSAPP', $QUALIFIED_MODULE)}</td>
									<td class="fieldValue">
										{$ALLOCATEDWHATSAPPUSERS}
									</td>
								</tr>

								<!-- Add new functionality -->
								<tr>
									<td class="fieldLabel alignMiddle" style="width:  200px;">{vtranslate('LBL_AUTORESPONDER', $QUALIFIED_MODULE)}</td>
									<td class="fieldValue">
										{if $AUTORESPONDER eq 1} {vtranslate('LBL_YES', $QUALIFIED_MODULE)} {else} {vtranslate('LBL_NO', $QUALIFIED_MODULE)} {/if}
									</td>
								</tr>
								<tr>
									<td class="fieldLabel alignMiddle" style="width:  200px;">{vtranslate('LBL_AUTORESPONDERTEXT', $QUALIFIED_MODULE)}</td>
									<td class="fieldValue">
										{$AUTORESPONDERTEXT}
									</td>
								</tr>
								<!-- Add new functionality -->
							{/if}

						</tbody>
					</table>
				</div>
			</div>
			{if $SELECTEDUSERID neq ''}
				<div style="float: right;width: 30%;border: 1px solid;background-color:#fffce9;">
					<div class="block" style="background-color: #fffce9;"><br>
						<div class="clearfix">
							<div>
								<h5><b>{vtranslate ('WHATSAPP_POLICY', $QUALIFIED_MODULE)}</b></h5>
							</div>
						</div><hr>

						<p><b>{vtranslate('POLICYINFORMATION',$QUALIFIED_MODULE)} <a href="https://www.whatsapp.com/legal/business-policy/" style="color: blue;" target="_blank">{vtranslate ('WHATSAPP_POLICY', $QUALIFIED_MODULE)}</a> {vtranslate('POLICYINFORMATION1',$QUALIFIED_MODULE)}</b></p>
					</div>
				</div>
				<br><br>
				<div>
					<div class="block"><br>
						<div class="clearfix">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<h4 style="margin-top: 0px;">{vtranslate ('LBL_MASS_CONFIGURATION', $QUALIFIED_MODULE)}</h4>
							</div>
						</div><hr>
						<table class="table editview-table no-border">
							<tbody>
								<tr>
									<td class="fieldLabel alignMiddle" style="width:  200px;">{vtranslate('LBL_BATCHSIZE', $QUALIFIED_MODULE)} &nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#batchInformation"><span class="fa fa-question-circle"></span></a></td>
									<td class="fieldValue">
										<span>{$BATCH}</span>
									</td>
								</tr>
								<tr>
									<td class="fieldLabel alignMiddle" style="width:  200px;">{vtranslate('LBL_TIMEINTERVAL', $QUALIFIED_MODULE)} &nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#timeIntervalInformation"><span class="fa fa-question-circle"></span></a></td>
									<td class="fieldValue">
										<span>{$TIMEINTERVAL}</span>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<br>
				<div class="pull-right">
					<p class="ctbtn" title="{vtranslate('LBL_CLOSE_ACCOUNT',$QUALIFIED_MODULE)}" id="unInstallWhatsapp" style="color: red;"><a href="#"><b>{vtranslate("LBL_CLOSE_ACCOUNT",$MODULE)}</b></a></p>
				</div>
				<br><br>

				<div>
					<div class="block"><br>
						<div class="clearfix">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<h4 style="margin-top: 0px;">{vtranslate ('LBL_ACCESS_MODULE_TO_WHATSAPP', $QUALIFIED_MODULE)}</h4>

							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">

								<button onclick="resetval()"  class="btn btn-success btn-sm"  data-toggle="modal"  data-target="#modmodel" ><i class="fa fa-plus" aria-hidden="true"></i></button>
							</div>
							<div id="modmodel" class="modal fade" role="dialog">
	  							<div class="modal-dialog">

								    <!-- Modal content-->
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">{vtranslate ('LBL_ACCESS_MODULE_TO_WHATSAPP', $QUALIFIED_MODULE)}</h4>
								      </div>
								      <div class="modal-body">
								        <div class="clearfix">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<h4 style="margin-top: 0px;">{vtranslate ('LBL_ACCESS_MODULE_TO_WHATSAPP', $QUALIFIED_MODULE)}</h4>
								</div>
							</div><hr>
							<form id="EditViewm" action="index.php" method="post" class="form-horizontal">

				             <input type="hidden" id="type" name="type" value="0" />
		                    <table class="table editview-table no-border">
								<tbody>
									<tr><td colspan="2" class="cancelLink" id="validationmsg" hidden="" align="center"> {vtranslate ('REQUIREDMISSING', $QUALIFIED_MODULE)}</td></tr>
									<tr>
										<td class="fieldLabel alignMiddle" style="width: 300px;">{vtranslate('ALLOW_MODULE', $QUALIFIED_MODULE)}</td>
										<td class="fieldValue">
											<select class="inputElement select2  select2-offscreen" id="select_module" name="select_module" style="width: 50%;">
		                                        <option value="">{vtranslate('LBL_SELECTANOPTION',$QUALIFIED_MODULE)}</option>
		                                        {foreach from=$ALLOW_WHATSAPP_MODULES key=ALLOW_WHATSAPP_KEY  item=ALLOW_WHATSAPP_VALUE}
		                                        	<option value="{$ALLOW_WHATSAPP_VALUE}">{vtranslate ($ALLOW_WHATSAPP_VALUE, $ALLOW_WHATSAPP_VALUE)}</option>
		                                        {/foreach}
		                                    </select>
										</td>
									</tr>
									<tr>
										<td class="fieldLabel alignMiddle" style="width: 300px;">{vtranslate('WHATSAPP_PHONE_FIELD', $QUALIFIED_MODULE)}</td>
										<td class="fieldValue">
											<select class="inputElement select2 select2-offscreen" id="phone_field" name="phone_field" style="width: 50%;">
		                                        <option value="">{vtranslate('LBL_SELECTANOPTION',$QUALIFIED_MODULE)}</option>
		                                    </select>
										</td>
									</tr>
									<tr>
										<td class="fieldLabel alignMiddle" style="width:  300px;">{vtranslate('ACTIVE', $QUALIFIED_MODULE)}</td>
										<td class="fieldValue">
											<input type="checkbox"  class="inputElement" name="active" id="active" value="">
										</td>
									</tr>
								</tbody>
							</table>
							<div class="row-fluid">
		                        <div class="span12">
		                            <span>
		                                <center><button class="btn btn-success" id="submit_button" type="submit"><strong>{vtranslate('LBL_SAVE', $MODULE)}</strong></button>
		                                <a class="cancelLink" data-dismiss="modal"  href="#" type="reset">{vtranslate('LBL_CANCEL',$QUALIFIED_MODULE)}</a></center>
		                            </span>
		                        </div>
		                    </div>
		                </form>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-default" data-dismiss="modal">{vtranslate('CLOSE',$QUALIFIED_MODULE)}</button>
								      </div>
								    </div>

							  	</div>
							</div>
						</div><hr>
						<table class="table editview-table no-border">
							<thead>
								<tr>
									<th class="fieldLabel alignMiddle" style="width: 200px;">{vtranslate('MODULES', $QUALIFIED_MODULE)}</th>
									<th class="fieldLabel alignMiddle" style="width: 200px;">{vtranslate('WHATSAPP_NO_FIELD', $QUALIFIED_MODULE)}</th>
									<th class="fieldLabel alignMiddle" style="width: 200px;">{vtranslate('ACTIVE', $QUALIFIED_MODULE)}</th>
									<th class="fieldLabel alignMiddle" style="width: 200px;"></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$ALLLOWMODULES key=ALLLOWMODULES_KEY item=ALLLOWMODULES_VALUE}
									<tr>
										<td class="fieldLabel alignMiddle" style="width: 200px;">{vtranslate($ALLLOWMODULES_KEY, $ALLLOWMODULES_KEY)}</td>
										<td class="fieldLabel alignMiddle" style="width: 200px;">{vtranslate($ALLLOWMODULES_VALUE['fieldlabel'], $ALLLOWMODULES_KEY)}</td>
										<td class="fieldLabel alignMiddle" style="width: 200px;">
											{if $ALLLOWMODULES_VALUE['active'] eq 1}
												{vtranslate('LBL_YES', $QUALIFIED_MODULE)}
											{else}
												{vtranslate('LBL_NO', $QUALIFIED_MODULE)}
											{/if}
										</td>
										<td class="fieldLabel alignMiddle " style="width:200px;"><a id="deletedWhatsappModule" data-whatsappModuleName="{$ALLLOWMODULES_KEY}"><i class="fa fa-trash" aria-hidden="true"></i></a> <a href="javascript:editWModule('{$ALLLOWMODULES_KEY}',&quot;{$ALLLOWMODULES_VALUE['active']}&quot;,&quot;{$ALLLOWMODULES_VALUE['phone_field']}&quot;)"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
									</tr>
								{/foreach}
							</tbody>
						</table>
						<input type="hidden" name="" class="edit">
					</div>
				</div>
			{/if}
		</div>
	</div>


	<div class="modal fade" id="exampleModalcountry" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">{vtranslate('COUNTRYCODE_POPUP',$QUALIFIED_MODULE)}</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	       <span><b>{vtranslate('COUNTRYCODE_POPUP0',$QUALIFIED_MODULE)} : </b> {vtranslate('COUNTRYCODE_POPUP1',$QUALIFIED_MODULE)}<br>{vtranslate('COUNTRYCODE_POPUP2',$QUALIFIED_MODULE)}</span>
	       <ul>
	       <li><b>{vtranslate('COUNTRYCODE_POPUP3',$QUALIFIED_MODULE)}</b> {vtranslate('COUNTRYCODE_POPUP4',$QUALIFIED_MODULE)}
	       <br/>
	       </li>
	       <li><b>{vtranslate('COUNTRYCODE_POPUP5',$QUALIFIED_MODULE)}</b> {vtranslate('COUNTRYCODE_POPUP6',$QUALIFIED_MODULE)}
	       </li>
	       </ul>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">{vtranslate('CLOSE',$QUALIFIED_MODULE)}</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="batchInformation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
		      		<h5 class="modal-title" id="exampleModalLongTitle">{vtranslate ('LBL_MASS_CONFIGURATION', $QUALIFIED_MODULE)}</h5>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        	</button>
		      	</div>
		      	<div class="modal-body">
			       	<span>{vtranslate('BATCHINFORMATION',$QUALIFIED_MODULE)}</span><br>
		       		<span>{vtranslate('RANDOMINFORMATION', $QUALIFIED_MODULE)}</span><br>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">{vtranslate('CLOSE',$QUALIFIED_MODULE)}</button>
		      	</div>
		    </div>
  		</div>
	</div>

	<div class="modal fade" id="timeIntervalInformation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
		      		<h5 class="modal-title" id="exampleModalLongTitle">{vtranslate ('LBL_MASS_CONFIGURATION', $QUALIFIED_MODULE)}</h5>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        	</button>
		      	</div>
		      	<div class="modal-body">
			       	<span>{vtranslate('TIMEINTREVALINFORMATION', $QUALIFIED_MODULE)}</span><br>

		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">{vtranslate('CLOSE',$QUALIFIED_MODULE)}</button>
		      	</div>
		    </div>
  		</div>
	</div>

	<div class="modal fade" id="whatsapppolicy" tabindex="-1" role="dialog" aria-labelledby="whatsapppolicy" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
		      		<h5 class="modal-title" id="exampleModalLongTitle">{vtranslate ('WHATSAPP_POLICY', $QUALIFIED_MODULE)}</h5>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        	</button>
		      	</div>
		      	<div class="modal-body" style="background-color:  yellow;">
			       	<span>{vtranslate('POLICYINFORMATION',$QUALIFIED_MODULE)}</span>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">{vtranslate('CLOSE',$QUALIFIED_MODULE)}</button>
		      	</div>
		    </div>
  		</div>
	</div>

	<div class="modal fade" id="nonAdminUnknown" tabindex="-1" role="dialog" aria-labelledby="nonAdminUnknown" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
		      		<h5 class="modal-title" id="exampleModalLongTitle">{vtranslate ('LBL_SHOWUNKNOWNMESSAGES', $QUALIFIED_MODULE)}</h5>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        	</button>
		      	</div>
		      	<div class="modal-body">
			       	<span>{vtranslate('LBL_UNKNOWNINFORMATION',$QUALIFIED_MODULE)}</span>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">{vtranslate('CLOSE',$QUALIFIED_MODULE)}</button>
		      	</div>
		    </div>
  		</div>
	</div>

{/strip}

{literal}
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<script type="text/javascript" src="layouts/v7/modules/Settings/CTWhatsApp/qrcodejs/qrcode.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.3/socket.io.js' integrity='sha512-2RDFHqfLZW8IhPRvQYmK9bTLfj/hddxGXQAred2wNZGkrKQkLGj8RCkXfRJPHlDerdHHIzTFaahq4s/P4V6Qig==' crossorigin='anonymous'></script>

<script type="text/javascript">
	$(document).ready(function() {
		//for qrcode with new api
		var qrcodestatus = $('#qrcodestatus').val();
		if(qrcodestatus == ''){
			$('#loadgif').addClass('hide');
		}
		var authtokenkey = $('#authtokenkey').val();
		if(authtokenkey){
			$('.quthTokeForWhatsapp').text(authtokenkey);
			$('.newqrcodescan').addClass('hide');
			var whatsappuseid = jQuery('#whatsappuseid').val();
			var params = {
				'module' : 'CTWhatsApp',
				'parent': 'Settings',
				'view' : "WhatsappChatConfiguration",
				'mode' : "updateAuthenticationCode",
				'authtokenkey' : authtokenkey,
				'whatsappuseid' : whatsappuseid
			}
			AppConnector.request(params).then(
				function(data) {
					$(document).scrollTop($(document).height());
			});
		}
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
			$('#countdowntimer').removeClass('hide');
			$('#codeinformation').removeClass('hide');
		});
		setInterval(function(){
			var whatsappuseid = jQuery('#whatsappuseid').val();
			var params = {
                'module' : 'CTWhatsApp',
                'parent': 'Settings',
                'view' : "WhatsappChatConfiguration",
                'mode' : "getWhatsappStatus",
                'whatsappuseid' : whatsappuseid
            }
            AppConnector.request(params).then(
                function(data) {
                $('#whatsappstatus').val(data.result['whatsappStatus']);

                if(data.result['whatsappStatus'] == 1 || data.result['whatsappStatus'] == 2){
					$('.whatsappStatusBlock').removeClass('hide');
					$('.whatsappQRCodeBlock').addClass('hide');
					$('.newqrcodescan').addClass('hide');
					$('.pleasewaitButton').addClass('hide');
					$('.importcontacts').removeClass('hide');
					$('.mobilenumber').text(data.result['whatsappno']);
				}else{
					$('.whatsappStatusBlock').addClass('hide');
					$('.importcontacts').addClass('hide');
				}
            });
		}, 2000);
	});
</script>
{/literal}
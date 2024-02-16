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
	<div class="detailViewContainer" id="WhatsappConfiguration">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="clearfix">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<h3 style="margin-top: 0px;">{vtranslate('LBL_WHATSAPP_CONFIGURATION', $QUALIFIED_MODULE)}</h3>
				</div>
				<div class="pull-right">
					<span><a href="https://kb.crmtiger.com/article-categories/whatsapp-integration-for-vtiger/" target="_blank" title="{vtranslate('LBL_HELP', $QUALIFIED_MODULE)}"><img src="layouts/v7/modules/Settings/CTWhatsApp/images/help.png" style="width: 26px;"></a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a class="hide" href="#" data-toggle="modal" data-target="#whatsapppolicy" style="color: blue;">{vtranslate('WHATSAPP_POLICY',$QUALIFIED_MODULE)}</a>

					<button class="btn btn-addbutton"><a class="cancelLink" href="javascript:history.back()" type="reset">{vtranslate('LBL_CANCEL', $MODULE)}</a></center></button>
				</div>
			</div>
			<hr>
			<div style="float: left;width: 65%;">
				<div class="block">
					<form id="EditView" action="index.php" method="post" class="form-horizontal">
			            <input type="hidden" name="module" value="CTWhatsApp" />
			            <input type="hidden" name="parent" value="Settings" />
			            <input type="hidden" name="action" value="SaveConfiguration" /><br>
			            <input type="hidden" name="whatsappstatus" value="{$WHATSAPPSTATUS}" /><br>
			            <input type="hidden" name="configureUserid" value="{$CONFIGURATIONUSERID}" /><br>
			            {if $ADDMOREUSERS neq 1}
				            <div class="clearfix hide">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<h4 style="margin-top: 0px;">{vtranslate('LBL_WHATSAPP_INFORMATION', $QUALIFIED_MODULE)}</h4>
								</div>
							</div><hr>
							<table class="table editview-table no-border hide">
								<tbody>
									<tr>
										<td class="fieldLabel alignMiddle" style="width: 25%;">{vtranslate('API_KEY', $QUALIFIED_MODULE)} <span class="redColor">*</span></td>
										<td class="fieldValue">
											<input type="text" class="inputElement" name="api_url" id="api_url" value="{$APIURL}" style="width: 100%;" required>
										</td>
									</tr>
								</tbody>
							</table>

	 						<div class="clearfix">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<h4 style="margin-top: 0px;">{vtranslate('LBL_ACCESS_MODULE_TO_WHATSAPP', $QUALIFIED_MODULE)}</h4>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
									<button class="btn btn-success btn-sm addNewWPField" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
								</div>
							</div><hr>
							<table class="table editview-table no-border">
								{if $ALLLOWMODULES|count eq 0}
									<span><b>{vtranslate('LBL_SELECT_MODULE_ERROR', $QUALIFIED_MODULE)}</b></span>
								{else}
									<thead>
										<tr>
											<th class="fieldLabel alignMiddle" style="width: 200px;">{vtranslate('MODULES', $QUALIFIED_MODULE)}</th>
											<th class="fieldLabel alignMiddle" style="width: 200px;">{vtranslate('WHATSAPP_NO_FIELD', $QUALIFIED_MODULE)}</th>
											<th class="fieldLabel alignMiddle" style="width: 200px;">{vtranslate('ACTIVE', $QUALIFIED_MODULE)}</th>
											<th class="fieldLabel alignMiddle" style="width: 200px;"></th>
										</tr>
									</thead>
								{/if}
								<tbody>
									<input type="hidden" name="whatsappModuleRow" value="{$ALLLOWMODULES|count}">
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
											<td class="fieldLabel alignMiddle" style="width:200px;">
												<a id="deletedWhatsappModule" data-whatsappModuleName="{$ALLLOWMODULES_KEY}">
													<i class="fa fa-trash" aria-hidden="true"></i>
												</a> &nbsp;&nbsp;
												<a id="editWhatsappModule" data-whatsappModuleName="{$ALLLOWMODULES_KEY}">
													<i class="fa fa-edit" aria-hidden="true"></i>
												</a>
											</td>
										</tr>
									{/foreach}
								</tbody>
							</table>

							<br><br>
							<div class="clearfix">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<h4 style="margin-top: 0px;">{vtranslate('LBL_WHATSAPP_MODULE_NUMBERTO_ACCESS', $QUALIFIED_MODULE)}</h4>
								</div>
							</div><hr>
						{/if}							
						
						<table class="table editview-table no-border">
							<tbody>
								<tr class="">
									<td class="fieldLabel alignMiddle"  style="width: 25%;">
										<label class="">{vtranslate(WHATSAPPMANAGEMENT, $MODULE)}</label>
									</td>
									{if $ADDMOREUSERS eq 1}
										<td>
											{if $WHATSAPPMANAGEMENT eq 'singleWhatsapp'}
												{vtranslate(SINGLE_WHATSAPP, $MODULE)}
											{else if $WHATSAPPMANAGEMENT eq 'multipleWhatsapp'}
												{vtranslate(MULTIPLE_WHATSAPP, $MODULE)}
											{/if}
										</td>
									{else}
										<td>
											<input type="hidden" id="wpManagement" value="{$WHATSAPPMANAGEMENT}">
											<select name="whatsappmanagement" id="whatsappmanagement" style="width: 100%;" class="inputElement select2 hide">
												<option value="singleWhatsapp" {if $WHATSAPPMULTIPLE eq 'singleWhatsapp'} selected {/if}{if $WHATSAPPMANAGEMENT eq 'singleWhatsapp'} selected {/if}>{vtranslate(SINGLE_WHATSAPP, $MODULE)}</option>
												<option value="multipleWhatsapp" {if $WHATSAPPMULTIPLE eq 'multipleWhatsapp'} selected {/if}{if $WHATSAPPMANAGEMENT eq 'multipleWhatsapp'} selected {/if}>{vtranslate(MULTIPLE_WHATSAPP, $MODULE)}</option>
											</select>
										</td>
									{/if}
								</tr>
								
								<tr class="multipleUserSelect hide">
									<input type="hidden" name="multi" id="multi" value="{$WHATSAPPMULTIPLE}">
									<td class="fieldLabel alignMiddle"  style="width: 25%;">
										
									</td>
									<td colspan="3">
										<b>{vtranslate(MULTIPLE_WHATSAPP_NOTES1, $MODULE)}</b>
										<button class="btn btn-success addScanUsers" type="button" style="float: right;margin: -4px -46px 7px 8px;"><i class="fa fa-plus"></i></button>
									</td>
								</tr>
								<tr>
									<td></td>
									<td colspan="4">
										<hr>
									</td>
								</tr>
								<tr class="multipleUserSelect hide">
									<td></td>
									<td><b>{vtranslate(MW_LABEL1, $MODULE)}</b></td>
									<td><b>{vtranslate(MW_LABEL2, $MODULE)}</b></td>
									<td><b>{vtranslate(MW_ACTIVE, $MODULE)}</b></td>
									<td><b>{vtranslate(MW_ACTION, $MODULE)}</b></td>
								</tr>
								
								{if $MAINSUBUSERS}
									{foreach item=MAINSUBUSERS_VALUE key=MAINSUBUSERS_KEY from=$MAINSUBUSERS}
										<tr class="multipleUserSelect hide">
											<td></td>
											<td><a href="index.php?module=Users&view=PreferenceDetail&parent=Settings&record={$MAINSUBUSERS_VALUE['userid']}" target="_blank">{$MAINSUBUSERS_VALUE['userName']}</a></td>
											<td title="{$MAINSUBUSERS_VALUE['subUserName']}" style="overflow: hidden;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;height: 60px;">{$MAINSUBUSERS_VALUE['subUserName']}</td>
											<td>{if $MAINSUBUSERS_VALUE['active'] eq 1} {vtranslate('LBL_YES', $QUALIFIED_MODULE)} {else} {vtranslate('LBL_NO', $QUALIFIED_MODULE)} {/if}</td>
											<td>
												<span class="editUsers" data-userid="{$MAINSUBUSERS_VALUE['userid']}"><i class="fa fa-pencil"></i></span>&nbsp;&nbsp;
												<span class="deleteUsers"  data-userid="{$MAINSUBUSERS_VALUE['userid']}" style="cursor: pointer;"><i class="fa fa-trash"></i></span>
											</td>
										</tr>
									{/foreach}
								{else}
									<tr class="multipleUserSelect">
										<td class="fieldLabel alignMiddle"  style="width: 25%;">
											
										</td>
										<td colspan="3"><br>
											<b>{vtranslate('LBL_ATLEAST_CREATE_RECORD', $QUALIFIED_MODULE)}</b>
										</td>
									</tr>
								{/if}

								<tr  class="singleUserSelect {if $WHATSAPPMANAGEMENT eq 'multipleWhatsapp'} hide {/if}">
									{foreach key=BLOCK_LABEL item=BLOCK_FIELDS from=$RECORD_STRUCTURE name="EditViewBlockLevelLoop"}
										{if $BLOCK_FIELDS|@count lte 0}{continue}{/if}
											{foreach key=FIELD_NAME item=FIELD_MODEL from=$BLOCK_FIELDS name=blockfields}
												{if $FIELD_MODEL->get('label') eq 'Assigned To'}
													<td class="fieldLabel alignMiddle"  style="width: 25%;">
														<label class="">{vtranslate(ASSIGNTO, $MODULE)}</label>
													</td>
													<td>
														{include file=vtemplate_path($FIELD_MODEL->getUITypeModel()->getTemplateName(),$MODULE) BLOCK_FIELDS=$BLOCK_FIELDS}
													</td>
												{/if}
											{/foreach}
									{/foreach}
								</tr>
							</tbody>
						</table>
 						<br><br>

 						{if $ADDMOREUSERS neq 1}
	 						<br><br>
	 						<div class="clearfix">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<h4 style="margin-top: 0px;">{vtranslate('LBL_GENERAL_SEETINGS', $QUALIFIED_MODULE)}</h4>
								</div>
							</div><hr>
							<table class="table editview-table no-border">
								<tbody>
									<tr>
										<td class="fieldLabel alignMiddle" style="width: 25%;">{vtranslate('CUSTOMFIELD1', $QUALIFIED_MODULE)} <a href="#" data-toggle="modal" data-target="#exampleModalCenter"><span class="fa fa-question-circle"></span></a><br>
											{vtranslate('COUNRTYCODEINFO', $QUALIFIED_MODULE)}</td>
										<td class="fieldValue">
											<input type="text" class="inputElement" name="customfield1" id="customfield1" value="{$CUSTOMFIELD1}" style="width: 100%;">
										</td>
									</tr>
									<tr>
										<td class="fieldLabel alignMiddle" style="width: 25%;">{vtranslate('LBL_THEME', $QUALIFIED_MODULE)}</td>
										<td class="fieldValue">
											<select class="inputElement select2 select2-offscreen" id="theme_view" name="theme_view" style="width: 50%;">
		                                        <option value="">{vtranslate('LBL_SELECT_AN_OPTION', $QUALIFIED_MODULE)}</option>
		                                        <option value="RTL" {if $THEME eq 'RTL'} selected {/if}>{vtranslate('LBL_RTL', $QUALIFIED_MODULE)}</option>
		                                        <option value="LTR" {if $THEME eq 'LTR' || $THEME eq ''} selected {/if}>{vtranslate('LBL_LTR', $QUALIFIED_MODULE)}</option>
		                                    </select>
										</td>
									</tr>
									
		                            <tr class="">
										<td class="fieldLabel alignMiddle" style="width: 25%;">{vtranslate('LBL_SHOWUNKNOWNMESSAGES', $QUALIFIED_MODULE)}&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#nonAdminUnknown"><span class="fa fa-question-circle"></span></a></td>
										<td class="fieldValue">
											<input type="checkbox" name="showunknownmsg" id="showunknownmsg" {if $SHOWUNKNOWNMSG eq 1} checked {/if}>
										</td>
									</tr>

									<tr class="">
										<td class="fieldLabel alignMiddle" style="width: 25%;">{vtranslate('LBL_ACTIVE', $QUALIFIED_MODULE)}</td>
										<td class="fieldValue">
											<input type="checkbox" class="inputElement" name="iconactive" id="iconactive" {if $ICONACTIVE eq 1} checked {/if}>
										</td>
									</tr>

									<tr class="">
										<td class="fieldLabel alignMiddle" style="width: 25%;">{vtranslate('LBL_NOTIFICATION_TONE', $QUALIFIED_MODULE)}</td>
										<td class="fieldValue">
											<select class="inputElement select2 select2-offscreen" id="notificationtone" name="notificationtone" style="width: 50%;">
		                                        <option value="">{vtranslate('LBL_SELECT_AN_OPTION', $QUALIFIED_MODULE)}</option>
		                                        <option {if $NOTIFICATIONTON eq 'layouts/v7/modules/CTWhatsApp/Whatsapp Default.mp3'} selected {/if} value="layouts/v7/modules/CTWhatsApp/Whatsapp Default.mp3">{vtranslate('WhatsApp Default',$QUALIFIED_MODULE)}</option>
		                                        <option {if $NOTIFICATIONTON eq 'layouts/v7/modules/CTWhatsApp/Hangout Message.mp3'} selected {/if} value="layouts/v7/modules/CTWhatsApp/Hangout Message.mp3">{vtranslate('Hangout Message',$QUALIFIED_MODULE)}</option>
		                                        <option{if $NOTIFICATIONTON eq 'silent'} selected {/if} value="silent">{vtranslate('LBL_SILENT', $QUALIFIED_MODULE)}</option>
		                                    </select>
										</td>
									</tr>

									<tr class="">
										<td class="fieldLabel alignMiddle" style="width: 25%;">{vtranslate('LBL_WHATSAPPLOG', $QUALIFIED_MODULE)}</td>
										<td class="fieldValue">
											<input type="checkbox" class="inputElement" name="whatsapplog" id="whatsapplog" {if $WHATSAPPLOG eq 1} checked {/if}>
										</td>
									</tr>

									<tr class="">
										<td class="fieldLabel alignMiddle" style="width: 25%;">{vtranslate('LBL_WHATSAPPNOTIFICATION', $QUALIFIED_MODULE)}</td>
										<td class="fieldValue">
											<input type="checkbox" class="inputElement" name="notification" id="notification" {if $WHATSAPPNOTIFICATION eq 1} checked {/if}>
										</td>
									</tr>

									<tr class="">
										<td class="fieldLabel alignMiddle" style="width: 25%;">{vtranslate('Bot Ideal Time', $QUALIFIED_MODULE)}</td>
										<td class="fieldValue">
											<select class="inputElement select2 select2-offscreen" id="botidealtime" name="botidealtime" style="width: 50%;">
		                                        <option value="">{vtranslate('LBL_SELECT_AN_OPTION', $QUALIFIED_MODULE)}</option>
                                         		{foreach key=MANUALDATETIME_KEY item=MANUALDATETIME_VALUE from=$MANUALDATETIME}
		                                        	<option value="{$MANUALDATETIME_VALUE}" {if $BOTDEALTIME eq $MANUALDATETIME_VALUE} selected {/if}>{$MANUALDATETIME_VALUE} {vtranslate('Minutes', $QUALIFIED_MODULE)}</option>
		                                        {/foreach}
		                                    </select>
										</td>
									</tr>

								</tbody>
							</table>
							<br><br>

	 						<div class="clearfix">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<h4 style="margin-top: 0px;">{vtranslate('LBL_AUTO_MESSAGE_RESPONDER', $QUALIFIED_MODULE)}</h4>
								</div>
							</div><hr>
							<table class="table editview-table no-border">
								<tbody>
									<tr>
										<td class="fieldLabel alignMiddle" style="width: 25%;">{vtranslate('LBL_AUTORESPONDER', $QUALIFIED_MODULE)}</td>
										<td class="fieldValue">
											<input type="checkbox" name="autoresponder" id="autoresponder" {if $AUTORESPONDER eq 1} checked {/if}>
										</td>
									</tr>
									<tr>
										<td class="fieldLabel alignMiddle" style="width: 25%;">{vtranslate('LBL_AUTORESPONDERTEXT', $QUALIFIED_MODULE)}</td>
										<td class="fieldValue">
											<textarea name="autoresponder_text" style="width: 100%;height: 85px;">{$AUTORESPONDERTEXT}</textarea>
											<label><b>{vtranslate('LBL_AUTORESPONDER_LABEL', $QUALIFIED_MODULE)}</b></label>
										</td>
									</tr>
								</tbody>
							</table>
							<br><br>
							
							<br><br>
	 						<div class="clearfix">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<h4 style="margin-top: 0px;">{vtranslate('LBL_MASS_CONFIGURATION', $QUALIFIED_MODULE)}</h4>
								</div>
							</div><hr>
							<table class="table editview-table no-border">
								<tbody>
									<tr>
										<td class="fieldLabel alignMiddle" style="width: 25%;">{vtranslate('LBL_BATCHSIZE', $QUALIFIED_MODULE)}&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#batchInformation"><span class="fa fa-question-circle"></span></a></td>
										<td class="fieldValue">
											<select class="inputElement select2 select2-offscreen" id="batch" name="batch" style="width: 50%;">
		                                        <option value="">{vtranslate('LBL_SELECT_AN_OPTION', $QUALIFIED_MODULE)}</option>
		                                        {foreach key=ALLBATCH_KEY item=ALLBATCH_VALUE from=$ALLBATCH}
		                                        	<option value="{$ALLBATCH_VALUE}" {if $SELECTBATCH eq $ALLBATCH_VALUE} selected {/if}>{$ALLBATCH_VALUE}</option>
		                                        {/foreach}
		                                    </select>
										</td>
									</tr>
									<tr>
										<td class="fieldLabel alignMiddle" style="width: 25%;">{vtranslate('LBL_TIMEINTERVAL', $QUALIFIED_MODULE)}&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#timeIntervalInformation"><span class="fa fa-question-circle"></span></a></td>
										<td class="fieldValue">
											<select class="inputElement select2 select2-offscreen" id="timeinterval" name="timeinterval" style="width: 50%;">
		                                        <option value="">{vtranslate('LBL_SELECT_AN_OPTION', $QUALIFIED_MODULE)}</option>
		                                        {foreach key=ALLTIMEINTERVAL_KEY item=ALLTIMEINTERVAL_VALUE from=$ALLTIMEINTERVAL}
		                                        	<option value="{$ALLTIMEINTERVAL_VALUE}" {if $SELECTTIMEINTERVAL eq $ALLTIMEINTERVAL_VALUE} selected {/if}>{$ALLTIMEINTERVAL_VALUE}</option>
		                                        {/foreach}
		                                    </select>
										</td>
									</tr>
									<tr>
										<td class="fieldLabel alignMiddle" style="width: 25%;">{vtranslate('LBL_ALLOW_MASS_MESSAGE_USERS', $QUALIFIED_MODULE)}</td>
										<td class="fieldValue">
											{assign var=ALL_ACTIVEUSER_LIST value=$USER_MODEL->getAccessibleUsers()}
											{assign var=ACCESSIBLE_USER_LIST value=$USER_MODEL->getAccessibleUsersForModule($MODULE)}
											<select class="inputElement select2 select2-offscreen" id="allow_mass_message_access" name="allow_mass_message_access[]" style="width: 50%;" multiple="true">
		                                        {foreach key=OWNER_ID item=OWNER_NAME from=$ALL_ACTIVEUSER_LIST}
								                    <option value="{$OWNER_ID}" {if $MASSMESSAGEACCESSUSERS[$OWNER_ID] eq $OWNER_ID} selected {/if}>
								                    	{$OWNER_NAME}
								                    </option>        
											{/foreach}
		                                    </select>
										</td>
									</tr>
								</tbody>
							</table>
							<br><br>
							<div class="row-fluid">
		                        <div class="span12">
		                            <span>
		                                <center><button class="btn btn-success" id="submit_button" type="submit"><strong>{vtranslate('LBL_SAVE', $MODULE)}</strong></button>
		                                <a class="cancelLink" href="javascript:history.back()" type="reset">{vtranslate('LBL_CANCEL', $QUALIFIED_MODULE)}</a></center>
		                            </span><br>
		                        </div>
		                    </div>
		                {/if}
	                </form>
				</div>
			</div>

			<div style="float: right;width: 30%;border: 1px solid;background-color: #fffce9;">
				<div class="block" style="background-color: #fffce9;"><br>
					<div class="clearfix">
						<div>
							<h5><b>{vtranslate ('WHATSAPP_POLICY', $QUALIFIED_MODULE)}</b></h5>
						</div>
					</div><hr>

					<p><b>{vtranslate('POLICYINFORMATION',$QUALIFIED_MODULE)} <a href="https://www.whatsapp.com/legal/business-policy/" style="color: blue;" target="_blank">{vtranslate ('WHATSAPP_POLICY', $QUALIFIED_MODULE)}</a> {vtranslate('POLICYINFORMATION1',$QUALIFIED_MODULE)}</b></p>
				</div>
			</div>
		</div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">{vtranslate('LBL_CLOSE',$QUALIFIED_MODULE)}</button>
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
{/strip}
{literal}
<script type="text/javascript">
  	//<!--Add new functionality-->
	$( document ).ready(function() {
		var wpManagement = jQuery('#wpManagement').val();
		if(wpManagement == 'multipleWhatsapp'){
			jQuery('.multipleUserSelect').removeClass('hide');
		}else{
			jQuery('.multipleUserSelect').addClass('hide');
		}
	});
	//<!--Add new functionality-->

</script>
{/literal}

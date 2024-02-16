<html>
	<head>
	  	<link href="layouts/v7/modules/{$MODULE}/css/DashBoard.css" rel="stylesheet">
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
			.waTabs {
				width: 100%;
				display: inline-block;
				float: left;
			}
			ul#myTab {
				border-bottom: 1px solid #47ab47;
			}
			.nav-tabs > li {
				float: left;
				margin-bottom: -1px;
			}
			.nav-tabs > li {
				border-bottom: 0;
				margin-bottom: -1px;
			}

			ul#myTab a.nav-link.active, ul#myTab .nav-link:hover {
				background: #35aa47;
				color: #fff;
			}
			ul#myTab .nav-link {
				font-size: 15px;
				font-weight: 500;
				border: 1px solid #ddd;
				border-bottom-color: rgb(221, 221, 221);
				border-bottom-style: solid;
				border-bottom-width: 1px;
				border-bottom: 0;
				border-radius: 0;
				margin-left: -1px;
				padding: 10px 20px;
			}
			ul.dropdown-menu li img {
			  width: 20px;
			}

			.whatsapMenus.a {
				display: inline-block;
				width: 100%;
				padding: .25rem 1.5rem;
				clear: both;
				font-weight: 400;
				color: #212529;
				text-align: inherit;
				white-space: nowrap;
				background-color: transparent;
				border: 0;
				text-decoration: none;
				font-size: 14px;
			}

			.whatsapMenus p{
				color: #666;
				font-weight: 400;
				font-size: 14px;
				line-height: 20px;
				margin: 0;
			}

			.dataTables_filter {
				float: right;
			}

			.dataTables_length {
				display: none;
			}

			.pagination {
				float: right;
			}

			.dataTables_empty {
				text-align: center;
			}

	  	</style>
		<script type="text/javascript" src="layouts/v7/modules/CTWhatsApp/WhatsappBot/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="layouts/v7/modules/CTWhatsApp/WhatsappBot/dataTables.bootstrap.min.js"></script>
	</head>
	<body>
		<div class="wrapper bgb"><br>
			<section class="content">
		      	<div class="container-fluid">
		      		{if $WHATSAPPSTATUS eq 0}
			      		<div class="errorDiv" style="width: 100%;display: inline-block;text-align: center;padding: 10px 0;background: rgb(219 76 58 / 0.10);margin: 15px 0 0;">
			        		<span style="color: #db4c3a;font-size: 14px;font-weight: 600;">{vtranslate('LBL_ERROR1', $MODULE)}</span><br>
			        	</div><br><br>
			        {/if}
			        {if $NOINTERNETNUMBER}
			        	<div class="errorDiv" style="width: 100%;display: inline-block;text-align: center;padding: 10px 0;background: rgb(219 76 58 / 0.10);margin: 15px 0 0;">
			        		<span style="color: #db4c3a;font-size: 14px;font-weight: 600;">{vtranslate('LBL_NOINTERNET_MESSAGES', $MODULE)} ({$NOINTERNETNUMBER}) {vtranslate('LBL_NOINTERNET_MESSAGES1', $MODULE)}</span><br>
			        	</div><br><br>
					{/if}
			        <div class="row">
			        	<div class="dropdown">
				        	<div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" style="float: right !important;margin: 0px 15px 0px 0px;">
								<a href="#"><p>{vtranslate('LBL_QUICKACTION', 'CTWhatsApp')} <img src="layouts/v7/modules/CTWhatsApp/image/listing_green.png" style="width: 20px;"></p></a>
							</div>

							<ul class="dropdown-menu whatsapMenus" role="menu" aria-labelledby="dropdownMenu1" style="width: 243px;transform: translate3d(950px, -79px, 0px);top: 100px;left: 0px;margin: 0px 0px 0px 66px;">
								<li class="">
									<a href="{$ANALYTICSURL}">
										<span id="refreshMessages" title="{vtranslate('LBL_TIMELINE', 'CTWhatsApp')}">
											<p><img src="layouts/v7/modules/CTWhatsApp/image/listing_green.png">
											{vtranslate('LBL_TIMELINE', 'CTWhatsApp')}</p>
										</span>
									</a>
								</li>
								<li class="">
									<a href="index.php?module=CTWhatsApp&view=List">
										<span id="refreshMessages" title="{vtranslate('LBL_WHATSAPPMESSAGE', 'CTWhatsApp')}">
											<p><img src="layouts/v7/modules/CTWhatsApp/image/wa_messages.png">
											{vtranslate('LBL_WHATSAPPMESSAGE', 'CTWhatsApp')}</p>
										</span>
									</a>
								</li>
								<li class="">
									<a href="index.php?module=CTWhatsAppTemplates&view=List">
										<span id="refreshMessages" title="{vtranslate('CTWhatsAppTemplates', 'CTWhatsAppTemplates')}">
											<p><img src="layouts/v7/modules/CTWhatsApp/image/wa_templates.png">
											{vtranslate('CTWhatsAppTemplates', 'CTWhatsAppTemplates')}</p>
										</span>
									</a>
								</li>
								<li class="">
									<a href="index.php?module=Workflows&parent=Settings&view=List">
										<span id="refreshMessages" title="{vtranslate('LBL_AUTOMATEWORKFLOW', 'CTWhatsApp')}">
											<p><img src="layouts/v7/modules/CTWhatsApp/image/wa_workflow.png">
											{vtranslate('LBL_AUTOMATEWORKFLOW', 'CTWhatsApp')}</p>
										</span>
									</a>
								</li>
								<li class="">
									<a href="index.php?module=CTWhatsApp&view=WhatsappBot&mode=WhatsappBotList">
										<span id="refreshMessages" title="{vtranslate('LBL_WHATSAPPBOT', 'CTWhatsApp')}">
											<p><img src="layouts/v7/modules/CTWhatsApp/image/wa_chatboat.jpg">
											{vtranslate('LBL_WHATSAPPBOT', 'CTWhatsApp')}</p>
										</span>
									</a>
								</li>
								{if $ISADMIN eq 'on'}
									<li class="">
										<a href="index.php?module=CTWhatsApp&parent=Settings&view=WhatsAppUserList">
											<span id="refreshMessages" title="{vtranslate('LBL_SETUPWHATSAPP', 'CTWhatsApp')}">
												<p><img src="layouts/v7/modules/CTWhatsApp/image/wa_setup.png">
												{vtranslate('LBL_SETUPWHATSAPP', 'CTWhatsApp')}</p>
											</span>
										</a>
									</li>
								{/if}
							</ul>
						</div>
			        </div>
			        <div class="row">
				        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin: 0px 0px 0px -3px;">
							<div class="waTabs" >
								<ul class="nav nav-tabs activetab" id="myTab">
									<input type="hidden" id="activeMessageTab" value="SendReceiveStatistics">
									<li class="nav-itemselectTab reportChart" data-selectTab="SendReceiveStatistics">
								 		<a data-toggle="tab" class="nav-link active">
								 			{vtranslate('LBL_Send/receive_statistics', $MODULE)}
										</a>
									</li>

									<li class="nav-itemselectTab reportChart" data-selectTab="BroadcastStatistics">
								 		<a data-toggle="tab" class="nav-link">
								 			{vtranslate('LBL_Broadcast_statistics', $MODULE)}
										</a>
									</li>

									<li class="nav-itemselectTab reportChart" data-selectTab="ChatbotStatistics">
								 		<a data-toggle="tab" class="nav-link">
								 			{vtranslate('LBL_Chatbot_statistics', $MODULE)}
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

			        <div>	
			        	<div {if $ANALYTICS neq 1} style="float: left;width: 65%;" {/if}>
					        {if $DISPLAYQRCODE eq 1}
					        	<br><br>
					        	<center>
					        		<span>&nbsp;&nbsp;<button class="btn btn-success newqrcodescan {if $WHATSAPPSTATUS eq 1} hide {/if}" onclick="window.location.href='{$QRCODESCAN}'">{vtranslate('LBL_SCANQR_CODE',$QUALIFIED_MODULE)}</button></span>
									<span>&nbsp;&nbsp;<button class="btn btn-success" onclick="window.location.href='{$LOGOUT}'">{vtranslate('LBL_LOGOUT',$QUALIFIED_MODULE)}</button></span>
									<span>&nbsp;&nbsp;<button class="btn btn-success" onclick="window.location.href='{$LOGOUT}'">{vtranslate('LBL_CHANGE_NUMBER',$QUALIFIED_MODULE)}</button></span>
									<span>&nbsp;&nbsp;<button class="btn btn-success hide {if $WHATSAPPSTATUS eq 0} hide {/if}"  id="ShowQRPopup" data-toggle="modal" data-target="#importModalCenter">{vtranslate('LBL_IMPORT_CONTACTS',$QUALIFIED_MODULE)}</button></span>
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
										        	<button class="btn btn-success"  onclick="window.location.href='{$IMPORTCONTACTS}'">{vtranslate('LBL_EXPORTRECORDDES5',$QUALIFIED_MODULE)}</button>
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
								</center>
					        {/if}
				    	

				    	

					        <!--//Add new functionality-->
					        <div class="row" style="margin-bottom: -35px;">
					        	<div class="col-12">
					        		<center>
					        			{if $QRCODESTATUS eq 1}
					        				<br><br>
						        			<div class="whatsappQRCodeBlock">
												<input id="text" type="hidden" value="{$QRCODEURL}" style="width:80%" /><br />
												<input id="authtokenkey" type="hidden" value="{$AUTHTOKENKEY}" style="width:80%" /><br />
												<td colspan="2"  style="text-align: center;">
													<label id="codeinformation" class="hide" style="font-size: 16px;margin: 16px 0px 10px 0px;"><b>{vtranslate('CODEINFORMATION', $MODULE)} </b></label>
													<p><b><span class="hide" id="countdowntimer" style="margin-left: 30px;font-size: 16px">60</span></b></p>
													<div class="hide" id="qrcode" style="width:150px;height:160px;margin-top:15px;"></div>
													<div id="loadgif" style="width:150px;height:160px;margin-top:15px;">
														<img src="layouts/v7/modules/Settings/CTWhatsApp/images/loader.gif" style="width: 172px;"/>
													</div>
												</td>
											</div>
										{/if}
										<br><br>
										{if $ANALYTICS neq 1}
											<div class="whatsappStatusBlock {if $WHATSAPPSTATUS eq 0} hide {/if}" style="border: 1px solid;">
												<input type="hidden" name="whatsappstatus" id="whatsappstatus" value="{$WHATSAPPSTATUS}">
												<td colspan="2" style="text-align: center;">
													<label style="font-size: 16px;margin: 16px 0px 10px 0px;"><b>{vtranslate('WHATSAPPCONNECTED', $MODULE)}  <span class="mobilenumber">{$WHATSAPPNO}</span> </b></label>
												</td>
											</div><br>
										{/if}
					        		</center>
					        	</div>
					        </div>
					    </div>
					    {if $ANALYTICS neq 1}
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
						{/if}
					</div>
			        <!--//Add new functionality-->
					{if $ANALYTICS eq 1}
				        <div class="row">
				          	<div class="col-12">
				            	<div class="card">
				              		<div class="card-body mktg-bx-top">
										<div class="card-header rdus mrkg-hd-2">
											<h3 class="card-title massmessagesContain">{vtranslate('LBL_WHATSAPPMESSAGESUMMARY', $MODULE)}</h3>
											<br><br>
											<input type="hidden" name="periodData" value='thisweek'>
											<div style="float: left;"  class="massmessagesContain">
												<p>{vtranslate('LBL_DASHBOARDNOTE', $MODULE)}</p>
												<p><b>{vtranslate('LBL_BATCHSIZE', $MODULE)} :</b> {$BATCH}</p>
												<p><b>{vtranslate('LBL_TIMEINTERVAL', $MODULE)} :</b> {$TIMEINTERVAL}</p>
												<p><b>{vtranslate('LBL_WHATSAPPNUMBER', $MODULE)} :</b> {$WHATSAPPNUMBER}</p>
												<button class="btn btn-success hide" onclick="window.location.href='index.php?module=CTWhatsApp&view=BulkMessage&mode=bulkMessageConditionBlock&app=MARKETING'" style="float: right;">Send mass Message</button>
								         	</div>
								         	<div style="float: right;margin: -45px 0px 0px 0px;">
								         		<br>
								         		<select class="inputElement select2 hide" id="reportChart" style="width: 170px;">
													<option value="">{vtranslate('LBL_SELECT_OPTION', $MODULE)}</option>
									            	<option value="SendReceiveStatistics" selected>{vtranslate('LBL_Send/receive_statistics', $MODULE)}</option>
									            	<option value="BroadcastStatistics">{vtranslate('LBL_Broadcast_statistics', $MODULE)}</option>
									            	<option value="ChatbotStatistics">{vtranslate('LBL_Chatbot_statistics', $MODULE)}</option>
									         	</select>
									         	&nbsp;&nbsp;&nbsp;&nbsp;
									         	<select class="inputElement select2" id="scanUsers" style="width: 170px;">
													<option value="">{vtranslate('LBL_SELECTFROMNUMBER',$MODULE)}</option>
													<option value="All">All</option>
													{foreach item=MULTIPELWHATSAPPNUMBER_VALUE key=MULTIPELWHATSAPPNUMBER_KEY from=$MULTIPELWHATSAPPNUMBER}
														<option value="{$MULTIPELWHATSAPPNUMBER_VALUE['whatsappno']}">{$MULTIPELWHATSAPPNUMBER_VALUE['whatsappno']}</option>
													{/foreach}
									         	</select>
									         	&nbsp;&nbsp;&nbsp;&nbsp;
									         	<select class="inputElement select2 hide" id="progress" style="width: 170px;">
													<option value="">{vtranslate('LBL_SELECT_OPTION', $MODULE)}</option>
									            	<option value="All">{vtranslate('LBL_ALL', $MODULE)}</option>
									            	<option value="Completed">{vtranslate('LBL_COMPLETED', $MODULE)}</option>
									            	<option value="InProgress">{vtranslate('LBL_INPROGRESS', $MODULE)}</option>
									            	<option value="Hold">{vtranslate('LBL_HOLD', $MODULE)}</option>
									         	</select>
									         	&nbsp;&nbsp;&nbsp;&nbsp;
									         	<select class="inputElement select2 hide" id="whatsAppBot" style="width: 170px;">
													<option value="">{vtranslate('LBL_SELECTWHATSAPPBOT',$MODULE)}</option>
													<option value="All">All</option>
													{foreach item=WHATSAPPBOT_VALUE key=WHATSAPPBOT_KEY from=$WHATSAPPBOT}
														<option value="{$WHATSAPPBOT_KEY}">{$WHATSAPPBOT_VALUE}</option>
													{/foreach}
									         	</select>
									         	&nbsp;&nbsp;&nbsp;&nbsp;
												<select class="inputElement select2 " id="reportData" style="width: 170px;">
													<option value="">{vtranslate('LBL_SELECT_OPTION', $MODULE)}</option>
									            	<option value="today">{vtranslate('LBL_Today', $MODULE)}</option>
									            	<option value="yesterday">{vtranslate('LBL_Yesterday', $MODULE)}</option>
									            	<option value="thisweek">{vtranslate('LBL_ThisWeek', $MODULE)}</option>
									            	<option value="lastweek">{vtranslate('LBL_LastWeek', $MODULE)}</option>
									            	<option value="thismonth">{vtranslate('LBL_ThisMonth',$MODULE)}</option>
									            	<option value="lastmonth">{vtranslate('LBL_LastMonth',$MODULE)}</option>
									            	<option value="alltime">{vtranslate('LBL_ALLTIME',$MODULE)}</option>
									         	</select><br>
									    	</div>     
										</div>
										<div class="card-body mktg-bx allMassMessages hide">
											<table class="table">
												<thead class="gray-bg thead-light card-header rdus mrkg-hd-2">
													<tr>
														<th scope="col">{vtranslate('LBL_DATESENT', $MODULE)}</th>
														<th scope="col">{vtranslate('LBL_MODULE', $MODULE)}</th>
														<th scope="col">{vtranslate('LBL_MESSAGE', $MODULE)}</th>
														<th scope="col">{vtranslate('LBL_PHONEFIELD', $MODULE)}</th>
														<th scope="col" style="width: 60px;">{vtranslate('LBL_OFSENT', $MODULE)}</th>
														<th scope="col" style="width: 60px;">{vtranslate('LBL_INQUEUE', $MODULE)}</th>
														<th scope="col" style="width: 60px;">
														{vtranslate('LBL_READMESSAGE', $MODULE)}</th>
														<th scope="col" style="width: 60px;">{vtranslate('LBL_UNREADMESSAGE', $MODULE)}</th>
														<th scope="col" style="width: 60px;">{vtranslate('LBL_NUMBEROFSENT', $MODULE)}</th>
														<th scope="col">{vtranslate('LBL_STATUS', $MODULE)}</th>
														<th scope="col">{vtranslate('LBL_LASTMESSAGEDATE', $MODULE)}</th>
														<th scope="col">{vtranslate('LBL_EXPCOMPDATE', $MODULE)}</th>
														<th scope="col">{vtranslate('LBL_ACTION', $MODULE)}</th>
													</tr>
												</thead>
												<tbody class="massmessages">
												</tbody>
											</table>
										</div>

										<br><br>
										<section class="content">
		      								<div class="container-fluid">
												<div class="row SendReceiveStatistics">
													<div class="col-lg-2 col-md-2 col-sm-2" style="width: 200px;">	
														<div class="small-box bg-info">
															<div class="inner">
																<span style="color: black;font-size: 25px;" class="FinishedChat">0</span>
																<br>
																<span style="color: black;">
																	<b>	{vtranslate('LBL_FINISHEDCHAT', $MODULE)}</b>
																	<a href="" class="fa fa-eye icon FinishedChatURL hide" target="_blank"></a>
																</span>
															</div>
														</div>
													</div>
													<div class="col-lg-2 col-md-2 col-sm-2" style="width: 200px;">	
														<div class="small-box bg-info">
															<div class="inner">
																<span style="color: black;font-size: 25px;" class="PendingChat">0</span><br>
																<span style="color: black;">
																	<b>{vtranslate('LBL_PENDINGCHAT', $MODULE)}</b>
																	<a href="" class="fa fa-eye icon PendingChatURL hide" target="_blank"></a>
																</span>
															</div>
														</div>
													</div>
													<div class="col-lg-2 col-md-2 col-sm-2 hide"style="width: 200px;">	
														<div class="small-box bg-info">
															<div class="inner">
																<span style="color: black;font-size: 25px;" class="ResponseTime">0</span><br>
																<span style="color: black;">
																	<b>{vtranslate('LBL_RESPONSETIME', $MODULE)}</b>
																	<a href="" class="fa fa-eye icon ResponseTimeURL"></a target="_blank">
																</span>
															</div>
														</div>
													</div>
													<div class="col-lg-2 col-md-2 col-sm-2" style="width: 200px;">	
														<div class="small-box bg-info">
															<div class="inner">
																<span style="color: black;font-size: 25px;" class="SentMessage">0</span><br>
																<span style="color: black;">
																	<b>{vtranslate('LBL_SENTMESSAGE', $MODULE)}</b>
																	<a href="" class="fa fa-eye icon SentMessageURL" target="_blank"></a>
																</span>
															</div>
														</div>
													</div>
													<div class="col-lg-2 col-md-2 col-sm-2" style="width: 200px;">	
														<div class="small-box bg-info">
															<div class="inner">
																<span style="color: black;font-size: 25px;" class="ReceivedMessage">0</span><br>
																<span style="color: black;">
																	<b>{vtranslate('LBL_RECEIVEDMESSAGE', $MODULE)}</b>
																	<a href="" class="fa fa-eye icon ReceivedMessageURL" target="_blank"></a>
																</span>
															</div>
														</div>
													</div>
													<div class="col-lg-2 col-md-2 col-sm-2" style="width: 200px;">	
														<div class="small-box bg-info">
															<div class="inner">
																<span style="color: black;font-size: 25px;" class="TotalMessage">0</span><br>
																<span style="color: black;">
																	<b>{vtranslate('LBL_TOTALMESSAGE', $MODULE)}</b>
																	<a href="" class="fa fa-eye icon TotalMessageURL" target="_blank"></a>
																</span>
															</div>
														</div>
													</div>
												</div>

												<div class="row BroadcastStatistics hide">
													<div class="col-lg-2 col-md-2 col-sm-2">	
														<div class="small-box bg-info">
															<div class="inner">
																<span style="color: black;font-size: 25px;" class="sentMassMessage">0</span><br>
																<span style="color: black;">
																	<b>{vtranslate('LBL_SENT', $MODULE)}</b>
																	<a href="" class="fa fa-eye icon sentMassMessageURL" target="_blank"></a>
																</span>
															</div>
														</div>
													</div>
													<div class="col-lg-2 col-md-2 col-sm-2">	
														<div class="small-box bg-info">
															<div class="inner">
																<span style="color: black;font-size: 25px;" class="deliverdMassMessage">0</span><br>
																<span style="color: black;">
																	<b>{vtranslate('LBL_DELIVERD', $MODULE)}</b>
																	<a href="" class="fa fa-eye icon deliverdMassMessageURL hide" target="_blank"></a>
																</span>
															</div>
														</div>
													</div>
													<div class="col-lg-2 col-md-2 col-sm-2">	
														<div class="small-box bg-info">
															<div class="inner">
																<span style="color: black;font-size: 25px;" class="readMassMessage">0</span><br>
																<span style="color: black;">
																	<b>{vtranslate('LBL_READ', $MODULE)}</b>
																	<a href="" class="fa fa-eye icon readMassMessageURL" target="_blank"></a>
																</span>
															</div>
														</div>
													</div>
													<div class="col-lg-2 col-md-2 col-sm-2">	
														<div class="small-box bg-info">
															<div class="inner">
																<span style="color: black;font-size: 25px;" class="unreadMassMessage">0</span><br>
																<span style="color: black;">
																	<b>{vtranslate('LBL_UNREAD', $MODULE)}</b>
																	<a href="" class="fa fa-eye icon unreadMassMessageURL" target="_blank"></a>
																</span>
															</div>
														</div>
													</div>
													<div class="col-lg-2 col-md-2 col-sm-2">	
														<div class="small-box bg-info">
															<div class="inner">
																<span style="color: black;font-size: 25px;" class="failedMassMessage">0</span><br>
																<span style="color: black;">
																	<b>{vtranslate('LBL_FAILED', $MODULE)}</b>
																	<a href="" class="fa fa-eye icon failedMassMessageURL hide" target="_blank"></a>
																</span>
															</div>
														</div>
													</div>
												</div>

												<div class="row ChatbotStatistics hide">
													<div class="col-lg-2 col-md-2 col-sm-2">	
														<div class="small-box bg-info">
															<div class="inner">
																<span style="color: black;font-size: 25px;" class="activeChat">0</span><br>
																<span style="color: black;">
																	<b>{vtranslate('LBL_ACTIVECHAT', $MODULE)}</b>
																	<a href="" class="fa fa-eye icon activeChatURL hide" target="_blank"></a>
																</span>
															</div>
														</div>
													</div>
													<div class="col-lg-2 col-md-2 col-sm-2 hide">	
														<div class="small-box bg-info">
															<div class="inner">
																<span style="color: black;font-size: 25px;" class="newchat">0</span><br>
																<span style="color: black;">
																	<b>{vtranslate('LBL_NEWCHAT', $MODULE)}</b>
																	<a href="" class="fa fa-eye icon newchatURL hide" target="_blank"></a>
																</span>
															</div>
														</div>
													</div>
													<div class="col-lg-2 col-md-2 col-sm-2">	
														<div class="small-box bg-info">
															<div class="inner">
																<span style="color: black;font-size: 25px;" class="finishedBotChat">0</span><br>
																<span style="color: black;">
																	<b>{vtranslate('LBL_FINISHEDBOTCHAT', $MODULE)}</b>
																	<a href="" class="fa fa-eye icon finishedBotChatURL hide" target="_blank"></a>
																</span>
															</div>
														</div>
													</div>
													<div class="col-lg-2 col-md-2 col-sm-2">	
														<div class="small-box bg-info">
															<div class="inner">
																<span style="color: black;font-size: 25px;" class="sendMessage">0</span><br>
																<span style="color: black;">
																	<b>{vtranslate('LBL_SENTMESSAGE', $MODULE)}</b>
																	<a href="" class="fa fa-eye icon sendMessageURL hide" target="_blank"></a>
																</span>
															</div>
														</div>
													</div>
													<div class="col-lg-2 col-md-2 col-sm-2">	
														<div class="small-box bg-info">
															<div class="inner">
																<span style="color: black;font-size: 25px;" class="receivedMessage">0</span><br>
																<span style="color: black;">
																	<b>{vtranslate('LBL_RECEIVEDMESSAGE', $MODULE)}</b>
																	<a href="" class="fa fa-eye icon receivedMessageURL hide" target="_blank"></a>
																</span>
															</div>
														</div>
													</div>
													<div class="col-lg-2 col-md-2 col-sm-2">	
														<div class="small-box bg-info">
															<div class="inner">
																<span style="color: black;font-size: 25px;" class="totalBotMessage">0</span><br>
																<span style="color: black;">
																	<b>{vtranslate('LBL_TOTALBOTMESSAGE', $MODULE)}</b>
																	<a href="" class="fa fa-eye icon totalBotMessageURL hide" target="_blank"></a>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="card-header rdus mrkg-hd-2">
											<h3 class="card-title">{vtranslate('LBL_BYMESSAGE', $MODULE)}</h3>
										</div>

										<div id="bywhatsappmessage">
										</div>


				              		</div>
				            	</div>
				          	</div>
				        </div>
						
						<div class="row hide">
							<div class="col-12">
								<div class="card">
									<div class="card-body mktg-bx-top">
										<div class="card-header rdus mrkg-hd-2">
											<h3 class="card-title">{vtranslate('LBL_BYCAMPAIGN', $MODULE)}</h3>
										</div>
										<div class="card-body mktg-bx">
											
										</div>
									</div>
								</div>
							</div>
						</div>
					{/if}
		  		</div>
		    </section>
		</div>
	</body>
</html>

{literal}
<script type="text/javascript" src="libraries/jquery/bootstrapswitch/js/bootstrap-switch.min.js"></script>
<link rel="stylesheet" href="libraries/jquery/bootstrapswitch/css/bootstrap3/bootstrap-switch.min.css">
<script type="text/javascript">
    setTimeout(function(){
 		chatbottable = jQuery('.allMassMessages .table').DataTable();
  	},1000);
</script>
{/literal}

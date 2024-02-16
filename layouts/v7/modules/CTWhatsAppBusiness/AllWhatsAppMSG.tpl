<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- POPPER JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	
	<!-- BOOTSTRAP -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
   	<!-- FONT AWESOME -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- CUSTOM CSS -->
	<link rel="stylesheet"  type="text/css" href="layouts/v7/modules/CTWhatsAppBusiness/css/media.css">
	<link rel="stylesheet"  type="text/css" href="layouts/v7/modules/CTWhatsAppBusiness/css/AllWhatsAppMSG.css">

	<!-- FOR EMOJIS-->
	<link rel="stylesheet" href="layouts/v7/modules/CTWhatsAppBusiness/assets/css/reset.css">
    <link rel="stylesheet" href="layouts/v7/modules/CTWhatsAppBusiness/assets/css/style.css">
    <script src="layouts/v7/modules/CTWhatsAppBusiness/assets/js/jquery.emojiarea.js"></script>
	
	<!-- GOOGLE FONTS-->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<!-- VERTICAL TABS -->
	<script>
		function openTab(evt, tabName) {
		  var i, tabcontent, tablinks;
		  tabcontent = document.getElementsByClassName("tabcontent");
		  for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		  }
		  tablinks = document.getElementsByClassName("tablinks");
		  for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		  }
		  document.getElementById(tabName).style.display = "inline-block";
		  evt.currentTarget.className += " active";
		}

		$( document ).ready(function() {
			$('.tabcontent').css('display','none'); 
			$('#defaultTab').css('display','');

			$('#appnav .navbar-nav').addClass('hide');

			setTimeout(function(){ 
				var whatsappNumber = $("#dd li").first().attr("data-whatsappnumber");
				var whatsappNumberName = $("#dd li").first().attr("data-whatsappnumbername");
				$("#dd span").text(whatsappNumberName);
				var whatsapptype = $('#whatsapptype').val();
				if(whatsapptype != 'singleWhatsapp'){
					if(whatsappNumber){
						$('#WhatsappNumber').val(whatsappNumber);
					}
				}
			}, 1000);

			$('#hamburger').click(function() {
				$('#hamburger').toggleClass('show');
				$('#overlay').toggleClass('show');
				$('.popup-contact').toggleClass('show');
			});
		});

		function DropDown(el) {
			this.dd = el;
			this.placeholder = this.dd.children('span');
			this.opts = this.dd.find('ul.dropdown > li');
			this.val = '';
			this.index = -1;
			this.initEvents();
		}

		DropDown.prototype = {
			initEvents : function() {
				var obj = this;

				obj.dd.on('click', function(event){
					$(this).toggleClass('active');
					return false;
				});

				obj.opts.on('click',function(){
					var opt = $(this);
					obj.val = opt.text();
					obj.index = opt.index();
					var whatsapptype = $('#whatsapptype').val();
					if(whatsapptype != 'singleWhatsapp'){
						$('#WhatsappNumber').val($(this).attr("data-whatsappnumber"));
					}
					obj.placeholder.text(obj.val);
				});
			},
			getValue : function() {
				return this.val;
			},
			getIndex : function() {
				return this.index;
			}
		}

		$(function() {
			var dd = new DropDown( $('#dd') );
			$(document).click(function() {
				// all dropdowns
				$('.wrapper-dropdown').removeClass('active');
			});
		});

	</script>
</head>

<body>
	<!-- WA LISTING SECTION -->
	<div id="waListing">
		<div class="container-fluid">
			<div class="row">
				<span style="float: right;margin: 0px 18px 13px 0px;">
					{if $DAYREMAIN eq 0}<b>{vtranslate('LBL_LICENSE_EXPIRE', $MODULENAME)}</b>{/if}
				</span>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="dropdown">
						<input type="hidden" id="response_customer" value="{$RESPONSE_CUSTOMER}">
						<div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" style="float: right !important;">
							<a href="#"><p>{vtranslate('LBL_QUICKACTION', $MODULENAME)} <img src="layouts/v7/modules/CTWhatsAppBusiness/image/listing_green.png" style="width: 20px;"></p></a>
						</div>
						<ul class="dropdown-menu whatsapMenus" role="menu" aria-labelledby="dropdownMenu1" style="width:340px;">
							<li class="hide">
								<a href="#">
									<span id="refreshMessages" title="{vtranslate('LBL_REFRESH', $MODULENAME)}">
										<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/refresh.png">
										{vtranslate('LBL_REFRESH', $MODULENAME)}</p>
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span id="sendNewNumberMessage" title="{vtranslate('LBL_SEND_SMS_WHATSAPP', $MODULENAME)}">
										<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/new-chat.png">
										{vtranslate('LBL_SEND_SMS_WHATSAPP', $MODULENAME)}</p>
									</span>
								</a>
							</li>
							<li>
								<a href="index.php?module=CTWhatsAppTemplates&view=List">
									<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/wa_templates.png" title="{vtranslate('CTWhatsAppTemplates', 'CTWhatsAppTemplates')}"/>
									{vtranslate('CTWhatsAppTemplates', 'CTWhatsAppTemplates')}</p>
								</a>
							</li>
							<li>
								<a href="index.php?module=Workflows&parent=Settings&view=List">
									<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/wa_workflow.png" title="{vtranslate('LBL_AUTOMATEWORKFLOW', $MODULENAME)}"/>
									{vtranslate('LBL_AUTOMATEWORKFLOW', $MODULENAME)}</p>
								</a>
							</li>
							<li>
								<a href="index.php?module=CTWhatsAppBusiness&view=List">
									<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/wa_messages.png" title="{vtranslate('LBL_WHATSAPPMESSAGE', $MODULENAME)}"/>
									{vtranslate('LBL_WHATSAPPMESSAGE', $MODULENAME)} {vtranslate('LBL_LOG', $MODULENAME)}</p>
								</a>
							</li>
							<li>
								<a href="index.php?module=WhatsAppLog&view=List">
									<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/wa_messages.png" title="{vtranslate('LBL_WHATSAPPMESSAGELOG', $MODULENAME)}"/>
									{vtranslate('LBL_WHATSAPPMESSAGELOG', $MODULENAME)}</p>
								</a>
							</li>
							<li>
								<a href="#">
									<span id="autoResponder" title="{vtranslate('LBL_AUTORESPONDERTEXT', 'Settings:CTWhatsAppBusiness')}">
										<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/auto-responder.png">
										{vtranslate('LBL_AUTORESPONDERTEXT', 'Settings:CTWhatsAppBusiness')}</p>
									</span>
								</a>
							</li>
							<li>
								<a href="index.php?module=CTWhatsAppBusiness&view=DashBoard&mode=moduleDashBoard&analytics=1">
									<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/wa_analytics.png" title="{vtranslate('LBL_ANALYTICS', $MODULENAME)}"/>
									{vtranslate('LBL_ANALYTICS', $MODULENAME)}</p>
								</a>
							</li>

							<li>
								<a href="index.php?module=CTWhatsAppBusiness&view=WhatsappBot&mode=WhatsappBotList">
									<p><img src="layouts/v7/modules/CTWhatsApp/image/wa_chatboat.jpg" title="{vtranslate('LBL_WHATSAPPBOT', $MODULENAME)}"/>
									{vtranslate('LBL_WHATSAPPBOT', $MODULENAME)}</p>
								</a>
							</li>
							
							{if $ISADMIN eq 'on'}
								<li>
									<a href="index.php?module=CTWhatsAppBusiness&parent=Settings&view=WhatsAppUserList">
										<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/wa_setup.png" title="{vtranslate('LBL_SETUPWHATSAPP', $MODULENAME)}"/>
										{vtranslate('LBL_SETUPWHATSAPP', $MODULENAME)}</p>
									</a>
								</li>
							{/if}


							{if $ISADMIN eq 'on'}
								{if $WHATSAPPSTATUS eq 0}
									<li class="hide">
										<a href="index.php?module=CTWhatsAppBusiness&parent=Settings&view=WhatsAppUserList">
											<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/login.png" title="{vtranslate('LBL_SETUPWHATSAPP', $MODULENAME)}"/>
											{vtranslate('LBL_SETUPWHATSAPP', $MODULENAME)}</p>
										</a>
									</li>
								{/if}
							{/if}
							<li>
								<a href="https://kb.crmtiger.com/article-categories/whatsapp-business-integration-for-vtiger/" target="_blank">
									<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/help.png" title="{vtranslate('LBL_HELP', 'Vtiger')}"/>
									{vtranslate('LBL_HELP', 'Vtiger')}</p>
								</a>
							</li>
						</ul>
					</div>			
				</div>

				<!-- TABS -->
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="waTabs" >
						<input type="hidden" name="whatsapptype" id="whatsapptype" value="{$WHATSAPPUSERMANAGEMENT}">
						<input type="hidden" name="loadGroupMessageNumber" id="loadGroupMessageNumber" value="25">
						{if $WHATSAPPUSERMANAGEMENT eq 'singleWhatsapp'}
							<input type="hidden" name="WhatsappNumber" id="WhatsappNumber" value="{$WHATSAPP_NUMBER}">
						{/if}
						<ul class="nav nav-tabs activetab" id="myTab">
							<li class="nav-item whatsappModules allMessagesModule" data-selectModule="AllMessages">
						 		<input type="hidden" name="AllMessagestotalRecord" id="AllMessagestotalRecord" value="{$ALLMESSAGESCOUNTS}">
								<a data-toggle="tab" class="nav-link active">{vtranslate('LBL_ALLMESSAGES', $MODULENAME)}
									{if $ALLMESSAGESCOUNT neq 0} 
										<span class="counterMsg">{$ALLMESSAGESCOUNT}</span>
									{/if}
								</a></li>

							<li class="nav-item whatsappModules pendingModule hide" data-selectModule="Pending">
						 		<input type="hidden" name="PendingtotalRecord" id="PendingtotalRecord" value="{$IMPORTANTMESSAGECOUNTS}">
								<a data-toggle="tab" class="nav-link">{vtranslate('LBL_PENDING', $MODULENAME)}
									{if $IMPORTANTMESSAGECOUNTS neq 0} 
										<span class="counterMsg">{$IMPORTANTMESSAGECOUNTS}</span>
									{/if}
								</a></li>

						 	<li class="nav-item whatsappModules importantModule" data-selectModule="Important">
						 		<input type="hidden" name="ImportanttotalRecord" id="ImportanttotalRecord" value="{$IMPORTANTMESSAGECOUNTS}">
								<a data-toggle="tab" class="nav-link">{vtranslate('LBL_IMPORTANT', $MODULENAME)}
									{if $IMPORTANTMESSAGECOUNTS neq 0} 
										<span class="counterMsg">{$IMPORTANTMESSAGECOUNTS}</span>
									{/if}
								</a></li>

							<li class="nav-item whatsappModules" data-selectModule="NewMessages">
								<input type="hidden" name="NewMessagestotalRecord" id="NewMessagestotalRecord" value="{$NEWMESSAGESCOUNTS}">
								<a data-toggle="tab" class="nav-link">{vtranslate('LBL_NEWMESSAGES', $MODULENAME)}
									{if $NEWMESSAGECOUNTS neq 0} 
										<span class="counterMsg new_messages">{$NEWMESSAGECOUNTS}</span>
									{else}
										<span class=" new_messages"></span>
									{/if}
								</a></li> 

							{if $ISADMIN eq 'on' || $SHOWUNKOWNMESSAGES eq 1}
								<li class="nav-item whatsappModules unknownMessage" data-selectModule="Unknown">
									<input type="hidden" name="UnknowntotalRecord" id="UnknowntotalRecord" value="{$ALLUNKNOWNMESSAGECOUNTS}">
									<a data-toggle="tab" class="nav-link">{vtranslate('LBL_UNKNOWN', $MODULENAME)}
										{if $UNKNOWNMESSAGECOUNTS neq 0} 
											<span class="counterMsg">{$UNKNOWNMESSAGECOUNTS}</span>
										{/if}
									</a></li>
							{/if}

							<input type="hidden" id="whatsappModule" value="Important">

							{foreach item=WHATSAPPMODULES_VALUE key=WHATSAPPMODULES_KEY from=$WHATSAPPMODULES}
								{if $WHATSAPPMODULES_KEY == 0 || $WHATSAPPMODULES_KEY == 1}
									<li class="nav-item whatsappModules" data-selectModule="{$WHATSAPPMODULES_VALUE['module']}">
										<input type="hidden" name="{$WHATSAPPMODULES_VALUE['module']}totalRecord" id="{$WHATSAPPMODULES_VALUE['module']}totalRecord" value="{$WHATSAPPMODULES_VALUE['rows']}">
										<a data-toggle="tab" class="nav-link">{vtranslate($WHATSAPPMODULES_VALUE['module'], $WHATSAPPMODULES_VALUE['module'])}
										<span class="counterMsg hide">{$WHATSAPPMODULES_VALUE['rows']}</span></a>
									</li>
								{/if}
							{/foreach}

							<li class="nav-item hide whatsappModules othermodule" data-selectModule="">
								<a data-toggle="tab" class="nav-link othermoduleopen"></a>
							</li>

							{if $TOTALALLOWMODULE gt 2}
							    <li class="nav-item dropdown">
								    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
								    <div class="dropdown-menu">
								    	{foreach item=WHATSAPPMODULES_VALUE key=WHATSAPPMODULES_KEY from=$WHATSAPPMODULES}
											{if $WHATSAPPMODULES_KEY != 0 && $WHATSAPPMODULES_KEY != 1}
												<a class="dropdown-item dropdawnModule" data-modulename="{$WHATSAPPMODULES_VALUE['module']}" data-translatemodulename="{vtranslate($WHATSAPPMODULES_VALUE['module'], $WHATSAPPMODULES_VALUE['module'])}"  data-count="{$WHATSAPPMODULES_VALUE['rows']}" href="#">{vtranslate($WHATSAPPMODULES_VALUE['module'], $WHATSAPPMODULES_VALUE['module'])}</a>
											{/if}
										{/foreach}
								    </div>
								</li>
							{/if}

							{if $WHATSAPPMODULE eq 'free'}
								<br>
								<span class="messageLimit"><b>{vtranslate('MESSAGELIMIT1', $MODULENAME)} {$ONEDAYMESSAGE} {vtranslate('MESSAGELIMIT2', $MODULENAME)}</b></span>
							{/if}
						</ul>	
					</div>

					<!-- ERROR MESSAGE -->
						{if $WHATSAPPSTATUS eq 0}
							<div class="errorDiv">
								{if $ISADMIN eq 'on'}
									<span>{vtranslate('LBL_ERROR1', $MODULENAME)} <a href="index.php?module=CTWhatsAppBusiness&parent=Settings&view=WhatsAppUserList">{vtranslate('CLICKHERE', $MODULENAME)}</a>{vtranslate('LBL_ERROR2', $MODULENAME)}</span>
								{else}
									<span>{vtranslate('LBL_ERROR1', $MODULENAME)}</span>
									{if $WHATSAPPUSERMANAGEMENT neq 'singleWhatsapp'}
										<input type="hidden" name="scanqrcodeurl" id="scanqrcodeurl" value="{$SCANQRCODE}">
										{if $MAINUSERSTAUSROWS eq 1}
											<span class="scanQRCode" style="color: blue; cursor: pointer;">
											{vtranslate('CLICKHERE', $MODULENAME)}</span>
											<span>{vtranslate('LBL_ERROR2', $MODULENAME)}</span>
										{/if}
									{/if}
								{/if}
							</div>
						{/if}
						
						<div class="errorDiv noInternetConnection {if $NOINTERNETNUMBER} {else} hide {/if}">
							<span>{vtranslate('LBL_NOINTERNET_MESSAGES', $MODULENAME)} (<span class="noConnectionNumber">{$NOINTERNETNUMBER}</span>) {vtranslate('LBL_NOINTERNET_MESSAGES1', $MODULENAME)}</span>
						</div>
					
					<div id="broadcastgroup" class="hide">
						<span><b>{vtranslate('LBL_GROUPMESSAGE', $MODULENAME)}</b></span>
						<br>
						{if $MULTIPELWHATSAPPNUMBER}
							<select class="select2" name="groupWhatsappNumber" id="groupWhatsappNumber" style="float: right;margin: 0px 84px 0px 0px;width: 15%">
								{foreach item=MULTIPELWHATSAPPNUMBER_VALUE key=MULTIPELWHATSAPPNUMBER_KEY from=$MULTIPELWHATSAPPNUMBER}
									{if $MULTIPELWHATSAPPNUMBER_VALUE['whatsappstatus'] eq 1}
										<option value="{$MULTIPELWHATSAPPNUMBER_VALUE['whatsappno']}">{$MULTIPELWHATSAPPNUMBER_VALUE['whatsappno']}</option>
									{/if}
								{/foreach}
							</select>
						{/if}
						<img class="loadNewGroups" src="layouts/v7/modules/CTWhatsAppBusiness/image/refresh.png" style="float: right;width: 25px;margin: 3px;cursor: pointer;" title="{vtranslate('LBL_FETCH_NEW_UPDATE_GROUPS', $MODULENAME)}">
					</div>

					<!-- TOP BUTTONS DIV -->
					<div class="topBtnDiv hide">
						<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
							<div class="btn-group">
								<button type="button" class="btn markAsRead">Mark as Read</button>
								<button type="button" class="btn markAsUnRead">Mark as Unread</button>
								<button type="button" class="btn hide">Assign To</button>
							</div>
							<button type="button" class="btn dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Action</a>
								<ul class="dropdown-menu">
								  <li><a href="#">Action-1</a></li>
								  <li><a href="#">Action-2</a></li>
								  <li><a href="#">Action-3</a></li>
								</ul>
							</button>
						</div>

						<!-- FORM -->
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hide">
							<div class="searchForm">
								<input type="text" placeholder="{vtranslate('LBL_SEARCH', $MODULENAME)}" name="search" class="searchBox">
								<a href="#"><i class="fa fa-search"></i></a>
							</div>
						</div>
					</div>	
				</div>	

				<!-- TAB CONTENT -->
				<div class="tab-content waTabContent hide">
					<!-- TAB 1 -->		
					<div id="ImportantMsg" class1="tab-pane fade in">
					</div>
					<!-- TAB 2 -->				
					<div id="NewMessagesMsg">
					</div>	

					<!-- TAB 3 -->				
					<div id="UnknownMsg">
					</div>

					<!-- TAB 4 -->	
					{foreach item=WHATSAPPMODULES_VALUE key=WHATSAPPMODULES_KEY from=$WHATSAPPMODULES}
						<div id="{$WHATSAPPMODULES_VALUE['module']}Msg" class="tabcontent1 hide">
						</div>
					{/foreach}
				</div>

				<!-- TAB CONTENT -->
				<div class="tab-content waTabContent">
					<!-- TAB 1 -->				
					<div id="impMsg" class1="tab-pane fade in active">
						<div class="defaultText">
							
							<!-- LISTING -->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 padNone">									
								<!-- <input type="text" name="search" class="inputElement"> -->

								<div class="searchForm">
									<input type="text" placeholder="{vtranslate('LBL_SEARCH', $MODULENAME)}" name="search" class="searchBox">
									<input type="hidden" id="whstappContactSerach" value="">
									<a href="#"><i class="fa fa-search"></i></a>
								</div>
								<div class="smallListing">
								</div>

								<input type="hidden" name="start" id="start" value="0">
								<input type="hidden" name="perpagerecord" id="perpagerecord" value="10">

								<div class="loadBtn">
									<button type="button" id="listViewNextPageButton" class="btn listViewNextPageButton greenBtn">
										{vtranslate('LBL_LOADMORE', $MODULENAME)}
									</button>
								</div>
							</div>

							<!-- CONVERSATION -->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 padNone hide messageBlock">
								<input type="hidden" name='storageURL' id='storageURL' value="{$WHATSAPPSTORAGEURL}">
								<input type="hidden" name='whatsappConnect' id='whatsappConnect' value="{$WHATSAPPSTATUS}">
								<div class="conversationDiv yesRecordData">
									<div class="convHead">
										<div class="waProfile">
											<input type="hidden" name="phone" id="phone" value="">
											<input type="hidden" name="module_recordid" id="module_recordid" value="">
											<input type="hidden" name="openRecordID" id="openRecordID" value="">
											<div class="pic recordData1 imagename"></div>
											<div class="pName">
												<span class="recordData2"></span><br>
												<span class="mobile_number"></span>
											</div>
										</div>
										
										<ul class="nav" id="addProfile">
											<li class="closeBtn" title="{vtranslate('LBL_PREVIEW', $MODULENAME)}">
											</li>
											<li class="recordAssign">
												<img src="layouts/v7/modules/CTWhatsAppBusiness/image/assignto.png" title="{vtranslate('Assigned To', $MODULENAME)}"/>
											</li>
											<li class="editModuleRecord">
												<img class="editIcon" src="layouts/v7/modules/CTWhatsAppBusiness/image/edit.png" title="{vtranslate('LBL_EDIT_RECORD', $MODULENAME)}"/>
											</li>
											<li class="importantMessages hide"><input type="hidden" name="messagesImportant" id="messagesImportant" value=""><img src="layouts/v7/modules/CTWhatsAppBusiness/image/favorites.png" title="{vtranslate('LBL_IMPORTTANTMESSAGE', $MODULENAME)}"/></li>
										 	<li class="nav-item dropdown">
										 		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
										 			<img src="layouts/v7/modules/CTWhatsAppBusiness/image/plus.png" class="plusIcon" title="{vtranslate('LBL_STORENUMBER', $MODULENAME)}">
										 		</a>
											    <div class="dropdown-menu relatedModules">
											    </div>
											</li>
										</ul>
									</div>

									<div class="convChat recordData3">
									</div>
									<!-- TEXTBOX -->
									<div class="adminSendMessage hide">
										<center>{vtranslate('LBL_ADMIN_CAN_SEND_MESSAGES', $MODULE)}</center>
									</div>

									<div>
										<div>
											<div class="firstMessageText hide" style="width: 100%;border: 1px solid lightgray;border-radius: 6px;">
												<span class="sendTemplates" id="sendFirstTemplatesMessage" style="float: left;margin-left: 12px;cursor: pointer;">
													&nbsp;&nbsp;&nbsp;&nbsp;<p title="">{vtranslate('SELECT_TEMPLATES', $MODULENAME)} &nbsp;&nbsp;&nbsp;&nbsp;</p>
												</span>
												<i class="fa fa-file" title="To initiate conversation with new contact as per WhatsApp Policy you've to first  send selected template Authorize by WhatsApp Team. Once contact Reply on that than you will communicate with Customer." style="cursor: pointer;margin-top: 19px;margin-bottom: 17px;"></i>
												&nbsp;&nbsp;
												<a href="https://kb.crmtiger.com/article-categories/whatsapp-integration-for-vtiger/" target="_blank" title="Help"><img src="layouts/v7/modules/Settings/CTWhatsAppBusiness/images/help.png" style="width: 14px;"></a>
											</div>
											<div class="ipt-div text-wrapper">
												<div class="ipt-msg-div searchForm conversation-compose ipt-div text-wrapper" data-emojiarea data-type="unicode" data-global-picker="false">
													<input type="hidden" id="replyMessageId" value="">
													<input type="hidden" id="replymessageText" value="">
													<span aria-hidden="true" class="fa fa-close closeReplybutton hide" style="float: right;cursor: pointer;"></span>
													<div class="reply-input hide">
													</div>
													<textarea placeholder="{vtranslate('TYPE_MESSAGE', $MODULENAME)}" class="chatText writemsg" name="writemsg" id="writemsg"></textarea>

													<div class="emoji emoji-button">
					                                    <i class="fa fa-grin">&#x1f604;</i>
				                              		</div>
												</div>
												<div class="icons-wrapper">
													<div class="ipt-ioc-div">
						                              	<div class="image-upload">
			                                                <label for="filename">
			                                                    <input type="hidden" name="selectfile_data" id="selectfile_data" value="">
			                                                    <i class="fa fa-paperclip fa-2x" aria-hidden="true" style="cursor: pointer;" title="{vtranslate('LBL_ATTACH', $MODULENAME)}"></i>
			                                                    <input type="file" name="filename" id="filename" class="imageclick"/>
			                                                </label>
			                                            </div>

											          	<input type="hidden" name="wptemplateid" id="wptemplateid" value="">
											          	<div class="sendTemplates" id="sendTemplates" style="cursor: pointer;">
											          		<img src="layouts/v7/modules/CTWhatsAppBusiness/image/copy.png" alt="copy-icon" />
											          	</div>
													</div>
													<div class="ipt-div-num">
														{if $WHATSAPPUSERMANAGEMENT neq 'singleWhatsapp'}
															<input type="hidden" name="whatsappNumber" id="WhatsappNumber" value="">
															{if $ALLUSERNUMBER}
																<div id="dd" class="wrapper-dropdown" tabindex="1">
																	<div class="arrowUp">
																		<img src="layouts/v7/modules/CTWhatsAppBusiness/image/uparrow.png" width="16px">
																	</div> 
																	<span></span>
																	<ul class="dropdown">
																		{foreach item=MULTIPELWHATSAPPNUMBER_VALUE key=MULTIPELWHATSAPPNUMBER_KEY from=$ALLUSERNUMBER}
																			<li class="selectWhatsAppNumber" data-whatsappnumber="{$MULTIPELWHATSAPPNUMBER_VALUE['whatsappno']}" data-whatsappnumbername="{$MULTIPELWHATSAPPNUMBER_VALUE['username']} - {$MULTIPELWHATSAPPNUMBER_VALUE['whatsappno']}">
																				<a href="#">
																					<div class="logo">
																						<img src="layouts/v7/modules/CTWhatsAppBusiness/image/whatsapp.png" width="20px">
																					</div>{$MULTIPELWHATSAPPNUMBER_VALUE['username']} - {$MULTIPELWHATSAPPNUMBER_VALUE['whatsappno']}
																				</a>
																			</li>
																		{/foreach}
																	</ul>
																</div>
															{/if}
														{/if}

														<span id="sendwhatsappmsg" class="send msg_send_btn" style="cursor: pointer;">
										          			<img src="layouts/v7/modules/CTWhatsAppBusiness/image/send.png" alt="send-icon" />
										          		</span>
													</div>
												</div>
	        								</div>
										</div>        
									</div>
								</div>

								<div class="conversationDiv norRecordData hide">				
									 <div class="noRecords">
                                        <img src="layouts/v7/modules/CTWhatsAppBusiness/image/noRecords.png" class="noRecordsimage"/><br>
                                        <span>{vtranslate('JS_NORECORDFOUND', $MODULENAME)}</span>
                                    </div>
								</div>
							</div>

							<!-- PROFILE DETAILS -->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 padNone hide moduleDetailBlock">	
								<div class="proDetailsDiv">
									<div class="proHead">
										<div class="pic recordData1 imagename"><img src="layouts/v7/modules/CTWhatsAppBusiness/image/pic4.png" /></div>
										<div class="pName">
											<span class="recordData2"></span><br>
											<span class="mobile_number"></span>
											<span class="gropMembers hide">
												{vtranslate('LBL_GROUP_MEMBERS', $MODULENAME)} - <b class="countGroupMember"></b>
											</span>
										</div>		
										<div class="closeBtn"></div>						
									</div>
									<div class="proDetails">
										<div class="personalInfo">
											<p>First Name : <span class="recordData4">Martin</span></p>
											<p>Last Name : <span class="recordData5">Ortiz</span></p>
											<p>Mobile : <span class="recordData6">+01-123 456 7890</span></p>
											<p>Email : <span class="recordData7">mortiz@gmail.com </span></p>
										</div>
										<div class="gropMembers1 hide">
											<div class="sent" style="width: 75%;">
												<span>{vtranslate('LBL_GROUP_MEMBERS', $MODULENAME)} - 
												<b class="countGroupMember"></b></span>
											</div>
										</div>
										<div class="msgNo">
											<div class="sent">
												<span>{vtranslate('LBL_SENT', $MODULENAME)} - 
												<b class="recordData8">3</b></span></div>
											<div class="receive">
												<span>{vtranslate('LBL_RECEIVED', $MODULENAME)} -
												<b class="recordData9">4</b></span></div>
										</div>
										<div class="proForm commentSection hide">
											<form>
												<h3>{vtranslate('LBL_COMMENTS', $MODULENAME)}</h3>
												<textarea class="myInput" id="commentText" placeholder="{vtranslate('LBL_ENTERCOMMENT', $MODULENAME)}" ></textarea>
												<button class="myInput green" type="button" id="saveComment">{vtranslate('LBL_POST', $MODULENAME)}</button>
												<div class="recordData10">
													
												</div>
												<button class="myInput hide" type="button">Assigned to you today 11.10 am</button>	
												<button class="myInput hide" type="button">Conversation Started at 11.50 am</button>	
											</form>
										</div>
										<div class="recentComment">
										</div>
										<i class="fa fa-save addGroupNumber hide" title="{vtranslate('LBL_ADD_RECORD', $MODULENAME)}" style="float: right;cursor: pointer;"></i>
										<div class="groupMemberList">
										</div>
									</div>
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 padNone hide groupDetailBlock">
						        <div class="ws-grp-wrap">
						            <div class="ws-grp-info">
						                <div class="ws-grp-user">
						                    <div class="groupimagewrapper">
							                    <div class="ws-grp-user-img pic recordData1 imagename">
							                    </div>
						                        <img class="loadGroupMembers" src="layouts/v7/modules/CTWhatsAppBusiness/image/refresh.png" title="{vtranslate('LBL_FETCH_NEW_GROUP_MEMBERS', $MODULENAME)}">
						                	</div>
						                    <div class="ws-grp-user-info">
						                        <h3 class="recordData2">Group Name</h3>
						                        <div class="ws-grp-user-info-inner">
						                            <span><b class="countGroupMember"></b>&nbsp;{vtranslate('LBL_GROUP_MEMBERS', $MODULENAME)}&nbsp;<b class="countGroupMemberDownload"></b> </span><br>
						                            <span>
													<b class="recordData8">3</b> {vtranslate('LBL_SENT', $MODULENAME)} / <b class="recordData9">4</b> {vtranslate('LBL_RECEIVED', $MODULENAME)}</span>
						                        </div>
						                    </div>
						                </div>

						                <div class="ws-grp-info-content">
						                    <h2>{vtranslate('Save Contacts to vTiger !!', $MODULENAME)}</h2>
						                    <p>{vtranslate('Save Contacts Info', $MODULENAME)}</p>
						                </div>

						                <div class="ws-save-btn addGroupNumber hide" style="cursor: pointer;">
						                    <span>{vtranslate('LBL_SAVE', $MODULENAME)}</span>
						                    <img src="layouts/v7/modules/CTWhatsAppBusiness/image/save-icon.png" alt="save-icon">
						                </div>

						            </div>
						        </div>
						        <div class="groupMemberList">
								</div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

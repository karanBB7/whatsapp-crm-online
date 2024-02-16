<?php
/* Smarty version 3.1.39, created on 2023-10-06 09:17:57
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\CTWhatsAppBusiness\AllWhatsAppMSG.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_651fd0c56ec1d8_53940632',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8aff09b5f49e2380f93ad803637081c9db9f3402' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\CTWhatsAppBusiness\\AllWhatsAppMSG.tpl',
      1 => 1696583818,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_651fd0c56ec1d8_53940632 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- POPPER JS -->
	<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"><?php echo '</script'; ?>
>
	
	<!-- BOOTSTRAP -->
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"><?php echo '</script'; ?>
>
	
   	<!-- FONT AWESOME -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- CUSTOM CSS -->
	<link rel="stylesheet"  type="text/css" href="layouts/v7/modules/CTWhatsAppBusiness/css/media.css">
	<link rel="stylesheet"  type="text/css" href="layouts/v7/modules/CTWhatsAppBusiness/css/AllWhatsAppMSG.css">

	<!-- FOR EMOJIS-->
	<link rel="stylesheet" href="layouts/v7/modules/CTWhatsAppBusiness/assets/css/reset.css">
    <link rel="stylesheet" href="layouts/v7/modules/CTWhatsAppBusiness/assets/css/style.css">
    <?php echo '<script'; ?>
 src="layouts/v7/modules/CTWhatsAppBusiness/assets/js/jquery.emojiarea.js"><?php echo '</script'; ?>
>
	
	<!-- GOOGLE FONTS-->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<!-- VERTICAL TABS -->
	<?php echo '<script'; ?>
>
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

	<?php echo '</script'; ?>
>
</head>

<body>
	<!-- WA LISTING SECTION -->
	<div id="waListing">
		<div class="container-fluid">
			<div class="row">
				<span style="float: right;margin: 0px 18px 13px 0px;">
					<?php if ($_smarty_tpl->tpl_vars['DAYREMAIN']->value == 0) {?><b><?php echo vtranslate('LBL_LICENSE_EXPIRE',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</b><?php }?>
				</span>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="dropdown">
						<input type="hidden" id="response_customer" value="<?php echo $_smarty_tpl->tpl_vars['RESPONSE_CUSTOMER']->value;?>
">
						<div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" style="float: right !important;">
							<a href="#"><p><?php echo vtranslate('LBL_QUICKACTION',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 <img src="layouts/v7/modules/CTWhatsAppBusiness/image/listing_green.png" style="width: 20px;"></p></a>
						</div>
						<ul class="dropdown-menu whatsapMenus" role="menu" aria-labelledby="dropdownMenu1" style="width:340px;">
							<li class="hide">
								<a href="#">
									<span id="refreshMessages" title="<?php echo vtranslate('LBL_REFRESH',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
">
										<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/refresh.png">
										<?php echo vtranslate('LBL_REFRESH',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</p>
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span id="sendNewNumberMessage" title="<?php echo vtranslate('LBL_SEND_SMS_WHATSAPP',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
">
										<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/new-chat.png">
										<?php echo vtranslate('LBL_SEND_SMS_WHATSAPP',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</p>
									</span>
								</a>
							</li>
							<li>
								<a href="index.php?module=CTWhatsAppTemplates&view=List">
									<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/wa_templates.png" title="<?php echo vtranslate('CTWhatsAppTemplates','CTWhatsAppTemplates');?>
"/>
									<?php echo vtranslate('CTWhatsAppTemplates','CTWhatsAppTemplates');?>
</p>
								</a>
							</li>
							<li>
								<a href="index.php?module=Workflows&parent=Settings&view=List">
									<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/wa_workflow.png" title="<?php echo vtranslate('LBL_AUTOMATEWORKFLOW',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
"/>
									<?php echo vtranslate('LBL_AUTOMATEWORKFLOW',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</p>
								</a>
							</li>
							<li>
								<a href="index.php?module=CTWhatsAppBusiness&view=List">
									<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/wa_messages.png" title="<?php echo vtranslate('LBL_WHATSAPPMESSAGE',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
"/>
									<?php echo vtranslate('LBL_WHATSAPPMESSAGE',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 <?php echo vtranslate('LBL_LOG',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</p>
								</a>
							</li>
							<li>
								<a href="index.php?module=WhatsAppLog&view=List">
									<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/wa_messages.png" title="<?php echo vtranslate('LBL_WHATSAPPMESSAGELOG',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
"/>
									<?php echo vtranslate('LBL_WHATSAPPMESSAGELOG',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</p>
								</a>
							</li>
							<li>
								<a href="#">
									<span id="autoResponder" title="<?php echo vtranslate('LBL_AUTORESPONDERTEXT','Settings:CTWhatsAppBusiness');?>
">
										<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/auto-responder.png">
										<?php echo vtranslate('LBL_AUTORESPONDERTEXT','Settings:CTWhatsAppBusiness');?>
</p>
									</span>
								</a>
							</li>
							<li>
								<a href="index.php?module=CTWhatsAppBusiness&view=DashBoard&mode=moduleDashBoard&analytics=1">
									<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/wa_analytics.png" title="<?php echo vtranslate('LBL_ANALYTICS',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
"/>
									<?php echo vtranslate('LBL_ANALYTICS',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</p>
								</a>
							</li>

							<li>
								<a href="index.php?module=CTWhatsAppBusiness&view=WhatsappBot&mode=WhatsappBotList">
									<p><img src="layouts/v7/modules/CTWhatsApp/image/wa_chatboat.jpg" title="<?php echo vtranslate('LBL_WHATSAPPBOT',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
"/>
									<?php echo vtranslate('LBL_WHATSAPPBOT',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</p>
								</a>
							</li>
							
							<?php if ($_smarty_tpl->tpl_vars['ISADMIN']->value == 'on') {?>
								<li>
									<a href="index.php?module=CTWhatsAppBusiness&parent=Settings&view=WhatsAppUserList">
										<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/wa_setup.png" title="<?php echo vtranslate('LBL_SETUPWHATSAPP',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
"/>
										<?php echo vtranslate('LBL_SETUPWHATSAPP',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</p>
									</a>
								</li>
							<?php }?>


							<?php if ($_smarty_tpl->tpl_vars['ISADMIN']->value == 'on') {?>
								<?php if ($_smarty_tpl->tpl_vars['WHATSAPPSTATUS']->value == 0) {?>
									<li class="hide">
										<a href="index.php?module=CTWhatsAppBusiness&parent=Settings&view=WhatsAppUserList">
											<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/login.png" title="<?php echo vtranslate('LBL_SETUPWHATSAPP',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
"/>
											<?php echo vtranslate('LBL_SETUPWHATSAPP',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</p>
										</a>
									</li>
								<?php }?>
							<?php }?>
							<li>
								<a href="https://kb.crmtiger.com/article-categories/whatsapp-business-integration-for-vtiger/" target="_blank">
									<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/help.png" title="<?php echo vtranslate('LBL_HELP','Vtiger');?>
"/>
									<?php echo vtranslate('LBL_HELP','Vtiger');?>
</p>
								</a>
							</li>
						</ul>
					</div>			
				</div>

				<!-- TABS -->
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="waTabs" >
						<input type="hidden" name="whatsapptype" id="whatsapptype" value="<?php echo $_smarty_tpl->tpl_vars['WHATSAPPUSERMANAGEMENT']->value;?>
">
						<input type="hidden" name="loadGroupMessageNumber" id="loadGroupMessageNumber" value="25">
						<?php if ($_smarty_tpl->tpl_vars['WHATSAPPUSERMANAGEMENT']->value == 'singleWhatsapp') {?>
							<input type="hidden" name="WhatsappNumber" id="WhatsappNumber" value="<?php echo $_smarty_tpl->tpl_vars['WHATSAPP_NUMBER']->value;?>
">
						<?php }?>
						<ul class="nav nav-tabs activetab" id="myTab">
							<li class="nav-item whatsappModules allMessagesModule" data-selectModule="AllMessages">
						 		<input type="hidden" name="AllMessagestotalRecord" id="AllMessagestotalRecord" value="<?php echo $_smarty_tpl->tpl_vars['ALLMESSAGESCOUNTS']->value;?>
">
								<a data-toggle="tab" class="nav-link active"><?php echo vtranslate('LBL_ALLMESSAGES',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

									<?php if ($_smarty_tpl->tpl_vars['ALLMESSAGESCOUNT']->value != 0) {?> 
										<span class="counterMsg"><?php echo $_smarty_tpl->tpl_vars['ALLMESSAGESCOUNT']->value;?>
</span>
									<?php }?>
								</a></li>

							<li class="nav-item whatsappModules pendingModule hide" data-selectModule="Pending">
						 		<input type="hidden" name="PendingtotalRecord" id="PendingtotalRecord" value="<?php echo $_smarty_tpl->tpl_vars['IMPORTANTMESSAGECOUNTS']->value;?>
">
								<a data-toggle="tab" class="nav-link"><?php echo vtranslate('LBL_PENDING',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

									<?php if ($_smarty_tpl->tpl_vars['IMPORTANTMESSAGECOUNTS']->value != 0) {?> 
										<span class="counterMsg"><?php echo $_smarty_tpl->tpl_vars['IMPORTANTMESSAGECOUNTS']->value;?>
</span>
									<?php }?>
								</a></li>

						 	<li class="nav-item whatsappModules importantModule" data-selectModule="Important">
						 		<input type="hidden" name="ImportanttotalRecord" id="ImportanttotalRecord" value="<?php echo $_smarty_tpl->tpl_vars['IMPORTANTMESSAGECOUNTS']->value;?>
">
								<a data-toggle="tab" class="nav-link"><?php echo vtranslate('LBL_IMPORTANT',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

									<?php if ($_smarty_tpl->tpl_vars['IMPORTANTMESSAGECOUNTS']->value != 0) {?> 
										<span class="counterMsg"><?php echo $_smarty_tpl->tpl_vars['IMPORTANTMESSAGECOUNTS']->value;?>
</span>
									<?php }?>
								</a></li>

							<li class="nav-item whatsappModules" data-selectModule="NewMessages">
								<input type="hidden" name="NewMessagestotalRecord" id="NewMessagestotalRecord" value="<?php echo $_smarty_tpl->tpl_vars['NEWMESSAGESCOUNTS']->value;?>
">
								<a data-toggle="tab" class="nav-link"><?php echo vtranslate('LBL_NEWMESSAGES',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

									<?php if ($_smarty_tpl->tpl_vars['NEWMESSAGECOUNTS']->value != 0) {?> 
										<span class="counterMsg new_messages"><?php echo $_smarty_tpl->tpl_vars['NEWMESSAGECOUNTS']->value;?>
</span>
									<?php } else { ?>
										<span class=" new_messages"></span>
									<?php }?>
								</a></li> 

							<?php if ($_smarty_tpl->tpl_vars['ISADMIN']->value == 'on' || $_smarty_tpl->tpl_vars['SHOWUNKOWNMESSAGES']->value == 1) {?>
								<li class="nav-item whatsappModules unknownMessage" data-selectModule="Unknown">
									<input type="hidden" name="UnknowntotalRecord" id="UnknowntotalRecord" value="<?php echo $_smarty_tpl->tpl_vars['ALLUNKNOWNMESSAGECOUNTS']->value;?>
">
									<a data-toggle="tab" class="nav-link"><?php echo vtranslate('LBL_UNKNOWN',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

										<?php if ($_smarty_tpl->tpl_vars['UNKNOWNMESSAGECOUNTS']->value != 0) {?> 
											<span class="counterMsg"><?php echo $_smarty_tpl->tpl_vars['UNKNOWNMESSAGECOUNTS']->value;?>
</span>
										<?php }?>
									</a></li>
							<?php }?>

							<input type="hidden" id="whatsappModule" value="Important">

							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['WHATSAPPMODULES']->value, 'WHATSAPPMODULES_VALUE', false, 'WHATSAPPMODULES_KEY');
$_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['WHATSAPPMODULES_KEY']->value => $_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->value) {
$_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->do_else = false;
?>
								<?php if ($_smarty_tpl->tpl_vars['WHATSAPPMODULES_KEY']->value == 0 || $_smarty_tpl->tpl_vars['WHATSAPPMODULES_KEY']->value == 1) {?>
									<li class="nav-item whatsappModules" data-selectModule="<?php echo $_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->value['module'];?>
">
										<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->value['module'];?>
totalRecord" id="<?php echo $_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->value['module'];?>
totalRecord" value="<?php echo $_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->value['rows'];?>
">
										<a data-toggle="tab" class="nav-link"><?php echo vtranslate($_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->value['module'],$_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->value['module']);?>

										<span class="counterMsg hide"><?php echo $_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->value['rows'];?>
</span></a>
									</li>
								<?php }?>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

							<li class="nav-item hide whatsappModules othermodule" data-selectModule="">
								<a data-toggle="tab" class="nav-link othermoduleopen"></a>
							</li>

							<?php if ($_smarty_tpl->tpl_vars['TOTALALLOWMODULE']->value > 2) {?>
							    <li class="nav-item dropdown">
								    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
								    <div class="dropdown-menu">
								    	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['WHATSAPPMODULES']->value, 'WHATSAPPMODULES_VALUE', false, 'WHATSAPPMODULES_KEY');
$_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['WHATSAPPMODULES_KEY']->value => $_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->value) {
$_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->do_else = false;
?>
											<?php if ($_smarty_tpl->tpl_vars['WHATSAPPMODULES_KEY']->value != 0 && $_smarty_tpl->tpl_vars['WHATSAPPMODULES_KEY']->value != 1) {?>
												<a class="dropdown-item dropdawnModule" data-modulename="<?php echo $_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->value['module'];?>
" data-translatemodulename="<?php echo vtranslate($_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->value['module'],$_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->value['module']);?>
"  data-count="<?php echo $_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->value['rows'];?>
" href="#"><?php echo vtranslate($_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->value['module'],$_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->value['module']);?>
</a>
											<?php }?>
										<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								    </div>
								</li>
							<?php }?>

							<?php if ($_smarty_tpl->tpl_vars['WHATSAPPMODULE']->value == 'free') {?>
								<br>
								<span class="messageLimit"><b><?php echo vtranslate('MESSAGELIMIT1',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 <?php echo $_smarty_tpl->tpl_vars['ONEDAYMESSAGE']->value;?>
 <?php echo vtranslate('MESSAGELIMIT2',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</b></span>
							<?php }?>
						</ul>	
					</div>

					<!-- ERROR MESSAGE -->
						<?php if ($_smarty_tpl->tpl_vars['WHATSAPPSTATUS']->value == 0) {?>
							<div class="errorDiv">
								<?php if ($_smarty_tpl->tpl_vars['ISADMIN']->value == 'on') {?>
									<span><?php echo vtranslate('LBL_ERROR1',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 <a href="index.php?module=CTWhatsAppBusiness&parent=Settings&view=WhatsAppUserList"><?php echo vtranslate('CLICKHERE',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</a><?php echo vtranslate('LBL_ERROR2',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</span>
								<?php } else { ?>
									<span><?php echo vtranslate('LBL_ERROR1',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</span>
									<?php if ($_smarty_tpl->tpl_vars['WHATSAPPUSERMANAGEMENT']->value != 'singleWhatsapp') {?>
										<input type="hidden" name="scanqrcodeurl" id="scanqrcodeurl" value="<?php echo $_smarty_tpl->tpl_vars['SCANQRCODE']->value;?>
">
										<?php if ($_smarty_tpl->tpl_vars['MAINUSERSTAUSROWS']->value == 1) {?>
											<span class="scanQRCode" style="color: blue; cursor: pointer;">
											<?php echo vtranslate('CLICKHERE',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</span>
											<span><?php echo vtranslate('LBL_ERROR2',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</span>
										<?php }?>
									<?php }?>
								<?php }?>
							</div>
						<?php }?>
						
						<div class="errorDiv noInternetConnection <?php if ($_smarty_tpl->tpl_vars['NOINTERNETNUMBER']->value) {?> <?php } else { ?> hide <?php }?>">
							<span><?php echo vtranslate('LBL_NOINTERNET_MESSAGES',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 (<span class="noConnectionNumber"><?php echo $_smarty_tpl->tpl_vars['NOINTERNETNUMBER']->value;?>
</span>) <?php echo vtranslate('LBL_NOINTERNET_MESSAGES1',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</span>
						</div>
					
					<div id="broadcastgroup" class="hide">
						<span><b><?php echo vtranslate('LBL_GROUPMESSAGE',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</b></span>
						<br>
						<?php if ($_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER']->value) {?>
							<select class="select2" name="groupWhatsappNumber" id="groupWhatsappNumber" style="float: right;margin: 0px 84px 0px 0px;width: 15%">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER']->value, 'MULTIPELWHATSAPPNUMBER_VALUE', false, 'MULTIPELWHATSAPPNUMBER_KEY');
$_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_KEY']->value => $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->value) {
$_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->do_else = false;
?>
									<?php if ($_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->value['whatsappstatus'] == 1) {?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->value['whatsappno'];?>
"><?php echo $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->value['whatsappno'];?>
</option>
									<?php }?>
								<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</select>
						<?php }?>
						<img class="loadNewGroups" src="layouts/v7/modules/CTWhatsAppBusiness/image/refresh.png" style="float: right;width: 25px;margin: 3px;cursor: pointer;" title="<?php echo vtranslate('LBL_FETCH_NEW_UPDATE_GROUPS',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
">
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
								<input type="text" placeholder="<?php echo vtranslate('LBL_SEARCH',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
" name="search" class="searchBox">
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
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['WHATSAPPMODULES']->value, 'WHATSAPPMODULES_VALUE', false, 'WHATSAPPMODULES_KEY');
$_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['WHATSAPPMODULES_KEY']->value => $_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->value) {
$_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->do_else = false;
?>
						<div id="<?php echo $_smarty_tpl->tpl_vars['WHATSAPPMODULES_VALUE']->value['module'];?>
Msg" class="tabcontent1 hide">
						</div>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
									<input type="text" placeholder="<?php echo vtranslate('LBL_SEARCH',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
" name="search" class="searchBox">
									<input type="hidden" id="whstappContactSerach" value="">
									<a href="#"><i class="fa fa-search"></i></a>
								</div>
								<div class="smallListing">
								</div>

								<input type="hidden" name="start" id="start" value="0">
								<input type="hidden" name="perpagerecord" id="perpagerecord" value="10">

								<div class="loadBtn">
									<button type="button" id="listViewNextPageButton" class="btn listViewNextPageButton greenBtn">
										<?php echo vtranslate('LBL_LOADMORE',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

									</button>
								</div>
							</div>

							<!-- CONVERSATION -->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 padNone hide messageBlock">
								<input type="hidden" name='storageURL' id='storageURL' value="<?php echo $_smarty_tpl->tpl_vars['WHATSAPPSTORAGEURL']->value;?>
">
								<input type="hidden" name='whatsappConnect' id='whatsappConnect' value="<?php echo $_smarty_tpl->tpl_vars['WHATSAPPSTATUS']->value;?>
">
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
											<li class="closeBtn" title="<?php echo vtranslate('LBL_PREVIEW',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
">
											</li>
											<li class="recordAssign">
												<img src="layouts/v7/modules/CTWhatsAppBusiness/image/assignto.png" title="<?php echo vtranslate('Assigned To',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
"/>
											</li>
											<li class="editModuleRecord">
												<img class="editIcon" src="layouts/v7/modules/CTWhatsAppBusiness/image/edit.png" title="<?php echo vtranslate('LBL_EDIT_RECORD',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
"/>
											</li>
											<li class="importantMessages hide"><input type="hidden" name="messagesImportant" id="messagesImportant" value=""><img src="layouts/v7/modules/CTWhatsAppBusiness/image/favorites.png" title="<?php echo vtranslate('LBL_IMPORTTANTMESSAGE',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
"/></li>
										 	<li class="nav-item dropdown">
										 		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
										 			<img src="layouts/v7/modules/CTWhatsAppBusiness/image/plus.png" class="plusIcon" title="<?php echo vtranslate('LBL_STORENUMBER',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
">
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
										<center><?php echo vtranslate('LBL_ADMIN_CAN_SEND_MESSAGES',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</center>
									</div>

									<div>
										<div>
											<div class="firstMessageText hide" style="width: 100%;border: 1px solid lightgray;border-radius: 6px;">
												<span class="sendTemplates" id="sendFirstTemplatesMessage" style="float: left;margin-left: 12px;cursor: pointer;">
													&nbsp;&nbsp;&nbsp;&nbsp;<p title=""><?php echo vtranslate('SELECT_TEMPLATES',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 &nbsp;&nbsp;&nbsp;&nbsp;</p>
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
													<textarea placeholder="<?php echo vtranslate('TYPE_MESSAGE',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
" class="chatText writemsg" name="writemsg" id="writemsg"></textarea>

													<div class="emoji emoji-button">
					                                    <i class="fa fa-grin">&#x1f604;</i>
				                              		</div>
												</div>
												<div class="icons-wrapper">
													<div class="ipt-ioc-div">
						                              	<div class="image-upload">
			                                                <label for="filename">
			                                                    <input type="hidden" name="selectfile_data" id="selectfile_data" value="">
			                                                    <i class="fa fa-paperclip fa-2x" aria-hidden="true" style="cursor: pointer;" title="<?php echo vtranslate('LBL_ATTACH',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
"></i>
			                                                    <input type="file" name="filename" id="filename" class="imageclick"/>
			                                                </label>
			                                            </div>

											          	<input type="hidden" name="wptemplateid" id="wptemplateid" value="">
											          	<div class="sendTemplates" id="sendTemplates" style="cursor: pointer;">
											          		<img src="layouts/v7/modules/CTWhatsAppBusiness/image/copy.png" alt="copy-icon" />
											          	</div>
													</div>
													<div class="ipt-div-num">
														<?php if ($_smarty_tpl->tpl_vars['WHATSAPPUSERMANAGEMENT']->value != 'singleWhatsapp') {?>
															<input type="hidden" name="whatsappNumber" id="WhatsappNumber" value="">
															<?php if ($_smarty_tpl->tpl_vars['ALLUSERNUMBER']->value) {?>
																<div id="dd" class="wrapper-dropdown" tabindex="1">
																	<div class="arrowUp">
																		<img src="layouts/v7/modules/CTWhatsAppBusiness/image/uparrow.png" width="16px">
																	</div> 
																	<span></span>
																	<ul class="dropdown">
																		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALLUSERNUMBER']->value, 'MULTIPELWHATSAPPNUMBER_VALUE', false, 'MULTIPELWHATSAPPNUMBER_KEY');
$_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_KEY']->value => $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->value) {
$_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->do_else = false;
?>
																			<li class="selectWhatsAppNumber" data-whatsappnumber="<?php echo $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->value['whatsappno'];?>
" data-whatsappnumbername="<?php echo $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->value['username'];?>
 - <?php echo $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->value['whatsappno'];?>
">
																				<a href="#">
																					<div class="logo">
																						<img src="layouts/v7/modules/CTWhatsAppBusiness/image/whatsapp.png" width="20px">
																					</div><?php echo $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->value['username'];?>
 - <?php echo $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->value['whatsappno'];?>

																				</a>
																			</li>
																		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
																	</ul>
																</div>
															<?php }?>
														<?php }?>

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
                                        <span><?php echo vtranslate('JS_NORECORDFOUND',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</span>
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
												<?php echo vtranslate('LBL_GROUP_MEMBERS',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 - <b class="countGroupMember"></b>
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
												<span><?php echo vtranslate('LBL_GROUP_MEMBERS',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 - 
												<b class="countGroupMember"></b></span>
											</div>
										</div>
										<div class="msgNo">
											<div class="sent">
												<span><?php echo vtranslate('LBL_SENT',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 - 
												<b class="recordData8">3</b></span></div>
											<div class="receive">
												<span><?php echo vtranslate('LBL_RECEIVED',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 -
												<b class="recordData9">4</b></span></div>
										</div>
										<div class="proForm commentSection hide">
											<form>
												<h3><?php echo vtranslate('LBL_COMMENTS',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</h3>
												<textarea class="myInput" id="commentText" placeholder="<?php echo vtranslate('LBL_ENTERCOMMENT',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
" ></textarea>
												<button class="myInput green" type="button" id="saveComment"><?php echo vtranslate('LBL_POST',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</button>
												<div class="recordData10">
													
												</div>
												<button class="myInput hide" type="button">Assigned to you today 11.10 am</button>	
												<button class="myInput hide" type="button">Conversation Started at 11.50 am</button>	
											</form>
										</div>
										<div class="recentComment">
										</div>
										<i class="fa fa-save addGroupNumber hide" title="<?php echo vtranslate('LBL_ADD_RECORD',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
" style="float: right;cursor: pointer;"></i>
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
						                        <img class="loadGroupMembers" src="layouts/v7/modules/CTWhatsAppBusiness/image/refresh.png" title="<?php echo vtranslate('LBL_FETCH_NEW_GROUP_MEMBERS',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
">
						                	</div>
						                    <div class="ws-grp-user-info">
						                        <h3 class="recordData2">Group Name</h3>
						                        <div class="ws-grp-user-info-inner">
						                            <span><b class="countGroupMember"></b>&nbsp;<?php echo vtranslate('LBL_GROUP_MEMBERS',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
&nbsp;<b class="countGroupMemberDownload"></b> </span><br>
						                            <span>
													<b class="recordData8">3</b> <?php echo vtranslate('LBL_SENT',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 / <b class="recordData9">4</b> <?php echo vtranslate('LBL_RECEIVED',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</span>
						                        </div>
						                    </div>
						                </div>

						                <div class="ws-grp-info-content">
						                    <h2><?php echo vtranslate('Save Contacts to vTiger !!',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</h2>
						                    <p><?php echo vtranslate('Save Contacts Info',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</p>
						                </div>

						                <div class="ws-save-btn addGroupNumber hide" style="cursor: pointer;">
						                    <span><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</span>
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
<?php }
}

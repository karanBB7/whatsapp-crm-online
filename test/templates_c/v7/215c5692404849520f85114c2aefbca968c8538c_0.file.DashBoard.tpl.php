<?php
/* Smarty version 3.1.39, created on 2023-10-06 09:17:36
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\CTWhatsAppBusiness\DashBoard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_651fd0b023d909_99961694',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '215c5692404849520f85114c2aefbca968c8538c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\CTWhatsAppBusiness\\DashBoard.tpl',
      1 => 1696583819,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_651fd0b023d909_99961694 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
	<head>
	  	<link href="layouts/v7/modules/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/css/DashBoard.css" rel="stylesheet">
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

	  	</style>
	</head>
	<body>
		<div class="wrapper bgb"><br>
			<section class="content">
		      	<div class="container-fluid">
		      		<?php if ($_smarty_tpl->tpl_vars['WHATSAPPSTATUS']->value == 0) {?>
			      		<div class="errorDiv" style="width: 100%;display: inline-block;text-align: center;padding: 10px 0;background: rgb(219 76 58 / 0.10);margin: 15px 0 0;">
			        		<span style="color: #db4c3a;font-size: 14px;font-weight: 600;"><?php echo vtranslate('LBL_ERROR1',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span><br>
			        	</div><br><br>
			        <?php }?>
			        <?php if ($_smarty_tpl->tpl_vars['NOINTERNETNUMBER']->value) {?>
			        	<div class="errorDiv" style="width: 100%;display: inline-block;text-align: center;padding: 10px 0;background: rgb(219 76 58 / 0.10);margin: 15px 0 0;">
			        		<span style="color: #db4c3a;font-size: 14px;font-weight: 600;"><?php echo vtranslate('LBL_NOINTERNET_MESSAGES',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 (<?php echo $_smarty_tpl->tpl_vars['NOINTERNETNUMBER']->value;?>
) <?php echo vtranslate('LBL_NOINTERNET_MESSAGES1',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span><br>
			        	</div><br><br>
					<?php }?>
			        <div class="row">
			        	<div class="dropdown">
				        	<div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" style="float: right !important;margin: 0px 15px 0px 0px;">
								<a href="#"><p><?php echo vtranslate('LBL_QUICKACTION','CTWhatsAppBusiness');?>
 <img src="layouts/v7/modules/CTWhatsAppBusiness/image/listing_green.png" style="width: 20px;"></p></a>
							</div>

							<ul class="dropdown-menu whatsapMenus" role="menu" aria-labelledby="dropdownMenu1">
								<li class="">
									<a href="<?php echo $_smarty_tpl->tpl_vars['ANALYTICSURL']->value;?>
">
										<span id="refreshMessages" title="<?php echo vtranslate('LBL_TIMELINE','CTWhatsAppBusiness');?>
">
											<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/listing_green.png">
											<?php echo vtranslate('LBL_TIMELINE','CTWhatsAppBusiness');?>
</p>
										</span>
									</a>
								</li>
								<li class="">
									<a href="index.php?module=CTWhatsAppBusiness&view=List">
										<span id="refreshMessages" title="<?php echo vtranslate('LBL_WHATSAPPMESSAGE','CTWhatsAppBusiness');?>
">
											<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/wa_messages.png">
											<?php echo vtranslate('LBL_WHATSAPPMESSAGE','CTWhatsAppBusiness');?>
</p>
										</span>
									</a>
								</li>
								<li class="">
									<a href="index.php?module=CTWhatsAppTemplates&view=List">
										<span id="refreshMessages" title="<?php echo vtranslate('CTWhatsAppTemplates','CTWhatsAppTemplates');?>
">
											<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/wa_templates.png">
											<?php echo vtranslate('CTWhatsAppTemplates','CTWhatsAppTemplates');?>
</p>
										</span>
									</a>
								</li>
								<li class="">
									<a href="index.php?module=Workflows&parent=Settings&view=List">
										<span id="refreshMessages" title="<?php echo vtranslate('LBL_AUTOMATEWORKFLOW','CTWhatsAppBusiness');?>
">
											<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/wa_workflow.png">
											<?php echo vtranslate('LBL_AUTOMATEWORKFLOW','CTWhatsAppBusiness');?>
</p>
										</span>
									</a>
								</li>
								<li class="hide">
									<a href="index.php?module=CTWhatsAppBusiness&view=WhatsappBot&mode=WhatsappBotList">
										<span id="refreshMessages" title="<?php echo vtranslate('LBL_WHATSAPPBOT','CTWhatsAppBusiness');?>
">
											<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/wa_chatboat.jpg">
											<?php echo vtranslate('LBL_WHATSAPPBOT','CTWhatsAppBusiness');?>
</p>
										</span>
									</a>
								</li>
								<?php if ($_smarty_tpl->tpl_vars['ISADMIN']->value == 'on') {?>
									<li class="">
										<a href="index.php?module=CTWhatsAppBusiness&parent=Settings&view=WhatsAppUserList">
											<span id="refreshMessages" title="<?php echo vtranslate('LBL_SETUPWHATSAPP','CTWhatsAppBusiness');?>
">
												<p><img src="layouts/v7/modules/CTWhatsAppBusiness/image/wa_setup.png">
												<?php echo vtranslate('LBL_SETUPWHATSAPP','CTWhatsAppBusiness');?>
</p>
											</span>
										</a>
									</li>
								<?php }?>
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
								 			<?php echo vtranslate('LBL_Send/receive_statistics',$_smarty_tpl->tpl_vars['MODULE']->value);?>

										</a>
									</li>

									<li class="nav-itemselectTab reportChart" data-selectTab="BroadcastStatistics">
								 		<a data-toggle="tab" class="nav-link">
								 			<?php echo vtranslate('LBL_Broadcast_statistics',$_smarty_tpl->tpl_vars['MODULE']->value);?>

										</a>
									</li>

									<li class="nav-itemselectTab reportChart" data-selectTab="ChatbotStatistics">
								 		<a data-toggle="tab" class="nav-link">
								 			<?php echo vtranslate('LBL_Chatbot_statistics',$_smarty_tpl->tpl_vars['MODULE']->value);?>

										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

			        <div>	
			        	<div <?php if ($_smarty_tpl->tpl_vars['ANALYTICS']->value != 1) {?> style="float: left;width: 65%;" <?php }?>>
					        <?php if ($_smarty_tpl->tpl_vars['DISPLAYQRCODE']->value == 1) {?>
					        	<br><br>
					        	<center>
					        		<span>&nbsp;&nbsp;<button class="btn btn-success newqrcodescan <?php if ($_smarty_tpl->tpl_vars['WHATSAPPSTATUS']->value == 1) {?> hide <?php }?>" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['QRCODESCAN']->value;?>
'"><?php echo vtranslate('LBL_SCANQR_CODE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button></span>
									<span>&nbsp;&nbsp;<button class="btn btn-success" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['LOGOUT']->value;?>
'"><?php echo vtranslate('LBL_LOGOUT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button></span>
									<span>&nbsp;&nbsp;<button class="btn btn-success" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['LOGOUT']->value;?>
'"><?php echo vtranslate('LBL_CHANGE_NUMBER',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button></span>
									<span>&nbsp;&nbsp;<button class="btn btn-success hide <?php if ($_smarty_tpl->tpl_vars['WHATSAPPSTATUS']->value == 0) {?> hide <?php }?>"  id="ShowQRPopup" data-toggle="modal" data-target="#importModalCenter"><?php echo vtranslate('LBL_IMPORT_CONTACTS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button></span>
									<div class="modal fade" id="importModalCenter" tabindex="-1" role="dialog" aria-labelledby="importModalCenterTitle" aria-hidden="true">
									  	<div class="modal-dialog modal-dialog-centered" role="document">
									    	<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLongTitle"><?php echo vtranslate('LBL_EXPORTRECORD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h5>
													</div>
													<div class="modal-body">
														<div class="lft-bar">

														<p><?php echo vtranslate('LBL_EXPORTRECORDDES1',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</p>

														<p><strong><?php echo vtranslate('LBL_EXPORTRECORDDES2',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></p>
														<p><?php echo vtranslate('LBL_EXPORTRECORDDES3',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 : <?php echo $_smarty_tpl->tpl_vars['contactcount']->value;?>
</p>
														</div>

														<div class="rgt-bar">
															<p><?php echo vtranslate('LBL_EXPORTRECORDDES4',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</p>
														</div>
													</div>

										      	<div class="modal-footer">
										        	<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo vtranslate('CLOSE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>
										        	<button class="btn btn-success"  onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['IMPORTCONTACTS']->value;?>
'"><?php echo vtranslate('LBL_EXPORTRECORDDES5',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>
										      	</div>
									    	</div>
									  	</div>
									</div>
									<br/><br/>

									<span style="font-weight: bold;"><?php echo vtranslate('RQRCODEINFORMATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span>
									<span style="background-color: #fff0b3;"><?php echo vtranslate('RQRCODEINFORMATION1',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span>
									<span style="font-weight: bold;"><?php echo vtranslate('RQRCODEINFORMATION2',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 <a style="color:blue;text-decoration: underline!important;" href="#" id="ShowQRPopup" data-toggle="modal" data-target="#exampleModalCenter"><?php echo vtranslate('CLICKHERE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a> <?php echo vtranslate('RQRCODEINFORMATION3',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span>

									<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									  	<div class="modal-dialog modal-dialog-centered" role="document">
									    	<div class="modal-content">
										      	<div class="modal-header">
										        	<h5 class="modal-title" id="exampleModalLongTitle"><?php echo vtranslate('LBL_SCANQR_CODE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h5>
										     	 </div>
									      		<div class="modal-body">
									        		<img class="img-responsive" src="layouts/v7/modules/Settings/CTWhatsAppBusiness/images/QRScan.gif"/>
									      		</div>
										      	<div class="modal-footer">
										        	<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo vtranslate('CLOSE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>
										      	</div>
									    	</div>
									  	</div>
									</div>
								</center>
					        <?php }?>
				    	

				    	

					        <!--//Add new functionality-->
					        <div class="row" style="margin-bottom: -35px;">
					        	<div class="col-12">
					        		<center>
					        			<?php if ($_smarty_tpl->tpl_vars['QRCODESTATUS']->value == 1) {?>
					        				<br><br>
						        			<div class="whatsappQRCodeBlock">
												<input id="text" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['QRCODEURL']->value;?>
" style="width:80%" /><br />
												<input id="authtokenkey" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['AUTHTOKENKEY']->value;?>
" style="width:80%" /><br />
												<td colspan="2"  style="text-align: center;">
													<label id="codeinformation" class="hide" style="font-size: 16px;margin: 16px 0px 10px 0px;"><b><?php echo vtranslate('CODEINFORMATION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </b></label>
													<p><b><span class="hide" id="countdowntimer" style="margin-left: 30px;font-size: 16px">60</span></b></p>
													<div class="hide" id="qrcode" style="width:150px;height:160px;margin-top:15px;"></div>
													<div id="loadgif" style="width:150px;height:160px;margin-top:15px;">
														<img src="layouts/v7/modules/Settings/CTWhatsAppBusiness/images/loader.gif" style="width: 172px;"/>
													</div>
												</td>
											</div>
										<?php }?>
										<br><br>
										<?php if ($_smarty_tpl->tpl_vars['ANALYTICS']->value != 1) {?>
											<div class="whatsappStatusBlock <?php if ($_smarty_tpl->tpl_vars['WHATSAPPSTATUS']->value == 0) {?> hide <?php }?>" style="border: 1px solid;">
												<input type="hidden" name="whatsappstatus" id="whatsappstatus" value="<?php echo $_smarty_tpl->tpl_vars['WHATSAPPSTATUS']->value;?>
">
												<td colspan="2" style="text-align: center;">
													<label style="font-size: 16px;margin: 16px 0px 10px 0px;"><b><?php echo vtranslate('WHATSAPPCONNECTED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
  <span class="mobilenumber"><?php echo $_smarty_tpl->tpl_vars['WHATSAPPNO']->value;?>
</span> </b></label>
												</td>
											</div><br>
										<?php }?>
					        		</center>
					        	</div>
					        </div>
					    </div>
					    <?php if ($_smarty_tpl->tpl_vars['ANALYTICS']->value != 1) {?>
					        <div style="float: right;width: 30%;border: 1px solid;background-color:#fffce9;">
								<div class="block" style="background-color: #fffce9;"><br>
									<div class="clearfix">
										<div>
											<h5><b><?php echo vtranslate('WHATSAPP_POLICY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b></h5>
										</div>
									</div><hr>

									<p><b><?php echo vtranslate('POLICYINFORMATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 <a href="https://www.whatsapp.com/legal/business-policy/" style="color: blue;" target="_blank"><?php echo vtranslate('WHATSAPP_POLICY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a> <?php echo vtranslate('POLICYINFORMATION1',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b></p>
								</div>
							</div>
						<?php }?>
					</div>
			        <!--//Add new functionality-->
					<?php if ($_smarty_tpl->tpl_vars['ANALYTICS']->value == 1) {?>
				        <div class="row">
				          	<div class="col-12">
				            	<div class="card">
				              		<div class="card-body mktg-bx-top">
										<div class="card-header rdus mrkg-hd-2">
											<h3 class="card-title massmessagesContain"><?php echo vtranslate('LBL_WHATSAPPMESSAGESUMMARY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h3>
											<br><br>
											<input type="hidden" name="periodData" value='thisweek'>
											<div style="float: left;"  class="massmessagesContain">
												<p><?php echo vtranslate('LBL_DASHBOARDNOTE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</p>
												<p><b><?php echo vtranslate('LBL_BATCHSIZE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 :</b> <?php echo $_smarty_tpl->tpl_vars['BATCH']->value;?>
</p>
												<p><b><?php echo vtranslate('LBL_TIMEINTERVAL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 :</b> <?php echo $_smarty_tpl->tpl_vars['TIMEINTERVAL']->value;?>
</p>
												<p><b><?php echo vtranslate('LBL_WHATSAPPNUMBER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 :</b> <?php echo $_smarty_tpl->tpl_vars['WHATSAPPNUMBER']->value;?>
</p>
								         	</div>
								         	<div style="float: right;margin: -45px 0px 0px 0px;">
								         		<br>
								         		<select class="inputElement select2 hide" id="reportChart" style="width: 170px;">
													<option value=""><?php echo vtranslate('LBL_SELECT_OPTION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
									            	<option value="SendReceiveStatistics" selected><?php echo vtranslate('LBL_Send/receive_statistics',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
									            	<option value="BroadcastStatistics"><?php echo vtranslate('LBL_Broadcast_statistics',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
									            	<option value="ChatbotStatistics"><?php echo vtranslate('LBL_Chatbot_statistics',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
									         	</select>
									         	&nbsp;&nbsp;&nbsp;&nbsp;
									         	<select class="inputElement select2" id="scanUsers" style="width: 170px;">
													<option value=""><?php echo vtranslate('LBL_SELECTFROMNUMBER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
													<option value="All">All</option>
													<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER']->value, 'MULTIPELWHATSAPPNUMBER_VALUE', false, 'MULTIPELWHATSAPPNUMBER_KEY');
$_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_KEY']->value => $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->value) {
$_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->do_else = false;
?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->value['whatsappno'];?>
"><?php echo $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->value['whatsappno'];?>
</option>
													<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									         	</select>
									         	&nbsp;&nbsp;&nbsp;&nbsp;
									         	<select class="inputElement select2 hide" id="progress" style="width: 170px;">
													<option value=""><?php echo vtranslate('LBL_SELECT_OPTION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
									            	<option value="All"><?php echo vtranslate('LBL_ALL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
									            	<option value="Completed"><?php echo vtranslate('LBL_COMPLETED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
									            	<option value="InProgress"><?php echo vtranslate('LBL_INPROGRESS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
									            	<option value="Hold"><?php echo vtranslate('LBL_HOLD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
									         	</select>
									         	&nbsp;&nbsp;&nbsp;&nbsp;
									         	<select class="inputElement select2 hide" id="whatsAppBot" style="width: 170px;">
													<option value=""><?php echo vtranslate('LBL_SELECTWHATSAPPBOT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
													<option value="All">All</option>
													<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['WHATSAPPBOT']->value, 'WHATSAPPBOT_VALUE', false, 'WHATSAPPBOT_KEY');
$_smarty_tpl->tpl_vars['WHATSAPPBOT_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['WHATSAPPBOT_KEY']->value => $_smarty_tpl->tpl_vars['WHATSAPPBOT_VALUE']->value) {
$_smarty_tpl->tpl_vars['WHATSAPPBOT_VALUE']->do_else = false;
?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['WHATSAPPBOT_KEY']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['WHATSAPPBOT_VALUE']->value;?>
</option>
													<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									         	</select>
									         	&nbsp;&nbsp;&nbsp;&nbsp;
												<select class="inputElement select2 " id="reportData" style="width: 170px;">
													<option value=""><?php echo vtranslate('LBL_SELECT_OPTION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
									            	<option value="today"><?php echo vtranslate('LBL_Today',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
									            	<option value="yesterday"><?php echo vtranslate('LBL_Yesterday',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
									            	<option value="thisweek"><?php echo vtranslate('LBL_ThisWeek',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
									            	<option value="lastweek"><?php echo vtranslate('LBL_LastWeek',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
									            	<option value="thismonth"><?php echo vtranslate('LBL_ThisMonth',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
									            	<option value="lastmonth"><?php echo vtranslate('LBL_LastMonth',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
									            	<option value="alltime"><?php echo vtranslate('LBL_ALLTIME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
									         	</select><br>
									    	</div>     
										</div>
										<div class="card-body mktg-bx allMassMessages hide">
											<table class="table">
												<thead class="gray-bg thead-light card-header rdus mrkg-hd-2">
													<tr>
														<th scope="col"><?php echo vtranslate('LBL_DATESENT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th>
														<th scope="col"><?php echo vtranslate('LBL_MODULE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th>
														<th scope="col"><?php echo vtranslate('LBL_MESSAGE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th>
														<th scope="col"><?php echo vtranslate('LBL_PHONEFIELD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th>
														<th scope="col" style="width: 60px;"><?php echo vtranslate('LBL_OFSENT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th>
														<th scope="col" style="width: 60px;"><?php echo vtranslate('LBL_INQUEUE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th>
														<th scope="col" style="width: 60px;">
														<?php echo vtranslate('LBL_READMESSAGE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th>
														<th scope="col" style="width: 60px;"><?php echo vtranslate('LBL_UNREADMESSAGE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th>
														<th scope="col" style="width: 60px;"><?php echo vtranslate('LBL_NUMBEROFSENT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th>
														<th scope="col"><?php echo vtranslate('LBL_STATUS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th>
														<th scope="col"><?php echo vtranslate('LBL_LASTMESSAGEDATE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th>
														<th scope="col"><?php echo vtranslate('LBL_EXPCOMPDATE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th>
														<th scope="col"><?php echo vtranslate('LBL_ACTION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th>
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
																	<b>	<?php echo vtranslate('LBL_FINISHEDCHAT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
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
																	<b><?php echo vtranslate('LBL_PENDINGCHAT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
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
																	<b><?php echo vtranslate('LBL_RESPONSETIME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
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
																	<b><?php echo vtranslate('LBL_SENTMESSAGE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
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
																	<b><?php echo vtranslate('LBL_RECEIVEDMESSAGE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
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
																	<b><?php echo vtranslate('LBL_TOTALMESSAGE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
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
																	<b><?php echo vtranslate('LBL_SENT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
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
																	<b><?php echo vtranslate('LBL_DELIVERD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
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
																	<b><?php echo vtranslate('LBL_READ',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
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
																	<b><?php echo vtranslate('LBL_UNREAD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
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
																	<b><?php echo vtranslate('LBL_FAILED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
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
																	<b><?php echo vtranslate('LBL_ACTIVECHAT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
																	<a href="" class="fa fa-eye icon activeChatURL hide" target="_blank"></a>
																</span>
															</div>
														</div>
													</div>
													<div class="col-lg-2 col-md-2 col-sm-2">	
														<div class="small-box bg-info">
															<div class="inner">
																<span style="color: black;font-size: 25px;" class="newchat">0</span><br>
																<span style="color: black;">
																	<b><?php echo vtranslate('LBL_NEWCHAT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
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
																	<b><?php echo vtranslate('LBL_FINISHEDBOTCHAT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
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
																	<b><?php echo vtranslate('LBL_SENTMESSAGE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
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
																	<b><?php echo vtranslate('LBL_RECEIVEDMESSAGE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
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
																	<b><?php echo vtranslate('LBL_TOTALBOTMESSAGE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
																	<a href="" class="fa fa-eye icon totalBotMessageURL hide" target="_blank"></a>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="card-header rdus mrkg-hd-2">
											<h3 class="card-title"><?php echo vtranslate('LBL_BYMESSAGE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h3>
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
											<h3 class="card-title"><?php echo vtranslate('LBL_BYCAMPAIGN',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h3>
										</div>
										<div class="card-body mktg-bx">
											
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php }?>
		  		</div>
		    </section>
		</div>
	</body>
</html>

<?php }
}

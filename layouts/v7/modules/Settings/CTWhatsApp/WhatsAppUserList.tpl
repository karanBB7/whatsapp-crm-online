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
<style type="text/css">
	.bootstrap-switch .bootstrap-switch-handle-on.bootstrap-switch-primary, .bootstrap-switch .bootstrap-switch-handle-off.bootstrap-switch-primary {
		background: #70c257 !important;
	}
</style>
{strip}
<div class="detailViewContainer" id="WhatsappConfiguration1">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="clearfix">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<h3 style="margin-top: 0px;">{vtranslate('LBL_WHATSAPP_CONFIGURATION_USERS', $QUALIFIED_MODULE)}</h3>
			</div>
			<div class="pull-right">
				<input type="hidden" id="currenVersion" value="{$CURRENTVERSION}">
				<input type="hidden" id="latestVersion" value="{$LATESTVERSION}">
				<span><a href="https://kb.crmtiger.com/article-categories/whatsapp-integration-for-vtiger/" target="_blank" title="{vtranslate('LBL_HELP', $QUALIFIED_MODULE)}"><img src="layouts/v7/modules/Settings/CTWhatsApp/images/help.png" style="width: 26px;"></a></span>&nbsp;&nbsp;&nbsp;&nbsp;

				{if $DAYREMAINING < 365}
					<label style="color:red;">{vtranslate('LBL_DAYS',$QUALIFIED_MODULE)} <strong>{$DAYREMAINING}</strong> {vtranslate('LBL_EXPIRE',$QUALIFIED_MODULE)} </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				{/if}
				{if $LICENSEACTION eq 'free'}
					<a class="btn" href="https://crmtiger.com/whatsapp/" target="_blank" title="{vtranslate('LBL_UPGRADETITLE',$QUALIFIED_MODULE)}" style="background-color: #055;color: white;"><img src="layouts/v7/modules/Settings/CTWhatsApp/images/btn-1.png" style="width: 25px;">&nbsp;&nbsp;{vtranslate('LBL_UPGRADE',$QUALIFIED_MODULE)}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				{/if}
				<button class="btn btn-success" onclick="window.location.href='{$LICENSEDETAILURL}'" title="{vtranslate('LBL_LICENSETITLE',$QUALIFIED_MODULE)}" style="background: limegreen;"><img src="layouts/v7/modules/Settings/CTWhatsApp/images/license.png" style="width: 25px;">&nbsp;&nbsp;{vtranslate('LBL_LICENSE_SETUP', $QUALIFIED_MODULE)}</button>&nbsp;&nbsp;&nbsp;&nbsp;

				{if $CURRENTVERSION < $LATESTVERSION}
					<a class="btn hide" id="updateWhatsappModule" title="{vtranslate('LBL_UPDATETITLE',$QUALIFIED_MODULE)}" style="background-color: #dcf8c6;"><img src="layouts/v7/modules/Settings/CTWhatsApp/images/update.png" style="width: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{vtranslate('LBL_UPDATE',$QUALIFIED_MODULE)}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				{/if}

				<a onclick="window.location.href='{$EDITURL}'"><img src="layouts/v7/modules/CTWhatsApp/image/settings_green.png" style="width: 24px;"></a>
			</div>
		</div>
		<hr>
		<div style="width: 65%;">
			<div class="block1"><br>
				<table class="table editview-table userlist" style="width: 153%;max-width: 160%;border: 1px solid thistle;">
					<thead>
						<tr>
							<th>{vtranslate('ACTIVE', $QUALIFIED_MODULE)}</th>
							<th>{vtranslate('LBL_USERS', $QUALIFIED_MODULE)} / {vtranslate('LBL_GROUP_NAME', $QUALIFIED_MODULE)}</th>
							<th>{vtranslate('AUTH_TOKEN', $QUALIFIED_MODULE)}</th>
							<th>{vtranslate('CUSTOMFIELD2', $QUALIFIED_MODULE)}</th>
							<th>{vtranslate('LBL_STATUS', $QUALIFIED_MODULE)}</th>
							<th>{vtranslate('ACTION', $QUALIFIED_MODULE)}</th>
						</tr>
					</thead>
					<tbody>
						{foreach item=WHATSAUSER_VAULE key=WHATSAUSER_KEY from=$WHATSAPPUSERS}
							<tr>
								<td>
									{if $WHATSAUSER_VAULE['iconactive'] eq 1} 
									  	<input type="checkbox" data-id="{$WHATSAUSER_KEY}" class="changeStatus" value="1" checked>
									{else} 
									  	<input type="checkbox" data-id="{$WHATSAUSER_KEY}" class="changeStatus" value="0">
									{/if}
								</td>
								<td>
									<a href="{$WHATSAUSER_VAULE['detailViewURL']}">{$WHATSAUSER_VAULE['username']}</a>
								</td>
								<td>{$WHATSAUSER_VAULE['auth_token']}</td>
								<td>{$WHATSAUSER_VAULE['whatsappno']}</td>
								<td>
									{if $WHATSAUSER_VAULE['whatsappstatus'] eq 1} 
										{vtranslate('LBL_CONNECTED', $QUALIFIED_MODULE)}
									{else if $WHATSAUSER_VAULE['whatsappstatus'] eq 2}
										{vtranslate('LBL_PHONECONNECTED', $QUALIFIED_MODULE)}
									{else} 
										{vtranslate('LBL_DISCONNECTED', $QUALIFIED_MODULE)}
									{/if}
								</td>
								<td>
									<span class="deleteUsers" data-userid="{$WHATSAUSER_KEY}" style="cursor: pointer;"><i class="fa fa-trash"></i></span>&nbsp;&nbsp;
									{if $WHATSAPPMANAGEMENT neq 'singleWhatsapp'}
										{if $WHATSAUSER_KEY eq $CURRENTUSERID}
											<a href="index.php?module=CTWhatsApp&parent=Settings&view=ConfigurationDetail&userid={$WHATSAUSER_KEY}"><img src="layouts/v7/modules/Settings/CTWhatsApp/images/view.png" style="width: 15px;" title="{vtranslate('LBL_SCAN_YOU_NUMBER', $QUALIFIED_MODULE)}"></a>
											&nbsp;&nbsp;

											{if $WHATSAUSER_VAULE['whatsappstatus'] eq 1}
												<span class="selectUserLogout" data-whatsappuserid="{$WHATSAUSER_KEY}">
													<img src="layouts/v7/modules/CTWhatsApp/image/logout.png" style="width: 15px;cursor: pointer;" title="{vtranslate('LBL_LOGOUT', 'CTWhatsApp')}">
												</span>
											{/if}		
										{/if}
									{else}
										<a href="index.php?module=CTWhatsApp&parent=Settings&view=ConfigurationDetail&userid={$WHATSAUSER_KEY}"><img src="layouts/v7/modules/Settings/CTWhatsApp/images/view.png" style="width: 15px;" title="{vtranslate('LBL_SCAN_YOU_NUMBER', $QUALIFIED_MODULE)}"></a>
										&nbsp;&nbsp;
										
										{if $WHATSAUSER_VAULE['whatsappstatus'] eq 1}
											<span class="selectUserLogout" data-whatsappuserid="{$WHATSAUSER_KEY}">
												<img src="layouts/v7/modules/CTWhatsApp/image/logout.png" style="width: 15px;cursor: pointer;" title="{vtranslate('LBL_LOGOUT', 'CTWhatsApp')}">
											</span>
										{/if}
									{/if}
								</td>
							</tr>
						{/foreach}
					</tbody>
				</table>
				
				{if $WHATSAPPMANAGEMENT neq 'singleWhatsapp'}
					<button class="btn btn-success" onclick="window.location.href='{$EDITURL}&addMoreUser=1'">{vtranslate('LBL_ADD_MORE_USERS', $QUALIFIED_MODULE)} &nbsp;&nbsp;<i class="fa fa-plus"></i></button>
				{/if}

				<div style="float: right;margin-right: -320px;">
					<p class="ctbtn hide" title="{vtranslate('LBL_CLOSE_ACCOUNT',$QUALIFIED_MODULE)}" id="unInstallWhatsapp" style="color: red;"><a href="#"><b>{vtranslate("LBL_CLOSE_ACCOUNT",$MODULE)}</b></a></p>
				</div>
			</div>
		</div>
	</div>
</div>
{/strip}

{literal}
	<script type="text/javascript" src="libraries/jquery/bootstrapswitch/js/bootstrap-switch.min.js"></script>
	<link rel="stylesheet" href="libraries/jquery/bootstrapswitch/css/bootstrap3/bootstrap-switch.min.css">
	<script type="text/javascript">
		$( document ).ready(function() {
			jQuery("input[type='checkbox']").bootstrapSwitch();
		});
	</script>
{/literal}
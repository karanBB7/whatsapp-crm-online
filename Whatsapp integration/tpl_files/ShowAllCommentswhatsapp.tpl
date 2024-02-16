{*+**********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.1
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
************************************************************************************}

    
<style>
	.bgcol1 {
    height: 100%;
    width: 70%;
    background-color: #128c7e;
    color: #fff;
    text-align: center;
	margin-top:14px;
	border-radius: 50px;
	font-size: 1.5em;
	padding: 10px;
	/* position: relative;
	left: 0px; */
	
}

	.bgcol2 {
	height: 100%;
    width: 70%;
    background-color: #128c7e;
    color: #fff;
    text-align: center;
	margin-top:14px;
	border-radius: 50px;
	font-size: 1.5em;
	padding: 10px;

}

.media-replysend{
		padding: .8%;  
		color: #fff; 
		position: absolute;
		left: -25px;
		width: auto;
		background-color: #0a1413;
		margin-top: 16px;
		border-radius: 10px;
	}
	.media-replyreceived{
		padding: .8%;  
		color: #fff; 
		position: absolute;
		right: -25px;
		width: auto;
		background-color: #0a1413;
		margin-top: 16px;
		border-radius: 10px;
	}


	.replies,.commentInfoContent {
		font-size: 15px !important;
		padding-top:2%;
		font-weight: bolder;
		/* background-color: rgb(14, 247, 29);
		color: #fff; */
	}
	.time-ago {
		font-size: 10px !important;
		color: rgb(18, 184, 18);
		position: relative;
			}


	.pt{
	padding-top: 10px;
	}

	.bg-img{
		background-image: url(wp.jpg) !important;
		width: 100% !important;
		height: 60vh !important;
		overflow: auto;
		background-position: center center;
		background-attachment: fixed;
		background-size: cover;
		background-repeat: no-repeat;
		background-color: rgba(0,0,0,0);
	}

	.border{
		border-left: 1px solid rgba(0,0,0,0.5);
	}

	.received{
		position: relative;
		/* background-color: #0a1413; */
	}

</style>
    

{strip}
	<form id="detailView" method="POST" style="background-color: #fff;">
		{assign var="COMMENT_TEXTAREA_DEFAULT_ROWS" value="2"}
		{assign var="PRIVATE_COMMENT_MODULES" value=Vtiger_Functions::getPrivateCommentModules()}
		{assign var=IS_CREATABLE value=$COMMENTS_MODULE_MODEL->isPermitted('CreateView')}
		{assign var=IS_EDITABLE value=$COMMENTS_MODULE_MODEL->isPermitted('EditView')}
		<div class="commentContainer commentsRelatedContainer container-fluid">
								{* to send data to detail.js \vtigercrm\layouts\v7\modules\Vtiger\resources\ Detail.js *}

			{if $IS_CREATABLE}
				<div class="whatsappcommentTitle row">
					<div class="addCommentBlock">
						<div class="commentTextArea">
							<textarea name="commentcontent" class="commentcontent form-control"  placeholder="Send Message" rows="{$COMMENT_TEXTAREA_DEFAULT_ROWS}"></textarea>
						</div>
						<div class="row">
							<div class="col-xs-4 pull-right">
								<div class="pull-right">
									{if in_array($MODULE_NAME, $PRIVATE_COMMENT_MODULES)}
										<input type="checkbox" id="is_private" checked>&nbsp;&nbsp;{vtranslate('LBL_INTERNAL_COMMENT')}&nbsp;
										<i class="fa fa-question-circle cursorPointer" data-toggle="tooltip" data-placement="top" data-original-title="{vtranslate('LBL_INTERNAL_COMMENT_INFO')}"></i>&nbsp;&nbsp;
									{/if}
									<button class="btn btn-success btn-sm sendWhatsapp" type="button" data-mode="add"><strong>{vtranslate('LBL_POST', $MODULE_NAME)}</strong></button>
								</div>
							</div>
									{if $FIELD_MODEL->getProfileReadWritePermission()}
										<div class="col-xs-8 pull-left">
												{include file=vtemplate_path($FIELD_MODEL->getUITypeModel()->getTemplateName(),$MODULE_NAME) MODULE="Whatsapp"}
										</div>
									{/if}
						</div>
					</div>
				</div>
			{/if}

			<h4 class="text-left">Whatsapp Conversation</h4>
			<div class="row bg-img">
				<div class="col-lg-12 sendmessage">
					
					<div class="showcomments container-fluid row" style="margin-top:10px;display:none;">
					<div class="recentCommentsHeader row">
						{* <h4 class="display-inline-block col-lg-7 textOverflowEllipsis" title="{vtranslate('LBL_RECENT_COMMENTS', $MODULE_NAME)}">
						Messages
						</h4> *}
						{if $MODULE_NAME ne 'Leads'}
							<div class="col-lg-5 commentHeader pull-right" style="margin-top:5px;text-align:right;padding-right:20px;">
								<div class="display-inline-block">
									<span class="">{vtranslate('LBL_ROLL_UP',$QUALIFIED_MODULE)} &nbsp;</span>
									<span class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{vtranslate('LBL_ROLLUP_COMMENTS_INFO',$QUALIFIED_MODULE)}"></span>&nbsp;&nbsp;
								</div>
								<input type="checkbox" class="bootstrap-switch" id="rollupcomments" hascomments="1" startindex="{$STARTINDEX}" data-view="relatedlist" rollupid="{$ROLLUPID}" 
									rollup-status="{$ROLLUP_STATUS}" module="{$MODULE_NAME}" record="{$MODULE_RECORD}" checked data-on-color="success"/>
							</div> 
						{/if}
					</div>
					<div class="commentsListwhatsapp commentsBody marginBottom15">
						{include file='CommentsListwhatsapp.tpl'|@vtemplate_path COMMENT_MODULE_MODEL=$COMMENTS_MODULE_MODEL IS_CREATABLE=$IS_CREATABLE IS_EDITABLE=$IS_EDITABLE}
					</div>

					<div class="hide basicAddCommentBlock container-fluid">
						<div class="commentTextArea row">
							<textarea name="commentcontent" class="commentcontent" placeholder="{vtranslate('LBL_POST_YOUR_COMMENT_HERE', $MODULE_NAME)}" rows="{$COMMENT_TEXTAREA_DEFAULT_ROWS}"></textarea>
						</div>
						<div class="pull-right row">
							{if in_array($MODULE_NAME, $PRIVATE_COMMENT_MODULES)}
								<input type="checkbox" id="is_private" checked>&nbsp;&nbsp;{vtranslate('LBL_INTERNAL_COMMENT')}&nbsp;&nbsp;
							{/if}
							<button class="btn btn-success btn-sm sendWhatsapp" type="button" data-mode="add"><strong>{vtranslate('LBL_POST', $MODULE_NAME)}</strong></button>
							<a href="javascript:void(0);" class="cursorPointer closeCommentBlock cancelLink" type="reset">{vtranslate('LBL_CANCEL', $MODULE_NAME)}</a>
						</div>
					</div>

					<div class="hide basicEditCommentBlock container-fluid">
						<div class="row" style="padding-bottom: 10px;">
							<input style="width:100%;height:30px;" type="text" name="reasonToEdit" placeholder="{vtranslate('LBL_REASON_FOR_CHANGING_COMMENT', $MODULE_NAME)}" class="input-block-level"/>
						</div>
						<div class="row">
							<div class="commentTextArea">
								<textarea name="commentcontent" class="commentcontenthidden"  placeholder="{vtranslate('LBL_ADD_YOUR_COMMENT_HERE', $MODULE_NAME)}" rows="{$COMMENT_TEXTAREA_DEFAULT_ROWS}"></textarea>
							</div>
						</div>
						<input type="hidden" name="is_private">
						<div class="pull-right row">
							<button class="btn btn-success btn-sm sendWhatsapp" type="button" data-mode="edit"><strong>{vtranslate('LBL_POST', $MODULE_NAME)}</strong></button>
							<a href="javascript:void(0);" class="cursorPointer closeCommentBlock cancelLink" type="reset">{vtranslate('LBL_CANCEL', $MODULE_NAME)}</a>
						</div>
					</div>
					</div>
				</div>
				<div class="col-lg-12" >
					<div class="col-sm-12">
						<div class="media-left title">
					</div>
					<div class="col-sm-12">
						<div class="replies"></div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</form>
{/strip}
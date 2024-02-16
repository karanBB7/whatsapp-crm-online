<?php
/* Smarty version 3.1.39, created on 2023-11-08 09:12:24
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Vtiger\ShowAllCommentswhatsapp.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_654b50f8a58238_14675368',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a36f8681862367814495b90491ba7913475a39cb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Vtiger\\ShowAllCommentswhatsapp.tpl',
      1 => 1699434739,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_654b50f8a58238_14675368 (Smarty_Internal_Template $_smarty_tpl) {
?>
    
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
    

<form id="detailView" method="POST" style="background-color: #fff;"><?php $_smarty_tpl->_assignInScope('COMMENT_TEXTAREA_DEFAULT_ROWS', "2");
$_smarty_tpl->_assignInScope('PRIVATE_COMMENT_MODULES', Vtiger_Functions::getPrivateCommentModules());
$_smarty_tpl->_assignInScope('IS_CREATABLE', $_smarty_tpl->tpl_vars['COMMENTS_MODULE_MODEL']->value->isPermitted('CreateView'));
$_smarty_tpl->_assignInScope('IS_EDITABLE', $_smarty_tpl->tpl_vars['COMMENTS_MODULE_MODEL']->value->isPermitted('EditView'));?><div class="commentContainer commentsRelatedContainer container-fluid"><?php if ($_smarty_tpl->tpl_vars['IS_CREATABLE']->value) {?><div class="whatsappcommentTitle row"><div class="addCommentBlock"><div class="commentTextArea"><textarea name="commentcontent" class="commentcontent form-control" placeholder="Send Message" rows="<?php echo $_smarty_tpl->tpl_vars['COMMENT_TEXTAREA_DEFAULT_ROWS']->value;?>
"></textarea></div><div class="row"><div class="col-xs-4 pull-right"><div class="pull-right"><?php if (in_array($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['PRIVATE_COMMENT_MODULES']->value)) {?><input type="checkbox" id="is_private" checked>&nbsp;&nbsp;<?php echo vtranslate('LBL_INTERNAL_COMMENT');?>
&nbsp;<i class="fa fa-question-circle cursorPointer" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo vtranslate('LBL_INTERNAL_COMMENT_INFO');?>
"></i>&nbsp;&nbsp;<?php }?><button class="btn btn-success btn-sm sendWhatsapp" type="button" data-mode="add"><strong><?php echo vtranslate('LBL_POST',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong></button></div></div><?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getProfileReadWritePermission()) {?><div class="col-xs-8 pull-left"><?php $_smarty_tpl->_subTemplateRender(vtemplate_path($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getUITypeModel()->getTemplateName(),$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('MODULE'=>"ModCommentswhatsapp"), 0, true);
?></div><?php }?></div></div></div><?php }?><h4 class="text-left">Whatsapp Conversation</h4><div class="row bg-img"><div class="col-lg-12 sendmessage"><div class="showcomments container-fluid row" style="margin-top:10px;display:none;"><div class="recentCommentsHeader row"><?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value != 'Leads') {?><div class="col-lg-5 commentHeader pull-right" style="margin-top:5px;text-align:right;padding-right:20px;"><div class="display-inline-block"><span class=""><?php echo vtranslate('LBL_ROLL_UP',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 &nbsp;</span><span class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo vtranslate('LBL_ROLLUP_COMMENTS_INFO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"></span>&nbsp;&nbsp;</div><input type="checkbox" class="bootstrap-switch" id="rollupcomments" hascomments="1" startindex="<?php echo $_smarty_tpl->tpl_vars['STARTINDEX']->value;?>
" data-view="relatedlist" rollupid="<?php echo $_smarty_tpl->tpl_vars['ROLLUPID']->value;?>
"rollup-status="<?php echo $_smarty_tpl->tpl_vars['ROLLUP_STATUS']->value;?>
" module="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
" record="<?php echo $_smarty_tpl->tpl_vars['MODULE_RECORD']->value;?>
" checked data-on-color="success"/></div><?php }?></div><div class="commentsListwhatsapp commentsBody marginBottom15"><?php $_smarty_tpl->_subTemplateRender(vtemplate_path('CommentsListwhatsapp.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('COMMENT_MODULE_MODEL'=>$_smarty_tpl->tpl_vars['COMMENTS_MODULE_MODEL']->value,'IS_CREATABLE'=>$_smarty_tpl->tpl_vars['IS_CREATABLE']->value,'IS_EDITABLE'=>$_smarty_tpl->tpl_vars['IS_EDITABLE']->value), 0, true);
?></div><div class="hide basicAddCommentBlock container-fluid"><div class="commentTextArea row"><textarea name="commentcontent" class="commentcontent" placeholder="<?php echo vtranslate('LBL_POST_YOUR_COMMENT_HERE',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
" rows="<?php echo $_smarty_tpl->tpl_vars['COMMENT_TEXTAREA_DEFAULT_ROWS']->value;?>
"></textarea></div><div class="pull-right row"><?php if (in_array($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['PRIVATE_COMMENT_MODULES']->value)) {?><input type="checkbox" id="is_private" checked>&nbsp;&nbsp;<?php echo vtranslate('LBL_INTERNAL_COMMENT');?>
&nbsp;&nbsp;<?php }?><button class="btn btn-success btn-sm sendWhatsapp" type="button" data-mode="add"><strong><?php echo vtranslate('LBL_POST',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong></button><a href="javascript:void(0);" class="cursorPointer closeCommentBlock cancelLink" type="reset"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a></div></div><div class="hide basicEditCommentBlock container-fluid"><div class="row" style="padding-bottom: 10px;"><input style="width:100%;height:30px;" type="text" name="reasonToEdit" placeholder="<?php echo vtranslate('LBL_REASON_FOR_CHANGING_COMMENT',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
" class="input-block-level"/></div><div class="row"><div class="commentTextArea"><textarea name="commentcontent" class="commentcontenthidden" placeholder="<?php echo vtranslate('LBL_ADD_YOUR_COMMENT_HERE',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
" rows="<?php echo $_smarty_tpl->tpl_vars['COMMENT_TEXTAREA_DEFAULT_ROWS']->value;?>
"></textarea></div></div><input type="hidden" name="is_private"><div class="pull-right row"><button class="btn btn-success btn-sm sendWhatsapp" type="button" data-mode="edit"><strong><?php echo vtranslate('LBL_POST',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong></button><a href="javascript:void(0);" class="cursorPointer closeCommentBlock cancelLink" type="reset"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a></div></div></div></div><div class="col-lg-12" ><div class="col-sm-12"><div class="media-left title"></div><div class="col-sm-12"><div class="replies"></div></div></div></div></div></div></form><?php }
}

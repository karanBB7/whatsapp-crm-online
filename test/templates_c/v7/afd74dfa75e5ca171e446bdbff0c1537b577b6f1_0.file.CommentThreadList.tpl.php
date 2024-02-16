<?php
/* Smarty version 3.1.39, created on 2023-09-27 11:38:08
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Vtiger\CommentThreadList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65141420142712_13820880',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'afd74dfa75e5ca171e446bdbff0c1537b577b6f1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Vtiger\\CommentThreadList.tpl',
      1 => 1669872319,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65141420142712_13820880 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('IS_CREATABLE', $_smarty_tpl->tpl_vars['COMMENTS_MODULE_MODEL']->value->isPermitted('CreateView'));
$_smarty_tpl->_assignInScope('IS_EDITABLE', $_smarty_tpl->tpl_vars['COMMENTS_MODULE_MODEL']->value->isPermitted('EditView'));?>

<div class="commentDiv cursorPointer">
	<div class="singleComment">
		<input type="hidden" name="is_private" value="<?php echo $_smarty_tpl->tpl_vars['COMMENT']->value->get('is_private');?>
">
		<div class="commentInfoHeader" data-commentid="<?php echo $_smarty_tpl->tpl_vars['COMMENT']->value->getId();?>
" data-parentcommentid="<?php echo $_smarty_tpl->tpl_vars['COMMENT']->value->get('parent_comments');?>
">
			<?php $_smarty_tpl->_assignInScope('PARENT_COMMENT_MODEL', $_smarty_tpl->tpl_vars['COMMENT']->value->getParentCommentModel());?>
			<?php $_smarty_tpl->_assignInScope('CHILD_COMMENTS_MODEL', $_smarty_tpl->tpl_vars['COMMENT']->value->getChildComments());?>
			<div class="col-lg-12">
				<div class="media" <?php if ($_smarty_tpl->tpl_vars['COMMENT']->value->get('is_private')) {?>style="background: #fff9ea;"<?php }?>>
					<div class="media-left title" id="<?php echo $_smarty_tpl->tpl_vars['COMMENT']->value->getId();?>
">
						<?php $_smarty_tpl->_assignInScope('CREATOR_NAME', $_smarty_tpl->tpl_vars['COMMENT']->value->getCommentedByName());?>
						<div class="col-lg-2 recordImage commentInfoHeader" style ="width:50px; height:50px; font-size: 30px;" data-commentid="<?php echo $_smarty_tpl->tpl_vars['COMMENT']->value->getId();?>
" data-parentcommentid="<?php echo $_smarty_tpl->tpl_vars['COMMENT']->value->get('parent_comments');?>
" data-relatedto = "<?php echo $_smarty_tpl->tpl_vars['COMMENT']->value->get('related_to');?>
">
							<?php $_smarty_tpl->_assignInScope('IMAGE_PATH', $_smarty_tpl->tpl_vars['COMMENT']->value->getImagePath());?>
							<?php if (!empty($_smarty_tpl->tpl_vars['IMAGE_PATH']->value)) {?>
								<img src="<?php echo $_smarty_tpl->tpl_vars['IMAGE_PATH']->value;?>
" width="100%" height="100%" align="left">
							<?php } else { ?>
								<div class="name" style="font-size: 30px;"><span><strong> <?php echo htmlspecialchars(mb_substr($_smarty_tpl->tpl_vars['CREATOR_NAME']->value,0,2), ENT_QUOTES, 'UTF-8', true);?>
 </strong></span></div>
							<?php }?>
						</div>
					</div>
					<div class="media-body">
						<div class="comment" style="line-height:1;">
							<span class="creatorName" >
								<?php echo $_smarty_tpl->tpl_vars['CREATOR_NAME']->value;?>

							</span>&nbsp; 
							<span class="commentTime text-muted cursorDefault">
								<small title="<?php echo Vtiger_Util_Helper::formatDateTimeIntoDayString($_smarty_tpl->tpl_vars['COMMENT']->value->getCommentedTime());?>
"><?php echo Vtiger_Util_Helper::formatDateDiffInStrings($_smarty_tpl->tpl_vars['COMMENT']->value->getCommentedTime());?>
</small>
							</span>
							<div class="">
								<span class="commentInfoContent">
									<?php echo nl2br($_smarty_tpl->tpl_vars['COMMENT']->value->get('commentcontent'));?>

								</span>
							</div>
							<br>
							<div class="commentActionsContainer">
								<span class="commentActions">
									<?php if ($_smarty_tpl->tpl_vars['CHILDS_ROOT_PARENT_MODEL']->value) {?>
										<?php $_smarty_tpl->_assignInScope('CHILDS_ROOT_PARENT_ID', $_smarty_tpl->tpl_vars['CHILDS_ROOT_PARENT_MODEL']->value->getId());?>
									<?php }?>
									<?php $_smarty_tpl->_assignInScope('CHILD_COMMENTS_COUNT', $_smarty_tpl->tpl_vars['COMMENT']->value->getChildCommentsCount());?>
									<?php if ($_smarty_tpl->tpl_vars['CHILD_COMMENTS_MODEL']->value != null && ($_smarty_tpl->tpl_vars['CHILDS_ROOT_PARENT_ID']->value != $_smarty_tpl->tpl_vars['PARENT_COMMENT_ID']->value)) {?>
										<span class="viewThreadBlock" data-child-comments-count="<?php echo $_smarty_tpl->tpl_vars['CHILD_COMMENTS_COUNT']->value;?>
">
											<a href="javascript:void(0)" class="cursorPointer viewThread">
												<span class="childCommentsCount"><?php echo $_smarty_tpl->tpl_vars['CHILD_COMMENTS_COUNT']->value;?>
</span>&nbsp;<?php if ($_smarty_tpl->tpl_vars['CHILD_COMMENTS_COUNT']->value == 1) {
echo vtranslate('LBL_REPLY',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
} else {
echo vtranslate('LBL_REPLIES',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
}?>&nbsp;
											</a>
										</span>
										<span class="hideThreadBlock" data-child-comments-count="<?php echo $_smarty_tpl->tpl_vars['CHILD_COMMENTS_COUNT']->value;?>
" style="display:none;">
											<a href="javascript:void(0)" class="cursorPointer hideThread">
												<span class="childCommentsCount"><?php echo $_smarty_tpl->tpl_vars['CHILD_COMMENTS_COUNT']->value;?>
</span>&nbsp;<?php if ($_smarty_tpl->tpl_vars['CHILD_COMMENTS_COUNT']->value == 1) {
echo vtranslate('LBL_REPLY',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
} else {
echo vtranslate('LBL_REPLIES',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
}?>&nbsp;
											</a>
										</span>
									<?php } elseif ($_smarty_tpl->tpl_vars['CHILD_COMMENTS_MODEL']->value != null && ($_smarty_tpl->tpl_vars['CHILDS_ROOT_PARENT_ID']->value == $_smarty_tpl->tpl_vars['PARENT_COMMENT_ID']->value)) {?>
										<span class="viewThreadBlock" data-child-comments-count="<?php echo $_smarty_tpl->tpl_vars['CHILD_COMMENTS_COUNT']->value;?>
" style="display:none;">
											<a href="javascript:void(0)" class="cursorPointer viewThread">
												<span class="childCommentsCount"><?php echo $_smarty_tpl->tpl_vars['CHILD_COMMENTS_COUNT']->value;?>
</span>&nbsp;<?php if ($_smarty_tpl->tpl_vars['CHILD_COMMENTS_COUNT']->value == 1) {
echo vtranslate('LBL_REPLY',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
} else {
echo vtranslate('LBL_REPLIES',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
}?>&nbsp;
											</a>
										</span>
										<span class="hideThreadBlock" data-child-comments-count="<?php echo $_smarty_tpl->tpl_vars['CHILD_COMMENTS_COUNT']->value;?>
">
											<a href="javascript:void(0)" class="cursorPointer hideThread">
												<span class="childCommentsCount"><?php echo $_smarty_tpl->tpl_vars['CHILD_COMMENTS_COUNT']->value;?>
</span>&nbsp;<?php if ($_smarty_tpl->tpl_vars['CHILD_COMMENTS_COUNT']->value == 1) {
echo vtranslate('LBL_REPLY',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
} else {
echo vtranslate('LBL_REPLIES',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
}?>&nbsp;
												<img class="alignMiddle" src="<?php echo vimage_path('arrowdown.png');?>
" />
											</a>
										</span>
									<?php }?>
									<span class="commemntActionsubblock" >
										<?php if ($_smarty_tpl->tpl_vars['CHILDS_ROOT_PARENT_MODEL']->value) {?>
											<?php $_smarty_tpl->_assignInScope('CHILDS_ROOT_PARENT_ID', $_smarty_tpl->tpl_vars['CHILDS_ROOT_PARENT_MODEL']->value->getId());?>
										<?php }?>
										<?php if ($_smarty_tpl->tpl_vars['IS_CREATABLE']->value) {?>
											<?php if ($_smarty_tpl->tpl_vars['CHILD_COMMENTS_COUNT']->value) {?><span>&nbsp;|&nbsp;</span><?php }?>
											<a href="javascript:void(0);" class="cursorPointer replyComment feedback" style="color: blue;">
												<?php echo vtranslate('LBL_REPLY',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>

											</a>
										<?php }?>
										<?php if ($_smarty_tpl->tpl_vars['CURRENTUSER']->value->getId() == $_smarty_tpl->tpl_vars['COMMENT']->value->get('userid') && $_smarty_tpl->tpl_vars['IS_EDITABLE']->value) {?>
											<?php if ($_smarty_tpl->tpl_vars['IS_CREATABLE']->value) {?>&nbsp;&nbsp;&nbsp;<?php }?>
											<a href="javascript:void(0);" class="cursorPointer editComment feedback" style="color: blue;">
												<?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>

											</a>
										<?php }?>
									</span>
								</span>
							</div>
						</div>
					</div>
					<hr>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }
}

<?php
/* Smarty version 3.1.39, created on 2023-10-06 09:25:43
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\CTWhatsAppBusiness\AutoResponderPopup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_651fd29732d3c3_40434767',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '77eeb818eddb0c5e6f50639318fd985fc4744b16' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\CTWhatsAppBusiness\\AutoResponderPopup.tpl',
      1 => 1696583819,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_651fd29732d3c3_40434767 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="sendWhatsappSmsContainer" class='modal-xs modal-dialog'>
	<div class="modal-header">
        <div class="clearfix">
            <div class="pull-right " >
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true" class='fa fa-close'></span>
                </button>
            </div>
            <h4 class="pull-left">
                <?php echo vtranslate('LBL_AUTORESPONDERTEXT','Settings:CTWhatsAppBusiness');?>

            </h4>
        </div>
    </div>
    <div class = "modal-content">
		<table class="table table-borderless">
			
			<tr>
				<td style="width: 19%;">
					<textarea id="autoresponderMessage" style="width: 100%;height: 115px;"><?php echo $_smarty_tpl->tpl_vars['AUTOREPONDERTEXT']->value;?>
</textarea>
				</td>
			</tr>
			
		</table>
		<div>
			<div class="modal-footer">
				<center>
					<button class="btn btn-success" id="saveAutoResponder"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>
					<a class="cancelLink" type="reset" data-dismiss="modal"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
				</center>
			</div>
		</div>
    </div>
</div><?php }
}

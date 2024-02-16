<?php
/* Smarty version 3.1.39, created on 2023-10-06 09:43:02
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\CTWhatsApp\NewWhatsappBot.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_651fd6a6ba7999_97464983',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dabdf0eafc73dfa3b5e84eb9dd9911d44437fee0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\CTWhatsApp\\NewWhatsappBot.tpl',
      1 => 1696585094,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_651fd6a6ba7999_97464983 (Smarty_Internal_Template $_smarty_tpl) {
?>
<style>
	.fieldValue.createWhatsAppBotFrom {
		border: 1px solid !important;
		text-align: center;
		cursor: pointer;
		background-color: silver;
	}
	.parent{
        display: flex;
	    flex-wrap: wrap;
	    justify-content: space-evenly;
	    height: 290px;
	    overflow-y: auto;
    }
    .child{
        margin: 10px 0;
        width: 150px;
        height: auto;
        /*border: 1px solid;*/
        cursor: pointer;
    }
    .child button {
    	width: 150px;
    }
    .child button span {
    	overflow: hidden;
		text-overflow: ellipsis;
		display: inline-block;
		width: 100px;
    }
    .fieldValue.createWhatsAppBotFrom:hover {
	  	background-color: white;
	}
	.fieldValue.createWhatsAppBotFrom.hightLightDiv {
	  	background-color: white;
	}
</style>

<div class="modal-xs modal-dialog" style="width: 750px;">
	<div class="modal-header" style="height: 50px;">
        <button type="button" class="close " data-dismiss="modal" aria-hidden="true" style="float: right;">&times;</button>
       	<h4><?php echo vtranslate('LBL_CREATENEWBOT',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</h4>&nbsp;
    </div>
    <div class ="modal-content" style="border-radius: 0px 0px 0px 0px;">
    	<form class="form-horizontal" name="newrecord" id="newrecord" method="post" action="index.php" enctype="multipart/form-data">
		<table class="massEditTable table no-border" style="margin-top: 15px;">
			<tbody>
				<tr class="hide">
					<td class="fieldValue">
						<input type="radio" name="createWhatsAppBotFrom" value="BotFormScratch">
						<label for="html"><?php echo vtranslate('LBL_CREATENEWBOT_FROM_SCRATCH',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label><br>
					  	<input type="radio" name="createWhatsAppBotFrom" value="BotFormTemplate">
					  	<label for="css"><?php echo vtranslate('LBL_CREATENEWBOT_FROM_TEMPLATES',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label><br>	
					</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td class="fieldValue createWhatsAppBotFrom" data-createbot="BotFormScratch">
						<span><?php echo vtranslate('LBL_CREATENEWBOT_FROM_SCRATCH',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</span>
					</td>
					<td></td>
					<td class="fieldValue createWhatsAppBotFrom hide" data-createbot="BotFormTemplate">
						<span><?php echo vtranslate('LBL_CREATENEWBOT_FROM_TEMPLATES',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</span>
					</td>
					<td></td>
				</tr>

				<tr>
					<td colspan="5" style="text-align: center;"><br><?php echo vtranslate('LBL_OR',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</br></td>
				</tr>

				<tr class="templateView">
					<td colspan="5">
						<h4><?php echo vtranslate('LBL_WHATSAPP_TEMPLATE_BOT',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</h4>
						<hr>
						<div class="parent">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALL_WHATSAPP_BOT']->value, 'ALL_WHATSAPP_BOT_VALUE', false, 'ALL_WHATSAPP_BOT_KEY');
$_smarty_tpl->tpl_vars['ALL_WHATSAPP_BOT_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ALL_WHATSAPP_BOT_KEY']->value => $_smarty_tpl->tpl_vars['ALL_WHATSAPP_BOT_VALUE']->value) {
$_smarty_tpl->tpl_vars['ALL_WHATSAPP_BOT_VALUE']->do_else = false;
?>
								<div class="child" data-botid="<?php echo $_smarty_tpl->tpl_vars['ALL_WHATSAPP_BOT_KEY']->value;?>
" onclick='window.location.href = "index.php?module=CTWhatsApp&view=WhatsappBot&mode=WhatsappBotConfiguration&duplicateRecordId=<?php echo $_smarty_tpl->tpl_vars['ALL_WHATSAPP_BOT_KEY']->value;?>
"'>
									<img src="layouts/v7/modules/CTWhatsApp/image/templateBot.png" style="width: 100%;"/>
									<br>
									<button class="btn btn-success" onclick='window.location.href = "index.php?module=CTWhatsApp&view=WhatsappBot&mode=WhatsappBotConfiguration&duplicateRecordId=<?php echo $_smarty_tpl->tpl_vars['ALL_WHATSAPP_BOT_KEY']->value;?>
"' type="button" style="margin: 2px 0px 4px -1px;">
										<span><?php echo $_smarty_tpl->tpl_vars['ALL_WHATSAPP_BOT_VALUE']->value;?>
</span>
									</button>
								</div>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					    </div>
					</td>
				</tr>
			</tbody>
		</table>
		</form>
		<div class="modal-footer">
			<center>
				<button class="btn btn-success hide" id="addBot"><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>
				<a class="cancelLink" type="reset" data-dismiss="modal"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
			</center>
		</div>
    </div>
</div>
<?php }
}

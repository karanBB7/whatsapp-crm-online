<?php
/* Smarty version 3.1.39, created on 2023-09-25 05:20:47
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\CTWhatsApp\taskforms\SendWhatsAppMsg.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_651118af1a6ef5_94536774',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe4033890ba62efc4ae789c8b849c18ee8476f72' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\CTWhatsApp\\taskforms\\SendWhatsAppMsg.tpl',
      1 => 1695618298,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_651118af1a6ef5_94536774 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row" style="margin-bottom: 70px;"><div class="col-lg-9"><div class="row form-group col-lg-12"><div class="col-lg-2" style="margin: 0px 3px 0px -12px;"><?php echo vtranslate('From WhatsApp #',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><div class="col-lg-3"><select class="select2 sendmessagewhatsappnumbers" id="sendmessagewhatsappnumbers" style="width: 116%;" data-placeholder="<?php echo vtranslate('LBL_SELECT_OPTIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"><option value=""></option></select></div></div><div class="row form-group"><div class="col-lg-2"><?php echo vtranslate('LBL_RECEPIENTS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><div class="col-lg-10"><div class="row"><div class="col-lg-3"><select class="select2 task-fields sendWhatsApp_number" style="width: 116%;" data-placeholder="<?php echo vtranslate('LBL_SELECT_FIELDS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"><option value=""><?php echo vtranslate('LBL_SELECT_FIELDS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RECORD_STRUCTURE_MODEL']->value->getFieldsByType('phone'), 'FIELD', false, 'FIELD_VALUE');
$_smarty_tpl->tpl_vars['FIELD']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_VALUE']->value => $_smarty_tpl->tpl_vars['FIELD']->value) {
$_smarty_tpl->tpl_vars['FIELD']->do_else = false;
?><option value=",$<?php echo $_smarty_tpl->tpl_vars['FIELD_VALUE']->value;?>
">(<?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD']->value->getModule()->get('name'),$_smarty_tpl->tpl_vars['FIELD']->value->getModule()->get('name'));?>
)  <?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD']->value->get('label'),$_smarty_tpl->tpl_vars['FIELD']->value->getModule()->get('name'));?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></div></div></div></div><div class="row form-group"><div class="col-lg-2"><?php echo vtranslate('Select WhatsApp Group to send message',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><div class="col-lg-10"><div class="row"><div class="col-lg-3"><select class="select2" id="whatsappnumbers" style="width: 116%;" data-placeholder=<?php echo vtranslate('LBL_SELECT_OPTIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
><option value=""></option></select></div><div class="col-lg-3"><select class="select2 task-fields sendWhatsApp_number" id="allWhatsappGroups" style="width: 116%;"><option value=""><?php echo vtranslate('LBL_SELECT_OPTIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option></select></div></div></div></div><div class="row form-group" style="padding: 3px;"><div class="col-lg-2"><?php echo vtranslate('LBL_RECEPIENTS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<span class="redColor">*</span></div><div class="col-lg-10"><div class="row"><div class="col-lg-7"><input type="text" class="inputElement fields" data-rule-required="true" name="sms_recepient" value="<?php echo $_smarty_tpl->tpl_vars['TASK_OBJECT']->value->sms_recepient;?>
" /></div></div></div></div><div class="row form-group col-lg-12"><div class="col-lg-2" style="padding-left: 0px;"><?php echo vtranslate('MSGTEMPLATES','CTWhatsApp');?>
</div><div class="col-lg-10"><select style="width: 205px;margin-left: -9px;" id="wptemplatesid" class="select2" data-placeholder=<?php echo vtranslate('LBL_SELECT_OPTIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
><option></option></select>&nbsp;&nbsp;<a class="addTemplate btn btn-default" href="index.php?module=CTWhatsAppTemplates&view=Edit" target="_blank"><i class="fa fa-plus"></i></a>&nbsp;&nbsp;<a class="editTemplate btn btn-default hide" href="index.php?module=CTWhatsAppTemplates&view=Edit" target="_blank"><i class="fa fa-pencil"></i></a></div></div><div class="row form-group col-lg-12"><div class="col-lg-2"></div><div class="col-lg-10"><label><?php echo vtranslate('LBL_NOTE','CTWhatsApp');?>
</label><?php echo vtranslate('LBL_ATTACHMENT_NOTES','CTWhatsApp');?>
</div></div><div class="row form-group col-lg-12"><div class="col-lg-2" style="padding-left: 0px;"><?php echo vtranslate('LBL_GENERAL_FIELDS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><div class="col-lg-10"><select style="width: 205px;margin-left: -9px;" id="generalfields" class="select2" data-placeholder=<?php echo vtranslate('LBL_SELECT_OPTIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
><option></option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['META_VARIABLES']->value, 'META_VARIABLE_KEY', false, 'META_VARIABLE_VALUE');
$_smarty_tpl->tpl_vars['META_VARIABLE_KEY']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['META_VARIABLE_VALUE']->value => $_smarty_tpl->tpl_vars['META_VARIABLE_KEY']->value) {
$_smarty_tpl->tpl_vars['META_VARIABLE_KEY']->do_else = false;
?><option value="<?php if (strpos(strtolower($_smarty_tpl->tpl_vars['META_VARIABLE_VALUE']->value),'url') === false) {?>$<?php }
echo $_smarty_tpl->tpl_vars['META_VARIABLE_KEY']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['META_VARIABLE_VALUE']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></div></div><div class="row form-group col-lg-12"><div class="col-lg-2" style="margin: 0px 3px 0px -12px;"><?php echo vtranslate('LBL_ADD_FIELDS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><div class="col-lg-10"><select class="select2 task-fields" id="modulefields" style="min-width: 150px;" data-placeholder="<?php echo vtranslate('LBL_SELECT_FIELDS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"><option></option><?php echo $_smarty_tpl->tpl_vars['ALL_FIELD_OPTIONS']->value;?>
</select></div></div><div class="msgwithouttext row form-group col-lg-12" style="margin-left: -14px;"><div class="col-lg-2" style="margin: 0px 3px 0px -12px;"><?php echo vtranslate('LBL_MESSAGES','CTWhatsApp');?>
</div><div class="col-lg-10"><textarea name="content" class="inputElement fields" style="height: 150px;width: 870px;"><?php echo $_smarty_tpl->tpl_vars['TASK_OBJECT']->value->content;?>
</textarea></div></div><div class="msgwithtext hide row form-group col-lg-12" style="margin-left: -14px;"><div class="col-lg-2" style="margin: 0px 3px 0px -12px;"><?php echo vtranslate('LBL_MESSAGES','CTWhatsApp');?>
</div><div class="col-lg-10"><textarea name="content1" class="inputElement fields" style="height: 150px;width: 870px;"><?php echo $_smarty_tpl->tpl_vars['TASK_OBJECT']->value->content;?>
</textarea></div></div><div class="row form-group col-lg-12"><div class="col-lg-2 attachmentlabel hide" style="margin: 0px 3px 0px -12px;"><?php echo vtranslate('LBL_ATTACHMENT','CTWhatsApp');?>
</div><div class="col-lg-10 imageArea" style="cursor: pointer;"></div></div><div class="row form-group col-lg-12 templatesNotes hide"><div class="col-lg-2"></div><div class="col-lg-10"><label><?php echo vtranslate('LBL_SENDNOWLATERNOTES','CTWhatsApp');?>
</label></div></div></div></div>


    <?php echo '<script'; ?>
>
        $(document).ready(function(){
            var whatsappNumbers = jQuery('.sendmessagewhatsappnumbers :selected').val();
            var params = {
                    'module' : 'CTWhatsApp',
                    'parent': app.getParentModuleName(),
                    'view' : "WhatsappChatConfiguration", 
                    'mode' : "getWhatsappGroups",
                    'whatsappNumbers' : whatsappNumbers
                }
            AppConnector.request(params).then(function(data) {   
                var wpTemplates = data.result.wpTemplates;
                if(wpTemplates){
                    $('#wptemplatesid').html('<option value="">Select an Option</option>');
                    $.each(wpTemplates, function(index, templates) {
                        $('#wptemplatesid').append('<option value="' + index + '">' + templates + '</option>');
                    });
                }
            });

            //get Scan Whatsapp numbers
            var params = {
                'module' : 'CTWhatsApp',
                'parent': app.getParentModuleName(),
                'view' : "WhatsappChatConfiguration", 
                'mode' : "getScanWhatsappNumbers"
            }
            AppConnector.request(params).then(function(data) {
                var templateOption = data.result
                $('#whatsappnumbers').html(templateOption);
                $('#sendmessagewhatsappnumbers').html(templateOption);
            });

            jQuery('input[name="summary"]').parent('div').parent('div').hide();
            var summary = jQuery('input[name="summary"]').val();
            if(summary){
                setTimeout(function(){
                    jQuery('.sendmessagewhatsappnumbers a span.select2-chosen').text(summary);
                }, 1000);
            }
            
            $('.sendmessagewhatsappnumbers').on('change', function(e){
                var whatsappNumbers = jQuery(e.currentTarget).val();
                setTimeout(function(){
                    jQuery('[name="summary"]').val(whatsappNumbers);
                }, 1000);
                var params = {
                    'module' : 'CTWhatsApp',
                    'parent': app.getParentModuleName(),
                    'view' : "WhatsappChatConfiguration", 
                    'mode' : "getWhatsappGroups",
                    'whatsappNumbers' : whatsappNumbers
                }
                AppConnector.request(params).then(function(data) {   
                    var wpTemplates = data.result.wpTemplates;
                    if(wpTemplates){
                        $('#wptemplatesid').html('<option value="">Select an Option</option>');
                        $.each(wpTemplates, function(index, templates) {
                            $('#wptemplatesid').append('<option value="' + index + '">' + templates + '</option>');
                        });
                    }
                });
            });

            $(".sendWhatsApp_number").on('change', function(e){
                var value = jQuery(e.currentTarget).val();
                var oldValue = jQuery('[name="sms_recepient"]').val();
                var newValue = oldValue + value;
                jQuery('[name="sms_recepient"]').val(newValue);
            });

            $('#whatsappnumbers').on('change', function(){
                var whatsappNumbers = $('#whatsappnumbers').val();
                var params = {
                    'module' : 'CTWhatsApp',
                    'parent': app.getParentModuleName(),
                    'view' : "WhatsappChatConfiguration", 
                    'mode' : "getWhatsappGroups",
                    'whatsappNumbers' : whatsappNumbers
                }
                AppConnector.request(params).then(function(data) {
                    var groupOption = data.result.groupOption;
                    if(groupOption){
                        $('#allWhatsappGroups').html(groupOption);
                        $('#allWhatsappGroups').trigger('change');
                    }
                });return false;
            });
            //get Scan Whatsapp numbers


            setTimeout(function(){ 
                var selectTemplateid = jQuery('textarea[name="content"]').val();
                if($.isNumeric(selectTemplateid)){
                    jQuery('#wptemplatesid').val(selectTemplateid);
                    jQuery('#wptemplatesid').trigger('change');
                }
            }, 1000);

            $("#wptemplatesid").on('change', function(){
                var wptemplatesid = jQuery('#wptemplatesid').val();
                var params = {
                    'module' : 'CTWhatsApp',
                    'view' : "MassSendMessages", 
                    'mode' : "getTemplateData",
                    'templatesid' : wptemplatesid
                }
                AppConnector.request(params).then(
                    function(data) {
                        jQuery('textarea[name="content"]').text('');
                        jQuery('textarea[name="content"]').text(wptemplatesid);

                        jQuery('textarea[name="content1"]').text('');
                        jQuery('textarea[name="content1"]').text(data.result['message']);
                        if(wptemplatesid == ''){
                            jQuery('textarea[name="content1"]').prop('readonly', false);
                            jQuery('textarea[name="content1"]').css("background-color", "");
                            jQuery('.msgwithouttext').removeClass('hide');
                            jQuery('.msgwithtext').addClass('hide');
                            jQuery('.imageArea').html('');
                            jQuery('.editTemplate').addClass('hide');
                            jQuery('.templatesNotes').addClass('hide');
                            jQuery('.attachmentlabel').addClass('hide');
                            jQuery('.editTemplate').attr("href", "");
                        }else{
                            jQuery('textarea[name="content1"]').prop('readonly', true);
                            jQuery('textarea[name="content1"]').css("background-color", "lightgray");
                            jQuery('.msgwithouttext').addClass('hide');
                            jQuery('.msgwithtext').removeClass('hide');
                            jQuery('.imageArea').html('');
                            if(data.result['fileType'] == 1){
                                jQuery('.imageArea').html('<img src="'+data.result['image']+'" style="width: 100px;">');
                            }else{
                                jQuery('.imageArea').html('<a href="'+data.result['image']+'" style="width: 100px;">'+data.result['fileName']+'</a>');
                            }
                            jQuery('.editTemplate').removeClass('hide');
                            jQuery('.templatesNotes').removeClass('hide');
                            jQuery('.attachmentlabel').removeClass('hide');
                            jQuery('.editTemplate').attr("href", "index.php?module=CTWhatsAppTemplates&view=Edit&record="+wptemplatesid);
                        }
                    }
                );
            });

            $("#generalfields").on('change', function(){
                var generalfields = jQuery('#generalfields').val();
                var oldtext = jQuery('textarea[name="content"]').val();
                var newtext = oldtext+' '+generalfields;
                jQuery('textarea[name="content"]').val(newtext);
            });

            $("#modulefields").on('change', function(){
                var modulefields = jQuery('#modulefields').val();
                var oldtext = jQuery('textarea[name="content"]').val();
                var newtext = oldtext+' '+modulefields;
                jQuery('textarea[name="content"]').val(newtext);
            });
        });
    <?php echo '</script'; ?>
>
  
<?php }
}

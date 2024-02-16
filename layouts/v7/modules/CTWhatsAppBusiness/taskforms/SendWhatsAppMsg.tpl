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
{strip}
    <div class="row" style="margin-bottom: 70px;">
        <div class="col-lg-9">
             <div class="row form-group col-lg-12">
                <div class="col-lg-2" style="margin: 0px 3px 0px -12px;">{vtranslate('From WhatsApp #',$QUALIFIED_MODULE)}</div>
                <div class="col-lg-3">
                    <select class="select2 sendmessagewhatsappnumbers" id="sendmessagewhatsappnumbers" style="width: 116%;" data-placeholder="{vtranslate('LBL_SELECT_OPTIONS',$QUALIFIED_MODULE)}">
                         <option value=""></option>
                    </select>  
                </div>
            </div>

            <div class="row form-group">
                <div class="col-lg-2">{vtranslate('LBL_RECEPIENTS',$QUALIFIED_MODULE)}</div>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-3">
                            <select class="select2 task-fields sendWhatsApp_number" style="width: 116%;" data-placeholder="{vtranslate('LBL_SELECT_FIELDS', $QUALIFIED_MODULE)}">
                                <option value="">{vtranslate('LBL_SELECT_FIELDS', $QUALIFIED_MODULE)}</option>
                                 {foreach from=$RECORD_STRUCTURE_MODEL->getFieldsByType('phone') item=FIELD key=FIELD_VALUE}
                                    <option value=",${$FIELD_VALUE}">({vtranslate($FIELD->getModule()->get('name'),$FIELD->getModule()->get('name'))})  {vtranslate($FIELD->get('label'),$FIELD->getModule()->get('name'))}</option>
                                {/foreach}
                            </select>   
                        </div>
                    </div>
                </div>
            </div>

            <div class="row form-group hide">
                <div class="col-lg-2">{vtranslate('Select WhatsApp Group to send message',$QUALIFIED_MODULE)}</div>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-3">
                            <select class="select2" id="whatsappnumbers" style="width: 116%;" data-placeholder={vtranslate('LBL_SELECT_OPTIONS',$QUALIFIED_MODULE)}>
                                 <option value=""></option>
                            </select>   
                        </div>

                        <div class="col-lg-3">
                            <select class="select2 task-fields sendWhatsApp_number" id="allWhatsappGroups" style="width: 116%;">
                                <option value="">{vtranslate('LBL_SELECT_OPTIONS', $QUALIFIED_MODULE)}</option>
                            </select>   
                        </div>

                    </div>
                </div>
            </div>

             <div class="row form-group" style="padding: 3px;">
                <div class="col-lg-2">{vtranslate('LBL_RECEPIENTS',$QUALIFIED_MODULE)}<span class="redColor">*</span></div>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-7">
                            <input type="text" class="inputElement fields" data-rule-required="true" name="sms_recepient" value="{$TASK_OBJECT->sms_recepient}" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group col-lg-12">
                <div class="col-lg-2" style="padding-left: 0px;">{vtranslate('MSGTEMPLATES', 'CTWhatsAppBusiness')}</div>
                <div class="col-lg-10">
                    <select style="width: 205px;margin-left: -9px;" id="wptemplatesid" class="select2" data-placeholder={vtranslate('LBL_SELECT_OPTIONS',$QUALIFIED_MODULE)}>
                        <option></option>
                          
                    </select>
                    &nbsp;&nbsp;
                    <a class="addTemplate btn btn-default" href="index.php?module=CTWhatsAppTemplates&view=Edit" target="_blank"><i class="fa fa-plus"></i></a>
                    &nbsp;&nbsp;
                    <a class="editTemplate btn btn-default hide" href="index.php?module=CTWhatsAppTemplates&view=Edit" target="_blank"><i class="fa fa-pencil"></i></a>
                    <span id="syncWhatsAppTemplates" title="Sync WhatsApp Templates" style="height: 31px;cursor:pointer;"><img src="layouts/v7/modules/CTWhatsAppBusiness/image/sync.png" style="width: 20px;margin: 5px 0px 1px 5px;"></span>

                </div>
            </div>
            <div class="row form-group col-lg-12">
                <div class="col-lg-2"></div>
                <div class="col-lg-10">
                    <label>{vtranslate('LBL_NOTE', 'CTWhatsAppBusiness')}</label>
                    {vtranslate('LBL_ATTACHMENT_NOTES', 'CTWhatsAppBusiness')}
                </div>  
            </div>
            <div class="row form-group col-lg-12">
                <div class="col-lg-2" style="padding-left: 0px;">{vtranslate('LBL_GENERAL_FIELDS',$QUALIFIED_MODULE)}</div>
                <div class="col-lg-10">
                    <select style="width: 205px;margin-left: -9px;" id="generalfields" class="select2" data-placeholder={vtranslate('LBL_SELECT_OPTIONS',$QUALIFIED_MODULE)}>
                        <option></option>
                        {foreach from=$META_VARIABLES item=META_VARIABLE_KEY key=META_VARIABLE_VALUE}
                            <option value="{if strpos(strtolower($META_VARIABLE_VALUE), 'url') === false}${/if}{$META_VARIABLE_KEY}">{vtranslate($META_VARIABLE_VALUE,$QUALIFIED_MODULE)}</option>
                        {/foreach}  
                    </select>
                </div>  
            </div>
            <div class="row form-group col-lg-12">
                <div class="col-lg-2" style="margin: 0px 3px 0px -12px;">{vtranslate('LBL_ADD_FIELDS',$QUALIFIED_MODULE)}</div>
                <div class="col-lg-10">
                    <select class="select2 task-fields" id="modulefields" style="min-width: 150px;" data-placeholder="{vtranslate('LBL_SELECT_FIELDS', $QUALIFIED_MODULE)}">
                        <option></option>
                        {$ALL_FIELD_OPTIONS}
                    </select>   
                </div>
            </div>
            <div class="msgwithouttext row form-group col-lg-12" style="margin-left: -14px;">    
                <div class="col-lg-2" style="margin: 0px 3px 0px -12px;">{vtranslate('LBL_MESSAGES', 'CTWhatsAppBusiness')}</div>
                <div class="col-lg-10">
                    <textarea name="content" class="inputElement fields" style="height: 150px;width: 870px;">{$TASK_OBJECT->content}</textarea>
                </div>
            </div>
            <div class="msgwithtext hide row form-group col-lg-12" style="margin-left: -14px;">    
                <div class="col-lg-2" style="margin: 0px 3px 0px -12px;">{vtranslate('LBL_MESSAGES', 'CTWhatsAppBusiness')}</div>
                <div class="col-lg-10">
                    <textarea name="content1" class="inputElement fields" style="height: 150px;width: 870px;">{$TASK_OBJECT->content}</textarea>
                </div>
            </div>
            <div class="row form-group col-lg-12">
                <div class="col-lg-2 attachmentlabel hide" style="margin: 0px 3px 0px -12px;">{vtranslate('LBL_ATTACHMENT', 'CTWhatsAppBusiness')}</div>
                <div class="col-lg-10 imageArea" style="cursor: pointer;">
                    
                </div>
            </div>
            <div class="row form-group col-lg-12 templatesNotes hide">
                <div class="col-lg-2"></div>
                <div class="col-lg-10">
                    <label>{vtranslate('LBL_SENDNOWLATERNOTES', 'CTWhatsAppBusiness')}</label>                    
                </div>
            </div>
        </div>
    </div>
{/strip}

{literal}
    <script>
        $(document).ready(function(){
            var moduleName = jQuery('#module_name').val();
            var params = {
                'module' : 'CTWhatsAppTemplates',
                'view' : "WhatsAppTemplatesData", 
                'mode' : "getWhatsappTemplateInWorkflow",
                'moduleName' : moduleName
            }
            AppConnector.request(params).then(function(data) {
                var templateOption = data.result
                $('#wptemplatesid').html(templateOption);
            });

            //get Scan Whatsapp numbers
            var params = {
                'module' : 'CTWhatsAppBusiness',
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
                setTimeout(function(){
                    var whatsappNumbers = jQuery(e.currentTarget).val();
                    jQuery('[name="summary"]').val(whatsappNumbers);
                }, 1000);
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
                    'module' : 'CTWhatsAppBusiness',
                    'parent': app.getParentModuleName(),
                    'view' : "WhatsappChatConfiguration", 
                    'mode' : "getWhatsappGroups",
                    'whatsappNumbers' : whatsappNumbers
                }
                AppConnector.request(params).then(function(data) {
                    var groupOption = data.result;
                    $('#allWhatsappGroups').html(groupOption);
                    $('#allWhatsappGroups').trigger('change');
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
                    'module' : 'CTWhatsAppBusiness',
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
    </script>
{/literal}  

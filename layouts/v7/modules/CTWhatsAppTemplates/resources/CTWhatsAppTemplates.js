/* * *******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
 * ****************************************************************************** */
 
jQuery.Class("CTWhatsAppTemplates_CTWhatsAppTemplates_Js",{

    registerEventsForModulefields : function() {
        jQuery('[name="wptemplate_modules"]').on('change', function(e){
            var sourceModuleName = jQuery('[name="wptemplate_modules"]').val();
            var moduleName = app.getModuleName();
            var params = {
                'module' : moduleName,
                'view' : "WhatsAppTemplatesData",
                'mode' : "getModuleFields",
                'sourcemodulename' : sourceModuleName
            }
            
            AppConnector.request(params).then(
                function(data) {
                    jQuery('[name="wptemplate_fields"]').html('');
                    jQuery('[name="wptemplate_fields"]').html(data.result['modulesFieldshtml']);
                }
            );
        });
        jQuery('[name="wptemplate_modules"]').trigger('change');
    },

    registerEventsForModulePlaceHolder : function(container) {
        jQuery('select[name="wptemplate_fields"]').live('change', function(){
            var picklistvalue = jQuery('select[name="wptemplate_fields"]').val();
            var textareavalue = jQuery('textarea[name="wptemplate_text"]').val();
            var textareanewvalue = textareavalue+picklistvalue;
            jQuery('textarea[name="wptemplate_text"]').val(textareanewvalue);
        });
    },

    registerFileElementChangeEvent : function(container) {
        var thisInstance = this;
        jQuery('input[name="wptemplate_image[]"]').live('change', function(e){
            if(e.target.type == "text") return false;
            var moduleName = jQuery('[name="module"]').val();
            if(moduleName == "Products") return false;
            Vtiger_Edit_Js.file = e.target.files[0];
            var element = jQuery('input[name="wptemplate_image[]"]');
            //ignore all other types than file 
            if(element.attr('type') != 'file'){
                    return ;
            }
            var uploadFileSizeHolder = element.closest('.fileUploadContainer').find('.uploadedFileSize');
            var fileSize = e.target.files[0].size;
            var fileName = e.target.files[0].name;
            uploadFileSizeHolder.text(fileName);
        });
    },

    /**
     * Registered the events for this page
     */
    registerEvents : function(form) {
        var thisInstance = this;
        this.registerEventsForModulefields();
        this.registerEventsForModulePlaceHolder();
        this.registerFileElementChangeEvent(form);
    }    
});

jQuery(document).ready(function(){
    var thisInstance = new CTWhatsAppTemplates_CTWhatsAppTemplates_Js();
    thisInstance.registerEvents(); 
    
});

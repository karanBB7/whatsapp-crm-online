/* * *******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
 * ****************************************************************************** */
 
Vtiger.Class("CTWhatsAppBusiness_WhatsappBot_Js",{

    registerAppTriggerEvent : function() {
        var view = app.view();
        jQuery('.app-menu').removeClass('hide');
        var toggleAppMenu = function(type) { 
            var appMenu = jQuery('.app-menu');
            var appNav = jQuery('.app-nav');
            appMenu.appendTo('#page'); 
            appMenu.css({
                'top' : appNav.offset().top + appNav.height(),
                'left' : 0
            });
            if(typeof type === 'undefined') {
                type = appMenu.is(':hidden') ? 'show' : 'hide';
            }
            if(type == 'show') {
                appMenu.show(200, function() {});
            } else {
                appMenu.hide(200, function() {});
            }
        };

        jQuery('.app-trigger, .app-icon, .app-navigator').on('click',function(e){
            e.stopPropagation();
            toggleAppMenu();
        });

        jQuery('html').on('click', function() {
            toggleAppMenu('hide');
        });

        jQuery(document).keyup(function (e) {
            if (e.keyCode == 27) {
                if(!jQuery('.app-menu').is(':hidden')) {
                    toggleAppMenu('hide');
                }
            }
        });

        jQuery('.app-modules-dropdown-container').hover(function(e) {
            var dropdownContainer = jQuery(e.currentTarget);
            jQuery('.dropdown').removeClass('open');
            if(dropdownContainer.length) {
                if(dropdownContainer.hasClass('dropdown-compact')) {
                    dropdownContainer.find('.app-modules-dropdown').css('top', dropdownContainer.position().top - 8);
                } else {
                    dropdownContainer.find('.app-modules-dropdown').css('top', '');
                }
                dropdownContainer.addClass('open').find('.app-item').addClass('active-app-item');
            }
        }, function(e) {
            var dropdownContainer = jQuery(e.currentTarget);
            dropdownContainer.find('.app-item').removeClass('active-app-item');
            setTimeout(function() {
                if(dropdownContainer.find('.app-modules-dropdown').length && !dropdownContainer.find('.app-modules-dropdown').is(':hover') && !dropdownContainer.is(':hover')) {
                    dropdownContainer.removeClass('open');
                }
            }, 500);

        });

        jQuery('.app-item').on('click', function() {
            var url = jQuery(this).data('defaultUrl');
            if(url) {
                window.location.href = url;
            }
        });

        jQuery(window).resize(function() {
            jQuery(".app-modules-dropdown").mCustomScrollbar("destroy");
            app.helper.showVerticalScroll(jQuery(".app-modules-dropdown").not('.dropdown-modules-compact'), {
                setHeight: $(window).height(),
                autoExpandScrollbar: true
            });
            jQuery('.dropdown-modules-compact').each(function() {
                var element = jQuery(this);
                var heightPer = parseFloat(element.data('height'));
                app.helper.showVerticalScroll(element, {
                    setHeight: $(window).height()*heightPer - 3,
                    autoExpandScrollbar: true,
                    scrollbarPosition: 'outside'
                });
            });
        });
        app.helper.showVerticalScroll(jQuery(".app-modules-dropdown").not('.dropdown-modules-compact'), {
            setHeight: $(window).height(),
            autoExpandScrollbar: true,
            scrollbarPosition: 'outside'
        });
        jQuery('.dropdown-modules-compact').each(function() {
            var element = jQuery(this);
            var heightPer = parseFloat(element.data('height'));
            app.helper.showVerticalScroll(element, {
                setHeight: $(window).height()*heightPer - 3,
                autoExpandScrollbar: true,
                scrollbarPosition: 'outside'
            });
        });
    },

    registerEventForScanQrCode : function(){
        var thisInstance = this;
        jQuery('.scanBotQrCode').on("click", function() {
            var params = {
                'module' : 'CTWhatsAppBusiness',
                'view' : "WhatsappBot",
                'mode' : "scanQRCodeInPopup"
            }
            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                    app.helper.hideProgress();
                    app.showModalWindow(data, function(data){
                        
                    });
                }
            );
        });
    },

    registerEventsForActiveInActive : function() {
        jQuery('#listview-table').on('switchChange.bootstrapSwitch', "input[type='checkbox']", function (e) {
            var currentTarget = jQuery(e.currentTarget);
            var botid = currentTarget.attr('data-botid');
            var whatsappbotstatus = currentTarget.attr('data-whatsappbotstatus');
            var botactive = $(this).val();
            if(botactive == 1){
                botactive = 0;
            }else{
                botactive = 1;
            }

            if(whatsappbotstatus == 0){
                var errorMessage = app.vtranslate('JS_NUMBER_NOT_CONNECTED');
                app.helper.showErrorNotification({'title': 'Error', 'message': errorMessage});
                chatbottable.ajax.reload(null, false);
                return false;
            }

            var params = {};
            params['module'] = app.getModuleName();
            params['view'] = 'WhatsappBot';
            params['mode'] = 'botActiveDeactive';
            params['botactive'] = botactive;
            params['botid'] = botid;
            
            app.request.post({data: params}).then(function(err, response) {
                //chatbottable.clear().draw();
                chatbottable.ajax.reload(null, false);
            });
        });
    },

    registerEventForCancelBot : function(){
        var thisInstance = this;
        jQuery('.cancelLink').on("click", function(e) {
            var message = app.vtranslate('JS_ARE_YOU_SURE_CANCEL');
            app.helper.showConfirmationBox({'message' : message}).then(function(data) {
                location.href = 'index.php?module=CTWhatsAppBusiness&view=WhatsappBot&mode=WhatsappBotList';
            });
        });
    },

    registerEventForCreateBot : function(){
        var thisInstance = this;
        jQuery('.createNewBot').on("click", function(e) {
            var params = {
                'module' : 'CTWhatsAppBusiness',
                'view' : "WhatsappBot",
                'mode' : "createNewBot"
            }
            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                    app.helper.hideProgress();
                    app.showModalWindow(data, function(data){
                        jQuery('#addBot').on("click", function(e) {
                            var whatsAppBotFrom = $("input[name='createWhatsAppBotFrom']:checked").val();
                            var params = {
                                'module' : 'CTWhatsAppBusiness',
                                'view' : "WhatsappBot",
                                'mode' : "createNewBotFrom"
                            }
                            app.helper.showProgress();
                            AppConnector.request(params).then(
                                function(data) {
                                    app.helper.hideProgress();
                                }
                            );
                        });
                    });
                }
            );
        });

        jQuery('.createWhatsAppBotFrom').live("click", function(e) {
            var currentTarget = jQuery(e.currentTarget);
            var createbot = currentTarget.attr('data-createbot');
            if(createbot == 'BotFormScratch'){
                window.location.href = "index.php?module=CTWhatsAppBusiness&view=WhatsappBot&mode=WhatsappBotConfiguration";
            }else if(createbot == 'BotFormTemplate'){
                jQuery('.templateView').removeClass('hide');
                currentTarget.addClass('hightLightDiv');
            }
        });

        jQuery('#botTemplate').live("change", function(e) {
            var botTemplate = jQuery('#botTemplate').val();
            if(botTemplate){
                jQuery('#addBot').removeClass('hide');
            }else{
                jQuery('#addBot').addClass('hide');
            }
        });

        jQuery('#addBot').live("click", function(e) {
            var botTemplate = jQuery('#botTemplate').val();
            window.location.href = "index.php?module=CTWhatsAppBusiness&view=WhatsappBot&mode=WhatsappBotConfiguration&duplicateRecordId="+botTemplate;
        });
    },

    registerPostQuickCreateEvent : function(){
        var thisInstance = this;

        app.event.on("post.QuickCreateForm.show",function(event,form){
            form.find('#goToFullForm').on('click', function(e) {
                window.onbeforeunload = true;
                var form = jQuery(e.currentTarget).closest('form');
                var editViewUrl = jQuery(e.currentTarget).data('editViewUrl');
                if (typeof goToFullFormCallBack != "undefined") {
                    goToFullFormCallBack(form);
                }
                thisInstance.quickCreateGoToFullForm(form, editViewUrl);
            });
        }); 
    },

    /**
     * Function to navigate from quickcreate to editView Fullform
     * @param accepts form element as parameter
     */
    quickCreateGoToFullForm: function(form, editViewUrl) {
        var formData = form.serializeFormData();
        //As formData contains information about both view and action removed action and directed to view
        delete formData.module;
        delete formData.action;
        delete formData.picklistDependency;
        var formDataUrl = jQuery.param(formData);
        var completeUrl = editViewUrl + "&" + formDataUrl;
        window.location.href = completeUrl;
    },

    registerEventForActiveBotLicense : function(){
        var thisInstance = this;
        jQuery('#saveBotLicense').on("click", function(e) {
            var licenseKey = jQuery('#licenseKey').val();
            if(licenseKey == ''){
                var errorMessage = app.vtranslate('JS_ENTER_LICENSEKEY');
                app.helper.showErrorNotification({'title': 'Error', 'message': errorMessage});
                return false;
            }
            var params = {
                'module' : 'CTWhatsAppBusiness',
                'view' : "WhatsappBot",
                'mode' : "saveWhatsAppBotLicense",
                'licenseKey' : licenseKey
            }
            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                    app.helper.hideProgress();
                    var msg = data.result['msg'];
                    var status = data.result['status'];
                    app.helper.showSuccessNotification({'title': 'Success', 'message': msg});

                    setTimeout(function() {
                        if(status == 1){
                            var botListview = 'index.php?module=CTWhatsAppBusiness&view=WhatsappBot&mode=WhatsappBotList';
                        }else{
                            var botListview = 'index.php?module=CTWhatsAppBusiness&view=WhatsappBot&mode=WhatsappBotLicenseEdit';
                        }
                        window.location.href = botListview;
                    }, 500);
                }
            );
        });

        jQuery('#deactivateLicense').on("click", function(e) {
            var licensekey = jQuery('#licensekey').val();
            var params = {
                'module' : 'CTWhatsAppBusiness',
                'view' : "WhatsappBot",
                'mode' : "whatsAppBotLicenseDeactive",
                'licensekey' : licensekey
            }
            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                    app.helper.hideProgress();
                    var msg = data.result['message'];
                    app.helper.showSuccessNotification({'title': 'Success', 'message': msg});

                    setTimeout(function() {
                        var licenseEditview = 'index.php?module=CTWhatsAppBusiness&view=WhatsappBot&mode=WhatsappBotLicenseEdit';
                        window.location.href = licenseEditview;
                    }, 500);
                }
            );
        });
    },

    registerEventForAssignWhatsAppNumber : function(){
        var thisInstance = this;
        jQuery('#assignuserid').on("change", function(e) {
            var assignuserid = jQuery('#assignuserid').val();
            var botRecordid = jQuery('#botRecordid').val();
            if(assignuserid != ''){
                var params = {
                    'module' : 'CTWhatsAppBusiness',
                    'view' : "WhatsappBot",
                    'mode' : "getUserWhatsAppNumber",
                    'assignuserid' : assignuserid
                }
                app.helper.showProgress();
                AppConnector.request(params).then(
                    function(data) {
                        app.helper.hideProgress();
                        
                        if(botRecordid){
                            jQuery('#assignuserchange').val('1');
                        }
                        jQuery('#scanWhatsappNumber').html('');
                        jQuery('#scanWhatsappNumber').html(data.result);
                        jQuery('#scanWhatsappNumber').trigger('change');
                    }
                );
            }
        });
    },

    /**
     * Registered the events for this page
     */
    registerEvents : function() {
        var thisInstance = this;
        this.registerAppTriggerEvent();
        this.registerEventForScanQrCode();
        this.registerEventsForActiveInActive();
        //this.registerEventForDeleteBot();
        this.registerEventForCancelBot();
        this.registerEventForCreateBot();
        this.registerPostQuickCreateEvent();
        this.registerEventForActiveBotLicense();
        this.registerEventForAssignWhatsAppNumber();

        //jQuery('#assignuserid').trigger('change');

        jQuery('#appnav').addClass('hide');

        $('#zoomin').click(function() {
           updateZoom(0.1);
        });

        $('#zoomout').click(function() {
           updateZoom(-0.1);
        });

        zoomLevel = 1;
        var updateZoom = function(zoom) {
            zoomLevel += zoom;
            $('.drawflow').css({ zoom: zoomLevel, '-moz-transform': 'scale(' + zoomLevel + ')' });
        }
    }    
});

function deleteBot(botid){
    var params = {
        'module' : 'CTWhatsAppBusiness',
        'view' : "WhatsappBot",
        'mode' : "deleteWhatsAppBot",
        'botId' : botid
    }

    var message = app.vtranslate('JS_BOT_DELETE');
    app.helper.showConfirmationBox({'message' : message}).then(function(data) {
        AppConnector.request(params).then(
            function(data) {
                var successMessage = app.vtranslate('JS_BOT_DELETED');
                app.helper.showSuccessNotification({'title': 'Success', 'message': successMessage});
                setTimeout( function(){ 
                    location.reload();
                }  , 2000);
            }
        );        
    });
}


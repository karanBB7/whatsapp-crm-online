/* * *******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
 * ****************************************************************************** */
 
jQuery.Class("Settings_CTWhatsAppBusiness_Whatsapp_Js",{

    registerEventsForGetModulesField : function() {
        jQuery('#select_module, .edit').on('change', function(e){
            var select_module = jQuery('#select_module').val();
            var moduleName = app.getModuleName();

            var params = {
                'module' : moduleName,
                'parent': app.getParentModuleName(),
                'view' : "WhatsappChatConfiguration",
                'mode' : "getModuleFields",
                'select_module' : select_module
            }
            var progressIndicatorElement = jQuery.progressIndicator({
                'position' : 'html',
                'blockInfo' : {
                    'enabled' : true
                }
            });
            AppConnector.request(params).then(
                function(data) {
                    progressIndicatorElement.progressIndicator({
                        'mode' : 'hide'
                    })
                    jQuery('#phone_field').val('');
                    jQuery('#phone_field').html(data.result['picklist']);
                    jQuery('#phone_field').trigger('change');
                    
                    if(data.result['active'] == 1){
                        $('#active').prop('checked', true);
                        $('#active').val(1);
                    }else{
                        $('#active').prop('checked', false);
                    }
                }
            );
        });
        
         jQuery( "#EditViewm" ).submit(function( event ) {
            jQuery('#validationmsg').hide();
             event.preventDefault();
             if(jQuery('#select_module').val()==''||jQuery('#phone_field').val()==''){
                jQuery('#validationmsg').show();
                jQuery('#validationmsg').text("Please Select required field");
             }else{
                var select_module = jQuery('#select_module').val();
                var moduleName = app.getModuleName();
                 var params = {
                    'module' : 'Whatsapp',
                    'parent': app.getParentModuleName(),
                    'action' : "SaveWModule",
                    'phone_field' : jQuery('#phone_field').val(),
                    'active' : jQuery('#active').val(),
                    'type' : jQuery('#type').val(),
                    'select_module' : select_module
                }
                var progressIndicatorElement = jQuery.progressIndicator({
                    'position' : 'html',
                    'blockInfo' : {
                        'enabled' : true
                    }
                });
                AppConnector.request(params).then(
                    function(data) {
                        progressIndicatorElement.progressIndicator({
                            'mode' : 'hide'
                        })
                        if(data.result.trim() !=''){
                            jQuery('#validationmsg').show();
                            jQuery('#validationmsg').text(data.result);
                            console.log(data.result)
                        }else{
                            location.reload();
                        }
                     }
                );
             }
              
        });

        jQuery('input[name="active"]').click(function(){
            if(jQuery(this).prop("checked") == true){
                jQuery('#active').val(1);
            }else if(jQuery(this).prop("checked") == false){
                jQuery('#active').val(0);
            }
        });
    },

    registerAppTriggerEvent : function() {
        var view = app.view();
        if(view != 'SettingList' && view != 'AddNew'){
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
        }
    },

     registerEventsSaveLicense : function() {
        jQuery('#save_license_settings').on('click',function(){
        var License_Key = jQuery('input[name="License_Key"]').val();
        var api_key = jQuery('input[name="api_key"]').val();
        var auth_token = jQuery('input[name="auth_token"]').val();
            if(License_Key == ''){

                var params = {
                    title : app.vtranslate('Please Enter License Key'),
                    text: app.vtranslate('Please Enter License Key'),
                    animation: 'show',
                    type: 'error'
                };
                Vtiger_Helper_Js.showPnotify(params);
            }else{
                var progressIndicatorElement = jQuery.progressIndicator({
                    'position' : 'html',
                    'blockInfo' : {
                        'enabled' : true
                    }
                });

                var params = {};
                params['module'] = app.getModuleName();
                params['parent'] = app.getParentModuleName();
                params['action'] = 'SaveLicense';
                params['license_key'] = License_Key;
                params['api_key'] = api_key;
                params['auth_token'] = auth_token;
                
                AppConnector.request(params).then(function(data) {
                        progressIndicatorElement.progressIndicator({'mode' : 'hide'});
                        var msg=data.result['msg'];
                        var code =data.result['code'];
                        if(code == 100){
                            var params = {
                                title : app.vtranslate(msg),
                                text: msg,
                                animation: 'show',
                                type: 'error'
                            };
                            Vtiger_Helper_Js.showPnotify(params);   
                        }else if(code == 101){
                            var params = {
                                title : app.vtranslate(msg),
                                text: msg,
                                animation: 'show',
                                type: 'error'
                            };
                            Vtiger_Helper_Js.showPnotify(params);   
                        }else{
                            var params = {
                                title : app.vtranslate(msg),
                                text: msg,
                                animation: 'show',
                                type: 'info'
                            };
                            Vtiger_Helper_Js.showMessage(params);
                            var redirectUrl = 'index.php?module=CTWhatsAppBusiness&parent=Settings&view=LicenseDetail';
                            window.location.href = redirectUrl;
                        }
                });
            }
        });

        jQuery('#deactivateLicense').live('click',function(){
            var params = {};
            params['module'] = app.getModuleName();
            params['parent'] = app.getParentModuleName();
            params['action'] = 'DeactivateLicense';
            var message1 = app.vtranslate('MSG_WHATSAPP_DEACTIVATE_POPUP');
            app.helper.showConfirmationBox({'message' : message1}).then(function(data) {
                app.request.post({data: params}).then(function(err, response) {
                    if(response){
                        var params = {
                            title : response.message,
                            text: response.message,
                            animation: 'show',
                            type: 'success'
                        };
                        Vtiger_Helper_Js.showPnotify(params);
                        location.reload();
                    }   
                });
            });
        });

        jQuery('#checkStatus').live('click',function(){
            var progressIndicatorElement = jQuery.progressIndicator({
                'position' : 'html',
                'blockInfo' : {
                    'enabled' : true
                }
            });
            var instance =   jQuery('input[name="instance"]').val();
            var auth_token = jQuery('input[name="auth_token"]').val();
            var IS_EXPIRED = jQuery('input[name="IS_EXPIRED"]').val();
            if(IS_EXPIRED == 1){
                progressIndicatorElement.progressIndicator({'mode' : 'hide'});
                var params = {
                    title : app.vtranslate('Your License has been expired'),
                    text: app.vtranslate('Your License has been expired'),
                    animation: 'show',
                    type: 'error'
                };
                Vtiger_Helper_Js.showPnotify(params);
            }else{
                var checkUrl = 'https://api.chat-api.com/'+instance+'/status?token='+auth_token;
                jQuery.get(checkUrl)
                .done(function( response ) {
                   progressIndicatorElement.progressIndicator({'mode' : 'hide'});
                    if(response.accountStatus == 'authenticated'){
                        var redirectUrl = 'index.php?parent=Settings&module=Whatsapp&view=ConfigurationEdit';
                        window.location.href = redirectUrl;
                    }else{
                        var params = {
                            title : app.vtranslate('Your instance is not activated yet - Please scan QR code again'),
                            text: app.vtranslate('Your instance is not activated yet - Please scan QR code again'),
                            animation: 'show',
                            type: 'error'
                        };
                        Vtiger_Helper_Js.showPnotify(params);
                    }
                })
                .fail(function() {
                    progressIndicatorElement.progressIndicator({'mode' : 'hide'});
                    var params = {
                        title : app.vtranslate('Your instance is not activated yet - Please scan QR code again'),
                        text: app.vtranslate('Your instance is not activated yet - Please scan QR code again'),
                        animation: 'show',
                        type: 'error'
                    };
                    Vtiger_Helper_Js.showPnotify(params);
                    
                });
            }
        });

        jQuery("#qrcode_status").live('click',function(){
            var dataUrl = jQuery(this).attr('data-url');
            var progressIndicatorElement = jQuery.progressIndicator({
                'position' : 'html',
                'blockInfo' : {
                    'enabled' : true
                }
            });
            setTimeout( function(){ 
                progressIndicatorElement.progressIndicator({'mode' : 'hide'});
                window.location.href = dataUrl;
            }  , 2000 );
        });
    },
    
    registerEventsForUpdateWhatsappModule : function() {
        jQuery('#updateWhatsappModule').on('click', function(e){
			var moduleName = app.getModuleName();
			var params = {
                'module' : moduleName,
                'parent': app.getParentModuleName(),
                'view' : "UpdateWhatsappModule",
                'mode' : "updateWhatsappModule"
            }
			var message1 = 'Are you sure to Update WhtasappModule?';
            app.helper.showConfirmationBox({'message' : message1}).then(function(data) {
				app.helper.showProgress();
                app.request.post({data: params}).then(function(err, response) {
					app.helper.hideProgress();
                    if(response){
						var message = response.message;
						app.helper.showSuccessNotification({'title': 'Success', 'message': message});
						setTimeout(function(){ 
							location.reload();
						}, 3000);   
                    }else{
						app.helper.showSuccessNotification({'title': 'Success', 'message': 'Some problem in Update Whatsapp Module'});
						setTimeout(function(){ 
							location.reload();
						}, 3000);   
					}
                });
            });
        });
    },

    UninstallWhatsappModule : function(){
        jQuery('#unInstallWhatsapp').live('click',function(){
            var params = {};
            params['module'] = app.getModuleName();
            params['parent'] = app.getParentModuleName();
            params['action'] = 'Uninstall';
            var message = app.vtranslate('MSG_WHATSAPP_POPUP1')+'<br/>'+app.vtranslate('MSG_WHATSAPP_POPUP1_2');
            var message1 = app.vtranslate('MSG_WHATSAPP_POPUP2');
            app.helper.showConfirmationBox({'message' : message}).then(function(data) {
                app.helper.showConfirmationBox({'message' : message1}).then(function(data) {
                    app.request.post({data: params}).then(function(err, response) {
                        if(response){
                            var params = {
                                title : app.vtranslate('MSG_WHATSAPP_UNISTALL'),
                                text: app.vtranslate('MSG_WHATSAPP_UNISTALL'),
                                animation: 'show',
                                type: 'success'
                            };
                            Vtiger_Helper_Js.showPnotify(params);
                            window.location.href = response;
                        }   
                    });
                });
            });
        });
    },
    
    /**
     * Registered the events for this page
     */
    registerEvents : function(form) {
        var thisInstance = this;
        this.registerEventsForGetModulesField();
        this.registerAppTriggerEvent();
        this.registerEventsSaveLicense();
        this.registerEventsForUpdateWhatsappModule();
        this.UninstallWhatsappModule();
    }    
});

jQuery(document).ready(function(){
    var thisInstance = new Settings_CTWhatsAppBusiness_Whatsapp_Js();
    thisInstance.registerEvents();
});

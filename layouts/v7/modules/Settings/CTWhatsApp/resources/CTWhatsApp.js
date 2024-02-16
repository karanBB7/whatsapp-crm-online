/* * *******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
 * ****************************************************************************** */
 
jQuery.Class("Settings_CTWhatsApp_CTWhatsApp_Js",{

    registerEventsForGetModulesField : function() {
        jQuery('#select_module').live('change', function(e){
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
                    });
                    jQuery('#phone_field').val('');
                    jQuery('#phone_field').html(data.result['picklist']);
                    jQuery('#phone_field').trigger('change');
                    if(data.result['rows'] != 0){
                        if(data.result['active'] == 1){
                            $('#active').prop('checked', true);
                            $('#active').val(1);
                        }else{
                            $('#active').prop('checked', false);
                        }
                    }
                }
            );
        });

        jQuery('#editWhatsappModule').live('click', function(e){
            var currentTarget = jQuery(e.currentTarget);
            var moduleName = app.getModuleName();
            var params = {
                'module' : moduleName,
                'parent': app.getParentModuleName(),
                'view' : "WhatsappChatConfiguration",
                'mode' : "addNewWPFieldPopup"
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
                    });
                    app.showModalWindow(data, function(data){
                        setTimeout( function(){ 
                            var whatsappModuleName = currentTarget.data('whatsappmodulename');
                            jQuery('#select_module').val(whatsappModuleName);
                            jQuery('#select_module').trigger('change');
                        }  , 1000 );
                    });
                }
            );
        });

        jQuery('.addNewWPField').on('click', function(e){
            var moduleName = app.getModuleName();
            var params = {
                'module' : moduleName,
                'parent': app.getParentModuleName(),
                'view' : "WhatsappChatConfiguration",
                'mode' : "addNewWPFieldPopup"
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
                    });
                    app.showModalWindow(data, function(data){
                        $('#active').prop('checked', true);
                    });
                }
            );
        });

        jQuery('#submitbutton').live('click', function (e) {
            var moduleName = app.getModuleName();
            var select_module = jQuery('#select_module').val();
            if(select_module == ''){
                var params = {
                    title : app.vtranslate('JS_SELECT_MODULE'),
                    text: app.vtranslate('JS_SELECT_MODULE'),
                    animation: 'show',
                    type: 'error'
                };
                Vtiger_Helper_Js.showPnotify(params);
                return false;
            }
            var phone_field = jQuery('#phone_field').val();
            if ($('#active').is(":checked")){
                var whatsappActive = '1';
            }else{
                var whatsappActive = '0';
            }
            var params = {
                'module' : moduleName,
                'parent': app.getParentModuleName(),
                'view' : "WhatsappChatConfiguration",
                'mode' : "saveWPField",
                'select_module' : select_module,
                'phone_field' : phone_field,
                'whatsappActive' : whatsappActive
            }
            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                app.helper.hideProgress();
                location.reload();
            });
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
                    'module' : 'CTWhatsApp',
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

    registerEventsSaveLicense : function() {
        jQuery('#save_license_settings').on('click',function(){
        var License_Key = jQuery('input[name="License_Key"]').val();
        var api_key = jQuery('input[name="api_key"]').val();
        var auth_token = jQuery('input[name="auth_token"]').val();
            if(License_Key == ''){

                var params = {
                    title : app.vtranslate('ENTERLICENSEKEY'),
                    text: app.vtranslate('ENTERLICENSEKEY'),
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
                        var currenUserID=data.result['currenUserID'];
                        var params = {
                            title : app.vtranslate(msg),
                            text: msg,
                            animation: 'show',
                            type: 'info'
                        };
                        Vtiger_Helper_Js.showMessage(params);
                        var redirectUrl = 'index.php?parent=Settings&module=CTWhatsApp&view=ConfigurationEdit&userid='+currenUserID;
                        window.location.href = redirectUrl;
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
                    title : app.vtranslate('LBL_LICENSEEXPIRE'),
                    text: app.vtranslate('LBL_LICENSEEXPIRE'),
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
                            title : app.vtranslate('LBL_SCANQRCODEAGAIN'),
                            text: app.vtranslate('LBL_SCANQRCODEAGAIN'),
                            animation: 'show',
                            type: 'error'
                        };
                        Vtiger_Helper_Js.showPnotify(params);
                    }
                })
                .fail(function() {
                    progressIndicatorElement.progressIndicator({'mode' : 'hide'});
                    var params = {
                        title : app.vtranslate('LBL_SCANQRCODEAGAIN'),
                        text: app.vtranslate('LBL_SCANQRCODEAGAIN'),
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
            var currenVersion = jQuery('#currenVersion').val();
            var latestVersion = jQuery('#latestVersion').val();
            var moduleName = app.getModuleName();
            var params = {
                'module' : moduleName,
                'parent': app.getParentModuleName(),
                'view' : "UpdateWhatsappModule",
                'mode' : "updateWhatsappModule"
            }
            var message1 = app.vtranslate('CURENT_VERSION')+' : '+currenVersion+'<br><br>';
            message1 += app.vtranslate('LATEST_VERSION')+' : '+latestVersion+'<br><br>';
            message1 += app.vtranslate('MSG_UPDATEMODULE');

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
                        var message = app.vtranslate('UPDATEMODULE');
                        app.helper.showSuccessNotification({'title': 'Success', 'message': message});
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
        jQuery('#importModalCenter').live('click',function(){
            jQuery('#importModalCenter').hide();
        });
    },

    registerEventsForChangeMultipleToSingleWhatsappUSer : function() {
        var whatsappmanagement = jQuery('#wpManagement').val();
        if(whatsappmanagement == 'singleWhatsapp'){    
            jQuery('#whatsappmanagement').val('singleWhatsapp');
            $('#whatsappmanagement').select2("val", 'singleWhatsapp');
            $('.multipleUserSelect').addClass('hide');
            $('.singleUserSelect').removeClass('hide');
            
        }else{
            $('.multipleUserSelect').removeClass('hide');
            $('.singleUserSelect').addClass('hide');
        }

        jQuery('#whatsappmanagement').on('change',function(){
            var whatsappmanagement = jQuery('#whatsappmanagement').val();
            console.log(whatsappmanagement);
            if(whatsappmanagement == 'singleWhatsapp'){
                var message1 = app.vtranslate("MULTIPLETOSINGLE");
                app.helper.showConfirmationBox({'message' : message1}).then(function(data) {
                    var params = {
                        'module' : 'CTWhatsApp',
                        'parent': app.getParentModuleName(),
                        'view' : "WhatsappChatConfiguration",
                        'mode' : "logoutAllWhatsAppUser",
                        'whatsappManagement' : whatsappmanagement
                    }
                    app.helper.showProgress();
                    AppConnector.request(params).then(
                        function(data) {
                        app.helper.hideProgress();
                            jQuery('#whatsappmanagement').val('singleWhatsapp');
                            $('#whatsappmanagement').select2("val", 'singleWhatsapp');
                            $('.multipleUserSelect').addClass('hide');
                            $('.singleUserSelect').removeClass('hide');
                            return false;    
                        }
                    );
                });
                jQuery('#whatsappmanagement').val('multipleWhatsapp');
                $('#whatsappmanagement').select2("val", 'multipleWhatsapp');
                $('.multipleUserSelect').removeClass('hide');
                $('.singleUserSelect').addClass('hide');
            }else{
                var message1 = app.vtranslate("MULTIPLETOSINGLE");
                app.helper.showConfirmationBox({'message' : message1}).then(function(data) {
                    var params = {
                        'module' : 'CTWhatsApp',
                        'parent': app.getParentModuleName(),
                        'view' : "WhatsappChatConfiguration",
                        'mode' : "logoutAllWhatsAppUser",
                        'whatsappManagement' : whatsappmanagement
                    }
                    app.helper.showProgress();
                    AppConnector.request(params).then(
                        function(data) {
                        app.helper.hideProgress();
                            jQuery('#whatsappmanagement').val('multipleWhatsapp');
                            $('#whatsappmanagement').select2("val", 'multipleWhatsapp');
                            $('.multipleUserSelect').removeClass('hide');
                            $('.singleUserSelect').addClass('hide');
                            return false;    
                        }
                    );
                });
                jQuery('#whatsappmanagement').val('singleWhatsapp');
                $('#whatsappmanagement').select2("val", 'singleWhatsapp');
                $('.multipleUserSelect').addClass('hide');
                $('.singleUserSelect').removeClass('hide');
            }
        });

        jQuery('.allocatewhatsapp').on('change',function(){
            var selected=[];
            $('.allocatewhatsapp :selected').each(function(){
                selected[$(this).val()]=$(this).text();
            });
            if(selected == ''){
                $('.multipleusererror').removeClass('hide');
                $('.multipleonloaderror').addClass('hide');
            }
        });
    },

    registerEventsForActiveInActive : function() {
        jQuery('.userlist').on('switchChange.bootstrapSwitch', "input[type='checkbox']", function (e) {
            var currentTarget = jQuery(e.currentTarget);
            var userid = currentTarget.attr('data-id');
            var activeInActive = $(this).val();
            if(activeInActive == 1){
                activeInActive = 0;
            }else{
                activeInActive = 1;
            }

            var params = {};
            params['module'] = app.getModuleName();
            params['parent'] = app.getParentModuleName();
            params['view'] = 'WhatsappChatConfiguration';
            params['mode'] = 'updateUserActiveInctive';
            params['userid'] = userid;
            params['activeInActive'] = activeInActive;

            $(this).val('');
            $(this).val(activeInActive);
            
            app.request.post({data: params}).then(function(err, response) {
            });
        });
    },

    registerEventsForUserWhatsAppLogout : function() {
        jQuery('.selectUserLogout').on('click', function (e) {
            var currentTarget = jQuery(e.currentTarget);
            var whatsappuserid = currentTarget.attr('data-whatsappuserid');
            var message1 = app.vtranslate("Are you sure to Logout?");
                app.helper.showConfirmationBox({'message' : message1}).then(function(data) {
                var dataUrl = 'index.php?module=CTWhatsApp&parent=Settings&view=WhatsappChatConfiguration&mode=deleteWhatsAppUsers&selectUserid=yes&userid='+whatsappuserid;
                window.location.href = dataUrl;
            });
        });
    },

    registerEventsForAddNewUSersGroupsMultipleWhatsapp : function() {
        jQuery('.addScanUsers').on('click', function (e) {
            var moduleName = app.getModuleName();
            var params = {
                'module' : moduleName,
                'parent': app.getParentModuleName(),
                'view' : "WhatsappChatConfiguration",
                'mode' : "addMultipleWhatsAppNumberPopup"
            }
            var whatsappmultiple = jQuery('#whatsappmanagement').val();
            var url = window.location.href;

            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                app.helper.hideProgress();
                app.showModalWindow(data, function(data){
                    $('#whatsappActive').prop('checked', true);
                    jQuery('#saveMultipleWhatsapp').on('click', function (e) {
                        var moduleName = app.getModuleName();
                        var scanWhatsappUsersGroups = jQuery('#scanWhatsappUsersGroups').val();
                        var whatsappUsersGroups = jQuery('#whatsappUsersGroups').val();
                        if ($('#whatsappActive').is(":checked")){
                            var whatsappActive = 'on';
                        }else{
                            var whatsappActive = 'off';
                        }
                        if ($('#whatsappbot').is(":checked")){
                            var whatsappbot = 'on';
                        }else{
                            var whatsappbot = 'off';
                        }
                        var params = {
                            'module' : moduleName,
                            'parent': app.getParentModuleName(),
                            'view' : "WhatsappChatConfiguration",
                            'mode' : "saveMultilpeUserGroupWhatsapp",
                            'mainuser' : scanWhatsappUsersGroups,
                            'subusers' : whatsappUsersGroups,
                            'active' : whatsappActive,
                            'whatsappbot' : whatsappbot,
                            'url' : url,
                            'whatsappmultiple' : whatsappmultiple
                        }
                        app.helper.showProgress();
                        AppConnector.request(params).then(
                            function(data) {
                            app.helper.hideProgress();
                            var url = window.location.href;    
                            if (url.indexOf('?') > -1){
                               url += '&whatsappmultiple='+whatsappmultiple
                            }else{
                               url += '?whatsappmultiple='+whatsappmultiple
                            }
                            window.location.href = url;
                        });
                    });
                });
            });
        });

        jQuery('.editUsers').on('click', function (e) {
            var moduleName = app.getModuleName();
            var currentTarget = jQuery(e.currentTarget);
            var userid = currentTarget.attr('data-userid');

            var params = {
                'module' : moduleName,
                'parent': app.getParentModuleName(),
                'view' : "WhatsappChatConfiguration",
                'mode' : "addMultipleWhatsAppNumberPopup",
                'userid' : userid
            }
            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                app.helper.hideProgress();
                    app.showModalWindow(data, function(data){
                        jQuery('#scanWhatsappUsersGroups').prop('disabled', true);
                        jQuery('#saveMultipleWhatsapp').on('click', function (e) {
                            var moduleName = app.getModuleName();
                            var scanWhatsappUsersGroups = jQuery('#scanWhatsappUsersGroups').val();
                            var whatsappUsersGroups = jQuery('#whatsappUsersGroups').val();
                            if ($('#whatsappActive').is(":checked")){
                                var whatsappActive = 'on';
                            }else{
                                var whatsappActive = 'off';
                            }
                            if ($('#whatsappbot').is(":checked")){
                                var whatsappbot = 'on';
                            }else{
                                var whatsappbot = 'off';
                            }
                            var params = {
                                'module' : moduleName,
                                'parent': app.getParentModuleName(),
                                'view' : "WhatsappChatConfiguration",
                                'mode' : "saveMultilpeUserGroupWhatsapp",
                                'mainuser' : scanWhatsappUsersGroups,
                                'subusers' : whatsappUsersGroups,
                                'active' : whatsappActive,
                                'whatsappbot' : whatsappbot
                            }
                            app.helper.showProgress();
                            AppConnector.request(params).then(
                                function(data) {
                                app.helper.hideProgress();
                                location.reload();
                            });
                        });
                    });
                }
            );
        });

        jQuery('.deleteUsers').on('click', function (e) {
            var moduleName = app.getModuleName();
            var currentTarget = jQuery(e.currentTarget);
            var userid = currentTarget.attr('data-userid');
            var message1 = app.vtranslate("Are you sure to delete this Multiple WhatsApp?");
                app.helper.showConfirmationBox({'message' : message1}).then(function(data) {
                    var params = {
                        'module' : moduleName,
                        'parent': app.getParentModuleName(),
                        'view' : "WhatsappChatConfiguration",
                        'mode' : "deleteMultipleWhatsAppNumber",
                        'userid' : userid
                    }
                    app.helper.showProgress();
                    AppConnector.request(params).then(
                        function(data) {
                            app.helper.hideProgress();
                            location.reload();
                        }
                    );
            });
        });


        jQuery('#scanWhatsappUsersGroups').live('change', function (e) {
            var moduleName = app.getModuleName();
            var whatsappUserId = jQuery('#scanWhatsappUsersGroups').val();
            if(whatsappUserId){
                var params = {
                    'module' : moduleName,
                    'parent': app.getParentModuleName(),
                    'view' : "WhatsappChatConfiguration",
                    'mode' : "checkMultipleUserWhatsapp",
                    'whatsappUserId' : whatsappUserId
                }
                app.helper.showProgress();
                AppConnector.request(params).then(
                    function(data) {
                        console.log(data);
                        app.helper.hideProgress();
                        if(data.result == 1){
                            jQuery('#saveMultipleWhatsapp').prop('disabled', true);
                            jQuery('#scanWhatsappUsersGroups').val('');
                            var message = 'This User/Group is already added';
                            app.helper.showErrorNotification({'title': 'Error', 'message': message});
                        }else{
                            jQuery('#saveMultipleWhatsapp').prop('disabled', false);
                        }
                    }
                );
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
    
    /**
     * Registered the events for this page
     */
    registerEvents : function(form) {
        var thisInstance = this;
        this.registerAppTriggerEvent();
        this.registerEventsForGetModulesField();
        this.registerEventsSaveLicense();
        this.registerEventsForUpdateWhatsappModule();
        this.UninstallWhatsappModule();
        this.registerEventsForChangeMultipleToSingleWhatsappUSer();
        this.registerEventsForActiveInActive();
        this.registerEventsForUserWhatsAppLogout();
        this.registerEventsForAddNewUSersGroupsMultipleWhatsapp();
    }    
});

jQuery(document).ready(function(){
    var thisInstance = new Settings_CTWhatsApp_CTWhatsApp_Js();
    thisInstance.registerEvents();

    jQuery('#deletedWhatsappModule').live('click', function(e){
        var currentTarget = jQuery(e.currentTarget);
        var whatsappModuleName = currentTarget.data('whatsappmodulename');
        var moduleName = app.getModuleName();
        var params = {
            'module' : moduleName,
            'parent': app.getParentModuleName(),
            'action' : "deleteWModule",
            'dmodule' : whatsappModuleName,
        }
        var message1 = app.vtranslate('DELETEMODULE');
        app.helper.showConfirmationBox({'message' : message1}).then(function(data) {
            app.helper.showProgress();
            app.request.post({data: params}).then(function(err, response) {
                app.helper.hideProgress();
                location.reload();
            });
        });
    });
});

/* * *******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
 * ****************************************************************************** */
 
Vtiger.Class("CTWhatsApp_CTWhatsaApp_Js",{

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

    registerEventForSetWhatsappModule : function() {
        var thisInstance = this;
        jQuery('.whatsappModules').on('click', function(e) {
            var start = jQuery('#perpagerecord').val();
            jQuery('#start').val(start);
            jQuery('.listViewPreviousPageButton').attr('disabled', true);
            var currentTarget = jQuery(e.currentTarget);
            var whatsappmodule = currentTarget.attr('data-selectModule');
            
            var currenOpenModule = jQuery('#whatsappModule').val();
            jQuery('#'+currenOpenModule+'Msg').addClass("hide");
            jQuery('.othermoduleopen').removeClass('active');
            jQuery('.searchBox').val('');

            jQuery('#replyMessageId').val('');
            jQuery('#replymessageText').val('');
            jQuery('.reply-input').addClass('hide');
            jQuery('.closeReplybutton').addClass('hide');

            if(whatsappmodule == 'Groups'){
                $('#groupWhatsappNumber').val('');
                $('.conversation-compose').css('width', '100%'); 
            }else{
                //$('.conversation-compose').css('width', '65%');
            }
            jQuery('#whstappContactSerach').val('');
            jQuery('#whatsappModule').val(whatsappmodule);
            if(whatsappmodule){
                thisInstance.registerEventForGetWhatsappModuleData(whatsappmodule);
            }
        });
    },

    registerEventForGetWhatsappModuleData : function(whatsappmodule) {
        var start = jQuery('#start').val();
        var end = jQuery('#perpagerecord').val();
        var searchValue = jQuery('#whstappContactSerach').val();
        var responseCustomer = jQuery('#response_customer').val();
        var params = {
            'module' : 'CTWhatsApp',
            'view' : "WhatsappChat",
            'mode' : "getModulesData",
            'whatsappmodule' : whatsappmodule,
            'start' : start,
            'end' : end,
            'searchValue' : searchValue,
            'responseCustomer' : responseCustomer
        }
        app.helper.showProgress();
        AppConnector.request(params).then(
            function(data) {
            app.helper.hideProgress();
            if(whatsappmodule == "Groups"){
                jQuery('#broadcastgroup').removeClass('hide');
                jQuery('.listViewNextPageButton').attr('disabled', true);
                $('.groupBlink').removeClass('groupBlink');
                $('.addGroupNumber').removeClass('hide');
                jQuery('.ws-grp-wrap').removeClass('hide');
                jQuery('.groupMemberList').removeClass('hide');
            }else{
                jQuery('#broadcastgroup').addClass('hide');
                jQuery('.addGroupNumber').addClass('hide');
                jQuery('.ws-grp-wrap').addClass('hide');
                jQuery('.groupMemberList').addClass('hide');
            }

            if(whatsappmodule == "NewMessages"){
                jQuery('.new_messages').text('');
                jQuery('.new_messages').removeClass('counterMsg');
                jQuery('#messageunread').val(0);
                jQuery('.counterMsgs').addClass('hide');
            }

            if(data.result['allMessageshtml'] == ''){
                jQuery('.smallListing').html();
                var noRecords = '<div class="conversationDiv">' +
                                '    <div class="noRecords" style="margin-left: 108px;margin-top: 12px;">' +
                                '        <img src="layouts/v7/modules/CTWhatsApp/image/noRecords.png" style="width: 36px;margin-left: 20px;"/><br>' +
                                '        <span>'+app.vtranslate('JS_NORECORDFOUND')+'</span>' +
                                '    </div>' +
                                '</div>';
                jQuery('.smallListing').html(noRecords);

                jQuery('.norRecordData').removeClass('hide');
                jQuery('.yesRecordData').addClass('hide');
                jQuery('.messageBlock').removeClass('hide');
                jQuery('.proDetailsDiv').addClass('hide');
                if(whatsappmodule == "Groups"){
                    $("#groupWhatsappNumber option:first").attr("selected", "selected");
                    var defaultWhatsappNumber = $("#groupWhatsappNumber option:first").val();
                    if(defaultWhatsappNumber){
                        jQuery('#groupWhatsappNumber').trigger('change');
                    }
                }
            }else{
                jQuery('.proDetailsDiv').removeClass('hide');
                jQuery('.conversationDiv').removeClass('hide');
                
                jQuery('.smallListing').html();
                if(whatsappmodule == "Groups"){
                    jQuery('.smallListing').html('');
                    jQuery('.moduleDetailBlock').html('');
                }else{
                    jQuery('.smallListing').html(data.result['allMessageshtml']);
                    if(whatsappmodule != 'AllMessages' && whatsappmodule != 'Important' && whatsappmodule != 'NewMessages' && whatsappmodule != 'Unknown'){
                        jQuery('#'+whatsappmodule+'totalRecord').val(data.result['rows']);
                    }
                }
                var perPageRecord = jQuery('#perpagerecord').val();
               

                jQuery('.messageBlock').addClass('hide');
                jQuery('.bydefaulOpenChat').trigger('click');
            }
            var start = jQuery('#start').val();
            var totalRecord = jQuery('#'+whatsappmodule+'totalRecord').val();

            if(totalRecord == 0 || totalRecord == undefined){
                jQuery('.listViewNextPageButton').attr('disabled', true);
            }else{
                console.log(parseInt(totalRecord));
                console.log(parseInt(start));
                if(parseInt(totalRecord) < parseInt(start)){
                    jQuery('.listViewNextPageButton').attr('disabled', true);
                }else{
                    jQuery('.listViewNextPageButton').attr('disabled', false);
                }
            }
                
        });
    },

    registerEventForOtherModule : function() {
        var thisInstance = this;
        jQuery('.dropdawnModule').on('click', function(e) {
            var currentTarget = jQuery(e.currentTarget);
            var whatsappModule = currentTarget.attr('data-modulename');
            var translateModulename = currentTarget.attr('data-translatemodulename');
            var count = currentTarget.attr('data-count');

            jQuery('.othermodule').removeClass('hide');
            jQuery('.othermodule').attr('data-selectModule',whatsappModule);
            jQuery('.othermodule').attr('id',whatsappModule+'totalRecord');
            jQuery('.othermodule').attr('value',count);
            jQuery('.othermodule .nav-link').text(translateModulename);
            jQuery('.othermodule .nav-link').append(' <span class="counterMsg hide othermoduleCount">'+count+'</span>');
            
            var currenOpenModule = jQuery('#whatsappModule').val();
            jQuery('#'+currenOpenModule+'Msg').addClass("hide");

            jQuery('.nav-link').removeClass('active');
            jQuery('.othermoduleopen').addClass('active');

            jQuery('#whatsappModule').val(whatsappModule);
            if(whatsappModule){
                var start = jQuery('#perpagerecord').val();
                jQuery('#start').val(start);
                thisInstance.registerEventForGetWhatsappModuleData(whatsappModule);
            }
        });
    },

    registerCheckBoxClickEvent : function(){
        jQuery('.listViewEntriesCheckBox').live('click', function (e) {
            jQuery('#listViewEntriesMainCheckBox').attr("checked", false);
        });
    },

    registerMainCheckBoxClickEvent : function(){
        jQuery('#listViewEntriesMainCheckBox').live('click', function (e) {
            jQuery('.listViewEntriesCheckBox').attr("checked", true);
        });
    },

    registerEventForNext : function(){
        var thisInstance = this;
        jQuery('.listViewNextPageButton').live('click', function (e) {
            var start = jQuery('#start').val();
            var perpagerecord = jQuery('#perpagerecord').val();
            var nextRecordCount = parseFloat(start) + parseFloat(perpagerecord);
            var start = jQuery('#start').val(nextRecordCount);
            var whatsappmodule = jQuery('#whatsappModule').val();
            var totalRecord = jQuery('#'+whatsappmodule+'totalRecord').val();

            thisInstance.registerEventForGetWhatsappModuleData(whatsappmodule);
        });
    },

    registerEventForShowChatMessages : function(){
        var thisInstance = this;
        jQuery('.showChatMessages').live('click', function (e) {
            var currentTarget = jQuery(e.currentTarget);
            jQuery('.showChatMessages').css("background","#ffffff");
            currentTarget.css("background","#f6f6f6");
            var recordid = currentTarget.attr('data-recordid');
            var groupLabel = currentTarget.attr('data-label');
            var groupid = currentTarget.attr('data-groupid');
            var groupMember = currentTarget.attr('data-groupMember');
            var sendMessageInGroup = currentTarget.attr('data-sendmessageingroup');
            jQuery('#replyMessageId').val('');
            jQuery('#replymessageText').val('');

            jQuery('#writemsg').val('');
            jQuery('#filename').val(''); 
            jQuery('[name="selectfile_data"]').val('');
            jQuery('#wptemplateid').val('');
            jQuery('#loadGroupMessageNumber').val('11');
       
            var whatsappmodule = jQuery('#whatsappModule').val();
            var groupWhatsappNumber = jQuery('#groupWhatsappNumber').val();
            currentTarget.find('.counterMsg').remove();

            var params = {
                'module' : 'CTWhatsApp',
                'view' : "WhatsappChat",
                'mode' : "getRecordMessageDetails",
                'recordid' : recordid,
                'whatsappmodule' : whatsappmodule,
                'groupid' : groupid,
                'groupWhatsappNumber' : groupWhatsappNumber
            }
            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                    app.helper.hideProgress();

                    jQuery('#replyMessageId').val('');
                    jQuery('#replymessageText').val('');
                    jQuery('.reply-input').addClass('hide');
                    jQuery('.closeReplybutton').addClass('hide');

                    jQuery('.norRecordData').addClass('hide');
                    jQuery('.yesRecordData').removeClass('hide');
                    jQuery('.messageBlock').removeClass('hide');

                    var recordId = data.result['recordId'];
                    var label = data.result['label'];
                    var phone = data.result['phone'];
                    var profileImage = data.result['profileImage'];
                    var imagetag = data.result['imagetag'];
                    var whatsappMessages = data.result['whatsappMessages'];
                    var keyFieldsHTML = data.result['keyFieldsHTML'];
                    var totalSent = data.result['totalSent'];
                    var totalReceived = data.result['totalReceived'];
                    var recentComments = data.result['recentComments'];
                    var relatedModuleHTML = data.result['relatedModuleHTML'];
                    var messageImportant = data.result['messageImportant'];
                    var setype = data.result['setype'];
                    var commentModule = data.result['commentModule'];
                    var moduleIsEnable = data.result['moduleIsEnable'];
                    var modCommentsEnable = data.result['ModCommentsEnable'];
                    var permissionRecord = data.result['permissionRecord'];
                    var manualtransfer = data.result['manualtransfer'];
                    var groupMembersHTML = data.result['groupMembersHTML'];
                    var currentUserID = data.result['currentUserID'];

                    if(imagetag == 1){
                        var image = '<img src="'+profileImage+'" style="width: 50px;"/>';
                    }else{
                        var image = '<span style="margin: 7px;font-size: 28px;margin: 2px;color: teal;"><b>'+profileImage+'</b></span>';
                    }
                    
                    if(recordId){
                        jQuery('.importantMessages').removeClass('hide');
                        if(messageImportant == '1'){
                            jQuery('#messagesImportant').val(1);
                            jQuery('.importantMessages').find('img').attr('src', 'layouts/v7/modules/CTWhatsApp/image/favorites-added.png');
                        }else{
                            jQuery('#messagesImportant').val(0);
                            jQuery('.importantMessages').find('img').attr('src', 'layouts/v7/modules/CTWhatsApp/image/favorites.png');
                        }

                        var moduleURL = 'index.php?module='+setype+'&view=Detail&record='+recordId;
                        var moduleURLTag = '<a href="'+moduleURL+'" target="_blank"><i class="fa fa-eye"></i></a>';
                        jQuery('.closeBtn').html(moduleURLTag);
                        if(permissionRecord == 1){
                            jQuery('.editModuleRecord').removeClass('hide');
                        }else{
                            jQuery('.editModuleRecord').addClass('hide');
                        }
                        jQuery('#openRecordID').val(recordId);
                        jQuery('.recordAssign').addClass('hide');
                    }else{
                        jQuery('.importantMessages').removeClass('hide');
                        if(messageImportant == '1'){
                            jQuery('#messagesImportant').val(1);
                            jQuery('.importantMessages').find('img').attr('src', 'layouts/v7/modules/CTWhatsApp/image/favorites-added.png');
                        }else{
                            jQuery('#messagesImportant').val(0);
                            jQuery('.importantMessages').find('img').attr('src', 'layouts/v7/modules/CTWhatsApp/image/favorites.png');
                        }
                        
                        jQuery('.closeBtn').html('');
                        jQuery('.editModuleRecord').addClass('hide');
                        jQuery('.recordAssign').addClass('hide');
                        jQuery('#openRecordID').val(phone);
                    }
                    jQuery('#module_recordid').val(recordId);
                    if(recordId){
                        jQuery('.commentSection').removeClass('hide');
                    }else{
                        jQuery('.commentSection').addClass('hide');
                    }
                    jQuery('.recordData1').html(image);

                    if(whatsappmodule == 'Groups'){
                        jQuery('.importantMessages').addClass('hide');
                        jQuery('.recordData2').html(groupLabel);
                        //jQuery('#addProfile').addClass('hide');
                        jQuery('.manualtransfer').addClass('hide');

                        jQuery('.personalInfo').addClass('hide');
                        jQuery('.mobile_number').addClass('hide');
                        jQuery('#phone').val(groupid);
                        jQuery('.loadHistoryButton').addClass('hide');
                        jQuery('.gropMembers').removeClass('hide');
                        jQuery('.countGroupMember').html(groupMember);
                        jQuery('.countGroupMemberDownload').html("<a href='/modules/CTWhatsApp/Exportcon.php?groupMember=1&groupid="+groupid+"&currentUserID="+currentUserID+"'><i class='fa fa-download' aria-hidden='true' title="+app.vtranslate('LBL_DOWNLOAD_AS_CSV')+"></i></a>");

                        if(sendMessageInGroup == 1){
                            jQuery('.sendDiv').addClass('hide');
                            jQuery('.adminSendMessage').removeClass('hide');
                        }else{
                            jQuery('.sendDiv').removeClass('hide');
                            jQuery('.adminSendMessage').addClass('hide');
                        }
                        $('#dd').addClass('hide');
                        jQuery('.groupMemberList').removeClass('hide');
                        jQuery('.groupMemberList').html(groupMembersHTML);

                        jQuery('.groupDetailBlock').removeClass('hide');
                        jQuery('.moduleDetailBlock').addClass('hide');
                    }else{
                        $('#dd').removeClass('hide');
                        jQuery('.sendDiv').removeClass('hide');
                        jQuery('.adminSendMessage').addClass('hide');
                        jQuery('.personalInfo').removeClass('hide');
                        jQuery('.mobile_number').removeClass('hide');
                        jQuery('#phone').val(phone);
                        jQuery('.recordData2').html(label);
                        jQuery('.groupDetailBlock').addClass('hide');
                        if(moduleIsEnable == 1){
                            jQuery('.moduleDetailBlock').addClass('hide');
                        }else{
                            jQuery('.moduleDetailBlock').removeClass('hide');
                        }
                        //jQuery('#addProfile').removeClass('hide');
                        jQuery('.manualtransfer').removeClass('hide');
                        jQuery('.mobile_number').html(phone);
                        jQuery('.loadHistoryButton').removeClass('hide');
                        jQuery('.gropMembers').addClass('hide');
                        jQuery('.countGroupMember').text('');
                        jQuery('.groupMemberList').addClass('hide');
                    }

                    if(manualtransfer == '1'){
                        jQuery('.manualtransfer').find('.manualtransferValue').val(1);
                        jQuery('.manualtransfer').find('img').attr('src', 'layouts/v7/modules/CTWhatsApp/image/wa_chatboatfill.png');
                        var message = app.vtranslate('Click on this will set automatic conversation from Bot');
                        jQuery('.manualtransfer').find('img').attr('title', message);
                    }else{
                        jQuery('.manualtransfer').find('.manualtransferValue').val(0);
                        jQuery('.manualtransfer').find('img').attr('src', 'layouts/v7/modules/CTWhatsApp/image/wa_chatboat.jpg');
                        var message = app.vtranslate('Click on this will stop automatic conversation from Bot');
                        jQuery('.manualtransfer').find('img').attr('title', message);
                    }

                    jQuery('.recordData3').html(whatsappMessages);
                    jQuery('.personalInfo').html(keyFieldsHTML);
                    jQuery('.recordData8').html(totalSent);
                    jQuery('.recordData9').html(totalReceived);

                    if(modCommentsEnable == 0){
                        jQuery('.commentSection').addClass('hide');
                    }else{
                        if(commentModule == 1){ 
                            jQuery('.recordData10').html(recentComments);
                        }else{
                            jQuery('.commentSection').addClass('hide');
                        }
                    }
                    if(relatedModuleHTML){
                        jQuery('.relatedModules').html(relatedModuleHTML);
                    }else{
                        jQuery('.relatedModules').html('<b style="font-size: 13px;">'+app.vtranslate('JS_NORELATEDMODULE')+'<a href="index.php?module=CTWhatsApp&parent=Settings&view=WhatsAppUserList" style="color: blue;">'+app.vtranslate('JS_CLICKHERE')+'</a>'+app.vtranslate('JS_NORELATEDMODULE1')+'</b>');
                    }

                    jQuery('.chatDiv').animate({scrollTop: jQuery('.chatDiv')[0].scrollHeight}, 0);
                }
            );
            
        });
    },

    registerEventForCreateRecord : function(){
        var thisInstance = this;
        jQuery('body').on('click', '.quickCreateModule, .quickCreateTaskModule', function(e) {
            var quickCreateElem = jQuery(e.currentTarget);
            var phone = jQuery('#phone').val();
            var moduleRecordid = jQuery('#module_recordid').val();
            var whatsappModule = jQuery('#whatsappModule').val();
            var quickCreateUrl = quickCreateElem.data('url');
            var quickCreateModuleName = quickCreateElem.data('name');
            var whatsappid = quickCreateElem.data('whatsappid');
            var task = quickCreateElem.data('task');
            if (typeof params === 'undefined') {
                params = {};
            }
            if (typeof params.callbackFunction === 'undefined') {
                params.callbackFunction = function(data, err) {
                    //fix for Refresh list view after Quick create
                    var parentModule=app.getModuleName();
                    var viewname=app.view();
                    if((quickCreateModuleName == parentModule) && (viewname=="List")){
                            var listinstance = app.controller();
                            listinstance.loadListViewRecords(); 
                    }
                };
            }
            app.helper.showProgress();
            
            thisInstance.getQuickCreateForm(quickCreateUrl,quickCreateModuleName,params).then(function(data){
                app.helper.hideProgress();
                var callbackparams = {
                    'cb' : function (container){
                        thisInstance.registerPostReferenceEvent(container);
                        app.event.trigger('post.QuickCreateForm.show',form);
                        app.helper.registerLeavePageWithoutSubmit(form);
                        app.helper.registerModalDismissWithoutSubmit(form);
                    },
                    backdrop : 'static',
                    keyboard : false
                    }

                app.helper.showModal(data, callbackparams);
                var form = jQuery('form[name="QuickCreate"]');
                var moduleName = form.find('[name="module"]').val();
                app.helper.showVerticalScroll(jQuery('form[name="QuickCreate"] .modal-body'), {'autoHideScrollbar': true});

                var targetInstance = thisInstance;
                var moduleInstance = Vtiger_Edit_Js.getInstanceByModuleName(moduleName);
                if(typeof(moduleInstance.quickCreateSave) === 'function'){
                    targetInstance = moduleInstance;
                    targetInstance.registerBasicEvents(form);
                }

                vtUtils.applyFieldElementsView(form);

                if(whatsappid){
                    thisInstance.quickCreateSave(form,params,moduleRecordid, phone, task, whatsappid);
                    return false;
                }

                if(moduleRecordid == ''){
                    thisInstance.quickCreateSave(form,params,moduleRecordid, phone, task, whatsappid);
                }else{
                    targetInstance.quickCreateSave(form,params);
                }
            });
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

    /**
     * Register Quick Create Save Event
     * @param {type} form
     * @returns {undefined}
     */
    quickCreateSave : function(form,invokeParams,moduleRecordid, phone, task, whatsappid){
        var thisInstance = this;
        var params = {
            submitHandler: function(form) {
                // to Prevent submit if already submitted
                jQuery("button[name='saveButton']").attr("disabled","disabled");
                if(this.numberOfInvalids() > 0) {
                    return false;
                }
                var formData = jQuery(form).serialize();
                app.request.post({data:formData}).then(function(err,data){
                    app.helper.hideProgress();
                    if(err === null) {
                        jQuery('.vt-notification').remove();
                        app.event.trigger("post.QuickCreateForm.save",data,jQuery(form).serializeFormData());
                        app.helper.hideModal();
                        var message = typeof formData.record !== 'undefined' ? app.vtranslate('JS_RECORD_UPDATED'):app.vtranslate('JS_RECORD_CREATED');
                        app.helper.showSuccessNotification({"message":message},{delay:4000});
                        invokeParams.callbackFunction(data, err);
                        //To unregister onbefore unload event registered for quickcreate
                        window.onbeforeunload = null;
                    }else{
                        app.event.trigger('post.save.failed', err);
                        jQuery("button[name='saveButton']").removeAttr('disabled');
                    }
                    if(moduleRecordid == ''){
                        if(data == undefined){
                            var message = 'Duplicate(s) detected!';
                            app.helper.showErrorNotification({"message":message});
                            jQuery("button[name='saveButton']").removeAttr('disabled');
                            return false;
                        }
                        if(data._recordId){
                            var params = {
                                'module' : 'CTWhatsApp',
                                'view' : "WhatsappChat",
                                'mode' : "updateMessageWithRecordID",
                                'task' : task,
                                'phone' : phone,
                                'whatsappid' : whatsappid,
                                'recordId' : data._recordId
                            }
                            app.helper.showProgress();
                            AppConnector.request(params).then(
                                function(data) {
                                    app.helper.hideProgress();
                                    var whatsappmodule = jQuery('#whatsappModule').val();
                                    if(whatsappmodule){
                                        thisInstance.registerEventForGetWhatsappModuleData(whatsappmodule);
                                    }
                                }
                            );
                        }
                    }

                    if(task == 'yes'){
                        if(data._recordId){
                            var params = {
                                'module' : 'CTWhatsApp',
                                'view' : "WhatsappChat",
                                'mode' : "updateMessageWithRecordID",
                                'task' : task,
                                'phone' : phone,
                                'whatsappid' : whatsappid,
                                'recordId' : data._recordId
                            }
                            app.helper.showProgress();
                            AppConnector.request(params).then(
                                function(data) {
                                    app.helper.hideProgress();
                                    var whatsappmodule = jQuery('#whatsappModule').val();
                                    if(whatsappmodule){
                                        thisInstance.registerEventForGetWhatsappModuleData(whatsappmodule);
                                    }
                                }
                            );
                        }
                    }

                });
            },
            validationMeta: quickcreate_uimeta
        };
        form.vtValidate(params);
    },

    registerPostReferenceEvent : function(container) {
        var thisInstance = this;

        container.find('.sourceField').on(Vtiger_Edit_Js.postReferenceSelectionEvent,function(e,result){
            var dataList = result.data;
            var element = jQuery(e.currentTarget);

            if(typeof element.data('autofill') != 'undefined') {
                thisInstance.autoFillElement = element;
                if(typeof(dataList.id) == 'undefined'){
                    thisInstance.postRefrenceComplete(dataList, container);
                }else {
                    thisInstance.postRefrenceSearch(dataList, container);
                }
            }
        });
    },

    /**
     * Function to get Quick Create Form
     * @param {type} url
     * @param {type} moduleName
     * @returns {unresolved}
     */
    getQuickCreateForm: function(url, moduleName, params) {
        var aDeferred = jQuery.Deferred();
        var requestParams = app.convertUrlToDataParams(url);
        jQuery.extend(requestParams, params.data);
        app.request.post({data:requestParams}).then(function(err,data) {
            aDeferred.resolve(data);
        });
        return aDeferred.promise();
    },

    //Function for Important Message
    registerEventForImportantMessage : function(){
        jQuery('.importantMessages').live('click', function (e) {
            var element = jQuery(e.currentTarget);
            var recordId = jQuery('#module_recordid').val();
            if(recordId == ''){
                recordId = jQuery('#phone').val();
            }
            var messagesImportant = jQuery(this).children().val();
            var params = {
                'module' : 'CTWhatsApp',
                'view' : "WhatsappChat",
                'mode' : "importantMessage",
                'recordId' : recordId,
                'messagesImportant' : messagesImportant
            }
            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                    app.helper.hideProgress();
                    element.find('img').attr('src', '');
                    console.log(messagesImportant);
                    if(messagesImportant == 1){
                        jQuery('#messagesImportant').val(0);
                        element.find('img').attr('src', 'layouts/v7/modules/CTWhatsApp/image/favorites.png');
                        app.helper.showSuccessNotification({title: 'Success', message: app.vtranslate('JS_UNIMPORTANT')});
                    }else{
                        jQuery('#messagesImportant').val(1);
                        element.find('img').attr('src', 'layouts/v7/modules/CTWhatsApp/image/favorites-added.png');
                        app.helper.showSuccessNotification({title: 'Success', message: app.vtranslate('JS_IMPORTANT')});
                    }
                }
            );
        });
    },
    //Function for Important Message

    //Function for Get Unread Message on Chat
    /*registerEventForGetUnreadMessage : function(){
        var recordId = jQuery('#module_recordid').val();

        if(recordId == ''){
            recordId = jQuery('#phone').val();
        }
        var lastMessageID = jQuery('.chatDiv div.bubble:last').data('whatsappid');
        if(recordId != ''){
            var params = {
                'module' : 'CTWhatsApp',
                'view' : "WhatsappChat",
                'mode' : "getNewUnreadMessages",
                'recordId' : recordId,
                'lastMessageID' : lastMessageID
            }
            AppConnector.request(params).then(
                function(data) {
                    if(data.result['rows'] != 0){
                        jQuery('.chatDiv').append(data.result['whatsappMessageHTML']);
                        jQuery('.chatDiv').animate({scrollTop: jQuery('.chatDiv')[0].scrollHeight}, 0);
                    }
                }
            );
        }
    },*/
    //Function for Get Unread Message on Chat

    //Function for Search Record
    registerEventForSearchRecord : function(){
        var thisInstance = this;
        jQuery('[name="search"]').live("keyup", function() {
            var value = jQuery(this).val();
            jQuery('#whstappContactSerach').val(value);
            var sourceModule = jQuery('#whatsappModule').val();
            if(sourceModule == 'Groups'){
                var value = jQuery(this).val().toLowerCase();
                jQuery(".smallListing .showChatMessages").filter(function() {
                    jQuery(this).toggle(jQuery(this).text().toLowerCase().indexOf(value) > -1)
                });
            }else{
                if(value.length == 0){
                    thisInstance.registerEventForGetWhatsappModuleData(sourceModule);
                }
                if(value.length >= 3){
                    var start = jQuery('#start').val();
                    var params = {
                        'module' : 'CTWhatsApp',
                        'view' : "WhatsappChat",
                        'mode' : "getSearchRecord",
                        'whatsappmodule' : sourceModule,
                        'searchValue' : value,
                        'start' : start
                    }
                    AppConnector.request(params).then(
                        function(data) {
                            jQuery('.smallListing').html();
                            if(data.result['allMessageshtml'] == ''){
                                var noRecords = '<div class="conversationDiv">' +
                                                '    <div class="noRecords" style="margin-left: 108px;margin-top: 12px;">' +
                                                '        <img src="layouts/v7/modules/CTWhatsApp/image/noRecords.png" style="width: 36px;margin-left: 20px;"/><br>' +
                                                '        <span>'+app.vtranslate('JS_NORECORDFOUND')+'</span>' +
                                                '    </div>' +
                                                '</div>';
                                jQuery('.smallListing').html(noRecords);
                            }else{
                                jQuery('.smallListing').html(data.result['allMessageshtml']);
                            }
                        }
                    );
                }
            }
        });
    },
    //Function for Search Record

    //Function for Add new Comment
    registerEventForAddNewComment : function(){
        var thisInstance = this;
        jQuery('#saveComment').live("click", function() {
            var commentDescription = jQuery('#commentText').val();
            var commentText = commentDescription.trim();
            if(commentText == ''){
                app.helper.showErrorNotification({title: 'Error', message: app.vtranslate('LBL_COMMENTENTER')});
                return false;
            }
            var recordId = jQuery('#module_recordid').val();
            if(commentText != ''){
                var params = {
                    'module' : 'CTWhatsApp',
                    'view' : "WhatsappChat",
                    'mode' : "saveComments",
                    'commentText' : commentText,
                    'recordId' : recordId
                }
                app.helper.showProgress();
                AppConnector.request(params).then(
                    function(data) {
                        app.helper.hideProgress();
                        jQuery('#commentText').val('');
                        jQuery('.recordData10').html(data.result);
                    }
                );
            }
        });
    },
    //Function for Add new Comment

    //Function for Scan QR Code Non Admin User
    registerEventForScanQrCodeNonAdmminUSer : function(){
        var thisInstance = this;
        jQuery('.scanQRCode').on("click", function() {
            var params = {
                'module' : 'CTWhatsApp',
                'view' : "WhatsappChat",
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
        
        setInterval(function(){
            var authtokenkey = jQuery('#authtokenkey').val();
            if(authtokenkey){
                var params = {
                    'module' : 'CTWhatsApp',
                    'view' : "DashBoard",
                    'mode' : "getWhatsappStatus"
                }
                AppConnector.request(params).then(
                    function(data) {
                    if(data.result['whatsappStatus'] == 1){
                        $('.whatsappStatusBlock').removeClass('hide');
                        $('.whatsappQRCodeBlock').addClass('hide');
                        $('.errorDiv').addClass('hide');
                        $('.mobilenumber').text(data.result['whatsappNo']);
                        $('#whatsappConnect').val(1);
                    }else{
                        $('.whatsappStatusBlock').addClass('hide');
                        $('#whatsappConnect').val(0);
                    }
                });
            }
        }, 5000);
    },
    //Function for Scan QR Code Non Admin User

    //Function for get Whatsapp Template
    registerEventForGetWPTemplates : function(){
        var thisInstance = this;
        jQuery('#sendTemplates').live("click", function() {
            $('#hamburger').toggleClass('show');
            $('#overlay').toggleClass('show');
            $('.popup-contact').toggleClass('show');
            var WhatsappNumber = jQuery('#WhatsappNumber').val();
            // console.log(WhatsappNumber);
            var params = {
                'module' : 'CTWhatsApp',
                'view' : "WhatsappChat",
                'mode' : "getWhatsappTemplates",
                'WhatsappNumber' : WhatsappNumber
            }
            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                    app.helper.hideProgress();
                    app.showModalWindow(data, function(data){
                        jQuery('#saveTemplates').on("click", function() {
                            var wptemplatesid = jQuery('#wptemplatesid').val();
                            var moduleRecordid = jQuery('#module_recordid').val();
                            if(wptemplatesid == ''){
                                app.helper.showErrorNotification({title: 'Error', message: app.vtranslate('JS_SELECT_TEMPLATES')});
                                return false;
                            }
                            jQuery('#wptemplateid').val(wptemplatesid);
                            var params = {
                                'module' : 'CTWhatsApp',
                                'view' : "WhatsappChat",
                                'mode' : "getWhatsappTemplatesData",
                                'wptemplatesid' : wptemplatesid,
                                'moduleRecordid' : moduleRecordid
                            }
                            AppConnector.request(params).then(
                                function(data) {
                                    app.helper.hideModal();
                                    var escapeEl = document.createElement('textarea');
                                    escapeEl.innerHTML = data.result;
                                    var newtag = thisInstance.replaceBody(escapeEl.innerHTML);
                                    newMessage = newtag.replace(/[<]br[^>]*[>]/gi,""); 
                                    jQuery('.write_msg').val(newMessage);
                                    jQuery('#writemsg').val(newMessage);
                                }
                            );
                        });
                    });
                }
            );
        });

        jQuery('.selectWhatsAppTemplates').on("click", function(e) {
            var currentTarget = jQuery(e.currentTarget);
            var wptemplatesid = currentTarget.attr('data-whatsAppTemplatesid');
            var moduleRecordid = jQuery('#module_recordid').val();
            if(wptemplatesid == ''){
                app.helper.showErrorNotification({title: 'Error', message: app.vtranslate('JS_SELECT_TEMPLATES')});
                return false;
            }
            jQuery('#wptemplateid').val(wptemplatesid);
            var params = {
                'module' : 'CTWhatsApp',
                'view' : "WhatsappChat",
                'mode' : "getWhatsappTemplatesData",
                'wptemplatesid' : wptemplatesid,
                'moduleRecordid' : moduleRecordid
            }
            AppConnector.request(params).then(
                function(data) {
                    app.helper.hideModal();
                    var escapeEl = document.createElement('textarea');
                    escapeEl.innerHTML = data.result;
                    var newtag = thisInstance.replaceBody(escapeEl.innerHTML);
                    newMessage = newtag.replace(/[<]br[^>]*[>]/gi,""); 
                    jQuery('#writemsg').val(newMessage);
                }
            );
        });
    },

    replaceBody : function(str, is_xhtml){
        if (typeof str === 'undefined' || str === null) {
        return '';
        }
        var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
    },
    //Function for get Whatsapp Template

    //Function for get Whatsapp History
    registerEventForGetContactLoadHostory : function(){
        var thisInstance = this;
        jQuery('.loadHistoryButton').on("click", function(e) {
            var WhatsappNumber = jQuery('#WhatsappNumber').val();

            var params = {
                'module' : 'CTWhatsApp',
                'view' : "WhatsappChat",
                'mode' : "getContactLoadHistory",
                'whatsappNumber' : WhatsappNumber
            }
            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                    app.helper.hideProgress();
                    app.showModalWindow(data, function(data){
                        jQuery('#saveLoadHistory').on("click", function() {
                            
                            var phone = jQuery('#phone').val();
                            var pastMessageNumber = jQuery('#pastMessageNumber').val();
                            var module_recordid = jQuery('#module_recordid').val();
                            var params = {
                                'module' : 'CTWhatsApp',
                                'view' : "WhatsappChat",
                                'mode' : "saveContactLoadHistory",
                                'phone' : phone,
                                'module_recordid' : module_recordid,
                                'whatsappNumber' : WhatsappNumber,
                                'pastMessageNumber' : pastMessageNumber
                            }
                            app.helper.showProgress();
                            AppConnector.request(params).then(
                                function(data) {
                                    app.helper.hideProgress();
                                    app.helper.hideModal();
                                    setTimeout(function() {
                                        thisInstance.reloadChatMessage();
                                    }, 2000);
                                }
                            );
                        });
                    });
                }
            );
        });

        jQuery('.loadAllHistoryButton').on("click", function(e) {
            var params = {
                'module' : 'CTWhatsApp',
                'view' : "WhatsappChat",
                'mode' : "getAllContactLoadHistory"
            }
            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                    app.helper.hideProgress();
                    app.showModalWindow(data, function(data){
                        jQuery('#saveAllLoadHistory').on("click", function() {
                            var WhatsappNumber = jQuery('#multiWPNumber').val();
                            if(WhatsappNumber == ''){
                                app.helper.showErrorNotification({title: 'Error', message: 'Please select from WhatsApp number'});
                                return false;
                            }
                            var start_date = jQuery('#start_date').val();
                            var end_date = jQuery('#end_date').val();
                            var history_status = jQuery('#history_status').val();
                            var firsttimehistory = jQuery('#firsttimehistory').val();
                            var params = {
                                'module' : 'CTWhatsApp',
                                'view' : "WhatsappChat",
                                'mode' : "saveAllContactLoadHistory",
                                'start_date' : start_date,
                                'end_date' : end_date,
                                'whatsappNumber' : WhatsappNumber,
                                'history_status' : history_status,
                                'firsttimehistory' : firsttimehistory
                            }
                            app.helper.showProgress();
                            AppConnector.request(params).then(
                                function(data) {
                                    app.helper.hideProgress();
                                    app.helper.hideModal();
                                }
                            );
                        });
                    });
                }
            );
        });

        jQuery('#multiWPNumber').live("change", function(e) {
            var multiWPNumber = jQuery('#multiWPNumber').val();

            var params = {
                'module' : 'CTWhatsApp',
                'view' : "WhatsappChat",
                'mode' : "getAllContactLoadHistoryStatus",
                'multiWPNumber' : multiWPNumber
            }
            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                    app.helper.hideProgress();
                    console.log(data.result.status);
                    if(data.result.status == 1){ 
                        jQuery('#history_status').prop('checked', true);
                        jQuery('#history_status').val(1); 
                        jQuery('#start_date').val(data.result.startdate);
                        jQuery('#end_date').val(data.result.enddate);
                        jQuery('#firsttimehistory').val(0);
                    }else{
                        jQuery('#history_status').prop('checked', false);
                        jQuery('#history_status').val(0);
                        jQuery('#start_date').val(data.result.startdate);
                        jQuery('#end_date').val(data.result.enddate);
                        jQuery('#firsttimehistory').val(1);
                    }
                }
            );
        });

        jQuery('#history_status').live("change", function(e) {
            if($("#history_status").prop('checked') == true){
                jQuery('#history_status').val(1);
                jQuery('#history_status').attr('checked', true);
            }else{
                jQuery('#history_status').val(0);
                jQuery('#history_status').attr('checked', false);
            }
        });
    },
    //Function for get Whatsapp History

    reloadChatMessage: function(){
        var recordid = jQuery('#openRecordID').val();
        var whatsappmodule = jQuery('#whatsappModule').val();
        var groupWhatsappNumber = jQuery('#groupWhatsappNumber').val();

        var params = {
            'module' : 'CTWhatsApp',
            'view' : "WhatsappChat",
            'mode' : "getRecordMessageDetails",
            'recordid' : recordid,
            'whatsappmodule' : whatsappmodule,
            'groupWhatsappNumber' : groupWhatsappNumber
        }
        app.helper.showProgress();
        AppConnector.request(params).then(
            function(data) {
                app.helper.hideProgress();

                jQuery('.norRecordData').addClass('hide');
                jQuery('.yesRecordData').removeClass('hide');
                jQuery('.messageBlock').removeClass('hide');

                var recordId = data.result['recordId'];
                var label = data.result['label'];
                var phone = data.result['phone'];
                var profileImage = data.result['profileImage'];
                var imagetag = data.result['imagetag'];
                var whatsappMessages = data.result['whatsappMessages'];
                var keyFieldsHTML = data.result['keyFieldsHTML'];
                var totalSent = data.result['totalSent'];
                var totalReceived = data.result['totalReceived'];
                var recentComments = data.result['recentComments'];
                var relatedModuleHTML = data.result['relatedModuleHTML'];
                var messageImportant = data.result['messageImportant'];
                var setype = data.result['setype'];
                var commentModule = data.result['commentModule'];
                var moduleIsEnable = data.result['moduleIsEnable'];
                var modCommentsEnable = data.result['ModCommentsEnable'];
                var permissionRecord = data.result['permissionRecord'];

                if(imagetag == 1){
                    var image = '<img src="'+profileImage+'" style="width: 50px;"/>';
                }else{
                    var image = '<span style="margin: 7px;font-size: 28px;margin: 2px;color: teal;"><b>'+profileImage+'</b></span>';
                }
                
                if(recordId){
                    jQuery('.importantMessages').removeClass('hide');
                    if(messageImportant == '1'){
                        jQuery('#messagesImportant').val(1);
                        jQuery('.importantMessages').find('img').attr('src', 'layouts/v7/modules/CTWhatsApp/image/favorites-added.png');
                    }else{
                        jQuery('#messagesImportant').val(0);
                        jQuery('.importantMessages').find('img').attr('src', 'layouts/v7/modules/CTWhatsApp/image/favorites.png');
                    }

                    var moduleURL = 'index.php?module='+setype+'&view=Detail&record='+recordId;
                    var moduleURLTag = '<a href="'+moduleURL+'" target="_blank"><i class="fa fa-eye"></i></a>';
                    jQuery('.closeBtn').html(moduleURLTag);
                    if(permissionRecord == 1){
                        jQuery('.editModuleRecord').removeClass('hide');
                    }else{
                        jQuery('.editModuleRecord').addClass('hide');
                    }
                }else{
                    jQuery('.importantMessages').addClass('hide');
                    jQuery('.closeBtn').html('');
                    jQuery('.editModuleRecord').addClass('hide');
                }
                jQuery('#module_recordid').val(recordId);
                if(recordId){
                    jQuery('.commentSection').removeClass('hide');
                }else{
                    jQuery('.commentSection').addClass('hide');
                }
                jQuery('.recordData1').html(image);

                if(whatsappmodule == 'Groups'){
                    jQuery('.recordData2').html(groupLabel);
                    //jQuery('#addProfile').addClass('hide');
                    jQuery('.manualtransfer').addClass('hide');
                    jQuery('.personalInfo').addClass('hide');
                    jQuery('.mobile_number').addClass('hide');
                    jQuery('#phone').val(groupid);

                }else{
                    jQuery('.personalInfo').removeClass('hide');
                    jQuery('.mobile_number').removeClass('hide');
                    jQuery('#phone').val(phone);
                    jQuery('.recordData2').html(label);
                    if(moduleIsEnable == 1){
                        jQuery('.moduleDetailBlock').addClass('hide');
                    }else{
                        jQuery('.moduleDetailBlock').removeClass('hide');
                    }
                    //jQuery('#addProfile').removeClass('hide');
                    jQuery('.manualtransfer').removeClass('hide');
                    jQuery('.mobile_number').html(phone);
                    jQuery('.loadHistoryButton').removeClass('hide');
                }

                jQuery('.recordData3').html(whatsappMessages);
                jQuery('.personalInfo').html(keyFieldsHTML);
                jQuery('.recordData8').html(totalSent);
                jQuery('.recordData9').html(totalReceived);

                if(modCommentsEnable == 0){
                    jQuery('.commentSection').addClass('hide');
                }else{
                    if(commentModule == 1){ 
                        jQuery('.recordData10').html(recentComments);
                    }else{
                        jQuery('.commentSection').addClass('hide');
                    }
                }
                if(relatedModuleHTML){
                    jQuery('.relatedModules').html(relatedModuleHTML);
                }else{
                    jQuery('.relatedModules').html('<b style="font-size: 13px;">'+app.vtranslate('JS_NORELATEDMODULE')+'<a href="index.php?module=CTWhatsApp&parent=Settings&view=WhatsAppUserList" style="color: blue;">'+app.vtranslate('JS_CLICKHERE')+'</a>'+app.vtranslate('JS_NORELATEDMODULE1')+'</b>');
                }

                jQuery('.chatDiv').animate({scrollTop: jQuery('.chatDiv')[0].scrollHeight}, 0);
            }
        );
    },

    registerRelatedRecordEditData: function(){
        var self = this;
        jQuery('.editModuleRecord').on('click', function(e) {
            var moduleRecordid = jQuery('#module_recordid').val();
            var params = {
                'module' : 'CTWhatsApp',
                'view' : "QuickCreateRecord",
                'mode' : "editRecord",
                'moduleRecordid' : moduleRecordid
            }
            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                app.helper.hideProgress();
                app.showModalWindow(data, function(data){
                    jQuery('#saveModuleRecord').on("click", function(e) {
                        var serialize = jQuery('#newrecord').serializeFormData();
                        
                        var params = {
                            'module' : 'CTWhatsApp',
                            'view' : "QuickCreateRecord",
                            'mode' : "saveRecord",
                            'moduleRecordid' : moduleRecordid,
                            'serializedata' : serialize
                        }
                        app.helper.showProgress();
                        AppConnector.request(params).then(
                            function(data) {
                            app.helper.hideProgress();
                            app.helper.hideModal();
                            app.helper.showSuccessNotification({'title': 'Success', 'message': 'Record is save successfully.'});
                            var whatsappmodule =  jQuery('#whatsappModule').val();
                            if(whatsappmodule){
                                self.registerEventForGetWhatsappModuleData(whatsappmodule);
                            }
                        });
                    });
                });
            });
        });
    },

    registerEventsForOpenNewWindowImageFile : function() {
        jQuery('.reply').live("click", function(e) {
            var currentTarget = jQuery(e.currentTarget);
            var imageURL = currentTarget.find('img').attr('src');
            if(imageURL != 'layouts/v7/modules/CTWhatsApp/image/pdficon.png' && imageURL != 'layouts/v7/modules/CTWhatsApp/image/fileicon.png' &&  imageURL != 'layouts/v7/modules/CTWhatsApp/image/wordicon.jpg'){
                if(imageURL.indexOf('images') > -1){
                }else{
                    window.open(imageURL);
                }
            }
        });
        jQuery('.bubble').live("click", function(e) {
            var currentTarget = jQuery(e.currentTarget);
            var imageURL = currentTarget.find('img').attr('src');
            if(imageURL != 'layouts/v7/modules/CTWhatsApp/image/pdficon.png' && imageURL != 'layouts/v7/modules/CTWhatsApp/image/fileicon.png' &&  imageURL != 'layouts/v7/modules/CTWhatsApp/image/wordicon.jpg'){
                if(imageURL.indexOf('images') > -1){
                }else{
                    window.open(imageURL);
                }
            }
        });
    },

    registerEventsForRefreshAllMessages : function() {
        jQuery('#refreshMessages').on("click", function(e) {
            var params = {
                'module' : 'CTWhatsApp',
                'view' : "WhatsappChat",
                'mode' : "refreshAllMessages"
            }
            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                app.helper.hideProgress();
                setTimeout(function() {
                    location.reload();
                }, 2000);
            });
        });
    },

    registerEventsForShowWhatsappGroups : function() {
        jQuery('#groupWhatsappNumber').live("change", function(e) {
            var thisInstance = this;
            var whatsappmodule = jQuery('#whatsappModule').val();
            var groupWhatsappNumber = jQuery('#groupWhatsappNumber').val();
            $('#whatsappNumber').val(groupWhatsappNumber);
            if(groupWhatsappNumber != ''){
                var params = {
                    'module' : 'CTWhatsApp',
                    'view' : "WhatsappChat",
                    'mode' : "getWhatsAppGroup",
                    'whatsappmodule' : whatsappmodule,
                    'groupWhatsappNumber' : groupWhatsappNumber
                }
                app.helper.showProgress();
                AppConnector.request(params).then(
                    function(data) {
                    app.helper.hideProgress();
                    if(whatsappmodule == "Groups"){
                        jQuery('#broadcastgroup').removeClass('hide');
                        jQuery('.listViewNextPageButton').attr('disabled', true);
                    }else{
                        jQuery('#broadcastgroup').addClass('hide');
                    }

                    if(whatsappmodule == "NewMessages"){
                        jQuery('.new_messages').text('');
                        jQuery('.new_messages').removeClass('counterMsg');
                        jQuery('#messageunread').val(0);
                        jQuery('.counterMsgs').addClass('hide');
                    }

                    if(data.result['allMessageshtml'] == ''){
                        jQuery('.smallListing').html();
                        var noRecords = '<div class="conversationDiv">' +
                                        '    <div class="noRecords" style="margin-left: 108px;margin-top: 12px;">' +
                                        '        <img src="layouts/v7/modules/CTWhatsApp/image/noRecords.png" style="width: 36px;margin-left: 20px;"/><br>' +
                                        '        <span>'+app.vtranslate('JS_NORECORDFOUND')+'</span>' +
                                        '    </div>' +
                                        '</div>';
                        jQuery('.smallListing').html(noRecords);

                        jQuery('.norRecordData').removeClass('hide');
                        jQuery('.yesRecordData').addClass('hide');
                        jQuery('.messageBlock').removeClass('hide');
                        jQuery('.proDetailsDiv').addClass('hide');
                    }else{
                        jQuery('.proDetailsDiv').removeClass('hide');
                        jQuery('.conversationDiv').removeClass('hide');
                        
                        jQuery('.smallListing').html();
                        if(whatsappmodule == "Groups"){
                            jQuery('.smallListing').html(data.result['allMessageshtml']);
                        }else{
                            jQuery('.smallListing').html(data.result['allMessageshtml']);
                        }
                        var perPageRecord = jQuery('#perpagerecord').val();
                       

                        jQuery('.messageBlock').addClass('hide');
                        jQuery('.bydefaulOpenChat').trigger('click');
                    }
                    var start = jQuery('#start').val();
                    var totalRecord = jQuery('#'+whatsappmodule+'totalRecord').val();

                    if(totalRecord == 0 || totalRecord == undefined){
                        jQuery('.listViewNextPageButton').attr('disabled', true);
                    }else{
                        if(parseInt(totalRecord) < parseInt(start)){
                            jQuery('.listViewNextPageButton').attr('disabled', true);
                        }else{
                            jQuery('.listViewNextPageButton').attr('disabled', false);
                        }
                    }  
                });
            }
        });
    },

    registerEventForShowTimelineMessage : function(){
        /*jQuery('.showTimelineMessage').live('click', function(){
            jQuery('.new_messages').text('');
            jQuery('.new_messages').removeClass('counterMsg');
            jQuery('.counterMsgs').addClass('hide');
        });*/
    },

    registerEventForUpdateAssignToNumber: function(){
        var self = this;
        jQuery('.quickUpdateModule').live('click', function(e) {
            var currentTarget = jQuery(e.currentTarget);
            var sourceModuleName = currentTarget.attr('data-name');
            var whatsappNumber = jQuery('#openRecordID').val();
            var params = {
                'module' : 'CTWhatsApp',
                'view' : "QuickCreateRecord",
                'mode' : "assignRecordPopup",
                'whatsappNumber' : whatsappNumber,
                'sourceModuleName' : sourceModuleName
            }
            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                app.helper.hideProgress();
                app.showModalWindow(data, function(data){
                });
            });
        });
    },

    registerAutoCompleteFields : function() {
        jQuery('#moduleRecordSearch').live('keyup', function (e) {
            var sourceModule = jQuery('#sourceModule').val();
            var moduleRecordSearch = jQuery('#moduleRecordSearch').val();
            if(moduleRecordSearch.length >= 3){
                $('#suggestionsList').removeClass('hide');
                var params = {
                    'module' : 'CTWhatsApp',
                    'view' : "QuickCreateRecord",
                    'mode' : "searchModuleRecord",
                    'sourceModule' : sourceModule,
                    'moduleRecordSearch' : moduleRecordSearch
                }
                app.helper.showProgress();
                AppConnector.request(params).then(
                    function(data) {
                    app.helper.hideProgress();
                    $('#suggestionsList').html(data.result);                
                });
            }else{
                $('#suggestionsList').addClass('hide');
            }
        });

        jQuery('.selectModuleRecord').live('click', function(e){
            var currentTarget = jQuery(e.currentTarget);
            var moduleId = currentTarget.attr('data-moduleId');
            var moduleLabel = currentTarget.attr('data-moduleLabel');
            $('#moduleRecordId').val(moduleId);
            $('#moduleRecordSearch').val(moduleLabel);
            $('#moduleRecordLabel').val(moduleLabel);
            $('#suggestionsList').addClass('hide');
        });

        var thisInstance = this;
        jQuery('#saveAssignRecord').live("click", function(e) {
            var moduleRecordLabel = jQuery('#moduleRecordLabel').val();
            var sourceModule = jQuery('#sourceModule').val();
            var moduleRecordSearch = jQuery('#moduleRecordSearch').val();
            var moduleRecordId = jQuery('#moduleRecordId').val();
            var phonenumber = jQuery('#phonenumber').val();
            var params = {
                'module' : 'CTWhatsApp',
                'view' : "QuickCreateRecord",
                'mode' : "saveAssignRecord",
                'sourceModule' : sourceModule,
                'moduleRecordId' : moduleRecordId,
                'phonenumber' : phonenumber,
                'moduleRecordSearch' : moduleRecordSearch
            }
            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                app.helper.hideProgress();
                app.helper.hideModal();
                app.helper.showSuccessNotification({'title': 'Success', 'message': 'All WhatsApp record assign to select record.'});
                setTimeout(function() {
                    //location.reload();
                    jQuery('.nav-link').removeClass('active');
                    jQuery('.allMessagesModule .nav-link').addClass('active');
                    jQuery('#whatsappModule').val('AllMessages');
                    thisInstance.registerEventForGetWhatsappModuleData('AllMessages');
                    jQuery('.searchBox').val(moduleRecordLabel);
                    jQuery('[name="search"]').trigger('keyup');
                }, 2000);
            });
        });
    },

    registerEventForConvertToBot : function(){
        jQuery('.manualtransfer').live('click', function(){
            var phonenumber = jQuery('#phone').val();
            var params = {
                'module' : 'CTWhatsApp',
                'view' : "WhatsappBot",
                'mode' : "convertToBot",
                'phonenumber' : phonenumber
            }
            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                app.helper.hideProgress();
                if(data.result['manualtransferStatus'] == 1){
                    jQuery('.manualtransfer').find('.manualtransferValue').val(1);
                    jQuery('.manualtransfer').find('img').attr('src', 'layouts/v7/modules/CTWhatsApp/image/wa_chatboatfill.png');
                    var message = app.vtranslate('Click on this will set automatic conversation from Bot');
                    jQuery('.manualtransfer').find('img').attr('title', message);
                    var messagedata = app.vtranslate('Convert chat to Manual mode');
                    app.helper.showSuccessNotification({'title': 'Success', 'message': messagedata});
                }else{
                    jQuery('.manualtransfer').find('.manualtransferValue').val(0);
                    jQuery('.manualtransfer').find('img').attr('src', 'layouts/v7/modules/CTWhatsApp/image/wa_chatboat.jpg');
                    var message = app.vtranslate('Click on this will stop automatic conversation from Bot');
                    jQuery('.manualtransfer').find('img').attr('title', message);
                    var messagedata = app.vtranslate('Convert chat to Robotic mode');
                    app.helper.showSuccessNotification({'title': 'Success', 'message': messagedata});
                }
            });
        });
    },

    registerEventForLoadMessages : function(){
        $('.chatDiv').live('DOMMouseScroll', function(e){
            if(e.originalEvent.detail < 0) {
                var whatsappModule = jQuery('#whatsappModule').val();
                //if(whatsappModule == 'Groups'){
                    var groupid = jQuery('#phone').val();
                    var loadGroupMessageNumber = jQuery('#loadGroupMessageNumber').val();
                    var moduleRecordid = jQuery('#module_recordid').val();
                    if(groupid){
                        var params = {
                            'module' : 'CTWhatsApp',
                            'view' : "WhatsappChat",
                            'mode' : "getWhatsAppGroupMessages",
                            'groupid' : groupid,
                            'loadGroupMessageNumber' : loadGroupMessageNumber,
                            'whatsappModule' : whatsappModule,
                            'moduleRecordid' : moduleRecordid
                        }
                  
                        AppConnector.request(params).then(
                            function(data) {
                           
                            if(data.result['rows'] != 0){
                                jQuery('#loadGroupMessageNumber').val(data.result["nextLoadMessage"]);
                                var existHTML = $('.chatDiv').html();
                                $('.chatDiv').html('');
                                $('.chatDiv').html(data.result["whatsappMessageHTML"] + existHTML);
                            }
                        });
                    }
                //}
            }
        });
    },

    registerEventForDateValidation : function(){
        jQuery('#end_date').live('change', function(){
            var multiWPNumber = jQuery('#multiWPNumber').val();
            if(multiWPNumber != ''){
                var end_date = jQuery('#end_date').val();
                var start_date = jQuery('#start_date').val();
                var currendate = (new Date()).toISOString().split('T')[0];
                if(end_date > currendate){
                    app.helper.showErrorNotification({'title': 'Error', 'message': 'Please Select Current Date or Past Date'});
                    jQuery('#end_date').val('');
                }else if(start_date > end_date){
                    app.helper.showErrorNotification({'title': 'Error', 'message': 'End Date Cannot Be Greater Than Start Date'});
                    jQuery('#end_date').val('');
                }
            }
        });
        
        jQuery('#start_date').live('change', function(){
            var multiWPNumber = jQuery('#multiWPNumber').val();
            if(multiWPNumber != ''){
                var start_date = jQuery('#start_date').val();
                var end_date = jQuery('#end_date').val();
                if(end_date != ''){
                    var currendate = (new Date()).toISOString().split('T')[0];
                    if(start_date > currendate){
                        app.helper.showErrorNotification({'title': 'Error', 'message': 'Please Select Current Date or Past Date'});
                        jQuery('#start_date').val('');
                    }else if(start_date > end_date){
                        app.helper.showErrorNotification({'title': 'Error', 'message': 'End Date Cannot Be Greater Than Start Date'});
                        jQuery('#start_date').val('');
                    }
                }
            }
        });
    },

    registerEventForAddAddRecordGroupNumber : function(){
        $('.addGroupNumber').on('click', function(e){
            var groupid = jQuery('#phone').val();
            var params = {
                'module' : 'CTWhatsApp',
                'view' : "WhatsappChat",
                'mode' : "addGroupNumberInCRMPopup"
            }

            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                    app.helper.hideProgress();
                    app.showModalWindow(data, function(data){
                        $('#saveGroupNumber').on('click', function(e){
                            var sourceModule = jQuery('#sourceModule').val();
                            var copyNameTo = jQuery('#copyNameTo').val();
                            var whatsappNumberTo = jQuery('#whatsappNumberTo').val();
                            var params = {
                                'module' : 'CTWhatsApp',
                                'view' : "WhatsappChat",
                                'mode' : "addGroupNumberInCRM",
                                'groupid' : groupid,
                                'sourceModule' : sourceModule,
                                'copyNameTo' : copyNameTo,
                                'whatsappNumberTo' : whatsappNumberTo
                            }

                            app.helper.showProgress();
                            AppConnector.request(params).then(
                                function(data) {
                                    app.helper.hideProgress();
                                    app.helper.showSuccessNotification({title: 'Success', message: app.vtranslate('GROUPCONTACTS_SAVE_IN_CRM')});
                                    app.helper.hideModal();
                                }
                            );          
                        });
                    });
                }
            );
        });

        jQuery('#sourceModule').live('change', function(){
            var sourceModule = jQuery('#sourceModule').val();
            var params = {
                'module' : 'CTWhatsApp',
                'view' : "WhatsappChat",
                'mode' : "getSourceModuleField",
                'sourceModule' : sourceModule 
            }

            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                    app.helper.hideProgress();
                    jQuery('#copyNameTo').html(data.result['nameFieldsData']);
                    jQuery('#whatsappNumberTo').html(data.result['phoneFieldsData']);
                }
            );
        });
    },

    registerEventForGetNewGroups : function(){
        var thisInstance = this;
        $('.loadNewGroups').live('click', function(e){
            var groupWhatsappNumber = jQuery('#groupWhatsappNumber').val();
            var params = {
                'module' : 'CTWhatsApp',
                'view' : "WhatsappChat",
                'mode' : "getNewLoadWhatsAppGroup",
                'groupWhatsappNumber' : groupWhatsappNumber
            }

            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                    app.helper.hideProgress();
                    setTimeout(function(){
                        var whatsappModule = jQuery('#whatsappModule').val();
                        thisInstance.registerEventForGetWhatsappModuleData(whatsappModule);
                    }, 5000);
                }
            );
        });
    },

    registerEventForGetNewGroupMembers : function(){
        var thisInstance = this;
        $('.loadGroupMembers').live('click', function(e){
            var groupId = jQuery('#phone').val();
            var groupWhatsappNumber = jQuery('#groupWhatsappNumber').val();

            var params = {
                'module' : 'CTWhatsApp',
                'view' : "WhatsappChat",
                'mode' : "getWhatsAppGroupMembers",
                'groupId' : groupId,
                'groupWhatsappNumber' : groupWhatsappNumber
            }

            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                    app.helper.hideProgress();
                    setTimeout(function(){
                        var whatsappModule = jQuery('#whatsappModule').val();
                        thisInstance.registerEventForGetWhatsappModuleData(whatsappModule);
                    }, 5000);
                }
            );
        });
    },

    /**
     * Registered the events for this page
     */
    registerEvents : function() {
        var thisInstance = this;
        this.registerAppTriggerEvent();
        this.registerEventForSetWhatsappModule();
        this.registerEventForOtherModule();
        this.registerCheckBoxClickEvent();
        this.registerMainCheckBoxClickEvent();
        this.registerEventForNext();
        this.registerEventForShowChatMessages();
        this.registerEventForCreateRecord();
        this.registerEventForImportantMessage();
        this.registerEventForSearchRecord();
        this.registerEventForAddNewComment();
        this.registerEventForScanQrCodeNonAdmminUSer();
        this.registerEventForGetWPTemplates();
        this.registerEventForGetContactLoadHostory();
        this.registerRelatedRecordEditData();
        this.registerEventsForOpenNewWindowImageFile();
        this.registerEventsForRefreshAllMessages();
        this.registerPostQuickCreateEvent();
        this.registerEventsForShowWhatsappGroups();
        this.registerEventForShowTimelineMessage();
        this.registerEventForUpdateAssignToNumber();
        this.registerAutoCompleteFields();
        this.registerEventForConvertToBot();
        this.registerEventForLoadMessages();
        this.registerEventForDateValidation();
        this.registerEventForAddAddRecordGroupNumber();
        this.registerEventForGetNewGroups();
        this.registerEventForGetNewGroupMembers();

        jQuery('#dropdownMenuButton').live('click', function(e){
            setTimeout(function() {
                var currentTarget = jQuery(e.currentTarget);
                currentTarget.closest('div').parent('div').removeClass('open');
            }, 500);
        });
    }    
});

jQuery(document).ready(function(){
    var thisInstance = new CTWhatsApp_CTWhatsaApp_Js();
    thisInstance.registerEvents();
    setTimeout(function() {
        jQuery('.allMessagesModule').on('click', function(e) {
            var currentTarget = jQuery(e.currentTarget);
            var whatsappmodule = currentTarget.attr('data-selectModule');

            var currenOpenModule = jQuery('#whatsappModule').val();
            jQuery('#'+currenOpenModule+'Msg').addClass("hide");

            jQuery('#whatsappModule').val(whatsappmodule);
            if(whatsappmodule){
                thisInstance.registerEventForGetWhatsappModuleData(whatsappmodule);
            }
        });
        jQuery('.allMessagesModule').trigger('click');
    }, 100);

    var params = {
        'module' : 'CTWhatsApp',
        'view' : "WhatsappChat",
        'mode' : "getWhatsappIcon",
        'sourceModule' : app.getModuleName()
    }
    AppConnector.request(params).then(
        function(data) {
            if(data.result['iconactive'] == 1 ){
                if(data.result['whatsappicon'] != 0 ){
                    if(data.result['unread_count'] != 0){
                        var unreadcount = '<span class="counterMsgs" style="background: #e21c1c;color: #fff;font-size: 10px;border-radius: 50px;padding: 3px 7px;position: relative;top: -10px;left: -10px;">'+data.result['unread_count']+'</span>';
                    }else{
                        var unreadcount = '<span class="counterMsgs hide" style="background: #e21c1c;color: #fff;font-size: 10px;border-radius: 50px;padding: 3px 7px;position: relative;top: -10px;left: -10px;"></span>';
                    }

                    if(data.result['isAdmin'] == 'on'){
                        var settingIcon = '<a class="" title="WhatsApp Settings" href="index.php?module=CTWhatsApp&parent=Settings&view=WhatsAppUserList" style="display: inline-block;clear: none !important;float: left !important;padding: 0 4px;width: auto !important;padding: 0 4px;background: transparent !important;"><img src="layouts/v7/modules/CTWhatsApp/image/settings_green.png" class="" style="width: 20px;height: 20px;cursor: pointer;"/></a>';
                    }else{
                        var settingIcon = '';
                    }

                    if(data.result['whatsappStatus'] == '0' || data.result['whatsappStatus'] == '2'){
                        var whatsAppIcon = 'layouts/v7/modules/CTWhatsApp/image/wa-red-icon.png';
                    }else{
                        var whatsAppIcon = 'layouts/v7/modules/CTWhatsApp/image/whatsapp.png';
                    }

                    if(data.result['themeView'] == 'RTL'){
                        var style = '';
                    }else{
                        var style = 'float: left !important;';
                    }
                    if(data.result['whatsappUserBeep'] == '0'){
                        var usrBeep = '<span id="user_beepoff" title="Click to on/off notification sound" class="" style="display: inline-block;clear: none !important;'+style+'width: auto !important;padding: 0 4px;background: transparent !important;"><img src="layouts/v7/modules/CTWhatsApp/image/beepoff.png" style="width: 20px;height: 20px;cursor: pointer;"/></span>';
                    }else{
                        var usrBeep = '<span id="user_beepon" title="Click to on/off notification sound" class="" style="display: inline-block;clear: none !important;'+style+'width: auto !important;padding: 0 4px;background: transparent !important;"><img src="layouts/v7/modules/CTWhatsApp/image/beepon.png" style="width: 20px;height: 20px;cursor: pointer;"/></span>';
                    }
                    
                    if(data.result['themeView'] == 'RTL'){
                        var VTPremiumIcon = ['<li class="dropdown">',
                                                '<div style="margin-top: 13px;" class="">',
                                                    '<input type="hidden" name="inappNotification" id="inappNotification" value="'+data.result['inappNotification']+'">',
                                                    '<input type="hidden" name="apiUrlKey" id="apiUrlKey" value="'+data.result['apiUrl']+'">',
                                                    '<input type="hidden" name="messageunread" id="messageunread" value="'+data.result['unread_count']+'">',
                                                    '<a href="#" class="dropdown-toggle showTimelineMessage" data-toggle="dropdown" role="button" aria-expanded="false" style="padding: 0px 10px !important;">',
                                                    '<img  src="'+whatsAppIcon+'" style="height: 25px;border-radius: 0 !important;">',
                                                    ''+unreadcount+'</a>',
                                                    '<ul class="dropdown-menu" id="waNotify" style="width: 300px;">',
                                                        '<li class="boxHead" style="background: #fff;color: #333;padding: 5px 10px;width: 100%;display: inline-block;float: left;border-bottom: 1px solid rgb(44 59 73 / 15%);"> <span style="display: inline-block;float: right;font-size: 14px;font-weight: 700;">Notifications</span><br>',
                                                            '<div class="notifyIcons" style="display: inline-block;float: left;text-align: right !important;margin: -23px 0px 0px 0px;">',

                                                            '<a class="allMessageTab hide" href="index.php?module=CTWhatsApp&view=WhatsappChat&mode=allWhatsAppMSG" style="display: inline-block;clear: none !important;float: right !important;width: auto !important;padding: 0 4px;background: transparent !important;"><img src="layouts/v7/modules/CTWhatsApp/image/listing_green.png" class="" style="width: 20px;height: 20px;cursor: pointer;"/></a>',

                                                            '<a class="DashBoardTab" title="WhatsApp Analytics" href="index.php?module=CTWhatsApp&view=DashBoard&mode=moduleDashBoard&analytics=1" style="display: inline-block;clear: none !important;width: auto !important;width: auto !important;padding: 0 4px;background: transparent !important;"><img src="layouts/v7/modules/CTWhatsApp/image/dashboard_green.png" class="" style="width: 20px;height: 20px;cursor: pointer;"/></a>',

                                                            ''+settingIcon+'',

                                                            '<span id="sendNewNumberMessage" title="Send WhatsApp message" class="" style="display: inline-block;clear: none !important;width: auto !important;padding: 0 4px;background: transparent !important;"><img src="layouts/v7/modules/CTWhatsApp/image/new-chat.png" class="" style="width: 20px;height: 20px;cursor: pointer;"/></span>',

                                                            '<a class="whatsAppBotListview" title="Navigate to Chatbot " href="index.php?module=CTWhatsApp&view=WhatsappBot&mode=WhatsappBotList" style="display: inline-block;clear: none !important;width: auto !important;width: auto !important;padding: 0 4px;background: transparent !important;"><img src="layouts/v7/modules/CTWhatsApp/image/wa_chatboat.jpg" class="" style="width: 20px;height: 20px;cursor: pointer;"/></a>',

                                                            '<span id="readWhatsAppMessage" title="Clear all notification messages" class="" style="display: inline-block;clear: none !important;width: auto !important;padding: 0 4px;background: transparent !important;"><img src="layouts/v7/modules/CTWhatsApp/image/readmessage.png" class="" style="width: 20px;height: 20px;cursor: pointer;"/></span>',

                                                            ''+usrBeep+'',

                                                            '</div></li>',
                                                        ''+data.result['notificationHTML']+'',
                                                        '<li style="width: 100%;display: inline-block;float: left;border-bottom: 1px solid rgb(44 59 73 / 15%);">',
                                                            '<a href="index.php?module=CTWhatsApp&view=WhatsappChat&mode=allWhatsAppMSG" class="center" style="padding: 10px 10px !important;color: #333 !important;float: right;direction: rtl;width: 100%;text-align: center;"><b style="font-size: 14px;margin: 54px; !important;">Show All Notifications<img src="layouts/v7/modules/CTWhatsApp/image/listing_green.png" class="" style="width: 20px;height: 20px;cursor: pointer;margin: 0px 13px 3px 5px;"></b>',
                                                            '</a>',
                                                    '</ul>',

                                                '</div>',
                                            '</li>'].join('');
                    }else{
                        var VTPremiumIcon = ['<li class="dropdown">',
                                                '<div style="margin-top: 13px;" class="">',
                                                    '<input type="hidden" name="inappNotification" id="inappNotification" value="'+data.result['inappNotification']+'">',
                                                    '<input type="hidden" name="apiUrlKey" id="apiUrlKey" value="'+data.result['apiUrl']+'">',
                                                    '<input type="hidden" name="messageunread" id="messageunread" value="'+data.result['unread_count']+'">',
                                                    '<a href="#" class="dropdown-toggle showTimelineMessage" data-toggle="dropdown" role="button" aria-expanded="false" style="padding: 0px 10px !important;">',
                                                    '<img  src="'+whatsAppIcon+'" style="height: 25px;border-radius: 0 !important;">',
                                                    ''+unreadcount+'</a>',
                                                    '<ul class="dropdown-menu" id="waNotify" style="width: 300px;">',
                                                        '<li class="boxHead" style="background: #fff;color: #333;padding: 5px 10px;width: 100%;display: inline-block;float: left;border-bottom: 1px solid rgb(44 59 73 / 15%);"> <span style="display: inline-block;float: left;width: 30%;font-size: 14px; font-weight: 700;">Notifications</span>',
                                                            '<div class="notifyIcons" style="display: inline-block;float: right;text-align: right !important;">',

                                                            ''+usrBeep+'',

                                                            '<span id="readWhatsAppMessage" title="Clear all notification messages" class="" style="display: inline-block;clear: none !important;width: auto !important;padding: 0 4px;background: transparent !important;float: left !important;"><img src="layouts/v7/modules/CTWhatsApp/image/readmessage.png" class="" style="width: 20px;height: 20px;cursor: pointer;"/></span>',

                                                            '<a class="whatsAppBotListview" title="Navigate to Chatbot " href="index.php?module=CTWhatsApp&view=WhatsappBot&mode=WhatsappBotList" style="display: inline-block;clear: none !important;float: left !important;width: auto !important;width: auto !important;padding: 0 4px;background: transparent !important;"><img src="layouts/v7/modules/CTWhatsApp/image/wa_chatboat.jpg" class="" style="width: 20px;height: 20px;cursor: pointer;"/></a>',

                                                            '<span id="sendNewNumberMessage" title="Send WhatsApp message" style="display: inline-block;clear: none !important;float: left !important;width: auto !important;padding: 0 4px;background: transparent !important;"><img src="layouts/v7/modules/CTWhatsApp/image/new-chat.png" class="" style="width: 20px;height: 20px;cursor: pointer;"/></span>',

                                                            '<a class="hide" href="index.php?module=CTWhatsApp&view=WhatsappChat&mode=allWhatsAppMSG" style="display: inline-block;clear: none !important;float: left !important;width: auto !important;padding: 0 4px;background: transparent !important;"><img src="layouts/v7/modules/CTWhatsApp/image/listing_green.png" class="" style="width: 20px;height: 20px;cursor: pointer;"/></a>',

                                                            '<a class="hide" href="index.php?module=CTWhatsApp&view=WhatsappChat&mode=allWhatsAppMSG" style="display: inline-block;clear: none !important;float: left !important;width: auto !important;padding: 0 4px;background: transparent !important;"><img src="layouts/v7/modules/CTWhatsApp/image/listing_green.png" class="" style="width: 20px;height: 20px;cursor: pointer;"/></a>',

                                                            '<a class="DashBoardTab" title="WhatsApp Analytics" href="index.php?module=CTWhatsApp&view=DashBoard&mode=moduleDashBoard&analytics=1" style="display: inline-block;clear: none !important;float: left !important;width: auto !important;width: auto !important;padding: 0 4px;background: transparent !important;"><img src="layouts/v7/modules/CTWhatsApp/image/dashboard_green.png" class="" style="width: 20px;height: 20px;cursor: pointer;"/></a>',

                                                            ''+settingIcon+'</div>',

                                                            '</li>',
                                                        ''+data.result['notificationHTML']+'',
                                                        '<li style="width: 100%;display: inline-block;float: left;border-bottom: 1px solid rgb(44 59 73 / 15%);">',
                                                            '<a href="index.php?module=CTWhatsApp&view=WhatsappChat&mode=allWhatsAppMSG" class="center" style="padding: 10px 10px !important;color: #333 !important;"><b style="font-size: 14px; !important;margin: 54px;">Show All Notifications</b><img src="layouts/v7/modules/CTWhatsApp/image/listing_green.png" class="" style="width: 20px;height: 20px;cursor: pointer;margin: 0px 0px 0px -50px;">',
                                                            '</a>',
                                                    '</ul>',

                                                '</div>',
                                            '</li>'].join('');

                    }

                    var headerIcons = $('#navbar ul.nav.navbar-nav');
                    if (headerIcons.length > 0){
                        headerIcons.first().prepend(VTPremiumIcon);
                    }

                    if(data.result['moduleIconActive'] == 1){
                        var whatsappNumber = jQuery('#'+app.getModuleName()+'_detailView_fieldValue_'+data.result['phoneField']).text();

                        if($.trim(whatsappNumber)){
                           if(jQuery('#whatsappnumbershow').val() != 1){
                                jQuery('#'+app.getModuleName()+'_detailView_fieldValue_'+data.result['phoneField']).closest('td').append('<div id="whatsappDetailView"><input type="hidden" id="whatsappnumber" value="'+$.trim(whatsappNumber)+'"><input type="hidden" id="whatsappnumbershow" value="1"><img src="layouts/v7/modules/CTWhatsApp/image/whatsapp.png" style="height: 20px;cursor: pointer;"></div>');
                            }
                        }

                        var massButton = $('#massButton').val();
                        if(massButton != 1){
                            var masssendmsg = "<input type='hidden' id='massButton' value='1'><li class='selectFreeRecords'><a id='sendmasswhatsappmsg' href='javascript:void(0);'>Send Whatsapp Message</a></li>";
                            jQuery('.listViewMassActions ul').append(masssendmsg);
                        }
                    }
                } 
            }
        }
    );
});

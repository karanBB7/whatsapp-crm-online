/* * *******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
 * ****************************************************************************** */
 
Vtiger.Class("CTWhatsApp_DashBoard_Js",{

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

    registerEventsForGetWhatsappMessageData : function() {
        var thisInstance = this;
        thisInstance.getWhatsappMassMessageData();
    }, 

    registerEventsForGetWhatsappMessageDataChangePeriod : function() {
        var thisInstance = this;
        jQuery('#reportData').on('change', function(e){
            thisInstance.getWhatsappMassMessageData(); 
            var reportChart = jQuery('#activeMessageTab').val();
            thisInstance.getWhatsappMessageData(reportChart);
        });
        jQuery('#progress').on('change', function(e){
            thisInstance.getWhatsappMassMessageData();
        });
        jQuery('#scanUsers').on('change', function(e){
            var reportChart = jQuery('.reportChart').attr('data-selectTab');
            thisInstance.getWhatsappMessageData(reportChart);
        });
        jQuery('#whatsAppBot').on('change', function(e){
            var reportChart = jQuery('.reportChart.active').attr('data-selectTab');
            thisInstance.getWhatsappMessageData(reportChart);
        });
    },

    getWhatsappMassMessageData : function(){
        var periodData = jQuery('#reportData').val();
        var progress = jQuery('#progress').val();
        var scanUsers = jQuery('#scanUsers').val();

        var params = {
            'module' : 'CTWhatsApp',
            'view' : "DashBoard",
            'mode' : "sendqueueMessages",
            'periodData' : periodData,
            'progress' : progress,
            'scanUsers' : scanUsers
        }
        app.helper.showProgress();
        AppConnector.request(params).then(
            function(data) {
                app.helper.hideProgress();
                var whatsappMassMessageHTML = '';
                if(data.result.length != 0){
                    for (var i = 0; i < data.result.length; i++) {
                        var actionButton = '';
                        //if(data.result[i]['totalQueue'] != 0){
                            if(data.result[i]['sendMessageStatus'] == 2){
                                actionButton += '<button class="hide btn btn-danger pause" id="pause" data-recordid='+data.result[i]['massMessageid']+' title=""><i class="fa fa-pause" aria-hidden="true"></i></button><button class="btn btn-success resume"  id="resume" data-recordid='+data.result[i]['massMessageid']+' title=""><i class="fa fa-play" aria-hidden="true"></i></button>&nbsp;&nbsp;<button class="btn"  id="delete" data-recordid='+data.result[i]['massMessageid']+' title=""><i class="fa fa-trash" aria-hidden="true"></i></button>';
                                
                            }else if(data.result[i]['sendMessageStatus'] == 0){
                                actionButton += '<button class="btn btn-danger pause" id="pause" data-recordid='+data.result[i]['massMessageid']+' title=""><i class="fa fa-pause" aria-hidden="true"></i></button><button class="hide btn btn-success resume" id="resume" data-recordid='+data.result[i]['massMessageid']+' title=""><i class="fa fa-play" aria-hidden="true"></i></button>&nbsp;&nbsp;<button class="btn"  id="delete" data-recordid='+data.result[i]['massMessageid']+' title=""><i class="fa fa-trash" aria-hidden="true"></i></button>';
                            }
                        /*}else{ 
                            actionButton += '';
                        }*/

                        if(data.result[i]['status'] == 'Completed'){
                            var color = '#89efa0';
                            var connectedColor = '';
                        }else{
                            if(data.result[i]['whatsappno'] == ''){
                                var connectedColor = '#ec1920';
                            }else{
                                var connectedColor = '';
                            }
                            var color = '';
                        }
                        
                        if(data.result[i]['whatsappno']){
                            var whatsappNumber = data.result[i]['whatsappno'];
                        }else{
                            var whatsappNumber = '';
                        }

                        var totalUnread = data.result[i]['totalSend'] - data.result[i]['readRows'];

                        var listviewHeader = '&list_headers=["whatsapp_datetime","whatsapp_no","whatsapp_sendername","message_body","whatsapp_contactid","assigned_user_id","message_type","createdtime","whatsapp_withccode","whatsapp_unreadread","whatsapp_important","whatsapp_withoccode"]';

                        var totalsendURL = 'index.php?module=CTWhatsApp&view=List&search_params=[[["message_type","e","Mass+Message"],["whatsapp_withoccode","c","'+data.result[i]['massMessageid']+'"]]]'+listviewHeader;

                        var totalReadURL = 'index.php?module=CTWhatsApp&view=List&search_params=[[["whatsapp_unreadread","e","Read"],["message_type","e","Mass+Message"],["whatsapp_withoccode","c","'+data.result[i]['massMessageid']+'"]]]'+listviewHeader;

                        var totalUnReadURL = 'index.php?module=CTWhatsApp&view=List&search_params=[[["whatsapp_unreadread","e","Unread"],["message_type","e","Mass+Message"],["whatsapp_withoccode","c","'+data.result[i]['massMessageid']+'"]]]'+listviewHeader;

                        whatsappMassMessageHTML += '<tr style="background-color:'+color+';background-color:'+connectedColor+';"><td>'+data.result[i]['date']+'</td>' +
                                                        '<td>'+data.result[i]['setype']+'</td>' +
                                                        '<td class="massMessageData" style="display:inline-block;width:180px;white-space: nowrap;overflow:hidden !important;text-overflow: ellipsis;cursor: pointer;">'+data.result[i]['whatsappmessage']+'</td>' +
                                                        '<td><span>'+whatsappNumber+'</span></td>' +
                                                        '<td><span style="float: right;"><a href="'+encodeURI(totalsendURL)+'" target="_blank">'+data.result[i]['totalSend']+'</a></span></td>' +
                                                        '<td><span style="float: right;">'+data.result[i]['totalQueue']+'</span></td>' +
                                                        '<td><span style="float: right;"><a href="'+encodeURI(totalReadURL)+'" target="_blank">'+data.result[i]['readRows']+'</a></span></td>' +
                                                        '<td><span style="float: right;"><a href="'+encodeURI(totalUnReadURL)+'" target="_blank">'+totalUnread+'</a></span></td>' +
                                                        '<td><span style="float: right;">'+data.result[i]['totalMessages']+'</span></td>' +
                                                        '<td class="magstatus">'+data.result[i]['status']+'</td>' +
                                                        '<td>'+data.result[i]['lastMessageDate']+'</td>' +
                                                        '<td>'+data.result[i]['expcompdate']+'</td>' +
                                                        '<td style="width: 124px;">'+actionButton+'</td>' +
                                                    '</tr><br>';
                    }
                }else{
                    whatsappMassMessageHTML += '<tr><td colspan="13" style="text-align: center;">'+app.vtranslate('DATANOTFOUNT')+'</td></tr>';
                }
                
                jQuery('.massmessages').html('');
                jQuery('.massmessages').html(whatsappMassMessageHTML);
            }
        );
    },

    registerEventsForGetWhatsappMessageDataWithChart : function() {
        var thisInstance = this;
        var reportChart = jQuery('.reportChart').attr('data-selectTab');
        thisInstance.getWhatsappMessageData(reportChart);
    },    

    registerEventsForGetWhatsappMessageDataWithChartChangePeriod : function() {
        var thisInstance = this;
        jQuery('.reportChart').on('click', function(e){
            var reportChart = jQuery('.reportChart').attr('data-selectTab');
            jQuery('#activeMessageTab').val(reportChart);
            thisInstance.getWhatsappMessageData(reportChart);
        });
    },

    getWhatsappMessageData : function(reportChart) {
        var periodData = jQuery('#reportData').val();
        var scanUsers = jQuery('#scanUsers').val();

        var whatsAppBot = jQuery('#whatsAppBot').val();
        if(reportChart == 'SendReceiveStatistics'){
            jQuery('.massmessagesContain').addClass('hide');
        }
        var params = {
            'module' : 'CTWhatsApp',
            'view' : "DashBoard",
            'mode' : "getWhatsappMessage",
            'periodData' : periodData,
            'reportChart' : reportChart,
            'scanUsers' : scanUsers,
            'whatsAppBot' : whatsAppBot
        }
        app.helper.showProgress();
        AppConnector.request(params).then(
            function(data) {
                app.helper.hideProgress();

                var periodDataArray = jQuery.parseJSON(data.result['periodData']);
                var xAxisData = jQuery.parseJSON(data.result['getDataFromPeriodData']);

                var totalMessage = jQuery.parseJSON(data.result['totalMessage']);
                var totalMessageURL = data.result['totalMessageURL'];
                var totalSentMessage = jQuery.parseJSON(data.result['totalSentMessage']);
                var totalSentMessageURL = data.result['totalSentMessageURL'];
                var totalReceivedMessage = jQuery.parseJSON(data.result['totalReceivedMessage']);
                var totalReceivedMessageURL = data.result['totalReceivedMessageURL'];

                var totalFinishedChat = jQuery.parseJSON(data.result['totalFinishedChat']);
                var totalPendingChat = jQuery.parseJSON(data.result['totalPendingChat']);

                var totalMassMessages = jQuery.parseJSON(data.result['totalMassMessages']);
                var totalMassMessagesURL = data.result['totalMassMessagesURL'];
                var totalReadMassMessages = jQuery.parseJSON(data.result['totalReadMassMessages']);
                var totalReadMassMessagesURL = data.result['totalReadMassMessagesURL'];
                var totalUnReadMassMessages = jQuery.parseJSON(data.result['totalUnReadMassMessages']);
                var totalUnReadMassMessagesURL = data.result['totalUnReadMassMessagesURL'];

                var totalBotMessages = jQuery.parseJSON(data.result['totalBotMessages']);
                var totalSendBotMessages = jQuery.parseJSON(data.result['totalSendBotMessages']);
                var totalReceivedBotMessage = jQuery.parseJSON(data.result['totalReceivedBotMessage']);

                var totalactiveBotChat = jQuery.parseJSON(data.result['totalactiveBotChat']);
                var totalfinishBotChat = jQuery.parseJSON(data.result['totalfinishBotChat']);

                
                if(totalFinishedChat != 0 || totalFinishedChat != null){
                    jQuery('.FinishedChat').text(totalFinishedChat);
                    if(totalFinishedChat == 0){
                        jQuery('.FinishedChatURL').addClass('hide');
                    }
                    jQuery('.FinishedChatURL').attr('href', '');
                }
                if(totalPendingChat != 0 || totalPendingChat != null){
                    jQuery('.PendingChat').text(totalPendingChat);
                    if(totalPendingChat == 0){
                        jQuery('.PendingChatURL').addClass('hide');
                    }
                    jQuery('.PendingChatURL').attr('href', '');
                }
                
                if(totalSentMessage != 0 || totalSentMessage != null){
                    jQuery('.SentMessage').text(totalSentMessage);
                    if(totalSentMessage == 0){
                        jQuery('.SentMessageURL').addClass('hide');
                    }
                    jQuery('.SentMessageURL').attr('href', totalSentMessageURL);
                }
                if(totalReceivedMessage != 0 || totalReceivedMessage != null){
                    jQuery('.ReceivedMessage').text(totalReceivedMessage);
                    if(totalReceivedMessage == 0){
                        jQuery('.ReceivedMessageURL').addClass('hide');
                    }
                    jQuery('.ReceivedMessageURL').attr('href', totalReceivedMessageURL);
                }
                if(totalMessage != 0 || totalMessage != null){
                    jQuery('.TotalMessage').text(totalMessage);
                    if(totalMessage == 0){
                        jQuery('.TotalMessageURL').addClass('hide');
                    }
                    jQuery('.TotalMessageURL').attr('href', totalMessageURL);
                }

                if(totalMassMessages != 0 || totalMassMessages != null){
                    jQuery('.sentMassMessage').text(totalMassMessages);
                    if(totalMassMessages == 0){
                        jQuery('.sentMassMessageURL').addClass('hide');
                    }
                    jQuery('.sentMassMessageURL').attr('href', totalMassMessagesURL);
                }
                if(totalReadMassMessages != 0 || totalReadMassMessages != null){
                    jQuery('.readMassMessage').text(totalReadMassMessages);
                    if(totalReadMassMessages == 0){
                        jQuery('.readMassMessageURL').addClass('hide');
                    }
                    jQuery('.readMassMessageURL').attr('href', totalReadMassMessagesURL);
                }
                if(totalUnReadMassMessages != 0 || totalUnReadMassMessages != null){
                    jQuery('.unreadMassMessage').text(totalUnReadMassMessages);
                    if(totalUnReadMassMessages == 0){
                        jQuery('.unreadMassMessageURL').addClass('hide');
                    }
                    jQuery('.unreadMassMessageURL').attr('href', totalUnReadMassMessagesURL);
                }

                if(totalBotMessages != 0 || totalBotMessages != null){
                    jQuery('.totalBotMessage').text(totalBotMessages);
                    if(totalBotMessages == 0){
                        jQuery('.totalBotMessageURL').addClass('hide');
                    }
                    jQuery('.totalBotMessageURL').attr('href', '');
                }
                if(totalSendBotMessages != 0 || totalSendBotMessages != null){
                    jQuery('.sendMessage').text(totalSendBotMessages);
                    if(totalSendBotMessages == 0){
                        jQuery('.sendMessageURL').addClass('hide');
                    }
                    jQuery('.sendMessageURL').attr('href', '');
                }
                if(totalReceivedBotMessage != 0 || totalReceivedBotMessage != null){
                    jQuery('.receivedMessage').text(totalReceivedBotMessage);
                    if(totalReceivedBotMessage == 0){
                        jQuery('.receivedMessageURL').addClass('hide');
                    }
                    jQuery('.receivedMessageURL').attr('href', '');
                }

                if(totalactiveBotChat != 0 || totalactiveBotChat != null){
                    jQuery('.activeChat').text(totalactiveBotChat);
                    if(totalactiveBotChat == 0){
                        jQuery('.activeChatURL').addClass('hide');
                    }
                    jQuery('.activeChatURL').attr('href', '');
                }
                if(totalfinishBotChat != 0 || totalfinishBotChat != null){
                    jQuery('.finishedBotChat').text(totalfinishBotChat);
                    if(totalfinishBotChat == 0){
                        jQuery('.finishedBotChatURL').addClass('hide');
                    }
                    jQuery('.finishedBotChatURL').attr('href', '');
                }


                yAxisData = [];
                $.each( xAxisData, function( key, value ) {
                    yAxisData.push({"name":key, "data":value.count})
                });

                Highcharts.chart('bywhatsappmessage', {
                    chart: {
                        type: 'column',
                        backgroundColor: 'White',
                        polar: true
                    },
                    title: {
                        text: ''
                    },
                    subtitle: {
                        text: ''
                    },
                    xAxis: {
                        categories: periodDataArray,
                        crosshair: true
                    },
                    colors: ['#1ecd73', '#7cb5ec', '#556074', '#556074', '#4e5b7b', '#334774', '#8793b1', '#8793b1', '#9bafde', '#9bafde'],
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'BY MESSAGES'
                        }
                    },
                    tooltip: {
                        headerFormat: '',
                        pointFormat: '<b style="color: {series.color};">{series.name} </b>: <b style="color: {series.color};"> {point.y}</b><br>',
                        footerFormat: '',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        },
                        series: {
                            cursor: 'pointer',
                            point: {
                                events: {
                                    click: function(e){
                                        var seriesName = e.point.series.name+' = '+e.point.y+' = '+e.point.category;
                                        var send = 'Send,Mass+Message';
                                        if(e.point.category.length == 4){
                                            var date = '01-01-'+e.point.category+',12-31-'+e.point.category;    
                                        }else{
                                            var date = e.point.category+','+e.point.category;
                                        }
                                        if(e.point.series.name == 'Sent'){
                                            var readUnread = 'Read,Unread';
                                        }else{
                                            var readUnread = 'Read';
                                        }
                                        var url = 'index.php?module=CTWhatsApp&view=List&search_params=[[["message_type","e","'+send+'"],["createdtime","bw","'+date+'"],["whatsapp_unreadread","e","'+readUnread+'"]]]';
                                        window.open(url, '_blank');
                                    }
                                }
                            }
                        },
                    },
                    legend: {
                        itemStyle: {
                            color: 'black',
                            fontWeight: 'bold'
                        }
                    },
                    series: yAxisData
                });
            }
        );
    },

    registerEventsForShowMassMessage : function() {
        jQuery('.massMessageData').live('click', function(e){    
            var massMessage = $(this).closest('tr').find('.massMessageData').html();
            var params = {
                'module' : 'CTWhatsApp',
                'view' : "DashBoard",
                'mode' : "previewMassMessage",
                'massMessage' : massMessage
            } 
            app.helper.showProgress();
            AppConnector.request(params).then(
                function(data) {
                    app.helper.hideProgress();
                    app.showModalWindow(data, function(data){});
                }
            );
        });
    },

    //Function for WhatsApp Bot Scan QR Code
    registerEventForScanQrCodeWhatsAppBot : function(){
        var thisInstance = this;
        jQuery('.whatsappBot').on("click", function() {
            var params = {
                'module' : 'CTWhatsApp',
                'view' : "WhatsappChat",
                'mode' : "scanQRCodeInPopup",
                'whatsappbot' : 'yes'
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
                    'mode' : "getWhatsappStatus",
                    'whatsappbot' : 'yes'
                }
                AppConnector.request(params).then(
                    function(data) {
                    if(data.result['whatsappStatus'] == 1){
                        $('.whatsappStatusBlock').removeClass('hide');
                        $('.whatsappQRCodeBlock').addClass('hide');
                        $('.errorDiv').addClass('hide');
                        $('.mobilenumber').text(data.result['whatsappNo']);
                        $('#whatsappstatus').val(1);
                    }else{
                        $('.whatsappStatusBlock').addClass('hide');
                    }
                });
            }
        }, 5000);
    },
    //Function for WhatsApp Bot Scan QR Code

    registerEventForWhatsAppReports : function() {
        var thisInstance = this;
        jQuery('.reportChart').on('click', function(e){   
            var reportChart = jQuery(this).attr('data-selectTab');
            jQuery('#activeMessageTab').val(reportChart); 
            jQuery('.reportChart').find('.nav-link').removeClass('active');
            jQuery(this).find('.nav-link').addClass('active');
                if(reportChart){
                    if(reportChart == 'BroadcastStatistics'){
                        jQuery('#progress').removeClass('hide');
                        jQuery('.allMassMessages').removeClass('hide');
                        jQuery('.BroadcastStatistics').removeClass('hide');
                        jQuery('.ChatbotStatistics').addClass('hide');
                        jQuery('.SendReceiveStatistics').addClass('hide');
                        jQuery('#scanUsers').addClass('hide');
                        jQuery('.massmessagesContain').removeClass('hide');
                        jQuery('#whatsAppBot').addClass('hide');
                    }else{
                        jQuery('.massmessagesContain').addClass('hide');
                        jQuery('#progress').addClass('hide');
                        jQuery('.allMassMessages').addClass('hide');
                        jQuery('.BroadcastStatistics').addClass('hide');

                        if(reportChart == 'SendReceiveStatistics'){
                            jQuery('.SendReceiveStatistics').removeClass('hide');
                            jQuery('.ChatbotStatistics').addClass('hide');
                            jQuery('#scanUsers').removeClass('hide');
                            jQuery('#whatsAppBot').addClass('hide');
                        }else if(reportChart == 'ChatbotStatistics'){
                            jQuery('.SendReceiveStatistics').addClass('hide');
                            jQuery('.ChatbotStatistics').removeClass('hide');
                            jQuery('#scanUsers').addClass('hide');
                            jQuery('#whatsAppBot').removeClass('hide');
                        }
                    }
                    thisInstance.getWhatsappMessageData(reportChart);
                }
        });
    },

    /**
     * Registered the events for this page
     */
    registerEvents : function(form) {
        jQuery('#appnav').addClass('hide');
        var thisInstance = this;

        var periodType = jQuery('input[name="periodData"]').val();
        jQuery('#reportData').val(periodType).trigger('change');
        
        thisInstance.registerAppTriggerEvent();
        thisInstance.registerEventsForGetWhatsappMessageData();
        thisInstance.registerEventsForGetWhatsappMessageDataChangePeriod();
        thisInstance.registerEventsForGetWhatsappMessageDataWithChart();
        //thisInstance.registerEventsForGetWhatsappMessageDataWithChartChangePeriod();
        thisInstance.registerEventsForShowMassMessage();
        thisInstance.registerEventForScanQrCodeWhatsAppBot();
        thisInstance.registerEventForWhatsAppReports();
    }    
});

jQuery(document).ready(function(){
    var thisInstance = new CTWhatsApp_DashBoard_Js();

    jQuery('#pause').live('click', function(e){
        $(this).addClass('hide');
        $(this).closest('tr').find('#resume').removeClass('hide');
        $(this).closest('tr').find('.magstatus').text("Hold");

        var recordid = jQuery(e.currentTarget).data('recordid');
        var params = {
            'module' : 'CTWhatsApp',
            'view' : "DashBoard",
            'mode' : "pauseResumeMessage",
            'recordid' : recordid,
            'buttonaction' : 'pause'
        } 
        app.helper.showProgress();
        AppConnector.request(params).then(
            function(data) {
                app.helper.hideProgress();
            }
        );
    });

    jQuery('#resume').live('click', function(e){
        $(this).addClass('hide');
        $(this).closest('tr').find('#pause').removeClass('hide');
        $(this).closest('tr').find('.magstatus').text("Inprogress");
        
        var recordid = jQuery(e.currentTarget).data('recordid');
        var params = {
            'module' : 'CTWhatsApp',
            'view' : "DashBoard",
            'mode' : "pauseResumeMessage",
            'recordid' : recordid,
            'buttonaction' : 'resume'
        }
        app.helper.showProgress();
        AppConnector.request(params).then(
            function(data) {
                app.helper.hideProgress();
            }
        );
    });

    jQuery('#delete').live('click', function(e){    
        var recordid = jQuery(e.currentTarget).data('recordid');
        var params = {
            'module' : 'CTWhatsApp',
            'view' : "DashBoard",
            'mode' : "deleteMassMessage",
            'recordid' : recordid
        }
        message = app.vtranslate('JS_MESSAGE1');
        message1 = app.vtranslate('JS_MESSAGE2');
        app.helper.showConfirmationBox({'message' : message}).then(function(data) {
            app.helper.showConfirmationBox({'message' : message1}).then(function(data) {
                app.helper.showProgress();
                app.request.post({data: params}).then(function(err, response) {
                    setTimeout(function(){ 
                        app.helper.hideProgress();
                        thisInstance.registerEventsForGetWhatsappMessageData();
                    }, 3000);
                });
            });
        });
    });
});

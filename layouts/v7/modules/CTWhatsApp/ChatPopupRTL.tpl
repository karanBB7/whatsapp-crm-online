{*+**********************************************************************************
* The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
************************************************************************************}
{literal}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="layouts/v7/modules/CTWhatsApp/assets/css/reset.css">
    <link rel="stylesheet" href="layouts/v7/modules/CTWhatsApp/assets/css/style.css">
    <script src="layouts/v7/modules/CTWhatsApp/assets/js/jquery.emojiarea.js"></script>
    <link rel="stylesheet" href="layouts/v7/modules/CTWhatsApp/css/IndicidualPopupRTL.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
    <script>
        function DropDown(el) {
            this.dd = el;
            this.placeholder = this.dd.children('span');
            this.opts = this.dd.find('ul.dropdown > li');
            this.val = '';
            this.index = -1;
            this.initEvents();
        }

        DropDown.prototype = {
            initEvents : function() {
                var obj = this;

                obj.dd.on('click', function(event){
                    $(this).toggleClass('active');
                    return false;
                });

                obj.opts.on('click',function(){
                    var opt = $(this);
                    obj.val = opt.text();
                    obj.index = opt.index();
                    var whatsapptype = $('#whatsapptype').val();
                    if(whatsapptype != 'singleWhatsapp'){
                        $('#WhatsappNumber').val($(this).attr("data-whatsappnumber"));
                    }
                    obj.placeholder.text(obj.val);
                });
            },
            getValue : function() {
                return this.val;
            },
            getIndex : function() {
                return this.index;
            }
        }

        $(function() {
            var dd = new DropDown( $('#dd') );
            $(document).click(function() {
                // all dropdowns
                $('.wrapper-dropdown').removeClass('active');
            });
        });

        $( document ).ready(function() {
            setTimeout(function(){ 
                var whatsappNumber = $("#dd li").first().attr("data-whatsappnumber");
                var whatsappNumberName = $("#dd li").first().attr("data-whatsappnumbername");
                $("#dd span").text(whatsappNumberName);
                var whatsapptype = $('#whatsapptype').val();
                if(whatsapptype != 'singleWhatsapp'){
                    if(whatsappNumber){
                        $('#WhatsappNumber').val(whatsappNumber);
                    }
                }
            }, 1000);

            $('.mainhamburger').click(function() {
                $('.mainhamburger').toggleClass('show');
                $('#overlay').toggleClass('show');
                $('.popup-contact').toggleClass('show');
            });
        });     
    </script>
{/literal}
{strip}
    <div class="modelContainer modal-dialog">
        <head>
        <script>
            $(function() {
                $("#mymin").click(function(){
                    $(".conversation").slideToggle();
                    $(".myModal").toggleClass("whatsapp-bottom");
                    $("#minmax").toggleClass("fa-window-maximize");
                });
            });
        </script>
        </head>
        <body>
            <div class="chat">
                <input type="hidden" name='whatsapppoupopen' id='whatsapppoupopen' value="true">
                <input type="hidden" name="module_name" id="module_name" value="{$SOURCEMODULE}">
                <input type="hidden" name='currentdatetime' id='currentdatetime' value="{$CURRENTDATETIME}">
                <input type="hidden" name='whatsappstorageurl' id='whatsappstorageurl' value="{$WHATSAPPSTORAGEURL}">
                <input type="hidden" name='currentusername' id='currentusername' value="{$CURRENUSERNAME}">
                <input type="hidden" name='indiwhatsappstatus' id='indiwhatsappstatus' value="{$WHATSAPPSTATUS}">
                <div class="chat-container">
                    <input type="hidden" name="mobileno" id="mobileno" value="{$MOBILEPHONE}">
                    <input type="hidden" name="module_recordid" id="module_recordids" value="{$RECORDID}">
                    <div id="call" class="user-bar">

                        <div>
                            <button type="button" class="close hide"  id="mymin">
                                <span aria-hidden="true" class="fa fa-minus" id="minmax"></span>
                            </button>
                            <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                                <span aria-hidden="true" class="fa fa-close" ></span>
                            </button>
                        </div>

                        <!--//Add Comment-->
                        {if $WHATSAPPSTATUS eq 0 || $WHATSAPPSTATUS eq 2 || $WHATSAPPSTATUS eq ''}
                        {else}
                            {if $COMMETNMODULE eq 1}
                                <div id="commentsdate" style="margin-left: 8px;">
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                </div>
                            {/if}
                        {/if}
                        <!--//Add Comment-->

                        <div class="name pull-right" title="{$FULLNAME}">
                            {if $RECORDID != ''}
                                <span id="name" style="text-decoration: underline;font-style: oblique;width: 150px;white-space: nowrap;overflow: hidden;text-overflow:">
                                    <a href="index.php?module={$SOURCEMODULE}&view=Detail&record={$RECORDID}" target="_blank" style="color: #fff;">{$FULLNAME}
                                    </a>
                                </span>
                            {else}
                                {$FULLNAME}
                            {/if}
                            {if $PROFILEIMAGE eq ''}
                                <img src="layouts/v7/modules/CTWhatsApp/image/profileimage.png" alt="Avatar" style="border-radius: 50% !important;">&nbsp;&nbsp;
                            {else}
                                <img src="{$PROFILEIMAGE}" alt="{$FULLNAME}" style="border-radius: 50% !important;">&nbsp;&nbsp;
                            {/if}
                        </div>
                    </div>
                    
                    <div class="conversation">
                        <div class="conversation-container">
                            <span id="ap">
                                {foreach key=WHATSAPPMESSAGESKEY item=WHATSAPPMESSAGESVALUE from=$WHATSAPPMESSAGES}
                                    {if $WHATSAPPMESSAGESVALUE['messageType'] eq 'Recieved'}
                                        <div class="message received">
                                            <span class="messageBody">
                                                <p style="text-transform:none;">{$WHATSAPPMESSAGESVALUE['messageBody']}<br>{$WHATSAPPMESSAGESVALUE['whatsAppFileName']}</p>
                                            </span>
                                            <span class="metadata">
                                                <span class="time"><b>{$WHATSAPPMESSAGESVALUE['your_number']}</b>&nbsp;&nbsp; {$WHATSAPPMESSAGESVALUE['createdTime']}</span>&nbsp;
                                                {if $WHATSAPPMESSAGESVALUE['messageReadUnRead'] eq 'Unread'}
                                                    <img src="layouts/v7/modules/CTWhatsApp/image/unread.png"/>    
                                                {else}
                                                    <img src="layouts/v7/modules/CTWhatsApp/image/read.png"/>  
                                                {/if}
                                            </span>&nbsp;
                                        </div>
                                        {if preg_match('/.CTWhatsAppStorage/', $WHATSAPPMESSAGESVALUE['messageBody'])}
                                        {else}
                                            {if $RECORDID}
                                                &nbsp;&nbsp;
                                                <span class="editField"><img src="layouts/v7/modules/CTWhatsApp/image/editcontent.png" title="{vtranslate('LBL_EDITFIELD',$MODULE)} {vtranslate({$SOURCEMODULE},{$SOURCEMODULE})}"></span>
                                            {/if}
                                        {/if}
                                    {else}
                                        <div class="message sent">
                                            <span class="messageBody">
                                                <p style="text-transform:none;">{$WHATSAPPMESSAGESVALUE['messageBody']}<br>{$WHATSAPPMESSAGESVALUE['whatsAppFileName']}</p>
                                            </span>
                                            <span class="metadata">
                                                <span class="time"><b>{$WHATSAPPMESSAGESVALUE['your_number']}</b>&nbsp;&nbsp; {$WHATSAPPMESSAGESVALUE['createdTime']}&nbsp;
                                                {if $WHATSAPPMESSAGESVALUE['messageReadUnRead'] eq 'Unread'}
                                                    <img src="layouts/v7/modules/CTWhatsApp/image/unread.png"/> 
                                                {else}
                                                    <img src="layouts/v7/modules/CTWhatsApp/image/read.png"/>   
                                                {/if}
                                            </span>
                                        </div>
                                    {/if}
                                {/foreach}
                            </span>
                        </div>
                        <div>
                            <div>
                                <div class="ipt-div text-wrapper">
                                    <div class="ipt-msg-div searchForm conversation-compose text-wrapper" data-emojiarea data-type="unicode" data-global-picker="false">
                                        <input type="hidden" id="replyMessageId" value="">
                                        <input type="hidden" id="replymessageText" value="">
                                        <span aria-hidden="true" class="fa fa-close closeReplybutton hide" style="float: right;cursor: pointer;"></span>
                                        <div class="reply-input hide">
                                        </div>
                                        <div class="emoji emoji-button">
                                            <i class="fa fa-grin">&#x1f604;</i>
                                        </div>
                                        <textarea placeholder="{vtranslate('TYPE_MESSAGE', $MODULE)}" id="input1" class="input-msg write_msg" name="input"></textarea>
                                    </div>
                                    <div class="icons-wrapper">
                                        <div class="ipt-div-num">
                                            <span id="sendwhatsappmsg" class="send msg_send_btn" style="cursor: pointer;">
                                                <img src="layouts/v7/modules/CTWhatsApp/image/send.png" alt="send-icon" />
                                            </span>
                                            {if $WHATSAPPUSERMANAGEMENT neq 'singleWhatsapp'}
                                                <input type="hidden" name="whatsappNumber" id="WhatsappNumber" value="">
                                                {if $ALLUSERNUMBER}
                                                    <div id="dd" class="wrapper-dropdown" tabindex="1">
                                                        <div class="arrowUp">
                                                            <img src="layouts/v7/modules/CTWhatsApp/image/uparrow.png" width="16px">
                                                        </div> 
                                                        <span></span>
                                                        <ul class="dropdown">
                                                            {foreach item=MULTIPELWHATSAPPNUMBER_VALUE key=MULTIPELWHATSAPPNUMBER_KEY from=$ALLUSERNUMBER}
                                                                <li class="selectWhatsAppNumber" data-whatsappnumber="{$MULTIPELWHATSAPPNUMBER_VALUE['whatsappno']}" data-whatsappnumbername="{$MULTIPELWHATSAPPNUMBER_VALUE['username']} - {$MULTIPELWHATSAPPNUMBER_VALUE['whatsappno']}">
                                                                    <a href="#">
                                                                        <div class="logo">
                                                                            <img src="layouts/v7/modules/CTWhatsApp/image/whatsapp.png" width="20px">
                                                                        </div>{$MULTIPELWHATSAPPNUMBER_VALUE['username']} - {$MULTIPELWHATSAPPNUMBER_VALUE['whatsappno']}
                                                                    </a>
                                                                </li>
                                                            {/foreach}
                                                        </ul>
                                                    </div>
                                                {/if}
                                            {/if}
                                        </div>
                                        <div class="ipt-ioc-div">
                                            <div class="image-upload">
                                                <label class="attachmentFile" for="filename_detail">
                                                    <input type="hidden" name="selectfile_data" id="selectfile_data" value="">
                                                    <i class="fa fa-paperclip fa-2x" aria-hidden="true" style="cursor: pointer;" title="{vtranslate('LBL_ATTACH', $MODULE)}"></i>
                                                    <input type="file" name="filename_detail" id="filename_detail" class="imageclick"/>
                                                </label>
                                            </div>

                                            <input type="hidden" name="wptemplateid" id="wptemplateid" value="">
                                            <div id="selectTemplates" class="hide" style="cursor: pointer;">
                                                <img src="layouts/v7/modules/CTWhatsApp/image/copy.png" alt="copy-icon" />
                                            </div>

                                            <div class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">
                                                    <img src="layouts/v7/modules/CTWhatsApp/image/copy.png" alt="copy-icon" />
                                                </a>
                                                <div class="dropdown-menu whatsAppTemplates" style="position: absolute; transform: translate3d(0px, -89px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="top-start">
                                                    {foreach item=WHATSAPP_TEMPLATES_VALUE key=WHATSAPP_TEMPLATES_KEY from=$WHATSAPP_TEMPLATES}
                                                        <a class="dropdown-item selectWhatsAppTemplates" href="#" data-whatsAppTemplatesid="{$WHATSAPP_TEMPLATES_KEY}">
                                                            {$WHATSAPP_TEMPLATES_VALUE}
                                                        </a>
                                                    {/foreach}
                                                    <a class="dropdown-item moreWhatsAppTemplates" href="#">
                                                        {vtranslate('LBL_MORE', $MODULE)}...
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </div>
{strip}

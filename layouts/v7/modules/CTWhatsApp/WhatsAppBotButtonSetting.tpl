{*+**********************************************************************************
* The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
************************************************************************************}

<style>
    .inputElement {
        width: 60%;
    }
    #chathtml{
        width: 100%;
    }
    .copy-text{
        text-align: right;
        display: flex;
        font-size: 20px;
        color: #245f54;
        margin-bottom: 10px;
        background: lightgrey;
        padding: 5px 10px;
        justify-content: space-between;
    }
</style>

<div  class="detailViewContainer row" id="ConfigEditorDetails" style="width: 96%;margin-left: 30px;">
    <div class="col-md-12">
         <div class="clearfix">
            <h4 class="pull-left">{vtranslate('WHATSAPPBOT_BUTTON_SETTING', $MODULENAME)}</h4>
        </div>
    </div>
   
    <hr>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="contents ">
            
            <form id="EditView" action="index.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="module" value="CTWhatsApp">
                <input type="hidden" name="view" value="WhatsappBot">
                <input type="hidden" name="mode" value="SaveWhatsAppBotButton">

                <table class="table table-borderless" id="listview-table">
                    <thead>
                        <tr>
                            <td class="fieldLabel alignMiddle"> 
                                {vtranslate('HEADER_TEXT', $MODULENAME)}
                            </td>
                            <td class="fieldValue">
                                <input id="hearder_text" class="inputElement" type="text" name="hearder_text" value="{$HEADERTEXT}">
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldLabel alignMiddle"> 
                                {vtranslate('HEADER_DESCRIPTION', $MODULENAME)}
                            </td>
                            <td class="fieldValue">
                                <input id="hearder_description" class="inputElement" type="text" name="hearder_description" value="{$HEADERDESCRIPTION}">
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldLabel alignMiddle"> 
                                {vtranslate('HEADER_COLOR', $MODULENAME)}
                            </td>
                            <td class="fieldValue">
                                <input id="header_color" class="jscolor inputElement" type="text" name="header_color" value="{$HEADERCOLOR}">
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldLabel alignMiddle"> 
                                {vtranslate('HEADER_IMAGE', $MODULENAME)}
                            </td>
                            <td class="fieldValue">
                                <input id="header_image" type="file" name="header_image" value="{$HEADERIMAGE}"><br>
                                {if $HEADERIMAGE}
                                    <img id="header_image_show" src="{$IMAGEDIRECTORY}{$HEADERIMAGE}" style="width: 50px;">
                                {/if}
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldLabel alignMiddle"> 
                                {vtranslate('BUTTON_TEXT', $MODULENAME)}
                            </td>
                            <td class="fieldValue">
                                <input id="button_text" class="inputElement" type="text" name="button_text" value="{$BUTTONTEXT}">
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldLabel alignMiddle"> 
                                {vtranslate('BUTTON_COLOR', $MODULENAME)}
                            </td>
                            <td class="fieldValue">
                                <input id="button_color" class="jscolor inputElement" type="text" name="button_color" value="{$BUTTONCOLOR}">
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldLabel alignMiddle"> 
                                {vtranslate('CHAT_BG_IMAGE', $MODULENAME)}
                            </td>
                            <td class="fieldValue">
                                <input id="bg_image" type="file" name="bg_image" value="{$BGCOLOR}"><br>
                                {if $BGCOLOR}
                                    <img id="bg_image_show" src="{$IMAGEDIRECTORY}{$BGCOLOR}" style="width: 50px;">
                                {/if}
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldLabel alignMiddle"> 
                                {vtranslate('SCANNED_WA_NUM', $MODULENAME)}
                            </td>
                            <td class="fieldValue">
                               <select class="select2 inputElement" id="scanned_number" name="scanned_number">
                                    <option value="">{vtranslate('SELECT_WA_NUM',$MODULENAME)}</option>
                                   {foreach from=$MULTI_WHATSAPPNUM item=NUMBER}
                                        <option value="{$NUMBER['whatsappno']}" {if $NUMBER['whatsappno'] eq $WANUMBER} selected="selected" {/if}>{$NUMBER['whatsappno']}</option>    
                                   {/foreach}
                               </select>
                            </td>
                        </tr>
                    </thead>
                </table>
                <div style="width: 78%">
                    <a title="copy" href="#" id="copycode" class="copy-text"><span>{vtranslate('COPY_MESSAGE',$MODULENAME)}</span> <i class="fa fa-copy"></i></a>
                    <textarea id="chathtml" rows="5" >
                    </textarea>
                </div>
                <br><br>
                <div class="row-fluid">
                    <div class="span12">
                        <span>
                            <center><button class="btn btn-success" id="submit" type="submit"><strong>{vtranslate('LBL_SAVE', $MODULE)}</strong></button>
                            <a class="cancelLink" href="javascript:history.back()" type="reset">{vtranslate('LBL_CANCEL', $QUALIFIED_MODULE)}</a></center>
                        </span><br>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{literal}
<script type="text/javascript" src="layouts/v7/modules/CTWhatsApp/resources/jscolorpicker/jscolor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.app-footer') .remove();
    });


        var headerimage = document.getElementById('header_image_show').src;
        var headertext = document.getElementById('hearder_text').value;
        var headerdesctext = document.getElementById('hearder_description').value;
        var headercolor = '#'+document.getElementById('header_color').value;
        var buttontext = document.getElementById('button_text').value;
        var buttoncolor = '#'+document.getElementById('button_color').value;
        var chatbackimg = document.getElementById('bg_image_show').src;
        var scanned_number = document.getElementById('scanned_number').value;

        let elemDiv = document.createElement('div');
        elemDiv.setAttribute("id", "ct-whatsapp-boat");
        elemDiv.style.cssText = 'display: block;background-color: white;z-index: 16000160 !important;margin-bottom: 60px;width: 360px;position: fixed !important;bottom: 50px !important;right: 50px;border-radius: 10px;box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);';
        elemDiv.innerHTML ='<div style="height: 100px;max-height: 100px;min-height: 100px;background-color: '+headercolor+';color: white;border-radius: 10px 10px 0px 0px;display: flex;align-items: center;"><img src="'+headerimage+'" style="margin-left: 20px;width: 50px;height: 50px;border-radius: 25px;box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);background-color:white;"><div style="margin-left: 20px;"><div style="font-size: 16px;font-weight: 700;line-height: 20px;font-family:Arial, Helvetica, sans-serif;">'+headertext+'</div><div style="font-size: 13px;line-height: 18px;margin-top: 4px;font-family:Arial, Helvetica, sans-serif;">'+headerdesctext+'</div></div><div id="closeboat" style="cursor: pointer;position: absolute;right: 20px;top: 20px;color:white;font-size: 20px;font-weight: 900;">&times;</div></div>';
        
        elemDiv.innerHTML+='<div><img src="'+chatbackimg+'" alt=""></div>';
        
        elemDiv.innerHTML+='<div style="background-color: white;">';
        elemDiv.innerHTML+='<a role="button" target="_blank" href="https://api.whatsapp.com/send?phone='+scanned_number+'&text=Hi" title="WhatsApp" style="text-decoration: none;color: rgb(255, 255, 255);font-size: 15px;font-weight: 700;line-height: 20px;cursor: pointer;position: relative;display: flex;-webkit-box-pack: center;justify-content: center;-webkit-box-align: center;align-items: center;-webkit-appearance: none;padding: 8px 12px;border-radius: 25px;border-width: initial;border-style: none;border-color: initial;border-image: initial;background-color: '+buttoncolor+';margin: 20px;overflow: hidden;"><span style="margin-left: 8px;margin-right: 8px;z-index: 1;color: rgb(255, 255, 255);font-family:Arial, Helvetica, sans-serif;">'+buttontext+'</span></a>';
        elemDiv.innerHTML+='<div style="text-align: center;margin-bottom: 15px;margin-top: -10px;font-style: italic;font-size: 12px;color: lightgray;font-family:Arial, Helvetica, sans-serif;">Powered by <a href="https://crmtiger.com/" target="_blank" style="color: #006eff6e;">CRMTiger</a></div>';
        elemDiv.innerHTML+='</div>';
        document.body.appendChild(elemDiv);

        buttonElement = document.createElement('div');
        buttonElement.innerHTML='<a id="showboat" role="button" href="#" title="WhatsApp" style="text-decoration: none;color: rgb(255, 255, 255);font-size: 15px;font-weight: 700;line-height: 20px;cursor: pointer;position: relative;display: flex;-webkit-box-pack: center;justify-content: center;-webkit-box-align: center;align-items: center;-webkit-appearance: none;padding: 8px 12px;border-radius: 25px;border-width: initial;border-style: none;border-color: initial;border-image: initial;background-color: #4dc247;overflow: hidden;position: fixed !important;bottom: 50px !important;right: 50px"><span style="margin-left: 8px;margin-right: 8px;z-index: 1;color: rgb(255, 255, 255);font-family:Arial, Helvetica, sans-serif;">Message Us</span></a>';
        document.body.appendChild(buttonElement);

        document.getElementById('closeboat').addEventListener("click",function(){
            document.getElementById('ct-whatsapp-boat').style.display = 'none'; 
        });

        document.getElementById('showboat').addEventListener("click",function(e){
            e.preventDefault();
            if(document.getElementById('ct-whatsapp-boat').style.display == 'none'){
                document.getElementById('ct-whatsapp-boat').style.display = 'block'; 
            }else{
                document.getElementById('ct-whatsapp-boat').style.display = 'none'; 
            }
        });

        var script = '<script type="text/javascript">';
        script+= ' let elemDiv = document.createElement(\'div\'); elemDiv.setAttribute("id", "ct-whatsapp-boat");elemDiv.style.cssText = \'display: none;background-color: white;z-index: 16000160 !important;margin-bottom: 60px;width: 360px;position: fixed !important;bottom: 50px !important;right: 50px;border-radius: 10px;box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);\'; elemDiv.innerHTML =\'<div style="height: 100px;max-height: 100px;min-height: 100px;background-color: '+headercolor+';color: white;border-radius: 10px 10px 0px 0px;display: flex;align-items: center;"><img src="'+headerimage+'" style="margin-left: 20px;width: 50px;height: 50px;border-radius: 25px;box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);background-color:white;"><div style="margin-left: 20px;"><div style="font-size: 16px;font-weight: 700;line-height: 20px;font-family:Arial, Helvetica, sans-serif;">'+headertext+'</div><div style="font-size: 13px;line-height: 18px;margin-top: 4px;font-family:Arial, Helvetica, sans-serif;">'+headerdesctext+'</div></div><div id="closeboat" style="cursor: pointer;position: absolute;right: 20px;top: 20px;color:white;font-size: 20px;font-weight: 900;">&times;</div></div>\';elemDiv.innerHTML+=\'<div><img src="'+chatbackimg+'" alt=""></div>\'; elemDiv.innerHTML+=\'<div style="background-color: white;">\'; elemDiv.innerHTML+=\'<a role="button" target="_blank" href="https://api.whatsapp.com/send?phone='+scanned_number+'&text=Hi" title="WhatsApp" style="text-decoration: none;color: rgb(255, 255, 255);font-size: 15px;font-weight: 700;line-height: 20px;cursor: pointer;position: relative;display: flex;-webkit-box-pack: center;justify-content: center;-webkit-box-align: center;align-items: center;-webkit-appearance: none;padding: 8px 12px;border-radius: 25px;border-width: initial;border-style: none;border-color: initial;border-image: initial;background-color: '+buttoncolor+';margin: 20px;overflow: hidden;"><span style="margin-left: 8px;margin-right: 8px;z-index: 1;color: rgb(255, 255, 255);font-family:Arial, Helvetica, sans-serif;">'+buttontext+'</span></a>\'; elemDiv.innerHTML+=\'<div style="text-align: center;margin-bottom: 15px;margin-top: -10px;font-style: italic;font-size: 12px;color: lightgray;font-family:Arial, Helvetica, sans-serif;">Powered by <a href="https://crmtiger.com/" target="_blank" style="color: #006eff6e;">CRMTiger</a></div>\'; elemDiv.innerHTML+=\'</div>\'; document.body.appendChild(elemDiv); buttonElement = document.createElement(\'div\'); buttonElement.innerHTML=\'<a id="showboat" role="button" href="#" title="WhatsApp" style="text-decoration: none;color: rgb(255, 255, 255);font-size: 15px;font-weight: 700;line-height: 20px;cursor: pointer;position: relative;display: flex;-webkit-box-pack: center;justify-content: center;-webkit-box-align: center;align-items: center;-webkit-appearance: none;padding: 8px 12px;border-radius: 25px;border-width: initial;border-style: none;border-color: initial;border-image: initial;background-color: #4dc247;overflow: hidden;position: fixed !important;bottom: 50px !important;right: 50px"><span style="margin-left: 8px;margin-right: 8px;z-index: 1;color: rgb(255, 255, 255);font-family:Arial, Helvetica, sans-serif;">Message Us</span></a>\'; document.body.appendChild(buttonElement); document.getElementById(\'closeboat\').addEventListener("click",function(){ document.getElementById(\'ct-whatsapp-boat\').style.display = \'none\'; }); document.getElementById(\'showboat\').addEventListener("click",function(e){ e.preventDefault(); if(document.getElementById(\'ct-whatsapp-boat\').style.display == \'none\'){ document.getElementById(\'ct-whatsapp-boat\').style.display = \'block\';  }else{ document.getElementById(\'ct-whatsapp-boat\').style.display = \'none\'} });';
        script+="<\/script>";

        jQuery('#chathtml').text(script);

        document.getElementById('copycode').addEventListener("click",function(e){
            e.preventDefault();
            document.getElementById("chathtml").select();
            document.execCommand('copy');
        });


        document.getElementById('EditView').addEventListener('submit',function(e){
            var scanned_number = document.getElementById('scanned_number').value;
            if(scanned_number == ''){
                e.preventDefault();
                var params = {
                   title : "Please select scanned whatsapp number",
                   text: 'Please select scanned whatsapp number',
                   animation: 'show',
                   type: 'error'
                };
                Vtiger_Helper_Js.showPnotify(params);
            }
        });

</script>
{/literal}
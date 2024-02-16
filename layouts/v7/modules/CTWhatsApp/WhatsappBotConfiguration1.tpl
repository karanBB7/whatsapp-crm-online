<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> 
    /* The Modal (background) */
    .modal1 {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 10000; /* Sit on top */
      padding-top: 100px; /* Location of the box */ 
      left: 0;
      top: 0; 
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal1 .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 30%;
    }

    /* The Close Button */
    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }

    .whatsapMainMenu .dropdown-menu {
        top: 45px !important;
        left: -175px !important;
    }

    .mainMenu{
        width: 20px;
        cursor: pointer;
        position: relative;
        top: 5px;
        margin-left: 10px;
    }
    .glyphicon-question-sign {
        cursor: pointer;
    }
    label {
        font-weight: 0;
        font-size: 12px !important;
        cursor: pointer;
    }

    .textwrap{
            overflow: hidden;
            max-width: 12ch;
            text-overflow: ellipsis;
    }

</style>
</head>

<body>
    <div class="flow-builder-dasboard-container  flow-builder-fixed-sidebar flow-builder-fixed-header">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
        <link rel="stylesheet" href="layouts/v7/modules/CTWhatsApp/WhatsappBot/temp.css">
        <link rel="stylesheet" href="layouts/v7/modules/CTWhatsApp/WhatsappBot/drag-flow-app.css">
        <link rel="stylesheet" href="layouts/v7/modules/CTWhatsApp/WhatsappBot/flowBuilder.min.css">
        <link rel="stylesheet" href="layouts/v7/modules/CTWhatsApp/WhatsappBot/demo-app.css">
        <script src="layouts/v7/modules/CTWhatsApp/WhatsappBot/flowBuilder.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
        <div class="flow-builder-header header-shadow">
             <div id="fieldModal" class="modal modal1">

      <!-- Modal content -->
        <div class="modal-content">
        <div class="modal-header">
        <span class="close">&times;</span>
            <h5>{vtranslate('Variables',$MODULENAME)} <i class="glyphicon glyphicon-question-sign" title="{vtranslate('Variables use to copy answer from customer using bot like their name,email,phone etc. This will be use to map with respected CRM fields to Add/Search/Update To or From CRM',$MODULENAME)}"></i></h5>
        </div>
        <div class="modal-body">
        <p>
            <div class="form-group">
                <label for="fieldname">{vtranslate('Variable Name',$MODULENAME)}</label>
                <input type="text" class="form-control" id="fieldname">
            </div>
            <div class="form-group">
                <label for="question">{vtranslate('Description',$MODULENAME)}</label>
                <input type="text" class="form-control" id="question">
            </div>
            <!-- <div class="form-group" >
                <label for="iconclass">{vtranslate('Icon class',$MODULENAME)}</label>
                <input type="text" class="form-control" id="iconclass" value="fa fa-fw fa-circle">
            </div> -->
            <button type="button" class="primary-btn" id="submitFields" title="{vtranslate('Submit',$MODULENAME)}">
                {vtranslate('Submit',$MODULENAME)}
            </button>
        </p>
        </div>
      </div>

    </div>
            <div class="flow-builder-header__logo">
                <div>
                    <h4><a href="index.php?module=CTWhatsApp&view=WhatsappBot&mode=WhatsappBotList">{vtranslate('Flow Builder',$MODULENAME)}</a></h4>
                </div>
            </div>
            <div class="flow-builder-header__content">
                <div class="flow-builder-header-right" style="width: auto;">

                    <label style="width: 200px;text-align: right;padding-right: 10px;">{vtranslate('LBL_ASSIGNED_TO','Vtiger')}</label>
                    {assign var=ALL_ACTIVEUSER_LIST value=$USER_MODEL->getAccessibleUsers()}
                    <input type="hidden" name="assignuserchange" id="assignuserchange" value="">
                    <select name="assignuserid" id="assignuserid" class="inputElement select2" style="float: right;margin: 0px 10px 0px 0px;width: auto;">
                        <option value="">{vtranslate('Select an Option', $MODULE)}</option>
                        <optgroup label="{vtranslate('LBL_USERS')}">
                            {foreach key=OWNER_ID item=OWNER_NAME from=$ALL_ACTIVEUSER_LIST}
                                <option value="{$OWNER_ID}" {if $ASSINGUSERID eq $OWNER_ID} selected="" {/if}>
                                    {$OWNER_NAME}
                                </option>
                            {/foreach}
                        </optgroup>
                    </select>

                    <label style="width: 150px; text-align: right;padding-right: 10px;">{vtranslate('Select Number for Bot',$MODULENAME)}</label>
                    <select class="select2" name="scanWhatsappNumber" id="scanWhatsappNumber" style="width: auto;margin-right: 15px;">
                        <option value="">{vtranslate('Select an Option',$MODULENAME)}</option>
                        {foreach item=MULTIPELWHATSAPPNUMBER_VALUE key=MULTIPELWHATSAPPNUMBER_KEY from=$MULTIPELWHATSAPPNUMBER}
                            <option value="{$MULTIPELWHATSAPPNUMBER_VALUE['whatsappno']}" {if $SCANWHATSAPPNUMBER eq $MULTIPELWHATSAPPNUMBER_VALUE['whatsappno']} selected {/if}>{$MULTIPELWHATSAPPNUMBER_VALUE['whatsappno']} - {$MULTIPELWHATSAPPNUMBER_VALUE['username']}</option>
                        {/foreach}
                    </select>

                    <input type="text"  class="form-control" id="botName" placeholder="{vtranslate('Bot Name',$MODULENAME)}" value="{$BOATNAME}" style="width: 390px; !important;margin: 0px 6px 0px 0px;">
                    &nbsp;
                    <!-- <button type="button" class=" btn btn-default" id="addNewFlowBtn">
                        {vtranslate('LBL_ADD', $MODULENAME)}
                    </button>&nbsp;&nbsp;&nbsp; -->
                    <button type="button" class=" btn btn-default hide" id="exportBtn">
                        {vtranslate('Export', $MODULENAME)}
                    </button>
                    <button type="button" class=" btn btn-default hide" id="ImportBtn">
                        {vtranslate('Import', $MODULENAME)}
                    </button>
                    <button type="button" class=" btn btn-success" id="SaveFlowBtn">
                        {vtranslate('Save', $MODULENAME)}
                    </button>
                    <a class='cancelLink' href="#" type="reset">{vtranslate('LBL_CANCEL', $MODULENAME)}</a>

                    <div>
                        <div class="dropdown whatsapMainMenu">
                            <div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" style="float: right !important;">
                                <img class="mainMenu" src="layouts/v7/modules/CTWhatsApp/image/listing_green.png"></p></a>
                            </div>
                            <ul class="dropdown-menu whatsapMenus" role="menu" aria-labelledby="dropdownMenu1" style="width:188px;">
                                <li class="">
                                    <a href="#" id="addNewFlowBtn">
                                        <span title="{vtranslate('Clear', $MODULENAME)}">
                                            <p>{vtranslate('Clear', $MODULENAME)}</p>
                                        </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="index.php?module=CTWhatsApp&view=WhatsappBot&mode=WhatsappBotConfiguration&duplicateRecordId={$BOTRECORDID}">
                                        <span title="{vtranslate('Duplicate', $MODULENAME)}">
                                            <p>{vtranslate('Duplicate', $MODULENAME)}</p>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="settingSection" class="element-setting">
            <button type="button" id="settingButton" class="btn-open-options btn btn-warning">
                <i class="fa fa-w-16 fa-2x fa-cog"></i>
            </button>
            <input type="hidden" name="botRecordid" id="botRecordid" value="{$BOTRECORDID}">
            <input type="hidden" name="defaultFlow" id="defaultFlow" value="{$BOTJSON}">
            <input type="hidden" name="duplicateBot" id="duplicateBot" value="{$DUPLICATEBOT}">
            <div class="node-settings__inner">
                <div class="scrollbar-container">
                    <div class="node-settings__options-wrapper">
                        <h3 class="options-heading"><span>{vtranslate('Setting',$MODULENAME)}</span>    <a id="clsButton" style="padding-left:80%;" title="{vtranslate('LBL_CLOSE',$MODULENAME)}">x</a></h3>
                        <div class="options-body" id="optionsBody">
                            <div class="text-element-section">
                                <div class="form-group">
                                    <label for="varmessagetype">{vtranslate('Message Type',$MODULENAME)}
                                        <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#varmessagetypemodal"></i>
                                    </label>
                                    <select class="select2 inputElement" id="varmessagetype" >
                                        <option value="Regular">{vtranslate('Regular',$MODULENAME)}</option>
                                        <option value="WhatsApp Response">{vtranslate('WhatsApp Response',$MODULENAME)}</option>
                                     </select>
                                </div>
                                <div class="form-group">
                                    <label for="varFormat">{vtranslate('Copy From Variables',$MODULENAME)} <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#copyvariablemodal"></i></label>
                                    <select class="select2 inputElement" id="copyfrom" >
                                        <option value="">{vtranslate('LBL_SELECTANOPTION',$MODULENAME)}</option>
                                        {for $i=0 to count($FIELDLISTS)-1 } 
                                            <option value="{$FIELDLISTS[$i]['slug']}">{$FIELDLISTS[$i]['slug']}</option>
                                         {/for}
                                     </select>
                                </div>
                                <div class="form-group">
                                    <label for="textMsgInput">{vtranslate('Response Text/Question',$MODULENAME)} <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#responsetextmodal"></i></label>
                                    <textarea  name="textMsgInput" style="height: 5em;resize:none" id="textMsgInput" cols="3" class="form-control" placeholder="Add your text."></textarea >
                                    <br>
                                    <div class="form-group">
                                        <label for="varFormat">{vtranslate('Format',$MODULENAME)} </label>
                                        <select class="select2 inputElement" id="varFormat2" >
                                            <option>TEXT</option><option>NUMBER</option><option>EMAIL</option><option>DATE</option>
                                         </select>
                                    </div>
                                    <form method="post" id="imgfrm" enctype="multipart/form-data">
                                         <div class="form-group">
                                            <label for="response">{vtranslate('Response file',$MODULENAME)}</label>
                                            <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#responsefilemodal"></i>
                                            <input type="file" name="responseImg" id="responseImg"  accept="image/*" onchange='$("#imgfrm").submit();'>
                                        </div>
                                        <img id="dispimg" src=""  width="100">
                                    </form>
                                    <div class="form-group" style="display: none;">
                                         <label for="textMsgInput">{vtranslate('Copy to Variables',$MODULENAME)} <i class="glyphicon glyphicon-question-sign" ></i></label>
                                        <div id="insertVariableList1" class="dropdown-content">
                                            {for $i=0 to count($FIELDLISTS)-1 } 
                                            <a data-item-value="@@{$FIELDLISTS[$i]['slug']}">{$FIELDLISTS[$i]['slug']} </a>
                                             {/for}  
                                        </div>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="varFormat">{vtranslate('Response Copy To Variables',$MODULENAME)} <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#responsecopymodal"></i></label>
                                        <select class="select2 inputElement" id="copyto" >
                                             <option value="">{vtranslate('LBL_SELECTANOPTION',$MODULENAME)}</option> 
                                            {for $i=0 to count($FIELDLISTS)-1 } 
                                                <option value="{$FIELDLISTS[$i]['slug']}">{$FIELDLISTS[$i]['slug']}</option>
                                             {/for}
                                         </select>
                                    </div>
                                </div>
                                <button type="button" class="primary-btn" id="submitName">
                                    {vtranslate('Submit',$MODULENAME)}
                                </button>
                            </div>
                            <div class="question-element-section">
                                <div class="form-group">
                                    <label for="textQuestionInput">{vtranslate('Question',$MODULENAME)} </label>
                                    <textarea cols="3" style="height: 5em;resize:none" name="textQuestionInput" id="textQuestionInput" class="form-control"></textarea>
                                    <div class="dropdown" style="margin-top: 4px;">
                                        <button id="insertVariable" class="dropbtn">{vtranslate('Add Variables',$MODULENAME)}</button>
                                        <div id="insertVariableList" class="dropdown-content">
                                            {for $i=0 to count($FIELDLISTS)-1 } 
                                            <a data-item-value="@@{$FIELDLISTS[$i]['slug']}">{$FIELDLISTS[$i]['slug']} </a>
                                             {/for}  
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label for="varSelection">{vtranslate('Save answers in the variable',$MODULENAME)}</label>
                                    <select class="select2 inputElement" id="varSelection" disabled>
                                        {for $i=0 to count($FIELDLISTS)-1 } 
                                            <option  value="@@{$FIELDLISTS[$i]['slug']}">{$FIELDLISTS[$i]['fieldname']}</option>
                                        {/for} 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="varFormat1">{vtranslate('Format',$MODULENAME)}</label>
                                    <select class="select2 inputElement" id="varFormat1">
                                        <option>TEXT</option><option>NUMBER</option><option>EMAIL</option><option>DATE</option>
                                     </select>
                                </div>
                                <button type="button" class="primary-btn" id="submitQuestion">
                                    {vtranslate('Submit',$MODULENAME)}
                                </button>
                            </div>

                            <div class="options-element-section">
                                <div class="form-group">
                                    <label for="messagetype">{vtranslate('Message Type',$MODULENAME)} 
                                    <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#messagetypemodal"></i></label>
                                    <select class="select2 inputElement" id="messagetype">
                                        <option value="Regular message">{vtranslate('Regular message',$MODULENAME)}</option>
                                        <option value="WhatsApp List message">{vtranslate('WhatsApp List message',$MODULENAME)}</option>
                                        <option value="WhatsApp Button message">{vtranslate('WhatsApp Button message',$MODULENAME)}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="optionQuestion">{vtranslate('Text Message',$MODULENAME)}</label>
                                    <textarea class="form-control" id="optionQuestion" style="height: 100px;" placeholder="What is your choice?"></textarea>
                                </div>
                                <button type="button" class="primary-btn" id="submitOption">
                                    {vtranslate('Submit',$MODULENAME)}
                                </button>
                                <div class="form-group" style="margin-top: 16px;">
                                    <label for="addOptions">{vtranslate('Add option',$MODULENAME)}</label>
                                    <input type="text" id="addOptions" class="form-control" placeholder="{vtranslate('LBL_ENTER_OPTION',$MODULENAME)}">
                                    <button type="button" class="primary-btn" id="addNewOption">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>

                                <ul class="options-list-group" id="optionsList">
                                </ul>
                            </div>
                            <div class="condition-element-section">
                                 <div class="form-group">
                                    <label for="varConditon">{vtranslate('Variable',$MODULENAME)}</label>
                                    <select class="select2 inputElement" id="varConditon">
                                        {for $i=0 to count($FIELDLISTS)-1 } 
                                            <option  value="@@{$FIELDLISTS[$i]['slug']}">{$FIELDLISTS[$i]['fieldname']}</option>
                                        {/for} 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="condition">{vtranslate('Condition',$MODULENAME)}</label>
                                    <select class="select2 inputElement" id="condition" >
                                        <option>equal</option>
                                        <option>not equal</option>
                                        <option>grater or equal</option>
                                        <option>less than or equal</option>
                                        <option>like</option>
                                        <option>not like</option>
                                        <!-- <option>start with</option>
                                        <option>end with</option> -->
                                     </select>
                                </div>
                                <div class="form-group">
                                    <label for="conditionQuestion">{vtranslate('Enter Value',$MODULENAME)}</label>
                                    <textarea cols="3" style="resize:none;height: 5em;" name="conditionQuestion" id="conditionQuestion" class="form-control" placeholder="{vtranslate('Enter value to compare',$MODULENAME)}"></textarea>
                                </div>
                                <button type="button" class="primary-btn" id="submitCondition">
                                    {vtranslate('Submit',$MODULENAME)}
                                </button>
                            </div>
                            <div class="crm-action-section" id="CrmActionSection">
                                <div class="form-group">
                                    <label for="varAction">{vtranslate('Select an Action',$MODULENAME)} <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#selectActionModal"></i></label>
                                    <select class="select2 inputElement" id="varAction">
                                        <option value="">{vtranslate('Select an option',$MODULENAME)}</option>
                                        <option value="Search">{vtranslate('Search a record',$MODULENAME)}</option>
                                        <option value="Insert">{vtranslate('Create a record',$MODULENAME)}</option>
                                        <!-- <option value="Update">{vtranslate('Update a record',$MODULENAME)}</option> -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="varModules">{vtranslate('Modules',$MODULENAME)} <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#modulesmodal"></i></label>
                                    <select class="select2 inputElement" id="varModules">
                                         <option value="">{vtranslate('Select an option',$MODULENAME)}</option>
                                        {for $i=0 to count($MODULLIST)-1 }
                                            <option value="{$MODULLIST[$i]['tabid']}">{vtranslate($MODULLIST[$i]['name'],$MODULLIST[$i]['name'])}</option>
                                        {/for}  
                                    </select>
                                </div> <br>
                                <h5>{vtranslate('Set value associate with fields in vTiger',$MODULENAME)} <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#setvaluemodal"></i> </h5>
                                <div id="assignvariablefields">
                                    <div class="row">
                                        <div class="form-group  col-md-5 vtigerlabelfielddiv">
                                            <label for="varFields">{vtranslate('Vtiger Fields',$MODULENAME)}</label>
                                        </div>
                                        <div class="form-group col-md-5 variablelabelfielddiv"  id="variablefieldblock">
                                            <label for="addMapping">{vtranslate('Saved Variables',$MODULENAME)}</label>
                                        </div>
                                        <div class="form-group col-md-4 defaultvaluelabeldiv"  id="defaultvalueblock">
                                            <label for="defaultValue">{vtranslate('Default Value',$MODULENAME)}</label>
                                        </div>
                                    </div>
                                    <div class="row assignvariablefields">
                                        <div class="form-group  col-md-5 vtigerfielddiv">
                                                <select class="vtigerfield select2 inputElement" id="varFields">
                                                    <option></option>
                                                </select>
                                        </div> 
                                        <div class="form-group col-md-5 variablefielddiv"  id="variablefieldblock">
                                            <select id="addMapping" class="select2 inputElement variablefield">
                                                {for $i=0 to count($FIELDLISTS)-1 } 
                                                    <option  value="{$FIELDLISTS[$i]['slug']}">{$FIELDLISTS[$i]['fieldname']}</option>
                                                {/for} 
                                            </select>
                                        </div>
                                        <div class="form-group defaultvaluediv"  id="defaultvalueblock">
                                            <input type="text" class="select2 inputElement defaultvalue" id="defaultvalue" placeholder="{vtranslate('Enter Value',$MODULENAME)}">
                                        </div>
                                        <div class="form-group col-md-1 deletebuttondiv">
                                            <button onclick="removefield(this)" type="button" class="primary-btn pull-right" title="{vtranslate('Remove',$MODULENAME)}" >
                                                <i class="fa fa-trash" ></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <div class="pull-right">
                                    <button onclick="addmorefield()" type="button" class="primary-btn" id="addNewMapping" title="{vtranslate('Add more',$MODULENAME)}">
                                        {vtranslate('Add',$MODULENAME)} <i class="fa fa-plus"></i>
                                       <!--  <i class="fa fa-plus" aria-hidden="true"></i> -->
                                    </button>
                                    
                                    <!-- <button onclick="removefield()" type="button" class="primary-btn" title="{vtranslate('Remove',$MODULENAME)}" >
                                        <i class="fa fa-trash" ></i>
                                    </button> -->
                                    </div>
                                </div> <br>
                                <div id="relatedvariablefields" style="display:none;">
                                <h5>{vtranslate('Associate Related Field',$MODULENAME)} <i class="glyphicon glyphicon-question-sign" ></i></h5>
                                    <div class="relatedvariablefieldsblock">
                                        <div class="form-group">
                                            <select class="select2 inputElement" id="relatedModules" data-value="">
                                             <option value="">{vtranslate('Select an option',$MODULENAME)}</option>
                                        </select>
                                        </div>
                                        <div class="row">
                                            <div class="form-group  col-md-6 vtigerlabelfielddiv">
                                                <label for="varFields">{vtranslate('Vtiger Fields',$MODULENAME)}</label>
                                            </div>
                                            <div class="form-group col-md-6 variablelabelfielddiv"  id="variablefieldblock">
                                                <label for="addMapping">{vtranslate('Saved Variables',$MODULENAME)}</label>
                                            </div>
                                        </div>
                                        <div class="row relatedvariablefields">
                                            <div class="form-group  col-md-6 relvtigerfielddiv">
                                                    <select class="relvtigerfield select2 inputElement" id="relvarFields">
                                                        <option></option>
                                                    </select>
                                            </div> 
                                            <div class="form-group col-md-5 relvariablefielddiv"  id="relvariablefieldblock">
                                                <select id="addMapping" class="select2 inputElement relvariablefield">
                                                    {for $i=0 to count($FIELDLISTS)-1 } 
                                                        <option  value="{$FIELDLISTS[$i]['slug']}">{$FIELDLISTS[$i]['fieldname']}</option>
                                                    {/for} 
                                                </select>
                                            </div>
                                            <div class="form-group col-md-1 deletebuttondiv">
                                                <button onclick="removerelatedfield(this)" type="button" class="primary-btn pull-right" title="{vtranslate('Remove',$MODULENAME)}" >
                                                    <i class="fa fa-trash" ></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="pull-right">
                                        <button onclick="addmorerelatedfield()" type="button" class="primary-btn" id="addNewMapping" title="{vtranslate('Add more',$MODULENAME)}">
                                            {vtranslate('Add',$MODULENAME)} <i class="fa fa-plus"></i>
                                           <!--  <i class="fa fa-plus" aria-hidden="true"></i> -->
                                        </button>
        
                                        </div>
                                    </div>
                                </div>

                                <h5>{vtranslate('Return Response to Bot',$MODULENAME)} <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#returnboatmodal"></i></h5>
                                <div class="form-group col-md-6">
                                    <label for="varSelection">{vtranslate('Copy to variable',$MODULENAME)}</label>
                                    <select class="select2 inputElement" id="responseVariable">
                                        {for $i=0 to count($FIELDLISTS)-1 } 
                                            <option  value="@@{$FIELDLISTS[$i]['slug']}">{$FIELDLISTS[$i]['fieldname']}</option>
                                        {/for} 
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="varSelection">{vtranslate('Copy from Vtiger Field',$MODULENAME)}</label>
                                    <select class="select2 inputElement" id="responseVtiger"> 
                                    </select>
                                </div> 
                                <div class="form-group  col-md-12">
                                    <button type="button" class="primary-btn  pull-right" id="submitCrmAction">
                                        {vtranslate('Save Action',$MODULENAME)}
                                    </button>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="flow-builder-main">
            <div class="flow-builder-sidebar sidebar-shadow">
                <div class="scrollbar-sidebar">
                    <div class="flow-builder-sidebar__inner">
                        <ul class="nav-menu-item">
                            <li class="flow-builder-sidebar__heading">{vtranslate('Basic',$MODULENAME)} <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#basicmodal"></i></li>
                            <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="start-node" ondragstart="drag(event)"><i class="fa fa-fw fa-play-circle"
                                        style="color: #009b00;"></i><label>{vtranslate('Start',$MODULENAME)}</label></a>
                            </li>
                           <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="end-que-node" ondragstart="drag(event)"><i class="fa fa-fw fa-play-circle"
                                        style="color: red;"></i><label>{vtranslate('End',$MODULENAME)}</label></a>
                            </li>
                           
                            <li class="flow-builder-sidebar__heading">{vtranslate('Question/Response',$MODULENAME)} <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#questionresModal"></i></li>

                             <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="text-node" ondragstart="drag(event)"><i class="fa fa-fw fa-user-circle"
                                        style="color: #4ea9ff;"></i><label>{vtranslate('Text/Response',$MODULENAME)}</label></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="options-node" ondragstart="drag(event)"><i class="fa fa-fw fa-usb"
                                        style="color: #4ea9ff;"></i><label>{vtranslate('Choice question',$MODULENAME)}</label></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="condition-node" ondragstart="drag(event)"><i
                                        class="fa fa-fw fa-question-circle" style="color: #4ea9ff;"></i><label>{vtranslate('Condition',$MODULENAME)}</label></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="chatwithoperator-node" ondragstart="drag(event)"><i
                                        class="fa fa-fw fa-question-circle" style="color: #4ea9ff;"></i><label>{vtranslate('Chat with Operator',$MODULENAME)}</label></a>
                            </li>
                            <li class="flow-builder-sidebar__heading">{vtranslate('CRM',$MODULENAME)} <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#crmmodal"></i></li>
                            <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="crm-action-node" ondragstart="drag(event)"><i class="fa fa-fw fa-cogs"
                                        style="color: #4ea9ff;"></i><label>{vtranslate('CRM Action',$MODULENAME)}</label></a>
                            </li>
                            <li class="flow-builder-sidebar__heading" hidden><label>{vtranslate('Condition & Loop',$MODULENAME)}</label></li>
                            
                             <li class="flow-builder-sidebar__heading">{vtranslate('Variables',$MODULENAME)} <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#variablemodal"></i><button  title="{vtranslate('Add Variables',$MODULENAME)}" type="button"  id="fieldBtn" class="primary-btn" style="float:right">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button></li>
                            {for $i=0 to count($FIELDLISTS)-1 } 
                             <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="false" data-field='{$FIELDLISTS[$i]|@json_encode}' id="{$FIELDLISTS[$i]['slug']}-que-node" data-node="{$FIELDLISTS[$i]['slug']}-que-node" ondragstart="drag(event)"><i class="{$FIELDLISTS[$i]['iconclass']}"
                                        style="color: #4ea9ff;"></i><label class="textwrap" title="{$FIELDLISTS[$i]['fieldname']}">{$FIELDLISTS[$i]['fieldname']}</label> &nbsp;<i class="fa fa-trash del" aria-hidden="true" data="{$FIELDLISTS[$i]['slug']}" style="cursor: pointer;float: right;margin: 6px 0 0 0;"></i></a>

                            </li>
                            {/for}  
                            <li hidden>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="loop-node" ondragstart="drag(event)"><i class="fa fa-fw fa-repeat"
                                        style="color: #4ea9ff;"></i><label>{vtranslate('Loop',$MODULENAME)}</label></a>
                            </li>
                        </ul>
                    </div>

                    <div class="zoomInOut" style="text-align: center;">
                        <button type="button" class="primary-btn" id="zoomin" style="background-color: #ffffff;border-color: #ffffff;" title="{vtranslate('LBL_ZOOMIN',$MODULENAME)}">
                            <img src="layouts/v7/modules/CTWhatsApp/image/zoomin.png" style="width: 23px;">
                        </button>
                        &nbsp;
                        <button type="button" class="primary-btn" id="zoomout" style="background-color: #ffffff;border-color: #ffffff;margin: 0px 0px 0px -10px;" title="{vtranslate('LBL_ZOOMOUT',$MODULENAME)}">
                            <img src="layouts/v7/modules/CTWhatsApp/image/zoomout.png" style="width: 23px;">
                        </button>
                    </div>
                </div>
            </div>
            <div class="sidebarHideShow" title="Left Panel Show/Hide">
                <span class="essentials-toggle-marker fa cursorPointer fa-chevron-left closeSideBar"></span>
                <span class="essentials-toggle-marker fa cursorPointer fa-chevron-right openSideBar hide"></span>
            </div>
            <div class="flow-builder-main__outer">
                <div class="flow-builder-main__inner">
                    <div class="drag-main" id="drawing-area">
                        <div id="drawflow" ondrop="drop(event)" ondragover="allowDrop(event)" class="parent-drawflow" tabindex="0" style="height: 98%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
         <div class="modal fade" id="variablemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top:150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{vtranslate('Variables',$MODULENAME)}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               {vtranslate('Variables use to copy answer from customer using bot like their name,email,phone etc. This will be use to map with respected CRM fields to Add/Search/Update To or From CRM',$MODULENAME)}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{vtranslate('Close',$MODULENAME)}</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
         <div class="modal fade" id="responsetextmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top:150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{vtranslate('Response Text/Question',$MODULENAME)}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               {vtranslate('Type message as an response or ask question to customer',$MODULENAME)}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{vtranslate('Close',$MODULENAME)}</button>
              </div>
            </div>
          </div>
        </div>

       <!-- Modal -->
         <div class="modal fade" id="copyvariablemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top:150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{vtranslate('Copy From Variables',$MODULENAME)}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               {vtranslate('Select variable to add or copy to the message which convert to actual value when sent message to customer',$MODULENAME)}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{vtranslate('Close',$MODULENAME)}</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
         <div class="modal fade" id="responsefilemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top:150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{vtranslate('Response file',$MODULENAME)}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               {vtranslate('Send Image/document as response to the customer along with text',$MODULENAME)}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{vtranslate('Close',$MODULENAME)}</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
         <div class="modal fade" id="responsecopymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top:150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{vtranslate('Response Copy To Variables',$MODULENAME)}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               {vtranslate('LBL_RESPONSE_COPY_TO_VARIABLE',$MODULENAME)}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{vtranslate('Close',$MODULENAME)}</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
         <div class="modal fade" id="crmmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top:150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{vtranslate('CRM',$MODULENAME)}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                {vtranslate('With CRM Action You can Insert/Update/Search record To or From CRM',$MODULENAME)}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{vtranslate('Close',$MODULENAME)}</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
         <div class="modal fade" id="returnboatmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top:150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{vtranslate('Return Response to Bot',$MODULENAME)}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                {vtranslate('On create/update/search on CRM it will return selected field value to customer to be display in WhatsApp bot',$MODULENAME)}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{vtranslate('Close',$MODULENAME)}</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
         <div class="modal fade" id="modulesmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top:150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{vtranslate('Modules',$MODULENAME)}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                {vtranslate('Select module to search/create/update record to or from CRM',$MODULENAME)}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{vtranslate('Close',$MODULENAME)}</button>
              </div>
            </div>
          </div>
        </div>

                <!-- Modal -->
        <div class="modal fade" id="varmessagetypemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top:150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{vtranslate('Message Type',$MODULENAME)}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <b>{vtranslate('Regular message',$MODULENAME)} </b> - {vtranslate('This is a regular message type format sent to customers from Bot.',$MODULENAME)}
                <br/>
                <b>{vtranslate('WhatsApp Response',$MODULENAME)}</b> - {vtranslate('This message type will display responses to customers in WhatsApp format.',$MODULENAME)}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{vtranslate('Close',$MODULENAME)}</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="messagetypemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top:150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{vtranslate('Message Type',$MODULENAME)}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body"> 
                <b>{vtranslate('Regular message',$MODULENAME)} </b> - {vtranslate('This message type will display responses to customers in WhatsApp Regular format.',$MODULENAME)}
                <a href="/layouts/v7/modules/CTWhatsApp/image/normalmessage.png" target="_blank" style="color: blue;">{vtranslate('click here',$MODULENAME)}</a> {vtranslate('to preview',$MODULENAME)}
                <br/>
                <b>{vtranslate('WhatsApp List message',$MODULENAME)}</b> - {vtranslate('This message type will display a response to customers as a WhatsApp list.',$MODULENAME)}
                <a href="/layouts/v7/modules/CTWhatsApp/image/buttonlistmessage.png" target="_blank" style="color: blue;">{vtranslate('click here',$MODULENAME)}</a> {vtranslate('to preview',$MODULENAME)}
                <br/>
                <b>{vtranslate('WhatsApp Button message',$MODULENAME)}</b> - {vtranslate('This message type will display a response to the customer in WhatsApp button format.',$MODULENAME)}
                <a href="/layouts/v7/modules/CTWhatsApp/image/buttonmessage.png" target="_blank" style="color: blue;">{vtranslate('click here',$MODULENAME)}</a> {vtranslate('to preview',$MODULENAME)}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{vtranslate('Close',$MODULENAME)}</button>
              </div>
            </div>
          </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="selectActionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top: 150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{vtranslate('Select an Action',$MODULENAME)}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                {vtranslate('LBL_SELECTACTION_MESSAGE1',$MODULENAME)}
                <br/>
                <b>{vtranslate('Create a Record',$MODULENAME)} </b> - {vtranslate('LBL_SELECTACTION_MESSAGE2',$MODULENAME)}
                <br/>
                <b>{vtranslate('Search a Record',$MODULENAME)}</b> - {vtranslate('LBL_SELECTACTION_MESSAGE3',$MODULENAME)}
                <br/>
                <!-- <b>{vtranslate('Update a Record',$MODULENAME)}</b> - {vtranslate('LBL_SELECTACTION_MESSAGE4',$MODULENAME)} -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{vtranslate('Close',$MODULENAME)}</button>
              </div>
            </div>
          </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="basicmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top: 150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{vtranslate('Basic',$MODULENAME)}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <b>{vtranslate('Start',$MODULENAME)} </b> - {vtranslate('Use this node when you start designing the Bot flow.',$MODULENAME)}
                <br/>
                <b>{vtranslate('End',$MODULENAME)}</b> - {vtranslate('Use this node when you end designing the Bot flow.',$MODULENAME)}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{vtranslate('Close',$MODULENAME)}</button>
              </div>
            </div>
          </div>
        </div>

         <!-- Modal -->
        <div class="modal fade" id="setvaluemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top: 150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{vtranslate('LBL_ASSIGNVALUE_MESSAGE1',$MODULENAME)}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <b>{vtranslate('vTiger field',$MODULENAME)} </b> - {vtranslate('LBL_ASSIGNVALUE_MESSAGE2',$MODULENAME)}
                <br/>
                <b>{vtranslate('Saved variables',$MODULENAME)}</b> - {vtranslate("LBL_ASSIGNVALUE_MESSAGE3",$MODULENAME)}.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{vtranslate('Close',$MODULENAME)}</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="questionresModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top: 150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{vtranslate('Question/Response',$MODULENAME)}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                1. {vtranslate('With this feature user can set various Types of Questions in flow to Ask customer',$MODULENAME)}
                <br/>
                2. {vtranslate('Add Condition to check it against response from customer in Bot.',$MODULENAME)}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{vtranslate('Close',$MODULENAME)}</button>
              </div>
            </div>
          </div>
        </div>
        
        {literal}
        <!-- Demo Script -->
        <script>
            function addmorefield() {
                //document.getElementById("submitCrmAction").click();
                var html = '<div class="row assignvariablefields">';
                html+='<div class="form-group  col-md-5 vtigerfielddiv">';
                html+='<select class="vtigerfield select2 inputElement" id="varFields" data-value="">';                   
                html+='</select>';
                html+='</div>'; 
                html+='<div class="form-group col-md-5 variablefielddiv"  id="variablefieldblock">';
                html+='<select id="addMapping" class="select2 inputElement variablefield" data-value="">';              
                html+='</select>';
                html+='</div>';
                html+='<div class="form-group defaultvaluediv"  id="defaultvalueblock">';
                html+='<input type="text" class="select2 inputElement defaultvalue" id="defaultvalue" placeholder="Enter Value">';
                html+='</div>';
                html+='<div class="form-group col-md-1 deletebuttondiv">';
                html+='<button onclick="removefield(this)" type="button" class="primary-btn pull-right" title="'+app.vtranslate('Remove')+'" >';
                html+='<i class="fa fa-trash" ></i>';
                html+='</button>';
                html+='</div>';
                html+='</div>';

                jQuery('#assignvariablefields').append(html);

                
                app.changeSelectElementView($('.vtigerfield'));
                //app.changeSelectElementView($('#fieldnode').find('.select2'));
                //register all select2 Elements
                app.showSelect2ElementView($('.assignvariablefields').find('select.select2'));
                
                getcrmfields();
                getflowbuilderfield();
                changeposition();
                app.helper.showSuccessNotification({title: 'Success', message: "Added Successfully"});
               
            }


            function addmorerelatedfield() {
                //document.getElementById("submitCrmAction").click();
                var html = '<div class="row relatedvariablefields">';
                html+='<div class="form-group  col-md-6 relvtigerfielddiv">';
                html+='<select class="relvtigerfield select2 inputElement" id="relvarFields" data-value="">';                   
                html+='</select>';
                html+='</div>'; 
                html+='<div class="form-group col-md-5 relvariablefielddiv"  id="relvariablefieldblock">';
                html+='<select id="addMapping" class="select2 inputElement relvariablefield" data-value="">';              
                html+='</select>';
                html+='</div>';
                html+='<div class="form-group col-md-1 deletebuttondiv">';
                html+='<button onclick="removerelatedfield(this)" type="button" class="primary-btn pull-right" title="'+app.vtranslate('Remove')+'" >';
                html+='<i class="fa fa-trash" ></i>';
                html+='</button>';
                html+='</div>';
                html+='</div>';

                jQuery('#relatedvariablefields').find('.relatedvariablefieldsblock').append(html);
                
                app.changeSelectElementView($('.relvtigerfield'));
                //app.changeSelectElementView($('#fieldnode').find('.select2'));
                //register all select2 Elements
                app.showSelect2ElementView($('.relatedvariablefields').find('select.select2'));
                
                getrelatedcrmfields();
                getrelatedflowbuilderfield();
                changeposition();
                app.helper.showSuccessNotification({title: 'Success', message: "Added Successfully"});
               
            } 

            function removefield(instance) {
                instance.closest('.assignvariablefields').remove();
               
               app.helper.showSuccessNotification({title: 'Success', message: "Deleted Successfully"});
            }

            function removerelatedfield(instance) {
                instance.closest('.relatedvariablefields').remove();
               
               app.helper.showSuccessNotification({title: 'Success', message: "Deleted Successfully"});
            }

            var sideBar = document.getElementById("optionsBody");
            sideBar.addEventListener("crmActionEvents", function(event) {
                document.getElementById("CrmActionSection").classList.add("show-node-section");
                event.detail.data.Msg = new Date();
                updateNodeDataFromId(event.detail.nodeId, event.detail.data)
                /*document.getElementById("CrmActionSection").innerHTML = "<h4>" + event.detail.data.Msg + "</h4>";*/
            });
            
            //Save field
            document.getElementById("submitFields").addEventListener("click", saveFields);
            function saveFields() {
              var fieldname = $('#fieldname').val();
              var question = $('#question').val();
              var iconclass = $('#iconclass').val();
              var params = {
                    'module' : 'CTWhatsApp',
                    'view' : "WhatsappBot",
                    'mode' : "addFBFields",
                    'fieldname' : fieldname,
                    'question' : question,
                    'iconclass' : iconclass
                }
                if(fieldname !='' &&  iconclass !=''){
                    app.helper.showProgress();
                    AppConnector.request(params).then(
                        function(data) {
                            app.helper.hideProgress();
                             //window.location.href = "";
                            jQuery('#fieldModal').find('.close').trigger('click');
                            var i = $('.nav-menu-item').length;
                            jQuery('.nav-menu-item').append('<li><a href="javascript:void(0)" class="drag-drawflow" draggable="false" data-field="" id="-que-node" data-node="-que-node" ondragstart="drag(event)"><i class="fa " style="color: #4ea9ff;"></i><label class="textwrap" title="'+fieldname+'">'+fieldname+'</label> &nbsp;<i class="fa fa-trash del" aria-hidden="true" data="'+fieldname+'" style="cursor: pointer;float: right;margin: 6px 0 0 0;"></i></a></li>');
                            jQuery('#copyfrom').append('<option>'+fieldname+'</option>');
                            jQuery('#copyto').append('<option>'+fieldname+'</option>');
                            jQuery('#responseVariable').append('<option value="@@'+fieldname+'">'+fieldname+'</option>');
                            jQuery('#varConditon').append('<option>'+fieldname+'</option>');
                            jQuery('select.variablefield').append('<option>'+fieldname+'</option>');
                    });
                }else{
                    alert("please enter proper data");
                }
            }
            jQuery('#varAction').on('change',function(){
                changeposition();
            });
            //document.getElementById("varAction").addEventListener("change", changeposition);
            function changeposition(){
                //console.log(jQuery('#CrmActionSection').find('#varAction').val());
                if(jQuery('#optionsBody').find('#varAction').val() == 'Search'){
                    //document.getElementById("variablefieldblock").setAttribute("style", "float: right;");
                    jQuery('.vtigerlabelfielddiv').removeClass('col-md-4').addClass('col-md-5');
                    jQuery('.variablelabelfielddiv').removeClass('col-md-4').addClass('col-md-5');
                    jQuery('.deletebuttondiv').removeClass('col-md-1').addClass('col-md-2');
                    jQuery('.defaultvaluelabeldiv').hide();
                    
                    jQuery('.assignvariablefields').find('.vtigerfielddiv').removeClass('col-md-4').addClass('col-md-5');
                    jQuery('.assignvariablefields').find('.variablefielddiv').removeClass('col-md-4').addClass('col-md-5');
                    jQuery('.assignvariablefields').find('.defaultvaluediv').removeClass('col-md-3');
                    jQuery('.assignvariablefields').find('.defaultvaluediv').hide();
                    jQuery('#relatedvariablefields').hide();
                    //jQuery('.element-setting .node-settings__inner').css('width','360px');
                }else if(jQuery('#optionsBody').find('#varAction').val() == 'Insert'){
                    jQuery('.vtigerlabelfielddiv').removeClass('col-md-5').addClass('col-md-4');
                    jQuery('.variablelabelfielddiv').removeClass('col-md-5').addClass('col-md-4');
                    jQuery('.deletebuttondiv').removeClass('col-md-2').addClass('col-md-1');
                    jQuery('.defaultvaluelabeldiv').show();

                    jQuery('.assignvariablefields').find('.vtigerfielddiv').removeClass('col-md-5').addClass('col-md-4');
                    jQuery('.assignvariablefields').find('.variablefielddiv').removeClass('col-md-5').addClass('col-md-4');
                    jQuery('.assignvariablefields').find('.defaultvaluediv').addClass('col-md-3');
                    jQuery('.assignvariablefields').find('.defaultvaluediv').show();
                    jQuery('#relatedvariablefields').show();
                    //jQuery('.element-setting .node-settings__inner').css('width','450px');
                }else{
                    if(jQuery('#optionsBody').find('#varAction').val() != null){
                        document.getElementById("variablefieldblock").removeAttribute("style");
                        jQuery('.assignvariablefields').find('.defaultvaluediv').hide();
                        jQuery('.deletebuttondiv').removeClass('col-md-2').addClass('col-md-1');
                        jQuery('.defaultvaluelabeldiv').hide();
                        jQuery('#relatedvariablefields').hide();
                    }

                }
                
            }
            //Save flow event example
            document.getElementById("SaveFlowBtn").addEventListener("saveFlow", function(event) {
                var flowJson = event.detail.data.flowData;
                var crmJson = event.detail.data.crmData;
                var botRecordid = $('#botRecordid').val();
                var scanWhatsappNumber = $('#scanWhatsappNumber').val();
                var assignuserid = $('#assignuserid').val();
                var botName = $('#botName').val();
                var assignuserchange = $('#assignuserchange').val();
                var duplicateBot = $('#duplicateBot').val();
                if(scanWhatsappNumber.trim() == ''){
                    var message = app.vtranslate('LBL_SELECTNUMBERFORBOT');
                    app.helper.showErrorNotification({'title': 'Error', 'message': message});
                    return false;
                }
                if(botName.trim() == ''){
                    var message = app.vtranslate('LBL_SELECT_BOTNAME');
                    app.helper.showErrorNotification({'title': 'Error', 'message': message});
                    return false;
                }
                if(assignuserid == ''){
                    var message = app.vtranslate('LBL_ASSIGNTO');
                    app.helper.showErrorNotification({'title': 'Error', 'message': message});
                    return false;
                }

                var params = {
                    'module' : 'CTWhatsApp',
                    'view' : "WhatsappBot",
                    'mode' : "getWhatsappBotFlowData",
                    'flowData' : flowJson,
                    'crmJson' : crmJson,
                    'botRecordid' : botRecordid,
                    'botName' : botName,
                    'scanWhatsappNumber' : scanWhatsappNumber,
                    'assignuserid' : assignuserid,
                    'assignuserchange' : assignuserchange,
                    'duplicateBot' : duplicateBot
                }
                app.helper.showProgress();
                AppConnector.request(params).then(
                    function(data) {
                        app.helper.hideProgress();
                        window.location.href = "index.php?module=CTWhatsApp&view=WhatsappBot&mode=WhatsappBotList";
                });
            });

            // Example to import data

            $( document ).ready(function(event) {
                $('#appnav').addClass('hide');
                var flowvalue = $('#defaultFlow').val();
                if(flowvalue){
                    var defaultFlow = JSON.parse(flowvalue);
                    //console.log(defaultFlow);
                    importFlow(defaultFlow);
                }  
                

                $('.closeSideBar').on('click', function(){
                    $('.closeSideBar').addClass('hide');
                    $('.openSideBar').removeClass('hide'); 
                    $('.flow-builder-sidebar').hide();
                    //$('.flow-builder-sidebar').css('width', '0px');
                    //$('.flow-builder-sidebar').css('min-width', '0px');
                    //$('.flow-builder-sidebar').css('flex', '0 0 0px'); 
                    $('#drawflow').css('width', '126%');
                });
                
                $('.nav-menu-item').on('click','.del', function(e){
                    var message = 'Are you sure to want to delete?';
                    var thisInstance =  jQuery(e.currentTarget);
                    var fieldname = thisInstance.attr("data");
                    app.helper.showConfirmationBox({'message' : message}).then(function(data) {
                    //console.log( $(this).attr("data"));
                        var params = {
                            'module' : 'CTWhatsApp',
                            'view' : "WhatsappBot",
                            'mode' : "deleteFBFields",
                            'fieldname' : fieldname,
                        }
                        if(fieldname !='' ){
                            app.helper.showProgress();
                            AppConnector.request(params).then(
                                function(data) {
                                   app.helper.hideProgress();
                                   //window.location.href = "";
                                   thisInstance.closest('li').remove();
                                   $('#copyfrom option').each(function () {
                                        if(fieldname == $(this).text()){
                                            $(this).remove();
                                        }
                                    });

                                   $('#varConditon option').each(function () {
                                        if('@@'+fieldname == $(this).val()){
                                            $(this).remove();
                                        }
                                    });
                            });
                        }else{
                            alert("please enter porper data");
                        }
                    });
                });

                $('.openSideBar').on('click', function(){
                    $('.openSideBar').addClass('hide');
                    $('.closeSideBar').removeClass('hide'); 
                    $('.flow-builder-sidebar').show();
                    //$('.flow-builder-sidebar').css('width', '180px');
                    //$('.flow-builder-sidebar').css('min-width', '180px');
                    //$('.flow-builder-sidebar').css('flex', '0 0 180px'); 
                    $('#drawflow').css('width', '107%');
                }); 
               
            });

            // Get the modal
            var modal = document.getElementById("fieldModal");

            // Get the button that opens the modal
            var btn = document.getElementById("fieldBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
              modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
              modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }

            $(document).ready(function () {
              $("#nav-icon3").click(function () {
                $("#addnew").toggleClass("open");
              });
            });

            $(document).ready(function () {
              $("#nav-icon3").click(function () {
                $(this).toggleClass("open");
              });
            });
           
        </script>
        {/literal}

        <script type="text/javascript" src="layouts/v7/modules/CTWhatsApp/WhatsappBot/flow-builder-custom.js"></script>
    </div>
</body>

</html>
<?php
/* Smarty version 3.1.39, created on 2023-09-27 12:23:42
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\CTWhatsAppBusiness\WhatsappBotConfiguration1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65141eceb27f55_29325549',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4cc6d702b87504b8b4e1dd711334e67453133930' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\CTWhatsAppBusiness\\WhatsappBotConfiguration1.tpl',
      1 => 1695618368,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65141eceb27f55_29325549 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
    .app-footer {
        display: none;
    }

</style>
</head>

<body>
    <div class="flow-builder-dasboard-container  flow-builder-fixed-sidebar flow-builder-fixed-header">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
        <link rel="stylesheet" href="layouts/v7/modules/CTWhatsAppBusiness/WhatsappBot/temp.css">
        <link rel="stylesheet" href="layouts/v7/modules/CTWhatsAppBusiness/WhatsappBot/drag-flow-app.css">
        <link rel="stylesheet" href="layouts/v7/modules/CTWhatsAppBusiness/WhatsappBot/flowBuilder.min.css">
        <link rel="stylesheet" href="layouts/v7/modules/CTWhatsAppBusiness/WhatsappBot/demo-app.css">
        <?php echo '<script'; ?>
 src="layouts/v7/modules/CTWhatsAppBusiness/WhatsappBot/flowBuilder.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/sweetalert2@9"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://unpkg.com/micromodal/dist/micromodal.min.js"><?php echo '</script'; ?>
>
        <div class="flow-builder-header header-shadow">
             <div id="fieldModal" class="modal modal1">

      <!-- Modal content -->
        <div class="modal-content">
        <div class="modal-header">
        <span class="close">&times;</span>
            <h5><?php echo vtranslate('Variables',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 <i class="glyphicon glyphicon-question-sign" title="<?php echo vtranslate('Variables use to copy answer from customer using bot like their name,email,phone etc. This will be use to map with respected CRM fields to Add/Search/Update To or From CRM',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
"></i></h5>
        </div>
        <div class="modal-body">
        <p>
            <div class="form-group">
                <label for="fieldname"><?php echo vtranslate('Variable Name',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label>
                <input type="text" class="form-control" id="fieldname">
            </div>
            <div class="form-group">
                <label for="question"><?php echo vtranslate('Description',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label>
                <input type="text" class="form-control" id="question">
            </div>
            <!-- <div class="form-group" >
                <label for="iconclass"><?php echo vtranslate('Icon class',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label>
                <input type="text" class="form-control" id="iconclass" value="fa fa-fw fa-circle">
            </div> -->
            <button type="button" class="primary-btn" id="submitFields" title="<?php echo vtranslate('Submit',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
">
                <?php echo vtranslate('Submit',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

            </button>
        </p>
        </div>
      </div>

    </div>
            <div class="flow-builder-header__logo">
                <div>
                    <h4><a href="index.php?module=CTWhatsAppBusiness&view=WhatsappBot&mode=WhatsappBotList"><?php echo vtranslate('Flow Builder',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</a></h4>
                </div>
            </div>
            <div class="flow-builder-header__content">
                <div class="flow-builder-header-right" style="width: auto;">

                    <label style="width: 200px;text-align: right;padding-right: 10px;"><?php echo vtranslate('LBL_ASSIGNED_TO','Vtiger');?>
</label>
                    <?php $_smarty_tpl->_assignInScope('ALL_ACTIVEUSER_LIST', $_smarty_tpl->tpl_vars['USER_MODEL']->value->getAccessibleUsers());?>
                    <input type="hidden" name="assignuserchange" id="assignuserchange" value="">
                    <select name="assignuserid" id="assignuserid" class="inputElement select2" style="float: right;margin: 0px 10px 0px 0px;width: auto;">
                        <option value=""><?php echo vtranslate('Select an Option',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
                        <optgroup label="<?php echo vtranslate('LBL_USERS');?>
">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALL_ACTIVEUSER_LIST']->value, 'OWNER_NAME', false, 'OWNER_ID');
$_smarty_tpl->tpl_vars['OWNER_NAME']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['OWNER_ID']->value => $_smarty_tpl->tpl_vars['OWNER_NAME']->value) {
$_smarty_tpl->tpl_vars['OWNER_NAME']->do_else = false;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['OWNER_ID']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['ASSINGUSERID']->value == $_smarty_tpl->tpl_vars['OWNER_ID']->value) {?> selected="" <?php }?>>
                                    <?php echo $_smarty_tpl->tpl_vars['OWNER_NAME']->value;?>

                                </option>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </optgroup>
                    </select>

                    <label style="width: 150px; text-align: right;padding-right: 10px;"><?php echo vtranslate('Select Number for Bot',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label>
                    <select class="select2" name="scanWhatsappNumber" id="scanWhatsappNumber" style="width: auto;margin-right: 15px;">
                        <option value=""><?php echo vtranslate('Select an Option',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER']->value, 'MULTIPELWHATSAPPNUMBER_VALUE', false, 'MULTIPELWHATSAPPNUMBER_KEY');
$_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_KEY']->value => $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->value) {
$_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->value['whatsappno'];?>
" <?php if ($_smarty_tpl->tpl_vars['SCANWHATSAPPNUMBER']->value == $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->value['whatsappno']) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->value['whatsappno'];?>
 - <?php echo $_smarty_tpl->tpl_vars['MULTIPELWHATSAPPNUMBER_VALUE']->value['username'];?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>

                    <input type="text"  class="form-control" id="botName" placeholder="<?php echo vtranslate('Bot Name',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
" value="<?php echo $_smarty_tpl->tpl_vars['BOATNAME']->value;?>
" style="width: 390px; !important;margin: 0px 6px 0px 0px;">
                    &nbsp;
                    <!-- <button type="button" class=" btn btn-default" id="addNewFlowBtn">
                        <?php echo vtranslate('LBL_ADD',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                    </button>&nbsp;&nbsp;&nbsp; -->
                    <button type="button" class=" btn btn-default hide" id="exportBtn">
                        <?php echo vtranslate('Export',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                    </button>
                    <button type="button" class=" btn btn-default hide" id="ImportBtn">
                        <?php echo vtranslate('Import',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                    </button>
                    <button type="button" class=" btn btn-success" id="SaveFlowBtn">
                        <?php echo vtranslate('Save',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                    </button>
                    <a class='cancelLink' href="#" type="reset"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</a>

                    <div>
                        <div class="dropdown whatsapMainMenu">
                            <div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" style="float: right !important;">
                                <img class="mainMenu" src="layouts/v7/modules/CTWhatsAppBusiness/image/listing_green.png"></p></a>
                            </div>
                            <ul class="dropdown-menu whatsapMenus" role="menu" aria-labelledby="dropdownMenu1" style="width:188px;">
                                <li class="">
                                    <a href="#" id="addNewFlowBtn">
                                        <span title="<?php echo vtranslate('Clear',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
">
                                            <p><?php echo vtranslate('Clear',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</p>
                                        </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="index.php?module=CTWhatsAppBusiness&view=WhatsappBot&mode=WhatsappBotConfiguration&duplicateRecordId=<?php echo $_smarty_tpl->tpl_vars['BOTRECORDID']->value;?>
">
                                        <span title="<?php echo vtranslate('Duplicate',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
">
                                            <p><?php echo vtranslate('Duplicate',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</p>
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
            <input type="hidden" name="botRecordid" id="botRecordid" value="<?php echo $_smarty_tpl->tpl_vars['BOTRECORDID']->value;?>
">
            <input type="hidden" name="defaultFlow" id="defaultFlow" value="<?php echo $_smarty_tpl->tpl_vars['BOTJSON']->value;?>
">
            <input type="hidden" name="duplicateBot" id="duplicateBot" value="<?php echo $_smarty_tpl->tpl_vars['DUPLICATEBOT']->value;?>
">
            <div class="node-settings__inner">
                <div class="scrollbar-container">
                    <div class="node-settings__options-wrapper">
                        <h3 class="options-heading"><span><?php echo vtranslate('Setting',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</span>    <a id="clsButton" style="padding-left:80%;" title="<?php echo vtranslate('LBL_CLOSE',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
">x</a></h3>
                        <div class="options-body" id="optionsBody">
                            <div class="text-element-section">
                                <div class="form-group">
                                    <label for="varmessagetype"><?php echo vtranslate('Message Type',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                                        <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#varmessagetypemodal"></i>
                                    </label>
                                    <select class="select2 inputElement" id="varmessagetype" >
                                        <option value="Regular"><?php echo vtranslate('Regular',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</option>
                                        <option value="WhatsApp Response"><?php echo vtranslate('WhatsApp Response',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</option>
                                     </select>
                                </div>
                                <div class="form-group">
                                    <label for="varFormat"><?php echo vtranslate('Copy From Variables',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#copyvariablemodal"></i></label>
                                    <select class="select2 inputElement" id="copyfrom" >
                                        <option value=""><?php echo vtranslate('LBL_SELECTANOPTION',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</option>
                                        <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['FIELDLISTS']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['FIELDLISTS']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?> 
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['slug'];?>
"><?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['slug'];?>
</option>
                                         <?php }
}
?>
                                     </select>
                                </div>
                                <div class="form-group">
                                    <label for="textMsgInput"><?php echo vtranslate('Response Text/Question',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#responsetextmodal"></i></label>
                                    <textarea  name="textMsgInput" style="height: 5em;resize:none" id="textMsgInput" cols="3" class="form-control" placeholder="Add your text."></textarea >
                                    <br>
                                    <div class="form-group">
                                        <label for="varFormat"><?php echo vtranslate('Format',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 </label>
                                        <select class="select2 inputElement" id="varFormat2" >
                                            <option>TEXT</option><option>NUMBER</option><option>EMAIL</option><option>DATE</option>
                                         </select>
                                    </div>
                                    <form method="post" id="imgfrm" enctype="multipart/form-data">
                                         <div class="form-group">
                                            <label for="response"><?php echo vtranslate('Response file',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label>
                                            <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#responsefilemodal"></i>
                                            <input type="file" name="responseImg" id="responseImg"  accept="image/*" onchange='$("#imgfrm").submit();'>
                                        </div>
                                        <img id="dispimg" src=""  width="100">
                                    </form>
                                    <div class="form-group" style="display: none;">
                                         <label for="textMsgInput"><?php echo vtranslate('Copy to Variables',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 <i class="glyphicon glyphicon-question-sign" ></i></label>
                                        <div id="insertVariableList1" class="dropdown-content">
                                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['FIELDLISTS']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['FIELDLISTS']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?> 
                                            <a data-item-value="@@<?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['slug'];?>
"><?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['slug'];?>
 </a>
                                             <?php }
}
?>  
                                        </div>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="varFormat"><?php echo vtranslate('Response Copy To Variables',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#responsecopymodal"></i></label>
                                        <select class="select2 inputElement" id="copyto" >
                                             <option value=""><?php echo vtranslate('LBL_SELECTANOPTION',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</option> 
                                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['FIELDLISTS']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['FIELDLISTS']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?> 
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['slug'];?>
"><?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['slug'];?>
</option>
                                             <?php }
}
?>
                                         </select>
                                    </div>
                                </div>
                                <button type="button" class="primary-btn" id="submitName">
                                    <?php echo vtranslate('Submit',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                                </button>
                            </div>
                            <div class="question-element-section">
                                <div class="form-group">
                                    <label for="textQuestionInput"><?php echo vtranslate('Question',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 </label>
                                    <textarea cols="3" style="height: 5em;resize:none" name="textQuestionInput" id="textQuestionInput" class="form-control"></textarea>
                                    <div class="dropdown" style="margin-top: 4px;">
                                        <button id="insertVariable" class="dropbtn"><?php echo vtranslate('Add Variables',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</button>
                                        <div id="insertVariableList" class="dropdown-content">
                                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['FIELDLISTS']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['FIELDLISTS']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?> 
                                            <a data-item-value="@@<?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['slug'];?>
"><?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['slug'];?>
 </a>
                                             <?php }
}
?>  
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label for="varSelection"><?php echo vtranslate('Save answers in the variable',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label>
                                    <select class="select2 inputElement" id="varSelection" disabled>
                                        <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['FIELDLISTS']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['FIELDLISTS']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?> 
                                            <option  value="@@<?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['slug'];?>
"><?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['fieldname'];?>
</option>
                                        <?php }
}
?> 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="varFormat1"><?php echo vtranslate('Format',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label>
                                    <select class="select2 inputElement" id="varFormat1">
                                        <option>TEXT</option><option>NUMBER</option><option>EMAIL</option><option>DATE</option>
                                     </select>
                                </div>
                                <button type="button" class="primary-btn" id="submitQuestion">
                                    <?php echo vtranslate('Submit',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                                </button>
                            </div>

                            <div class="options-element-section">
                                <div class="form-group">
                                    <label for="messagetype"><?php echo vtranslate('Message Type',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 
                                    <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#messagetypemodal"></i></label>
                                    <select class="select2 inputElement" id="messagetype">
                                        <option value="Regular message"><?php echo vtranslate('Regular message',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</option>
                                        <option value="WhatsApp Button message"><?php echo vtranslate('WhatsApp Button message',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="optionQuestion"><?php echo vtranslate('Text Message',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label>
                                    <textarea class="form-control" id="optionQuestion" style="height: 100px;" placeholder="What is your choice?"></textarea>
                                </div>
                                <button type="button" class="primary-btn" id="submitOption">
                                    <?php echo vtranslate('Submit',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                                </button>
                                <div class="form-group" style="margin-top: 16px;">
                                    <label for="addOptions"><?php echo vtranslate('Add option',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label>
                                    <input type="text" id="addOptions" class="form-control" placeholder="<?php echo vtranslate('LBL_ENTER_OPTION',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
">
                                    <button type="button" class="primary-btn" id="addNewOption">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>

                                <ul class="options-list-group" id="optionsList">
                                </ul>
                            </div>
                            <div class="condition-element-section">
                                 <div class="form-group">
                                    <label for="varConditon"><?php echo vtranslate('Variable',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label>
                                    <select class="select2 inputElement" id="varConditon">
                                        <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['FIELDLISTS']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['FIELDLISTS']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?> 
                                            <option  value="@@<?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['slug'];?>
"><?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['fieldname'];?>
</option>
                                        <?php }
}
?> 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="condition"><?php echo vtranslate('Condition',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label>
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
                                    <label for="conditionQuestion"><?php echo vtranslate('Enter Value',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label>
                                    <textarea cols="3" style="resize:none;height: 5em;" name="conditionQuestion" id="conditionQuestion" class="form-control" placeholder="<?php echo vtranslate('Enter value to compare',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
"></textarea>
                                </div>
                                <button type="button" class="primary-btn" id="submitCondition">
                                    <?php echo vtranslate('Submit',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                                </button>
                            </div>
                            <div class="crm-action-section" id="CrmActionSection">
                                <div class="form-group">
                                    <label for="varAction"><?php echo vtranslate('Select an Action',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#selectActionModal"></i></label>
                                    <select class="select2 inputElement" id="varAction">
                                        <option value=""><?php echo vtranslate('Select an option',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</option>
                                        <option value="Search"><?php echo vtranslate('Search a record',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</option>
                                        <option value="Insert"><?php echo vtranslate('Create a record',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</option>
                                        <!-- <option value="Update"><?php echo vtranslate('Update a record',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</option> -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="varModules"><?php echo vtranslate('Modules',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#modulesmodal"></i></label>
                                    <select class="select2 inputElement" id="varModules">
                                         <option value=""><?php echo vtranslate('Select an option',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</option>
                                        <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['MODULLIST']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['MODULLIST']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['MODULLIST']->value[$_smarty_tpl->tpl_vars['i']->value]['tabid'];?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULLIST']->value[$_smarty_tpl->tpl_vars['i']->value]['name'],$_smarty_tpl->tpl_vars['MODULLIST']->value[$_smarty_tpl->tpl_vars['i']->value]['name']);?>
</option>
                                        <?php }
}
?>  
                                    </select>
                                </div> <br>
                                <h5><?php echo vtranslate('Set value associate with fields in vTiger',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#setvaluemodal"></i> </h5>
                                <div id="assignvariablefields">
                                    <div class="row">
                                        <div class="form-group  col-md-5 vtigerlabelfielddiv">
                                            <label for="varFields"><?php echo vtranslate('Vtiger Fields',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label>
                                        </div>
                                        <div class="form-group col-md-5 variablelabelfielddiv"  id="variablefieldblock">
                                            <label for="addMapping"><?php echo vtranslate('Saved Variables',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label>
                                        </div>
                                        <div class="form-group col-md-4 defaultvaluelabeldiv"  id="defaultvalueblock">
                                            <label for="defaultValue"><?php echo vtranslate('Default Value',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label>
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
                                                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['FIELDLISTS']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['FIELDLISTS']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?> 
                                                    <option  value="<?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['slug'];?>
"><?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['fieldname'];?>
</option>
                                                <?php }
}
?> 
                                            </select>
                                        </div>
                                        <div class="form-group defaultvaluediv"  id="defaultvalueblock">
                                            <input type="text" class="select2 inputElement defaultvalue" id="defaultvalue" placeholder="<?php echo vtranslate('Enter Value',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
">
                                        </div>
                                        <div class="form-group col-md-1 deletebuttondiv">
                                            <button onclick="removefield(this)" type="button" class="primary-btn pull-right" title="<?php echo vtranslate('Remove',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
" >
                                                <i class="fa fa-trash" ></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <div class="pull-right">
                                    <button onclick="addmorefield()" type="button" class="primary-btn" id="addNewMapping" title="<?php echo vtranslate('Add more',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
">
                                        <?php echo vtranslate('Add',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 <i class="fa fa-plus"></i>
                                       <!--  <i class="fa fa-plus" aria-hidden="true"></i> -->
                                    </button>
                                    
                                    <!-- <button onclick="removefield()" type="button" class="primary-btn" title="<?php echo vtranslate('Remove',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
" >
                                        <i class="fa fa-trash" ></i>
                                    </button> -->
                                    </div>
                                </div> <br>
                                <div id="relatedvariablefields" style="display:none;">
                                <h5><?php echo vtranslate('Associate Related Field',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 <i class="glyphicon glyphicon-question-sign" ></i></h5>
                                    <div class="relatedvariablefieldsblock">
                                        <div class="form-group">
                                            <select class="select2 inputElement" id="relatedModules" data-value="">
                                             <option value=""><?php echo vtranslate('Select an option',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</option>
                                        </select>
                                        </div>
                                        <div class="row">
                                            <div class="form-group  col-md-6 vtigerlabelfielddiv">
                                                <label for="varFields"><?php echo vtranslate('Vtiger Fields',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label>
                                            </div>
                                            <div class="form-group col-md-6 variablelabelfielddiv"  id="variablefieldblock">
                                                <label for="addMapping"><?php echo vtranslate('Saved Variables',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label>
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
                                                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['FIELDLISTS']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['FIELDLISTS']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?> 
                                                        <option  value="<?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['slug'];?>
"><?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['fieldname'];?>
</option>
                                                    <?php }
}
?> 
                                                </select>
                                            </div>
                                            <div class="form-group col-md-1 deletebuttondiv">
                                                <button onclick="removerelatedfield(this)" type="button" class="primary-btn pull-right" title="<?php echo vtranslate('Remove',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
" >
                                                    <i class="fa fa-trash" ></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="pull-right">
                                        <button onclick="addmorerelatedfield()" type="button" class="primary-btn" id="addNewMapping" title="<?php echo vtranslate('Add more',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
">
                                            <?php echo vtranslate('Add',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 <i class="fa fa-plus"></i>
                                           <!--  <i class="fa fa-plus" aria-hidden="true"></i> -->
                                        </button>
        
                                        </div>
                                    </div>
                                </div>

                                <h5><?php echo vtranslate('Return Response to Bot',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#returnboatmodal"></i></h5>
                                <div class="form-group col-md-6">
                                    <label for="varSelection"><?php echo vtranslate('Copy to variable',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label>
                                    <select class="select2 inputElement" id="responseVariable">
                                        <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['FIELDLISTS']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['FIELDLISTS']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?> 
                                            <option  value="@@<?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['slug'];?>
"><?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['fieldname'];?>
</option>
                                        <?php }
}
?> 
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="varSelection"><?php echo vtranslate('Copy from Vtiger Field',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label>
                                    <select class="select2 inputElement" id="responseVtiger"> 
                                    </select>
                                </div> 
                                <div class="form-group  col-md-12">
                                    <button type="button" class="primary-btn  pull-right" id="submitCrmAction">
                                        <?php echo vtranslate('Save Action',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

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
                            <li class="flow-builder-sidebar__heading"><?php echo vtranslate('Basic',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#basicmodal"></i></li>
                            <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="start-node" ondragstart="drag(event)"><i class="fa fa-fw fa-play-circle"
                                        style="color: #009b00;"></i><label><?php echo vtranslate('Start',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label></a>
                            </li>
                           <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="end-que-node" ondragstart="drag(event)"><i class="fa fa-fw fa-play-circle"
                                        style="color: red;"></i><label><?php echo vtranslate('End',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label></a>
                            </li>
                           
                            <li class="flow-builder-sidebar__heading"><?php echo vtranslate('Question/Response',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#questionresModal"></i></li>

                             <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="text-node" ondragstart="drag(event)"><i class="fa fa-fw fa-user-circle"
                                        style="color: #4ea9ff;"></i><label><?php echo vtranslate('Text/Response',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="options-node" ondragstart="drag(event)"><i class="fa fa-fw fa-usb"
                                        style="color: #4ea9ff;"></i><label><?php echo vtranslate('Choice question',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="condition-node" ondragstart="drag(event)"><i
                                        class="fa fa-fw fa-question-circle" style="color: #4ea9ff;"></i><label><?php echo vtranslate('Condition',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label></a>
                            </li>
                            <li class="flow-builder-sidebar__heading"><?php echo vtranslate('CRM',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#crmmodal"></i></li>
                            <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="crm-action-node" ondragstart="drag(event)"><i class="fa fa-fw fa-cogs"
                                        style="color: #4ea9ff;"></i><label><?php echo vtranslate('CRM Action',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label></a>
                            </li>
                            <li class="flow-builder-sidebar__heading" hidden><label><?php echo vtranslate('Condition & Loop',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label></li>
                            
                             <li class="flow-builder-sidebar__heading"><?php echo vtranslate('Variables',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 <i class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#variablemodal"></i><button  title="<?php echo vtranslate('Add Variables',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
" type="button"  id="fieldBtn" class="primary-btn" style="float:right">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button></li>
                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['FIELDLISTS']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['FIELDLISTS']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?> 
                             <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="false" data-field='<?php echo json_encode($_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]);?>
' id="<?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['slug'];?>
-que-node" data-node="<?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['slug'];?>
-que-node" ondragstart="drag(event)"><i class="<?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['iconclass'];?>
"
                                        style="color: #4ea9ff;"></i><label class="textwrap" title="<?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['fieldname'];?>
"><?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['fieldname'];?>
</label> &nbsp;<i class="fa fa-trash del" aria-hidden="true" data="<?php echo $_smarty_tpl->tpl_vars['FIELDLISTS']->value[$_smarty_tpl->tpl_vars['i']->value]['slug'];?>
" style="cursor: pointer;float: right;margin: 6px 0 0 0;"></i></a>

                            </li>
                            <?php }
}
?>  
                            <li hidden>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="loop-node" ondragstart="drag(event)"><i class="fa fa-fw fa-repeat"
                                        style="color: #4ea9ff;"></i><label><?php echo vtranslate('Loop',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</label></a>
                            </li>
                        </ul>
                    </div>

                    <div class="zoomInOut" style="text-align: center;">
                        <button type="button" class="primary-btn" id="zoomin" style="background-color: #ffffff;border-color: #ffffff;" title="<?php echo vtranslate('LBL_ZOOMIN',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
">
                            <img src="layouts/v7/modules/CTWhatsAppBusiness/image/zoomin.png" style="width: 23px;">
                        </button>
                        &nbsp;
                        <button type="button" class="primary-btn" id="zoomout" style="background-color: #ffffff;border-color: #ffffff;margin: 0px 0px 0px -10px;" title="<?php echo vtranslate('LBL_ZOOMOUT',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
">
                            <img src="layouts/v7/modules/CTWhatsAppBusiness/image/zoomout.png" style="width: 23px;">
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
                <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo vtranslate('Variables',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               <?php echo vtranslate('Variables use to copy answer from customer using bot like their name,email,phone etc. This will be use to map with respected CRM fields to Add/Search/Update To or From CRM',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo vtranslate('Close',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
         <div class="modal fade" id="responsetextmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top:150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo vtranslate('Response Text/Question',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               <?php echo vtranslate('Type message as an response or ask question to customer',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo vtranslate('Close',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</button>
              </div>
            </div>
          </div>
        </div>

       <!-- Modal -->
         <div class="modal fade" id="copyvariablemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top:150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo vtranslate('Copy From Variables',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               <?php echo vtranslate('Select variable to add or copy to the message which convert to actual value when sent message to customer',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo vtranslate('Close',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
         <div class="modal fade" id="responsefilemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top:150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo vtranslate('Response file',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               <?php echo vtranslate('Send Image/document as response to the customer along with text',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo vtranslate('Close',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
         <div class="modal fade" id="responsecopymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top:150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo vtranslate('Response Copy To Variables',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               <?php echo vtranslate('LBL_RESPONSE_COPY_TO_VARIABLE',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo vtranslate('Close',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
         <div class="modal fade" id="crmmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top:150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo vtranslate('CRM',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php echo vtranslate('With CRM Action You can Insert/Update/Search record To or From CRM',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo vtranslate('Close',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
         <div class="modal fade" id="returnboatmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top:150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo vtranslate('Return Response to Bot',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php echo vtranslate('On create/update/search on CRM it will return selected field value to customer to be display in WhatsApp bot',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo vtranslate('Close',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
         <div class="modal fade" id="modulesmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top:150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo vtranslate('Modules',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php echo vtranslate('Select module to search/create/update record to or from CRM',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo vtranslate('Close',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</button>
              </div>
            </div>
          </div>
        </div>

                <!-- Modal -->
        <div class="modal fade" id="varmessagetypemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top:150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo vtranslate('Message Type',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <b><?php echo vtranslate('Regular message',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 </b> - <?php echo vtranslate('This is a regular message type format sent to customers from Bot.',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                <br/>
                <b><?php echo vtranslate('WhatsApp Response',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</b> - <?php echo vtranslate('This message type will display responses to customers in WhatsApp format.',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo vtranslate('Close',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="messagetypemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top:150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo vtranslate('Message Type',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body"> 
                <b><?php echo vtranslate('Regular message',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 </b> - <?php echo vtranslate('This message type will display responses to customers in WhatsApp Regular format.',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                <a href="/layouts/v7/modules/CTWhatsAppBusiness/image/normalmessage.png" target="_blank" style="color: blue;"><?php echo vtranslate('click here',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</a> <?php echo vtranslate('to preview',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                <br/>
                <b><?php echo vtranslate('WhatsApp List message',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</b> - <?php echo vtranslate('This message type will display a response to customers as a WhatsApp list.',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                <a href="/layouts/v7/modules/CTWhatsAppBusiness/image/buttonlistmessage.png" target="_blank" style="color: blue;"><?php echo vtranslate('click here',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</a> <?php echo vtranslate('to preview',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                <br/>
                <b><?php echo vtranslate('WhatsApp Button message',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</b> - <?php echo vtranslate('This message type will display a response to the customer in WhatsApp button format.',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                <a href="/layouts/v7/modules/CTWhatsAppBusiness/image/buttonmessage.png" target="_blank" style="color: blue;"><?php echo vtranslate('click here',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</a> <?php echo vtranslate('to preview',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo vtranslate('Close',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</button>
              </div>
            </div>
          </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="selectActionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top: 150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo vtranslate('Select an Action',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php echo vtranslate('LBL_SELECTACTION_MESSAGE1',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                <br/>
                <b><?php echo vtranslate('Create a Record',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 </b> - <?php echo vtranslate('LBL_SELECTACTION_MESSAGE2',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                <br/>
                <b><?php echo vtranslate('Search a Record',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</b> - <?php echo vtranslate('LBL_SELECTACTION_MESSAGE3',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                <br/>
                <!-- <b><?php echo vtranslate('Update a Record',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</b> - <?php echo vtranslate('LBL_SELECTACTION_MESSAGE4',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo vtranslate('Close',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</button>
              </div>
            </div>
          </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="basicmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top: 150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo vtranslate('Basic',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <b><?php echo vtranslate('Start',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 </b> - <?php echo vtranslate('Use this node when you start designing the Bot flow.',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                <br/>
                <b><?php echo vtranslate('End',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</b> - <?php echo vtranslate('Use this node when you end designing the Bot flow.',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo vtranslate('Close',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</button>
              </div>
            </div>
          </div>
        </div>

         <!-- Modal -->
        <div class="modal fade" id="setvaluemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top: 150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo vtranslate('LBL_ASSIGNVALUE_MESSAGE1',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <b><?php echo vtranslate('vTiger field',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 </b> - <?php echo vtranslate('LBL_ASSIGNVALUE_MESSAGE2',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                <br/>
                <b><?php echo vtranslate('Saved variables',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</b> - <?php echo vtranslate("LBL_ASSIGNVALUE_MESSAGE3",$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo vtranslate('Close',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="questionresModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top: 150px !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo vtranslate('Question/Response',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                1. <?php echo vtranslate('With this feature user can set various Types of Questions in flow to Ask customer',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                <br/>
                2. <?php echo vtranslate('Add Condition to check it against response from customer in Bot.',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo vtranslate('Close',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</button>
              </div>
            </div>
          </div>
        </div>
        
        
        <!-- Demo Script -->
        <?php echo '<script'; ?>
>
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
              if(fieldname.trim() == ''){
                alert("please enter proper data");
                return false;
              }

              var question = $('#question').val();
              var iconclass = $('#iconclass').val();
              var params = {
                    'module' : 'CTWhatsAppBusiness',
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
                    'module' : 'CTWhatsAppBusiness',
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
                        window.location.href = "index.php?module=CTWhatsAppBusiness&view=WhatsappBot&mode=WhatsappBotList";
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
                            'module' : 'CTWhatsAppBusiness',
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
           
        <?php echo '</script'; ?>
>
        

        <?php echo '<script'; ?>
 type="text/javascript" src="layouts/v7/modules/CTWhatsAppBusiness/WhatsappBot/flow-builder-custom.js"><?php echo '</script'; ?>
>
    </div>
</body>

</html><?php }
}

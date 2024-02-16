<?php
/* Smarty version 3.1.39, created on 2023-09-27 12:10:44
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\CTWhatsAppBusiness\WhatsappBotList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65141bc483d1d8_80548086',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '98cf6fe1a1e2c2da5c8055b48587d0135219d1d7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\CTWhatsAppBusiness\\WhatsappBotList.tpl',
      1 => 1695618368,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65141bc483d1d8_80548086 (Smarty_Internal_Template $_smarty_tpl) {
?><style type="text/css">
	.bootstrap-switch .bootstrap-switch-handle-on.bootstrap-switch-primary, .bootstrap-switch .bootstrap-switch-handle-off.bootstrap-switch-primary {
		background: #70c257 !important;
	}

  .table-bordered td,.table-bordered th{
    border-left: none !important;
    border-right: none !important;
  }
</style>

<link rel="stylesheet" type="text/css" href="layouts/v7/modules/CTWhatsAppBusiness/WhatsappBot/dataTables.bootstrap.min.css" />
<?php echo '<script'; ?>
 type="text/javascript" src="layouts/v7/modules/CTWhatsAppBusiness/WhatsappBot/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="layouts/v7/modules/CTWhatsAppBusiness/WhatsappBot/dataTables.bootstrap.min.js"><?php echo '</script'; ?>
>

<div  class="detailViewContainer" id="ConfigEditorDetails" style="width: 96%;margin-left: 30px;">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="contents ">
            <?php if ($_smarty_tpl->tpl_vars['WHATSAPPMANAGEMENT']->value == 'multipleWhatsapp') {?>
                <div class="clearfix">
                    <h4 class="pull-left"><?php echo vtranslate('WhatsApp Bot',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</h4>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="btn-group pull-right" style="margin: 3px 10px 0px 0px;">
                      <?php if ($_smarty_tpl->tpl_vars['ISADMIN']->value == 'on') {?>
                        <label style="color:red;margin: 4px -30px 0px 10px;"><?php echo vtranslate('LBL_DAYS',$_smarty_tpl->tpl_vars['SETTINGMODULE']->value);?>
 <strong><?php echo $_smarty_tpl->tpl_vars['DAYREMAINING']->value;?>
</strong> <?php echo vtranslate('LBL_EXPIRE',$_smarty_tpl->tpl_vars['SETTINGMODULE']->value);?>
 </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        
                        <button class="btn btn-success editButton hide" type="button" onclick="window.location.href='index.php?module=CTWhatsAppBusiness&view=WhatsappBot&mode=whatsAppBotLicenseDetail'" style="margin: 0px 25px 0px 0px;"><?php echo vtranslate('LBL_LICENSE',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                      <?php }?>

                        <button class="btn btn-success editButton createNewBot" type="button"><?php echo vtranslate('Add New Bot',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;

                        <a onclick="window.location.href='index.php?module=CTWhatsAppBusiness&view=WhatsappBot&mode=whatsAppBotSetting'"><img src="layouts/v7/modules/CTWhatsAppBusiness/image/settings_green.png" style="width: 24px;" title="<?php echo vtranslate('WHATSAPPBOT_BUTTON_SETTING',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
"></a>
                        &nbsp;&nbsp;
                        <a onclick="window.location.href='index.php?module=CTWhatsAppBusiness&view=DashBoard&mode=moduleDashBoard&analytics=1'"><img src="layouts/v7/modules/CTWhatsAppBusiness/image/wa_analytics.png" style="width: 24px;" title="<?php echo vtranslate('LBL_ANALYTICS',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
"></a>
                    </div>
                </div><hr>

                <!-- <?php if ($_smarty_tpl->tpl_vars['TOTALSENDMESSAGE']->value > $_smarty_tpl->tpl_vars['SENDMESSAGELIMIT']->value) {?>
                    <span><b><?php echo vtranslate('MESSAGELIMITCONDITION',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</b></span>
                <?php } else { ?>
                    <span class="messageLimit"><b><?php echo vtranslate('MESSAGELIMITBOT1',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 <?php echo $_smarty_tpl->tpl_vars['TOTALSENDMESSAGE']->value;?>
 <?php echo vtranslate('MESSAGELIMITBOT2',$_smarty_tpl->tpl_vars['MODULENAME']->value);
echo $_smarty_tpl->tpl_vars['SENDMESSAGELIMIT']->value;
echo vtranslate('MESSAGELIMITBOT3',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</b></span>
                <?php }?> -->
                
    			<table class="table table-bordered" id="listview-table">
    				<thead>
    					<tr class="listViewContentHeader">
    						<th nowrap=""></th>
    						<!-- <th nowrap=""><?php echo vtranslate('WhatsApp Bot ID',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</th> -->
    						<th nowrap=""><?php echo vtranslate('Bot Name',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</th>
                            <th nowrap=""><?php echo vtranslate('LBL_CHATCOUNT',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</th>
                            <th nowrap=""><?php echo vtranslate('LBL_NOOFRESPONSE_PENDING',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</th>
                            <th nowrap=""><?php echo vtranslate('LBL_LASTEDATETIME',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</th>
                            <th nowrap=""><?php echo vtranslate('LBL_ASSIGNED_TO',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</th>
    						<th nowrap=""><?php echo vtranslate('Status',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</th>
    						<th nowrap=""><?php echo vtranslate('WhatsApp Number',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</th>
    						<th nowrap=""><?php echo vtranslate('Action',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</th>
    						<!-- <th nowrap=""></th> -->
    					</tr>

    				</thead>
    			</table>
            <?php } else { ?>
                <div class="clearfix">
                    <h4 class="pull-left"><?php echo vtranslate('WhatsApp Bot',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</h4>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <hr>
                <div style="font-size: 20px;">
                    <?php echo vtranslate('WHATSAPPBOT_AVTIVE_MESSAGE',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                    <?php if ($_smarty_tpl->tpl_vars['ISADMIN']->value == 0) {?>
                      <?php echo vtranslate('WHATSAPPBOT_NONADMINUSER',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>

                    <?php }?>
                </div>
            <?php }?>
		</div>
	</div>
</div>


<?php echo '<script'; ?>
 type="text/javascript" src="libraries/jquery/bootstrapswitch/js/bootstrap-switch.min.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="libraries/jquery/bootstrapswitch/css/bootstrap3/bootstrap-switch.min.css">
<?php echo '<script'; ?>
 type="text/javascript">
	$( document ).ready(function(event) {
        $('#appnav').addClass('hide');
        $('.app-footer').addClass('hide');
    });

    var mainmodule = 'CTWhatsAppBusiness';
    var view = 'WhatsappBot';
    var action = 'GetWhatsappBotList';
    var url = "index.php?module="+mainmodule+"&view="+view+"&mode="+action;

    setTimeout(function(){
     chatbottable = jQuery('#listview-table').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'pageLength' : 10,
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':url
      },
     
      "drawCallback": function( settings ) {
            jQuery('input[type=checkbox]').each(function () {
                var currentTarget = jQuery(this);
                var botid = currentTarget.attr('data-botid');
                var whatsappbotstatus = currentTarget.attr('data-scannumber');
                if(whatsappbotstatus){
                    currentTarget.bootstrapSwitch();
                }else{
                    currentTarget.bootstrapSwitch('disabled', true);
                }
            });
       },
      "columns": [
        { "data": "checkbox","orderable":true },
        { "data": "botname","orderable":false},
        { "data": "totalbotmessage","orderable":false},
        { "data": "customerResponseCount","orderable":false},
        { "data": "lastemessagedatetime","orderable":false},
        { "data": "assignuserid","orderable":false },
        { "data": "status","orderable":false },
        { "data": "scanwhatsapp_number","orderable":false},
        { "data": "action","orderable":false }
      ],
      "language": {
              "search":app.vtranslate('search'),
              "searchPlaceholder":app.vtranslate('Search by Bot Name'),
              "sProcessing": app.vtranslate('Processing'),
              "sEmptyTable": app.vtranslate('No data available in table'),
              "sInfo": app.vtranslate('Showing')+" _START_ "+app.vtranslate('to')+" _END_ "+app.vtranslate('of')+" _TOTAL_ "+app.vtranslate('entries'),
              "sInfoEmpty": app.vtranslate('Showing')+" 0 "+app.vtranslate('to')+" 0 "+app.vtranslate('of')+" 0 "+app.vtranslate('entries'),
              "oPaginate": {
                  "sFirst": app.vtranslate('First'),   
                  "sLast": app.vtranslate('Last'),  
                  "sNext":   app.vtranslate('Next'), 
                  "sPrevious": app.vtranslate('Previous'),
              },
          }
      });
      },1000);
<?php echo '</script'; ?>
>
<?php }
}

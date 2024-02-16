{*+**********************************************************************************
* The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
************************************************************************************}
<style type="text/css">
	.bootstrap-switch .bootstrap-switch-handle-on.bootstrap-switch-primary, .bootstrap-switch .bootstrap-switch-handle-off.bootstrap-switch-primary {
		background: #70c257 !important;
	}

  .table-bordered td,.table-bordered th{
    border-left: none !important;
    border-right: none !important;
  }
</style>

<link rel="stylesheet" type="text/css" href="layouts/v7/modules/CTWhatsApp/WhatsappBot/dataTables.bootstrap.min.css" />
<script type="text/javascript" src="layouts/v7/modules/CTWhatsApp/WhatsappBot/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="layouts/v7/modules/CTWhatsApp/WhatsappBot/dataTables.bootstrap.min.js"></script>

<div  class="detailViewContainer" id="ConfigEditorDetails" style="width: 96%;margin-left: 30px;">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="contents ">
            {if $WHATSAPPMANAGEMENT eq 'multipleWhatsapp'}
                <div class="clearfix">
                    <h4 class="pull-left">{vtranslate('WhatsApp Bot', $MODULENAME)}</h4>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="btn-group pull-right" style="margin: 0px 10px 0px 0px;">
                      {if $ISADMIN eq 1}
                        <label style="color:red;margin: 4px -30px 0px 10px;">{vtranslate('LBL_DAYS',$SETTINGMODULE)} <strong>{$DAYREMAINING}</strong> {vtranslate('LBL_EXPIRE',$SETTINGMODULE)} </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        
                        <button class="btn btn-success editButton" type="button" onclick="window.location.href='index.php?module=CTWhatsApp&view=WhatsappBot&mode=whatsAppBotLicenseDetail'" style="margin: 0px 25px 0px 0px;">{vtranslate('LBL_LICENSE', $MODULENAME)}</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                      {/if}

                        <button class="btn btn-success editButton createNewBot" type="button">{vtranslate('Add New Bot', $MODULENAME)}</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;

                        <a onclick="window.location.href='index.php?module=CTWhatsApp&view=WhatsappBot&mode=whatsAppBotSetting'"><img src="layouts/v7/modules/CTWhatsApp/image/settings_green.png" style="width: 24px;"></a>
                        &nbsp;&nbsp;
                        <a onclick="window.location.href='index.php?module=CTWhatsApp&view=DashBoard&mode=moduleDashBoard&analytics=1'"><img src="layouts/v7/modules/CTWhatsApp/image/wa_analytics.png" style="width: 24px;"></a>
                    </div>
                </div><hr>

                <br>
                {if $TOTALSENDMESSAGE gt $SENDMESSAGELIMIT}
                    <span><b>{vtranslate('MESSAGELIMITCONDITION', $MODULENAME)}</b></span>
                {else}
                    <span class="messageLimit"><b>{vtranslate('MESSAGELIMITBOT1', $MODULENAME)} {$TOTALSENDMESSAGE} {vtranslate('MESSAGELIMITBOT2', $MODULENAME)}{$SENDMESSAGELIMIT}{vtranslate('MESSAGELIMITBOT3', $MODULENAME)}</b></span>
                {/if}
                
                <br>
    			<table class="table table-bordered" id="listview-table">
    				<thead>
    					<tr class="listViewContentHeader">
    						<th nowrap=""></th>
    						<!-- <th nowrap="">{vtranslate('WhatsApp Bot ID', $MODULENAME)}</th> -->
    						<th nowrap="">{vtranslate('Bot Name',$MODULENAME)}</th>
                            <th nowrap="">{vtranslate('LBL_CHATCOUNT',$MODULENAME)}</th>
                            <th nowrap="">{vtranslate('LBL_NOOFRESPONSE_PENDING',$MODULENAME)}</th>
                            <th nowrap="">{vtranslate('LBL_LASTEDATETIME',$MODULENAME)}</th>
                            <th nowrap="">{vtranslate('LBL_ASSIGNED_TO',$MODULENAME)}</th>
    						<th nowrap="">{vtranslate('Status',$MODULENAME)}</th>
    						<th nowrap="">{vtranslate('WhatsApp Number',$MODULENAME)}</th>
    						<th nowrap="">{vtranslate('Action', $MODULENAME)}</th>
    						<!-- <th nowrap=""></th> -->
    					</tr>

    				</thead>
    			</table>
            {else}
                <div class="clearfix">
                    <h4 class="pull-left">{vtranslate('WhatsApp Bot', $MODULENAME)}</h4>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <hr>
                <div style="font-size: 20px;">
                    {vtranslate('WHATSAPPBOT_AVTIVE_MESSAGE', $MODULENAME)}
                    {if $ISADMIN eq 0}
                      {vtranslate('WHATSAPPBOT_NONADMINUSER', $MODULENAME)}
                    {/if}
                </div>
            {/if}
		</div>
	</div>
</div>

{literal}
<script type="text/javascript" src="libraries/jquery/bootstrapswitch/js/bootstrap-switch.min.js"></script>
<link rel="stylesheet" href="libraries/jquery/bootstrapswitch/css/bootstrap3/bootstrap-switch.min.css">
<script type="text/javascript">
	/*$( document ).ready(function(event) {
        $('#appnav').addClass('hide');
        jQuery("input[type='checkbox']").bootstrapSwitch();
    });*/

    var mainmodule = 'CTWhatsApp';
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
</script>
{/literal}
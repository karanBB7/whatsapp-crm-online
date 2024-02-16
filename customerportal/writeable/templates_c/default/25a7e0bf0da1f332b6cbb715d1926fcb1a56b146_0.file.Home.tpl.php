<?php
/* Smarty version 3.1.39, created on 2023-08-09 06:33:47
  from 'C:\xampp\htdocs\vtigercrm\customerportal\layouts\default\templates\Portal\Home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_64d3172b56b703_48199565',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '25a7e0bf0da1f332b6cbb715d1926fcb1a56b146' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\customerportal\\layouts\\default\\templates\\Portal\\Home.tpl',
      1 => 1669294712,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64d3172b56b703_48199565 (Smarty_Internal_Template $_smarty_tpl) {
?>

    <div ng-controller="Home_Component" class="container-fluid main-container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" ng-if="profileFetched">
                        <h2 title="{{org}}" class="portal-welcome">{{'Welcome to' | translate}} {{org|limitTo:25}}{{org.length > 25? '...' : ''}} {{'Portal' | translate}}</h2>
                    </div>
                    <div ng-if="supportNotification" class="pull-right col-md-3 col-lg-3 col-sm-3 col-xs-3">
                        <div class="alert alert-danger alert-dismissible portal-alert" role="alert">
                            <button type="button" class="close support-notification-close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong class="support-notification">{{'Your support ends on' | translate}}&nbsp;{{notification}}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div ng-if="announcementExists" class="alert alert-warning portal-announcement">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p ng-bind-html="announcement">  {{announcement}}</p>
                </div>
                <div class="row charts-container">
                    <div ng-repeat="(name,value) in enabledCharts" ng-if="name!='language' && name!='count'">
                        <ng-switch on="value.type">
                            <div ng-class="applyChartClass($index)">
                                <div ng-switch-when="spline"><div class="panel panel-default"><div class="panel-heading separator"> <div class="panel-title" translate="{{name}}">{{name}}</div></div>
                                        <cp-line items="value.data"></cp-line></div></div>
                                <div ng-switch-when="pie"><div class="panel panel-default"><div class="panel-heading separator"> <div class="panel-title" translate="{{name}}">{{name}}</div></div>
                                        <cp-pie items="value.data"></cp-pie></div></div>
                            </div>

                    </div>

                </div>
                <div class="row tickets-panel-container" ng-if="activateRecentTickets">
                    <div class="panel-heading separator"><div class="tickets panel-title">{{'Recent'|translate}} {{ticketsUiLabel}}</div></div>
                    <div ng-repeat="recentTicket in recentTickets" ng-if="recentTickets.length>0">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="panel panel-default tickets-panel-content">
                                <div class="tickets-panel-heading separator">
                                    <div class="ticket-panel-title" ng-class='{"first-ticket-panel-title":$index==0}'><a ng-click="loadRecentRecord('HelpDesk',recentTicket.id)">{{recentTicket.label}}</a>


                                          <strong class="text-primary pull-right"><span class="label" ng-class="determineStatus(recentTicket.status)">{{recentTicket.statuslabel}}</span></strong>

                                    </div>
                                </div>
                                <div class="panel-body tickets-panel-body" ng-if="recentTicket.description">
                                    <p style="white-space: pre-line;">{{recentTicket.description}}</p>
                                </div>
                                <hr ng-show="!$last">
                            </div>
                        </div>
                        </div>
                        </div>
                        <br>
                        <br>
<br><br>
        </div>

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 shortcut-container">
                <div class="panel panel-default" ng-if="showShortcuts">
                    <div class="panel-heading separator">
                        <div class="panel-title">{{'What would you like to do ?' | translate}}

                        </div>
                    </div>
                    <div class="support panel-body">
                        <div class="row">
                            <div ng-repeat="(module,actions) in shortcuts" class="col-lg-12 shortcut-done">
                                <h5>{{module}}</h5>
                                <div class="col-lg-12 shortcut-button"   ng-class-even="'even-button'" ng-repeat="action in actions" >
                                    <button  translate="{{action}}" ng-click="openShortcut(module,action)" class="btn btn-default">{{action}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default" ng-repeat="(module,values) in recentRecords" ng-if="ifNotTickets(module) && isObj(values)">
                    <div class="panel-heading separator">
                        <div class="panel-title" >{{'Recent'|translate}} {{module|translate}}
                        </div>
                    </div>
                    <div class="shortcut panel-body" >
                        <div class="row" >
                            <div class="col-lg-12 recent-list">

                                <ul class="nav">
                                    <li ng-repeat="value in values"><a ng-if="module!=='Faq'" ng-click="loadRecentRecord(module,value.id)">{{value.label}}</a></li>
                                    <li ng-repeat="value in values"><a ng-if="module==='Faq'" ng-click="loadRecentRecord(module,value.id)">{{value.label}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo portal_componentjs_file('HelpDesk');?>
"><?php echo '</script'; ?>
>
    <?php $_smarty_tpl->_subTemplateRender(portal_template_resolve('HelpDesk',"partials/IndexContentAfter.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo portal_componentjs_file('Documents');?>
"><?php echo '</script'; ?>
>
    <?php $_smarty_tpl->_subTemplateRender(portal_template_resolve('Documents',"partials/IndexContentAfter.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
</div>
<?php }
}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> 
    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
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
    .modal-content {
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
</style>
</head>

<body>
    <div class="flow-builder-dasboard-container  flow-builder-fixed-sidebar flow-builder-fixed-header">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
        <link rel="stylesheet" href="layouts/v7/modules/CTWhatsAppBusiness/WhatsappBot/temp.css">
        <link rel="stylesheet" href="layouts/v7/modules/CTWhatsAppBusiness/WhatsappBot/drag-flow-app.css">
        <link rel="stylesheet" href="layouts/v7/modules/CTWhatsAppBusiness/WhatsappBot/flowBuilder.min.css">
        <link rel="stylesheet" href="layouts/v7/modules/CTWhatsAppBusiness/WhatsappBot/demo-app.css">
        <script src="layouts/v7/modules/CTWhatsAppBusiness/WhatsappBot/flowBuilder.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
        <div class="flow-builder-header header-shadow">
        	 <div id="fieldModal" class="modal">

	  <!-- Modal content -->
	  <div class="modal-content">
	    <span class="close">&times;</span>
	    <p>
	    	<h2>Variables</h2>
	    	<div class="form-group">
	            <label for="fieldname">Variable Name</label>
	            <input type="text" class="form-control" id="fieldname">
        	</div>
        	<div class="form-group">
	            <label for="question">Question</label>
	            <input type="text" class="form-control" id="question">
        	</div>
        	<div class="form-group" style="display: none;">
	            <label for="iconclass">Icon class</label>
	            <input type="text" class="form-control" id="iconclass" value="fa fa-fw fa-circle">
        	</div>
	        <button type="button" class="primary-btn" id="submitFields">
	            Submit
	        </button>
    	</p>
	  </div>

	</div>
            <div class="flow-builder-header__logo">
                <div>
                    <h2>Flow Builder</h2>
                </div>
            </div>
            <div class="flow-builder-header__content">
                <div class="flow-builder-header-right">
                    <button type="button" class=" btn btn-default" id="addNewFlowBtn">
                        Add
                    </button>&nbsp;&nbsp;&nbsp;
                    <button type="button" class=" btn btn-default hide" id="exportBtn">
                        Export
                    </button>
                    <button type="button" class=" btn btn-default hide" id="ImportBtn">
                        Import
                    </button>
                    <button type="button" class=" btn btn-success" id="SaveFlowBtn">
                        Save
                    </button>
                    <a class='cancelLink' href="javascript:history.back()" type="reset">{vtranslate('LBL_CANCEL', $MODULE)}</a>
                </div>
            </div>
        </div>
        <div id="settingSection" class="element-setting">
            <button type="button" id="settingButton" class="btn-open-options btn btn-warning">
                <i class="fa fa-w-16 fa-2x fa-cog"></i>
            </button>
            <input type="hidden" name="botRecordid" id="botRecordid" value="{$BOTRECORDID}">
            <input type="hidden" name="defaultFlow" id="defaultFlow" value="{$BOTJSON}">
            <div class="node-settings__inner">
                <div class="scrollbar-container">
                    <div class="node-settings__options-wrapper">
                        <h3 class="options-heading">Setting</h3>
                        <div class="options-body" id="optionsBody">
                            <div class="text-element-section">
                                <div class="form-group">
                                    <label for="textMsgInput">Response Text Message</label>
                                    <textarea name="textMsgInput" id="textMsgInput" class="form-control"></textarea>
                                    <div id="insertVariableList1" class="dropdown-content">
                                        {for $i=0 to count($FIELDLISTS)-1 } 
                                        <a data-item-value="@@{$FIELDLISTS[$i]['slug']}">{$FIELDLISTS[$i]['slug']} </a>
                                         {/for}  
                                    </div>
                                    <div class="form-group">
                                    <label for="varFormat">Format</label>
                                    <select class="mb-2 form-control" id="varFormat2" >
                                        <option>TEXT</option><option>NUMBER</option><option>EMAIL</option><option>DATE</option>
                                     </select>
                                </div>
                                </div>
                                <button type="button" class="primary-btn" id="submitName">
                                    Submit
                                </button>
                            </div>
                            <div class="question-element-section">
                                <div class="form-group">
                                    <label for="textQuestionInput">Question </label>
                                    <textarea name="textQuestionInput" id="textQuestionInput" class="form-control"></textarea>
                                    <div class="dropdown" style="margin-top: 4px;">
                                        <button id="insertVariable" class="dropbtn">Add Variables</button>
                                        <div id="insertVariableList" class="dropdown-content">
                                        	{for $i=0 to count($FIELDLISTS)-1 } 
                                        	<a data-item-value="@@{$FIELDLISTS[$i]['slug']}">{$FIELDLISTS[$i]['slug']} </a>
 				                             {/for}  
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label for="varSelection">Save answers in the variable</label>
                                    <select class="mb-2 form-control" id="varSelection" disabled>
                                    	{for $i=0 to count($FIELDLISTS)-1 } 
	                                    	<option  value="@@{$FIELDLISTS[$i]['slug']}">{$FIELDLISTS[$i]['fieldname']}</option>
		                             	{/for} 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="varFormat1">Format</label>
                                    <select class="mb-2 form-control" id="varFormat1">
                                        <option>TEXT</option><option>NUMBER</option><option>EMAIL</option><option>DATE</option>
                                     </select>
                                </div>
                                <button type="button" class="primary-btn" id="submitQuestion">
                                    Submit
                                </button>
                            </div>

                            <div class="options-element-section">
                                <div class="form-group">
                                    <label for="optionQuestion">Text Message</label>
                                    <input type="text" class="form-control" id="optionQuestion">
                                </div>
                                <button type="button" class="primary-btn" id="submitOption">
                                    Submit
                                </button>
                                <div class="form-group" style="margin-top: 16px;">
                                    <label for="addOptions">Add option</label>
                                    <input type="text" id="addOptions" class="form-control">
                                    <button type="button" class="primary-btn" id="addNewOption">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>

                                <ul class="options-list-group" id="optionsList">
                                </ul>
                            </div>
                            <div class="condition-element-section">
                                <div class="form-group">
                                    <label for="conditionQuestion">Add Condition</label>
                                    <textarea name="conditionQuestion" id="conditionQuestion" class="form-control"></textarea>
                                </div>
                                <button type="button" class="primary-btn" id="submitCondition">
                                    Submit
                                </button>
                            </div>
                            <div class="crm-action-section" id="CrmActionSection">
                                <div class="form-group">
                                    <label for="varAction">Action</label>
                                    <select class="mb-2 form-control" id="varAction">
                                        <option value="Search">Search</option>
                                        <option value="Insert">Insert</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="varModules">Modules</label>
                                    <select class="mb-2 form-control" id="varModules">
                                        {for $i=0 to count($MODULLIST)-1 }
                                            <option value="{$MODULLIST[$i]['tabid']}">{$MODULLIST[$i]['name']}</option>
                                        {/for}  
                                    </select>
                                </div> <br>
                                <h4>Assign Variables to Fields</h4>
                                 <div class="form-group col-md-6"  id="variablefieldblock">
                                    <label for="addMapping">Saved Variables</label>
                                    <span id="fieldnode">
                                    <select id="addMapping" class="mb-2 form-control">
                                        {for $i=0 to count($FIELDLISTS)-1 } 
	                                    	<option  value="{$FIELDLISTS[$i]['slug']}">{$FIELDLISTS[$i]['fieldname']}</option>
		                             	{/for} 
                                    </select> 
                                    </span>
                                </div>
                                 <div class="form-group  col-md-6">
                                    <label for="varFields">Vtiger Fields</label>
                                    <span id="fieldvt">
                                    <select class="vtigerfield mb-2 form-control" id="varFields"></select>
                                    </span>
                                </div> 
                                 <div class="form-group  col-md-6">
                                    <button onclick="addmorefield()" type="button" class="primary-btn" id="addNewMapping">
                                        Add more
                                       <!--  <i class="fa fa-plus" aria-hidden="true"></i> -->
                                    </button>
                                </div>
                                <div class="form-group  col-md-6">
                                    <button onclick="removefield()" type="button" class="primary-btn"  >
                                       Remove
                                       <!--  <i class="fa fa-plus" aria-hidden="true"></i> -->
                                    </button>
                                </div> <br>
                                <h4>Assign Response</h4>
                                <div class="form-group col-md-6">
                                    <label for="varSelection">Response variable</label>
                                    <select class="mb-2 form-control" id="responseVariable">
                                        {for $i=0 to count($FIELDLISTS)-1 } 
                                            <option  value="@@{$FIELDLISTS[$i]['slug']}">{$FIELDLISTS[$i]['fieldname']}</option>
                                        {/for} 
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="varSelection">Vtiger Fields</label>
                                    <select class="mb-2 form-control" id="responseVtiger"> 
                                    </select>
                                </div>
                                <div class="form-group  col-md-12">
                                    <button type="button" class="primary-btn  pull-right" id="submitCrmAction">
                                        Save Action
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
                            <li class="flow-builder-sidebar__heading">Basic</li>
                            <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="start-node" ondragstart="drag(event)"><i class="fa fa-fw fa-play-circle"
                                        style="color: #009b00;"></i>Start</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="text-node" ondragstart="drag(event)"><i class="fa fa-fw fa-user-circle"
                                        style="color: #f58800;"></i>Response Text</a>
                            </li>
                            <li class="flow-builder-sidebar__heading">Questions <button  title="Add Variables" type="button"  id="fieldBtn" class="primary-btn" style="float:right">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button></li>
                            {for $i=0 to count($FIELDLISTS)-1 } 
                             <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-field='{$FIELDLISTS[$i]|@json_encode}' id="{$FIELDLISTS[$i]['slug']}-que-node" data-node="{$FIELDLISTS[$i]['slug']}-que-node" ondragstart="drag(event)"><i class="{$FIELDLISTS[$i]['iconclass']}"
                                        style="color: #f5009e;"></i>{$FIELDLISTS[$i]['fieldname']}</a>
                            </li>
                            {/for}  
                            <!-- <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="name-que-node" ondragstart="drag(event)"><i class="fa fa-fw fa-user-circle"
                                        style="color: #f5009e;"></i>Name</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="number-que-node" ondragstart="drag(event)"><i
                                        class="fa fa-fw fa-sort-numeric-asc" style="color: #f5009e;"></i>Number</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="date-que-node" ondragstart="drag(event)"><i class="fa fa-fw fa-calendar"
                                        style="color: #f5009e;"></i>Date</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="email-que-node" ondragstart="drag(event)"><i class="fa fa-fw fa-envelope"
                                        style="color: #f5009e;"></i>Email</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="other-que-node" ondragstart="drag(event)"><i class="fa fa-fw fa-user-circle"
                                        style="color: #f5009e;"></i>Other</a>
                            </li> -->
                            <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="options-node" ondragstart="drag(event)"><i class="fa fa-fw fa-usb"
                                        style="color: #f5009e;"></i>Options</a>
                            </li>
                            <li class="flow-builder-sidebar__heading">CRM</li>
                            <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="crm-action-node" ondragstart="drag(event)"><i class="fa fa-fw fa-cogs"
                                        style="color: #4ea9ff;"></i>CRM Action</a>
                            </li>
                            <li class="flow-builder-sidebar__heading" hidden>Condition & Loop</li>
                            <li>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="condition-node" ondragstart="drag(event)"><i
                                        class="fa fa-fw fa-question-circle" style="color: #26f500;"></i>Condition</a>
                            </li>
                            <li hidden>
                                <a href="javascript:void(0)" class="drag-drawflow" draggable="true" data-node="loop-node" ondragstart="drag(event)"><i class="fa fa-fw fa-repeat"
                                        style="color: #26f500;"></i>Loop</a>
                            </li>
                        </ul>
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
        
        <!-- Demo Script -->
        <script>
            function addmorefield() {
                document.getElementById("submitCrmAction").click();
                var fieldnode = '<select  class="mb-2 form-control"> '+ $("#fieldnode select").html()+ ' </select> ' ;
                var fieldvt = '<select class="vtigerfield mb-2 form-control"> '+ $(".vtigerfield").html()+ ' </select> ' ; 
                
                document.getElementById("fieldvt").innerHTML=document.getElementById("fieldvt").innerHTML+fieldvt;
                document.getElementById("fieldnode").innerHTML=document.getElementById("fieldnode").innerHTML+fieldnode;
                var fields = document.querySelectorAll('#fieldnode select');
                var vtigerfields = document.querySelectorAll('.vtigerfield');
                for (var j = 0; j < selectedNode.data.fieldmappping.length; j++) {
                    if(selectedNode.data.fieldmappping){   
                        vtigerfields[j].value=selectedNode.data.fieldmappping[j].vtigerfield;
                        fields[j].value=selectedNode.data.fieldmappping[j].flowbuilderfield; 
                    }
                }
               
            } 

            function removefield() {
                document.getElementById("submitCrmAction").click();
                var fieldnode = document.getElementById("fieldnode");;
                var fieldvt = document.getElementById("fieldvt"); 
                if(document.getElementById("fieldvt").childElementCount>1){
                    fieldnode.removeChild(fieldnode.lastChild);
                    fieldvt.removeChild(fieldvt.lastChild);
                }  
               
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
                    'module' : 'CTWhatsAppBusiness',
                    'view' : "WhatsappBot",
                    'mode' : "addFBFields",
                    'fieldname' : fieldname,
                    'question' : question,
                    'iconclass' : iconclass
                }
                if(fieldname !='' && question !='' && iconclass !=''){
	                app.helper.showProgress();
	                AppConnector.request(params).then(
	                    function(data) {
	                        app.helper.hideProgress();
	                        window.location.href = "";
	                });
                }else{
                	alert("please enter porper data");
                }
			}
            document.getElementById("varAction").addEventListener("change", changeposition);
            function changeposition(){
                if(document.getElementById("varAction").value=='Search'){
                    document.getElementById("variablefieldblock").setAttribute("style", "float: right;");
                }else{
                    document.getElementById("variablefieldblock").removeAttribute("style");
                }
                
            }
            //Save flow event example
            document.getElementById("SaveFlowBtn").addEventListener("saveFlow", function(event) {
                var flowJson = event.detail.data.flowData;
                var crmJson = event.detail.data.crmData;
                var botRecordid = $('#botRecordid').val();
                var params = {
                    'module' : 'CTWhatsAppBusiness',
                    'view' : "WhatsappBot",
                    'mode' : "getWhatsappBotFlowData",
                    'flowData' : flowJson,
                    'crmJson' : crmJson,
                    'botRecordid' : botRecordid
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
                var defaultFlow = JSON.parse(flowvalue);
                importFlow(defaultFlow);

                $('.closeSideBar').on('click', function(){
                    $('.closeSideBar').addClass('hide');
                    $('.openSideBar').removeClass('hide'); 
                    $('.flow-builder-sidebar').css('width', '0px');
                    $('.flow-builder-sidebar').css('min-width', '0px');
                    $('.flow-builder-sidebar').css('flex', '0 0 0px'); 
                    $('#drawflow').css('width', '126%');
                });

                $('.openSideBar').on('click', function(){
                    $('.openSideBar').addClass('hide');
                    $('.closeSideBar').removeClass('hide'); 
                    $('.flow-builder-sidebar').css('width', '180px');
                    $('.flow-builder-sidebar').css('min-width', '180px');
                    $('.flow-builder-sidebar').css('flex', '0 0 180px'); 
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
           
        </script>
        <script type="text/javascript" src="layouts/v7/modules/CTWhatsAppBusiness/WhatsappBot/flow-builder-custom.js"></script>
    </div>
</body>

</html>
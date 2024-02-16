
var id = document.getElementById("drawflow");
var editor = new Drawflow(id);
var selectedNode = null;
var selectedNodeId = null;

var event = new CustomEvent('highlight', {
    detail: { backgroundColor: 'yellow' }
});

editor.reroute = true;

editor.start();

var variableTypes = ["STRING", "NUMBER", "EMAIL", "DATE"];

var dateFormat = ["dd/mm/yyyy", "mm/dd/yyyy", "yyyy/dd/mm", "dd/mm/yy", "mm/dd/yy", "yy/dd/mm"];

var variables = [{ label: "NAME", value: "@@NAME", type: "STRING" }, { label: "NUMBER", value: "@@NUMBER", type: "NUMBER" }, { label: "EMAIL", value: "@@EMAIL", type: "EMAIL" }, { label: "DATE", value: "@@DATE", type: "DATE" }, { label: "ADDRESS", value: "@@ADDRESS", type: "STRING" }];

editor.on('nodeCreated', function (id) {
    setSelectedNode(id, "created");

    openSetting();
});

editor.on('nodeSelected', function (id) {
    setSelectedNode(id, "selected");

    openSetting();
});

document.getElementById('clsButton').onclick = function (event) {
    document.getElementById('settingSection').classList.toggle('settings-open');
};

document.getElementById("insertVariable").addEventListener("click", function (event) {
    event.preventDefault();
    document.getElementById("insertVariableList").classList.toggle("show");
});


document.getElementById("copyfrom").addEventListener("change", function (event) {
    var questionInput = document.getElementById("textMsgInput"); 
    questionInput.value = questionInput.value + "@@"+document.getElementById("copyfrom").value;
});

Array.from(document.getElementById("insertVariableList1").getElementsByTagName("a")).forEach(function (item) {
    item.addEventListener("click", function (event) {
        var questionInput = document.getElementById("textMsgInput"); 
        questionInput.value = questionInput.value + event.target.getAttribute("data-item-value");
    });
});


Array.from(document.getElementById("insertVariableList").getElementsByTagName("a")).forEach(function (item) {
    item.addEventListener("click", function (event) {
        var questionInput = document.getElementById("textQuestionInput");

        questionInput.value = questionInput.value + event.target.getAttribute("data-item-value");
    });
});

document.getElementById('SaveFlowBtn').onclick = function (event) {
    exportValue = editor.export(); 
    var newData = {};
    var nodes = Object.keys(exportValue.drawflow.Home.data);

    for (var index = 0; index < nodes.length; index++) {
        var key = nodes[index];

        var node = exportValue.drawflow.Home.data[key];

        newData = {...newData,[key]: {data: node.data,outputs: []}};

        var outPutKeys = Object.keys(node.outputs);
        //console.log(outPutKeys);
        for (var _index = 0; _index < outPutKeys.length; _index++) {

            var output = node.outputs[outPutKeys[_index]].connections;

            var connections = output.map(function (c) {
                return c.node;
            });
            newData[key].outputs.push(connections);
        }
        exportValue.drawflow.Home.data[key].html = document.getElementById("node-" + key).getElementsByClassName("drawflow_content_node")[0].innerHTML;
    }

    var saveBtn = document.getElementById("SaveFlowBtn");
    var crmEvent = new CustomEvent('saveFlow', {
        detail: {
            data: {
                flowData: JSON.stringify(exportValue),
                crmData: newData
            }
        }
    });
    saveBtn.dispatchEvent(crmEvent);
};

document.getElementById('settingButton').onclick = function (event) {
    document.getElementById('settingSection').classList.toggle('settings-open');
};

var html = "\n<div><input type=\"text\" df-name></div>\n";
var data = { "name": '' };

var elements = document.getElementsByClassName('drag-drawflow');
for (var i = 0; i < elements.length; i++) {
    elements[i].addEventListener('touchend', drop, false);
    elements[i].addEventListener('touchstart', drag, false); 
    elements[i].addEventListener("touchmove", handleMove, false);
}

function setSelectedNode(id, type) {
    selectedNodeId = id;
    selectedNode = editor.getNodeFromId(id);
    setSidePanel(type);
}


function setSidePanel(type) {
    var sections = Array.from(document.getElementById("optionsBody").children);

    sections.forEach(function (element) {
        element.classList.remove("show-node-section");
    });
     var optionType = selectedNode.data.type;
     switch (optionType) {
        case "text-node":
            document.getElementById("optionsBody").getElementsByClassName("text-element-section")[0].classList.add("show-node-section");
            document.querySelector('.options-heading span').innerHTML = app.vtranslate('Settings')+' - '+app.vtranslate('Text/Response');
            document.getElementById('clsButton').style.paddingLeft = '40%';
            document.getElementById("textMsgInput").value = selectedNode.data.question;
            if(selectedNode.data.format != '' && selectedNode.data.format != undefined){
               document.getElementById("varFormat2").value = selectedNode.data.format;
            }else{
                $('#varFormat2 option:eq(0)').prop('selected',true);
            }

            if(selectedNode.data.copyfrom != '' && selectedNode.data.copyfrom != undefined){
               document.getElementById("copyfrom").value = selectedNode.data.copyfrom;
            }else{
                $('#copyfrom option:eq(0)').prop('selected',true);
            }

            if(selectedNode.data.varmessagetype != '' && selectedNode.data.varmessagetype != undefined){
               document.getElementById("varmessagetype").value = selectedNode.data.varmessagetype;
            }else{
                $('#varmessagetype option:eq(0)').prop('selected',true);
            }

            if(selectedNode.data.copyto != '' && selectedNode.data.copyto != undefined){
               document.getElementById("copyto").value = selectedNode.data.copyto;
            }else{
                $('#copyto option:eq(0)').prop('selected',true);
            }
            
            if(selectedNode.data.responseimg != undefined && selectedNode.data.responseimg != ""){
                document.querySelector('#dispimg').setAttribute('src',selectedNode.data.responseimg);
            }else{
                document.querySelector('#dispimg').setAttribute('src',''); 
            }

            app.changeSelectElementView($('#optionsBody'));
            //register all select2 Elements
            app.showSelect2ElementView($('#optionsBody').find('select.select2'));
            break;
        case "options-node":
            document.getElementById("optionsBody").getElementsByClassName("options-element-section")[0].classList.add("show-node-section");
            document.querySelector('.options-heading span').innerHTML = app.vtranslate('Settings')+' - '+app.vtranslate('Choice question');
            document.getElementById('clsButton').style.paddingLeft = '37%';
            document.getElementById("optionQuestion").value = selectedNode.data.question;
            if(selectedNode.data.messagetype != '' && selectedNode.data.messagetype != undefined){
               document.getElementById("messagetype").value = selectedNode.data.messagetype;
            }else{
                $('#messagetype option:eq(0)').prop('selected',true);
            }

            var _list = document.getElementById("optionsList");
            _list.innerHTML = "";

            for (var index = 0; index < selectedNode.data.options.length; index++) {
                var element = selectedNode.data.options[index];
                var item = '<li class = "list-group-item ' + (index + 1) + '" >\n                                <span class = "option-label" > ' + element + ' </span> \n                                <span class = "delete-option" > \xD7 </span> </li >';
                _list.innerHTML += item;
            }

            app.changeSelectElementView($('#optionsBody'));
            //register all select2 Elements
            app.showSelect2ElementView($('#optionsBody').find('select.select2'));
            break;

        case "end-que-node":
            break;
        case "chatwithoperator-node":
            break;
        case "condition-node":
            document.getElementById("optionsBody").getElementsByClassName("condition-element-section")[0].classList.add("show-node-section");
            document.querySelector('.options-heading span').innerHTML = app.vtranslate('Settings')+' - '+app.vtranslate('Condition');
            document.getElementById('clsButton').style.paddingLeft = '51%';
            //document.getElementById("conditionQuestion").value = selectedNode.data.question;
            if(selectedNode.data.varConditon != '' && selectedNode.data.varConditon != undefined){
               jQuery('#varConditon').val(selectedNode.data.varConditon);
            }else{
                $('#varConditon option:eq(0)').prop('selected',true);
            }

            if(selectedNode.data.condition != '' && selectedNode.data.condition != undefined){
               jQuery('#condition').val(selectedNode.data.condition);
            }else{
                $('#condition option:eq(0)').prop('selected',true);
            }

            jQuery('#conditionQuestion').val(selectedNode.data.question);

            app.changeSelectElementView($('#optionsBody'));
            //register all select2 Elements
            app.showSelect2ElementView($('#optionsBody').find('select.select2'));

            break;
        /*case "options-node":*/
        case "loop-node":
            break;
        case "crm-action-node":
            var sideBar = document.getElementById("optionsBody");
            document.getElementById("optionsBody").getElementsByClassName("crm-action-section")[0].classList.add("show-node-section");
            document.getElementById("optionsBody").getElementsByClassName("question-element-section")[0].classList.remove("show-node-section");
            document.querySelector('.options-heading span').innerHTML = app.vtranslate('Settings')+' - '+app.vtranslate('CRM Action');
            document.getElementById('clsButton').style.paddingLeft = '47%';
            var crmEvent = new CustomEvent('crmActionEvents', {
                detail: {
                    type: optionType,
                    action: "crm-action-node",
                    nodeId: selectedNodeId,
                    data: selectedNode.data
                }
            });

            sideBar.dispatchEvent(crmEvent);
            if(selectedNode.data.action){
                jQuery("#varAction").val(selectedNode.data.action);
                jQuery('#varAction').trigger('change');
            }else{
                $('#varAction option:eq(0)').prop('selected',true);
            }

            if(selectedNode.data.responseVtiger != '' && selectedNode.data.responseVtiger != undefined){
                jQuery('#responseVtiger').data('value',selectedNode.data.responseVtiger);
            }else{
                $('#responseVtiger option:eq(0)').prop('selected',true);
            }

            if(selectedNode.data.tabid){
                jQuery("#varModules").val(selectedNode.data.tabid);
                jQuery('#varModules').trigger('change');
            }else{
                $('#varModules option:eq(0)').prop('selected',true);
            } 

            if(selectedNode.data.related_tabid){
                console.log(selectedNode.data.related_tabid);
                jQuery("#relatedvariablefields").find("#relatedModules").attr('data-value',selectedNode.data.related_tabid);
                getrelatedcrmfields();
                //jQuery('#relatedModules').trigger('change');
            }else{
                jQuery("#relatedvariablefields").find('#relatedModules option:eq(0)').prop('selected',true);
            } 
            
                 if(selectedNode.data.fieldmappping){
                    jQuery('.assignvariablefields').remove();
                    for (var i = 0; i < selectedNode.data.fieldmappping.length; i++){
                        if(selectedNode.data.fieldmappping){ 
                            var defaultFieldValue = selectedNode.data.fieldmappping[i].defaultvalue;
                            if(defaultFieldValue == undefined){
                                defaultFieldValue = '';
                            }
                            var html = '<div class="row assignvariablefields">';
                                html+='<div class="form-group  col-md-5 vtigerfielddiv">';
                                html+='<select class="vtigerfield select2 inputElement" id="varFields" data-value="'+selectedNode.data.fieldmappping[i].vtigerfield+'">';                   
                                html+='</select>';
                                html+='</div>'; 
                                html+='<div class="form-group col-md-5 variablefielddiv"  id="variablefieldblock">';
                                html+='<select id="addMapping" class="select2 inputElement variablefield" data-value="'+selectedNode.data.fieldmappping[i].flowbuilderfield+'">';              
                                html+='</select>';
                                html+='</div>';
                                html+='<div class="form-group defaultvaluediv"  id="defaultvalueblock">';
                                html+='<input type="text" class="select2 inputElement defaultvalue" id="defaultvalue" placeholder="Enter Value" value="'+defaultFieldValue+'">';
                                html+='</div>';
                                html+='<div class="form-group col-md-1 deletebuttondiv">';
                                html+='<button onclick="removefield(this)" type="button" class="primary-btn pull-right" title="Remove" >';
                                html+='<i class="fa fa-trash" ></i>';
                                html+='</button>';
                                html+='</div>';
                                html+='</div>';

                            jQuery('#assignvariablefields').append(html);

                            
                        } 
                    }

                }else{
                    jQuery('.assignvariablefields').remove();
                    var html = '<div class="row assignvariablefields">';
                    html+='<div class="form-group  col-md-4 vtigerfielddiv">';
                    html+='<select class="vtigerfield select2 inputElement" id="varFields" data-value="">';                   
                    html+='</select>';
                    html+='</div>'; 
                    html+='<div class="form-group col-md-4 variablefielddiv"  id="variablefieldblock">';
                    html+='<select id="addMapping" class="select2 inputElement variablefield" data-value="">';              
                    html+='</select>';
                    html+='</div>';
                    html+='<div class="form-group col-md-3 defaultvaluediv"  id="defaultvalueblock">';
                    html+='<input type="text" class="select2 inputElement defaultvalue" id="defaultvalue" placeholder="Enter Value" value="">';
                    html+='</div>';
                    html+='<div class="form-group col-md-1 deletebuttondiv">';
                    html+='<button onclick="removefield(this)" type="button" class="primary-btn pull-right" title="Remove" >';
                    html+='<i class="fa fa-trash" ></i>';
                    html+='</button>';
                    html+='</div>';
                    html+='</div>';

                    jQuery('#assignvariablefields').append(html); 
                }

                if(selectedNode.data.relatedfieldmappping){
                    jQuery('.relatedvariablefields').remove();
                    for (var i = 0; i < selectedNode.data.relatedfieldmappping.length; i++){
                        if(selectedNode.data.relatedfieldmappping){ 
                           
                            var html = '<div class="row relatedvariablefields">';
                                html+='<div class="form-group  col-md-6 relvtigerfielddiv">';
                                html+='<select class="relvtigerfield select2 inputElement" id="relvarFields" data-value="'+selectedNode.data.relatedfieldmappping[i].relvtigerfield+'">';                   
                                html+='</select>';
                                html+='</div>'; 
                                html+='<div class="form-group col-md-5 relvariablefielddiv"  id="relvariablefieldblock">';
                                html+='<select id="addMapping" class="select2 inputElement relvariablefield" data-value="'+selectedNode.data.relatedfieldmappping[i].relflowbuilderfield+'">';              
                                html+='</select>';
                                html+='</div>';
                                
                                html+='<div class="form-group col-md-1 deletebuttondiv">';
                                html+='<button onclick="removerelatedfield(this)" type="button" class="primary-btn pull-right" title="Remove" >';
                                html+='<i class="fa fa-trash" ></i>';
                                html+='</button>';
                                html+='</div>';
                                html+='</div>';

                            jQuery('#relatedvariablefields').find('.relatedvariablefieldsblock').append(html);

                            
                        } 
                    }

                }else{
                    jQuery('.relatedvariablefields').remove();
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
                    html+='<button onclick="removerelatedfield(this)" type="button" class="primary-btn pull-right" title="Remove" >';
                    html+='<i class="fa fa-trash" ></i>';
                    html+='</button>';
                    html+='</div>';
                    html+='</div>';

                    jQuery('#relatedvariablefields').find('.relatedvariablefieldsblock').append(html);
                }

                getflowbuilderfield();
                getrelatedflowbuilderfield();
                
                if(selectedNode.data.responseVariable != '' && selectedNode.data.responseVariable != undefined){
                    document.getElementById("responseVariable").value=selectedNode.data.responseVariable; 
                }else{
                    $('#responseVariable option:eq(0)').prop('selected',true);
                }

                var vtigerfields = jQuery('select.vtigerfield');
                

                app.changeSelectElementView($('#optionsBody'));
                //register all select2 Elements
                app.showSelect2ElementView($('#optionsBody').find('select.select2'));

                changeposition();
               
            break;
        default:
            document.getElementById("optionsBody").getElementsByClassName("question-element-section")[0].classList.add("show-node-section");
            document.querySelector('.options-heading span').innerHTML = app.vtranslate('Settings');
            document.getElementById('clsButton').style.paddingLeft = '80%';
            document.getElementById("textQuestionInput").value = selectedNode.data.question;
            document.getElementById("varSelection").value = selectedNode.data.storedVariable; 
            document.getElementById("varFormat1").value = selectedNode.data.format;
            break;
    }
}

function openSetting() {
    if (selectedNode.data.type != "loop-node" && selectedNode.data.type != "start-node" && selectedNode.data.type != "end-que-node" && selectedNode.data.type != "chatwithoperator-node") {
        document.getElementById('settingSection').classList.add('settings-open');
    }
}

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(e) {
    e.dataTransfer.setData("node", e.target.getAttribute('data-node'));
}

function drop(e) {
    e.preventDefault();
     var data = e.dataTransfer.getData("node");
    addNodeToDrawFlow(data, e.clientX, e.clientY);
}

function setInputText(element) {
    var name = prompt("Please enter your name", "robot");
    element.innerHTML = element.innerHTML + " " + name;
}

function handleMove(e) {
    var touchLocation = e.targetTouches[0];
    var data = e.dataTransfer.getData("node");
    data.style.left = touchLocation.pageX + 'px';
    data.style.top = touchLocation.pageY + 'px';
}

function addNodeToDrawFlow(node, x, y) {
    var input = 1;
    var output = 0;
    var className = "";
    var data = {};
    if(document.querySelector('#'+node)){
        var fieldobj=JSON.parse(document.querySelector('#'+node).getAttribute('data-field'));
        var html = '<div class="'+node+'">\n                        <div class="msg-node-cnt">\n                            '+fieldobj.question+'\n                        </div>\n                    </div>';
        output = 1;
        data = { type: node, question: fieldobj.question, storedVariable: "@@"+fieldobj.slug };
        className = node;
     }else if (node == "start-node") {
        var html = ' <div class = "start-node-cnt">\n                        <span>\n                            <i class = "fa fa-play-circle" aria-hidden = "true" > </i> \n                        </span > \n                    </div>';
        input = 0;
        output = 1;
        data = { type: node };
        className = node;
    } else if (node == "text-node") {
        var html = '<div class="text-node-cnt">\n                        <div class="msg-node-cnt">\n                            Add your text.\n                        </div>\n                    </div>';
        output = 1;
        data = { type: node, question: "" };
        className = node;
    } else if (node == "options-node") {
        var html = '<div class="option-node-cnt">\n                        <div class="msg-node-cnt">\n                            What is your choice?\n                        </div>\n                        <ul class="options-list-group"></ul>\n                    </div>';
        data = { type: node, question: "", options: [] };
        className = node;

    } else if (node == "condition-node") {
        var html = '<div class="condition-node-cnt">\n                        <div class="msg-node-cnt">\n                            Add your Condition?\n                        </div>\n                    </div>';
        output = 2;
        data = { type: node, question: "" };
        className = node;
    } 
    else if (node == "end-que-node") {
        var html = '<div class="end-que-node">\n     <i class = "fa fa-play-circle" aria-hidden = "true" > </i>                    <div class="end-node-cnt">\n       \n                        </div>\n                    </div>';
        output = 0;
        input=1;
        data = { type: node, question: "End", storedVariable: "" };
        className = node;
    } 
    else if (node == "chatwithoperator-node") {
        var html = '<div class="chatwithoperator-node">\n     <i class = "fa fa-play-circle" aria-hidden = "true" > </i>                    <div class="chatwithoperator-node-cnt">\n       \n                        </div>\n                    </div>';
        output = 0;
        input=1;
        data = { type: node, question: "Chat with Operator", storedVariable: "" };
        className = node;
    }else if (node == "loop-node") {
        var html = '<div class="loop-node-cnt">\n                         <span>\n                            <i class = "fa fa-repeat" aria-hidden = "true" > </i> \n                        </span > \n                    </div>';
        output = 1;
        data = { type: node };
        className = node;
    } else if (node == "crm-action-node") {
        var html = '<div class="crm-action-node">\n                         <span>\n                            CRM\n                        </span > \n                    </div>';
        output = 1;
        data = { type: node };
        className = node;
    }

    var calculatedX = x * (editor.precanvas.clientWidth / (editor.precanvas.clientWidth * editor.zoom)) - editor.precanvas.getBoundingClientRect().x * (editor.precanvas.clientWidth / (editor.precanvas.clientWidth * editor.zoom));
    var calculatedY = y * (editor.precanvas.clientHeight / (editor.precanvas.clientHeight * editor.zoom)) - editor.precanvas.getBoundingClientRect().y * (editor.precanvas.clientHeight / (editor.precanvas.clientHeight * editor.zoom));

    editor.addNode(name, input, output, calculatedX, calculatedY, className, data, html);
}

var list = document.getElementsByClassName("options-list-group")[0];

document.getElementById("addNewOption").addEventListener("click", function (event) {
    event.preventDefault();

    var optionLabel = document.getElementById('addOptions').value.trim();
    if (optionLabel.length > 0) {
        var options = Array.from(document.getElementById('optionsList').getElementsByTagName("li"));
        var lastIndex = 0;

        if (options.length > 0) {
            var lastElement = options[options.length - 1];

            lastIndex = parseInt(lastElement.classList[1]);
        }

        var item = '\n        <li class="list-group-item ' + (lastIndex + 1) + '">\n                                        <span class="option-label">' + optionLabel + '</span>\n                                        <span class="delete-option">\xD7</span>\n                                    </li>';
        list.innerHTML += item;
        document.getElementById('addOptions').value = "";
        editor.addNodeOutput(selectedNodeId);
        var nodeList = document.getElementById('node-' + selectedNodeId).getElementsByClassName("drawflow_content_node")[0].getElementsByClassName("option-node-cnt")[0].getElementsByClassName("options-list-group")[0];

        var nodeListItem = '<li class="list-group-item">' + optionLabel + '</li';
        nodeList.innerHTML += nodeListItem;
        selectedNode.data.options.push(optionLabel);
        editor.updateNodeDataFromId(selectedNodeId, selectedNode.data);

    }else{
        app.helper.showErrorNotification({title: 'Error', message: 'Please enter value first'});
        return false;
    }
});

list.addEventListener('click', function (e) {
    var fullList = e.target.parentElement.parentElement.getElementsByTagName("li");

    var nodeRemoveItemIndex = -1;
    for (var _i = 0; _i < fullList.length; _i++) {
        var element = fullList[_i];
        if (element == e.target.parentElement) {
            nodeRemoveItemIndex = _i;
        }
    }

    var removeItemLabel = e.target.parentElement.getElementsByTagName("span")[0].innerHTML.trim();
    var classIndex = "output_" + e.target.parentElement.classList[1];

    if (e.target.classList.contains('delete-option')) {
        e.target.parentElement.remove();
        editor.removeNodeOutput(selectedNodeId, classIndex);

        var removeItemIndex = selectedNode.data.options.indexOf(removeItemLabel);

        selectedNode.data.options.splice(removeItemIndex, 1);
        editor.updateNodeDataFromId(selectedNodeId, selectedNode.data);
        var nodeList = document.getElementById('node-' + selectedNodeId).getElementsByClassName("drawflow_content_node")[0].getElementsByClassName("option-node-cnt")[0].getElementsByClassName("options-list-group")[0];
        for (var index = 0; index < nodeList.children.length; index++) {
            var _element = nodeList.children[index];

            if (nodeRemoveItemIndex == index && _element.innerHTML.trim() == removeItemLabel) {
                nodeList.removeChild(_element);
                updateOptionsList();
                return;
            }
        }
    }
});

function updateOptionsList(){
    var fields = document.querySelectorAll('#optionsList li');
    for (i = 0; i < fields.length; i++) {
        fields[i].classList.remove(fields[i].classList[1]);
        fields[i].classList.add(i+1);
    }
}

document.getElementById("submitName").onclick = function (e) {
    var count = 0;
    var textMsgInput = document.getElementById("textMsgInput").value;
    var varmessagetype = document.getElementById("varmessagetype").value;
    var copyfrom = document.getElementById("copyfrom").value;
    var varFormat2 = document.getElementById("varFormat2").value;
    var copyto = document.getElementById("copyto").value;
    if(textMsgInput == ''){
        app.helper.showErrorNotification({title: 'Error', message: "Response Text/Question is Required Field"});
        count = count+1;
        e.preventDefault();
    }
    if(varmessagetype.trim() == ''){
        app.helper.showErrorNotification({title: 'Error', message: "Message Type is Required Field"});
        count = count+1;
        e.preventDefault();
    }
    if(copyfrom.trim() == ''){
        app.helper.showErrorNotification({title: 'Error', message: "Copy From Variables is Required Field"});
        count = count+1;
        e.preventDefault();
    }
    if(varFormat2.trim() == ''){
        app.helper.showErrorNotification({title: 'Error', message: "Question/Response Type is Required Field"});
        count = count+1;
        e.preventDefault();
    }
    if(copyto.trim() == ''){
        app.helper.showErrorNotification({title: 'Error', message: "Response Copy To Variables is Required Field"});
        count = count+1;
        e.preventDefault();
    }

    if(count == 0){
        selectedNode.data.question = document.getElementById("textMsgInput").value;
        selectedNode.data.format=document.getElementById("varFormat2").value;
        selectedNode.data.copyfrom=document.getElementById("copyfrom").value;
        selectedNode.data.varmessagetype=document.getElementById("varmessagetype").value;
        selectedNode.data.copyto=document.getElementById("copyto").value;
        selectedNode.data.responseimg=document.querySelector('#dispimg').getAttribute('src'); 
        document.getElementById('node-' + selectedNodeId).getElementsByClassName("drawflow_content_node")[0].getElementsByClassName("text-node-cnt")[0].getElementsByClassName("msg-node-cnt")[0].innerHTML = selectedNode.data.question;
         
        editor.updateNodeDataFromId(selectedNodeId, selectedNode.data);

        app.helper.showSuccessNotification({title: 'Success', message: "Save Successfully"});
    }
    
};

document.getElementById("submitQuestion").onclick = function () {
    selectedNode.data.question = document.getElementById("textQuestionInput").value;
    selectedNode.data.format=document.getElementById("varFormat1").value;
    editor.updateNodeDataFromId(selectedNodeId, selectedNode.data);
    app.helper.showSuccessNotification({title: 'Success', message: "Save Successfully"});
};
document.getElementById("submitCrmAction").onclick = function () {
  var count = 0;
  var action = document.getElementById("varAction").value;
  var tabid = document.getElementById("varModules").value;
  if(action.trim() == ''){
    app.helper.showErrorNotification({title: 'Error', message: "Action is Required Field"});
    count = count+1;
    e.preventDefault();
  }
  if(tabid.trim() == ''){
    app.helper.showErrorNotification({title: 'Error', message: "Module is Required Field"});
    count = count+1;
    e.preventDefault();
  }
  if(count == 0){
    selectedNode.data.action = document.getElementById("varAction").value;
    selectedNode.data.tabid = document.getElementById("varModules").value;
    selectedNode.data.related_tabid = document.getElementById("relatedModules").value;
    selectedNode.data.responseVariable = document.getElementById("responseVariable").value;
    selectedNode.data.responseVtiger = document.getElementById("responseVtiger").value;
    var fields = document.querySelectorAll('.variablefielddiv select');
    var vtigerfields = document.querySelectorAll('select.vtigerfield');
    var defaultvalues = document.querySelectorAll('.defaultvalue');
    selectedNode.data.fieldmappping=[];
    for (i = 0; i < fields.length; ++i) {
        var fieldmappingobj = {};
        fieldmappingobj.vtigerfield=vtigerfields[i].value;
        fieldmappingobj.flowbuilderfield=fields[i].value;
        fieldmappingobj.defaultvalue=defaultvalues[i].value;
        selectedNode.data.fieldmappping.push(fieldmappingobj);
    }
    selectedNode.data.relatedfieldmappping=[];
    var relfields = document.querySelectorAll('.relvariablefielddiv select');
    var relvtigerfields = document.querySelectorAll('select.relvtigerfield');
    //var reldefaultvalues = document.querySelectorAll('.reldefaultvalue');
    for (i = 0; i < relfields.length; ++i) {
        var relfieldmappingobj = {};
        relfieldmappingobj.relvtigerfield=relvtigerfields[i].value;
        relfieldmappingobj.relflowbuilderfield=relfields[i].value;
        relfieldmappingobj.reldefaultvalue='';
        selectedNode.data.relatedfieldmappping.push(relfieldmappingobj);
    }

    selectedNode.data.vtigeroptions=document.getElementsByClassName("vtigerfield")[0].innerHTML;
    selectedNode.data.flowbuilderoptions=document.getElementById("addMapping").innerHTML;
    
    editor.updateNodeDataFromId(selectedNodeId, selectedNode.data);

    app.helper.showSuccessNotification({title: 'Success', message: "Save Successfully"});
  }
};
document.getElementById("submitCondition").onclick = function () {
    var count = 0;
    var varConditon = jQuery('#varConditon option:selected').text();
    var condition = document.getElementById("condition").value;
    var conditionQuestion = document.getElementById("conditionQuestion").value;

    if(varConditon.trim() == ''){
        app.helper.showErrorNotification({title: 'Error', message: "Variable is Required Field"});
        count = count+1;
        e.preventDefault();
    }
    if(condition.trim() == ''){
        app.helper.showErrorNotification({title: 'Error', message: "Condition is Required Field"});
        count = count+1;
        e.preventDefault();
    }
    if(conditionQuestion.trim() == ''){
        app.helper.showErrorNotification({title: 'Error', message: "Enter Value is Required Field"});
        count = count+1;
        e.preventDefault();
    }

    if(count == 0){
        var question = '"'+varConditon+'" '+condition+' "'+conditionQuestion+'"';
        selectedNode.data.question = conditionQuestion;

        selectedNode.data.varConditon = document.getElementById("varConditon").value;
        selectedNode.data.condition = document.getElementById("condition").value;

        document.getElementById('node-' + selectedNodeId).getElementsByClassName("drawflow_content_node")[0].getElementsByClassName("condition-node-cnt")[0].getElementsByClassName("msg-node-cnt")[0].innerHTML = question;

        editor.updateNodeDataFromId(selectedNodeId, selectedNode.data);

        app.helper.showSuccessNotification({title: 'Success', message: "Save Successfully"});
    }
};

document.getElementById("submitOption").onclick = function () {
    var count = 0;
    var messagetype = document.getElementById("messagetype").value;
    var optionQuestion = document.getElementById("optionQuestion").value;
    var optionslength = document.getElementById('optionsList').getElementsByTagName("li").length;
    if(optionslength == 0){
        app.helper.showErrorNotification({title: 'Error', message: "Please add at least one option"});
        count = count+1;
        e.preventDefault();
    }
    if(messagetype.trim() == ''){
        app.helper.showErrorNotification({title: 'Error', message: "Message Type is Required Field"});
        count = count+1;
        e.preventDefault();
    }
    if(optionQuestion.trim() == ''){
        app.helper.showErrorNotification({title: 'Error', message: "Question/Response is Required Field"});
        count = count+1;
        e.preventDefault();
    }

    if(count == 0){
        selectedNode.data.messagetype = document.getElementById("messagetype").value;
        selectedNode.data.question = document.getElementById("optionQuestion").value;
        document.getElementById('node-' + selectedNodeId).getElementsByClassName("drawflow_content_node")[0].getElementsByClassName("option-node-cnt")[0].getElementsByClassName("msg-node-cnt")[0].innerHTML = selectedNode.data.question;

        var options = Array.from(document.getElementById('optionsList').getElementsByTagName("li"));
        options.forEach(function (element) {});
        editor.updateNodeDataFromId(selectedNodeId, selectedNode.data);

        app.helper.showSuccessNotification({title: 'Success', message: "Save Successfully"});
    }
};

function updateNodeDataFromId(id, data) {
    if (id) {
        editor.updateNodeDataFromId(id, data);
    }
}

function importFlow(data) {
    try {
        editor.import(data);
    } catch (error) {}
}

function getflowbuilderfield(){
    var params = {
        'module' : 'CTWhatsAppBusiness',
        'view' : "WhatsappBot",
        'mode' : "getWhatsappBotFlowbuilderField"
    }
    
    //app.helper.showProgress();
    AppConnector.request(params).then(
        function(results) {
            //app.helper.hideProgress();
            //flowbuilderfield = results.result;
            //jQuery(".variablefielddiv select").html(results.result);
            $('select.variablefield').each(function(){
                jQuery(this).html(results.result);
                if(jQuery(this).data('value') != 'undefined' && jQuery(this).data('value') != ''){
                    jQuery(this).val(jQuery(this).data('value'));
                }
            });

            app.changeSelectElementView($('.variablefield'));
            //register all select2 Elements
            app.showSelect2ElementView($('.assignvariablefields').find('select.select2'));
            
        }
    );

}

function getrelatedflowbuilderfield(){
    var params = {
        'module' : 'CTWhatsAppBusiness',
        'view' : "WhatsappBot",
        'mode' : "getWhatsappBotFlowbuilderField"
    }
    
    //app.helper.showProgress();
    AppConnector.request(params).then(
        function(results) {
            //app.helper.hideProgress();
            //flowbuilderfield = results.result;
            //jQuery(".variablefielddiv select").html(results.result);
            $('select.relvariablefield').each(function(){
                jQuery(this).html(results.result);
                if(jQuery(this).data('value') != 'undefined' && jQuery(this).data('value') != ''){
                    jQuery(this).val(jQuery(this).data('value'));
                }
            });

            app.changeSelectElementView($('.relvariablefield'));
            //register all select2 Elements
            app.showSelect2ElementView($('.relatedvariablefields').find('select.select2'));
            
        }
    );

}

document.getElementById('addNewFlowBtn').onclick = function (event) {
    var message = 'Are you sure to want to clear?';
    app.helper.showConfirmationBox({'message' : message}).then(function(data) {
        event.preventDefault();
        editor.import(newFlow);
    });
};

var newFlow = {
    "drawflow": {
        "Home": {
            "data": {
                "1": {
                    "id": 1,
                    "name": "",
                    "data": {
                        "type": "start-node"
                    },
                    "class": "start-node",
                    "html": " <div class=\"start-node-cnt\">\n                        <span>\n                            <i class=\"fa fa-play-circle\" aria-hidden=\"true\"> </i> \n                        </span> \n                    </div>",
                    "typenode": false,
                    "inputs": {},
                    "outputs": {
                        "output_1": {
                            "connections": []
                        }
                    },
                    "pos_x": 51,
                    "pos_y": 48
                }
            }
        }
    }
};

editor.import(newFlow);


 function getcrmfields(){   
    var params = {
        'module' : 'CTWhatsAppBusiness',
        'view' : "WhatsappBot",
        'mode' : "getWhatsappBotModuleFields",
        'tabid' : $('#varModules').val()
    }

    AppConnector.request(params).then(
        function(results) {
            
            $('select.vtigerfield').each(function(){
                jQuery(this).html(results.result);
                if(jQuery(this).data('value') != 'undefined' && jQuery(this).data('value') != ''){
                    jQuery(this).val(jQuery(this).data('value'));
                }
            });

            var responseVtigerValue = $('#responseVtiger').data('value');
            $('#responseVtiger').html(results.result);
            if(responseVtigerValue != 'undefined' && responseVtigerValue != ''){
                $('#responseVtiger').val(responseVtigerValue);
            }

            app.changeSelectElementView($('.vtigerfield'));
            app.changeSelectElementView($('#responseVtiger'));
            //register all select2 Elements
            app.showSelect2ElementView($('.assignvariablefields').find('select.select2'));
            app.showSelect2ElementView($('#responseVtiger'));
    });

    var params = {
        'module' : 'CTWhatsAppBusiness',
        'view' : "WhatsappBot",
        'mode' : "getWhatsappBotRelatedModuleFields",
        'tabid' : $('#varModules').val()
    }

    AppConnector.request(params).then(
        function(results) {
            jQuery('#relatedModules').html(results.result);
            var relatedModules = jQuery("#relatedModules").attr('data-value')
            if(relatedModules != 'undefined' && relatedModules != ''){
                jQuery('#relatedModules').val(relatedModules);
                //jQuery('#relatedModules').trigger('change');
                getrelatedcrmfields();
                app.changeSelectElementView($('#relatedModules'));
                app.showSelect2ElementView($('#relatedModules'));
            }
    });
} 

function getrelatedcrmfields(){  
    var relatedModules = $('#relatedModules').val();
    if(!relatedModules){
        var relatedModules = jQuery("#relatedModules").attr('data-value')
    }
    //console.log($('#relatedModules').data('value'));
    //console.log(relatedModules);
    var params = {
        'module' : 'CTWhatsAppBusiness',
        'view' : "WhatsappBot",
        'mode' : "getWhatsappBotModuleFields",
        'tabid' : relatedModules
    }

    AppConnector.request(params).then(
        function(results) {
            
            $('select.relvtigerfield').each(function(){
                jQuery(this).html(results.result);
                if(jQuery(this).data('value') != 'undefined' && jQuery(this).data('value') != ''){
                    jQuery(this).val(jQuery(this).data('value'));
                }
            });

            app.changeSelectElementView($('.relvtigerfield'));
            //register all select2 Elements
            app.showSelect2ElementView($('.relatedvariablefields').find('select.select2'));
    });
} 

$('#varModules').change(function(){ getcrmfields() });
$('#relatedModules').change(function(){ getrelatedcrmfields() });

$(document).ready(function (event) {
$("#imgfrm").on('submit',(function(event) {
    event.preventDefault();
    var frmdata=new FormData(this);
    
    app.helper.showProgress();    
    $.ajax({
        url: "modules/CTWhatsAppBusiness/views/BotImage.php",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
         cache: false,
        processData:false,
        success: function(url)
        {
            app.helper.hideProgress();
            if(url.trim() !=''){
                $('#responseImg').val('');
                $("#dispimg").attr("src",url);  
            }
        }
    });
}));
});


$(document).ready(function (event) {
    $('#assignvariablefields').on('change','.vtigerfield',function(){
        jQuery(this).data('value',jQuery(this).val());
    });

    $('#assignvariablefields').on('change','.variablefield',function(){
        jQuery(this).data('value',jQuery(this).val());
    });

    $('#relatedvariablefields').on('change','.relvtigerfield',function(){
        jQuery(this).data('value',jQuery(this).val());
    });

    $('#relatedvariablefields').on('change','.relvariablefield',function(){
        jQuery(this).data('value',jQuery(this).val());
    });
});

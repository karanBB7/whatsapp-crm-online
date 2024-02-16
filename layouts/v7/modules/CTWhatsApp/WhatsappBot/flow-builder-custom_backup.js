
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

var variables = [{ label: "NAME", value: "@@NAME", type: "STRING" }, { label: "NUMBER", value: "@@NUMBER", type: "NUMBER" }, { label: "EMAIL", value: "@@EMAIL", type: "EMAIL" }, { label: "DATE", value: "@@DATE", type: "DATE" }];

editor.on('nodeCreated', function (id) {
    setSelectedNode(id, "created");

    openSetting();
});

editor.on('nodeSelected', function (id) {
    setSelectedNode(id, "selected");

    openSetting();
});

document.getElementById("insertVariable").addEventListener("click", function (event) {
    event.preventDefault();
    document.getElementById("insertVariableList").classList.toggle("show");
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
            document.getElementById("textMsgInput").value = selectedNode.data.question;
            break;
        case "options-node":
            document.getElementById("optionsBody").getElementsByClassName("options-element-section")[0].classList.add("show-node-section");
            document.getElementById("optionQuestion").value = selectedNode.data.question;
            var _list = document.getElementById("optionsList");
            _list.innerHTML = "";

            for (var index = 0; index < selectedNode.data.options.length; index++) {
                var element = selectedNode.data.options[index];
                var item = '<li class = "list-group-item ' + (index + 1) + '" >\n                                <span class = "option-label" > ' + element + ' </span> \n                                <span class = "delete-option" > \xD7 </span> </li >';
                _list.innerHTML += item;
            }

            break;
        case "name-que-node":
            document.getElementById("optionsBody").getElementsByClassName("question-element-section")[0].classList.add("show-node-section");
            document.getElementById("textQuestionInput").value = selectedNode.data.question;
            document.getElementById("varSelection").value = selectedNode.data.storedVariable;
            break;
        case "number-que-node":
            document.getElementById("optionsBody").getElementsByClassName("question-element-section")[0].classList.add("show-node-section");
            document.getElementById("textQuestionInput").value = selectedNode.data.question;
            document.getElementById("varSelection").value = selectedNode.data.storedVariable;
            break;
        case "date-que-node":
            document.getElementById("optionsBody").getElementsByClassName("question-element-section")[0].classList.add("show-node-section");
            document.getElementById("textQuestionInput").value = selectedNode.data.question;
            document.getElementById("varSelection").value = selectedNode.data.storedVariable;
            break;
        case "email-que-node":
            document.getElementById("optionsBody").getElementsByClassName("question-element-section")[0].classList.add("show-node-section");
            document.getElementById("textQuestionInput").value = selectedNode.data.question;
            document.getElementById("varSelection").value = selectedNode.data.storedVariable;
            break;
        case "other-que-node":
            document.getElementById("optionsBody").getElementsByClassName("question-element-section")[0].classList.add("show-node-section");
            document.getElementById("textQuestionInput").value = selectedNode.data.question;
            document.getElementById("varSelection").value = selectedNode.data.storedVariable;
            break;
        case "condition-node":
            document.getElementById("optionsBody").getElementsByClassName("condition-element-section")[0].classList.add("show-node-section");
            document.getElementById("conditionQuestion").value = selectedNode.data.question;
            break;
        case "options-node":
        case "loop-node":
            break;
        case "crm-action-node":
            var sideBar = document.getElementById("optionsBody");

            var crmEvent = new CustomEvent('crmActionEvents', {
                detail: {
                    type: optionType,
                    action: "crm-action-node",
                    nodeId: selectedNodeId,
                    data: selectedNode.data
                }
            });

            sideBar.dispatchEvent(crmEvent);
            break;
        default:
            break;
    }
}

function openSetting() {
    if (selectedNode.data.type != "loop-node" && selectedNode.data.type != "start-node") {
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

    if (node == "start-node") {
        var html = ' <div class = "start-node-cnt">\n                        <span>\n                            <i class = "fa fa-play-circle" aria-hidden = "true" > </i> \n                        </span > \n                    </div>';
        input = 0;
        output = 1;
        data = { type: node };
        className = node;
    } else if (node == "text-node") {
        var html = '<div class="text-node-cnt">\n                        <div class="msg-node-cnt">\n                            Add your text.\n                        </div>\n                    </div>';
        output = 1;
        data = { type: node, question: "Add your text." };
        className = node;
    } else if (node == "options-node") {
        var html = '<div class="option-node-cnt">\n                        <div class="msg-node-cnt">\n                            What is your choice?\n                        </div>\n                        <ul class="options-list-group"></ul>\n                    </div>';
        data = { type: node, question: "What is your choice?", options: [] };
        className = node;
    } else if (node == "condition-node") {
        var html = '<div class="condition-node-cnt">\n                        <div class="msg-node-cnt">\n                            Add your Condition?\n                        </div>\n                    </div>';
        output = 2;
        data = { type: node, question: "Add your Condition?" };
        className = node;
    } else if (node == "name-que-node") {
        var html = '<div class="name-que-node">\n                        <div class="msg-node-cnt">\n                            What\'s your name?\n                        </div>\n                    </div>';
        output = 1;
        data = { type: node, question: "What's your name?", storedVariable: "@@NAME" };
        className = node;
    } else if (node == "number-que-node") {
        var html = '<div class="number-que-node">\n                        <div class="msg-node-cnt">\n                            Type a number, please\n                        </div>\n                    </div>';
        output = 1;
        data = { type: node, question: "Type a number, please", storedVariable: "@@NUMBER" };
        className = node;
    } else if (node == "date-que-node") {
        var html = '<div class="date-que-node">\n                        <div class="msg-node-cnt">\n                            Select a date, please in dd/mm/yyyy                \n                        </div>\n                    </div>';
        output = 1;
        data = { type: node, question: "Select a date, please in dd/mm/yyyy", storedVariable: "@@DATE", format: "dd/mm/yyyy" };
        className = node;
    } else if (node == "email-que-node") {
        var html = '<div class="email-que-node">\n                        <div class="msg-node-cnt">\n                            What\'s your email?\n                        </div>\n                    </div>';
        output = 1;
        data = { type: node, question: "What's your email?", storedVariable: "@@EMAIL" };
        className = node;
    } else if (node == "other-que-node") {
        var html = '<div class="other-que-node">\n                        <div class="msg-node-cnt">\n                            Add your Condition?\n                        </div>\n                    </div>';
        output = 1;
        data = { type: node, question: "Add your Condition?", storedVariable: "" };
        className = node;
    } else if (node == "loop-node") {
        var html = '<div class="loop-node-cnt">\n                         <span>\n                            <i class = "fa fa-repeat" aria-hidden = "true" > </i> \n                        </span > \n                    </div>';
        output = 1;
        data = { type: node };
        className = node;
    } else if (node == "crm-action-node") {
        var html = '<div class="loop-node-cnt">\n                         <span>\n                            CRM\n                        </span > \n                    </div>';
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
    }
});

list.addEventListener('click', function (e) {
    var removeItemLabel = e.target.parentElement.getElementsByTagName("span")[0].innerHTML;
    var classIndex = "output_" + e.target.parentElement.classList[1];

    if (e.target.classList.contains('delete-option')) {
        e.target.parentElement.remove();
        editor.removeNodeOutput(selectedNodeId, classIndex);

        var removeItemIndex = selectedNode.data.options.indexOf(removeItemLabel);
        selectedNode.data.options.splice(removeItemIndex, 1);
        editor.updateNodeDataFromId(selectedNodeId, selectedNode.data);
        var nodeList = document.getElementById('node-' + selectedNodeId).getElementsByClassName("drawflow_content_node")[0].getElementsByClassName("option-node-cnt")[0].getElementsByClassName("options-list-group")[0];
        for (var index = 0; index < nodeList.children.length; index++) {
            var element = nodeList.children[index];
            if (element.innerHTML == removeItemLabel) {
                nodeList.removeChild(element);
            }
        }
    }
});

document.getElementById("submitName").onclick = function () {
    selectedNode.data.question = document.getElementById("textMsgInput").value;

    document.getElementById('node-' + selectedNodeId).getElementsByClassName("drawflow_content_node")[0].getElementsByClassName("text-node-cnt")[0].getElementsByClassName("msg-node-cnt")[0].innerHTML = selectedNode.data.question;

    editor.updateNodeDataFromId(selectedNodeId, selectedNode.data);
};

document.getElementById("submitQuestion").onclick = function () {
    selectedNode.data.question = document.getElementById("textQuestionInput").value;

    document.getElementById('node-' + selectedNodeId).getElementsByClassName("drawflow_content_node")[0].getElementsByClassName(selectedNode.data.type)[0].getElementsByClassName("msg-node-cnt")[0].innerHTML = selectedNode.data.question;

    editor.updateNodeDataFromId(selectedNodeId, selectedNode.data);
};

document.getElementById("submitCondition").onclick = function () {
    selectedNode.data.question = document.getElementById("conditionQuestion").value;

    document.getElementById('node-' + selectedNodeId).getElementsByClassName("drawflow_content_node")[0].getElementsByClassName("condition-node-cnt")[0].getElementsByClassName("msg-node-cnt")[0].innerHTML = selectedNode.data.question;

    editor.updateNodeDataFromId(selectedNodeId, selectedNode.data);
};

document.getElementById("submitOption").onclick = function () {
    selectedNode.data.question = document.getElementById("optionQuestion").value;

    document.getElementById('node-' + selectedNodeId).getElementsByClassName("drawflow_content_node")[0].getElementsByClassName("option-node-cnt")[0].getElementsByClassName("msg-node-cnt")[0].innerHTML = selectedNode.data.question;

    var options = Array.from(document.getElementById('optionsList').getElementsByTagName("li"));
    options.forEach(function (element) {});
    editor.updateNodeDataFromId(selectedNodeId, selectedNode.data);
};

function updateNodeDataFromId(id, data) {
    if (id) {
        editor.updateNodeDataFromId(id, data);
    }
}

function importFlow(data) {
    try {
        editor.import(data);
    } catch (error) {
        console.log(error);
        console.error("Envalid Data")
    }
}

document.getElementById('addNewFlowBtn').onclick = function (event) {
    event.preventDefault();
    editor.import(newFlow);
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
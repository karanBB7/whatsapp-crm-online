function openCustomInvokeFunctionDialog() {
    var customFunctionForm = `
        <form id="custom_function_form">
            <label for="to_number">To Number:</label>
            <input type="text" id="to_number" name="to_number">
            <br>
            <label for="add_field">Add Field:</label>
            <input type="text" id="add_field" name="add_field">
            <br>
            <label for="sms_text">SMS Text:</label>
            <textarea id="sms_text" name="sms_text"></textarea>
            <br>
            <input type="button" value="Submit" onclick="submitCustomFunctionForm()">
        </form>
    `;

    var dialogOptions = {
        title: 'Invoke Custom Function',
        content: customFunctionForm,
        onClose: function () {
        }
    };

    Vtiger_Helper_Js.showConfirmationBox(dialogOptions);
}

function submitCustomFunctionForm() {
    $.ajax({
        url: 'index.php',
        type: 'POST',
        data: {
            module: 'whatsapptemplate',
            action: 'DetailViewAjax',
            record: RECORD_ID,
            to_number: $('#to_number').val(),
            add_field: $('#add_field').val(),
            sms_text: $('#sms_text').val(),
            submit_button: 'true',
        },
        success: function(response) {
        },
        error: function(error) {
        }
    });
}

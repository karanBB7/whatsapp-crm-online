<?php
require_once('modules/com_vtiger_workflow/VTEntityCache.inc');
require_once('modules/com_vtiger_workflow/VTWorkflowUtils.php');
require_once('modules/com_vtiger_workflow/VTSimpleTemplate.inc');

class VTWhatsappTask extends VTTask {

    public function doTask($entity) {
        // Fetch the form input data
        $to = $this->to;
        $body = $this->body;

        // Construct the data to be sent to the middleware
        $data = array(
            'messaging_product' => 'whatsapp',
            'to' => $to,
            'text' => array(
                'body' => $body
            )
        );

        // Set the endpoint URL and headers
        $url = 'https://midware.onrender.com/send-message';
        $headers = array(
            'Authorization: Bearer YOUR_AUTH_TOKEN',
            'Content-Type: application/json'
        );

        // Send the data using cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        // Log the cURL response
        error_log("cURL Response: " . $response);
    }
}
?>
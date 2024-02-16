<?php
function whatsappExternalAppSync($entityData) {
 	$recordInfo = $entityData->{'data'};
	$body = $recordInfo['description'];
	$to = $recordInfo['cf_966'];
    $url = 'https://whatsaapapi.onrender.com/send-text-message';
    $headers = array(
        'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJPd25lck5hbWUiOiJrYXJhbkJCIiwiaWF0IjoxNjkyMjU2OTk5fQ.l_e0ynSm3kziO9q4xFLpdehdK9E81M6na8bb0YXt3Dw',
        'Content-Type: application/json'
    );
    
    $data = array(
        'messaging_product' => 'whatsapp',
        'to' => $to,
        'text' => array(
            'body' => $body
        )
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    print_r($response);
    // exit;
    curl_close($ch);
}
?>

<?php
include('../../config.inc.php');
$conn = mysqli_connect($dbconfig['db_server'], $dbconfig['db_username'], $dbconfig['db_password'], $dbconfig['db_name']) or die("Database Error");
$messagesToProcess = array();
$query = "SELECT id, messages, fromNumber, buttonText,description, status FROM received_whatsapp_messagebot WHERE status = 0";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['status'] == 1) {
        continue;
    }
    $messagesToProcess[] = $row['id'];
}

foreach ($messagesToProcess as $messageId) {
    $query = "SELECT id, messages, fromNumber FROM received_whatsapp_messagebot WHERE id = $messageId";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);

    $content = $row['messages'];
    $phone = $row['fromNumber'];


$chatbotQuery = "SELECT queries, replies FROM chatbot WHERE '$content' LIKE CONCAT('%', queries, '%')";
$chatbotResult = mysqli_query($conn, $chatbotQuery);

$matched = false;

while ($chatbotRow = mysqli_fetch_assoc($chatbotResult)) {
    $message = $chatbotRow['replies'];
    sendWhatsAppMessage($phone, $message);
    $matched = true;
    $insert = "INSERT INTO chatbot_messages (fromNumber, botmessage) VALUES ('$phone' ,'$message')";
            mysqli_query($conn, $insert);
    break;

}

if (!$matched) {
    $message = "Sorry, I was not able to understand.";
    sendWhatsAppMessage($phone, $message);
     $insert = "INSERT INTO chatbot_messages (fromNumber, botmessage) VALUES ('$phone' ,'$message')";
     mysqli_query($conn, $insert);
}

$updateQuery = "UPDATE received_whatsapp_messagebot SET status = 1 WHERE id = $messageId";
mysqli_query($conn, $updateQuery);

}
mysqli_close($conn);

function sendWhatsAppMessage($phone, $message) {
    $data = array(
        "messaging_product" => "whatsapp",
        "to" => $phone,
        "text" => array(
            "body" => $message
        )
    );
    $data_json = json_encode($data);

    $url = 'https://whatsaapapi.onrender.com/send-text-message';
    $headers = array(
        'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJPd25lck5hbWUiOiJuZXctdG9rZW4iLCJpYXQiOjE3MDQ5NTEyNDJ9.2JuK2r6DWj41MCwGsa51YizWhU7kXI0fylqfwtNbs3s',
        'Content-Type: application/json'
    );
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_exec($ch);
    curl_close($ch);
}
?>

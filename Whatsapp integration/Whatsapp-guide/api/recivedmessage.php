<?php
$conn = mysqli_connect("localhost", "root", "", "vtiger");
$fromNumber = $_GET['fromNumber'];
$sql = "SELECT DISTINCT messages, createdAT FROM received_whatsapp_message WHERE fromNumber = '$fromNumber'";
$result = mysqli_query($conn, $sql);
$messages = [];
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['messages'] !== null) {
        $message = $row['messages'];
        $createdAt = strtotime($row['createdAT']); 
            $messages[] = [
            'message' => $message,
            'timestamp' => $createdAt
        ];
    }
}
if (empty($messages)) {
    $messages[] = [
        'message' => "No Received Messages",
        'timestamp' => null,
    ];
}
mysqli_close($conn);
header('Content-Type: application/json');
echo json_encode($messages);
?>

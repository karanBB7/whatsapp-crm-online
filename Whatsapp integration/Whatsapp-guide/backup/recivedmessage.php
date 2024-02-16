<?php
$conn = mysqli_connect("localhost", "root", "", "vtiger");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $fromNumber = '919964642973';
$fromNumber = $_GET['fromNumber'];
$query1 = "SELECT DISTINCT messages, createdAt FROM received_whatsapp_message WHERE fromNumber = '$fromNumber'";
$result1 = $conn->query($query1);
$query2 = "SELECT mcw.*, ce.createdtime 
    FROM vtiger_modcommentswhatsapp AS mcw
    JOIN vtiger_crmentity AS ce ON mcw.modcommentsid = ce.crmid
    WHERE mcw.related_to = 3";
$result2 = $conn->query($query2);
$result_array = array();
if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
        $result_array[] = array(
            'message' => $row['messages'],
            'timestamp' => $row['createdAt'],
            'source' => 'recieved'
        );
    }
}
if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        $originalDateTime = new DateTime($row['createdtime']);  
    $originalDateTime->modify('+5 hours 30 minutes');
    $newDateTime = $originalDateTime->format('Y-m-d H:i:s');
        $result_array[] = array(
            'message' => $row['commentcontent'],
            'timestamp' =>  $newDateTime,
            'source' => 'sent   '
        );
    }
}
usort($result_array, function ($a, $b) {
    $timestampA = strtotime($a['timestamp']);
    $timestampB = strtotime($b['timestamp']);
        return $timestampA - $timestampB;
});
mysqli_close($conn);
header('Content-Type: application/json');
echo json_encode($result_array);
?>


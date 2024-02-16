<?php
 include('config.inc.php');
$conn = mysqli_connect($dbconfig['db_server'], $dbconfig['db_username'], $dbconfig['db_password'], $dbconfig['db_name']);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$fromNumber = $_GET['fromNumber'];
$relatedid = $_GET['related_to'];
$query1 = "SELECT DISTINCT messages, createdAt FROM received_whatsapp_messagebot WHERE fromNumber = '$fromNumber'";
$result1 = $conn->query($query1);
$query2 = "SELECT mcw.*, ce.createdtime 
    FROM vtiger_modcommentswhatsapp AS mcw
    JOIN vtiger_crmentity AS ce ON mcw.modcommentsid = ce.crmid
    WHERE mcw.related_to = $relatedid";
$result2 = $conn->query($query2);


$query3 = "SELECT botmessage, createdTime FROM chatbot_messages WHERE fromNumber = '$fromNumber'";
$result3 = $conn->query($query3);


$result_array = array();
if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {    
  	$originalDateTime = new DateTime($row['createdAt']);  
    	$originalDateTime->modify('+11 hours 30 minutes');
    	$newDateTime = $originalDateTime->format('Y-m-d H:i:s');
        if($row['messages'] !== null){
            $result_array[] = array(
                'message' => $row['messages'],
                'timestamp' => $newDateTime,
                'source' => 'recieved'
            );
        }
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
            'source' => 'sent'
        );
    }
}


if ($result3->num_rows > 0) {
    while ($row = $result3->fetch_assoc()) {
         $originalDateTime = new DateTime($row['createdTime']);  
    $originalDateTime->modify('+11 hours 30 minutes');
    $newDateTime = $originalDateTime->format('Y-m-d H:i:s');
        $result_array[] = array(
            'message' => $row['botmessage'],
            'timestamp' => $newDateTime,
            'source' => 'Sent'
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


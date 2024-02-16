<?php
include('../../config.inc.php');
$conn = mysqli_connect($dbconfig['db_server'], $dbconfig['db_username'], $dbconfig['db_password'], $dbconfig['db_name']) or die("Database Error");
$messagesToProcess = array();
$query = "SELECT id, messages, fromNumber, buttonText,description, status FROM received_whatsapp_messagebot WHERE status = 0";
$result = mysqli_query($conn, $query);

if (!$result) {
    die('Error in SQL query: ' . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['status'] == 1) {
        continue;
    }
    $messagesToProcess[] = $row['id'];
}

foreach ($messagesToProcess as $messageId) {
    $query = "SELECT id, messages, fromNumber, buttonText, listid, status,title, description FROM received_whatsapp_messagebot WHERE id = $messageId";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('Error in SQL query: ' . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);

    $content = $row['messages'];
    $phone = $row['fromNumber'];
    $complaintType = $row['listid'];
    $description = $row['description'];
    $title = $row['title'];
    
    if ($content === "hi" || $content === "hii" || $content === "hello" || $content === "Hi" || $content === "Hii" || $content === "Hello") {
        if ($row['status'] == 1) {
            continue; 
        }
        fetchdetails($phone);
        $updateQuery = "UPDATE received_whatsapp_messagebot SET status = 1 WHERE id = $messageId";
        mysqli_query($conn, $updateQuery);

    }else{
        $updateQuery = "UPDATE received_whatsapp_messagebot SET status = 1 WHERE id = $messageId";
        mysqli_query($conn, $updateQuery);
    }

    if ($complaintType == "1") {
        $message = "Please wait we are fetching";
        sendWhatsAppMessage($phone, $message);
        raisecomplaint($phone);
        $updateQuery = "UPDATE received_whatsapp_messagebot SET status = 1 WHERE id = $messageId";
        mysqli_query($conn, $updateQuery);
        
    }

    if($complaintType == "4" | $complaintType == "5" | $complaintType == "6"){
        $randomNumber = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
        $ticketNumber = "TT" . $randomNumber;
        $message = "
        Thank You!

        Ticket Successfully Raised

        Ticket Number :- $ticketNumber

        Type Hi to go back to Command List
        ";
        sendWhatsAppMessage($phone, $message);

        $FetchLastCrmid = "SELECT crmid FROM vtiger_crmentity ORDER BY crmid DESC LIMIT 1";
        $result = mysqli_query($conn,$FetchLastCrmid);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $newCrmid = $row["crmid"] + 1;
                $sqlInsertCrmentity = "INSERT INTO `vtiger_crmentity` (`crmid`, `smcreatorid`, `smownerid`, `modifiedby`, `setype`, `description`, `createdtime`, `modifiedtime`, `viewedtime`, `status`, `version`, `presence`, `deleted`, `smgroupid`, `source`, `label`, `ckeditor_field`) 
                VALUES ('$newCrmid', '1', '1', '1', 'HelpDesk', NULL, '', '', NULL, NULL, '0', '1', '0', '0', 'CRM', '$title', NULL)";
                $result = mysqli_query($conn,$sqlInsertCrmentity);
                if($result === true){
                    $inserticket = "INSERT INTO `vtiger_troubletickets` (`ticketid`, `ticket_no`, `groupname`, `parent_id`, `product_id`, `priority`, `severity`, `status`, `category`, `title`, `solution`, `update_log`, `version_id`, `hours`, `days`, `contact_id`, `tags`)
                    VALUES ('$newCrmid', '$ticketNumber', NULL, '6', '0', 'Normal', 'Minor', 'Open', 'Small Problem', '$title', NULL, NULL, NULL, '0.00000000', '0.00000000', '0', NULL);";
                    $result = mysqli_query($conn,$inserticket);
                } 
            } 
        }
        $updateQuery = "UPDATE received_whatsapp_messagebot SET status = 1 WHERE id = $messageId";
        mysqli_query($conn, $updateQuery);
    }

}
mysqli_close($conn);

function fetchdetails($phone){
    $url = 'https://whatsaapapi.onrender.com/interact-messages';
    $headers = array(
        'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJPd25lck5hbWUiOiJrYXJhbkJCIiwiaWF0IjoxNjkyMjU2OTk5fQ.l_e0ynSm3kziO9q4xFLpdehdK9E81M6na8bb0YXt3Dw',
        'Content-Type: application/json',
    );
    $data = array(
        'to' => $phone,
        'interactive' => array(
            'type' => 'list',
            'header' => array(
                'type' => 'text',
                'text' => 'Welcome to the Support',
            ),
            'body' => array(
                'text' => 'Please select the respective activity in given',
            ),
            'action' => array(
                'button' => 'Select Options',
                'sections' => array(
                    array(
                        'title' => 'COMPLAINT MANAGMENT',
                        'rows' => array(
                            array(
                                'id' => '1',
                                'title' => 'Raise Complaint',
                                'description' => 'Can Raise Complaint',
                            ),
                            array(
                                'id' => '2',
                                'title' => 'Close Complaint',
                                'description' => 'Can Close Previous Complaints.',
                            ),
                            array(
                                'id' => '3',
                                'title' => 'Complaint Info',
                                'description' => 'Can see Last Raised Complaint Information',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    );
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    }
    curl_close($ch);
}


function raisecomplaint($phone){
    $url = 'https://whatsaapapi.onrender.com/interact-messages';
    $headers = array(
        'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJPd25lck5hbWUiOiJuZXctdG9rZW4iLCJpYXQiOjE3MDQ5NTEyNDJ9.2JuK2r6DWj41MCwGsa51YizWhU7kXI0fylqfwtNbs3s',
        'Content-Type: application/json',
    );
    $data = array(
        'to' => $phone,
        'interactive' => array(
            'type' => 'list',
            'header' => array(
                'type' => 'text',
                'text' => 'Raise Complaint',
            ),
            'body' => array(
                'text' => 'Please select the respective activity in given',
            ),
            'action' => array(
                'button' => 'Select Options',
                'sections' => array(
                    array(
                        'title' => 'SELECT COMPLAINTS',
                        'rows' => array(
                            array(
                                'id' => '4',
                                'title' => 'NO INTERNET',
                            ),
                            array(
                                'id' => '5',
                                'title' => 'SLOW INTERNET',
                            ),
                            array(
                                'id' => '6',
                                'title' => 'PAYMENT RELATED',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    );
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    }
    curl_close($ch);
}

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

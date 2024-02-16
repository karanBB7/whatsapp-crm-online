<?php
$db = mysqli_connect("localhost", "root", "", "vtiger");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}

$id = 625;
$sql = "SELECT status FROM vtiger_activity WHERE activityid = $id";
$result = mysqli_query($db, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $status = $row["status"];

        if ($status == "Completed") {
            // Perform the cURL operation
            $data = array(
                "messaging_product" => "whatsapp",
                "to" => '919964642973',
                "text" => array(
                    "body" => "Postman!"
                )
            );
            $data_json = json_encode($data);

            $url = 'https://whatsaapapi.onrender.com/send-message';
            $headers = array(
                'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJPd25lck5hbWUiOiJrYXJhbi10ZXN0LWF1dGgiLCJpYXQiOjE2OTk1MjcyNzV9.h0PMMOPYBjREoV0I8-yHOrtH389qE_kG5DFdDxc08VY',
                'Content-Type: application/json'
            );

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $response = curl_exec($ch);

            if ($response === false) {
                echo 'cURL error: ' . curl_error($ch);
            } else {
                echo 'cURL operation successful.';
            }

            curl_close($ch);
        } else {
            echo "Status is not 'Completed'.";
        }
    } else {
        echo "No records found for the specified ID.";
    }
} else {
    echo "Query execution failed: " . mysqli_error($db);
}
mysqli_close($db);
?>

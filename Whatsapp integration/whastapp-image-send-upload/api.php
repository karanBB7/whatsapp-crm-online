<?php

$accessToken = 'EAAxV1g4t24QBO8Wo6sm9S2FuZCZBZChLltYaPynGVqVcDct5r0ZBCMO6gCwJ2Y7C7IB3U2JYxuqt24hbxFicUuQn2mwqwlf4y18Un3lxg6kfdhh4XMYeeq8ZAX0iF9ibSmFsfILXMqyQaUuGISX6AdWH2Bp8GMKJdZBT5ZCP6qWoRe2olxSZAUQEZCK5YMtZB6ZC5Fisaad6NYpNU0YlMlM';
$graphApiEndpoint = 'https://graph.facebook.com/v17.0/122099270174001306/messages';

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/'; 
    $uploadedFile = $uploadDir . basename($_FILES['image']['name']);
    
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFile)) {
        $data = [
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => '919964642973',
            'type' => 'image',
            'image' => [
                'link' => 'http://localhost/test/' . $uploadedFile,
                'caption' => 'Optional caption for the image'
            ],
        ];

        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken,
        ];

        $ch = curl_init($graphApiEndpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        print_r($response);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode == 200) {
            echo 'Image uploaded successfully.';
        } else {
            echo 'Error uploading image. HTTP Status Code: ' . $httpCode;
            echo 'Response: ' . $response;
        }
    } else {
        echo 'Error moving the uploaded file.';
    }
} else {
    echo 'No file uploaded or an error occurred.';
}
?>

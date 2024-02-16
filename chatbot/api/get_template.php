<?php

include('../../config.inc.php');
$conn = mysqli_connect($dbconfig['db_server'], $dbconfig['db_username'], $dbconfig['db_password'], $dbconfig['db_name']) or die("Database Error");

$query = "SELECT id, queries as query, replies as reply FROM chatbot";
$result = mysqli_query($conn, $query);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

$response = [
    'draw' => 1, 
    'recordsTotal' => count($data),
    'recordsFiltered' => count($data),
    'data' => $data,
];

echo json_encode($response);
?>

<?php
session_start();

$recipient = $_POST['to'];
$body = $_POST['body'];

$dbConnection = new mysqli('localhost','root','','vtiger');

$recipient = $dbConnection->real_escape_string($recipient);
$body = $dbConnection->real_escape_string($body);

$query = "INSERT INTO whatsapp_que(recipient, body) VALUES ('$recipient', '$body')";
$dbConnection->query($query);

print_r($query);

$dbConnection->close();

header("Location: trigger_workflow.php");
exit();
?>

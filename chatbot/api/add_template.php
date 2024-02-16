<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('../../config.inc.php');
    $conn = mysqli_connect($dbconfig['db_server'], $dbconfig['db_username'], $dbconfig['db_password'], $dbconfig['db_name']) or die("Database Error");

    $query =  $_POST['query'];
    $reply =  $_POST['reply'];

    $insert_query = "INSERT INTO chatbot (queries, replies) VALUES ('$query', '$reply')";

    mysqli_query($conn,$insert_query);
    mysqli_close($conn);
}
?>

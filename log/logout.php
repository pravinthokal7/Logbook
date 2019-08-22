<?php
function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}


session_start();

$id = $_SESSION["id"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logbook";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE log SET status='offline' , out_time=now() WHERE roll_no=$id ORDER BY id DESC LIMIT 1";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


session_destroy();

redirect("login.php");
?>
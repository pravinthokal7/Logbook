<?php
function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}

?>

<?php

$id = $_POST["mail"];
$pass = $_POST["psw"];

echo $id;
echo $pass;

$servername = "localhost";
$username = "root";
$password = "";
$database = "logbook";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM teacher";
$result = mysqli_query($conn, $sql);

$flag = 0;

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
    {

    	if($id == $row["mail"] && $pass == $row["pass"])
    	{
    		echo "login successfully";
    		$flag = 1;

    		redirect("teacher_dashboard.php");
    	}
    }
} else {
    echo "0 results";
}

if($flag == 0)
{
	echo "login failed";
	redirect("teacher.php");
}

?>
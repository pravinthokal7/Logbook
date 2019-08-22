<?php
function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}

session_start();
?>

<?
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

$_SESSION["sub"] = $_POST["sub"];
$sub = $_SESSION["sub"];

$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql);

$flag = 0;

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
    {

    	if($_POST["uname"] == $row["id"] && $_POST["psw"] == $row["password"])
    	{
    		echo "login successfully";
    		$flag = 1;
            $_SESSION["id"] = $_POST["uname"];
            $id = $_SESSION["id"];

            $_SESSION["name"] = $row["name"];

            $sql2 = "insert into log(roll_no,subject,status) values($id,'$sub','online')";

            if ($conn->query($sql2) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        }


    		redirect("dashboard.php");
    	}
    }
} else {
    echo "0 results";
}

if($flag == 0)
{
	echo "login failed";
	redirect("login.php");
}

?>
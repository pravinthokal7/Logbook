<?php
function redirect($url, $statusCode = 303)
{
   header('refresh:3; url=' . $url, true, $statusCode);
   die();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logbook";

$id = $_POST["roll"];
$name = $_POST["uname"];
$pass = $_POST["psw"];
$cpass = $_POST["c_pass"];
$mobile = $_POST["mobile"];

if($pass!=$cpass)
{
	echo "password and confirm password do not match";
	redirect("signup.php");
}
else
{

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO student VALUES ('$id','$name', '$pass', '$mobile')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";

    redirect("login.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}

mysqli_close($conn);



}
?>
</script>

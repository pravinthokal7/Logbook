<?php

function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}



?>

<!DOCTYPE html>
<html>
<title>Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="login_css.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

tr:nth-child(odd){background-color: #778899}

th {
  background-color: #4682B4;
  color: white;
}

h6{
width: 50%;
  padding: 12px 20px;
  margin: 18px 275px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right"><a href="teacher.php">Logout</a></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="login.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>Sir</strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="teacher_dashboard.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Student Wise</a>
    <a href="logbook.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Full Logbook</a>
    <a href="teacher.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Log Out</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5 style="color:#f2f2f2"><b>LogBook</b></h5>
  </header>

<h6 style="color:gray">
  ROLL NUMBER : -

<?php
	echo $_POST["roll"];
	$roll = $_POST["roll"];
?>

<br>

    <?php

    echo "\t". "NAME : - "; 

  $servername = "localhost";
$username = "root";
$password = "";
$dbname = "logbook";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM student where id=$roll";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo strtoupper($row["name"]);

        echo "<br>";

        echo "CONTACT : - ".strtoupper($row["contact"]);
    }
} else {
    echo "0 results";
}

mysqli_close($conn);

?>
</h6>

<table>
  <tr>
  <th>Roll No</th>
  <th>Subject</th>
  <th>In time</th>
  <th>Out time</th>
  <th>Status
  </tr>
  
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logbook";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM Log where roll_no=$roll";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	echo "<tr>";
        echo "<td>" .$row["roll_no"]. "</td>";
        echo "<td>" .$row["subject"]. "</td>";
        echo "<td>" .$row["in_time"]. "</td>";
        echo "<td>" .$row["out_time"]. "</td>";
        echo "<td>" .$row["status"]. "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);

  ?>


</table>

  <!-- End page content -->
</div>


</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="login_css.css">
</head>
<body>

  <style>

body {font-family: Arial, Helvetica, sans-serif;
  background-image: url("loginbg.jpg");
}

a:link, a:visited {
  background-color: #00BFFF;
  color: white;
  padding: 10px 18px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: #000080;
}
</style>

<h2>SignUp Form</h2>

<form action="create.php" method="post">
  <div class="imgcontainer">
    <img src="signup.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="username" style="color:gray"><b>YourName</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <br>
    <label for="roll no" style="color:gray"><b>Roll numb </b></label>
    <input type="text" placeholder="Enter Roll No" name="roll" required>

    <br>
    <label for="mobile" style="color:gray"><b>Mobile No</b></label>
    <input type="text" placeholder="Enter Mobile No" name="mobile" required>
    <br>
    <label for="psw" style="color:gray"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <br>
    <label for="c_pass" style="color:gray"><b>Confirm P</b></label>
    <input type="password" placeholder="Confirm Password" name="c_pass" required>
        
    <button type="submit">Create Account</button>
  </div>

  <div class="container">
    <button type="button" class="cancelbtn" id="myButton">Already have a account</button>
    <span class="text"><a href="teacher.php">Teacher login?</a></span>
  </div>

<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "login.php";
    };
</script>

</body>
</html>

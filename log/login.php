<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="login_css.css">
</head>
<body>

  <style>

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

<h2>Login Form</h2>

<form action="hello.php" method="post">
  <div class="imgcontainer">
    <img src="login.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname" style="color:gray"><b>Roll Numb</b></label>
    <input type="text" placeholder="Enter Roll no" name="uname" required>
    <br>
    <br>
    <label for="psw" style="color:gray"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <br>
    <label for="sub" style="color:gray"><b>Subject_n</b></label>
    <input type="text" placeholder="Enter Subject" name="sub" required>
        
    <button type="submit">Login</button>
  </div>

  <div class="container">
    <button type="button" class="cancelbtn" id="myButton">Create new account</button>
    <span class="text"><a href="teacher.php">Teacher login?</a></span>
  </div>

<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "signup.php";
    };
</script>

</body>
</html>

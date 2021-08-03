<?php
include 'comman.php';

$empobj=new Employee();

if(isset($_POST['submit'])){
  $empobj->register($_POST);
}

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
</style>
<script type="text/javascript">
function validate()
{
var a = document.getElementById('password').value;
var b = document.getElementById('confirmpass').value;
if(a!=b){
alert("Password do not match");
return false;
}
}
</script>

<title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
<div class="container">
<form action="register.php" method="post" onSubmit="return validate()" class="login" enctype="multipart/form-data">

<h1 style="color:Tomato;">REGISTERATION PAGE</h1>
 
Username: <input type="text" name="username" class="form-control" required  minlength="3"><br>
Email: <input type="email" name="email" class="form-control" required  pattern=".+@gmail.com" 
        placeholder="@gmail.com" maxlength="64"   title="the email must be in given format"><br>
Password: <input type="password" name="password"  class="form-control" id= "password" required minlength="4" maxlength="10"
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"><br>
Confirm Password: <input type="password" name="confirmpass" class="form-control" id="confirmpass" required><br><br>

<input type="submit" value="submit" name="submit" id="log">
<a href="login.php">Login</a>
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


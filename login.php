<?php
include 'comman.php';

$employeeobj = new Employee();

// Insert Record in customer table
if(isset($_POST['submit'])) {
  $employeeobj->login($_POST);

}


?>

<html>
<head>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
</head>
<body>
<div class="container">
<form  class="login" action="login.php" method="post">
<h2>LOGIN PAGE</h2>
<label>Username: <input type="text" name="username" class="form-control" id="Uname" required ><br>
<label>Password: <input type="password" name="password" class="form-control" id="Pass" required minlength="4" maxlength="8"><br><br>
<input type="submit" name="submit" id="log" ><br>
<a href="register.php" style="text-align:center;">Register </a>
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
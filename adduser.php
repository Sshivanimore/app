
<?php

  // Include database file
  include 'comman.php';

  $customerObj = new Employee();

  // Insert Record in customer table
  if(isset($_POST['submit'])) {
    $customerObj->insertData($_POST);
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>

<script>
    function validateEmail() {
    var emailText = document.getElementById('email').value;
    var pattern = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;
    if (pattern.test(emailText)) {
        return true;
    } else {
        alert('Bad email address: ' + emailText);
        return false;
    }
}

window.onload = function() {
    document.getElementById('email').onchange = validateEmail;
}
</script>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>Add New Employee</h4>
</div><br> 

<div class="container">
  <form action="adduser.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="name">First Name:</label>
      <input type="text" class="form-control" name="firstname" placeholder="Enter name" required="">
    </div>
    <div class="form-group">
      <label for="name">Last Name:</label>
      <input type="text" class="form-control" name="lastname" placeholder="Enter name" required="">
    </div>
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required="">
    </div>
    <div class="form-group">
    <label for="gender">Gender:</label>
    <select  name="gender" required class="form-control">
                <option value="male">Male</option>
                <option value="female">Female</option>
    </select>
      <!-- <label for="username">Username:</label> -->
      <!-- <input type="text" class="form-control" name="username" placeholder="Enter username" required=""> -->
    </div>
    <div class="form-group">
      <label for="upload">Upload Image:</label>
      <input type="file" name="photo[]" class="form-control"  multiple="" required />  
      <!-- <input type="password" class="form-control" name="password" placeholder="Enter password" required=""> -->
    </div>
    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

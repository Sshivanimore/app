<?php
  
  // Include database file
  include 'comman.php';

  $customerObj = new Employee();

  // Edit customer record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $customer = $customerObj->displayRecordById($editId);
  }

  // Update Record in customer table
  if(isset($_POST['update'])) {
    $customerObj->updateRecord($_POST);
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
<body>

<div class="card text-center" style="padding:15px;">
  <h4>Update Employee Record</h4>
</div><br> 

<div class="container">
  <form action="update.php" method="POST" enctype="multipart/form-data">
   <div class="form-group">
      <label for="name">First Name:</label>
      <input type="text" class="form-control" name="firstname" value="<?php echo $customer['firstname']?>" required="">
    </div>
    <div class="form-group">
      <label for="name">Last Name:</label>
      <input type="text" class="form-control" name="lastname"  value="<?php echo $customer['lastname']?>" required="">
    </div>
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" name="email"  value="<?php echo $customer['email']?>"required="">
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
    <div class="form-group">
      <input type="text" name="id" value="<?php echo $customer['empid']; ?>" hidden>
      <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
  
  // Include database file
  include 'comman.php';

  $customerObj = new Employee();

  // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $customerObj->deleteRecord($deleteId);
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
<style>
  #myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}

</style>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    console.log(tr.length)
    td = tr[i].getElementsByTagName("td")[0];
    console.log(td,'+++++++++++++++++++')
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>Listing of employee
  <a href="logout.php" class="btn btn-primary" style="float:right;">Logout</a>
  </h4>
</div><br><br> 

<div class="container">
  <?php
    // if(strpos($_SERVER['REQUEST_URI'],'Admin') !== false){
    //   echo  "<script>document.getElementById('permission').style.visibility = 'hidden';</script>";
    // }else{
    //   // echo "welcome user";
    // }
  
    
    // if($_GET['Admin'])

    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration added successfully
            </div>";
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration updated successfully
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Record deleted successfully
            </div>";
    }
    if(strpos($_SERVER['REQUEST_URI'],'Admin') !== false){
  ?>
  <h2>View Records
    <a href="adduser.php" class="btn btn-primary" style="float:right;">Add New Record</a>
  </h2>
  <?php
    }else{
      ?>
      <h2>View Records
      <a href="#" class="btn btn-primary" style="float:right;">Add New Record</a>
    </h2>
  <?php  
  }
  ?>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
  <table class="table table-hover" id="myTable">
    <thead>
      <tr>
        <th>EmpId</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>PhotoName</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          $customers = $customerObj->displayData(); 
          foreach ($customers as $customer) {
        ?>
        <tr>
          <td><?php echo $customer['empid'] ?></td>
          <td><?php echo $customer['firstname'] ?></td>
          <td><?php echo $customer['lastname'] ?></td>
          <td><?php echo $customer['email'] ?></td>
          <td><?php echo $customer['gender'] ?></td>
          <td><?php echo $customer['image'] ?></td>

          <?php
           if(strpos($_SERVER['REQUEST_URI'],'Admin') !== false){
            // echo  "<script>document.getElementById('permission').style.visibility = 'hidden';</script>";
          
          ?>
          <td>
            <a href="update.php?editId=<?php echo $customer['empid'] ?>" style="color:green">
              <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
            <a href="welcome.php?deleteId=<?php echo $customer['empid'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
          </td>
          <?php
           }
          else{
          ?>
            <td>
            <a href="#" style="color:green" >
              <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
            <a href="#" style="color:red" >
              <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
      <?php 
          }
    } ?>
    </tbody>
  </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

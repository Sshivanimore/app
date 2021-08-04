<html>
<head>
</head>
<body>
<form method="POST"  enctype="multipart/form-data">
 
      Select Technolgy:  
      PHP 
      <input type="checkbox" name="techno[]" value="PHP">  
      .Net
      <input type="checkbox" name="techno[]" value=".Net"> 
      Java 
      <input type="checkbox" name="techno[]" value="Java">  
      Javascript  
      <input type="checkbox" name="techno[]" value="javascript">  

     Name:
  
     <select size=1 name="select1">';


    <?php
        include "config.php";  // Using database connection file here

     
        $records = mysqli_query($con, "SELECT id,username From register");  
        

        while($data = mysqli_fetch_array($records))
        {    $userid = $data['id'];

        ?>

            <option name= "techoption" value  ="<?php echo $userid; ?>"> <?php  echo $data['username']; ?> </option>"; 

            <?php
        }	
          
?>
</select>
<br>

<input type="submit" value="submit" name="sub">
</form>

<?php

 require "config.php";

if(isset($_POST['sub'])){

$checkbox1 = $_POST['techno'];
$techoption = $_POST['select1'];


    $chk="";  
    foreach($checkbox1 as $chk1)  
       {  
          $chk.= $chk1.",";  
       }  


$sql = "INSERT INTO customer ( product ,user_id ) VALUES ( '$chk','$techoption' )";


if(mysqli_query($con,$sql)) {

    echo 'Data added sucessfully';
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
}
?>

<a href="logout.php">Logout</a>
</form>
</body>
</html>
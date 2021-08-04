<?php


require 'config.php';

$Username= $_POST['username'];
$Password= $_POST['password'];



$sql= "select * from register where username = '$Username' && password = '$Password' ";

$result = mysqli_query($con,$sql);

if(!$row = mysqli_fetch_assoc($result))
{
 echo "Your Username or password is incorrect"; 
 ?>
 <a href="login.php">Back</a>
 <?php
}
else{	



 header('location:welcome.php');
}

?>
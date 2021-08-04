<?php

require "config.php";

$Username= $_POST['username'];
$Email= $_POST['email'];
$Password= $_POST['password'];
$ConfirmPassword=$_POST['confirmpass'];
$date = date('Y-m-d H:i:s');
 

$countfiles= count($_FILES['photo']['name']);

$success =array();
$errors[]= array();

$uploadDir = 'uploads/';
$allowTypes = array('jpg','png','jpeg','gif','pdf');

if(!empty(array_filter($_FILES['photo']['name']))){
        foreach($_FILES['photo']['name'] as $key=>$val){
            $filename = basename($_FILES['photo']['name'][$key]);
            $targetFile = $filename;
            if(move_uploaded_file($_FILES["photo"]["tmp_name"][$key], $targetFile)){
                $success[] = "Uploaded $filename";
                $insertQrySplit[] = "$filename";
            }
            else {
                $errors[] = "Something went wrong- File - $filename";
            }
        }

 }

$query=implode(",", $insertQrySplit);

$sq= "select username from register where username = '$Username' ";

$result = mysqli_query($con,$sq);

if(mysqli_num_rows($result) > 0 ){
echo "User Already present";
}
else{

$sql = "Insert into register(username,email,password,confirmpass,image,datetime) values ('$Username','$Email','$Password','$ConfirmPassword','$query','$date')";



mysqli_query($con,$sql);
}

  header("refresh:1;url=login.php");

?>
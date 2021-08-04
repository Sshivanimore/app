<?php
$con = mysqli_connect('localhost','root','');
if(!$con)
{
echo "Server not connected";

}

if(!mysqli_select_db($con,'logon'))
{
echo "Database not connected";
}

$Email= $_POST['email'];
$Password= $_POST['password'];


$sql = "insert into login(email,password) values('$Email','$Password')";

if(!mysqli_query($con,$sql))
{
echo "not inserted into database";
}
else
{
echo "inserted into database";
}


header("refresh:3;url=welcome.php")

?>
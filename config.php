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

?>
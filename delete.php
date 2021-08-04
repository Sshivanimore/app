<?php
require "config.php";

$sql="DELETE from customer where empid='" . $_GET['id'] . "'";
$result= mysqli_query($con,$sql);

if(!$result){
	die ('could not delete data');
}
else{
	
	echo " Deleted successfully";	
}

header("location:welcome.php");
?>

<html>
<body>
	<form method="POST">
	</form>
</body>
</html>
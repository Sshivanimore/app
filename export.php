<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>




<?php 
require "config.php" ;

$query = "SELECT * FROM register";     
$rs_result = mysqli_query ($con, $query);
?>

<table   border="1">
        <thead>
         <tr>
         <th>Id</th>
         <th>Username</th>
         <th>Email</th>
         </tr>
         </thead>

         <tbody>
         	<?php

        while($row = mysqli_fetch_array($rs_result)){
        	?>

        <tr>
		<td><?php echo $row['id']; ?></td>
		<td><?php echo $row['username']; ?></td>
		<td><?php echo $row['email']; ?></td>
			</tr>

           <?php
        }
			?>

<?php
header("Content-type: application/xls");  
header("Content-Disposition: attachment; filename=User_Detail.xls");
?>
		</tbody>
	    </table>


</body>
</html>
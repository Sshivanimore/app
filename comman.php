<?php

	class Employee
	{
		private $servername = "localhost";
		private $username   = "root";
		private $password   = "";
		private $database   = "logon";
		public  $con;


		// Database Connection 
		public function __construct()
		{
		    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
		    if(mysqli_connect_error()) {
			 trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
		    }else{

			return $this->con;
		    }
		}

        public function login($post)
        {
            
                $Username=$this->con->real_escape_string($_POST['username']);
                $Password= $this->con->real_escape_string($_POST['password']);

                $sql= "select * from register where username = '$Username' && password = '$Password' ";

                // $result = mysqli_query($con,$sql);
                $result = $this->con->query($sql);
                if(!$row = $result->fetch_assoc())
                {
                 echo "Your Username or password is incorrect"; 
                 ?>
                 <a href="login.php">Back</a>
                 <?php
                }
                else{	
                if($Username == 'admin'){
                header('location:welcome.php?Admin');
                }else{
                 header('location:welcome.php');}
                }
                
        }

        public function register($post)
        {

                        
            $Username=$this->con->real_escape_string($_POST['username']);
            $Email= $this->con->real_escape_string($_POST['email']);
            $Password= $this->con->real_escape_string(md5($_POST['password']));
            $ConfirmPassword=$this->con->real_escape_string(md5($_POST['confirmpass']));

            // echo $Username."".$Email ."".$Password."".$ConfirmPassword;
            $sq= "select username from register where username = '$Username' ";

            $result = $this->con->query($sq);
            if(mysqli_num_rows($result) > 0 ){
                echo "User Already present";
                }
                else{
                
                $sql = "Insert into register(username,email,password,confirmpass,image,datetime) values ('$Username','$Email','$Password','$ConfirmPassword','$query','$date')";
                
                $s = $this->con->query($sql);
                if ($s==true) {
                    header("Location:welcome.php");
                }else{
                    echo "Registration failed!";
                }
                }
            
        }




		// Insert customer data into customer table
		public function insertData($post)
		{
			$firstname = $this->con->real_escape_string($_POST['firstname']);
			$lastname = $this->con->real_escape_string($_POST['lastname']);

			$email = $this->con->real_escape_string($_POST['email']);
			$gender = $this->con->real_escape_string($_POST['gender']);
			// $password = $this->con->real_escape_string(md5($_POST['password']));
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
            
                $q= "INSERT INTO `customer` ( `firstname`, `lastname`, `image`, `gender`, `email`) 
                     VALUES ('$firstname', '$lastname', '$query', '$gender', '$email')";
                     echo $q;
                    //  exit();
            $sql = $this->con->query($q);
			if ($sql==true) {
			    header("Location:welcome.php?msg1=insert");
			}else{
			    echo "New Data Add failed!";
			}
		}

	// 	// Fetch customer records for show listing
		public function displayData()
		{
		    $query = "SELECT * FROM customer";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			 return $data;
		    }else{
			 echo "No found records";
		    }
		}

	// 	// Fetch single data for edit from customer table
		public function displayRecordById($id)
		{
		    $query = "SELECT * FROM customer WHERE empid = '$id'";
		    $result = $this->con->query($query);
		    if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "Record not found";
		    }
		}

	// 	// Update customer data into customer table
		public function updateRecord($postData)
		{
		   
			$firstname = $this->con->real_escape_string($_POST['firstname']);
			$lastname = $this->con->real_escape_string($_POST['lastname']);
            $id = $this->con->real_escape_string($_POST['id']);
			$email = $this->con->real_escape_string($_POST['email']);
			$gender = $this->con->real_escape_string($_POST['gender']);
			// $password = $this->con->real_escape_string(md5($_POST['password']));
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
            
		 
		if (!empty($id) && !empty($postData)) {
			$q = "UPDATE customer SET firstname = '$firstname',lastname='$lastname', email = '$email', gender = '$gender',image='$query' WHERE empid = '$id'";
			// echo $q;
            // exit();
            $sql = $this->con->query($q);
			if ($sql==true) {
			    header("Location:welcome.php?msg2=update");
			}else{
			    echo "Employee updated failed try again!";
			}
		    }
			
		}


	// 	// Delete customer data from customer table
		public function deleteRecord($id)
		{
		    $query = "DELETE FROM customer WHERE empid = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:welcome.php?msg3=delete");
		}else{
			echo "Record does not delete try again";
		    }
		}

	}
?>
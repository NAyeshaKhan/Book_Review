<?php
	session_start();
	if(isset($_POST['save'])){
		extract($_POST);
		include 'database.php';
		$sql=mysqli_query($conn,"SELECT * FROM `user` where email='$email' and password='md5($pass)'");
		$row  = mysqli_fetch_array($sql);
		if(is_array($row))
		{
			$_SESSION["id"] = $row['user_id'];
			$_SESSION["email"]=$row['email'];
			$_SESSION["fname"]=$row['fname'];
			$_SESSION["lname"]=$row['lname']; 
			if($row['user_type']=="admin"){
				header("Location: admin_home.php");
			}elseif($row['user_type']=="user"){
				header("Location: user_home.php");
			}
		}
		else{
			echo "Invalid Email ID/Password";
		}
	}
?>
<?php
extract($_POST);
include("database.php");
$sql=mysqli_query($conn,"SELECT * FROM `user` where email='$email'");
	if(mysqli_num_rows($sql)>0)
	{
		echo "Email Id Already Exists"; 
		exit;
	}elseif(isset($_POST['save'])){
		$imgpath="";
		$first_name=trim($first_name);
		$last_name=trim($last_name);
		$email=trim($email);
		$hash=password_hash($pass, PASSWORD_DEFAULT);
		$query="INSERT INTO `user`(`fname`, `lname`, `email`, `password`, `user_type`, `profile_pic`) VALUES ('$first_name', '$last_name', '$email', '$hash', '$user_type', '$imgpath')";
		$sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
		
		header ("Location: login.php?status=success");
	}else {
		echo '<script>alert("Invalid User Information. Please retry.")</script>';
		}
		
		
	

?>
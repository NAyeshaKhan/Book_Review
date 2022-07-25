<?php
extract($_POST);
include("database.php");
$sql=mysqli_query($conn,"SELECT * FROM `user` where email='$email'");
	if(mysqli_num_rows($sql)>0)
	{
		echo '<script>alert("Email Id Already Exists")</script>'; 
		exit;
	}elseif((!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) || (!preg_match("/^[a-zA-Z-' ]*$/",$last_name))){
		echo '<script>alert("Name must consist of only letters.")</script>'; 
		exit;
	}elseif(strlen($pass)<6){
		echo '<script>alert("Password must consist of mor than 6 characters.")</script>'; 
		exit;
	}elseif($cpass!=$pass){
		echo '<script>alert("Passwords don\'t match.")</script>'; 
		exit;
	}elseif(isset($_POST['save'])){
		$imgpath="";
		$first_name=test_input($first_name);
		$last_name=test_input($last_name);
		$email=test_input($email);
		$hash=password_hash($pass, PASSWORD_DEFAULT);
		
		$query="INSERT INTO `user`(`fname`, `lname`, `email`, `password`, `user_type`, `profile_pic`) VALUES ('$first_name', '$last_name', '$email', '$hash', '$user_type', '$imgpath')";
		$sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
		
		$cookie_name = "book_id";
		$cookie_value = 'XXXX';
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
		
		header ("Location: login.php?status=success");
	}else {
		echo '<script>alert("Invalid User Information. Please retry.")</script>';
		exit;
	}
		
		
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}	
	

?>
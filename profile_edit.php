<?php 
    include 'database.php';
    session_start();
    include('header.php');
	$user_id=$_SESSION['id'];
	if(isset($_POST['save_name'])){
		extract($_POST);
		
		$fname=mysqli_real_escape_string($conn,$fname);
		$lname=mysqli_real_escape_string($conn,$lname);
		
		$sql = $conn->prepare("UPDATE `user` SET `fname`= ?, `lname`= ? WHERE user_id='$user_id'");
		$sql->bind_param("ss", $fname, $lname);
		$sql->execute();

    }else if(isset($_POST['save_pass'])){
		if($_POST['pass']!=$_POST['cpass']){
			echo '<script>alert("Passwords do not match")</script>';
		}else{
			extract($_POST);
			$hash=password_hash($_POST['pass'], PASSWORD_DEFAULT);
			
			$sql = $conn->prepare("UPDATE `user` SET `password`= ? WHERE user_id='$user_id'");
			$sql->bind_param("s", $hash);
			$sql->execute();
		}
	}
	
	header("Location: profile_view.php");
?>
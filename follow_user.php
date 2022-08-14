<?php
extract($_GET);
session_start();
include("database.php");
	$following_user=$id;
	$user_id=$_SESSION['id'];
	
	$follow=mysqli_query($conn,"INSERT INTO `following` (`user_id_1`, `user_id_2`) VALUES ('$user_id', '$following_user')")or die("Could Not Follow the User");
	if($_SESSION['user_type']=='user'){
		header("Location: user-other_reviews.php");
	}elseif($_SESSION['user_type']=='admin'){
		header("Location: admin_dashboard.php");
	}	
?>
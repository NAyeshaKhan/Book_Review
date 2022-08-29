<?php
extract($_GET);
session_start();
include("database.php");
	$following_user=$id;
	$user_id=$_SESSION['id'];
	
	$follow = $conn->prepare("INSERT INTO `following` (`user_id_1`, `user_id_2`) VALUES (?, '$following_user')")or die("Could Not Follow the User");
	$follow->bind_param("i",$user_id );
	$follow->execute();
	
	if($_SESSION['user_type']=='user'){
		header("Location: user-other_reviews.php");
	}elseif($_SESSION['user_type']=='admin'){
		header("Location: admin_dashboard.php");
	}	
?>
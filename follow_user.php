<?php
extract($_GET);
session_start();
include("database.php");
	$user=$id;
	$user_id=$_SESSION['id'];
	#Check if following exists
    $follow=mysqli_query($conn,"INSERT INTO `following` (`user_id_1`, `user_id_2`) VALUES ('$user_id', '$user')");
	if($_SESSION['user_type']=='user'){
		header("Location: user-other_reviews.php");
	}elseif($_SESSION['user_type']=='admin'){
		header("Location: admin_dashboard.php");
	}	
?>
<?php
extract($_GET);
session_start();
include("database.php");
	$unfollowing_user=$id;
	$user_id=$_SESSION['id'];
	
	$unfollow = $conn->prepare("DELETE FROM `following` where user_id_1=? AND user_id_2='$unfollowing_user'")or die("Could Not Unfollow the User");
	$unfollow->bind_param("i",$user_id );
	$unfollow->execute();
	
	header("Location: user-other_reviews.php");
	?>
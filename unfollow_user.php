<?php
extract($_GET);
session_start();
include("database.php");
	$unfollowing_user=$id;
	$user_id=$_SESSION['id'];
    
	$unfollow=mysqli_query($conn,"DELETE FROM `following` where user_id_1='$user_id' AND user_id_2='$unfollowing_user'")or die("Could Not Unfollow the User");
	header("Location: user-other_reviews.php");
	?>
<?php
extract($_GET);
session_start();
include("database.php");
	$user=$id;
	$user_id=$_SESSION['id'];
	#Check if following exists
    $follow=mysqli_query($conn,"INSERT INTO `following` (`user_id_1`, `user_id_2`) VALUES ('$user_id', '$user')");
	header("Location: other_reviews.php");
?>
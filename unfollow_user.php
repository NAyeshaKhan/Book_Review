<?php
extract($_GET);
session_start();
include("database.php");
	$user=$id;
	$user_id=$_SESSION['id'];
    $unfollow=mysqli_query($conn,"DELETE FROM `following` where user_id_1='$user_id' AND user_id_2='$user'");
	header("Location: other_reviews.php");
	?>
<?php
extract($_GET);
session_start();
include("database.php");
	$library_id=$id;
	$isbn='';
	#Check if following exists
    $lib=mysqli_query($conn,"INSERT INTO `library` (`library_id`, `ISBN`) VALUES ('$library_id', '$isbn')");
	if($_SESSION['user_type']=='admin'){
			header("Location: admin-library_info.php");
		}else if($_SESSION['user_type']=='user'){
			header("Location: user-my_libraries.php");
		}
?>
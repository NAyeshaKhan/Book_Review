<?php
extract($_GET);
session_start();
include("database.php");
	$sql=mysqli_query($conn,"DELETE FROM `library_shelf` where library_id='$lib_id'")or die("Could Not Perform the Query");;
    
	$sql=mysqli_query($conn,"DELETE FROM `library` where library_id='$lib_id'")or die("Could Not Perform the Query");;
    if($_SESSION['user_type']=='admin'){
		header("Location: admin-library_info.php");
	}else if($_SESSION['user_type']=='user'){
		header("Location: user-my_libraries.php");
	}
?>
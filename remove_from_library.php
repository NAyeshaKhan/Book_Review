<?php
extract($_GET);
session_start();
include("database.php");
    $sql=mysqli_query($conn,"DELETE FROM `library_shelf` WHERE book_id='$id' AND library_id='$lib_id' ")or die("<h2 align='center'>Could Not Remove the Book</h2>");
	
    if($_SESSION['user_type']=='admin'){
		header("Location: admin-library_info.php");
	}else if($_SESSION['user_type']=='user'){
		header("Location: user-my_libraries.php");
	}
?>
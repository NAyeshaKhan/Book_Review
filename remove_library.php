<?php
extract($_GET);
session_start();
include("database.php");
	#Delete all books in library
	$sql=mysqli_query($conn,"DELETE FROM `library_shelf` where library_id='$lib_id'")or die("<h2 align='center'>Could Not Perform the Query</h2>");
    #Delete the library
	$sql=mysqli_query($conn,"DELETE FROM `library` where library_id='$lib_id'")or die("<h2 align='center'>Could Not Remove the Library</h2>");
    if($_SESSION['user_type']=='admin'){
		header("Location: admin-library_info.php");
	}else if($_SESSION['user_type']=='user'){
		header("Location: user-my_libraries.php");
	}
?>
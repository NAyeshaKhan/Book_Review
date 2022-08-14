<?php  
		
	session_start();
	include("database.php");
	
	$lib_id=$_POST['library_id'];
	$book_id=$_POST['book_id'];
	$lib=mysqli_query($conn,"INSERT INTO `library_shelf` (`library_id`, `book_id`) VALUES ('$lib_id', '$book_id')")or die("<h2 align='center'>Could not add to Library.</h2>");
	if($_SESSION['user_type']=='admin'){
			header("Location: admin-library_info.php");
		}else if($_SESSION['user_type']=='user'){
			header("Location: user-my_libraries.php");
		}
	
?>
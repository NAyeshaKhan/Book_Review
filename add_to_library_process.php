<?php  
	session_start();
	include("database.php");
	
	$lib_id=$_POST['library_id'];
	$book_id=$_POST['book_id'];
	
	$add_book = $conn->prepare("INSERT INTO `library_shelf` (`library_id`, `book_id`) VALUES (?,?)");
	$add_book->bind_param("is",$lib_id, $book_id );
	$add_book->execute()or die("<h2 align='center'>Could not add to Library.</h2>");
			
	if($_SESSION['user_type']=='admin'){
			header("Location: admin-library_info.php");
		}else if($_SESSION['user_type']=='user'){
			header("Location: user-my_libraries.php");
		}
	
?>
<?php 
	if(!$_SESSION['isLogged']) {
	  header("location:login.php"); 
	  die();
	}
	if($_SESSION['user_type']!="admin") {
	  header("location:login.php"); 
	  die();
	}

?>
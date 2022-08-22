<?php 
	if(!$_SESSION['isLogged']) {
	  header("location:login.php"); 
	  die();
	}
	if($_SESSION['user_type']!="user") {
	  header("location:login.php"); 
	  die();
	}
	
	$id= $_SESSION["id"];
?>
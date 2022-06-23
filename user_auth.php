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
	$user_sql=mysqli_query($conn,"SELECT * FROM user where user_id='$id' ");
	$row= mysqli_fetch_array($user_sql);
?>
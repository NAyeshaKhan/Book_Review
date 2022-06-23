<?php 
	if(!$_SESSION['isLogged']) {
	  header("location:login.php"); 
	  die();
	}
	if($_SESSION['user_type']!="admin") {
	  header("location:login.php"); 
	  die();
	}
	$id= $_SESSION["id"];
	$sql_admin=mysqli_query($conn,"SELECT * FROM user where user_id='$id' ");
	$row= mysqli_fetch_array($sql_admin);
?>
<?php
	include 'database.php';
	session_start();
	
	if($_SESSION['user_type']!="user") {
	  header("location:login.php"); 
	  die();
	}
	$id= $_SESSION["id"];
	$sql=mysqli_query($conn,"SELECT * FROM user where user_id='$id' ");
	$row= mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book Review Site</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php include('header.php'); ?>

<body> 
</body>

</html>

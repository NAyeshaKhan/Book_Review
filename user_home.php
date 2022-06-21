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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="home_style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>



<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="header">
		<img src="https://img.icons8.com/external-xnimrodx-lineal-gradient-xnimrodx/64/000000/external-review-passive-income-xnimrodx-lineal-gradient-xnimrodx.png"/ style="float:left;">
		<h3>Hi </b><?php echo " ",$_SESSION["fname"] ?> <?php echo $_SESSION["lname"] ?>!</h3>
    </div>
	<div class="container-fluid navbar-header navbar-right">
	<ul class="nav navbar-nav">
      <li><a href="user_home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li><a href="about.php"><span class="glyphicon glyphicon-info-sign"></span> About</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
        <ul class="dropdown-menu active">
          <li><a href="profile_update.php"><span class="glyphicon glyphicon-edit"></span> Update Profile</a><li>
		  <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
 
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/home_style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="header" style="margin:50 px;">
			<a href="index.php" style="float:left;">
			 <img alt="Website icon" src="img/bookrev_icon.png">
			</a>
	</div>
	<?php if ($_SESSION["isLogged"]): ?>
		<div class="header">
			<h3>Hi </b><?php echo " ",$_SESSION["fname"] ?> <?php echo $_SESSION["lname"] ?>!</h3>
		</div>
		<div class="container-fluid navbar-header navbar-right">
		<ul class="nav navbar-nav">
		  <?php if ($_SESSION["user_type"]=="admin"): ?>
		  <li><a href="admin_dashboard.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		  <?php else: ?>
		  <li><a href="user_dashboard.php"<span class="glyphicon glyphicon-home"></span> Home</a></li>
		  <?php endif; ?>
		  <li><a href="about.php"><span class="glyphicon glyphicon-info-sign"></span> About</a></li>
		  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
			<ul class="dropdown-menu active">
			  <li><a href="profile_update.php"><span class="glyphicon glyphicon-edit"></span> Update Profile</a></li>
			  <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
			</ul>
		  </li>
	<?php else: ?>
		<div class="container-fluid navbar-header navbar-right">
		<ul class="nav navbar-nav">
		  <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign-Up</a></li>
		  <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		</ul>
	<?php endif; ?>
  </div>
</nav>
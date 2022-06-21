<?php
	session_start();
	include 'database.php';
	$id= $_SESSION["user_id"];
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>



<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
	<?php if ($_SESSION["isLogged"]): ?>
	<div style="color:white; font-size: 20px; text-align:center;">
		Logged in as Admin: Hi </b><?php echo " ",$_SESSION["fname"] ?> <?php echo $_SESSION["lname"] ?>!
	</div>
	<?php endif ?>
    <div class="container-fluid navbar-header navbar-right">
	<?php if ($_SESSION["isLogged"]): ?>
    <ul class="nav navbar-nav">
      <li><a href="user_home.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="profile_update.php">Update Profile</a><li>
	  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
        <ul class="dropdown-menu active">
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </li>
    </ul>
	<?php else: ?>
	<ul class="nav navbar-nav">
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign-Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
	<?php endif; ?>
  </div>
</nav>
 
</body>

</html>

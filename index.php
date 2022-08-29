<?php
	session_start();
	include 'database.php';
	include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome To BookRev</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/overlay.css">
</head>
<style>
	body{
		margin-left:200px;
		background-color:#F4F1EA;
	}
	@media only screen and (max-width: 600px) {
		.containerX, .middle{
			padding-top:23rem;
			width:100%;
			margin:80px;
		}
		body{
			margin:0px;
		}
	}
</style>
<body>
	<div class="containerX">
		  <img src="img/book_about.jpg" alt="Books on a shelf" class="image" style="width:100%">
		  <div class="middle">
		    <h1>Welcome to BookRev!</h1>
			<?php if (!$_SESSION["isLogged"]): ?>
				<a href="register.php"><button class="btn btn-success btn-lg" style="color:white;">Sign Up</button></a>
				<a href="login.php"><button class="btn btn-success btn-lg" style="color:white;">Login</button></a>
			<?php else: ?>
				<a href="about.php"><button class="btn btn-success btn-lg" style="color:white;">About Us</button></a>
			<?php endif; ?>
		  </div>
	</div>
</body>

</html>

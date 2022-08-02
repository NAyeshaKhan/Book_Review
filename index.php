<?php
	session_start();
	include 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome To BookRev</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/overlay.css">
</head>

<?php include('header.php'); ?>
<?php if ($_SESSION["isLogged"]): ?>
<body  style="background-color:#F4F1EA;margin-left: 200px;">
<?php endif; ?>
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
		  <?php
		  $cookie_name="book_id";
		  if (isset($_COOKIE[$cookie_name])): ?>
			<p><?php echo "Cookie named '" . $cookie_name . "' is set!";?></p>
			<p><?php echo "Value is: " . $_COOKIE[$cookie_name];?></p>
		  <?php else: ?>
			<p><?php echo "Cookie named '" . $cookie_name . "' is not set!";?></p>
		  <?php endif; ?>
	</div>
</body>

</html>

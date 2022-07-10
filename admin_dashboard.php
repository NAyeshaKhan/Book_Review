<?php
	include 'database.php';
	session_start();
	include 'admin_auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>BookRev Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<?php include('header.php'); ?>
<body style="background-color:#F4F1EA;float:right;">
	<div class="container">
		<div class="card" style="width:30rem; margin:2rem 5rem; padding:2rem; background-color:white;">
			<div class="card-header">Quote</div>
			<div class="card-body">
				<h5 class="card-title">Special title treatment</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				<a href="#" class="btn btn-primary">Go somewhere</a>
			</div>
		</div>
			<div class="card" style="width:30rem; margin:2rem 5rem; padding:2rem; background-color:white;">
				<div class="card-header">Quote</div>	
				<div class="card-body">
					<h5 class="card-title">Special title treatment</h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					<a href="#" class="btn btn-primary">Go somewhere</a>
		</div>
	</div>	
	</div>
</body>

</html>

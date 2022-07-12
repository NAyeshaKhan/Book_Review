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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>
<?php include('header.php'); ?>
	<body style="background-color:#F4F1EA;float:right;">
		<div class="container" style="float:left;">
			<div class="cardA" style="min-width:50rem;">
				<div class="card-header">USERS</div>
				<div class="card-body">
					<h5 class="card-title"></h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					<a href="admin-user_info.php" class="btn btn-primary"><span class="glyphicon glyphicon-list"></span></a>
				</div>
			</div>
			<div class="cardA" style="min-width:50rem;">
				<div class="card-header">REVIEWS</div>	
				<div class="card-body">
					<h5 class="card-title"></h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					<a href="add_review.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></a>
					<a href="admin-review_info.php" class="btn btn-primary"><span class="glyphicon glyphicon-list"></span></a>
				</div>
			</div>
			<div class="cardA" style="min-width:50rem;">
				<div class="card-header">LIBRARIES</div>	
				<div class="card-body">
					<h5 class="card-title"></h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					<a href="admin_add_review.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></a>
					<a href="admin-review_info.php" class="btn btn-primary"><span class="glyphicon glyphicon-list"></span></a>
				</div>
			</div>
		</div>
	</body>

</html>

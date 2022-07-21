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
			<div class="cardA review" style="width:3rem;">
				<div class="card-header"><b>USERS</b></div>
				<div class="card-body">
					<h5 class="card-title"></h5>
					<a href="admin-user_info.php" class="btn btn-primary"><span class="glyphicon glyphicon-list"></span></a>
				</div>
			</div>
			<div class="cardA review">
				<div class="card-header"><b>REVIEWS</b></div>	
				<div class="card-body">
					<h5 class="card-title"></h5>
					<a href="add_review.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></a>
					<a href="admin-review_info.php" class="btn btn-primary"><span class="glyphicon glyphicon-list"></span></a>
				</div>
			</div>
			<div class="cardA review">
				<div class="card-header"><b>LIBRARIES</b></div>	
				<div class="card-body">
					<h5 class="card-title"></h5>
					<a href="add_library.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></a>
					<a href="admin-library_info.php" class="btn btn-primary"><span class="glyphicon glyphicon-list"></span></a>
				</div>
			</div>
		</div>
	</body>

</html>

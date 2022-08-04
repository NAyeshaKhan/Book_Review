<?php
	include 'database.php';
	session_start();
	include 'admin_auth.php';
	include('header.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>BookRev Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
	.cardA{
		width:80%;
		margin-top:3rem;
		font-size:48px;
		color:#472d30;
	}
	@media only screen and (max-width: 600px) {
		
		body{
			width:100%;
		}
		.cardA{
			margin:5rem;
			width:80%;
		}
		.user{
			margin-top:25rem;
		}
	}
</style>

	<body style="background-color:#F4F1EA;float:right;">
		<div class="container" style="float:left;">
			<div class="cardA review user">
				<div class="card-header" style="text-align:center;"><b>USERS</b></div>
				<div class="card-body" style="float:right;">
					<a href="admin-user_info.php" class="btn btn-primary"><span class="glyphicon glyphicon-list"></span></a>
				</div>
			</div>
			<div class="cardA review">
				<div class="card-header" style="text-align:center;"><b>REVIEWS</b></div>	
				<div class="card-body" style="float:right;">
					<a href="add_review.php?id=XXXX" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></a>
					<a href="admin-review_info.php" class="btn btn-primary"><span class="glyphicon glyphicon-list"></span></a>
				</div>
			</div>
			<div class="cardA review">
				<div class="card-header" style="text-align:center;"><b>LIBRARIES</b></div>	
				<div class="card-body" style="float:right;">
					<a href="add_library.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></a>
					<a href="admin-library_info.php" class="btn btn-primary"><span class="glyphicon glyphicon-list"></span></a>
				</div>
			</div>
		</div>
	</body>

</html>

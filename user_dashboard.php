<?php
	include 'database.php';
	session_start();
	include 'user_auth.php';
	$user_result= mysqli_query($conn,"SELECT * FROM user where user_id='id'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>BookRev User Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<?php include('header.php'); ?>
<body style="background-color:#F4F1EA;">
<div class="card" style="text-align:center;">
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="container">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#genre">Genres</a></li>
				<li><a data-toggle="tab" href="#users">Other Users</a></li>
			</ul>
			
			<div class="tab-content">
				<div id="genre" class="tab-pane fade in active">
					<h3>See The Latest Books By Genre</h3>
				</div>
				<div id="users" class="tab-pane fade">
					<h3>See What Your Fellow Reviewers Are Reading!</h3>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

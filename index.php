<?php
	session_start();
	include 'database.php';
	$id= $_SESSION["id"];
	$sql=mysqli_query($conn,"SELECT * FROM user where user_id='$id' ");
	$row= mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>About BookRev</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/home_style.css">
  </head>
<?php include('header.php'); ?>
<body>
<br>
<br>
	<div style="text-align:center;">
		<div>
			<img src="img/book_stack.jpg" alt="Books on a shelf" style="height:70%; width: 78%;"></img>
		</div>
		<h1>Welcome to BookRev!</h1>
		<h3 class="text-muted">DESCRIPTION</h3>
		<div class="container" style="margin:15 px; width:80%">
		  <h2>A Few Things You Can Do On Our Site</h2>
		  <ul class="list-group list-group-flush">
			<li class="list-group-item">See what books your friends are reading.</li>
			<li class="list-group-item">Track the books you're reading, have read, and want to read.</li>
			<li class="list-group-item">Check out your personalized book recommendations.</li>
			<li class="list-group-item">Find out if a book is a good fit for you from our community’s reviews.</li>
		  </ul>
		</div>
	</div> 
</body>

</html>

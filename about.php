<?php
	session_start();
	include 'database.php';
	include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>About BookRev</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/overlay.css">
</head>
<style>
	
	@media only screen and (max-width: 600px) {
		.containerX, .middle{
			padding-top:45rem;
			width:100%;
			margin-left:0rem;
		}
	}
</style>
<body style="background-color:#F4F1EA;margin-left: 130px;">
	<div class="containerX" style="width:100%;height:100%;">
		<img src="img/book_stack.jpg" alt="Books on a shelf" class="image" >
		<div class="middle">
			<br>
			<h1  style="text-align:center;">Welcome to BookRev!</h1>
			<div class="row" style="margin:5 px; width:100%">
			  <div class="col-2">
				  <h3>Our Mission</h3>
				  <p>Our mission is to help people find and share books they love. BookRev launched in 2022.</p>
				  <p>Our goal is to connect every book lover with their next great read. 
				  BookRev covers all types of books—from literary fiction, history and biography to popular genres 
				  like romance and mystery—and our book reviews are informative and accessible.</p>
			  </div>
			  <div class="col-3">
				  <h3>What are your friends reading?</h3> 
				  <p>Chances are your friends are discussing their favorite (and least favorite) books!</p>
			  </div>
			  <div class="col-3">
				  <h3>Why would I want to create book collections?</h3>
				  <p>Aside from the warm, fuzzy feeling of contributing to the community, there are lots of ways you can use lists, now that we've added the multiple list feature: 
					 you can keep track of books you've read and liked, 
					 or have a wish list of things you want to read (or even a list of books you hated).</p>
			  </div>
			  <div class="col-4">
				  <h3>Reviewing Guidelines</h3>
				  <p>Here at BookRev, we encourage honesty in the books being reviewed, and welcome a 
				  diversity of perspectives. In order to keep this conversation constructive, 
				  we actively moderate any reviews that we feel violate our standards.</p>
			  </div>
			</div>
		</div>
	</div>	 
</body>

</html>

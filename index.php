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
		<div class="container" style="margin:15 px; width:80%">
		  <div style="column-gap: 40px; float:left; width:25%;">
			  <h3>What are your friends reading?</h3> 
			  <p>Chances are your friends are discussing their favorite (and least favorite) books!</p>
			  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit </p>
		  </div>
		  <div style="column-gap: 40px; float:left; width:50%;">
			  <h3>Our Mission</h3>
			  Our goal is to connect every book lover with their next great read. 
			  BookRev covers all types of books—from literary fiction, history and biography to popular genres 
			  like romance and mystery—and our book reviews are informative and accessible.
		  </div>
		  <div style="column-gap: 40px; float:left; width:25%;">
			  <h3>Why would I want to create book collections?</h3>
			  <p>Aside from the warm, fuzzy feeling of contributing to the community, there are lots of ways you can use lists, now that we've added the multiple list feature: 
				 you can keep track of books you've read and liked, or have a wish list of things you want to read, or even a list of books you hated. 
		  </div>
		</div>
	</div> 
</body>

</html>

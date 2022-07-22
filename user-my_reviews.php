<?php
	include 'database.php';
	session_start();
	include 'user_auth.php';
	
	$id=$_SESSION['id'];
	$sql = "SELECT * FROM `review` WHERE user_id='$id'";
	$user_reviews= mysqli_query($conn,$sql);
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>BookRev Your Reviews Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>
<?php include('header.php'); ?>
<body style="background-color:#F4F1EA;">
	<div class="container">
		<h3 style="text-align:center;"><?php echo $_SESSION['fname'] ?> <?php echo $_SESSION['lname'] ?>'s Reviews</h3>
		<?php if ($user_reviews->num_rows > 0): ?>
			<?php while($array=mysqli_fetch_row($user_reviews)): ?>
				<div class="cardA" style="margin-left:10rem;">
				<?php 
					$book_id=$array[2];
					$page = file_get_contents("https://www.googleapis.com/books/v1/volumes/$book_id");
					$data = json_decode($page, true);?>
					<img src="img/book.png" style="vertical-align: middle; width: 150px; height: 150px; border-radius: 5px;float:left; "></img>
					<a href="view_review.php?id=<?php echo $array[2]; ?>"><div class="card-header"><b>Title:</b> <?php echo $data['volumeInfo']['title'];?></div></a>
					<div class="card-body">
						<h5 class="card-title"><b><?php echo $array[3];?></b></h5>
						<div><p class="card-text"><?php echo $array[4];?></p></div>
						<div style="float:right;">
							<a href= "edit_review.php?id=<?php echo $array[0]; ?> "><span class="glyphicon glyphicon-pencil"></span></a>
							<a href= "delete_review.php?id=<?php echo $array[0]; ?> "><span class="glyphicon glyphicon-trash"></span></a>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		<?php else: ?>
			<h4 style="text-align:center;">No User Data Found</h4>
		<?php endif; ?>
		
		
	</div>
</body>
</html>
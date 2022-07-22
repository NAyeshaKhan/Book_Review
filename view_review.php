<?php 
    include 'database.php';
    session_start();
    include('header.php');
	
	extract($_GET);
	$book_id=$id;;
	$sql = "SELECT user.user_id, user.fname, user.lname, review.book_id, review.title, review.description FROM `review` INNER JOIN `user` ON user.user_id=review.user_id WHERE book_id='$id'";
	$book_reviews= mysqli_query($conn,$sql);
		
	$page = file_get_contents("https://www.googleapis.com/books/v1/volumes/$book_id");
	$data = json_decode($page, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>BookRev Reviews Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>
<body style="background-color:#F4F1EA;">
	<div class="container">
		<div style="text-align:center;">
			<h3 style="text-align:center;">Reviews for <?php echo $data['volumeInfo']['title'];?></h3>
			<a href= "add_review.php?id=<?php echo $book_id; ?> "><button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Add Review</button></a>
		</div>
		<?php if ($book_reviews->num_rows > 0): ?>
			<?php while($array=mysqli_fetch_row($book_reviews)): ?>
				<div class="cardA" style="margin-left:10rem;">
					<div style="float:left;width:7	rem;">
						<img src="img/default-user.jpg" style="vertical-align: middle; width: 50px; height: 50px; border-radius: 50%; "></img>
						<div class="card-header"><b><?php echo $array[1];?> <?php echo $array[2];?></b></div>
						<?php 
							$my_id=$_SESSION['id']; 
							$sql=mysqli_query($conn,"SELECT * FROM following WHERE user_id_1='my_id' AND user_id_2='$array[0]'");
							if($sql->num_rows == 0): ?>
							<a href= "follow_user.php?id=<?php echo $array[0]; ?> "><button class="btn btn-success">Follow</button></a>
							<?php else: ?>
							<a href= "unfollow_user.php?id=<?php echo $array[0]; ?> "><button class="btn btn-success">Unfollow</button></a>
						<?php endif; ?>
					</div>
					<div>
						<img src="img/book.png" style="vertical-align: middle; width: 150px; height: 150px; border-radius: 5px;float:left; "></img>
						<div class="card-header"><b>Title:</b> <?php echo $data['volumeInfo']['title'];?></div>
						<div class="card-body">
							<h5 class="card-title"><b><?php echo $array[4];?></b></h5>
							<div><p class="card-text"><?php echo $array[5];?></p></div>
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
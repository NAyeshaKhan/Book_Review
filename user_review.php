<?php
	include 'database.php';
	session_start();
	include 'admin_auth.php';
	$id=$_GET['id'];
	$sql = "SELECT user.user_id, fname, lname, email, book_id, title, description, review_id FROM `user` LEFT JOIN `review` ON user.user_id=review.user_id WHERE user.user_id='$id'";
	$user_reviews= mysqli_query($conn,$sql);
	$result = $mysqli->query($sql);
	$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>BookRev Admin Panel</title>
</head>
<?php include('header.php'); ?>
	<body style="background-color:#F4F1EA;">
		<div class="card">
			<div class="card">
			<h3><?php echo $row['fname'] ?> <?php echo $row['lname'] ?>'s Reviews</h3>
			<?php if ($user_reviews->num_rows > 0 && $row['book_id']!=NULL): ?>
				<?php while($array=mysqli_fetch_row($user_reviews)): ?>
					<div class="cardA">
						<img src="img/book.png" style="vertical-align: middle; width: 150px; height: 150px; border-radius: 5px;float:left; "></img>
					<a href="view_review.php?id=<?php echo $array[4]; ?>"><div class="card-header">Book ID: <?php echo $array[4];?></div></a>
						<div class="card-body">
							<h5 class="card-title"><b><?php echo $array[5];?></b></h5>
							<div><p class="card-text"><?php echo $array[6];?></p></div>
							<div style="float:right;">
								<a href= "edit_review.php?id=<?php echo $array[7]; ?> "><span class="glyphicon glyphicon-pencil"></span></a>
								<a href= "delete_review.php?id=<?php echo $array[7]; ?> "><span class="glyphicon glyphicon-trash"></span></a>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php else: ?>
				<p colspan="3" rowspan="1" headers="">No User Data Found</p>
			<?php endif; ?>
			</div>
			<div  style="text-align:center;">
				<a href="admin-user_info.php"><button type="button" class="btn btn-success">Return To User Panel</button></a>
			</div>
		</div>
	</body>
</html>
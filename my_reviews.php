<?php
	include 'database.php';
	session_start();
	include 'user_auth.php';
	$user_reviews= mysqli_query($conn,"SELECT ISBN, title, description FROM review WHERE user.user_id ='id'");	
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
	<br><br><br>
	<div class="card" style="text-align:center;">
		<h3>View Your Reviews</h3>
			<?php if (!empty($user_reviews) && $user_reviews->num_rows > 0): ?>
				<?php while($array=mysqli_fetch_row($user_reviews)): ?>
					<span><?php echo $array[1];?></span>
					<p><?php echo $array[2];?></p>
					<td><button type="button" class="btn btn-success">Edit Review</button>
				<?php endwhile; ?>
			<?php else: ?>
				<p>No Review Data Found</p>
			<?php endif; ?>
	</div>
</body>

</html>

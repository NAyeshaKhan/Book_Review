<?php
	include 'database.php';
	session_start();
	include 'user_auth.php';
	$id=$_SESSION['id'];
	$cookie_name="book_id";
		  
	if ($_COOKIE[$cookie_name]!='XXXX'){
		#Fetches users who've made reviews on same book as user's most recent review
		$user_rows= mysqli_query($conn,"SELECT * FROM user WHERE user_id IN( SELECT user.user_id FROM user INNER JOIN review ON user.user_id=review.user_id WHERE user.user_id <> '$id' AND book_id='$_COOKIE[$cookie_name]') ORDER BY RAND() LIMIT 4");
	}else{
		#Fetches users who've made reviews
		$user_rows= mysqli_query($conn,"SELECT * FROM user WHERE user_id IN( SELECT user.user_id FROM user INNER JOIN review ON user.user_id=review.user_id WHERE user.user_id <> '$id') ORDER BY RAND() LIMIT 4");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Suggested Users</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>
<?php include('header.php'); ?>
<body style="background-color:#F4F1EA;">
	<div class="card">
	<h3>See What Your Fellow Reviewers Are Reading!</h3>
	<div class="card" >
		<?php if ($user_rows->num_rows > 0): ?>
			<h4 style="text-align:center;">Reviewers with similar interests to yours:</h4>
			<?php while($array=mysqli_fetch_row($user_rows)): ?>
				<div class="cardA" style="float:left;margin:1rem;padding:0.5rem;">
					<div class="card-header">
						<div style="float:left;">
							<img src="img/default-user.jpg" style="vertical-align: middle; width: 50px; height: 50px; border-radius: 50%; "></img>
							<?php echo $array[1];?> <?php echo $array[2];?>
							<?php $sql=mysqli_query($conn,"SELECT * FROM following WHERE user_id_1='$id' AND user_id_2='$array[0]'");
								if($sql->num_rows == 0): ?>
								<a href= "follow_user.php?id=<?php echo $array[0]; ?> "><button class="btn btn-success">Follow</button></a>
								<?php else: ?>
								<a href= "unfollow_user.php?id=<?php echo $array[0]; ?> "><button class="btn btn-success">Unfollow</button></a>
							<?php endif; ?>
						</div>
					</div>
					<div class="card-header">
						<?php 
							$review= mysqli_query($conn,"SELECT * FROM review WHERE user_id ='$array[0]' LIMIT 1");
							$review_arr=mysqli_fetch_row($review);
							if (!empty($review_arr)):?>
								<div class="card-body">
									<img src="img/book.png" style="vertical-align: middle; width: 150px; height: 150px; border-radius: 5px;float:left; "></img>
									<h5 class="card-title">
										<a href="view_review.php?id=<?php echo $review_arr[2];?>"><b><?php echo $review_arr[3];?></b></a></h5>
									<div><p class="card-text"><?php echo $review_arr[4];?></p></div>
								</div>
						<?php endif; ?>
					</div>	
				</div>
			<?php endwhile; ?>
		<?php else: ?>
			<p>No User Data Found</p>
		<?php endif; ?>
	</div>
</div>
</body>

</html>

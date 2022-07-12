<?php
	include 'database.php';
	session_start();
	include 'user_auth.php';
	$id=$_SESSION['id'];
	$user_rows= mysqli_query($conn,"SELECT user.user_id, user.fname, user.lname, user.email, user.profile_pic, review.ISBN, review.title, review.description FROM user INNER JOIN review ON user.user_id=review.user_id WHERE user.user_id <> '$id' ORDER BY RAND() LIMIT 1");
	//SHOW MOST RECENT REVIEW FOR EACH USER
	function followUser($user){
		$sql=mysqli_query($conn,"SELECT * FROM following WHERE user_id_1='$id'");
		if($follow[1]!=$user){
		
		}else{
		
		}
	}
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
	<div class="container" style="text-align:center;">
	<h3>See What Your Fellow Reviewers Are Reading!</h3>
	<div class="card">
		<?php if (!empty($user_rows) && $user_rows->num_rows > 0): ?>
			<?php while($array=mysqli_fetch_row($user_rows)): ?>
				<div class="cardA">
					<div class="card-header"><?php echo $array[1];?> <?php echo $array[2];?>
						<button type="button" onclick="followUser(<?php echo $array[0] ?>)" class="btn btn-success">
							<?php 
								$sql=mysqli_query($conn,"SELECT * FROM following WHERE user_id_1='$id'");
								$follow=mysqli_fetch_row($sql);
								
								if($follow[1]!=$user):?>
								Follow
							<?php else:?>
								Unfollow
							<?php endif;?>			
						</button>
					</div>
					<div class="card-body">
						<h5 class="card-title"><b><?php echo $array[6];?></b></h5>
						<div><p class="card-text"><?php echo $array[7];?></p></div>
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

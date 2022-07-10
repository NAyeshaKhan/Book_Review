<?php
	include 'database.php';
	session_start();
	include 'user_auth.php';
	$user_rows= mysqli_query($conn,"SELECT user.user_id, user.fname, user.lname, user.email, user.profile_pic, review.ISBN, review.title, review.description FROM user INNER JOIN review ON user.user_id=review.user_id WHERE user.user_id <> 'id'");
	//ORDER BY RAND() LIMIT 1
	
	function followUser(){
		
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
	<div class="card" style="text-align:center;">
		<br><br><br>
		<h3>See What Your Fellow Reviewers Are Reading!</h3>
		<?php if (!empty($user_rows) && $user_rows->num_rows > 0): ?>
			<?php while($array=mysqli_fetch_row($user_rows)): ?>
				<span><?php echo $array[1];?> <?php echo $array[2];?></span>
				<small><?php echo $array[3];?></small>
				<p><b><?php echo $array[6];?></b></p>
				<p><?php echo $array[7];?></p>
				<td><button type="button" onclick="followUser()" class="btn btn-success">Follow User</button>
			<?php endwhile; ?>
		<?php else: ?>
			<p>No User Data Found</p>
		<?php endif; ?>
	</div>
</body>

</html>

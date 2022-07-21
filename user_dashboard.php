<?php
	include 'database.php';
	session_start();
	include 'user_auth.php';
	$user_result= mysqli_query($conn,"SELECT * FROM user where user_id='id'");
	$user_rows= mysqli_query($conn,"SELECT user.user_id, user.fname, user.lname, user.email, user.profile_pic, review.ISBN, review.title, review.description FROM user INNER JOIN review ON user.user_id=review.user_id WHERE user.user_id <> 'id'   ORDER BY RAND() LIMIT 3");
	$user_reviews= mysqli_query($conn,"SELECT ISBN, title, description FROM review WHERE user.user_id ='id'");
	
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
	<div class="container" style="text-align:center;">
			<br>
			<h4>Hi </b><?php echo " ",$_SESSION["fname"] ?> <?php echo $_SESSION["lname"] ?>!</h4>
			
			<div class="p-5 mb-4 bg-light rounded-3">
				<h4><i>Browse Through Different Genres</i></h4>
				<div class="card">
					<div class="cardA" style="min-width:50rem;">
						<div class="card-header">Comedy</div>
						<div class="card-body">
							<h5 class="card-title"></h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						</div>
					</div>
				</div>
			</div>
		<div class="card" >
			<h4>View Reviews from People You Follow!</h4>
			<?php if (!empty($user_rows) && $user_rows->num_rows > 0): ?>
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
					<div  style="text-align:left;padding:4.5rem;">
						<?php 
							$review= mysqli_query($conn,"SELECT * FROM review WHERE user_id ='$array[0]' LIMIT 1");
							$review_arr=mysqli_fetch_row($review);
							if (!empty($review_arr)):?>
								<div class="card-body">
									<h5 class="card-title"><b><?php echo $review_arr[3];?></b></h5>
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

<?php
	include 'database.php';
	session_start();
	include 'user_auth.php';
	$user_result= mysqli_query($conn,"SELECT * FROM user where user_id='id'");
	$user_rows= mysqli_query($conn,"SELECT user.user_id, user.fname, user.lname, user.email, user.profile_pic, review.ISBN, review.title, review.description FROM user INNER JOIN review ON user.user_id=review.user_id WHERE user.user_id <> 'id'");
	$user_reviews= mysqli_query($conn,"SELECT ISBN, title, description FROM review WHERE user.user_id ='id'");
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
	<br><br><br>
		<div class="container" style="text-align:center;">
			<div class="p-5 mb-4 bg-light rounded-3">
				<h4>Hi </b><?php echo " ",$_SESSION["fname"] ?> <?php echo $_SESSION["lname"] ?>!</h4>
		
				<h4><i>Browse Through Different Genres</i></h4>
			</div>
		</div>
</body>

</html>

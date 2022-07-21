<?php
	include 'database.php';
	session_start();
	include 'admin_auth.php';
	//if($_SESSION['user_type']=='admin'){
	//		include 'admin_auth.php';
	//	}else if($_SESSION['user_type']=='user'){
		//	include 'user_auth.php';
		//}
	$lib_id=$id;
	$sql = "SELECT library.library_id, library.title, library_shelf.ISBN FROM library INNER JOIN library_shelf ON library_shelf.library_id=library.library_id WHERE library.library_id='$lib_id'";
	$user_libraries= mysqli_query($conn,$sql);
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
			<div class="container">
			<h3><?php echo $row['title'] ?>'s Reviews</h3>
			<?php if ($user_libraries->num_rows > 0): ?>
				<?php while($array=mysqli_fetch_row($user_libraries)): ?>
					<div class="cardA">
						<div class="card-header">ISBN: <?php echo $array[2];?></div>
						<div class="card-body">
							<div style="float:right;">
								<img src="img/default-user.jpg" style="vertical-align: middle; width: 50px; height: 50px; border-radius: 50%; "></img>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php else: ?>
				<p colspan="3" rowspan="1" headers="">No User Data Found</p>
			<?php endif; ?>
			</div>
			<div  style="text-align:center;">
				<a href="admin-user_info.php"><button type="button" class="btn btn-success">Return To Dashboard</button></a>
			</div>
		</div>
	</body>
</html>
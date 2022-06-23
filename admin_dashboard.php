<?php
	include 'database.php';
	session_start();
	if(!$_SESSION['isLogged']) {
	  header("location:login.php"); 
	  die();
	}
	if($_SESSION['user_type']!="admin") {
	  header("location:login.php"); 
	  die();
	}
	$id= $_SESSION["id"];
	$sql_admin=mysqli_query($conn,"SELECT * FROM user where user_id='$id' ");
	$row= mysqli_fetch_array($sql_admin);

	$user_results= mysqli_query($conn,"SELECT * FROM user where user_type='user'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome To BookRev</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<?php include('header.php'); ?>
<body>
	<div style="text-align:center;">
		<div><img src="img/book_about.jpg" alt="Books on a shelf" style="height:70%; width: 80%;"></img></div>
		<div class="container">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#users">Users</a></li>
				<li><a data-toggle="tab" href="#reviews">Reviews</a></li>
			</ul>
			<div class="tab-content">
				<div id="users" class="tab-pane fade in active">
					<h3>Users</h3>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">First</th>
								<th scope="col">Last</th>
								<th scope="col">Email</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($user_results->num_rows > 0): ?>
							<?php while($array=mysqli_fetch_row($user_results)): ?>
							<tr>
								<td><?php echo $array[1];?></td>
								<td><?php echo $array[2];?></td>
								<td><?php echo $array[3];?></td>
							</tr>
							<?php endwhile; ?>
							<?php else: ?>
							<tr>
								<td colspan="3" rowspan="1" headers="">No Data Found</td>
							</tr>
							<?php endif; ?>
						 </tbody>
					</table>
				</div>
				<div id="reviews" class="tab-pane fade">
					<h3>Reviews</h3>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

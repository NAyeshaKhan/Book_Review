<?php
	include 'database.php';
	session_start();
	include 'admin_auth.php';
	$user_results= mysqli_query($conn,"SELECT * FROM user where user_type='user'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>BookRev Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<?php include('header.php'); ?>
<body style="background-color:#F4F1EA;">
	<div class="card" style="text-align:center;">
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="container">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#users">Users</a></li>
				<li><a data-toggle="tab" href="#reviews">Reviews</a></li>
			</ul>
			<div class="tab-content">
				<div id="users" class="tab-pane fade in active">
					<h3>Users</h3>
					<table class="table table-condensed">
						<thead>
							<tr>
								<th scope="col">User ID</th>
								<th scope="col"  style="text-align:center;">First Name</th>
								<th scope="col"  style="text-align:center;">Last Name</th>
								<th scope="col"  style="text-align:center;">Email</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($user_results->num_rows > 0): ?>
								<?php while($array=mysqli_fetch_row($user_results)): ?>
								<tr>
									<th scope="row"><?php echo $array[0];?></th>
									<td><?php echo $array[1];?></td>
									<td><?php echo $array[2];?></td>
									<td><?php echo $array[3];?></td>
									<td><button type="button" class="btn btn-success">See Reviews</button> 
								</tr>
								<?php endwhile; ?>
							<?php else: ?>
								<tr>
									<td colspan="3" rowspan="1" headers="">No User Data Found</td>
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

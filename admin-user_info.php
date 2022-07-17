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
<body style="background-color:#F4F1EA; position:fixed; float:right; ">
	<div class="card" style="text-align:center;">
		<div class="container">
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
								<td><a href= "user_review.php?id=<?php echo $array[0]; ?> ">
								<button type="button" class="btn btn-success">See Reviews</button></a>
							</tr>
						<?php endwhile; ?>
					<?php else: ?>
							<tr>
								<td colspan="3" rowspan="1" headers="">No User Data Found</td>
							</tr>
					<?php endif; ?>
				</tbody>
			</table>
			<a href="admin_dashboard.php"><button type="button" class="btn btn-success">Return To Dashboard</button></a>
		</div>
	</div>
</body>

</html>

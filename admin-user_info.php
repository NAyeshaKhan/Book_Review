<?php
	include 'database.php';
	session_start();
	include 'admin_auth.php';
	include 'header.php';
	$user_results= mysqli_query($conn,"SELECT * FROM user where user_type='user'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>BookRev Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
@media only screen and (max-width: 600px) {
		.container{
			padding-top:20rem;
		}
		table{
			font-size:12px;
		}
		h3{
			padding:1rem;
		}
		
	}
</style>
<body style="background-color:#F4F1EA;">
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
								<th><?php echo $array[0];?></th>
								<td><?php echo $array[1];?></td>
								<td><?php echo $array[2];?></td>
								<td><?php echo $array[3];?></td>
								<td><a href= "admin-view_user_review.php?id=<?php echo $array[0]; ?> ">
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
			<a href="admin_dashboard.php"><button type="button" class="btn btn-primary">Return To Dashboard</button></a>
		</div>
	</div>
</body>

</html>

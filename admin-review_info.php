<?php
	include 'database.php';
	session_start();
	include 'admin_auth.php';
	$review_results= mysqli_query($conn,"SELECT user.user_id, user.fname, user.lname, user.email, review.ISBN, review.title, review.description, review.review_id FROM user INNER JOIN review ON user.user_id=review.user_id");
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
	<div class="card">
		<div class="container">
			<h3>Reviews</h3>
			<div  style="text-align:center;">
				<a href="add_review.php"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add Review</button></a>
			</div>
			<table class="table table-condensed">
				<thead>
					<tr>
						<th scope="col" style="text-align:center;">User ID</th>
						<th scope="col" style="text-align:center;">User</th>
						<th scope="col" style="text-align:center;">Email</th>
						<th scope="col" style="text-align:center;">ISBN</th>
						<th scope="col" style="text-align:center;">Review</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($review_results->num_rows > 0): ?>
						<?php while($array=mysqli_fetch_row($review_results)): ?>
							<tr style="width:100px;">
								<td scope="row"><b><?php echo $array[0];?></b></th>
								<td><?php echo $array[1];?> <?php echo $array[2];?></td>
								<td><?php echo $array[3];?></td>
								<td><?php echo $array[4];?></td>
								<td><i><?php echo $array[5];?><br></i> <?php echo $array[6];?></td>
								<td><a href= "edit_review.php?id=<?php echo $array[7]; ?> ">
									<button type="button" class="btn btn-success">Edit</button></a></td>
								<td><a href= "delete_review.php?id=<?php echo $array[7]; ?> ">
									<button type="button" class="btn btn-success">Remove</button></a></td>
							</tr>
						<?php endwhile; ?>
					<?php else: ?>
							<tr>
								<td colspan="3" rowspan="1" headers="">No User Data Found</td>
							</tr>
					<?php endif; ?>
				</tbody>
			</table>
			<div  style="text-align:center;">
				<a href="admin_dashboard.php"><button type="button" class="btn btn-success">Return To Dashboard</button></a>
			</div>
		</div>
		
	</div>
</body>

</html>

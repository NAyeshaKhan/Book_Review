<?php
	include 'database.php';
	session_start();
	include 'admin_auth.php';
	$user_reviews= mysqli_query($conn,"");
	$stmt = $mysqli->prepare("SELECT user.user_id, user.fname, user.lname, user.email, review.ISBN, review.title, review.description, review.review_id FROM user INNER JOIN review ON user.user_id='review.user_id' WHERE user.user_id=?");
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result = $stmt->get_result();
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
			<h3>User <?php echo $row['fname'] ?>'s Reviews</h3>
			<table class="table table-condensed">
				<thead>
					<tr>
						<th scope="col">ISBN</th>
						<th scope="col">Review</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($row->num_rows > 0): ?>
						<?php while($array=mysqli_fetch_row($row)): ?>
							<tr style="width:100px;">
								<td scope="row"><b><?php echo $array[0];?></b></th>
								<td><?php echo $array[1];?> <?php echo $array[2];?></td>
								<td><?php echo $array[3];?></td>
								<td><?php echo $array[4];?></td>
								<td><i><?php echo $array[5];?><br></i> <?php echo $array[6];?></td>
								<td><a href= "edit_review.php?id=<?php echo $array[7] ?> ">
									<button type="button" class="btn btn-success">Edit</button></a></td>
								<td><a href= "delete_review.php?id=<?php echo $array[7] ?> ">
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
		</div>
	</div>
</body>

</html>

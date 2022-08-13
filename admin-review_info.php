<?php
	include 'database.php';
	session_start();
	include 'admin_auth.php';
	include 'header.php';
	$review_results= mysqli_query($conn,"SELECT user.user_id, user.fname, user.lname, user.email, review.book_id, review.title, review.description, review.review_id FROM user INNER JOIN review ON user.user_id=review.user_id ORDER BY review_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>BookRev Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<style>
	button{
		margin:0.5rem;
	}
	table{
		margin-left:10rem;
	}
	h3{
		margin-top:5rem;
	}
	@media only screen and (max-width: 600px) {
		.container{
			padding-top:15rem;
			width:100%;
		}
		
		.card{
			margin:4rem;
			
		}
		
		h3{
			padding:1rem;
		}
		button{
			margin:0.5rem;
		}
		
		table{
			font-size:12px;
			margin-left:10rem;
			overflow:auto;
		}
		th,td{
			
			overflow:auto;
		}
	}
</style>
<body style="background-color:#F4F1EA;">
	<div class="card" style="text-align:center;">
		<div class="container">
			<h3>Reviews (<?php echo $review_results->num_rows; ?>)</h3>
			<div style="text-align:center;">
				<a href= "add_review.php?id=XXXX"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add Review</button></a>
			</div>
			<table class="table table-condensed">
				<thead>
					<tr>
						<th scope="col" style="text-align:center;">User ID</th>
						<th scope="col" style="text-align:center;">User</th>
						<th scope="col" style="text-align:center;">Book ID</th>
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
								<td><a href="view_review.php?id=<?php echo $array[4]; ?>"><?php echo $array[4];?></a></td>
								<td><i><?php echo $array[5];?><br></i> <?php echo $array[6];?></td>
								<td><a href= "edit_review.php?id=<?php echo $array[7]; ?> ">
									<button type="button" class="btn btn-success">Edit</button></a></td>
								<td><a href= "delete_review.php?id=<?php echo $array[7]; ?> ">
									<button type="button" class="btn btn-success">Remove</button></a></td>
							</tr>
						<?php endwhile; ?>
					<?php else: ?>
							<tr style="text-align:center;">
								<td colspan="3" rowspan="1" headers="">No Review Data Found</td>
							</tr>
					<?php endif; ?>
				</tbody>
			</table>
			<div style="text-align:center;">
				<a href="admin_dashboard.php"><button type="button" class="btn btn-success">Return To Dashboard</button></a>
			</div>
		</div>
		
	</div>
</body>

</html>

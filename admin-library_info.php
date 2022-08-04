<?php
	include 'database.php';
	session_start();
	include 'admin_auth.php';
	include 'header.php';
	$library_results= mysqli_query($conn,"SELECT library.library_id, library.user_id, user.fname, user.lname, library.title FROM library INNER JOIN user ON user.user_id=library.user_id");
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
	@media only screen and (max-width: 600px) {
		.container{
			padding-top:20rem;
		}
		
		h3{
			padding:1rem;
		}
		button{
			margin:0.5rem;
		}
	}
</style>
<body style="background-color:#F4F1EA;">
	<div class="card" style="text-align:center;">
		<div class="container">
			<h3>Libraries</h3>
			<div  style="text-align:center;">
				<a href="add_library.php"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add Library</button></a>
			</div>
			<table class="table table-condensed">
				<thead>
					<tr>
						<th scope="col" style="text-align:center;">Library ID</th>
						<th scope="col" style="text-align:center;">User</th>
						<th scope="col" style="text-align:center;">Title</th>
						<th scope="col" style="text-align:center;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($library_results->num_rows > 0): ?>
						<?php while($array=mysqli_fetch_row($library_results)): ?>
							<tr style="width:100px;">
								<td scope="row"><b><?php echo $array[0];?></b></th>
								<td><?php echo $array[2];?> <?php echo $array[3];?></td>
								<td><?php echo $array[4];?></td>
								<td><a href= "admin-view_library.php?id=<?php echo $array[0]; ?> ">
									<button type="button" class="btn btn-success">View</button></a>
									<a href= "remove_library.php?lib_id=<?php echo $array[0]; ?> ">
									<button type="button" class="btn btn-success">Delete</button></a></td>	
							</tr>
						<?php endwhile; ?>
					<?php else: ?>
							<tr>
								<td colspan="3" rowspan="1" headers="">No Library Data Found</td>
							</tr>
					<?php endif; ?>
				</tbody>
			</table>
			<a href="admin_dashboard.php"><button type="button" class="btn btn-success">Return To Dashboard</button></a>
		</div>
	</div>
</body>

</html>

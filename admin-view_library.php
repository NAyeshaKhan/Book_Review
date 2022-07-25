<?php
	include 'database.php';
	session_start();
	include 'admin_auth.php';
	
	$lib_id=$_GET['id'];
	$sql = "SELECT library.library_id, library.title, library_shelf.book_id FROM library LEFT JOIN library_shelf ON library_shelf.library_id=library.library_id WHERE library.library_id='$lib_id'";
	$library= mysqli_query($conn,$sql);
	$result = $mysqli->query($sql);
	$row = mysqli_fetch_row($library)

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
			<h3><b><i>Library:</b> <?php echo $row[1] ?></i></h3>
			<table class="table table-condensed">
				<thead>
					<tr>
						<th scope="col" style="text-align:center;">Library ID</th>
						<th scope="col" style="text-align:center;">Title</th>
						<th scope="col" style="text-align:center;">Book ID</th>
						<th scope="col" style="text-align:center;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($library->num_rows > 0): ?>
						<?php while($array=mysqli_fetch_row($library)): ?>
							<tr style="width:100px;">
								<td scope="row"><b><?php echo $array[0];?></b></th>
								<td><i><?php echo $array[1];?></i></td>
								<td><?php echo $array[2];?></td>
								<td><a href= "remove_from_library.php?id=<?php echo $array[2]; ?> "><button type="button" class="btn btn-success">Delete</button></a></td>
							</tr>
						<?php endwhile; ?>
					<?php else: ?>
							<tr>
								<td colspan="3" rowspan="1" headers="">No Library Data Found</td>
							</tr>
					<?php endif; ?>
				</tbody>
			</table>
			<div  style="text-align:center;">
				<a href="admin-library_info.php"><button type="button" class="btn btn-success">Return To Library Panel</button></a>
			</div>
		</div>
		
	</div>
</body>

</html>
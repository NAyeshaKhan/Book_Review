<?php
    include 'database.php';
	session_start();
	include 'user_auth.php';
	
    include('header.php');
	extract($_GET);

	$my_id=$_SESSION['id'];
	$library_rows= mysqli_query($conn,"SELECT * FROM library WHERE user_id ='$my_id'");
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookRev View Your Libraries</title>
</head>
<style>
	.cardA{
		width:100%;
		margin:2rem;
	}
	@media only screen and (max-width: 600px) {
		.card{
		  padding-top:20rem;
		}
		h3{
			padding:1rem;
		}
	}
</style>
<body style="background-color:#F4F1EA;">
	<div class="card">
		<h3 style="text-align:center;"><?php echo $_SESSION['fname'] ?> <?php echo $_SESSION['lname'] ?>'s Libraries</h3>
		<div  style="text-align:center;">
			<a href="add_library.php"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add Library</button></a>
		</div>
		<?php if ($library_rows->num_rows > 0): ?>
			<?php while($array=mysqli_fetch_row($library_rows)): ?>
				<div class="cardA">
					<img src="img/book.png" style="vertical-align: middle; width: 150px; height: 150px; border-radius: 5px;float:left; "></img>
					<a href="user-view_library.php?id=<?php echo $array[0]; ?>"><div class="card-header"><b>Title:</b> <?php echo $array[2];?></div></a>
					<div class="card-body">
						<h5 class="card-title"><i>View Your Books</i></h5>
					</div>
					<div style="float:right;">
						<a href= "remove_library.php?lib_id=<?php echo $array[0]; ?> "><button class="btn btn-success"><span class="glyphicon glyphicon-trash"></span></button></a>
					</div>
				</div>
			<?php endwhile; ?>
		<?php else: ?>
			<h4 style="text-align:center;">No Library Data Found</h4>
		<?php endif; ?>
	</div>
</body>
	
</div>
</body>
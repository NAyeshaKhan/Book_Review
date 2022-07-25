<?php
	include 'database.php';
	session_start();
	include 'user_auth.php';
	
	$lib_id=$_GET['id'];
	$sql = "SELECT * FROM library JOIN library_shelf ON library_shelf.library_id=library.library_id WHERE library.library_id='$lib_id'";
	$library_books= mysqli_query($conn,$sql);
	
	$lib_info=mysqli_query($conn,"SELECT * FROM library WHERE library.library_id='$lib_id'");
	$x=mysqli_fetch_row($lib_info);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>BookRev Your Bookshelves</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>
<?php include('header.php'); ?>
<body style="background-color:#F4F1EA;">
	<div class="card">
		<h3 style="text-align:center;">Collection in "<?php echo $x[2] ?>"</h3>
		<?php if ($library_books->num_rows > 0): ?>
			<?php while($array=mysqli_fetch_row($library_books)): ?>
				<div class="cardA" style="margin-left:10rem;">
				<?php 
					$book_id=$array[4];
					$page = file_get_contents("https://www.googleapis.com/books/v1/volumes/$book_id");
					$data = json_decode($page, true);?>
					<img src="<?php echo $data['volumeInfo']['imageLinks']['thumbnail']; ?>" style="margin:5px;vertical-align: middle; width: 150px; height: 150px; border-radius: 5px;float:left; "></img>
					<a href="view_review.php?id=<?php echo $array[4]; ?>"><div class="card-header"><b>Title:</b> <?php echo $data['volumeInfo']['title'];?></div></a>
					<div class="card-body">
						<h5 class="card-title"><b><?php echo $data['volumeInfo']['title'];?></b></h5>
						<div><p class="card-text"><i>Author(s): <?php echo @implode(",", $data['volumeInfo']['authors']); ?></i></p></div>
						<div style="float:right;">
							<a href= "remove_from_library.php?lib_id=<?php echo $array[0]; ?>&id=<?php echo $array[4]; ?>"><button class="btn btn-success"><span class="glyphicon glyphicon-trash"></span></button></a>
							<a href= "add_to_library.php?id=<?php echo $array[4]; ?>"><button class="btn btn-success"><span class="glyphicon glyphicon-bookmark"></span></button></a>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		<?php else: ?>
			<h4 style="text-align:center;">No Library Collection Data Found</h4>
		<?php endif; ?>
		<div  style="text-align:center;">
			<a href="user-my_libraries.php"><button type="button" class="btn btn-success">Return To Library Panel</button></a>
		</div>
	</div>
</body>
</html>
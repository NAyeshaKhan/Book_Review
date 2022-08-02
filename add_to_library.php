<?php
	include 'database.php';
    session_start();
    include('header.php');
	
	$my_id=$_SESSION['id'];
	$library_rows= mysqli_query($conn,"SELECT * FROM library WHERE user_id ='$my_id'");
	extract($_GET);
	$book_id=$id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Library</title>
</head>
<style>
button{
	margin:1rem;
	padding:2rem;
}
</style>
<body style="text-align:center;background-image:linear-gradient(#b36a5e,#fff3b0); ">
	<form action="add_to_library_process.php" method="post" enctype="multipart/form-data">
	<div style="background-color:white;margin:13rem 20rem; height:35rem; border-radius:30px;">
		<h3 class="mb-4 pb-2 pb-md-0 mb-md-5" style="padding:1rem;">Add to Your Libraries:</h3>
		<p class="hint-text"  style="color:grey;">Select a Library to add your book to!</p>
		<div class="form-group" >
			<div class="form-outline">
				<input type="hidden" name="book_id" value="<?php echo $book_id ?>" placeholder= "<?php echo $book_id?>">
			</div>
		</div><br>
		<div class="form-group" >
			<div class="form-outline" ><label class="form-label" for="library">Libraries</label></div>
				<div>
				<?php if ($library_rows->num_rows > 0): ?>
					<?php while($array=mysqli_fetch_row($library_rows)): ?>
						<input type="checkbox" name="library_id" value="<?php echo $array[0] ?>">
						<label for="library_id"><?php echo $array[2] ?></label><br>
					<?php endwhile; ?>
				</div>	
				<div style="margin:2rem;">
					<a href="add_library.php"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add Library</button></a>
					<?php else: ?>
						<div  style="text-align:center;display:inline">
							<p>You have no Existing Libraries. Create A Library?</p>
							<a href="add_library.php"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add Library</button></a>
						</div>
					<?php endif; ?>
						<div class="form-group" style="display:inline;">
							<button type="submit" name="save" class="btn btn-success btn-lg">Save Book</button>
						</div>
				</div>
		</div>
    </div>
    </form>
</body>

<?php
extract($_GET);
session_start();
include("database.php");
	$my_id=$_SESSION['id'];
	$library_rows= mysqli_query($conn,"SELECT * FROM library WHERE user_id ='$my_id'");
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Library</title>
</head>

<body style="text-align:center; background-color:#F4F1EA;">
<div>
	<form action="" method="post" enctype="multipart/form-data">
	<div style="background-image:linear-gradient(#b36a5e,#fff3b0); margin:0rem 20rem; height:50rem; border-radius:30px;padding:5px">
		<h3 class="mb-4 pb-2 pb-md-0 mb-md-5" style="padding:1rem;">Add to Your Libraries:</h3>
		<p class="hint-text">Select a Library to add your book to!</p>
		<br>
        <div class="form-group">
			<div class="form-outline"><label class="form-label" for="library">Libraries</label></div>
				<?php if ($library_rows->num_rows > 0): ?>
					<?php while($array=mysqli_fetch_row($library_rows)): ?>
						<input type="checkbox" name="library_id" value="<?php echo $array[0] ?>">
						<label> <?php echo $array[2] ?></label><br>
					<?php endwhile; ?>
					<?php else: ?>
						<div  style="text-align:center;">
							<p>No User Data Found. Create A Library:</p>
							<a href="add_library.php"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add Library</button></a>
						</div>
					<?php endif; ?>
		</div>
		
		<div style="margin:6rem;">
			<div class="form-group">
				<button type="submit" name="save" class="btn btn-success btn-lg">Save Book</button>
			</div>
        </div>
    </form>
	</div>
</div>
</body>
<?php  
	$book_id=$_GET['id'];
	$lib_id=$_POST['library_id'];
	$lib=mysqli_query($conn,"INSERT INTO `library_shelf` (`library_id`, `book_id`) VALUES ('$lib_id', '$book_id')");
	if($_SESSION['user_type']=='admin'){
			header("Location: admin-library_info.php");
		}else if($_SESSION['user_type']=='user'){
			header("Location: user-my_libraries.php");
		}
?>
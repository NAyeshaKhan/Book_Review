<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Review</title>
    <link rel="stylesheet" href="css/auth_style.css">
</head>

<?php 
    include 'database.php';
    session_start();
    include('header.php');
	
	extract($_GET);
	$review=$id;
	$sql = "SELECT * FROM `review` WHERE review_id='$review'";
	$review_info= mysqli_query($conn,$sql);
	$array=mysqli_fetch_row($review_info);

?>
	<body style="text-align:center; background-color:#F4F1EA;">
		<div class="signup-form text-center">
			<form name="add_review" action="" method="post" enctype="multipart/form-data">
				<h1>Update Review</h1>
				<div class="form-group">
				   <label class="form-label" for="title">Title</label>
					<input type="text" name="title" placeholder="<?php echo $array[3] ?>" required >
				</div>
				<div class="form-group">
					<textarea name="description" max-length=255 placeholder="<?php echo $array[4] ?>" rows="4" cols="50"></textarea>
				</div>
				<div class="form-group">
					<button type="submit" name="save" class="btn btn-success btn-lg">Update Review</button>
				</div>
			</form>
			
		</div>
	</body>
</html>

<?php
	if(isset($_POST['save'])){
		extract($_POST);
		$desc=$description.trim();
		$sql="UPDATE `review` SET `title`= '$title', `description`= '$description' WHERE review_id='$review'";
		$stmnt= mysqli_query($conn,$sql);
		if($_SESSION['user_type']=='admin'){
			header("Location: admin-review_info.php");
		}else if($_SESSION['user_type']=='user'){
			header("Location: my_reviews.php");
		}
    }
?>
<?php 
    include 'database.php';
    session_start();
    include('header.php');
	if(isset($_POST['save'])){
		extract($_POST);
		$id=$_SESSION["id"];
		
		$title=trim($title);
		$title=htmlspecialchars($title);
		$title=mysqli_real_escape_string($conn,$title);
		
		$desc=trim($description);
		$desc=htmlspecialchars($description);
		$desc=mysqli_real_escape_string($conn,$desc);
		
		$stmnt= mysqli_query($conn,"INSERT INTO `review` (`user_id`, `ISBN`, `title`, `description`) VALUES ('$id', '$isbn', '$title', '$description')");
        if($_SESSION['user_type']=='admin'){
			header("Location: admin-review_info.php");
		}else if($_SESSION['user_type']=='user'){
			header("Location: user-my_reviews.php");
		}
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Review</title>
</head>
<style>
	input{
		border-radius: 5%;
		width:50%;
	}
</style>

<body style="text-align:center; background-color:#F4F1EA;">
	<div class="container" style="height:100%;width:80%;">
		<div class="signup-form text-center">
				<form name="add_review" action="" method="post" enctype="multipart/form-data" style="background-image: linear-gradient(#fed9b7, #fdfcdc);">
				<h3 class="mb-4 pb-2 pb-md-0 mb-md-5" style="padding:1rem;">Add A Review</h3>
				<hr style="border: 1px solid; color:#e5e5e5;margin-bottom: 25px;"></hr>
				<div class="form-group">
				   <div class="form-outline"><label class="form-label" for="isbn">ISBN</label></div>
					<div class="form-outline"><input type="text" name="isbn" placeholder="ISBN" required ></div>
					<small class="form-text text-muted">ISBN is required.</small>
				</div><br>
					
				<div class="form-group">
				   <div class="form-outline"><label class="form-label" for="title">Title</label></div>
					<div class="form-outline"><input type="text" name="title" placeholder="Title" required ></div>
					<small class="form-text text-muted">Title is required.</small>
				</div><br>
					
				<div class="form-group">
					<div class="form-outline"><textarea name="description" maxlength="255" placeholder="Write a Description..." rows="4" cols="50"></textarea></div>
				</div>
				
				<div class="form-group">
					<button type="submit" name="save" class="btn btn-success btn-lg">Add Review</button>
				</div>
			</form>
		</div>
	</div>
</body>

</html>

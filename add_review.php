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
	if(isset($_POST['save'])){
		extract($_POST);
		$id=$_SESSION["id"];
		$desc=trim($description);
		$desc=addslashes($desc);
		$stmnt= mysqli_query($conn,"INSERT INTO `review` (`user_id`, `ISBN`, `title`, `description`) VALUES ('$id', '$isbn', '$title', '$description')");
        if($_SESSION['user_type']=='admin'){
			header("Location: admin-review_info.php");
		}else if($_SESSION['user_type']=='user'){
			header("Location: my_reviews.php");
		}
        //Add code for error handling
    }
?>
<body style="text-align:center; background-color:#F4F1EA;">
<div class="signup-form text-center">
    <form name="add_review" action="" method="post" enctype="multipart/form-data">
		<h1>Add A Review</h1>
        <div class="form-group">
		   <label class="form-label" for="isbn">ISBN</label>
			<input type="text" name="isbn" placeholder="ISBN" required></div>
        </div>
        <div class="form-group">
		   <label class="form-label" for="title">Title</label>
        	<input type="text" name="title" placeholder="Title" required >
        </div>
		<div class="form-group">
			<textarea name="description" max-length=255 placeholder="Write a Short Description..." rows="4" cols="50"></textarea>
        </div>
		<div class="form-group">
            <button type="submit" name="save" class="btn btn-success btn-lg">Submit Review</button>
        </div>
    </form>
	
</div>
</body>
</html>

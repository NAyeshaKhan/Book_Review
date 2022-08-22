<?php 
    include 'database.php';
    session_start();
    include('header.php');
	extract($_GET);
	$book_id=$id;;
	
	if(isset($_POST['save'])){
		extract($_POST);
		$user_id=$_SESSION["id"];
		
		$title=trim($title);
		$title=htmlspecialchars($title);
		$title=mysqli_real_escape_string($conn,$title);
		
		$desc=trim($description);
		$desc=htmlspecialchars($description);
		$desc=mysqli_real_escape_string($conn,$desc);
		
		$sql=mysqli_query($conn,"SELECT * FROM `review` WHERE user_id='$user_id' AND book_id='$book_id'");
		
		if(!empty($sql)){
			echo '<script>alert("Review for this book already exists!")</script>'; 
			exit;
		}else{
			$sql="INSERT INTO `review` (`user_id`, `book_id`, `title`, `description`) VALUES ('$user_id', '$book_id', '$title', '$description')";
			$stmnt= mysqli_query($conn,$sql)or die("<h2 align='center'>Review Could not be Added.</h2>");
			
			$cookie_name = "book_id";
			$cookie_value = $book_id;
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
			
			if($_SESSION['user_type']=='admin'){
				header("Location: admin-review_info.php");
			}else if($_SESSION['user_type']=='user'){
				header("Location: user-my_reviews.php");
			}
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
	label{
	  width: 30%;
	}
	
	
	.Xform{
		background-color:#F4F1EA; 
		margin:10rem 30rem; 
		height:50%; 
		border-radius:30px;
		PADDING:5px;
		width:50%;
	}
	
	.form-input{
		width:80%;
		padding:1rem;
		margin:1rem;
		border-radius:10px;
	}
		
	
	@media only screen and (max-width: 600px) {
		.card{
			padding-top:15rem;
		}
		.Xform{
			width:100%;
		}
		.Xform.input,.Xform.textarea{
			width:100%;
			padding: 2rem;
		}
		body{
			width: 100%;
			padding:0rem;
			margin:0rem;
		}	
	}	
</style>
<body style="text-align:center;background-image:linear-gradient(#b36a5e,#fff3b0);">
		<div class="container">
			<div class="card">
			<form name="add_review" action="" method="post" enctype="multipart/form-data">
				<div class="Xform">
					<h3>Create A Review</h3>
					<div class="form-group">
					   <div class="form-outline"><label class="form-label" for="title">Title</label></div>
						<input class="form-input" type="text" name="title" placeholder="Title Your Review" required >
						<textarea class="form-input" name="description" maxlength="255" style="border-radius:10px;" placeholder="Review this Book" rows="4" cols="50"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" name="save" class="btn btn-success btn-lg">Add Review</button>
					</div>
				</div>
			</form>
			</div>
		</div>
	</body>

</html>

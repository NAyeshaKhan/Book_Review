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
		$desc=mysqli_real_escape_string($conn,$desc);
		
		$sql=mysqli_query($conn,"SELECT FROM `review` WHERE user_id='$user_id' AND book_id='$book_id'");
		//$sql->num_rows > 0
		if($sql->num_rows > 0){
			echo '<script>alert("Review for this book already exists!")</script>'; 
			exit;
		}else{
			$sql="INSERT INTO `review` (`user_id`, `book_id`, `title`, `description`) VALUES ('$user_id', '$book_id', '$title', '$description')";
			$stmnt= mysqli_query($conn,$sql)or die("<h2 align='center'>Review Already Exists.</h2>");
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

<body style="text-align:center;background-image:linear-gradient(#b36a5e,#fff3b0);">
		<div class="container">
			<div class="signup-form text-center">
			<form name="add_review" action="" method="post" enctype="multipart/form-data">
				<div style="background-color:#F4F1EA; margin:10rem 30rem; height:32rem; border-radius:30px;PADDING:5px;">
					<h3>Create A Review</h3>
					<div class="form-group">
					   <div class="form-outline"><label class="form-label" for="title">Title</label></div>
						<input type="text" name="title" placeholder="Title Your Review" style="border-radius:10px; width: 70%; padding: 10px;" required >
					</div>
					<div class="form-group">
						<textarea name="description" maxlength="255" style="border-radius:10px;" placeholder="Review this Book" rows="4" cols="50"></textarea>
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

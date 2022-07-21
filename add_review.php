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
		
		$sql="INSERT INTO `review` (`user_id`, `ISBN`, `title`, `description`) VALUES ('$id', '$isbn', '$title', '$description')";
		$stmnt= mysqli_query($conn,$sql)or die("Could Not Perform the Query");
		
		$cookie_name = "isbn";
		$cookie_value = $_POST['isbn'];
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
		
		echo "<script>Cookie for '" . $cookie_name . "' is set!</script>";
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

<body style="text-align:center; background-color:#F4F1EA;">
<div>
	<form action="" method="post" enctype="multipart/form-data">
	<div style="background-image:linear-gradient(#b36a5e,#fff3b0); margin:0rem 20rem; height:50rem; border-radius:30px;padding:5px">
		<h3 class="mb-4 pb-2 pb-md-0 mb-md-5" style="padding:1rem;">Add A Review</h3>
		<p class="hint-text">Give Us Your Thoughts On This Book!</p>
		<br>
        <div class="form-group-align">
			<div class="form-outline"><label class="form-label" for="isbn">ISBN</label></div>
			<div class="form-outline"><input type="text" name="isbn" placeholder="ISBN" style="width:70%;" required ></div>
			<small class="form-text text-muted" style="color:white;">ISBN is required.</small>
		</div>
		<br><br>
		<div class="form-group">
			<div class="form-outline"><label class="form-label" for="title">Title</label></div>
			<div class="form-outline"><input type="text" name="title" style="width:70%;" placeholder="Title" required ></div>
			<small class="form-text text-muted" style="color:white;">Title is required.</small>
		</div>
		<br><br>
		<div class="form-group">
			<div class="form-outline"><textarea name="description" maxlength="255" placeholder="Write a Description..." rows="4" cols="55"></textarea></div>
		</div>
		<div style="margin:6rem;">
			<div class="form-group">
				<button type="submit" name="save" class="btn btn-success btn-lg">Add Review</button>
			</div>
        </div>
    </form>
	</div>
</div>
</body>

</html>

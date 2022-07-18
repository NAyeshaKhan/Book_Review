<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Review</title>
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

	if(isset($_POST['save'])){
		extract($_POST);
		
		$title=mysqli_real_escape_string($conn,$title);
		$desc=trim($description);
		$desc=htmlspecialchars($description);
		$desc=mysqli_real_escape_string($conn,$desc);
		
		if($desc==NULL){
			$sql = $conn->prepare("UPDATE `review` SET `title`= ? WHERE review_id=?");
			$sql->bind_param("ss", $title , $review);
		}else if($title!=NULL && $desc!=NULL){
			$sql = $conn->prepare("UPDATE `review` SET `title`= ?, `description`= ? WHERE review_id=?");
			$sql->bind_param("sss", $title , $desc, $review);
		}
		
		$sql->execute();
		
		if($_SESSION['user_type']=='admin'){
			header("Location: admin-review_info.php");
		}else if($_SESSION['user_type']=='user'){
			header("Location: user-my_reviews.php");
		}
    }
?>
	<body style="text-align:center; background-color:#F4F1EA;">
		<div class="container" style="height:100%;width:80%;background-image: linear-gradient(#fed9b7, #fdfcdc);">
			<div class="signup-form text-center">
			<form name="add_review" action="" method="post" enctype="multipart/form-data">
				<h3>Update Review</h3>
				<div class="form-group">
				   <div class="form-outline"><label class="form-label" for="title">Title</label></div>
					<input type="text" name="title" placeholder="<?php echo $array[3] ?>" required >
				</div>
				<div class="form-group">
					<textarea name="description" maxlength="255" placeholder="<?php echo $array[4] ?>" rows="4" cols="50"></textarea>
				</div>
				<div class="form-group">
					<button type="submit" name="save" class="btn btn-success btn-lg">Update Review</button>
				</div>
			</form>
			</div>
		</div>
	</body>
</html>


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
		}else if($title==NULL){
			$sql = $conn->prepare("UPDATE `review` SET `description`= ? WHERE review_id=?");
			$sql->bind_param("ss", $desc , $review);
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Review</title>
</head>

<style>
	label{
	  width: 30%;
	}
	
	
	.Xform{
		background-color:#F4F1EA; 
		margin:10rem; 
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
			width:70%;
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
			<form action="" method="post" enctype="multipart/form-data">
				<div class="Xform">
					<h3>Update Review</h3>
					<div class="form-group">
					   <div class="form-outline"><label class="form-label" for="title">Title</label></div>
						<input class="form-input" type="text" name="title" placeholder="<?php echo $array[3] ?>" style="border-radius:10px;" required >
					</div>
					<div class="form-group">
						<textarea class="form-input" name="description" maxlength="255" style="border-radius:10px;" placeholder="<?php echo $array[4] ?>" rows="4" cols="50"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" name="save" class="btn btn-success btn-lg">Update Review</button>
					</div>
				</div>
			</form>
			</div>
		</div>
	</body>
</html>
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
		
		$add_lib = $conn->prepare("INSERT INTO `library` (`user_id`, `title`) VALUES (?, ?)");
		$add_lib->bind_param("is",$id, $title );
		$add_lib->execute()or die("Could not create Library");
			
		if($_SESSION['user_type']=='admin'){
			header("Location: admin-library_info.php");
		}else if($_SESSION['user_type']=='user'){
			header("Location: user-my_libraries.php");
		}
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Library</title>
</head>
<style>
	 .Xform{
		 background-color:#F4F1EA;
		 margin:13rem 20rem;
		 height:30rem; 
		 border-radius:30px;
		 width:60%;
	 }
	 @media only screen and (max-width: 600px) {
		.card{
			padding-top:15rem;
		}
		body{
			margin:0rem;
			padding:0rem;
			width:100%;
		}
	}
</style>
<body style="text-align:center;background-image:linear-gradient(#b36a5e,#fff3b0); ">
	<div class="card">
		<form action="" method="post" enctype="multipart/form-data">
			<div class="Xform">
				<h3 class="mb-4 pb-2 pb-md-0 mb-md-5" style="padding:1rem;">Add A Review</h3>
				<p class="hint-text"  style="color:grey;">Name Your Library</p>
				<br>
				<div class="form-group-align">
					<div class="form-outline"><label class="form-label" for="title">Title</label></div>
					<div class="form-outline"><input type="text" name="title" placeholder="Title" style="width:70%;" required ></div>
					<small class="form-text text-muted" style="color:grey;">Title is required.</small>
				</div>
				<div style="margin:6rem;">
					<div class="form-group">
						<button type="submit" name="save" class="btn btn-success btn-lg">Create Library</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>
</html>
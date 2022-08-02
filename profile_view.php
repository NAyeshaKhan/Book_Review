<?php
    include('database.php');
	session_start();
	include('header.php');
		
	$user_id=$_SESSION["id"];
	$user_info=mysqli_query($conn,"SELECT * FROM `user` WHERE user_id='$user_id'");
	$array=mysqli_fetch_row($user_info);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Your Profile</title>
</head>
<style>
	.card-header{
		margin:1rem;
	}
	.update{
		width:100%;
		border-radius:30px;
		padding:5px;
	}
	
	.save{
		width:15rem;
		margin:1rem;
	}
	.card{
		margin:5rem;
	}
	.form-outline{
		width:80%;
	}
</style>
<body style="background-color:#F4F1EA;">
	<div class="card" style="text-align:center;">
		<div class="card">
			<div class="cardA" style="margin-left:10rem;height:40rem;">
				<form action="" method="POST">
					<div class="form-group" align="center">
						<div class="form-outline">
							<label class="form-label" for="title">First name:</label>
							<input type="text" class="update" name="fname" placeholder="<?php echo $array[1]; ?>"></input> 
							<label class="form-label" for="title">Last name:</label>
							<input type="text" name="lname" class="update"  placeholder="<?php echo $array[2]; ?>"></input> 
							<div class="form-group"><button name="save_name" class="btn btn-primary save">Update Name</button></div>
						</div>
					</div>
					<div class="form-group" align="center">
						<div class="form-outline">
							<label class="form-label" for="title">Password:</label>
							<input class="update" type="password" name="pass"></input><br> 
							<label class="form-label" for="title">Confirm Password:</label>
							<input class="update"  type="password" name="cpass"></input> 
							<button name="save_pass" class="btn btn-primary save">Update Password</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
    
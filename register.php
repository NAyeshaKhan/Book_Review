<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
	<title>Signup to our Book Review Portal</title>
</head>
<style>
	input,select{
	  width: 70%;
	  padding: 10px;
	}
	label{
	  width: 30%;
	}
	.authform{
		background-color:white;
		width:80%;
		border-radius:30px;
		height:70%;
		margin:0rem 15rem;
	}
	
	@media only screen and (max-width: 600px) {
		body,.authform{
		  width: 80%;
		  margin:5rem;
		  height:70%
		}	
	
		body{
			width: 100%;
			margin:5rem;
		}
</style>
<?php 
	$_SESSION["isLogged"]=False;
	include('header.php'); 
?>
<body style="text-align:center;	background-image:linear-gradient(#81c3d7,#d9dcd6,#3a7ca5);">
	<div>
		<form name="register" action="register_user.php" method="post" enctype="multipart/form-data">
			<div class="authform">
				<h1>Signup</h1>
				<p class="hint-text">Create your account</p>
				<div class="form-group-align">
					<label class="form-label" for="first_name">First Name</label>
					<div class="col"><input type="text" name="first_name" placeholder="First Name" required></div>
					<label class="form-label" for="last_name">Last Name</label>
					<div class="col"><input type="text" name="last_name" placeholder="Last Name" required></div>
				</div>
				<div class="form-group-align">
				   <label class="form-label" for="email">Email</label>
					<input type="email" name="email" placeholder="Email" required>
				</div>
				<div class="form-group-align">
					<label for="pass">Password:</label>
					<input type="password" name="pass" placeholder="Password" required="required">
				</div>
				<br>
				<div class="form-group-align">
					<input type="password" name="cpass" placeholder="Confirm Password" required>
				</div>
				<br>
				<div class="form-group-align">
					<label class="form-label" for="user_type">Register As</label>
					<select name="user_type" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
						<option value='user'>User</option>
						<option value='admin'>Admin</option>
					</select>
				</div>
				
				<div style="margin-top:4rem;">
					<div class="form-group text-center">
						<button type="submit" name="save" class="btn btn-success btn-lg" style="border-radius:30px;padding: 15px 20px; width: 100%;">Register Now</button>
					</div>
					<div class="text-center">Already have an account? <a href="login.php">Sign in</a></div>
				</div>
			</div>
		</form>
	</div>
</body>
</html>
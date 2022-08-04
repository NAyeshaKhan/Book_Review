<?php
    session_start();
	$_SESSION["isLogged"]=False;
	include('header.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/auth_style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
	<title>Welcome to Book Review Portal</title>
	
</head>
<style>
	input{
	  width: 100%;
	  padding: 10px;
	  border-radius:25px;
	}
	
	label{
	  width: 30%;
	}
	.authform{
		border-radius:30px;
		height:50%;
		width:70%;
		margin:5rem 15rem;
		padding:0.5rem;
	}
	
	@media only screen and (max-width: 600px) {
		.authform{
		  width: 70%;
		  padding:0.5rem;
		  margin:5rem;
		}	
		body{
			width:100%;
		}

</style>
<body style="text-align:center; background-image:linear-gradient(#cbf3f0,#168aad,#d9ed92);">
<form action="" method="post" enctype="multipart/form-data">
	<div class="authform">
		<h1>Login</h1>
		<p class="hint-text">Enter Login Details</p>
		<br>
        <div class="form-group align">
			<label>Email:</label>
        	<input type="email" name="email" placeholder="Email" required="required">
        </div>
		<br>
		<div class="form-group-align">
			<label>Password:</label>
            <input type="password" name="pass" placeholder="Password" required="required">
        </div>
		<div style="margin-top:10rem;">
			<div class="form-group text-center">
				<button type="submit" name="save" class="btn btn-success btn-lg" style="border-radius:30px;padding: 15px 20px; width: 100%;">Login</button>
			</div>
			<div class="text-center">Don't have an account? <a href="register.php">Sign up</a></div>
		</div>
		
    </div>
    
</form>
	
</body>
</html>

<?php
	if(isset($_POST['save'])){
		extract($_POST);
		include 'database.php';
		$email = $mysqli->real_escape_string($_POST['email']);
		$stmt = $mysqli->prepare("SELECT * FROM `user` WHERE email = ?");
		$stmt->bind_param("s", $_POST['email']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		if(password_verify($_POST['pass'],$row['password'])){
			$_SESSION["id"] = $row['user_id'];
			$_SESSION["email"]=$row['email'];
			$_SESSION["fname"]=$row['fname'];
			$_SESSION["lname"]=$row['lname'];
			$_SESSION["user_type"]=$row['user_type'];
			$_SESSION["isLogged"]=True;
			if($row['user_type']=="admin"){
				header("Location: admin_dashboard.php");
			}elseif($row['user_type']=="user"){
				header("Location: user_dashboard.php");
			}
		}else{
			echo '<script>alert("Invalid Email ID/Password")</script>';
		}
	}
?>
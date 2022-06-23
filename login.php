<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Welcome to Book Review Portal</title>
<link rel="stylesheet" href="css/home_style.css">
<link rel="stylesheet" href="css/auth_style.css">
</head>
<?php 
	$_SESSION["isLogged"]=False;
	include('header.php'); 
?>

<body style="text-align:center; background-color:#F4F1EA;">
<br>
<br>
<div class="signup-form text-center" style="text-align:center;">
    <form action="loginProcess.php" method="post" enctype="multipart/form-data">
		<h1>Login</h1>
		<p class="hint-text">Enter Login Details</p>
        <div class="form-group">
			<label>Email:</label>
        	<input type="email" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
			<label>Password:</label>
            <input type="password" name="pass" placeholder="Password" required="required">
        </div>
		<div class="form-group text-center">
            <button type="submit" name="save" class="btn btn-success btn-lg">Login</button>
        </div>
        <div class="text-center">Don't have an account? <a href="register.php">Register Here</a></div>
    </form>
</div>
</body>
</html>


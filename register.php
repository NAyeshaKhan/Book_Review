<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Signup to our Book Review Portal</title>
<link rel="stylesheet" href="css/home_style.css">
<link rel="stylesheet" href="css/auth_style.css">
<script src="validator.js"></script>
</head>
<?php 
	$_SESSION["isLogged"]=False;
	include('header.php'); 
?>
<body style="text-align:center; background-color:#F4F1EA;">
<br>
<br>
<div class="signup-form text-center"">
    <form name="register" action="register_user.php" method="post" enctype="multipart/form-data">
		<h1>Signup</h1>
		<p class="hint-text">Create your account</p>
		
        <div class="form-group">
		    <label class="form-label" for="first_name">First Name</label>
			<div class="col"><input type="text" name="first_name" placeholder="First Name" required></div>
			<label class="form-label" for="last_name">Last Name</label>
			<div class="col"><input type="text" name="last_name" placeholder="Last Name" required></div>
        </div>
        <div class="form-group">
		   <label class="form-label" for="email">Email</label>
        	<input type="email" name="email" placeholder="Email" required>
        </div>
		<div class="form-group">
			<label class="form-label" for="pass">Password</label>
            <input type="password" name="pass" placeholder="Password" required>
        </div>
		<div class="form-group">
            <input type="password" name="cpass" placeholder="Confirm Password" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="user_type">Register As</label>
			<select name="user_type" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value='user'>User</option>
                    <option value='admin'>Admin</option>
                </select>
        </div>
		
		<div class="form-group">
            <button type="submit" name="save" onSubmit="return validateForm()"  class="btn btn-success btn-lg">Register Now</button>
        </div>
        <div class="text-center">Already have an account? <a href="login.php">Sign in</a></div>
    </form>
	
</div>
</body>
</html>

<script type="text/javascript">

	function validateForm(){ 
		var fname = document.forms["register"]["first_name"].value; 
		var lname = document.forms["register"]["last_name"].value; 
		var pass = document.forms["register"]["pass"].value; 
		 
		if (fname == "" || lname="") { 
			alert("Your full name must be filled out");
			document.register.first_name.focus();
			document.register.last_name.focus();
			return false;
		}
		
		if (pass == "") { 
			alert("Password must be filled out."); 
			return false; 
		}else if(pass.length<3){
			alert("Password must have at least 3 characters."); 
			return false; 
		}else if(pass!=$cpass){
			alert ("Password does not match");
			exit;
		}
	}
</script>
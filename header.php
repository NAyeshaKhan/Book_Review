<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<style>
	*{
	font-family: "Verdana", sans-serif;	
	}

	body {
	background-color:#F4F1EA;
	margin-left: 100px;
	width:80%;
	}

	.card{
	margin-left:80px;
	margin-right:50px;
	float:left;
}


	.header{
	color:white; 
	font-size: 10px; 
	text-align:center;
	padding:5 px;
	top:0;
	}
	
	.sidebar{
	background-color: #dcd2bc;
	height:100%;
	left:0; 
	float:left; 
	position:fixed; 
	width:15%; 
	padding:2px;
	text-align:left;
	}

	.sidebar a{
	color:black;
	background-color:#dcd2bc;
	}


	.sidebar a:hover{
		background-color:#f6f4ee;
	}
	
	.cardA{
		width:30rem; min-height:20rem; 
		margin:2rem; padding:2rem; 
		background-color:white;
		border-radius:25px;
		min-width:80%;
	}
	
	h3{
		text-align:center;
	}
	
	table{
		width:80px; 
		text-align:center;
		float:right;
	}

	@media only screen and (max-width: 600px) {
	.navbar{
	  width: 100%;
	}

	
</style>

<nav class="navbar navbar-inverse navbar-fixed-top" style="position:fixed;">
	<div style="float:left;">
		<a href="index.php">
			 <img alt="Website icon" src="img/bookrev_icon.png">
		</a>
	</div>
		<div class="container-fluid navbar-header navbar-right">
			<ul class="nav navbar-nav">
			<?php if (!$_SESSION["isLogged"]): ?>
				
				<div class="container-fluid navbar-header navbar-right">
					<ul class="nav navbar-nav">
						  <li><a href="about.php"><span class="glyphicon glyphicon-info-sign"></span> About Us</a></li>
						  <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign-Up</a></li>
						  <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					</ul>
				</div>
			<?php else: ?>
			  <div class="search-container" style="float:left;margin-top:15px;">
					<form action="/action_page.php">
						<input type="text" placeholder="Search.." name="search">
						<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
					</form>
			  </div>
			  <li class="dropdown" style="float:right;">
			    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<img src="img/default-user.jpg" style="vertical-align: middle; width: 25px; height: 25px; border-radius: 50%; "></img><span class="caret"></span>
				</a>
				<ul class="dropdown-menu active">
				  <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
				</ul>
			  </li>
			</ul>  
		</div>
		<?php endif; ?>
</nav>
<br><br><br>
<?php if ($_SESSION["isLogged"]): ?>
<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">
      <li class="nav-item nav-dropdown">
	  <?php if ($_SESSION["user_type"]=="admin"): ?>
				<li><a href="admin_dashboard.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
				<li><a href="admin-user_info.php"><span class="glyphicon glyphicon-user"></span> View All Users</a></li>
				<li><a href="admin-review_info.php"><span class="glyphicon glyphicon-list"></span> View All Reviews</a></li>
		<?php else: ?>
				<li><a href="user_dashboard.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
				<li><a href="other_reviews.php">Other Users</a></li>
				<li><a href="my_reviews.php">My Reviews</a></li>
				<li><a href="bookshelves.php">My Bookshelves</a></li>
		<?php endif; ?>
		<li><a href="profile_update.php"><span class="glyphicon glyphicon-edit"></span> Update Profile</a></li>
	  </li>
    </ul>
  </nav>
  <?php endif; ?>
      
</div>
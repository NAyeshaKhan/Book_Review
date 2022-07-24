<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="js/book_script.js"></script>
  
</head>
<style>
	*{
	font-family: "Verdana", sans-serif;	
	}

	body {
	background-color:white;
	margin-left: 100px;
	width:80%;
	}

	.card{
	margin-left:80px;
	}


	.header{
	color:white; 
	font-size: 10px; 
	text-align:center;
	padding:5 px;
	top:0;
	}
	
	.sidebar{
	background-color: #fdfcdc;
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
	background-color:#fdfcdc;
	}


	.sidebar a:hover{
		background-color:#f6f4ee;
	}
	
	.cardA{
		width:30rem; min-height:20rem; 
		margin:1rem; padding:2rem;		
		background-color:white;
		border-radius:25px;
		min-width:80%;
	}
	
	.review{
		background-image: linear-gradient(#fed9b7, #fdfcdc);
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
					</ul>
				</div>
			<?php else: ?>
			  <div class="search-container" style="float:left;padding:10px;">
					<form id="#searchform" action="search_results.php" method="POST">
						<input type="text" name="search"  placeholder="Search for Books" style="width:250px;">
						<button type="submit" name="save" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
					</form>
			</div>

			  <li style="float:right;"><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
			</ul>  
		</div>
		<?php endif; ?>
</nav>
<br><br>
<?php if ($_SESSION["isLogged"]): ?>
<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">
      <li class="nav-item nav-dropdown">
	  <br>
	  <?php if ($_SESSION["user_type"]=="admin"): ?>
				<li><a href="admin_dashboard.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
				<li><a href="admin-user_info.php"><span class="glyphicon glyphicon-user"></span> View All Users</a></li>
				<li><a href="admin-review_info.php"><span class="glyphicon glyphicon-list"></span> View All Reviews</a></li>
				<li><a href="admin-library_info.php"><span class="glyphicon glyphicon-list"></span> View All Libraries</a></li>
		<?php else: ?>
				<li><a href="user_dashboard.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
				<li><a href="user-other_reviews.php">Suggested Users</a></li>
				<li><a href="user-my_reviews.php">My Reviews</a></li>
				<li><a href="bookshelves.php">My Bookshelves</a></li>
		<?php endif; ?>
		<li><a href="profile_update.php"><span class="glyphicon glyphicon-edit"></span> Update Profile</a></li>
	  </li>
    </ul>
  </nav>
  <?php endif; ?>
      
</div>
<body>
</body>
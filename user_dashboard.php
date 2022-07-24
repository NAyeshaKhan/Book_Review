<?php
	include 'database.php';
	session_start();
	include 'user_auth.php';
	$user_result= mysqli_query($conn,"SELECT * FROM user where user_id='id'");
	$genre_list=['Comedy','Romance','Fiction','Horror'];
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>BookRev User Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<?php include('header.php'); ?>
<style>
div.scroll {
  overflow: auto;
  white-space: nowrap;
}

div.scroll cardA {
  display: inline-block;
  color: white;
  text-align: left;
  padding: 14px;
  box-shadow: 0 4px 8px 0;
  text-decoration: none;
}

</style>

<body style="background-color:#F4F1EA;">
	<div class="card" style="text-align:center;">
		<br><h4><b>Hi <?php echo " ",$_SESSION["fname"] ?> <?php echo $_SESSION["lname"] ?>!</b></h4>
			<h4><b><i>Browse Through Different Genres</i></b></h4>
			<div class="card">
				<?php foreach($genre_list as $genre): ?>
				<div class="card" style="background-color:white;margin:10px;" >
					<div class="scroll">
						<div style="text-align:center;"><b><?php echo $genre ?>	</b></div>
						<?php $page = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=subject:'$genre'");
							  $genre_data=json_decode($page, true); ?>
	
							<?php for ($i = 0; $i < 5; $i++): ?>
							<div  style="min-width:10rem;float:left;padding:5px;">
								<img src="img/book.png" style="vertical-align: middle; width: 100px; height: 100px; border-radius: 5px;float:left; "></img>
								<a href="view_review.php?id=<?php echo $genre_data['items'][$i]['id']; ?>">
									<div class="card-header"><b><?php echo $genre_data['items'][$i]['volumeInfo']['title']; ?></b></div>
								</a>
								<div class="card-body">
									<h5 class="card-title"><i><?php echo @implode(",", $genre_data['items'][$i]['volumeInfo']['authors']); ?></i></h5>
									<div><p class="card-text">Published: <?php echo $genre_data['items'][$i]['volumeInfo']['publishedDate']; ?></p></div>
									<?php if(!is_nan($genre_data['items'][$i]['volumeInfo']['pageCount'])): ?>
										<div><p class="card-text">Pages: <?php echo $genre_data['items'][$i]['volumeInfo']['pageCount']; ?></p></div>
									<?php endif;?>
								</div>
								<div style="float:right;width:100%">
									<?php $book_id=$genre_data['items'][$i]['id']; ?>
									<a href= "add_review.php?id=<?php echo $book_id; ?> "><button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button></a>
									<a href= "view_review.php?id=<?php echo $genre_data['items'][$i]['id']; ?> "><button class="btn btn-success"><span class="glyphicon glyphicon-list"></span></button></a>
									<a href= "add_to_library.php?id=<?php echo $genre_data['items'][$i]['id']; ?> "><button class="btn btn-success"><span class="glyphicon glyphicon-bookmark"></span></button></a>
								</div>
							</div>
							<?php endfor; ?>
					</div>
				</div>
				<?php endforeach; ?>
		</div>
	</div>
</body>

</html>

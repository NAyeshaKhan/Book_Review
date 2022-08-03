<?php
	include 'database.php';
	session_start();
	include 'user_auth.php';
	$user_result= mysqli_query($conn,"SELECT * FROM user where user_id='id'");
	$genre_list=['Comedy','Romance','Children','Non-Fiction','Horror','Suspense']; 
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
	
	@media only screen and (max-width: 600px) {
		.card{
			width: 100%;
		}
</style>

<body style="background-color:#F4F1EA;">
	<div class="card" style="text-align:center;">
		<br><h4><b>Hi <?php echo " ",$_SESSION["fname"] ?> <?php echo $_SESSION["lname"] ?>!</b></h4>
			<h4><b><i>Browse Through Different Genres</i></b></h4>
			<div class="card">
				<?php foreach($genre_list as $genre): ?>
				<div style="background-color:white;text-align:center;width:100%;"><b><?php echo $genre ?></b></div>
				<div class="card scroll" style="margin:10px;">
					
				<?php $page = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=subject:'$genre'");
					  $genre_data=json_decode($page, true); ?>
					  <?php for ($i = 0; $i < 5; $i++): ?>
						<div class="card" style="width:15rem;height:15rem;margin:15px;display: inline-block;">
							<div style="width:10rem;">
								<a href="view_review.php?id=<?php echo $genre_data['items'][$i]['id']; ?>">
								<?php if(isset($genre_data['items'][$i]['volumeInfo']['imageLinks']['smallThumbnail'])): ?>
									<img src="<?php echo $genre_data['items'][$i]['volumeInfo']['imageLinks']['smallThumbnail']; ?>" style="vertical-align: middle; width: 100px; height: 100px; border-radius: 5px;float:left; "></img>
								<?php else: ?>	
									<img src="img/book.png" style="vertical-align: middle; width: 100px; height: 100px; border-radius: 5px;float:left; "></img><a href="view_review.php?id=<?php echo $data['items'][$i]['id']; ?>">
								<?php endif; ?>	
				
									
								
								<div style="width:100%;float:left;">
								<figcaption style="width:15rem;overflow:auto;"><b><?php echo $genre_data['items'][$i]['volumeInfo']['title']; ?></b></figcaption></a>
								</a>
								<?php $book_id=$genre_data['items'][$i]['id']; ?>
									<a href= "add_review.php?id=<?php echo $book_id; ?> "><button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button></a>
									<a href= "view_review.php?id=<?php echo $genre_data['items'][$i]['id']; ?> "><button class="btn btn-success"><span class="glyphicon glyphicon-list"></span></button></a>
									<a href= "add_to_library.php?id=<?php echo $genre_data['items'][$i]['id']; ?> "><button class="btn btn-success"><span class="glyphicon glyphicon-bookmark"></span></button></a>
								</div>
							</div>	
						</div>	
					  <?php endfor; ?>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
</body>

</html>

<?php
	include 'database.php';
	session_start();
	include 'user_auth.php';
	$genre_list=['Comedy','Romance','Children','Non-Fiction','Horror','Suspense']; 
	
	$sql="SELECT following.user_id_2, user.fname, user.lname FROM following JOIN user ON user.user_id=following.user_id_2 WHERE user_id_1='$id'";
	$following=mysqli_query($conn,$sql);
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
		.container{
		  padding-top:20rem;
		}
		.card-header{
			margin:1rem;
		}
		image{
			margin:1rem;
		}
</style>

<body style="background-color:#F4F1EA;">
	<div class="container" style="text-align:center;">
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
		<div class="card" >
				<?php while($array=mysqli_fetch_row($following)): ?>
					<div class="cardA" style="float:left;margin:1rem;padding:0.5rem;">
						<div class="card-header">
							<div class="img" style="float:left;width:20%;">
								<img src="img/default-user.jpg" style="vertical-align: middle; width: 50px; height: 50px; border-radius: 50%; "></img>
								<?php echo $array[1];?> <?php echo $array[2];?>
								<?php $sql=mysqli_query($conn,"SELECT * FROM following WHERE user_id_1='$id' AND user_id_2='$array[0]'");
								if($sql->num_rows == 0): ?>
									<a href= "follow_user.php?id=<?php echo $array[0]; ?> "><button class="btn btn-primary" style="margin:2rem;">Follow</button></a>
								<?php else: ?>
									<a href= "unfollow_user.php?id=<?php echo $array[0]; ?> "><button class="btn btn-warning" style="margin:2rem;">Unfollow</button></a>
								<?php endif; ?>
							</div>
						</div>
						<div class="card-header">
							<?php 
							$review= mysqli_query($conn,"SELECT * FROM review WHERE user_id ='$array[0]' ORDER BY review_id DESC LIMIT 1 ");
							$review_arr=mysqli_fetch_row($review);
							
							$book_id=$review_arr[2];
							$page = file_get_contents("https://www.googleapis.com/books/v1/volumes/$book_id");
							$book_data=json_decode($page, true);
							
							if(!empty($review_arr)):?>
								<div class="card-body">
									<?php if(isset($book_data['volumeInfo']['imageLinks']['thumbnail'])): ?>
										<img src="<?php echo $book_data['volumeInfo']['imageLinks']['thumbnail']; ?>" style="margin:1rem; width: 100px; height:100px;vertical-align: middle;border-radius: 5px;float:left; "></img>
									<?php else: ?>
										<img src="img/book.png" style="margin:5px;vertical-align: middle; width: 150px; height: 150px; border-radius: 5px;float:left; "></img>
									<?php endif; ?>
									
									<h5 class="card-title">
									<a href="view_review.php?id=<?php echo $review_arr[2];?>"><b><?php echo $review_arr[3];?></b></a></h5>
									<div><p class="card-text"><?php echo $review_arr[4];?></p></div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endwhile; ?>
		</div>
	</div>
</body>

</html>

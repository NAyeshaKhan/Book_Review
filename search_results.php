<?php
	include 'database.php';
	session_start();
	include('header.php');
	
	$search_url='';
	if($_SESSION['user_type']=='admin'){
		include 'admin_auth.php';
	}else if($_SESSION['user_type']=='user'){
		include 'user_auth.php';
	}
	
	if(isset($_POST['save'])){
		extract($_POST);
		$search_url=trim($_POST['search']);
		$search = str_replace(' ', '+', $search_url);
		
		$page = file_get_contents("https://www.googleapis.com/books/v1/volumes?q='$search'");

		$data = json_decode($page, true);
	}
?>	
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search Results</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
	.button{
		margin:1rem;
	}
	
	h3{
		padding:1rem;
		text-align:center;
		}
	
	@media only screen and (max-width: 600px) {
		.card-body{
		  float:right;
		  width:40%
		}
		.cardA,.button{
			margin:1rem;
			float:right;
		}
		h3{
			padding:1rem;
		}
		.container{
			padding-top:20rem;
		}
		button{
			margin:1rem;
		}
</style>
<body style="background-color:#F4F1EA;">
	<div class="container">
		<h3>Results for "<?php echo $search_url; ?>"</h3>
		<?php for ($i = 0; $i < 10; $i++): ?>
			<div class="cardA" style="margin-left:10rem;">
				<?php if(isset($data['items'][$i]['volumeInfo']['imageLinks']['thumbnail'])): ?>
					<img src="<?php echo $data['items'][$i]['volumeInfo']['imageLinks']['thumbnail']; ?>" style="margin:5px;vertical-align: middle; width: 150px; height: 150px; border-radius: 5px;float:left; "></img><a href="view_review.php?id=<?php echo $data['items'][$i]['id']; ?>">
				<?php else: ?>	
					<img src="https://img.icons8.com/color/150/000000/book.png" style="margin:5px;vertical-align: middle;border-radius: 5px;float:left; "></img><a href="view_review.php?id=<?php echo $data['items'][$i]['id']; ?>">
				<?php endif; ?>	
					<div class="card-header"><b><?php echo $data['items'][$i]['volumeInfo']['title']; ?></b></div>
				</a>
				
				<div class="card-body">
					<h5 class="card-title"><i>Author(s): <?php echo @implode(",", $data['items'][$i]['volumeInfo']['authors']); ?></i></h5>
					<div><p class="card-text">Published: <?php echo $data['items'][$i]['volumeInfo']['publishedDate']; ?></p></div>
					<?php if(isset($data['items'][$i]['volumeInfo']['pageCount'])): ?>
						<div><p class="card-text">Pages: <?php echo $data['items'][$i]['volumeInfo']['pageCount']; ?></p></div>
					<?php endif;?>
				</div>
				<div class="button" style="float:right;">
					<?php $book_id=$data['items'][$i]['id']; ?>
					<a href= "add_review.php?id=<?php echo $book_id; ?> "><button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add Review</button></a>
					<a href= "view_review.php?id=<?php echo $data['items'][$i]['id']; ?> "><button class="btn btn-success"><span class="glyphicon glyphicon-list"></span> View Reviews</button></a>
					<a href= "add_to_library.php?id=<?php echo $data['items'][$i]['id']; ?> "><button class="btn btn-success"><span class="glyphicon glyphicon-bookmark"></span> Add to Library</button></a>
				</div>
			</div>
		<?php endfor; ?>
	</div>
</body>

<?php
extract($_GET);
session_start();
include("database.php");
    $sql=mysqli_query($conn,"DELETE FROM `library_shelf` where book_id='$id'")or die("Could Not Perform the Query");;
    if($_SESSION['user_type']=='admin'){
		header("Location: admin-library_info.php");
	}else if($_SESSION['user_type']=='user'){
		header("Location: user-my_reviews.php");
	}
?>
<script>
    alert("Review has been deleted");
</script>
<?php
extract($_GET);
include("database.php");
    $sql=mysqli_query($conn,"DELETE FROM `review` where review_id='$id'");
    header("Location: review_info.php");

?>
<script>
    alert("Review has been deleted");
</script>
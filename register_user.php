<?php
extract($_POST);
include("database.php");
$sql=mysqli_query($conn,"SELECT * FROM `user` where email='$email'");
if(mysqli_num_rows($sql)>0)
{
	echo "Email Id Already Exists"; 
	exit;
}
elseif(isset($_POST['save'])){
	$hash=password_hash($pass, PASSWORD_DEFAULT);
	$query="INSERT INTO `user`(`fname`, `lname`, `email`, `password`, `user_type`, `profile_pic`) VALUES ('$first_name', '$last_name', '$email', '$hash', '$user_type', 'https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg')";
	$sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
	header ("Location: login.php?status=success");
}else {
	echo "Error.Please try again";
	}

?>
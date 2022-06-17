<?php
extract($_POST);
include("database.php");
$sql=mysqli_query($conn,"SELECT * FROM register where email='$email'");
if(mysqli_num_rows($sql)>0)
{
	echo "Email Id Already Exists"; 
	exit;
}
elseif(isset($_POST['save'])){
	$query="INSERT INTO `user`(`fname`, `lname`, `email`, `password`, `user_type`) VALUES ('$first_name', '$last_name', '$email', 'md5($pass)', 'user')";
	$sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
	header ("Location: login.php?status=success");
}else {
	echo "Error.Please try again";
	}

?>
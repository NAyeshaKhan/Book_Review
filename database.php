<?php

	$host="localhost";
	$user="root";
	$password="";
	$db="book_review";
	
	$conn=mysqli_connect($host, $user, $password, $db);
	if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());
	}
?>
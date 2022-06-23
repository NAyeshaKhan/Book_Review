<?php
	$host="localhost";
	$user="root";
	$password="";
	$db="book_review";
	
	$conn=mysqli_connect($host, $user, $password, $db);
	$mysqli = new mysqli('localhost', 'root', '', 'book_review');
	if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
	}
?>
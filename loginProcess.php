<?php
	session_start();
	if(isset($_POST['save'])){
		extract($_POST);
		include 'database.php';
		$mysqli = new mysqli('localhost', 'root', '', 'book_review');
		$email = $mysqli->real_escape_string($_POST['email']);
		$stmt = $mysqli->prepare("SELECT * FROM `user` WHERE email = ?");
		$stmt->bind_param("s", $_POST['email']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		if(password_verify($_POST['pass'],$row['password'])){
			$_SESSION["id"] = $row['user_id'];
			$_SESSION["email"]=$row['email'];
			$_SESSION["fname"]=$row['fname'];
			$_SESSION["lname"]=$row['lname'];
			$_SESSION["user_type"]=$row['user_type'];
			$_SESSION["isLogged"]=True;
			if($row['user_type']=="admin"){
				header("Location: admin_home.php");
			}elseif($row['user_type']=="user"){
				header("Location: user_home.php");
			}
		}else{
			echo "Invalid Email ID/Password";
		}
	}
?>
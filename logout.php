<?php
    session_start();
    unset($_SESSION["id"]);
	$_SESSION["isLogged"]=False;
    unset($_SESSION["name"]);
	mysqli_close($conn);
    header("Location:index.php");
?>
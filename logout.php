<?php
    session_start();
    unset($_SESSION["id"]);
	$_SESSION["isLogged"]=False;
    unset($_SESSION["name"]);
    header("Location:index.php");
?>
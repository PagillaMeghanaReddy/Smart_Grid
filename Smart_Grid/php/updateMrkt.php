<?php
	include 'db-connect.php';

	$username = '';
	$market_rate = '';

	if(isset($_SESSION["username"]))
		$username = $_SESSION["username"];

	if(isset($_POST["market_rate"]))
		$market_rate = $_POST["market_rate"];

	
	$sql = "UPDATE admin 
	SET market_rate = '$market_rate'
	WHERE 
	username = '$username'";

	$result = pg_query($dbconn, $sql);
	if(!$result){
		echo pg_last_error($dbconn);
	}else{
		echo "Student registered successfully";
		header("Location: ../editAdmin.php");
	}

?>
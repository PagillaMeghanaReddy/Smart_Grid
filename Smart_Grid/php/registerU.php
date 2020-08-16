<?php
	include 'db-connect.php';

	$username = '';
	$password = '';

	if(isset($_POST["username"]))
		$username = $_POST["username"];


	if(isset($_POST["password"]))
		$password = $_POST["password"];

	
	$sql = "INSERT INTO Customer(username, password) VALUES('$username', '$password')";

	$result = pg_query($dbconn, $sql);
	if(!$result){
		echo pg_last_error($dbconn);
	}else{
		echo "Student registered successfully";
		header("Location: ../loginUser.php");
	}

?>
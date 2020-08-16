<!--<a href="../login.php">Login</a><br>-->
<?php
	session_start();
	include 'db-connect.php';
	

	$username = '';
	$password = '';

	if(isset($_POST["username"]))
		$username = $_POST["username"];
	if(isset($_POST["password"]))
		$password = $_POST["password"];


	$sql = "SELECT username, password, activeOrIn FROM Customer WHERE username='$username' AND password = '$password' AND activeOrIn='True'";

	$result = pg_query($dbconn, $sql);
	if(!$result){
		echo 'An error occurred in user login';
	}else{
		$cnt = pg_num_rows($result);
		if($cnt==1){
			$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);
			$_SESSION['username'] = $username;
			header("location:../editUser.php");
		}else{
			header("Location: ../loginUser.php");
			echo 'Incorrect username or password.';
		}

	}

?>
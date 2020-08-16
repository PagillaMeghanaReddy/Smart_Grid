<?php
		$host = "localhost";
		$port = "5432";
		$dbname = "gexxx";
		$user = "postgres";
		$password = "Akansharocks";
		$pg_options = "--client_encoding=UTF8";


		

		// function exception_error_handler($errno, $errstr, $errfile, $errline ) 
		// {
  //   		throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
		// }
		// set_error_handler("exception_error_handler");

		// try 
		// {
			// echo "Hello";
    		$connection_string = "host=$host port=$port dbname=$dbname user=$user password=$password";
			// echo "Hello";
			$dbconn = pg_connect($connection_string);
			// echo "\nHello";
		// } 
		// Catch (Exception $e) 
		// {
  //   		echo $e->getMessage();
		// }










		// $connection_string = "host=$host port=$port dbname=$dbname user=$user password=$password";
		// $dbconn = @pg_connect($connection_string);

		//$pdo = new PDO("pgsql:host=localhost;dbname=dummy", "postgres", "Akansharocks");

		if($dbconn){
			echo "Connected to ".pg_host($dbconn);
		}else{
			echo "Error in connecting to database. ";
		}

		echo "<br />";

?>
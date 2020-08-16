<?php
	include 'db-connect.php';

	$username = '';
	$shortage = '';

	if(isset($_SESSION["username"]))
		$username = $_SESSION["username"];

	if(isset($_POST["shortage"]))
		$shortage = $_POST["shortage"];

	// echo $shortage;
	$sql = "SELECT SUM(usage) AS total
      FROM custData
      WHERE datewa = CURRENT_DATE";
      $result = pg_query($dbconn, $sql);
      if(!$result){
        echo 'An error occurred in faculty login';
      }
      else{
      	//echo $result;
        $row = pg_fetch_array($result, 0, PGSQL_NUM);
        // echo $row[0];
      }

    $sql2 = "SELECT curr_rate 
    	FROM general_info";
    $result2 = pg_query($dbconn, $sql2);
    if(!$result2){
    	echo "And again error";
    }
    else{
    	// echo $result2;
    	$row2 = pg_fetch_array($result2, 0, PGSQL_NUM);
    	// echo $row2[0];
    }

    $sql3 = "SELECT calcProbability()";
    $result3 = pg_query($dbconn, $sql3);
    if(!$result3){
    	echo "third error";
    }
    else{
    	// echo $result3;
    	$row3 = pg_fetch_array($result3, 0, PGSQL_NUM);
    	// echo $row3[0];
    }

    $sql4 = "SELECT calcCPRVal()";
    $result4 = pg_query($dbconn, $sql4);
    if(!$result4){
    	echo "fourth error";
    }
    else{
    	// echo $result4;
    	$row4 = pg_fetch_array($result4, 0, PGSQL_NUM);
        echo gettype($result4)."\n"; 
        echo gettype($row4)."\n";
        echo gettype($row4[0])."\n";
        // $str_arr = preg_split ("/\,/", $row4[0])."\n";
        // echo gettype($str_arr)."\n";  
    	echo $row4[0];
    }

    $sql5 = "SELECT calcN()";
    $result5 = pg_query($dbconn, $sql5);
    if(!$result5){
    	echo "fifth error";
    }
    else{
    	// echo $result5;
    	$row5 = pg_fetch_array($result5, 0, PGSQL_NUM);
    	// echo $row5[0];
    }


    // exec("python sth.py $row4[0] $row3[0] $row5[0] $shortage $row2[0]", $output);

	// passthru("python sth.py $row4[0] $row3[0] $row5[0] $shortage $row2[0]", $output);

    // $output = eval('python sth.py $row4[0] $row3[0] $row5[0] $shortage $row2[0]');

    $output = shell_exec("python sth.py $row4[0] $row3[0] $row5[0] $shortage $row2[0]");

	echo "HEllo\n";
	// echo $ret_code;
	// echo "again\n";
	// echo $output[0];
	var_dump($output);
	// print_r($ret_code);
	echo "cccc\n";
	// $result = pg_query($dbconn, $sql);
	// if(!$result){
	// 	echo pg_last_error($dbconn);
	// }else{
	// 	echo "Student registered successfully";
	// 	header("Location: ../editAdmin.php");
	// }

?>
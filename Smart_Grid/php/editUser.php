<!--<a href="../login.php">Login</a><br>-->
<?php
	session_start();
	include 'db-connect.php';
	

	$cpr='';

	if(isset($_POST["cprVal"]))
	{	$cpr = $_POST["cprVal"];
	
		$sq2="SELECT cprVal FROM bidProfile WHERE username='".$_SESSION['username']."' ";
	    $result=pg_query($dbconn, $sq2);
	    $num_rows = pg_num_rows($result);
	                  if($num_rows==0)
                      	{
                      		$sq3="INSERT INTO bidProfile (username,cprVal) VALUES ('".$_SESSION['username']."',$cpr)";
                      	echo "Hello";
                      		$result1=pg_query($dbconn,$sq3);
                      		if(!$result1)
                      		{
                      			echo 'There  is a query error';
                      			header("location:../editUser.php");
                      		}
                    	}
                  	  else
                  		{
                  			echo "hi";
                  			$sq4="UPDATE bidProfile SET cprVal=$cpr WHERE username='".$_SESSION['username']."'" ;
                  			echo "go";
                  			$result1=pg_query($dbconn,$sq4);
                  			if(!$result1)
                      		{
                      			echo 'There  is a query error';
                      			header("location:../editUser.php");
                      		}
                  		}



     }
     else
     {
     	echo 'NOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO';
     }

?>
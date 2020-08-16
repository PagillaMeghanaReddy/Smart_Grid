<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Smart Grid</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/jumbotron/">

    <!-- Bootstrap core CSS -->
    <!--<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

     Custom styles for this template 
    <link href="jumbotron.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>

  <body>
    <?php
        include 'topnav.php';
        include 'php/db-connect.php';
        session_start();
    ?>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">
            <?php
              if(isset($_SESSION['username']))
              {

                echo $_SESSION['username'];?>
                <form method="POST" action=''>
        <input type="submit" name="button1"  value="Customer Average Daily Usage">
        </form>     
        <?php 
          if (isset($_POST['button1']))
          {
              // $sql = "SELECT username, password FROM Customer WHERE username='$username' AND password = '$password'";
              $sql="SELECT avg_cons_daily FROM general_info";
              $result = pg_query($dbconn, $sql);
              if(!$result){
              echo 'An error occurred in faculty login';
            }else
            {
              // print $result;
              $row = pg_fetch_array($result, 0, PGSQL_NUM);
              // echo "Hellothere";
              echo $row[0];
            }
          }
          // else
     //             {
     //               echo 'Smart Grid';
     //             }
        ?>
        <form method="POST" action=''>
        <input type="submit" name="button2"  value="Customer Average Monthly Usage">
        </form> 





        <?php 
          if (isset($_POST['button2']))
          {
              // $sql = "SELECT username, password FROM Customer WHERE username='$username' AND password = '$password'";
              $sql="SELECT avg_cons_monthly FROM general_info";
              $result = pg_query($dbconn, $sql);
              if(!$result){
              echo 'An error occurred in faculty login';
            }else
            {
              // print $result;
              $row = pg_fetch_array($result, 0, PGSQL_NUM);
              // echo "Hellothere";
              echo $row[0];
            }
          }
        ?>  

        <form method="POST" action=''>
        <input type="submit" name="button3"  value="Update or enter CPR bid value">
        </form>
        <?php 
          if (isset($_POST['button3']))
          {?>
              <!--  $sql = "SELECT username, password FROM Customer WHERE username='$username' AND password = '$password'";
               --><form action="">
                <label for="fname">CPR Value:</label>
                <input type="text" id="cpr" name="cpr"><br><br>
                <!-- <label for="lname">Last name:</label>
                <input type="text" id="lname" name="lname"><br><br>
 -->              <input type="submit" value="Submit">
              </form>
              <?php
                if(isset($_POST['cpr']))
                {
                  $var1=(int)$_POST['cpr'];
                  $sq2="SELECT cprVal FROM bidProfile WHERE username='".$_SESSION['username']."' ";
                  $result=pg_query($dbconn, $sql);
                  $num_rows = pg_num_rows($result);
                  if($num_rows==0)
                    {
                      $sq3="INSERT INTO bidProfile (username,cprVal) VALUES ('".$_SESSION['username']."',var1)";
                      $result1=pg_query($dbconn,$sq3);
                    }
                  else
                  {
                  $sq4="UPDATE bidProfile SET cprVal=var1 WHERE username='".$_SESSION['username']."'" ;
                  $result1=pg_query($dbconn,$sq4);
                  }

                  // $sq2="INSERT INTO bidProfile WHERE username=$_SESSION['username'] "  
                }
              ?>
              <!-- $sql="";
              $result = pg_query($dbconn, $sql);
              if(!$result){
              echo 'An error occurred in faculty login';
            }else
            {
              // print $result;
              $row = pg_fetch_array($result, 0, PGSQL_NUM);
              // echo "Hellothere";
              echo $row[0];
            } -->
          }
        ?>  




              }
            

          </h1>
          <p>This is the portal of the best Smart Grid.</p>
        </div>
      </div>

  <div class="container mt-5 pt-5">
    <h2>Courses Offered List</h2>

    <?php 
      include 'php/db-connect.php';
      $temp = $_SESSION['username'];
        // $sq1=""






        // $sql1 = "SELECT DISTINCT course, fname, timeslot, batch FROM STUDCOURSE
        //         WHERE sname = '$temp'";
        // $result1 = pg_query($dbconn, $sql1);
        // if(!$result1){
        //   echo "An error occurred. \n";
        //   exit;
        // }

        // echo "<table class='table'>
        //   <thead>
        //     <th>Course Taken</th>
        //     <th>Timeslot</th>
        //     <th>Batch</th>
        //     <th>Faculty Name</th>
        //   </thead>";

        // while($row = pg_fetch_row($result1)){
        //   echo "<tr>",
        //     "<td>".$row[0]."</td>".
        //     "<td>".$row[2]."</td>".
        //     "<td>".$row[3]."</td>".
        //     "<td>".$row[1]."</td>".
        //   "</tr>";
        // }
        // echo "</table>";


      // $sql = "SELECT DISTINCT of.course, timeslot, cat.credit, fname, batches, leastCG, ad.fadv 
      //         FROM OFFER AS of, CATALOGUE AS cat, ADVISOR AS ad, STUDENT as st
      //         WHERE of.course = cat.course AND st.name = '$temp' AND st.batch = of.batches";

      // $result = pg_query($dbconn, $sql);
      // if(!$result){
      //   echo "An error occurred. \n";
      //   exit;
      // }
      // echo "<table class='table'>
      //   <thead>
      //     <th>Course Offered</th>
      //     <th>Timeslot</th>
      //     <th>Credit</th>
      //     <th>Faculty Name</th>
      //     <th>Batches</th>
      //     <th>LeastCG</th>
      //     <th>Advisor</th>
      //     <th>Register</th>
      //   </thead>";

      // while($row = pg_fetch_row($result)){
      //   echo "<tr>",
      //     "<td>".$row[0]."</td>".
      //     "<td>".$row[1]."</td>".
      //     "<td>".$row[2]."</td>".
      //     "<td>".$row[3]."</td>".
      //     "<td>".$row[4]."</td>".
      //     "<td>".$row[5]."</td>".
      //     "<td>".$row[6]."</td>".
      //     "<td><a class='btn btn-success btn-=block' href='registerCourse.php?&username=".$_SESSION['username'].
      //     "&course=".$row[0].
      //     "&timeslot=".$row[1].
      //     "&credit=".$row[2].
      //     "&fname=".$row[3].
      //     "&batch=".$row[4].
      //     "&fadv=".$row[6]."'>Register</a></td>".
      //   "</tr>";
      // }
      // echo "</table>";


    ?>


  </div> <!-- /container -->

    </main>

    <footer class="container">
      <p>&copy; Company 2017-2018</p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>-->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

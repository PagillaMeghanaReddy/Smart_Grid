<?php session_start();?>
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
    ?>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">
            <?php
              if(isset($_SESSION['username'])){
                echo $_SESSION['username'];
              }
              else{
                echo 'Smart Grid';
              }
            ?>
          </h1>
          <p>This is the registration portal of the best smart grid.</p>
        </div>
      </div>

  <div class="container mt-5 pt-5">
    <h2>Smart Grid</h2>

    <?php 
      include 'php/db-connect.php';
            
        //$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
      $sql = "SELECT SUM(usage) AS total
      FROM custData
      WHERE datewa = CURRENT_DATE";
      $result = pg_query($dbconn, $sql);
      if(!$result){
        echo 'An error occurred in faculty login';
      }
      else{
        $row = pg_fetch_array($result, 0, PGSQL_NUM);
                    // echo $row[0];
      }
    ?>

    <form action="php/editDC.php" method = "POST"> 
          <div class="form-group">
              <label for="shortage">Shortage</label>
              <input type="text" class="form-control" id="shortage" name="shortage" value="">
          </div>
<!-- 
          <div class="form-group">
              <label for="usage">Total usage</label>
              <input type="number" class="form-control" id="usage" name="usage" value="$row[0]">
            </div> -->


          <input type="submit" name="Update Market Rate" class="btn btn-primary btn-block">
    </form>

    <!-- <a class='btn btn-success btn-=block' href='updateCG.php'>Show CG</a> -->

  </div> <!-- /container -->

    </main>

    <footer class="container">
      <p>&copy; Company forever</p>
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

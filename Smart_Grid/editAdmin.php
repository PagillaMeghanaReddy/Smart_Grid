<!doctype html>
<html lang="en">
<head>
  <title></title>
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
              if(isset($_SESSION['username'])){
                echo $_SESSION['username'];
              }
              else{
                echo 'University!';
              }
            ?>
          </h1>
          <p>This is the best Smart Grid.</p>
        </div>
      </div>

  <div class="container mt-5 pt-5">
    <h2>Smart Grid</h2>
    <form action="php/updateMrkt.php" method = "POST"> 
          <div class="form-group">
              <label for="market_rate">Market Rate</label>
              <input type="text" class="form-control" id="market_rate" name="market_rate" placeholder="Update Market Rate">
          </div>

          <input type="submit" name="Update Market Rate" class="btn btn-primary btn-block">
    </form>
    
    <!-- <a class='btn btn-success btn-=block' href='insertCourse.php'>Update Market Rate</a> -->

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

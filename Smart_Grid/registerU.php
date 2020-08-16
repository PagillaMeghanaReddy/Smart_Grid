<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	
	<?php
        include 'topnav.php';
    ?>

	<div class="container mt-5">

		<div class="row justify-content-center"> 

			<div class="col-md-8 mt-5" >
				<h2 class="text-center">User Registration</h2>
				<form action="php/registerU.php" method = "POST"> 
					<div class="form-group">
					    <label for="username">User name</label>
					    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
				  	</div>

				  	<!-- <div class="form-group"> 
					    <label for="batch">Batch</label>
					    <input type="text" class="form-control" id="batch" name="batch" placeholder="Enter Batch">
				  	</div>

				  	<div class="form-group">
					    <label for="lCr">Last Sem Credit</label>
					    <input type="float" class="form-control" id="lCr" name="lCr" placeholder="Enter last sem credits taken / 0 if a freshie">
				  	</div>

				  	<div class="form-group">
					    <label for="llCr">Last to last sem Credits</label>
					    <input type="float" class="form-control" id="llcr" name="llcr" placeholder="Enter last to last sem credits taken / 0 if a freshie">
				  	</div>

				  	<div class="form-group">
					    <label for="cgpa">Current cgpa</label>
					    <input type="float" class="form-control" id="cgpa" name="cgpa" placeholder="Enter Current cgpa / 0 if a freshie">
				  	</div> -->

				  	<div class="form-group">
					    <label for="password">Password</label>
					    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
				  	</div>

				  	<div class="form-group">
					    <label for="confirm">Confirm Password</label>
					    <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm Password">
				  	</div>

				  	<input type="submit" name="REGISTER" class="btn btn-primary btn-block">
				</form>


			</div>
	
		</div>

	</div>	
		
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript">
		var password = document.getElementById("password")
		 , confirm_password = document.getElementById("confirm");

		function validatePassword(){
		  if(password.value != confirm_password.value) {
		    confirm_password.setCustomValidity("Passwords Don't Match");
		  } else {
		    confirm_password.setCustomValidity('');
		  }
		}

		password.onchange = validatePassword;
		confirm_password.onkeyup = validatePassword;

	</script>

</body>
</html>

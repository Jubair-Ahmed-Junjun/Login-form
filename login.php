<?php
  $message = "";
  session_start();
   
   if (isset($_POST['btn'])) {
   	$email = $_POST['email'];
   	$password = $_POST['password'];

   	$conn = mysqli_connect('localhost','root','','login_db');
   	$sql = "SELECT * FROM users WHERE email ='$email' AND password = '$password' ";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows>0) {
    	$_SESSION['email'] = $email;
    	$_SESSION['password'] = $password;
    	header('location:dashboard.php');
    }else{
    	$message = "Email or password invalid";
    }

   }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
  <div class="container">
  	<div class="row">
  		<div class="col-sm-6">
  			<div class="form-group">
  				<h2 class="text-left text-info">Login Form</h2>
  				<h2 class="text-danger"><?php echo $message; ?></h2>
  				<form action="" method="POST">
  					<div class="form-group">
  						<label>Email</label>
  						<input type="email" name="email" placeholder="email" class="form-control">
  					</div>

  					<div class="form-group">
  						<label>Password</label>
  						<input type="text" name="password" placeholder="password" class="form-control">

  					</div>

  					<input type="submit" name="btn"  class="btn btn-success" value="login">

  				</form>
  			</div>
  		</div>
  	</div>
  </div>
</body>
</html>
<?php

// Create connection
$con = new mysqli("localhost", "root", "", "unique_advertising_agency");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

session_start();

if(isset($_POST['submit']))
{
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$password=mysqli_real_escape_string($con,$_POST['password']);


	$select = "SELECT* FROM registered_user WHERE Username='$username' AND User_Password='$password'";

	$result=mysqli_query($con,$select);

	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_array($result);

		$_SESSION['Customer_ID'] = $row['Customer_ID'];
		header("Location: home.php");
		exit();
	}
	else{
		echo"<script>alert('incorrect username or password!');</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>UNIQUE advertisement - Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
<?php include 'header.php' ?>
<div class="container1">
	<div class="col1"><img src="./images/back2.jpeg" alt="idea" class="idea"></div>
	<div class="col1">
	<div float="right" class="button1">
	<button href="registration.php">Sign Up</button>
	</div>
	<p>Don't have an account?</p>
	<div class="form">
		<form action="#" method="post">
		<h3>Sign in to your Unique Advertisement account</h3>
		<br>
		<img src="./images/logo1.png" alt="logo" class="logo2">
		<input type="text" id="username" name="username" placeholder="Username">
		<br><br>
		<input type="password" id="password" name="password" placeholder="Password">
		<br>
		<br>
		<div float="right" class="button1">
		<button type="submit" name="submit">Sign in</button>
		</div>
		</form>
	</div><br>

	</div>
</div>

<a href="admin_login.php" class="button2">Admin Login</a>

<?php include 'Footer.php' ?>
</body>
</html>
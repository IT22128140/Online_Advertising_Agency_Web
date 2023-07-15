<!DOCTYPE html>
<html>

<head>
	<title>Registration Page</title>
	<link rel = "stylesheet" href = "./css/Registration_Style.css">
	<script src="js/Registration_JS.js"></script>
</head>

<body>

<?php include 'header.php'; ?>

<br><br><br>

<div id = "form1">

	<form method="post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return checkPassword();">


	<center><h1>Registration Page</h1></center><br><br>

	<u><h2>Company Details</h2></u><br><br>
	
	<label for = "cname">Company Name : </label><input type = "text" class = "box" name = "cname" placeholder = "Your company name" required><br>
	
	<label for = "caddress">Company Address : </label>
	<input type = "text" class = "box" name = "streetno" placeholder = "Street Number" required><br>
	<input type = "text" class = "box1" name = "streetname" placeholder = "Street Name" required><br>
	<input type = "text" class = "add" name = "city" placeholder = "City" required>	<input type = "text" class = "add1" name = "province/state" placeholder = "Province/State" required><br>
	<input type = "text" class = "add" name = "country" placeholder = "Country" required>	<input type = "text" class = "add1" name = "postal/zipcode" placeholder = "Postal/Zip Code" required><br><br>
	
	<label for = "cemail">Company E-mail : </label><input type = "email" class = "box" name = "cemail" placeholder = "hybridetechnologies@gmail.com" pattern = "[a-z0-9._%+-]+@.[a-z0-9.-]+\.[a-z]{2,3}" required><br><br>

	<label for = "ctelno">Company Phone Number : </label><input type = "tel" class = "box" name = "cphonenumber" placeholder = "Your company phonenumber" required><br><br>
	
	<label for = "url">Company Website URL : </label><input type = "text" class = "box" name = "url" placeholder = "https://technology.com" required><br><br>
	
	<label for = "Industry">Industry Focus On : </label><input type = "text" class = "box" name = "Industry" placeholder = "Beauty/Electronics..." required><br><br>
	
	
	
	<u><h2>Representative Details</h2></u><br><br>
	
	<label for = "repname">First Name : </label><input type = "text" class = "box" name = "repfname" placeholder = "Your company representative first name" required><br><br>

	<label for = "repname">Last Name : </label><input type = "text" class = "box" name = "replname" placeholder = "Your company representative last name" required><br><br>
	
	<label for = "repjob">Designation : </label><input type = "text" class = "box" name = "repjob" placeholder = "Your company representative designation" required><br><br>
	
	<label for = "repcontactno">Contact Number : </label><input type = "tel" class = "box" name = "repcontactno" placeholder = "Your company representative phonenumber" required><br><br>
	
	<label for = "repemail">E-mail : </label><input type = "email" class = "box" name = "repemail" placeholder = "nurinsyrahsharifah122@gmail.com"  pattern = "[a-z0-9._%+-]+@.[a-z0-9.-]+\.[a-z]{2,3}" required><br><br>
	
	
	
	<u><h2>Credentials</h2></u><br>
	
	<label for = "username">Username: </label><input type = "text" class = "box" name = "username" placeholder = "Enter valid username" required><br><br>
	
	<label for = "passwordtologin">Password : </label><input type = "Password" class = "box" name = "passwordtologin" id = "pwd" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,10}" placeholder = "Enter valid password" required><br><br>
	
	<label for = "confopw">Confirmation Password : </label><input type = "Password" class = "box" name = "confopw" id = "cpwd" placeholder = "Enter confirmation password" required><br><br><br>
	
    <input type="checkbox" id="terms" name="terms" onchange="enableSignupButton()">

    I accept the <a href="terms_and_conditions.php" target="_blank">Terms and Conditions</a><br><br>

	<input type="submit" name="signup" value="Sign Up" id="signupButton" disabled>
	
</form>

</div>
<br><br><br>

<?php include 'footer.php'; ?>

</body>

</html>
<?php

$con = new mysqli("localhost", "root", "", "unique_advertising_agency");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_POST["signup"])) {
	$password = $_POST["passwordtologin"];
	$confirmPassword = $_POST["confopw"];
	$username = $_POST["username"];
	
	$username = $con->real_escape_string($username);

	$query = "SELECT * FROM registered_user WHERE UserName = '$username'";
	$result = $con->query($query);

	while ($row = $result->fetch_assoc()) {
		$existingPassword = $row["User_Password"];

		if ($password === $existingPassword) {
			echo '<script>alert("Username and password already exist!");</script>';
			exit;
		}
	}

	$cpname = $_POST["cname"];
	$stno = $_POST["streetno"];
	$stname = $_POST["streetname"];
	$stcity = $_POST["city"];
	$stprovine = $_POST["province/state"];
	$stcountry = $_POST["country"];
	$stpostal = $_POST["postal/zipcode"];
	$cpemail = $_POST["cemail"];
	$cpno = $_POST["cphonenumber"];
	$cpurl = $_POST["url"];
	$cpindustry = $_POST["Industry"];
	$repfnm = $_POST["repfname"];
	$replnm = $_POST["replname"];
	$repdesig = $_POST["repjob"];
	$repcono = $_POST["repcontactno"];
	$repem = $_POST["repemail"];
	$repuser = $_POST["username"];
	$loginpw = $_POST["passwordtologin"];
	$acceptedTerms = isset($_POST['terms']) ? 1 : 0;

	$sql = "INSERT INTO registered_user (Company_Name, StreetNumber, SteetName, City, Province_OR_State, Country, PostalCode, Company_Email, Company_ContactNumber, Company_WebsiteURL, Industry_FocusedOn, Rep_FirstName, Rep_LastName, Rep_Designation, Rep_ContactNumber, Rep_Email, UserName, User_Password, Accepted_Terms) VALUES
    ('$cpname', '$stno', '$stname', '$stcity', '$stprovine', '$stcountry', '$stpostal', '$cpemail', '$cpno', '$cpurl', '$cpindustry', '$repfnm', '$replnm', '$repdesig', '$repcono', '$repem', '$repuser', '$loginpw', '$acceptedTerms')";

	if ($con->query($sql)) {
		echo '<script>alert("Inserted Successfully");</script>';
	} else {
		echo "Error: " . $con->error;
	}
}

$con->close();
?>
<!--Sageevan.p HTML Part-->
<!--Nethsiluni A.S. PHP part-->
<!DOCTYPE html>
<html>
<head>
    <title>UNIQUE advertisement - Payment</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./css/service.css">
</head>
<body>
<body>
<?php include 'header2.php'; ?>

<?php
	
	include 'config.php';

	session_start();
	
	if (!isset($_SESSION['Customer_ID'])) {
	   header('location:login.php');
	   exit();
	}
	//Get data from the database
	$id = $_SESSION['Customer_ID'];

	$query = "SELECT Company_Name,Company_Email FROM registered_user WHERE Customer_ID = '$id'";
	$result = mysqli_query($con, $query);

	if ($result && mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$companyName = $row['Company_Name'];
			$email = $row['Company_Email'];
		}
	} 
	else {
		echo "0 results";
	}

	//Get data from the database
	$pid = 1;

	$query = "SELECT Amount FROM pending_payment WHERE P_Invoice_ID = '$pid'";
	$result = mysqli_query($con, $query);

	if ($result && mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$amount = $row['Amount'];
		}
	} 
	else {
		echo "0 results";
	}

?>
<form action="service_payment_submit.php" method="post">
<div class="container1">
	<div class="form">

		<p>Company name:</p>
		<input type="text" id="fname" name="companyName" placeholder="Company name" value="<?php echo $companyName?>"> 
		<p>Company's email:</p>
		<input type="email" id="email" name="companyEmail" placeholder="Company's email" value="<?php echo $email?>">

	</div>
	<div class="form2">

		<div class="col4">
		<p>Payment amount for this service:</p><br>
		<p>Select the seasonal offer:</p><br>
		<p>Select the membership offer:</p>
		</div>
		<div class="col4">
		<p id="amount" name="amount"><?php echo $amount."$"?></p>
		<br>
		<select id="soffer" name="soffer" class="custom-select1">
			<option value="0">None</option>
			<option value="10">Cristmas </option>
			<option value="20">New Year</option>
		</select>
		<br><br>
		<select id="moffer" name="moffer" class="custom-select1">
			<option value="0">None</option>
			<option value="5">5%</option>
			<option value="10">10%</option>
		</select>
		</div>

		<br>
	<div class="form3">

		<input type="radio" id="paypal" name="method" value="./images/card_img2.png" checked>
		<label for="paypal">Pay Pal &nbsp;</label><img src="./images/card_img2.png"><br><br>
		<input type="radio" id="credit/debit" name="method" value="./images/card_img.png">
 		<label for="credit/debit">Credit/Debit</label><img src="./images/card_img.png"><br>

	</div>
	
	<div class="container2">

		<div class="inputbox">
		<input type="Number" id="cnumber" name="cardNumber" placeholder="Card Number">
		</div><br>
		<div class="inputbox2">
		<input type="datetime" id="expaire" name="expaire" placeholder="MM/YY">
		</div>
		<div class="inputbox3">
		<input type="Number" id="cvv" name="cvv" placeholder="CVV">
		</div><br>
		<div class="formp">
		<p>Billing address</p>
		</div>
		<div class="inputbox4">
		<input type="text" id="fname" name="firstname" placeholder="First">
		</div>
		<div class="inputbox5">
		<input type="text" id="lname" name="lastname" placeholder="Last">
		</div><br>
		<div class="inputbox6">
		<input type="text" id="saddress" name="streetAddress" placeholder="Street number">
		</div><br>
		<div class="inputbox6">
		<input type="text" id="saddress2" name="streetAddress2" placeholder="Street name">
		</div><br>
		<div class="inputbox4">
		<input type="text" id="city" name="city" placeholder="City">
		</div>
		<div class="inputbox5">
		<input type="text" id="state" name="state" placeholder="State/Province">
		</div><br>
		<div class="inputbox4">
		<input type="Number" id="postal" name="postal" placeholder="Postal/Zip Code">
		</div>
		<div class="inputbox5">
		<select id="country" name="country" class="custom-select">
			<option value="0">Country</option>
			<option value="1">America(USA)</option>
			<option value="2">Canada</option>
			<option value="3">China</option>
			<option value="4">Dubai(UAE)</option>
			<option value="5">France</option>
			<option value="6">Germany</option>
			<option value="7">India</option>
			<option value="8">Malaysia</option>
			<option value="9">Singapore</option>
			<option value="10">South Korea</option>
			<option value="11">Sri Lanka</option>
			<option value="12">United kingdom</option>
		</select>
		</div><br>
		<div>
		<a href="service_payment_submit.php"><input type="submit" class="paybutton" name="submit" value="Pay Now"></a>
		</div>

	</div>
	<div class="form4">
		<form action="#" method="post">
		<h2>Summary</h2>
		<h2>Unique Advertising Agency</h2>
		<br>
		<img src="./images/logo1.png" alt="logo" style="width:50%; margin-left:25%;" >
		<br><br>
		<div class="col5">
		<p>Payment Status</p>
		<p>Payment Date</p>
		<p>Payment Method</p>
		<p>Total Amount</p>
		</div>
		<div class="col6">
		<h6>Processing...</h6>
		<p id="paymentDate"></p>
		<img src="./images/card_img2.png" id="paymeth">
		<p id="totalAmount"></p>
		</div>

		
	</div>
	
</div>
</form>
<script src="./js/service.js"></script>

<?php include 'footer.php' ?>
</body>
</html>
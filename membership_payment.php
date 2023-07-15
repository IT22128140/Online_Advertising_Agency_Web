<!DOCTYPE html>
<html>
<head>
    <title>UNIQUE advertisement - Payment</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./css/package.css">
	<script src="./js/package.js"></script>
</head>
<body>

<?php include 'header2.php'; ?>
<?php 	
include 'config.php';

session_start();

if (!isset($_SESSION['Customer_ID'])) {
   header('location:login.php');
   exit();
}
?>
<form action="membership_payment_submit.php" method="POST">
<div class="container1">
<h1>Purchase the Package</h1>
<div class="container2">
    <p>Company name:</p>
    <input type="text" name="companyName" placeholder="Company name" >
    <p>Company's email:</p>
    <input type="email" name="companyMail" placeholder="Company's email">
</div>
<div class="container3">
<h2>Select the Package</h2>
    <div class="radio-container">
		<input type="radio" id="package" name="package" value="Starter">
 		<label class="radio1" for="Starter">Starter</label>
		<input type="radio" id="package" name="package" value="Bronze">
 		<label class="radio1" for="Bronze">Bronze</label>
		<input type="radio" id="package" name="package" value="Silver">
 		<label class="radio1" for="Silver">Silver</label>
		<input type="radio" id="package" name="package" value="Gold">
 		<label class="radio1" for="Gold">Gold</label>
		<input type="radio" id="package" name="package" value="Exclusive">
 		<label class="radio1" for="Exclusive">Exclusive</label>
	</div>
    <br>
    <br>
    <div class="clearfix">
		<div class="box">
			<div class="boximg">
			<img src="./images/black.png" alt="black" style="width:70px">
			</div>
			<br>
			<p>1 Free Proposal</p>
			<br>
			<p>5% Offer apply for 2 service purchase.</p>
			<br>
			<p>Per month</p>
			<h3>$50</h3>
		</div>
		<div class="box"> 
			<div class="boximg">
			<img src="./images/green.png" alt="green" style="width:70px">
			</div>
			<br>
			<p>2 Free Proposal</p>
			<br>
			<p>5% Offer apply for 5 service purchase.</p>
			<br>
			<p>Per month</p>
			<h3>$100</h3>
		</div>
		<div class="box"> 
			<div class="boximg">
			<img src="./images/silver.png" alt="silver" style="width:70px">
			</div>
			<br>
			<p>3 Free Proposal</p>
			<br>
			<p>5% Offer apply for 10 service purchase.</p>
			<br>
			<p>Per month</p>
			<h3>$250</h3>
			</div>
		<div class="box"> 
		<div class="boximg">
			<img src="./images/gold.png" alt="gold" style="width:70px">
			</div>
			<br>
			<p>5 Free Proposal</p>
			<br>
			<p>5% Offer apply for every service purchase.</p>
			<br>
			<p>Per month</p>
			<h3>$350</h3>
		</div>
		<div class="box"> 
			<div class="boximg">
			<img src="./images/daimand.png" alt="daimand" style="width:70px">
			</div>
			<br>
			<p>10 Free Proposal</p>
			<br>
			<p>10% Offer apply for every service purchase.</p>
			<br>
			<p>Per month</p>
			<h3>$500</h3>
		</div>
	</div>
</div>
<div class="container4">
    <input type="radio" name="paywith" value="paypal">
 	<label for="paypal">Pay Pal</label><img src="./images/card_img2.png"><br><br>
 	<input type="radio" name="paywith" value="credit/debit">
  	<label for="credit/debit">Credit/Debit</label><img src="./images/card_img.png"><br>
</div>
<div class="container5">
    <div class="inputbox">
		<input type="Number" id="cnumber" name="cardNumber" placeholder="Card Number">
	</div><br>
	<div class="inputbox2">
		<input type="datetime" id="expaire" name="expaire" placeholder="MM/YY">
	</div>
	<div class="inputbox3">
		<input type="Number" id="cvv" name="cvv" placeholder="CVV">
	</div><br>
	<div class="bill">
		<p>Billing address</p>
	</div>
	<div class="inputbox4">
		<input type="text" id="fname" name="firstname" placeholder="First">
	</div>
	<div class="inputbox5">
		<input type="text" id="lname" name="lastname" placeholder="Last">
	</div><br>
	<div class="inputbox6">
		<input type="text" id="snumber" name="streetnumber" placeholder="Street number">
	</div><br>
	<div class="inputbox6">
		<input type="text" id="sname" name="streetname" placeholder="Street name">
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
			<option value="None">Country</option>
			<option value="America(USA)">America(USA)</option>
			<option value="Canada">Canada</option>
			<option value="China">China</option>
			<option value="Dubai(UAE)">Dubai(UAE)</option>
			<option value="France">France</option>
			<option value="Germany">Germany</option>
			<option value="India">India</option>
			<option value="Malaysia">Malaysia</option>
			<option value="Singapore">Singapore</option>
			<option value="South Korea">South Korea</option>
			<option value="Sri Lanka">Sri Lanka</option>
			<option value="United kingdom">United kingdom</option>
		</select>
	</div><br>
	<div class="paybutton">
		<button type="submit" name="connectit">Pay Now</button>
	</div>
</div>
<div class="container6">
    <h2>Summary</h2>
	<h2>Unique Advertising Agency</h2>
	<br>
	    <img src="./images/logo1.png" alt="logo" style="width:50%; margin-left:25%;" >
	<br><br><br><br>
    <div class="col5">
		<p>Payment_status</p>
		<br>
		<p>Payment_date</p>
		<br>
		<p>Payment_method</p>
		<br>
		<p>Total_amount</p>
	</div>
    <div class="col6">
		<h6>Processing...</h6>
		<br>
		<div class="date" id="currentDate"></div>
		<br>
		<img src="./images/card_img2.png" id="paymeth">
		<br>
		<div id="total"></div>
	</div>
</div>

</div>
</form>
<?php include 'footer.php' ?>
</body>
</html>
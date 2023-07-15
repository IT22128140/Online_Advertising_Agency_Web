<!--Nethsiluni A.S-->
<?php include 'config.php';?>

<?php

    //Get data from the form when the user clicks the submit button
	if(isset($_POST['submit'])){
		$companyName = isset($_POST['companyName']) ? $_POST['companyName'] : '';
		$email = isset($_POST['companyEmail']) ? $_POST['companyEmail'] : '';
		$amount = isset($_POST['amount']) ? $_POST['amount'] : '';
		$soffer = isset($_POST['soffer']) ? $_POST['soffer'] : '';
		$moffer = isset($_POST['moffer']) ? $_POST['moffer'] : '';
		$paymentMethod = isset($_POST['method']) ? $_POST['method'] : '';
		$cardNumber = $_POST['cardNumber'];
		$expireDate = $_POST['expaire'];
		$cvv = $_POST['cvv'];
		$firstName = $_POST['firstname'];
		$lastName = $_POST['lastname'];
		$streetNum = $_POST['streetAddress'];
		$streetName = $_POST['streetAddress2'];
		$city = $_POST['city'];	
		$state = $_POST['state'];
		$postal = $_POST['postal'];
		$country = $_POST['country'];

		//Insert data into the database
		$sql = "INSERT INTO service_payment (Company_Name, Company_Email, Amount, Seasonal_Offer, Membership_Offer, Payment_Method, Card_Number, Expire_Date, CVV, First_Name, Last_Name, StreetNumber, StreetName, City, Province_State, PostalCode, Country) 
		VALUES ('$companyName', '$email', '$amount', '$soffer', '$moffer', '$paymentMethod', '$cardNumber', '$expireDate', '$cvv', '$firstName', '$lastName', '$streetNum', '$streetName', '$city', '$state', '$postal', '$country')";

    	if ($con->query($sql) === TRUE) 
		{
			echo "<script> alert('Data inserted successfully!!!')</script>";
    	} 
		else 
		{
			echo "<script> alert('Error: ')</script>" . $sql . "<br>";
		}
    
		$con->close();
	}
?>
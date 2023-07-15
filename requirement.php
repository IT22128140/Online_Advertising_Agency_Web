<!DOCTYPE html>
<html>
<head>
    <title>Requirement Form</title>
    <link rel="stylesheet" href="./css/Requirement_Form_Style.css">
    <script src="js/Requirement_Form_JS.js"></script>
</head>
<body>
<?php include 'header2.php'?>

<?php

//connection
$connection = new mysqli("localhost", "root", "", "unique_advertising_agency");

//check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
session_start();

if(!isset($_SESSION['Customer_ID'])){
   header('location:login.php');
}

//storing the user entered values in variables
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $companyName = $_POST["cname"];
    $monthlyBudget = $_POST["budget"];
    $currency = $_POST["currency"];
    $targetAudience = $_POST["audience"];
    $requirements = $_POST["requirement"];
    $advertisementOption = $_POST["askforadesignedadd"];
    
    // Check if the company name already exists in the database
    $existingQuery = "SELECT * FROM proposal WHERE Company_Name = '$companyName'";
    $existingResult = $connection->query($existingQuery);
    
    if ($existingResult->num_rows > 0) {
        // Company name already exists, update the existing row
        $updateQuery = "UPDATE proposal SET 
                        ProjectMonthlyBudget = '$monthlyBudget',
                        Currency = '$currency',
                        MainTargetAudience = '$targetAudience',
                        Requirment = '$requirements',
                        Advertisement_option = '$advertisementOption'
                        WHERE Company_Name = '$companyName'";

if ($connection->query($updateQuery)) {
    echo '<script>alert("Data Updated Successfully!");</script>';
} else {
    echo "Error updating data: " . $connection->error;
}
} else {

// Company name does not exist, insert a new row
$insertQuery = "INSERT INTO proposal(Company_Name, ProjectMonthlyBudget, Currency, MainTargetAudience, Requirment, Advertisement_option)VALUES
('$companyName', '$monthlyBudget', '$currency', '$targetAudience', '$requirements', '$advertisementOption')";

if($connection->query($insertQuery)){
    echo '<script>alert("Data Stored Successfully!");</script>';
}
else{
    echo "Error: ".$connection->error;
}
}
}
$connection->close();
?>
<br><br><br>

<div id="form">

    <center><h1>Requirement Filling Form For Proposal</h1></center><br><br><br><br><br>

    <form method="post" action="">

        <label for="cname" id="label11">Company Name : </label>
        <input type="text" class="box" name="cname" placeholder="Your company name" required><br><br>

        <label for="budget" id="label11">Projected Monthly Budget : </label>
        <input type="text" class="box" name="budget" placeholder="Enter your projected monthly budget" required><br><br>

        <label for="currency" id="label11">Currency : </label>
        <input type="text" class="box" name="currency" placeholder="Enter your currency name in letters" required><br><br>

        <label for="audience" id="label11">Main Target Audience : </label>
        <input type="text" class="box" name="audience" placeholder="Your target audience" required><br><br>

        <label for="requirement" id="label11">Requirements : </label>
        <textarea name="requirement" rows="10" cols="15" class="area" required></textarea><br><br><br>

        <label for="wish" id="label12">Do you wish to design an advertisement from us? </label>
        <input type="radio" name="askforadesignedadd" value="Yes"> Yes
        <input type="radio" name="askforadesignedadd" value="No" checked="checked"> No<br><br><br><br><br>

        <input type="Submit" name="btnsubmit" value="Submit">

    </form>

</div>
<br><br><br>
<?php include 'footer.php'; ?>

</body>
</html>


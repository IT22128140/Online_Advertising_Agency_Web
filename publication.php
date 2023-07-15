<!DOCTYPE html>
<html>

<head>
    <title>Advertisement Publication</title>

    <link rel="stylesheet" href="./css/Publication_Form_Style.css">
    <script src="js/Publication_Form_JS.js"></script>
</head>

<body>
<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['Customer_ID'])){
   header('location:login.php');
}

?>
<?php include 'header2.php' ?>
<br><br><br>
    <div id="form1">

        <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit = "return submitForm()">

            <center><h2>Request For An Andertisment Publication</h2></center><br><br>

            <label for="cname" id="label1">Company Name: </label><input type="text" class="box" name="cname" placeholder="Your company name" required><br>

            <label for="audience" id="label1">Main Target Audience: </label><input type="text" class="box" name="audience" placeholder="Your Target Audience" required><br>

            <label for="places" id="label2">Places you like to publish your advertisement (Please select 3 or more) : </label><br>
            <input type="checkbox" name="checked_list[]" value="instagram">Instagram<br>
            <input type="checkbox" name="checked_list[]" value="facebook">Facebook<br>
            <input type="checkbox" name="checked_list[]" value="twitter">Twitter<br>
            <input type="checkbox" name="checked_list[]" value="youtube">YouTube<br>
            <input type="checkbox" name="checked_list[]" value="reddit">Reddit<br>

            <label for="addcopy" id="label3">Insert a copy of your designed advertisement here : </label><br>

            <input type="file" name="fileFieldName" id="fileToUpload" required><br><br>

            <input type="Submit" name="submit" value="Submit">

        </form>

    </div>
    <br><br><br><br>
    <?php include 'footer.php'; ?>
    
</body>

</html>

<?php

$connection = new mysqli("localhost", "root", "", "unique_advertising_agency");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_POST['submit'])) {
    
    $companyName = $_POST['cname'];
    $targetAudience = $_POST['audience'];
    $advertisementPlaces = $_POST['checked_list'];

    $advertisementPlacesData = [
        'instagram' => 'No',
        'facebook' => 'No',
        'twitter' => 'No',
        'youtube' => 'No',
        'reddit' => 'No'
    ];

    foreach ($advertisementPlaces as $place) {
        if (isset($advertisementPlacesData[$place])) {
            $advertisementPlacesData[$place] = 'Yes';
        }
    }

    $file = $_FILES['fileFieldName']['tmp_name'];
    $fileName = $_FILES['fileFieldName']['name'];
    $fileDestination = 'uploads/' . $fileName;

    move_uploaded_file($file, $fileDestination);

    $query = "INSERT INTO Advertisement_Publication (Company_Name, MainTargetAudience, Instagram, Facebook, Twitter, YouTube, Reddit, FilePath) VALUES ('$companyName', '$targetAudience', '$advertisementPlacesData[instagram]', '$advertisementPlacesData[facebook]', '$advertisementPlacesData[twitter]', '$advertisementPlacesData[youtube]', '$advertisementPlacesData[reddit]', '$fileDestination')";

    if (mysqli_query($connection, $query)) {

        echo '<script>alert("Form submitted successfully!");</script>';
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
}

mysqli_close($connection);

?>

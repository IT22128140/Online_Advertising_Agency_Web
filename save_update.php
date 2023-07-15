<!--Nethsiluni A.S.-->
<?php
    include 'config.php';

    session_start();

    if (!isset($_SESSION['Customer_ID'])) 
    {
    header('location:login.php');
    exit();
    }

    $id = $_SESSION['Customer_ID'];

        if(isset($_POST['update']))
        {
            $companyName = $_POST['Company_Name'];
            $streetNumber = $_POST['StreetNumber'];
            $streetName = $_POST['SteetName'];
            $city = $_POST['City'];
            $province = $_POST['Province_OR_State'];
            $country = $_POST['Country'];
            $phone = $_POST['Company_ContactNumber'];
            $email = $_POST['Company_Email'];
            $website = $_POST['Company_WebsiteURL'];
            $industry = $_POST['Industry_FocusedOn'];

            $firstName = $_POST['Rep_FirstName'];
            $lastName = $_POST['Rep_LastName'];
            $repDesignation = $_POST['Rep_Designation'];
            $repPhone = $_POST['Rep_ContactNumber'];
            $repEmail = $_POST['Rep_Email'];
            $repUsername = $_POST['UserName'];
            $repUserpassword = $_POST['User_Password'];

            $sql = "UPDATE registered_user SET Company_Name = ?, StreetNumber = ?, SteetName = ?, City = ?, 
            Province_OR_State = ?, Country = ?, Company_ContactNumber = ?, Company_Email = ?, Company_WebsiteURL = ?, 
            Industry_FocusedOn = ?, Rep_FirstName = ?, Rep_LastName = ?, Rep_Designation = ?, 
            Rep_ContactNumber = ?, Rep_Email = ?, UserName = ?, User_Password = ? WHERE Customer_ID = ?";

            $stmt = $con->prepare($sql);
            $stmt->bind_param("ssssssssssssssssssi", $companyName, $streetNumber, $streetName, $city, $province, $country, $phone, $email, $website, 
            $industry, $firstName, $lastName, $repDesignation, $repPhone, $repEmail, $repUsername, $repUserpassword, $id);

            if ($stmt->execute()) {
                echo '<script> alert("Data updated successfully.")</script>';
            } else {
                echo '<script> alert("Error: '.$stmt->error.'")</script>';
            }

            header('location:user_account.php');
        }
?>

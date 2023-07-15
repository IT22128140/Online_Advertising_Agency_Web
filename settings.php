<!--Nethsiluni A.S.-->
<!DOCTYPE html>
<html lan="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UNIQUE Advertising Agency-Settings</title>
    <link rel="stylesheet" type="text/css" href="css/settings.css">
</head>
<body> 
    
    <?php include 'header2.php';?>
    <?php include 'config.php';?>

    <?php
    session_start();

    if(!isset($_SESSION['Customer_ID'])){
       header('location:login.php');
    }
        $id = $_SESSION['Customer_ID'];

        $query = "SELECT * FROM registered_user WHERE Customer_ID = '$id'";
        $result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);

            $companyName = $row['Company_Name'];
            $streetNumber = $row['StreetNumber'];
            $streetName = $row['SteetName'];
            $city = $row['City'];
            $province = $row['Province_OR_State'];
            $country = $row['Country'];
            $phone = $row['Company_ContactNumber'];
            $email = $row['Company_Email'];
            $website = $row['Company_WebsiteURL'];
            $industry = $row['Industry_FocusedOn'];

            $firstName = $row['Rep_FirstName'];
            $lastName = $row['Rep_LastName'];
            $repDesignation = $row['Rep_Designation'];
            $repPhone = $row['Rep_ContactNumber'];
            $repEmail = $row['Rep_Email'];
            $repUsername = $row['UserName'];
            $repPassword = $row['User_Password'];            
        }
        else
        {
            echo "<script>alert('User Account not found!')</script>";
        }

        mysqli_close($con);
    ?>

    <br>
    <center>
    <form class="details" method = "post" id = "form-settings">
        <fieldset>
            <legend>Company Details</legend>
                <div class = "container">
                    <label for = "Company_Name">Company Name : </label>
                    <input type = "text" class = "box" name = "Company_Name" id = "Company_Name" placeholder = "Your company name" value="<?php echo $companyName; ?>" required><br>
                    <label for = "caddress">Company Address : </label> <br>
                        <input type = "text" class = "box" name = "StreetNumber" id = "StreetNumber" placeholder = "Street Number" value="<?php echo $streetNumber; ?>" required>
                        <input type = "text" class = "box1" name = "SteetName" id = "SteetName" placeholder = "Street Name" value="<?php echo $streetName; ?>" required><br>
                        <input type = "text" class = "add" name = "City" id = "City" placeholder = "City" value="<?php echo $city; ?>" required>	
                        <input type = "text" class = "add1" name = "Province_OR_State" id = "Province_OR_State" placeholder = "Province/State" value="<?php echo $province; ?>" required><br>
                        <input type = "text" class = "add" name = "Country" id = "Country" placeholder = "Country" value="<?php echo $country; ?>" required> <br>
                    <label for = "Company_ContactNumber">Company Phone Number : </label><input type = "tel" class = "box" name = "Company_ContactNumber" id = "Company_ContactNumber" placeholder = "Your company phonenumber" value="<?php echo $phone; ?>" required><br>
                    <label for = "Company_Email">Company E-mail : </label><input type = "email" class = "box" name = "Company_Email" id = "Company_Email" placeholder = "hybridetechnologies@gmail.com" pattern = "[a-z0-9._%+-]+@.[a-z0-9.-]+\.[a-z]{2,3}" value="<?php echo $email; ?>" required><br>
                    <label for = "Company_WebsiteURL">Company Website URL : </label><input type = "text" class = "box" name = "Company_WebsiteURL" id = "Company_WebsiteURL" placeholder = "https://technology.com" value="<?php echo $website; ?>" required><br>
                    <label for = "Industry_FocusedOn">Industry Focus On : </label><input type = "text" class = "box" name = "Industry_FocusedOn" id = "Industry_FocusedOn" placeholder = "Beauty/Electronics..." value="<?php echo $industry; ?>" required><br>
                </div>
        </fieldset>
        <br>    
        <fieldset>
            <legend>Representative Details</legend>
                <div class = "container">
                    <label for = "Rep_FirstName">First Name : </label><input type = "text" class = "box" name = "Rep_FirstName" id = "Rep_FirstName" placeholder = "Your company representative first name" value="<?php echo $firstName; ?>" required><br>
                    <label for = "Rep_LastName">Last Name : </label><input type = "text" class = "box" name = "Rep_LastName" id = "Rep_LastName" placeholder = "Your company representative last name" value="<?php echo $lastName; ?>" required><br>
                    <label for = "Rep_Designation">Designation : </label><input type = "text" class = "box" name = "Rep_Designation" id = "Rep_Designation" placeholder = "Your company representative designation" value="<?php echo $repDesignation; ?>" required><br>
                    <label for = "Rep_ContactNumber">Contact Number : </label><input type = "tel" class = "box" name = "Rep_ContactNumber" id = "Rep_ContactNumber" placeholder = "Your company representative phonenumber" value="<?php echo $repPhone; ?>" required><br>
                    <label for = "Rep_Email">E-mail : </label><input type = "email" class = "box" name = "Rep_Email" id = "Rep_Email" placeholder = "nurinsyrahsharifah122@gmail.com"  pattern = "[a-z0-9._%+-]+@.[a-z0-9.-]+\.[a-z]{2,3}" value="<?php echo $repEmail; ?>" required><br>
                </div>
        </fieldset>
        <br>
        <fieldset>
            <legend>Credentials</legend>
                <div class = "container">    
                    <label for = "Username">Change Username : </label><input type = "text" class = "box" name = "Username" id = "Username" placeholder = "Enter valid username" value="<?php echo $repUsername; ?>" required><br>
                    <label for = "User_Password">Change Password : </label><input type = "Password" class = "box" name = "User_Password" id = "pwd" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,10}" placeholder = "Enter valid password" value="<?php echo $repPassword; ?>" required><br>
                    <label for = "confopw">Confirmation Password : </label><input type = "Password" class = "box" name = "confopw" id = "cpwd" placeholder = "Enter confirmation password" required><br>
                </div>
        </fieldset>
    </form>

    <br>

    <div class="buttons">
        <div>
        <form action="save_update.php" method="post">
            <input type="hidden"  name="Customer_ID" value="<?php echo $id; ?>">
            <button type="submit" id="submit-save" name="update">Save Changes</button>
        </form>
        </div>
       
        <div>
            <a href="user_account.php">
            <input type="submit" value="Cancel" id="submit-cancel">
            </a>
        </div>

        <form action="delete.php" method="post">
            <input type="hidden" name="Customer_ID" value="<?php echo $id; ?>">
            <button type="submit" name="delete" id="submit-delete" onclick="return confirmDelete();">Delete Account</button>
        </form>

        <script>
            function confirmDelete() 
            {
                var result = confirm("Are you sure you want to delete your profile?");
                if (result) 
                {
                    return true;
                } 
                else 
                {
                    return false;
                }
            }
        </script>
    </div> 
    </center>
    
    <br><br>

    <?php include 'footer.php';?>

</body>
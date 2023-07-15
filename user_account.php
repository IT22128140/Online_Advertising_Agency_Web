<!--Nethsiluni A.S.-->
<!DOCTYPE html>
<html lan="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UNIQUE Advertising Agency-Profile</title>
    <link rel="stylesheet" type="text/css" href="css/user_account.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>

<body>

    <?php include 'config.php';?>
    <?php include 'header2.php';?>

    <?php


    session_start();
    
    

        if (isset($_SESSION['Customer_ID'])) 
        { 
            // Retrieve the user ID from the session
            $id = $_SESSION['Customer_ID'];

        
            //Get data from the database
            $query = "SELECT * FROM registered_user WHERE Customer_ID = '$id'";
            $result = mysqli_query($con, $query); //store the result of the query in a variable

            if ($result && mysqli_num_rows($result) > 0) //check if the result has data
            {
                while ($row = mysqli_fetch_assoc($result)) //loop through the data
                {
                    //store the data in variables
                    $companyName = $row['Company_Name'];
                    $streetNumber = $row['StreetNumber'];
                    $streetName = $row['SteetName'];
                    $city = $row['City'];
                    $province = $row['Province_OR_State'];
                    $country = $row['Country'];
                    $address = $streetNumber.','.$streetName.','.$city.','.$province.','.$country;
                    $phone = $row['Company_ContactNumber'];
                    $email = $row['Company_Email'];
                    $website = $row['Company_WebsiteURL'];
                    $industry = $row['Industry_FocusedOn'];

                    $firstName = $row['Rep_FirstName'];
                    $lastName = $row['Rep_LastName'];
                    $repName = $firstName.' '.$lastName;
                    $repDesignation = $row['Rep_Designation'];
                    $repPhone = $row['Rep_ContactNumber'];
                    $repEmail = $row['Rep_Email'];
                    $repUsername = $row['UserName'];
                }
            } 
            else 
            {
                echo "0 results";
            }
       }
        else
        {
            header("Location: login.php"); 
        }
        
        $pid = 1;

        $query1 = "SELECT * FROM proposal WHERE Proposal_ID = '$pid'";
        $result1 = mysqli_query($con, $query1);

        if ($result1 && mysqli_num_rows($result1) > 0) 
        {
            while ($row = mysqli_fetch_assoc($result1)) 
            {
                $target = $row['MainTargetAudience'];
                $budget = $row['ProjectMonthlyBudget'];
                $currency = $row['Currency'];
                $monthlyBudget = $budget.' '.$currency;  
            }
        } 
        else 
        {
            echo "0 results";
        }

        if(isset($_POST['logout']))
        {
            session_destroy();
            header('Location: login.php');
            exit();
        }

        mysqli_close($con);
    ?>

    <p class="profilehead"> PROFILE </p> 

    <div class="profile">
        <form class="company">
            <fieldset>
                <legend>Company Details</legend>
                <div class="details">
                    <label for="company_name">Company Name : </label> <label class="data"> <?php echo $companyName?> </label> <br> 
                    <label for="company_address">Company Address :</label> <label class="data"> <?php echo $address?> </label> <br>
                    <label for="company_phone">Company Phone : </label> <label class="data"> <?php echo $phone?> </label> <br>
                    <label for="company_email">Company Email : </label> <label class="data"> <?php echo $email?> </label> <br>  
                    <label for="company_website">Company Website : </label> <label class="data"> <?php echo $website?> </label> <br>
                    <label for="industry_fucused_on">Industry Focused On : </label> <label class="data"> <?php echo $industry?> </label> <br>
                </div>
            </fieldset>
        </form>
        <form class="representative">
            <fieldset>
                <legend>Representative Details</legend>
                <div class="details">
                    <label for="representative_name">Representative Name : </label> <label class="data"> <?php echo $repName?> </label> <br>
                    <label for="representative_designation">Representative Designation : </label> <label class="data"> <?php echo $repDesignation?> </label> <br>
                    <label for="representative_phone">Representative Phone : </label> <label class="data"> <?php echo $repPhone?> </label> <br>
                    <label for="representative_email">Representative Email : </label> <label class="data"> <?php echo $repEmail?> </label> <br> 
                    <div class="rep-username-setting">
                        <img src="./images/avatar1.png" alt="representative" class="rep">
                        <div>
                            <label for="representative_username">Username : </label> <label class="data"> <?php echo $repUsername?> </label> <br>
                            <div class="buttons">
                                <a href="membership_payment.php"  class="btn">
                                    <span><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                                    <span>Membership Payment</span>
                                </a>

                                <a href="service_payment.php"  class="btn">
                                    <span><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                                    <span>Service Payment</span>
                                </a>
                                
                            </div>
                            <br>
                            <div class="buttonss">
                                <a href="settings.php" class="btnn">
                                    <span><i class="fa fa-cog" aria-hidden="true"></i></span>
                                    <span>Settings</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
        <form class="projects">
            <fieldset>
                <legend>Projects</legend>
                <div class="project-details">
                    <label for="project1">Project 1 : </label>
                        <ul>
                            <li class="list"><label class="data"> <?php echo "Advertisement for : ".$target?></li>
                            <li class="list"><label class="data"> <?php echo "Monthly budget : ".$monthlyBudget?> </li>
                        </ul>
                    <label for="project2">Project 2 : </label> <br>
                        <ul>
                            <li class="list"><label class="data"> <?php echo "Advertisement for : -"?></li>
                            <li class="list"><label class="data"> <?php echo "Monthly budget : -"?> </li>
                        </ul>
                    <label for="project3">Project 3 : </label> <br>
                        <ul>
                            <li class="list"><label class="data"> <?php echo "Advertisement for : -"?></li>
                            <li class="list"><label class="data"> <?php echo "Monthly budget : -"?> </li>
                        </ul>
                    <label for="project3">Project 4 : </label> <br>
                        <ul>
                            <li class="list"><label class="data"> <?php echo "Advertisement for : -"?></li>
                            <li class="list"><label class="data"> <?php echo "Monthly budget : -"?> </li>
                        </ul>
                    <label for="project3">Project 5 : </label> <br>
                        <ul>
                            <li class="list"><label class="data"> <?php echo "Advertisement for : -"?></li>
                            <li class="list"><label class="data"> <?php echo "Monthly budget : -"?> </li>
                        </ul>
                </div>
            </fieldset>
        </form>
    
        <canvas id="progressChart"></canvas>
        <script src="js/user_account.js"></script>
    
    </div>

    <?php include 'footer.php';?>

</body>
</html>

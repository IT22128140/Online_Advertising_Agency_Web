<!--Dewpura D.A.M.M.-->
<?php

include 'config.php';

session_start();

if(isset($_POST['submit'])){


    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = md5($_POST['password']);

    $select = " SELECT * FROM admin WHERE username = '$username' && password = '$password' "; //read username and the password

    $result = mysqli_query($con, $select);
 
    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_array($result);

        $_SESSION['name'] = $row['name'];
        header('location:admin.php'); //redirects
 
    }else{
       $error[] = 'incorrect email or password!';
    }
 
 };

?>

<!DOCTYPE html>
<html lang = en>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width", intial-scale=1.0>
    <title>UNIQUE Advertising Agency - Admin Login</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>
    
<div class="form-container">
    <form action="" method="post">
        <h3>Admin Login</h3>
        <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
        <input type="username" name="username" required placeholder="Enter your Username">
        <input type="password" name="password" required placeholder="Enter your Password">
        <input type="submit" name="submit" value="Login" class="form-btn">
            <p>Don't have an account? <a href="adminreg.php">Register now</a></p>
    </form>
</div>
</body>
</html>
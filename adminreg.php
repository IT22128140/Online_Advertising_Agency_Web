<!--Dewpura D.A.M.M.-->
<?php
    include 'config.php';
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $username = mysqli_real_escape_string($con,$_POST['username']);
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);
        if($password == $cpassword){
            $sql = "SELECT * FROM admin WHERE username='$username'";
            $result = mysqli_query($con, $sql);
            if(!$result->num_rows > 0){
                $sql = "INSERT INTO admin (name, username, password)
                        VALUES ('$name', '$username', '$password')";
                $result = mysqli_query($con, $sql);
                if($result){
                    echo "<script>alert('User Registration Completed.')</script>";
                    $name = "";
                    $username = "";
                    $_POST['password'] = "";
                    $_POST['cpassword'] = "";
                }else{
                    echo "<script>alert('Woops! Something Wrong Went.')</script>";
                }
            }else{
                echo "<script>alert('Woops! username Already Exists.')</script>";
            }
            
        }else{
            echo "<script>alert('Password Not Matched.')</script>";
        }
        
    }
?>
<!DOCTYPE html>
<html lang = en>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width", intial-scale=1.0>
    <title>UNIQUE Advertising Agency - Admin Register</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>
    
<div class="form-container">
    <form action="" method="post">
        <h3>Admin Registration</h3>
        <input type="text" name="name" required placeholder="Enter your name">
        <input type="username" name="username" required placeholder="Enter your Username">
        <input type="password" name="password" required placeholder="Enter your Password">
        <input type="password" name="cpassword" required placeholder="Confirm your Password">
        <input type="submit" name="submit" value="register now" class="form-btn">
            <p>Already have an account? <a href="admin_login.php">Login now</a></p>
    </form>
</div>
</body>
</html>
<!--Dewpura D.A.M.M.-->
<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['name'])){
   header('location:admin_login.php');
}

?>
<!DOCTYPE html>
<html lang = en>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width", intial-scale=1.0>
    <title>Admin Page</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>

    <div class="container">
        <div class="content">
            <h3><span>Admin</span></h3>
            <h1>Welcome! <span><?php echo $_SESSION['name'] ?></span></span></h1>
            <p>Manage the website here</p>
            <a href="admin_logout.php" class="btn">Logout</a>
            <a href="faqadmin.php" class="btn">FAQ</a>
        </div>
    </div>
</body>
</html>
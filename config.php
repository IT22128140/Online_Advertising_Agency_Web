<!--Dewpura D.A.M.M.-->
<?php

// Establish the database connection
$con = new mysqli("localhost", "root", "", "unique_advertising_agency");

// Check the connection
if($con->connect_error){
    die("Connection failed: " . $con->connect_error);
}

?>
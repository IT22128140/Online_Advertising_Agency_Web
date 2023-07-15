<?php
include 'config.php';
session_start();

if (!isset($_SESSION['Customer_ID'])) {
   header('location:login.php');
   exit();
}

$id = $_SESSION['Customer_ID'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $con->prepare("DELETE FROM registered_user WHERE Customer_ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo '<script> alert("Profile deleted successfully.");</script>';
    } else {
        echo '<script> alert("Profile not found or deletion failed.");</script>';
    }
    $stmt->close();
    $con->close();
    header("Location: registration.php");
    exit();
} else {
    header("Location: registration.php");
    exit();
}
?>

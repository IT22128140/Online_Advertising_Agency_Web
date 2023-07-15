
<?php include 'config.php'; ?>

<?php

// Dewpura D.A.M.M.


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question_id = $_POST["question_id"];

    $stmt = $con->prepare("DELETE FROM q_and_a WHERE question_ID = ?");
    $stmt->bind_param("i", $question_id);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        echo '<script> alert("Question deleted successfully.");</script>';
  
    } else {
        echo '<script> alert("Question not found or deletion failed.");</script>';
    }
    header("Location:faq.php ");
    exit();
}

$con->close();
?>
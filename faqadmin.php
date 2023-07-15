<!--Dewpura D.A.M.M. PHP part-->
<!--Nethsiluni A.S. CSS, HTML, Java Script-->
<!DOCTYPE html>
<html lan="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UNIQUE Advertising Agency-FAQ Admin</title>
    <link rel="stylesheet" type="text/css" href="css/faq.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@500&display=swap" rel="stylesheet"> 
</head>

<body>


    <?php include 'config.php';?>

    <?php
include 'config.php';

session_start();

if(!isset($_SESSION['name'])){
   header('location:admin_login.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $faqID = $_POST['faq_id'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    $sql = "UPDATE faq SET faq_question=?, faq_answer=? WHERE faq_ID=?";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssi", $question, $answer, $faqID);

    if ($stmt->execute()) {
        echo '<script> alert("Data updated successfully.")</script>';
    } else {
        echo '<script> alert("Error: '.$stmt->error.'")</script>';
    }

    $stmt->close();
}
?>


<center>
    <div class="faq">   
        <h1>FAQ</h1>
    </div>


    <center>
    <form method="POST">
        <div class="container">
            <?php
            $sql = "SELECT faq_ID, faq_question, faq_answer FROM faq";
            $result = $con->query($sql);


            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $faqID = $row["faq_ID"];
                    $question = $row["faq_question"];
                    $answer = $row["faq_answer"];
                    ?>
                    <div class="ques">
                        <form action="" method="POST">
                        <input type="hidden" name="faq_id" value="<?php echo $faqID; ?>">
                        <input type="text" name="question" value="<?php echo $question; ?>">
                        <textarea name="answer"><?php echo $answer; ?></textarea>
                        <input type="submit" value="Update">

                        </form>
                    </div>
                    <?php
                }
            } else {
                echo "No FAQs found.";
            }
            ?>
        </div>
    </center>

</center>

</body>
</html>

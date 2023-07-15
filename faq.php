<!DOCTYPE html>
<html lan="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UNIQUE Advertising Agency-FAQ</title>
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

    <?php include 'header.php';?>

    <?php include 'config.php';?>

    <?php
    $sql = "SELECT faq_question, faq_answer FROM faq";
    $result = $con->query($sql);
    $questions = $result->fetch_all(MYSQLI_ASSOC);
    $totalQuestions = count($questions);
    $questionsPerSlide = 3;
    $totalSlides = ceil($totalQuestions / $questionsPerSlide);
?>

<div class="slideshow-container">
        <?php for ($i = 0; $i < $totalSlides; $i++) { ?>
            <div class="slide <?php echo $i === 0 ? 'active' : ''; ?>">
                <?php
                $start = $i * $questionsPerSlide;
                $end = min($start + $questionsPerSlide, $totalQuestions);
                for ($j = $start; $j < $end; $j++) {
                    $question = $questions[$j]['faq_question'];
                    $answer = $questions[$j]['faq_answer'];
                ?>
                <div class="ques-ans-container">
                <div class="ques">
                    <p class="question"><?php echo $question; ?></p>
                    <hr>
                    <p class="answer"><?php echo $answer; ?></p>
                </div>
                <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="number-bar">
        <?php for ($i = 0; $i < $totalSlides; $i++) { ?>
            <span class="<?php echo $i === 0 ? 'active' : ''; ?>" onclick="showSlide(<?php echo $i; ?>)"></span>
        <?php } ?>
    </div>

    <br><br><br>

    <hr id="hr1">

    <br><br><br>
    <form class="question" method="post">
    <div class="contqa">
        <div class="qa">
            <p class="hques">Have any questions? Ask Us...</p>
            <hr>
            <textarea name="question1" class="text" placeholder="Type here..."></textarea>
            <input type="submit" value="Submit" id="submit">
        </div>
    </div> 
    </form>
    <form action="question_delete.php" method="POST" class="ques-del">
        <label for="question_id" class="question_ID">Question ID:</label>
        <input type="text" name="question_id" id="question_id">
        <input type="submit" value="Delete Question" id="delete-question">
    </form>

    <br><br>


    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var slides = document.querySelectorAll('.slide');
        var dots = document.querySelectorAll('.number-bar span');

        function showSlide(slideIndex) {
            for (var i = 0; i < slides.length; i++) {
                slides[i].classList.remove('active');
                dots[i].classList.remove('active');
            }
            slides[slideIndex].classList.add('active');
            dots[slideIndex].classList.add('active');
        }

        dots.forEach(function(dot, index) {
            dot.addEventListener('click', function() {
                showSlide(index);
            });
        });

        // Show the first slide initially
        showSlide(0);
    });
    </script>

    <?php include 'footer.php';?>

</body>
</html>

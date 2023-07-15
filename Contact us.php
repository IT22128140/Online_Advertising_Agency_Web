<!--Pathirana I.K.R -->

<?php

 include 'config.php';

?>
 
   <?php


  
    if(isset($_POST['submit']))  
    {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email =$_POST['email'];
        $message=$_POST['message'];
        
        
       
        $sql = "INSERT INTO contactus (Name,Phone_number,Email,Message) VALUES ('$name','$phone','$email','$message') ";
        
        $result = mysqli_query($con,$sql);

        if($result)
        {echo " <script>alert('Thank you for your message! We will get back to you soon.');</script>";
          }
        else 
        {echo "Record is not added";
        }
  
    
      }
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIQUE advertising-contact us</title>


    <link rel="stylesheet" href="css/contactus.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
    
    
   <script src="./js/submitForm.js"></script>
    
</head>
<body>
  

 
    <?php include 'header.php'; ?>


    <section class="contact">
        <div class="CS">
        <h1>Contact us</h1>
     
     
        <p><b>Question? <br>We'd love to hear from you.Send us a message and we'll respond as soon as posible.</b></p>
        </div>

        <form  id="cfrm"  action="Contact us.php" method="POST"  > 
          
             
          <input type="text" name="name"  class="frm" placeholder="Your name" required >
              
          <input type="tel" name="phone"   class="frm" placeholder="Your phone number" required>                  
         
          <input type="email" name="email"   class="frm" placeholder="Your email" required>
              <br><br>
          <textarea name="message"     placeholder="Message"></textarea>     
           <br>
          <input type="submit" name="submit" class="button" id="btn" >
           
  </form>
       
   

    </section>

    <div class="Mq">
        <h2>More questions:<i class="fa fa-hand-o-down" aria-hidden="true"></i></h2>
       
        <a href="faq.php" class="button">FAQ</a> 
    
     </div>
     <br><br>
     <div class="CB">
    
        <h2>Contact & Address :-</h2>
        <br>
        <div class="CAinfo">
             <h3><i class="fa fa-phone-square" aria-hidden="true"></i>Phone:- 011-56767867</h3>
             <br>
             <h3><i class="fa fa-envelope" aria-hidden="true"></i>E-mail:- uniqueadvertising@gamil.com </h3>
             <br>
             <h3><i class="fa fa-fax" aria-hidden="true"></i>Fax:-011-56767687</h3>
        </div>
        <br>
   
        <P><i class="fa fa-location-arrow" aria-hidden="true"></i>
           248,<br>
           Robart st.,<br>
           Colombo-5.</P>
           <div class="a">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1332.666906690272!2d79.8707581659289!3d6.888665033750702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25bd260b4fa11%3A0xf580e12fb12d21f3!2sColombo%2005%2C%20Colombo!5e0!3m2!1sen!2slk!4v1685528341356!5m2!1sen!2slk" width="250" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
       </div>
       </div>
    


<?php include 'footer.php'; ?>

</body>
</html>
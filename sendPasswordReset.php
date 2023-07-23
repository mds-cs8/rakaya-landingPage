<!-- here script for generate token and store it DB 
   , the message conent that will be send to email 

-->


<?php

//value of email inside submited form

$email = $_POST["email"];

// get random token ->convert it to hex ->use this in url
$token = bin2hex(random_bytes(16) );

// hash the token and it will produce 64character
$token_hash = hash("sha256", $token );

$expiry = date( "Y-m-d H:i:s"  , time() + 60 *30 );  // the token valid for 30 minute

$mysqli = require __DIR__ . "/conn-db.php";   //get the DB

//save token to DB 
$sql = "UPDATE user
        SET reset_token_hash = ?,
        reset_token_expires_at = ?
        WHERE email = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sss", $token_hash , $expiry , $email );
$stmt->execute();

//check if the email there then the message of email
if($mysqli->affected_rows)
{
$mail = require_once __DIR__ . "/send-email.php";
$mail->setFrom("noreply@exapmle.com");
$mail->addAddress($email);
$mail->Subject = "Password Reset"; 
$mail->Body = <<<END

Click <a href="localhost/rakaya2/rakaya-landingPage/reset-password.php?token=$token">here</a> 
to reset your password.

END;


//code handle sending message to user email 
    try{
        $mail->send();



    }catch(Exception $e)
      {
          echo"Messsage could not be  send  .Mailer error: {$mail->ErrorInfo}";
      }



}    //end if



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> password</title>

    <!-- ui library >> tailwend -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <!-- animation library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- custtom css -->
    <link rel="stylesheet" href="login.css">

</head>


<body>

    <section>

        <div class="loginBox1">

            <div data-aos="fade-up" data-aos-duration="1000" class="loginBox2">

                <!-- logo -->
                <div class="aboveLogin">
                    <a href="index.php">

                        <img src="./assets/ركايا_full_.png" alt="rakaya logo">


                    </a>

                </div>

                <!-- reset form -->
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class=" font-medium  text-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white"> عزيزنا العميل</h1>
                    <h2
                        class="  text-center text-xl  leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                           بإمكانك الآن إعادة تعيين  كلمة مرور جديدة لحسابك  <br>  عبر بريدك الإلكتروني      
                          
                    </h2>


                </div>
            </div>
        </div>

    </section>


    <!-- flowbite script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>

    <!-- javascript library link -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- initialize AOS library script -->
    <script>
        AOS.init();
    </script>

</body>

</html>








    
</body>





</html>
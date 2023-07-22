<!-- here script to process the resetpassword -->


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

//check if the email there
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



    try{
        $mail->send();



    }catch(Exception $e)
      {
          echo"Messsage could not be  send  .Mailer error: {$mail->ErrorInfo}";
      }



}    //end if


echo "message sent , please check your inbox";
header('location:index.php');


?>

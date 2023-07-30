<!-- processing input -->

<?php

if(isset($_POST['contctFormSubmit']))
{
  
include 'conn-db.php';
 
   $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);

   $error="";
   $foundEmail="";

   // validate email
   if(empty($email)){
    $error="يجب كتابة البريد الاكترونى";
   }elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
    $error="البريد الاكترونى غير صالح";
   }
  
   $stm="SELECT email FROM user WHERE email ='$email' ";
   $q=$conn->prepare($stm);
   $q->execute();
   $data=$q->fetch();
   
   if(!$data){
    $foundEmail= "لا يوجد حساب بهذا البريد الالكتروني";
   
    $validationPassed = false;

    }
    else{
        $validationPassed = true;


                                    
                            //values inside submited form

                            $email = $_POST["email-contactUs"];
                            $topicEmail = $_POST["topic-contactUs"];
                            $contentEmail = $_POST["message-contactUs"];



                            $mail = require_once __DIR__ . "/send-email.php";
                            $mail->setFrom("noreply@exapmle.com");
                            $mail->addAddress($email);
                            $mail->Subject =  $topicEmail ; 
                            $mail->Body =<<<END
                                     
                                      $contentEmail 

                            END;


                            //code handle sending message to user email 
                                try{
                                    $mail->send();
                                    echo "success";



                                }catch(Exception $e)
                                {
                                    echo"Messsage could not be  send  .Mailer error: {$mail->ErrorInfo}";
                                }



             }    //end else
                 


  


  
}//end if 

?>

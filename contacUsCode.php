<!-- here processing the request to send the form to email  -->
<?php

if($_SERVER['REQUEST_METHOD'] == "POST")
{     
    
    $subject = test_input($_POST["topic-contactUs"]);
    $message = test_input($_POST["message-contactUs"]);
    $email = filter_var(trim($_POST["email-contactUs"]) , FILTER_SANITIZE_EMAIL);


   // Check the data that will be sent to the mailer
   if (empty($subject) || empty($message) || empty($email)) {
    http_response_code(400);
    print json_encode(['error' => 1,'msg' =>"error in the enterd data , insert write data"]);
   }
 

// recipient email address
// $recipient = "rakayatech@gmail.com";
$recipient = $email;

// set email subject
$subject =   $subject;

// build email conent
$email_content = "Email: $email\n\n";
$email_content .= "Message:\n$message\n";
$email_headers = "From: <$email>";

// send the email 
if( mail($recipient,$subject,$email_content ,$email_headers ))
{
         http_response_code(200);
         print json_encode( ['error'=>0 ,'msg' =>"thanks , your message has been sent"] );

} 
// if the email doesnot sent it will excute 
else
{
    http_response_code(500);
    print json_encode( ['error'=>1 , 'msg' =>"there is a mistack during sending the message"] );


}



}
// END IF
else
{
    http_response_code(403);
    print json_encode( ['error'=>1 , 'msg' =>"there is a problem , please , try again "] );


}


// function validate the data
function test_input($data)
{
    $data = trim($data);
    $data=filter_var($data, FILTER_SANITIZE_STRING);
    $data=str_replace(array("\r","\n"),array(" ", " "),$data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return  $data;

}
 


?>

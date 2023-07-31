<?php

session_start();
include 'conn-db.php';

if (!$conn) {
    echo 'error: ' . mysqli_connect_error();
}



if (isset($_POST["topiccontactUs"]))
 {  
 
// $topic = mysqli_real_escape_string($mysqli, $_POST["topiccontactUs"]); 
// $message  = mysqli_real_escape_string($mysqli, $_POST["messagecontactUs"]  ); 
// $email =mysqli_real_escape_string($mysqli,$_POST["emailcontactUs"]) ; 

$topic      =  filter_var($_POST["topiccontactUs"],  FILTER_SANITIZE_STRING);
$message    =  filter_var($_POST["messagecontactUs"],  FILTER_SANITIZE_STRING);
$email   =  filter_var($_POST["emailcontactUs"],  FILTER_SANITIZE_EMAIL);

// $topic = $_POST["topiccontactUs"]; 
// $message =  $_POST["messagecontactUs"] ;
// $email =$_POST["emailcontactUs"] ; 

$name=$_SESSION['user']['name'];

// mysqli_query($mysqli,  "INSERT INTO usermessages (email , subject , messageContent , name ) VALUES ('".$email."','".$topic."','".$message."' , '".$name."')");
    $stm="INSERT INTO usermessages (email , subject , messageContent , name ) VALUES ('".$email."','".$topic."','".$message."' , '".$name."')";
    // $stm="INSERT INTO usermessages (email , subject , messageContent , name ) VALUES ('$email','$topic','$message' , '$name')";

    // $conn->prepare($stm)->execute();
    $res= $conn->prepare($stm);
    $res->execute();

    if($res)
    {
        echo "message saved";
    }
    else{
        echo "notttt saved";
    }

}


?>
<?php


session_start();

include 'conn-db.php';

$userId=   $_SESSION['user']['id']; //get user email




//update code
$n= $_POST['name1'];
$hashPass= password_hash($_POST["password"], PASSWORD_DEFAULT);
$e= $_POST['email'];
$phoneN= $_POST['phone'];


$sql = "UPDATE user
SET name = '$n',
    email = '$e',
    phoneNumber = '$phoneN',
    password = '$hashPass'
WHERE id = '$userId'";


    $stmt = $conn->prepare($sql);
    $stmt->execute();
    //check if it work
    if($stmt){
        echo "success";
      
    }
    else{
        echo "failure";
    }

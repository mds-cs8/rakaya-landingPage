<?php

$dbHost="localhost";
$dbName="rakaya";
$dbUser="root";
$dbPass="";


try
{
  $conn = new PDO("mysql:host=$dbHost;dbName =$dbName", $dbUser , $dbPass );
  echo 'success';
}catch(Exception $e)
{
   echo $e->getMessage();
   exit();
}






// $mysqli = new mysqli(hostname:$dbHost,
//                     username:$dbUser,
//                     password:$dbPass,
//                     database:$dbName
                    
// );

// // if there is error display this message
// if($mysqli->connect_errno)
// {
//     die("connection error:  " . $mysqli->connect_error );
// }
// else{
    
//   echo "done";
// }


// return $mysqli;


?>
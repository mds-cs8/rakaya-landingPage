<?php
$dbHost="localhost";
$dbUser="root";
$dbPass="";
$dbName="rakaya2";


try{
    $conn= new PDO("mysql:host=$dbHost;dbname=$dbName",$dbUser,$dbPass);

     
   $mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
     return $mysqli;

}catch(Exception $e){
    echo $e->getMessage();
    exit();
}
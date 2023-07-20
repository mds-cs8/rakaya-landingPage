<!-- here script to process the resetpassword -->


<?php

//value of email inside submited form

$email = $_POST["email"];

// get random token ->convert it to hex ->use this in url
$token = bin2hex(random_bytes(16) );

// hash the token and it will produce 64character
$token_hash = hash("sha256",$token );




?>

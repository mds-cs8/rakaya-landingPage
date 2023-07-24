<?php

$token = $_POST["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/conn-db.php";   //get the DB

$sql = "SELECT * FROM user
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    header("Location: tokenInfoPage.php");
    exit();

}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    header("Location: tokenInfoPage.php");
    exit();

}

//update the password in DB 
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "UPDATE user
        SET password = ?,
            reset_token_hash = NULL,
            reset_token_expires_at = NULL
        WHERE id = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("ss", $password_hash, $user["id"]);

$stmt->execute();

?>



<!-- confirm reset password page (process successful or not )  -->


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password </title>

    <!-- ui library >> tailwend -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <!-- animation library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- custtom css -->
    <link rel="stylesheet" href="login.css">

      <style>
          
          .loginBox2 img{
            margin-top:3rem;
            width: 60%;
             height: 80%;
          }

          .loginBox2 h1{
            color: #523623;
            font-size: 25px;
            margin-top:3rem;
            margin-bottom:2rem;
          }

      </style>



</head>

<body>
      
         <section >

           <center>
         <div  data-aos="fade-up" data-aos-duration="1000" class="loginBox2 ">
                
          
                  <a href="index.php">

                  <img src="./assets/ركايا_full_.png" alt="rakaya logo" >
                 
                </a>
                
                <h1>تم تحديث كلمة المرور بنجاح </h1>

                
                <a href="login.php"  >
                
                 <small >     <h2>  يمكنك الآن <strong>تسجيل الدخول</strong>  </h2>     </small> 

                </a>

          </div>
          </center>

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
<?php

$token = $_GET["token"];

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
    die("token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rakaya</title>

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

  <section class="signupSectionClass">
   
  <div class=" w-full  , loginBox1">

        <div data-aos="fade-up" data-aos-duration="1000" class="h-20 w-20 , loginBox2 ">

    <h1  class="text-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">   إعادة تعيين كلمة المرور</h1>

    <form method="post" action="process-reset-password.php">
       

       <div class= "password">
    
        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
         
        <div class="pass1" >

        <label for="password" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">كلمة المرور الجديدة</label>
        <input type="password" id="password" name="password" placeholder="••••••••" required class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-20 p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs">
        </div>


        <div class="pass2">
        <label for="repassword" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">تأكيد كلمة المرور</label>
        <input type="password" id="repassword"
               name="repassword" placeholder="••••••••" required  class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-12 p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs" >
        
               <small id="repassword_msg">
        </div>

        <button type="submit" id="sign-btn" name="submit" class="text-center  mt-8 w-12  items-center   h-12 text-gray-900 font-medium rounded-lg text-sm px-2 py-2 text-center">ارسل</button>

        </div>




    </form>
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

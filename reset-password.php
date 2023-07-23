<?php

//here code check if the token expired or not 

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
    header("Location: tokenInfoPage.php");
    exit();
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    // die("token has expired");
    header("Location: tokenInfoPage.php");
      exit();
}




?>



<!-- rest password page  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>

    <!-- ui library >> tailwend -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <!-- animation library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- custtom css -->
    <link rel="stylesheet" href="reset-password.css">

</head>


<body>

  <section>
   
    <div data-aos="fade-up" data-aos-duration="1000" class="box">

    <h1  class=" mt-8    text-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">   إعادة تعيين كلمة المرور</h1>
       

    <!-- form -->
    <form method="post" action="process-reset-password.php">
       

       <div class= "password">
    
        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>" class="hidden">
         
        <div class="pass1" >

        <label for="password" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">كلمة المرور الجديدة</label>
        <input type="password" id="password" name="password" placeholder="••••••••" required class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block  p-2.5 dark:placeholder-gray-400 dark:text-white,  inputBoxs">
        <small id="password_msg">
                                    كلمة المرور يجب أن <strong>لا تقل عن 6 أرقام</strong> ( 1 حرف صغير ,1 حرف كبير, رمز
                                    وأرقام)

                                </small>
        </div>


        <div class="pass2">

        <label for="repassword" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">تأكيد كلمة المرور</label>
        <input type="password" id="repassword"
               name="repassword" placeholder="••••••••" required  class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block  p-2.5 dark:placeholder-gray-400 dark:text-white , inputBoxs" >
        
               <small id="repassword_msg">

        </div>

        <button type="submit" id="reset-btn" name="submit" class="text-center  mt-8   items-center  text-gray-900 font-medium rounded-lg text-sm px-2 py-2  text-center">ارسل</button>

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


<script src="./resetValidation.js"></script>


</body>

</html>

<?php


session_start();
if(isset($_SESSION['user']))
{   
//    $userEmail = $_SESSION['email'];
    header('location:index.php');
    exit();
}



if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
    $mail = $_COOKIE['email']; 
    $pass = $_COOKIE['password']; 
}else{
    $mail = "";
    $pass = "";
}

if(isset($_POST['submit'])){
    
 include 'conn-db.php';
   $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
   $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    
    // create cookie
   if(isset($_POST['remember'])){
    setcookie("email" , $_POST['email'], time() + (60 * 60 * 24));
    setcookie("password" , $_POST['password'], time() + (60 * 60 * 24));
   }

   //validate and insert-----------------------------------------------------

   $errors=[];
   

   // validate email
   if(empty($email)){
    $errors[]="يجب كتابة البريد الاكترونى";
   }


   // validate password
   if(empty($password)){
        $errors[]="يجب كتابة  كلمة المرور ";
   }



   // insert or errros 
   if(empty($errors))
   {
   
    $stm="SELECT * FROM user WHERE email ='$email' ";
    $q=$conn->prepare($stm);
    $q->execute();
    $data=$q->fetch();

    if(!$data){
       $errors[] = "لا يوجد حساب لهذا البريد الالكتروني";
    }else{
        
         $password_hash=$data['password']; 
         
         if(!password_verify($password,$password_hash)){
            $errors[] = "خطأ في تسجيل الدخول , فضلاً تأكد من كلمة المرور";
         }
         else{
            $_SESSION['user']=[
                "name"=>$data['name'],
                "email"=>$email,
              ];
            header('location:index.php');       //navigate tp this page if log-in successful

         }
    }
     
    
   }
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

    <section>

        <div class="loginBox1">

            <div data-aos="fade-up" data-aos-duration="1000" class="loginBox2">

                <!-- logo -->
                <div class="aboveLogin">
                    <a href="index.php">

                        <img src="./assets/ركايا_full_.png" alt="rakaya logo">


                    </a>

                </div>

                <!-- log in form -->
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

                    <h1
                        class="text-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        تسجيل الدخول
                    </h1>

                    <form class="space-y-4 md:space-y-6" action="login.php" method="POST" >

                    <?php 
                             if(isset($errors)){
                                     if(!empty($errors)){
                                       foreach($errors as $msg){
                                        echo   " <strong> <small > $msg <br> </small> </strong> "   ;

                                    }
                                       }
                                               }
                     ?>

                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">الايميل</label>
                            <input type="email" name="email" placeholder="name@google.com" id="email" class="inputBoxs" value="<?php echo $mail?> "
                                required>
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">كلمة المرور</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="inputBoxs " required value="<?php echo $pass?>">
                        </div>
                        
                        <div class="flex items-center justify-between  ">

                            <div class="flex items-start ">

                                <div class="flex items-center h-5 checked:border-gray-900 , changecheckbox  ">
                                    <input id="remember" name="remember" aria-describedby="remember" type="checkbox" class=""
                                        >
                                </div>

                                <div class="mx-1 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300"> تذكرني </label>
                                </div>

                            </div>
                            <a href="forgot-password.php"
                                class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">نسيت
                                كلمة المرور</a>
                        </div>
                        <button type="submit" name="submit"
                            class="w-full h-12 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center border border-gray-300">تسجيل
                            الدخول</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            لم تسجل بعد ؟ <a href="signUp.php"
                                class="font-medium text-gray-900 hover:underline dark:text-primary-500">سجل الآن</a>
                        </p>
                    </form>
                </div>
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
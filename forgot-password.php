<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rakaya-forgot password</title>

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

                <!-- reset form -->
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

                    <h1
                        class="text-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        ادخل البريد الإلكتروني لإستعادة كلمة المرور
                    </h1>

                    <form class="space-y-4 md:space-y-6" action="sendPasswordReset.php" method="POST" >

                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">الايميل</label>
                            <input type="email" name="email" placeholder="name@google.com" id="email" class="inputBoxs" 
                                required>
                        </div>

                 
                        <button type= "submit" name="submit" class="w-full h-12 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center border border-gray-300">
                            أرسل</button>


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








    
</body>





</html>
<!-- processing -->
<?php


session_start();

include 'conn-db.php';

$userId = 0;
$name = "";
$email = "";
$phone = "";
$password = 0;
$gender = "";
$userType = "";

// get user id
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $_SESSION['id'] =   $userId;


    //fetch data
    $sql = "SELECT * FROM user WHERE id = '$userId' ";
    $res = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($res);

    if ($row) {
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phoneNumber'];
        $password = $row['password'];
        $gender = $row['gender'];
        $userType = $row['userType'];
    } else {
        echo "nooo fetch";
    }
 

   
    $_SESSION['testEmail'] = $email ;

    
}

?>



<!--send form  -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ui library >> tailwend -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet">
    <!-- custtom css -->
    <link rel="stylesheet" href="adminAdd-adminEdite.css">
    <!-- animation library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">

    <title>RAKAYA | AdminEdit</title>

</head>

<body>


    <!-- navbar section -->
    <nav class="fixed w-full z-20 top-0 left-0 ">

        <!-- whole div in navbar -->
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 wholeDiv">

            <!-- company logo in navbar -->
            <a href="./index.php" class="flex items-center ">
                <img src="./assets/ركايا_full_.png" class=" h-20 sm:h-20 mr-3 , logoNav" alt="Rakaya Logo">
            </a>

            <!-- 1div  log-in link and button in navbar -->
            <div class="flex md:order-2 ">
                <?php
                if (isset($_SESSION['user'])) {
                ?>

                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="w-10 h-10 rounded-full overflow-hidden">
                        <img src="./usersImg/<?php echo ($_SESSION['user']['img']) ?>" alt="" class="w-full h-full ">
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-40  dark:bg-gray-700 dark:divide-gray-600 ml-10">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="./profile2.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">الحساب
                                    الشخصي</a>
                            </li>
                            <?php if ($_SESSION['user']['userType'] === "admin") { ?>
                                <li>
                                    <a href="./dashboard.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        لوحة التحكم</a>
                                </li>
                            <?php } ?>
                            <li>

                                <a href="./logout.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">تسجيل
                                    الخروج</a>
                            </li>
                        </ul>

                    </div>




                <?php
                } else {
                ?>

                    <a href="login.php" class="login text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-1 py-2 text-center mr-3 md:mr-0 ml-3">تسجيل
                        الدخول
                    </a>

                <?php

                }

                ?>
                <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 mr-3" aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>

          

    </nav>




    <!-- edite form -->
    <div data-aos="fade-up" data-aos-duration="1000" class="signupBox2 shadow-lg ">

        <div class="  p-4 space-y-4 md:space-y-6 sm:p-8">

            <h1 class="text-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                تحديث البيانات
            </h1>

            <form class="form" action="adminEditCode.php" method="POST" enctype=multipart/form-data>

                <!-- name -->
                <div class="name">

                    <div class="name1">

                        <label for="name1" class="mb-4 text-sm font-medium  text-gray-900  dark:text-white">الاسم
                        </label>

                        <input type="text" name="name1" id="name1" class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-full p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs" placeholder="سارة" value="<?php echo $name ?>">
                        <small id="name1_msg"></small>

                    </div>
                    <div class="uploadImg ">

                        <label class="inline mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">تغيير الصورة</label>
                        <input id="file_input" type="file" name="UserImg" class="w-[100%] h-10 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG,
                            JPG or GIF (MAX. 800x400px).</p>
                    </div>


                </div>
                <!-- email -->
                <div class="email-phone">
                    <div class="email">
                        <label for="email" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">الايميل</label>
                        <input type="email" name="email" id="email" class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-full p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs" placeholder="name@google.com" value="<?php echo $email ?>">

                        <small id="email_msg"></small>

                      <?php  if(isset($_SESSION["emailCheckResult"]))
                      {echo  $_SESSION["emailCheckResult"] ;}
                       ?>

                    </div>

                    <!-- phone number -->
                    <div class="phone">
                        <label for="phone" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">رقم
                            الهاتف</label>
                        <input type="tel" id="phone" name="phone" class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-full p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs" value="<?php echo $phone ?>">
                        <small id="phone_msg"></small>

                    </div>
                </div>

                <!-- password -->
                <div class="password">

                    <!-- pass1 -->
                    <div class="pass1">
                        <label for="password" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">كلمة
                            المرور</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-full p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs" value=" <?php echo $password ?>  ">

                        <small id="password_msg">
                            كلمة المرور يجب أن <strong>لا تقل عن 6 أرقام</strong> ( 1 حرف صغير ,1 حرف كبير, رمز
                            وأرقام)

                        </small>

                    </div>

                    <!-- pass2 -->
                    <div class="pass2">
                        <label for="repassword" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            تأكيد كلمة المرور
                        </label>
                        <input type="password" name="repassword" id="repassword" placeholder="••••••••" class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-full p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs" value=" <?php echo $password ?> " >
                        <small id="repassword_msg"></small>
                    </div>



                </div>

                <!-- gender & userType -->
                <div class="genderAndUserType">

                    <!-- gender -->
                    <div class="inline-flex flex gender ">

                        <label for="gender" class=" ml-3 mb-2 text-sm font-medium text-gray-900 dark:text-white">الجنس</label>

                        <input type="radio" id="female" name="gender" value="female" class="ml-2 border border-gray-300" <?php echo $gender == "female" ? 'checked' : '' ?> >
                        <label for="female">أنثى</label>

                        <input type="radio" id="male" name="gender" value="male" class="mr-3   ml-2 bg-gray-50 border border-gray-300" <?php echo $gender == "male" ? 'checked' : '' ?>>
                        <label for="male">ذكر</label>

                    </div>



                    <!-- user type -->
                    <div class=" inline-flex flex userType">

                        <label for="users" class=" ml-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            حدد الفئة </label>

                        <select name="users" id="users" size="1" class=" py-px  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 , users" value="<?php echo $userType ?>">

                            <option value="Developer" <?php echo $userType == "Developer" ? 'selected' : '' ?>>مطور</option>
                            <option value="Consultant" <?php echo $userType == "Consultant" ? 'selected' : '' ?>> الاستشارات</option>
                            <option value="Clint" <?php echo $userType == "Clint" ? 'selected' : '' ?>>عميل</option>
                            <option value="Intern" <?php echo $userType == "Intern" ? 'selected' : '' ?>>متدرب</option>
                            <option value="admin" <?php echo $userType == "admin" ? 'selected' : '' ?>>مسؤول (ADMIN)</option>
                        </select>

                    </div>

                </div>


                <!-- display error messages -->
                <?php
                if (isset($errors)) {
                    if (!empty($errors)) {
                        foreach ($errors as $msg) {

                            echo   " <strong > <small > $msg </small> </strong> ";
                        }
                    }
                }
                ?>


                <small id="validate_msg"> </small>
                <!-- submit -->
                <button type="submit" id="save" name="save" class="saveBtn , w-full h-12 text-gray-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center">تحديث</button>

            </form>
        </div>
    </div>


    <!-- flowbite script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>

    <!-- javascript library link -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- initialize AOS library script -->
    <script>
        AOS.init();
    </script>

    <script src="./editeProfile.js"></script>

</body>

</html>
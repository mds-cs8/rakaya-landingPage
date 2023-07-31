<?php
session_start();
// store the value of session inside javascript to use the session value in ajax code (:
echo '<script>';
echo 'var statusMessage = "' . $_SESSION['status'] . '";';
echo 'var statusCode = "' . $_SESSION['status_code'] . '";';
echo '</script>';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ui library >> tailwend -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet">

    <!-- custtom css -->
    <link rel="stylesheet" href="style.css">

     <!-- JQuery library  -->
     <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>


    <!-- animation library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">

    <title>RAKAYA | HOME </title>
</head>

<body>

    <!-- intro loaded -->
    <div class="intro_loaded" id="intro">
        <img class="scale-up-center" src="./assets/ركايا_ابيض.png" alt="Intro image">
    </div>
    <!-- end intro loaded -->

    <!-- header -->
    <header>

        <!-- navbar section -->
        <nav class="fixed w-full z-20 top-0 left-0 ">

            <!-- whole div in navbar -->
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 wholeDiv">

                <!-- company logo in navbar -->
                <a href="" class="flex items-center ">
                    <img src="./assets/ركايا_full_.png" class=" h-20 sm:h-20 mr-3 , logoNav" alt="Rakaya Logo">
                </a>

                <!-- 1div  log-in link and button in navbar -->
                <div class="flex md:order-2 ">

                    <?php if (isset($_SESSION['user'])) { ?>

                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="w-10 h-10 rounded-full overflow-hidden">
                            <img src="./usersImg/<?php echo ($_SESSION['user']['img']) ?>" class="w-full h-full ">
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-40  dark:bg-gray-700 dark:divide-gray-600 ml-10">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="./profile2.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">الحساب
                                        الشخصي</a>
                                </li>

                                <?php if ($_SESSION['user']['userType'] === 'admin') { ?>
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




                    <?php } else { ?>

                        <a href="login.php" class="login text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-1 py-2 text-center mr-3 md:mr-0 ml-3">تسجيل
                            الدخول
                        </a>

                    <?php } ?>


                    <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 mr-3" aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>

                <!-- 2div for navigations inside home sections -->
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 " id="navbar-sticky">

                    <ul class="text-white flex flex-col p-4 md:p-0 mt-4 font-medium md:flex-row" id="navigationsmm">
                        <li>
                            <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 mx-2" aria-current="page">
                                الصفحة الرئيسية
                            </a>
                        </li>
                        <li>
                            <a href="#about" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 mx-2">
                                من نحن
                            </a>
                        </li>
                        <li>
                            <a href="#service" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 mx-2">
                                خدماتنا
                            </a>
                        </li>
                        <li>
                            <a href="#footer" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 mx-2">
                                تواصل معنا
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- end whole div -->

        </nav>

        <!-- whole div in header -->
        <div class="headerin">
            <div class="header-title">

                <h1>
                    ركايا آفاق واسعة وامكانيات عالية
                </h1>
                <p>من واقع خبرتنا في سوق العمل السعودي نقدم الاستشارات التقنية و احدث الانظمة التقنية والامنية التي
                    تواكب
                    التقدم التقني

                </p>

                <!-- div for counter  -->
                <div class="numbersSection">

                    <div class="row">
                        <div class="col">
                            <div class="counter-box">
                                <h2 class="counter">215</h2> <span>+</span>
                                <h4>مطورين</h4>
                            </div>
                        </div>

                        <div class="col">
                            <div class="counter-box">
                                <h2 class="counter"> 400</h2> <span>+</span>
                                <h4>عملاء</h4>
                            </div>
                        </div>

                        <div class="col">
                            <div class="counter-box">
                                <h2 class="counter">300</h2> <span>+</span>
                                <h4>شركاء</h4>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- end whole div in header -->

    </header>

    <!--about us section-->

    <section class="aboutSec" id="about">
        <!-- whole div  -->
        <div id="aboutbox" data-aos="fade-up">

            <div id="aboutContent">

                <h3 class="text-4xl">من نحن ؟</h3>

                <div data-aos="fade-up">
                    <p>ﺷﺮﻛﺔ ﺳﻌﻮدﻳﺔ ﻣﺘﺨﺼﺼﺔ ﻓﻲ ﺗﻘﺪﻳﻢ اﻟﺨﺪﻣﺎت اﻹﺳﺘﺸﺎرﻳﺔ ، ﻟﺘﻤﻜﻴﻦ اﻟﻘﺪرات ﻓﻲ
                        اﻟﻤﻨﻈﻤﺎت واﻟﻤﺠﺘﻤﻌﺎت ﻋﻠﻰ اﻟﺴﻌﻲ ﻧﺤﻮ ﻣﻮاﻛﺒﺔ اﻟﻌﺎﻟﻢ ﻓﻲ اﻟﺘﻄﻮر ﻟﺠﻤﻴﻊ
                        اﻟﻤﺠﺎﻻت ، وﻟﺬﻟﻚ ﻧﻌﻤﻞ ﻣﻊ ﻋﻤﻼؤﻧﺎ ﻋﻠﻰ ﺗﻄﻮﻳﺮ ﻣﻨﻈﻤﺎﺗﻬﻢ ووﺿﻊ ﻟﻬﻢ ﺣﻠﻮل
                        اﺑﺘﻜﺎرﻳﺔ ﻟﻠﺘﻌﺎﻣﻞ ﻣﻊ اﻟﺘﺤﺪﻳﺎت واﻟﻤﺼﺎﻋﺐ
                    </p>

                </div>

            </div>

            <div id="aboutVideo">
                <!-- <img src="./assets/ركايا_full_.png" width="300" height="300" alt="Rakaya Logo"> -->
                <video class=" rakayaVideo" src="./assets/rakaya.mp4" controls type="video/mp4">your browser not support this video</video>
            </div>
        </div>

    </section>

    <!--values section-->

    <section class="  bg-white dark:bg-gray-900" id="values">

        <center>
            <!-- whole div -->
            <div class=" py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6" id="valuesbox" data-aos="fade-up">

                <!-- div1 -->
                <div class=" max-w-screen-md mb-8 lg:mb-16">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">قيمنا</h2>
                </div>

                <!-- div2 for values -->
                <div class="  space-y-8 md:grid md:grid-cols-2 lg:grid-cols-4 md:gap-12 md:space-y-0" id="valuescontainer">

                    <div class="value" data-aos="zoom-in" data-aos-duration="500">
                        <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                            <img src="assets/honesty.png" class="v1" alt="honesty logo">
                        </div>
                        <h3 class="mb-2 text-xl font-bold   dark:text-white">النزاهة</h3>
                        <p class="text-gray-500 dark:text-gray-400">
                            ﻧﺴﻌﻰ دوﻣﺎ ً ﻟﻨﺠﺎح ﻋﻤﻼؤﻧﺎ
                            وﻧﻘﺪم اﻟﻨﺘﺎﺋﺞ ﻟﻬﻢ وﻧﺴﻌﻰ
                            ﺟﺎﻫﺪﻳﻦ ﻟﺘﺠﺎوز ﺗﻮﻗﻌﺎﺗﻬﻢ
                        </p>

                    </div>


                    <div class="value" data-aos="zoom-in" data-aos-duration="1000">

                        <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">

                            <img src="assets/protest.png" class="v2" alt="protest Logo">

                        </div>
                        <h3 class="mb-2 text-xl font-bold dark:text-white">التمكين</h3>
                        <p class="text-gray-500 dark:text-gray-400">
                            ﻧﻌﻤﻞ ﻣﻊ ﻋﻤﻼﺋﻨﺎ ﺟﻨﺒﺎ ً ﻟﺠﻨﺐ
                            ﻟﺘﻄﻮﻳﺮ اﻟﺤﻠﻮل ﺳﻮﻳﺎ ً ﻟﻀﻤﺎن
                            اﺳﺘﺪاﻣﺔ ﻧﺠﺎح اﻟﺤﻠﻮل ﻟﺪﻳها
                        </p>
                    </div>



                    <div class="value" data-aos="zoom-in" data-aos-duration="1500">
                        <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                            <img src="assets/customer-service.png" class="v3" alt="customer-service Logo">
                        </div>
                        <h3 class="mb-2 text-xl font-bold dark:text-white">التركيز على العميل</h3>
                        <p class="text-gray-500 dark:text-gray-400">
                            ﻧﻌﻤﻞ ﺟﺎﻫﺪﻳﻦ ﻋﻠﻰ اﻟﻮﻓﺎء ﺑﻮﻋﻮدﻧﺎ
                            وﻧﺘﺒﻨﻰ دور اﻟﺸﺮﻳﻚ اﻟﺜﻘﺔ ﻟﺘﻤﻜﻴﻦ
                            ﻋﻤﻼؤﻧﺎ واﻟﻌﻤﻞ ﻣﻦ اﻟﻤﺼﻠﺤﺔ
                        </p>
                    </div>


                    <div class="value" data-aos="zoom-in" data-aos-duration="2000">
                        <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                            <img src="assets/excellence (2).png" class="v4" alt="excellence Logo">
                        </div>
                        <h3 class="mb-2 text-xl font-bold dark:text-white">التميز</h3>
                        <p class="text-gray-500 dark:text-gray-400">
                            ﻧﺴﻌﻰ دوﻣﺎ ً ﻟﻠﺘﺤﺴﻴﻦ اﻟﻤﺴﺘﻤﺮ
                            ﻣﻦ ﺧﻼل اﻟﺒﺤﺚ واﻟﺘﻄﻮﻳﺮ وﺗﻘﺪﻳﻢ
                            أﻓﻀﻞ اﻟﺤﻠﻮل اﻟﻤﻨﺎﺳﺒﺔ
                        </p>
                    </div>






                </div>
            </div>

        </center>
    </section>




    <!--services section-->

    <div class="container mx-auto ">
        <div id="service" class="service" data-aos="fade-up">

            <div class="service-title">
                <h3 class="text-4xl">نقدم لكم ابرز خدماتنا</h3>
            </div>

            <div class="service-box">


                <div class="item" data-aos="fade-left" data-aos-duration="500">

                    <div class="item-name ">
                        <h4>التخطيط الاستراتيجي
                        </h4>
                        <ul>
                            <li>بناء استراتيجيات العمل
                            </li>
                            <li>بناء نموذج العمل


                            </li>
                            <li>بناء الخطط التشغيلية


                            </li>
                        </ul>
                    </div>
                    <div class="item-icon">
                        <img src="./assets/plan.png" alt="plan icon">
                    </div>
                </div>
                <div class="item" data-aos="fade-right" data-aos-duration="600">

                    <div class="item-name">
                        <h4>بناء قدرات الموارد البشرية
                        </h4>
                        <ul>
                            <li>تصميم الأجور والبدلات والحوافز


                            </li>
                            <li>تصميم الهياكل التنظيمية


                            </li>
                            <li>تصميم وتشغيل عمليات الموارد البشرية


                            </li>
                        </ul>
                    </div>
                    <div class="item-icon">
                        <img src="./assets/human-resources.png" alt="human-resources icon">
                    </div>
                </div>
                <div class="item" data-aos="fade-left" data-aos-duration="700">

                    <div class="item-name">
                        <h4>التميز المؤسسي
                        </h4>
                        <ul>
                            <li>تحسين إجراءات العمل


                            </li>
                            <li>تطبيق وتفعيل أنظمة الجودة


                            </li>
                            <li>أتمتة إجراءات العمل


                            </li>
                        </ul>
                    </div>
                    <div class="item-icon">
                        <img src="./assets/badge.png" alt="badge icon">
                    </div>
                </div>
                <div class="item" data-aos="fade-right" data-aos-duration="800">

                    <div class="item-name">
                        <h4>الإبداع وريادة الأعمال
                        </h4>
                        <ul>
                            <li>تحويل براءات الاختراع إلى مشاريع تجارية


                            </li>
                            <li>تصميم خطط إطلاق المشاريع الصغيرة


                            </li>
                            <li>تصميم خطط نمو المشاريع الصغيرة


                            </li>
                        </ul>
                    </div>
                    <div class="item-icon">
                        <img src="./assets/creativity.png" alt="creativity icon">
                    </div>
                </div>
                <div class="item" data-aos="fade-left" data-aos-duration="900">

                    <div class="item-name">
                        <h4> الخدمات الرقمية والتواصل الإجتماعي
                        </h4>
                        <ul>
                            <li>تأسيس الهوية البصرية


                            </li>
                            <li>بناء دليل شامل للهوية البصرية


                            </li>
                            <li>إدارة حسابات التواصل الاجتماعي


                            </li>
                        </ul>
                    </div>
                    <div class="item-icon">
                        <img src="./assets/social-media (1).png" alt="social-media icon">
                    </div>
                </div>
                <div class="item" data-aos="fade-right" data-aos-duration="1000">

                    <div class="item-name">
                        <h4>خدمة الامتياز التجاري
                        </h4>
                        <ul>
                            <li> تقديم الملخص القانوني للإمتياز التجاري


                            </li>
                            <li>تصميم المواصفات الإنشائية للمطاعم


                            </li>
                            <li>تصميم دليل التشغيل


                            </li>
                        </ul>
                    </div>
                    <div class="item-icon">
                        <img src="./assets/deal.png" alt="deal icon">
                    </div>
                </div>




            </div>
        </div>
    </div>

    <!--partners section-->
    <section id="partners" data-aos="fade-up">

        <!-- whole div for title and images -->
        <div class="partners-box py-8 lg:py-16 mx-auto max-w-screen-xl px-4">

            <h2 class="mb-8 lg:mb-16 text-3xl font-extrabold tracking-tight leading-tight text-center text-gray-900 dark:text-white md:text-4xl">
                شركاء النجاح
            </h2>
            <p>نفخر في ركايا بشراكاتنا مع عدد من أبرز الشركات التقنية العالمية لتقديم الخدمات الموثوقة لعملائنا</p>

            <!-- div for image links -->
            <div class="grid grid-cols-2 gap-8 text-gray-500 sm:gap-12 md:grid-cols-3 lg:grid-cols-6 dark:text-gray-400">

                <a href="https://www.haj.gov.sa/Home" class="flex justify-center items-center" data-aos="zoom-in" data-aos-duration="500">

                    <img class="h-20  rounded-lg" src="assets/وزارة_الحج-لوقو-removebg-preview.png" alt="ministry logo">


                </a>

                <a href="https://www.sfda.gov.sa/ " class="flex justify-center items-center" target="_blank" data-aos="zoom-in" data-aos-duration="600">
                    <img class="h-20  rounded-lg" src="assets/الهيئة-العامة-للغذاء-والدواء-1.png" alt="partners logo">

                </a>

                <a href="  https://www.sdb.gov.sa/ar-sa/individual/individual-finance  " class="flex justify-center items-center" data-aos="zoom-in" data-aos-duration="700">
                    <img class="h-20  rounded-lg" src="assets/بنك_التنمية-لوقو-removebg-preview (1).png" alt="Bank logo">


                </a>

                <a href="https://www.google.com.sa/?hl=ar" class="flex justify-center items-center" data-aos="zoom-in" data-aos-duration="800">
                    <img class="h-20  rounded-lg" src="assets/google-logo-removebg-preview.png" alt="google logo">

                </a>
                <a href="https://www.my.gov.sa/wps/portal/snp/main" class="flex justify-center items-center" data-aos="zoom-in" data-aos-duration="900">
                    <img class="h-12  rounded-lg" src="assets/المنصة -لوقو.png" alt="partner logo">

                </a>
                <a href="https://www.alrajhibank.com.sa/" class="flex justify-center items-center" data-aos="zoom-in" data-aos-duration="1000">
                    <img class="h-12  rounded-lg" src="assets/الراجحي-لوقو.png" alt="Bank logo">

                </a>
            </div>
        </div>

        <!-- end whole div for title and images -->
    </section>





    <!-- footer section -->
    <footer>

        <!-- company logo and title - right side in footer -->
        <div class="our-company" id="footer">


            <img src="./assets/ركايا_name_.png" alt="rakaya logo ">
            <p>
                من واقع خبرتنا في سوق العمل السعودي نقدم الاستشارات التقنية و احدث الانظمة التقنية والامنية التي تواكب
                التقدم التقني

            </p>

            <!-- social media links -->
            <div class="social-media">
                <a href="https://api.whatsapp.com/send?phone=0570077055" target="_blank"> <img src="./assets/whatsapp.png" alt="whatsapp">
                </a>

                <a href="https://twitter.com/rakayaco" target="_blank">
                    <img src="./assets/twitter.png" alt="twitter">
                </a>
                <a href="https://www.linkedin.com/company/rakaya/" target="_blank">
                    <img src="./assets/linkedin.png" alt="linkedin">
                </a>
                <a href="https://www.google.com/maps?q=21.4033161,39.7152969&hl=en-SA&gl=sa&entry=gps&lucs=47067412&g_ep=CAISBjYuNjQuMxgAINeCAyoINDcwNjc0MTJCAlNB&g_st=ic" target="_blank">
                    <img src="./assets/gps.png" alt="rakaya location">
                </a>

            </div>

        </div>


        <!-- form section for contact us -->
        <div class="contact-us">
            <h3>تواصل معنا</h3>

<!--               
            <div id="form-message" class="p-4 mb-4 text-center text-sm text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400" role="alert">   
           </div>  -->
       <!-- <?php

       if(isset( $_SESSION['status']) &&  $_SESSION['status'] !=''  )
         { 
            ?>
             
                 <script>
                      swal({
                        title: " <?php echo $_SESSION['status']; ?>",
                        // text: "You clicked the button!",
                        icon: " <?php echo $_SESSION['status_code']; ?>",
                        button:"حسنًا"
                        });
                  </script>
             
                  
               
           <?php 

            unset($_SESSION['status']);
         }
   
       ?>
           -->




           <!-- action="contacUsInsertDB.php" -->
         
            <form  action="contacUsInsertDB.php" id="contactUsId" method="POST">
                <div class="input">
                    <input class="py-6  px-2" name="topiccontactUs" id="topiccontactUs" type="text" placeholder="الموضوع">
                    <small id="subject_msg"></small>
                    <input  class="py-6 px-2" name="emailcontactUs" id="emailcontactUs"  type="text" placeholder="البريد الالكتروني">
                    <small id="email_msg"></small>

                </div>

                <textarea name ="messagecontactUs" id="messagecontactUs" cols="50" rows="5" placeholder="اكتب رسالتك ........."></textarea>
                <small id="message_msg"></small>

                <button type="submit" class="form-btn" name="contctFormSubmit" id="contctFormSubmit" >ارسل</button>
                
            </form>
            <!-- end form -->

        </div>
         <!-- end contact section -->
    </footer>

    <!-- section under footer for copy right -->
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-2 text-center  , underfooter">
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400 mb-0 mt-2">جميع الحقوق محفوظة لشركة
            ركايا 2023.</span>
    </div>


    <!-- javascript library link -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <!-- initialize AOS library script -->
    <script>
        AOS.init();
    </script>

    <!-- flowbite script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>

    <script>

$(document).ready(function(){  

          $('#contctFormSubmit').click(function(){

            var topiccontactUs = $('#topiccontactUs').val() ; 
            var messagecontactUs = $('#messagecontactUs').val() ; 
            var emailcontactUs = $('#emailcontactUs').val() ; 
           

            if(topiccontactUs ==''|| messagecontactUs ==''|| emailcontactUs=='' )
             { 
               // alert using sweetalert 

                swal({
                    title: "من فضلك , يجب تعبأة جميع الحقول " ,
                    // text: "You clicked the button!",
                    icon: "warning",
                    button:"حسنًا"
                    });


             }
             else
             { 
                        swal({
                                title: "تم تنفيذ طلبك بنجاح",
                                // text: "You clicked the button!",
                                icon: "success",
                                button:"حسنًا"
                                });

                $.ajax({
                    url:"contacUsInsertDB.php",  
                    method:"POST",  
                    data:  {topiccontactUs:topiccontactUs , messagecontactUs:messagecontactUs ,emailcontactUs:emailcontactUs}, 
               
                    success:function(data)
                    {  
                        console.log("success");
                          // alert using sweetalert 
                        swal({
                                title: statusMessage ,
                                // text: "You clicked the button!",
                                icon: statusCode,
                                button:"حسنًا"
                                });
                     //clear the form 
                    //  $("form").trigger("reset");
                    //  $('#form-message').fadeIn().html(data);
                    //   setTimeOut(function(){
                    //     $('#form-message').fadeOut('slow');

                    //      }, 500);
                      
                      


                    }  ,
                    // end success
                    error: function () {
                        // alert using sweetalert 
                        swal({
                            title: "حدث خطأ أثناء الارسال",
                            icon: "error",
                            button: "حسنًا"
                        });
                    } 

                });
                // end ajax

             }
                //  end else

                
               
            });
            // end click

 });

// end fun
    
         


        //         );

        // } );
    </script>

   
    <!-- sweet alert js library -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



    <!-- link for counter in header javascript code file -->
    <script src="./custom.js"></script>

     <!-- link to ajax file  -->
     <!-- <script src="./contactUsAjax.js"></script> -->

     <!-- validate  -->
     <script src="./conatUsValidation.js"></script>

   
</body>

</html>












<!-- {topiccontactUs:topiccontactUs , messagecontactUs:messagecontactUs ,emailcontactUs:emailcontactUs}, -->
<!-- $("#contactUsId").serialize -->
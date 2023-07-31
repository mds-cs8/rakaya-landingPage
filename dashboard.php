<?php
session_start();
if ($_SESSION['user']['userType'] === 'admin') {

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- ui library >> tailwend -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet">
        <!-- custtom css -->
        <link rel="stylesheet" href="dashboard.css">
        <!-- JQuery library  -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

        <!-- animation library -->
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
        <!-- google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">

        <title>RAKAYA | Dashboard </title>
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
        <div class="whole">

            <div class="admin-name shadow-lg ">
                <h1 class="msg">اهلا بك </h1>
                <h1 class="name"><?php echo $_SESSION['user']['name'] ?> </h1>
            </div>

            <!-- add user icon -->
            <div id="addIcon">

                <a href="adminadd.php" class="  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <img src="./assets/add-user.png" class=" " width="60" height="60">
                </a>
            </div>
        </div>

        <!-- this message appear after the edite the user make i (update user info or add new user ) -->
        <?php
        if (isset($_SESSION['InfoMessage'])) {
        ?>

            <div class="p-4 mb-4  text-sm text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400" role="alert">
                <?= $_SESSION['InfoMessage'] ?>


            </div>

        <?php
        }

        unset($_SESSION['InfoMessage']);
        ?>


        <!-- dashboard -->
        <div id="user">
            <div class="box">
                <header>
                    <h3>الاسم</h3>
                    <h3>الايميل</h3>
                    <h3>رقم الجوال</h3>
                    <h3>نوع المستخدم</h3>
                    <h3>الاجراء</h3>
                </header>
            </div>
            <!-- // here we fetch data -->
            <div id=user-box>
            </div>
        </div>

        <!-- end dashboard -->

        <!-- javascript library link -->
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <!-- initialize AOS library script -->
        <script>
            AOS.init();
        </script>

        <!-- flowbite script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>

        <!-- link for counter in header javascript code file -->
        <!-- <script src="./custom.js"></script> -->


        <!-- ajax code  -->
        <script>
            $(document).ready(function() {
                load_data();

                function load_data(page) {
                    $.ajax({
                        url: "testpage.php",
                        method: "POST",
                        data: {
                            page: page
                        },
                        success: function(data) {
                            $('#user-box').html(data);
                        }
                    })
                }
                $(document).on('click', '.pagination_link', function() {
                    var page = $(this).attr("id");
                    load_data(page);
                });
            });
        </script>
    </body>

    </html>
<?php } ?>


<!-- pre -->

<!-- ajax code  -->
<!-- <script>
        $(document).ready(function () {
            $("#user").load("test.php")
            // $("#pagination-box").load("fetchAllUsersCode.php")

        }); -->
<?php
session_start();
 if($_SESSION['user']['userType']==='admin'){ 

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
         if(isset($_SESSION['user'])){
                          ?>
      
        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="w-10 h-10 rounded-full overflow-hidden">
            <img src="./usersImg/<?php echo( $_SESSION['user']['img'])?>" alt="" class="w-full h-full ">
        </button>
        
        <!-- Dropdown menu -->
        <div id="dropdownNavbar"
            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-40  dark:bg-gray-700 dark:divide-gray-600 ml-10">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                <li>
                    <a href="./profile2.php"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">الحساب
                        الشخصي</a>
                </li>
                <?php if($_SESSION['user']['userType']==="admin"){ ?>
                <li>
                    <a href="./profile.php"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        لوحة التحكم</a>
                </li>
                <?php } ?>  
                <li>

                    <a href="./logout.php"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">تسجيل
                        الخروج</a>
                </li>
            </ul>

        </div>



     
    <?php 
      }else{
       ?>

    <a href="login.php"
        class="login text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-1 py-2 text-center mr-3 md:mr-0 ml-3">تسجيل
        الدخول
    </a>

    <?php 

          }

          ?>
    <button data-collapse-toggle="navbar-sticky" type="button"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 mr-3"
        aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 1h15M1 7h15M1 13h15" />
        </svg>
    </button>
</div>

<!-- 2div for navigations inside home sections -->
<div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 "
    id="navbar-sticky">

    <ul class="text-white flex flex-col p-4 md:p-0 mt-4 font-medium md:flex-row" id="navigationsmm">
        <li>
            <a href="#"
                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 mx-2"
                aria-current="page">
                الصفحة الرئيسية
            </a>
        </li>
        <li>
            <a href="#about"
                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 mx-2">
                من نحن
            </a>
        </li>
        <li>
            <a href="#service"
                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 mx-2">
                خدماتنا
            </a>
        </li>
        <li>
            <a href="#footer"
                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 mx-2">
                تواصل معنا
            </a>
        </li>
    </ul>
</div>

</div>
<!-- end whole div -->

</nav>

<!-- head of page -->
<div class="admin-name shadow-lg ">
    <h1 class="msg">اهلا بك </h1>
    <h1 class="name"><?php  echo $_SESSION['user']['name'] ?> </h1>


</div>

<!-- add user icon -->
<div class= "editAdmin">
        
                
        <!-- Modal toggle -->
        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        <img src="./assets/add-user.png" class=" ">
        </button>

        <!-- Main modal -->
        <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
             <div class="relative bg-gray-400 rounded-lg shadow dark:bg-gray-700">

                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>

             <div class="px-6 py-6 lg:px-8">
                        <h3 class="inline mb-4 text-xl font-medium text-gray-900 dark:text-white">تسجيل مستخدم جديد</h3>
                            
                    <form class="space-y-2 md:space-y-6 ,form " action="dashboard.php" method="POST" enctype= multipart/form-data>

                            <!-- name -->
                            <div class="name">

                                <div class="name1">

                                    <label for="name1"
                                        class="mb-4 text-sm font-medium  text-gray-900  dark:text-white">الاسم
                                        الأول</label>

                                    <input type="text" name="name1" id="name1"
                                        class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-full p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs"
                                        placeholder="سارة" required value="<?php if( isset($_POST[" name1"]) ){ echo
                                        $_POST["name1"]; } ?>">
                                    <small id="name1_msg"></small>

                                </div>

                                <div class="name2">

                                    <label for="name2" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">الاسم
                                        الأخير</label>
                                    <input type="text" name="name2" id="name2"
                                        class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-full p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs"
                                        placeholder="محمد" required value="<?php if( isset($_POST[" name2"]) ){ echo
                                        $_POST["name2"]; } ?>" >
                                    <small id="name2_msg"></small>
                                </div>

                            </div>

                            <!-- email -->
                            <div class="email-phone">
                                <div class="email">
                                    <label for="email"
                                        class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">الايميل</label>
                                    <input type="email" name="email" id="email"
                                        class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-full p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs"
                                        placeholder="name@google.com" required value="<?php if( isset($_POST[" email"]) ){
                                        echo $_POST["email"]; } ?>" >

                                    <small id="email_msg"></small>
                                
                                </div>

                                <!-- phone number -->
                                <div class="phone">
                                    <label for="phone" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">رقم
                                        الهاتف</label>
                                    <input type="tel" id="phone" name="phone"
                                        class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-full p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs"
                                        required value="<?php if( isset($_POST[" phone"]) ){ echo $_POST["phone"]; } ?>">
                                    <small id="phone_msg"></small>

                                </div>
                            </div>

                            <!-- password -->
                            <div class="password">

                                <!-- pass1 -->
                                <div class="pass1">
                                    <label for="password" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">كلمة
                                        المرور</label>
                                    <input type="password" name="password" id="password" placeholder="••••••••"
                                        class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-full p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs"
                                        required value="<?php if( isset($_POST[" password"]) ){ echo $_POST["password"]; }
                                        ?>" >

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
                                    <input type="password" name="repassword" id="repassword" placeholder="••••••••"
                                        class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-full p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs"
                                        required value="<?php if( isset($_POST[" repassword"]) ){ echo $_POST["repassword"];
                                        } ?>" >
                                    <small id="repassword_msg">

                                    </small>
                                </div>



                            </div>
                            <div class="inline ,img ">

                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="file_input">رفع صورة</label>
                                        <input class="w-full h-10 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" name="UserImg">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">الرجاء اختيار الصور بالامتداد التالي png , jpg , jpeg والحجم لا يزيد عن 2ميقا</p>



                                </div>
                            <!-- gender & userType -->
                            <div class="genderAndUserType">

                                <!-- gender -->
                                <div class="inline-flex flex gender ">

                                    <label for="gender" class=" ml-3 mb-2 text-sm font-medium text-gray-900 dark:text-white">الجنس</label>

                                    <input type="radio" id="female" name="gender" value="female"
                                        class="ml-2 border border-gray-300" required value="<?php if( isset($_POST["
                                        gender"]) ){ echo $_POST["gender"]; } ?>" >
                                    <label for="female">أنثى</label>

                                    <input type="radio" id="male" name="gender" value="male"
                                        class="mr-3   ml-2 bg-gray-50 border border-gray-300" required
                                        value="<?php if( isset($_POST[" gender"]) ){ echo $_POST["gender"]; } ?>" >
                                    <label for="male">ذكر</label>

                                </div>
                                


                                <!-- user type -->
                                <div class=" inline-flex flex userType">

                                    <label for="users" class=" ml-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        حدد الفئة </label>

                                    <select name="users" id="users" size="1"
                                        class=" py-px  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 , users"
                                        value="<?php if( isset($_POST[" users"]) ){ echo $_POST["users"]; } ?>" >

                                        <option value="Developer">مطور</option>
                                        <option value="Consultant"> الاستشارات</option>
                                        <option value="Clint">عميل</option>
                                        <option value="Intern">متدرب</option>
                                        <option value="admin">مسؤول (ADMIN)</option>
                                    </select>

                                </div>

                            </div>


                            <button type="submit" id="newUser-btn" name="newUser"
                            class="w-full h-12 text-gray-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center">تسجيل جديد</button>

                       </form>
                    </div>
                </div>
            </div>
        </div> 

            

</div>

<!-- message -->
<?php

include 'message.php';

?>


<!-- dashboard -->

<div class="box">
    <header>
        <h3>الاسم</h3>
        <h3>الايميل</h3>
        <h3>رقم الجوال</h3>
        <h3>نوع المستخدم</h3>
        <h3>الاجراء</h3>
    </header>


<!-- retrive and organize data -->
<?php

// retrive data
include 'conn-db.php';

// find out the number of results stored in database
$results_per_page = 5;

$sql='SELECT * FROM user';
$result = $mysqli->query($sql);
$number_of_results = mysqli_num_rows($result);

// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);


// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
    $page = 1;
  } else {
    $page = $_GET['page'];
  }
  
  // determine the sql LIMIT starting number for the results on the displaying page
  $this_page_first_result = ($page-1)*$results_per_page;
  






$query = "SELECT * FROM user  LIMIT ".$this_page_first_result . ',' .  $results_per_page ;

$ID=0;

if ($result = $mysqli->query($query)) 
{
    // output data of each row
    while ($row = $result->fetch_assoc()) 
    {
     $ID=$row['id'];
   
    echo "<div class=user>";
    echo "<p>".$row["name"]."</p>";
    echo "<p>".$row["email"]."</p>";
    echo "<p>".$row["phoneNumber"]."</p>";
    echo "<p>".$row["userType"]."</p>";

    echo "<p class=action >";
    echo "<a href="."./adminEdit.php?id=". $row['id'] .">"."<img  src=./assets/editing.png>"."</a>";
    echo "<a href=./adminDelete.php?id=". $row['id'] .">"."<img src=./assets/delete.png>"."</a>";
    echo "</p>";
    echo "</div>";
    }
    echo "<div class = pagination-box>";
for ($page=1;$page<=$number_of_pages;$page++) {
    echo '<a class=pagination href="dashboard.php?page=' . $page . '">' . $page . '</a> ';
}
echo "</div>";

}else 

{
  echo "0 results";
}



// edit data



?>



<div class = pagination-box>

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
    <script src="./custom.js"></script>

</body>
</html>
<?php }?>
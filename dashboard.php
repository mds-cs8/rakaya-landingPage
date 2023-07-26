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
<div class="admin-name shadow-lg ">
    <h1 class="msg">اهلا بك </h1>
    <h1 class="name"><?php  echo $_SESSION['user']['name'] ?> </h1>


</div>


<div class="box">
    <header>
        <h3>الاسم</h3>
        <h3>الايميل</h3>
        <h3>رقم الجوال</h3>
        <h3>نوع المستخدم</h3>
        <h3>الاجراء</h3>
    </header>
<?php
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


if ($result = $mysqli->query($query)) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
    echo "<div class=user>";
    echo "<p>".$row["name"]."</p>";
    echo "<p>".$row["email"]."</p>";
    echo "<p>".$row["phoneNumber"]."</p>";
    echo "<p>".$row["userType"]."</p>";
    echo "<p class=action >";
    echo "<a href="."./update.php?id='". $row['id'] .">"."<img src=./assets/editing.png>"."</a>";
    echo "<a href=./adminDelete.php?id=". $row['id'] .">"."<img src=./assets/delete.png>"."</a>";
    echo "</p>";
    echo "</div>";
    }
    echo "<div class = pagination-box>";
for ($page=1;$page<=$number_of_pages;$page++) {
    echo '<a class=pagination href="dashboard.php?page=' . $page . '">' . $page . '</a> ';
}
echo "</div>";

}else {
  echo "0 results";
}

?>



<div class = pagination-box>

</div>

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

    <!-- link for counter in header javascript code file -->
    <script src="./custom.js"></script>

</body>
</html>
<?php }?>
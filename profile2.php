<?php


session_start();

include 'conn-db.php';

$userId =   $_SESSION['user']['id']; //get user email
$userEmail=   $_SESSION['user']['email']; //get user email

// $n1=  $_SESSION['user']['name1'];
// $n2=  $_SESSION['user']['name2'];

//fetch data
$sql="SELECT * FROM user WHERE id = '$userId' ";
$res=mysqli_query($mysqli,$sql);
$row =mysqli_fetch_array($res) ;

if($row){
$rname= $row['name'];
$remail= $row['email'];
$rphone= $row['phoneNumber'];
$rpassword= $row['password'];
$id=$row['id'];

}
else{
    echo "nooo";
}


//delete code

if (isset($_POST['submitDelete']) ) 
{  
    echo "delete";

// $sql = "DELETE FROM user
//     WHERE id = '$id'";

$del = "DELETE FROM user WHERE id = '$id' ";
// $stmt = $conn->prepare($del);
// $stmt->execute();
     
    $stmt = mysqli_query($mysqli ,$del)  ;    
   
    //check if it work
    if( $stmt)
    {
        session_unset();
        header('location:login.php');
        exit();
    }
    else
    {
        echo "not deleted";
    }
   


}

?>



<!-- component -->
<!DOCTYPE html>
<html lang="en">

<head>


    <title>profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
    <!-- JQuery  -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

   <!-- our -->
     <!-- ui library >> tailwend -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <!-- animation library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="profile2.css">

</head>

<body>


<header>

 <!-- navbar section -->
 <nav class="fixed w-full z-20 top-0 left-0 ">
        
        <!-- whole div in navbar -->
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 , wholeDiv">

           <!-- company logo in navbar -->
            <a href="./index.php" class="flex items-center ">
                <img src="./assets/ركايا_full_.png" class=" h-20 sm:h-20 mr-3 , logoNav" alt="Rakaya Logo">
            </a>

            <!-- 1div  log-in link and button in navbar -->
            <div class="flex md:order-2">
            <?php 
                 if(isset($_SESSION['user'])){
             ?>
                
                
                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="w-10 h-10 rounded-full overflow-hidden">
                        <img src="./usersImg/<?php echo( $_SESSION['user']['img'])?>"  class="w-full h-full ">
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
                                <a href="./dashboard.php"
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

              <a href="login.php" class="login text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-1 py-2 text-center mr-3 md:mr-0 ml-3">تسجيل
                    الدخول
                </a>

                <?php 

                  }

                  ?>
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
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
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 " id="navbar-sticky" >

                <ul class="text-white flex flex-col p-4 md:p-0 mt-4 font-medium md:flex-row" id="navigationsmm">
                    <li>
                        <a href="index.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 mx-2" aria-current="page">
                        الصفحة الرئيسية
                        </a>
                    </li>
                    
                </ul>
            </div>

        </div>
        <!-- end whole div -->

    </nav>               
   <!-- end navbar -->
   
</header>     

<!-- under nav -->
    <div class="h-full  p-8 , backgroundDiv">

        <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
            <div class="w-full flex flex-col 2xl:w-1/3">

            <div class="flex-1  rounded-lg shadow-xl p-8 , infoSection">

            


      <form class="space-y-2 md:space-y-6  " action="editProfileCode.php" method="POST" enctype=multipart/form-data >
              
      <div class="  rounded-lg shadow-xl pb-8 mr-4, imageSection">
          <!-- user image & info under photo -->
            <div class="flex flex-col items-center -mt-25 mr-4 justify-between , userPhotoDiv">
                <!-- user photo -->
                <button type="submit" id="userPhotoButton" class="w-20 h-20 rounded-full overflow-hidden mt-8" >
                        <img id="userPhoto" src="./usersImg/<?php echo( $_SESSION['user']['img'])?>"  class="w-full h-full ">
                    </button>
                   
                <!-- username -->
                <h1 class=" font-semibold text-4xl, nameUnderPhoto"> <?php echo  $rname ?> </h1>
                <p class="  text-2xl, nameUnderPhoto"> <?php echo  $remail ?>  </p>

                 <div class="uploadImg">

                    <label class="inline mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="file_input">تغيير الصورة</label>
                         <input id="file_input" type="file" name="UserImg"  class="w-240 h-10 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" 
                         
                         >
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help" >SVG, PNG,
                                    JPG or GIF (MAX. 800x400px).</p>
                  </div>
  
            </div>
          
        </div> 
        <!-- end div1 -->

       
            <div data-aos="zoom-in"  id="result" class="p-4 mb-4 text-center text-sm text-green-900 rounded-lg  dark:bg-gray-800 dark:text-green-400" role="alert">   
               
            </div>
        
        

                    <div class="headbuttons">
                            
                        
                            <!-- <button type="submit" id="deleteAcountButton" name="submitDelete" 
                            class="block  text-gray-900 font-medium rounded-lg text-sm px-2 py-2 text-center">حذف الحساب</button>
                            -->

                                                             
                            <button  id="Delete" name="Delete" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block text-white bg-blue-700 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                            حذف الحساب
                               </button>

                                <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-6 text-center">
                                                <svg class="mx-auto mb-4 text-gray-100 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                </svg>

                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">عزيزنا العميل , هل ترغب بإتمام حذف حسابك ؟</h3>
                                                <button  id="deleteAcountButton" name="submitDelete" data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                    نعم, أرغب بحذف حسابي
                                                </button>
                                                <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">الغاء</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                    </div>
                                                                                            
                               
               
               <!-- name -->
               <div class="name">
     
                   <div class="name1">
     
                       <label for="name1" class="mb-4 text-sm font-medium  text-gray-900  dark:text-white">الاسم
                           </label>
     
                       <input type="text" name="name1" id="name1" 
                           class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-full p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs"
                           placeholder="سارة" required  value="<?php echo $rname  ?>"  > 
                       <small id="name1_msg"></small>
     
                   </div>
     
                   <!-- <div class="name2">
     
                       <label for="name2" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">الاسم
                           الأخير</label>
                       <input type="text" name="name2" id="name2"
                           class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-full p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs"
                           placeholder="محمد" required   >
                       <small id="name2_msg"></small>
                   </div> -->
     
               </div>
     
               <!-- email -->
               <div class="email-phone">
                   <div class="email">
                       <label for="email"
                           class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">الايميل</label>
                       <input type="email" name="email" id="email" 
                           class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-full p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs"
                           placeholder="name@google.com" required  value="<?php echo  $remail?>"   >
     
                       <small id="email_msg"></small>
                       <?php 
     
                         if(isset($errors))
                          {
                                if(!empty($errors)){
                                    foreach($errors as $msg){
     
                                      echo   " <strong > <small > $msg </small> </strong> "   ;
                                    }
                                   }
                          }
     
                        ?>
                   </div>
     
                   <!-- phone number -->
                   <div class="phone">
                       <label for="phone" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">رقم
                           الهاتف</label>
                       <input type="tel" id="phone" name="phone" 
                           class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-full p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs"
                           required value="<?php echo  $rphone ?> ">
                       <small id="phone_msg"></small>
     
                   </div>
               </div>
     
               <!-- password -->
               <div class="password">
     
                   <!-- pass1 -->
                   <div class="pass1">
                       <label for="password"
                           class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">كلمة
                           المرور</label>
                       <input type="text" name="password" id="password" placeholder="••••••••"  
                           class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-full p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs"
                           required    >
                    
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
                       <input type="text" name="repassword" id="repassword" placeholder="••••••••" 
                           class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-full p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs"
                           required    >
                       <small id="repassword_msg">
     
                       </small>
                   </div>
     
     
     
               </div>
     
               
               <!-- edit/cancle -->
                <div class="submit" >
     
               <button  class="editProfileButton" type="submit" id="save" name="save"
                   class=" font-medium rounded-lg text-sm px-2 py-2 text-center"  >حفظ</button>
               
               <!-- <button  class="editProfileButton" type="submit" id="cancel" name="submitCancel"
                     class=" font-medium rounded-lg text-sm px-2 py-4 text-center">الغاء</button>
                </div>  -->
               
               
        </form>
    </div>
    <!-- end div2 -->




 <!-- flowbite script -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>

<!-- javascript library link -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- initialize AOS library script -->
<script>
    AOS.init();
</script>

<script>
    $("form").submit(function(e)
    {
          e.preventDefault(); //prevent the default action of sending data form
    
         $.post( 
          'editProfileCode.php',
        // $("form").attr('action'),
           
         $("form :input").serializeArray()  , //select all input in the form to pass it 
         function(result)
           { 
                if(result == "success")
                  {
                    $("#result").html("تم تحديث البيانات بنجاح");
                    console.log("done");
                  }
                  else
                  {
                    $("#result").html("لم يتم تحديث البيانات بنجاح");

                  }
           }
           
           
            );
    
    } );



</script>

<script src="./editeProfile.js"></script>




</body>
</html>
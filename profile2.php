<?php


session_start();

include 'conn-db.php';

$userEmail=   $_SESSION['user']['email']; //get user email

// $n1=  $_SESSION['user']['name1'];
// $n2=  $_SESSION['user']['name2'];


//fetch data
$sql="SELECT * FROM user WHERE email = '$userEmail' ";
$q=$conn->prepare($sql);
$q->execute();
$data=$q->fetch();
$id=0; //get user id


//check if it fetched
if(!$data){
          echo "no";
}else
 {
$Nmae= $data['name'];
$Email= $data['email'];
$phone= $data['phoneNumber'];
$password= $data['password'];
$id=$data['id'];
echo "id".$id ;
}


//update

if (isset($_POST['submitSave']) ) 
{  

    $usersimg="";
   
	
    $img_name = $_FILES['UserImg']['name'];
	$img_size = $_FILES['UserImg']['size'];
	$tmp_name = $_FILES['UserImg']['tmp_name'];
	$error = $_FILES['UserImg']['error'];
  
    
    $error=0;

//validate image
        if ($error === 0) {
        if ($img_size > 2000000) {
            // 2mb size
            $errors[] = "نعتذر حجم الملف كبير";
        }else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png"); 

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'usersImg/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                $usersimg = $new_img_name;
            
            }else {
                $errors[] = " jpg ,  jpeg , png الرجاء رفع صورة بالامتداد التالي ";
            }

        }
        }
        else {
        $errors[] = "unknown error occurred!";
        }



    
//update code
$n= $_POST['name1'].$_POST['name2'];
$hashPass= password_hash($_POST["password"], PASSWORD_DEFAULT);
$e= $_POST['email'];
$phoneN= $_POST['phone'];


$sql = "UPDATE user
SET name = '$n',
    email = '$e',
    phoneNumber = '$phoneN',
    password= '$hashPass',
    UserImg = '$usersimg'
WHERE id = '$id'";

    $stmt = $conn->prepare($sql);

    $stmt->execute();
   
    
    //check if it work
    if( $stmt){
        echo 'ok';

    }
    else{
        echo "no";
    }
}//end if


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
    if( $stmt){
        echo "deleted successfuly";
    }
    else{
        echo "not deleted";
    }
   

    header('location:login.php');
    exit();

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
                
                
                <a href="logout.php" class="login text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-1 py-2 text-center mr-3 md:mr-0 ml-3">تسجيل
                    الخروج
                </a>

                <a href="profile2.php" class="login text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-1 py-2 text-center mr-3 md:mr-0 ml-3">
                    الملف الشخصي
                </a>



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
                        <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 mx-2" aria-current="page">
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


        <div class="  rounded-lg shadow-xl pb-8 , imageSection">
          <!-- user image & info under photo -->
            <div class="flex flex-col items-center -mt-20 , userPhotoDiv">
                <!-- user photo -->
                <button type="submit" id="userPhoto" class="w-20 h-20 rounded-full overflow-hidden mt-8">
                        <img src="./usersImg/<?php echo( $_SESSION['user']['img'])?>"  class="w-full h-full ">
                    </button>
                   
                <!-- username -->
                <h1 class=" font-semibold text-4xl, nameUnderPhoto"> <?php echo  $data['name'] ?> </h1>
                <p class="  text-2xl, nameUnderPhoto"> <?php echo  $data['email'] ?>  </p>

                 <div class="uploadImg">

                    <label class="inline mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="file_input">تغيير الصورة</label>
                                    <input class="w-240 h-10 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" name="UserImg">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG,
                                    JPG or GIF (MAX. 800x400px).</p>
                  </div>
  
            </div>
          
        </div> 
        <!-- end div1 -->

        <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
            <div class="w-full flex flex-col 2xl:w-1/3">

            <div class="flex-1  rounded-lg shadow-xl p-8 , infoSection">

      <form class="space-y-2 md:space-y-6  " action="profile2.php" method="POST" enctype=multipart/form-data >

                    <div class="headbuttons">
                            
                            <!-- <button type="submit" id="updateAcountButton" name="submitUpdate" 
                            class=" block  text-gray-900 font-medium rounded-lg text-sm px-2 py-2 text-center">تحديث البيانات</button>
                     -->
                            <button type="submit" id="deleteAcountButton" name="submitDelete" 
                            class="block  text-gray-900 font-medium rounded-lg text-sm px-2 py-2 text-center">حذف الحساب</button>
                
                    </div>        

               
               <!-- name -->
               <div class="name">
     
                   <div class="name1">
     
                       <label for="name1" class="mb-4 text-sm font-medium  text-gray-900  dark:text-white">الاسم
                           الأول</label>
     
                       <input type="text" name="name1" id="name1" 
                           class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-full p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs"
                           placeholder="سارة" required  value="<?php echo $data['name']?>"  > 
                       <small id="name1_msg"></small>
     
                   </div>
     
                   <div class="name2">
     
                       <label for="name2" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">الاسم
                           الأخير</label>
                       <input type="text" name="name2" id="name2"
                           class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-full p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs"
                           placeholder="محمد" required value="<?php echo $data['name']?>"  >
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
                           placeholder="name@google.com" required  value="<?php echo  $data['email']?>"   >
     
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
                           required value="<?php echo  $data['phoneNumber'] ?> ">
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
                           required  value="<?php echo $password ?> "   >
                    
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
                           required  value="<?php echo $password?> "    >
                       <small id="repassword_msg">
     
                       </small>
                   </div>
     
     
     
               </div>
     
               
               <!-- edit/cancle -->
                <div class="submit" >
     
               <button  class="editProfileButton" type="submit" id="save" name="submitSave"
                   class=" font-medium rounded-lg text-sm px-2 py-2 text-center"  >حفظ</button>
               
               <button  class="editProfileButton" type="submit" id="cancel" name="submitCancel"
                     class=" font-medium rounded-lg text-sm px-2 py-4 text-center">الغاء</button>
                </div> 
               
               
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

<script src="./custom.js"></script>
<script src="./editeProfile.js"></script>





</body>
</html>
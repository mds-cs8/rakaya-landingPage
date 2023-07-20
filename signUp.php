<?php

  if( isset($_POST['submit'])  )
   {   
    // filtering data
      $name1 =filter_var( $_POST['name1'], FILTER_SANITIZE_STRING);  
      $name2 =filter_var( $_POST['name2'], FILTER_SANITIZE_STRING);  
      $password =filter_var( $_POST['password'], FILTER_SANITIZE_STRING);  
      $email =filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL); 

    //   $phone =filter_var( $_POST['phone'], FILTER_SANITIZE_STRING); 

      $gender =filter_var( $_POST['gender'], FILTER_SANITIZE_STRING); 
      $users =filter_var( $_POST['users'], FILTER_SANITIZE_STRING); 
     
    //   array for any mistack from the user , true ->won't store in DB ,false->will store in DB
       $errors=[];

       //  validate name
       if(empty( $name1))
       {
        $errors[]="يجب كتابة الاسم";
       }
       elseif(strlen($name1)>200)
       { 
        $errors[]="يجب ان لايتجاوز الاسم 100 حرف";
       }
      

   
      //validate email
         //  validate name
         if(empty( $email))
         {
          $errors[]="يجب كتابة البريد الالكتروني";
         }
         elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==false)   //built in function that validate the email 
         { 
          $errors[]= "البريد الالكتروني غير صالح";
         } 

  
         //validate pass
         if(empty( $password))
         { 
          $errors[]="يجب كتابة كلمة المرور";
         }
         elseif(strlen($password)<6)   
         { 
          $errors[]= "يجب ان لا تقل كلمة المرور عن 6 ارقام";
         } 


    

         
       if(empty( $errors))
       {
              echo "insert DB";
       }
       else{

           var_dump($errors);
           echo "here2";
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" >
           <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
        <!-- animation library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="signUp.css">

</head>


<body>
   
    <!-- 1section - right side -->
    <section class="signupSectionClass">

        <div class="signupBox1">

            <div data-aos="fade-up" data-aos-duration="1000" class="signupBox2 ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        التسجيل
                    </h1>

                    <form class="space-y-4 md:space-y-6 ,form" action="signUp.php" method="POST">
                        <!-- name -->
                        <div class="name">
                             
                            <div class="name1">

                            <label for="name1" class=" mb-2 text-sm font-medium  text-gray-900 dark:text-white">الاسم الأول</label>
                            <input type="text" name="name1" id="name1" value="<?php if(isset($_POST['name1'])) { echo $_POST['name1'] ;}?>" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-gray-600  focus:border-gray-900 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 , inputBoxs"
                            placeholder="سارة" required="">

                            </div>

                            <div class="name2">

                            <label for="name2" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">الاسم الأخير</label>
                            <input type="text" name="name2" id="name2" value="<?php if(isset($_POST['name2'])) { echo $_POST['name2'] ;}?>"       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-gray-600 focus:border-gray-900 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 , inputBoxs"
                            placeholder="محمد" required="">

                           </div>

                        </div>
                      
                                     
                        <!-- password -->
                        <div class="password">

                            <!-- pass1 -->
                            <label for="password"  class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">كلمة المرور</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-800 focus:border-gray-900 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">

                                <small >
                                  كلمة المرور يجب أن  <strong>لا تقل  عن 6 أرقام</strong>  ( 1 حرف صغير ,1 حرف كبير, رمز وأرقام) 
                                                       
                                </small>
                                  <br> <br>

                                <!-- pass2 -->
                                <label for="password2" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    تأكيد كلمة المرور
                                </label>
                                <input type="password" name="password" id="password2" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-800 focus:border-gray-900 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500  "
                                    required="">
                        </div>

                       
                        <!-- email -->
                        <div>
                            <label for="email" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">الايميل</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-gray-600 focus:border-gray-900 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@google.com" required="">
                        </div>

                        <!-- phone number -->
                        <div>
                            <label for="phone" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">رقم الهاتف</label>
                            <input type="tel" id="phone" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-gray-600 focus:border-gray-900 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                            required="" >
                           
                        </div>


                 <!-- gender & userType -->
                    <div class="genderAndUserType">
                       
                        <!-- gender -->
                        <div class="inline-flex flex , gender ">

                        <label for="gender" class=" ml-3 mb-2 text-sm font-medium text-gray-900 dark:text-white">الجنس</label>
                        
                        <input type="radio" id="female" name="gender" value="female" class ="ml-2 border border-gray-300"  required="">
                        <label for="female">أنثى</label>

                        <input type="radio" id="male" name="gender" value="male" class ="mr-3   ml-2 bg-gray-50 border border-gray-300"   required="">
                        <label for="male">ذكر</label>
                    
                        </div>
                        
                                
                        <!-- user type -->
                        <div class=" inline-flex flex  , userType">
                          
                            <label for="users" class=" ml-3 mb-2 text-sm font-medium text-gray-900 dark:text-white">حدد الفئة</label>
                       
                            <select name="users" id="users" size="1" class=" py-px  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 , users">
                              
                              <option value="Developer">مطور</option>
                              <option value="Consultant"> الاستشارات</option>
                              <option value="Clint">عميل</option>
                              <option value="Intern">متدرب</option>
                            </select>
    
                        </div>

                    </div>


           
                        <!-- submit -->
                        <button type="submit" name="submit" class="w-full h-12 text-gray-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center">تسجيل</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            لديك حساب بالفعل ؟<a href="login.php"
                                class="font-medium text-gray-900 hover:underline dark:text-primary-500 , refrencelogin">
                                تسجيل الدخول </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
     
    <!-- 2section -left side -->
    <section class="headOfSingsection ">

        <div data-aos="fade-up" data-aos-duration="1000" class="headOfSign">

            <a href="index.php">

                <img src="./assets/ركايا_full_.png" alt="rakaya logo">
            </a>

            <h1> ركايا آفاق واسعة وامكانيات عالية</h1>

            <h2> انضم معنا !</h2>


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
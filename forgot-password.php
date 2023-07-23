<!-- processing input -->

<?php

if(isset($_POST['submit']))
{
  
include 'conn-db.php';
 
   $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);

   $error="";
   $foundEmail="";

   // validate email
   if(empty($email)){
    $error="يجب كتابة البريد الاكترونى";
   }elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
    $error="البريد الاكترونى غير صالح";
   }
  
   $stm="SELECT email FROM user WHERE email ='$email' ";
   $q=$conn->prepare($stm);
   $q->execute();
   $data=$q->fetch();
   
   if(!$data){
    $foundEmail= "لا يوجد حساب بهذا البريد الالكتروني";
    echo 'heee';
    $validationPassed = false;

    }
    else{
        $validationPassed = true;
    }
  


  
}//end if 

?>






<!-- form  -->

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
    

    <script>
       
       
    function submitForm() 
    {
        // Read the value of the hidden input field
        var validationPassed = document.getElementById('validationPassed').value;

        // Check if validationPassed is true to submit the form to "sendPasswordReset.php"
        if (validationPassed =='true') {


            document.getElementById('resetForm').action = 'sendPasswordReset.php';
            // return true;

            
           // Submit the form automaticaly
           document.getElementById('resetForm').submit();

        } 
    }

    </script>

  

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
                <div class="p-6 space-y-6 md:space-y-6 sm:p-8">

                    <h1
                        class="text-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        ادخل البريد الإلكتروني لإعادة تعيين كلمة المرور
                    </h1>

                  
                    <!-- <?php echo $validationPassed ? 'true' : 'false'; ?> -->


                    <form id="resetForm"   class="space-y-6 md:space-y-6" onsubmit="submitForm()"  action="forgot-password.php" method="POST" >
                      


                    <!-- check if not found the email -->
                    <?php 

                        if(isset($error)|isset($foundEmail))
                           {  
                        
                               
                               if(!empty($error)){
                                 

                                    echo   "  <center > <strong > <small > $error </small> </strong>  <center > <br > "   ;
                                 
                                 }
                                 else{
                                    echo   "  <center > <strong > <small > $foundEmail </small> </strong>  <center > <br > "   ;

                                 }

                                
                            }
                          

                        ?>
                            
                            <?php 
                            echo "<script> submitForm(); </script>";
                            ?>

                          
                          <input type="hidden" id ="validationPassed" name="validationPassed" value="<?php echo $validationPassed ? 'true' : 'false'; ?>">


                        <div>
                            <label for="email"
                                class=" text-right  block mb-2 text-sm font-medium text-gray-900 dark:text-white">البريد الإلكتروني</label>
                            <input type="email" name="email" placeholder="name@google.com" id="email" class="inputBoxs" 
                                required>
                        </div>
                        

                 
                        <button   id="submitBtn" type= "submit" name="submit"   class=" mt-2  w-full h-12 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center border border-gray-300">
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


    <script src="./custom.js"></script>



        
    <!-- JavaScript code to handle the form submission -->
       <!-- <script src="./submitFormValidation.js"></script> -->
  

</body>

</html>

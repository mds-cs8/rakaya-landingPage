<!-- processing -->
<?php


session_start();

include 'conn-db.php';

$userId=0;  
$name="";
$email="";
$phone="";
$password=0;
$gender="";
$userType="";

// get user id
if(isset($_GET['id']) )
{
    $userId=$_GET['id'];

     //fetch data
    $sql="SELECT * FROM user WHERE id = '$userId' ";
    $res=mysqli_query($mysqli,$sql);
    $row =mysqli_fetch_array($res) ;

    if($row)
    { 
    $name= $row['name'];
    $email= $row['email'];
    $phone= $row['phoneNumber'];
    $password= $row['password'];
    $gender= $row['gender'];
    $userType= $row['userType'];

    }
    else
    {
        echo "nooo fetch";
    }



}

// update user record


if (isset($_POST['edit']) ) 
{   
     $usersimg="";
    $img_name = $_FILES['UserImg']['name'];
	$img_size = $_FILES['UserImg']['size'];
	$tmp_name = $_FILES['UserImg']['tmp_name'];
	$error = $_FILES['UserImg']['error'];
    $errors=[];

     //validate uploaded image
    if ($error === 0) {
        // check size
		if ($img_size > 2000000) {
            // 2mb size
			$errors[] = "نعتذر حجم الملف كبير";
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 
                // check exstinon
			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                // upload img to our folder
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
$n= $_POST['name1'];
$hashPass= password_hash($_POST["password"], PASSWORD_DEFAULT);
$e= $_POST['email'];
$phoneN= $_POST['phone'];
// $g= $_POST['gender'];
// $userT= $_POST['users'];


$sql = "UPDATE user
SET name = '$n',
    email = '$e',
    phoneNumber = '$phoneN',
    password= '$hashPass'
WHERE id = '$userId'";

echo "after update";
    $stmt = $conn->prepare($sql);

    $stmt->execute();
   

    //check if it work
    if( $stmt){
    
        echo 'ok';
     $_SESSION['updateMessage']="تم تحديث بيانات المستخدم بنجاح ";
      header('location: dashboard.php'); //go to dashboard
      

    }
    else{
        echo "no";
    }
}//end if




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
    <link rel="stylesheet" href="signUp.css">
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

<div data-aos="fade-up" data-aos-duration="1000" class="signupBox2">

    <div class=" bg-gray-100 p-4 space-y-4 md:space-y-6 sm:p-8">
        
        <h1 class="text-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            تحديث البيانات
        </h1>
                
         <form class="space-y-2 md:space-y-6 ,form" action="adminEdit.php" method="POST" enctype=multipart/form-data >

                        <!-- name -->
                        <div class="name">

                        <div class="name1">

                            <label for="name1"
                                class="mb-4 text-sm font-medium  text-gray-900  dark:text-white">الاسم
                                </label>

                            <input type="text" name="name1" id="name1"
                                class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-full p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs"
                                placeholder="سارة"    value="<?php echo $name ?>" >
                            <small id="name1_msg"></small>

                        </div>



                        <!-- email -->
                        <div class="email-phone">
                        <div class="email">
                            <label for="email"
                                class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">الايميل</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-full p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs"
                                placeholder="name@google.com"  value="<?php echo $email ?>" >

                            <small id="email_msg"></small>
                            
                        </div>

                        <!-- phone number -->
                        <div class="phone">
                            <label for="phone" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">رقم
                                الهاتف</label>
                            <input type="tel" id="phone" name="phone"
                                class="bg-gray-50  text-gray-900 sm:text-sm rounded-md block w-full p-2.5 dark:placeholder-gray-400 dark:text-white inputBoxs"
                                    value="<?php echo $phone ?>">
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
                                >

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
                                >
                            <small id="repassword_msg">

                            </small>
                        </div>



                        </div>
                        <div class="img ">

                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="file_input">رفع صورة</label>
                                <input class="w-full h-10 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" name="UserImg"
                         
                                >
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">الرجاء اختيار الصور بالامتداد التالي png , jpg , jpeg والحجم لا يزيد عن 2ميقا</p>



                        </div>


                        <!-- gender & userType -->
                        <div class="genderAndUserType">

                        <!-- gender -->
                        <div class="inline-flex flex gender ">

                            <label for="gender" class=" ml-3 mb-2 text-sm font-medium text-gray-900 dark:text-white">الجنس</label>

                            <input type="radio" id="female" name="gender" value="female"
                                class="ml-2 border border-gray-300"  <?php echo $gender =="female" ? 'checked':'' ?>   >
                            <label for="female">أنثى</label>

                            <input type="radio" id="male" name="gender" value="male"
                                class="mr-3   ml-2 bg-gray-50 border border-gray-300"  <?php echo $gender =="male" ? 'checked':'' ?> >
                            <label for="male">ذكر</label>

                        </div>



                        <!-- user type -->
                        <div class=" inline-flex flex userType">

                            <label for="users" class=" ml-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                حدد الفئة </label>

                            <select name="users" id="users" size="1"
                                class=" py-px  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 , users"
                                value="<?php echo $userType?>" >

                                <option value="Developer" <?php echo $userType =="Developer" ? 'selected':'' ?>  >مطور</option>
                                <option value="Consultant"  <?php echo $userType =="Consultant" ? 'selected':'' ?>  > الاستشارات</option>
                                <option value="Clint"   <?php echo $userType =="Clint" ? 'selected':'' ?> >عميل</option>
                                <option value="Intern"   <?php echo $userType =="Intern" ? 'selected':'' ?>   >متدرب</option>
                                <option value="admin"    <?php echo $userType =="admin" ? 'selected':'' ?>  >مسؤول (ADMIN)</option>
                            </select>

                        </div>

                        </div>





                        <!-- submit -->
                        <button type="submit" id="edit-btn" name="edit"
                        class="w-full h-12 text-gray-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center">تحديث</button>

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

<script src="./custom.js"></script>

</body>
</html>
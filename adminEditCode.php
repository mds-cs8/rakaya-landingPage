
<?php
// update user record processing 


session_start();

include 'conn-db.php';

$userId = 0;
if (isset($_POST['save'])) {

    $userId = $_SESSION['id'];
    echo   $userId;

    $usersimg = "";
    $img_name = $_FILES['UserImg']['name'];
    $img_size = $_FILES['UserImg']['size'];
    $tmp_name = $_FILES['UserImg']['tmp_name'];
    $error = $_FILES['UserImg']['error'];
    $errors = [];

    //validate uploaded image
    if ($error === 0) {
        // check size
        if ($img_size > 2000000) {
            // 2mb size
            $errors[] = "نعتذر حجم الملف كبير";
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");
            // check exstinon
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                // upload img to our folder
                $img_upload_path = 'usersImg/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                $usersimg = $new_img_name;
            } else {
                $errors[] = " jpg ,  jpeg , png الرجاء رفع صورة بالامتداد التالي ";
            }
        }
    } else {
        $errors[] = "لم يتم اختيار صورة ";
    }




    //update code
    $n = $_POST['name1'];
    $hashPass = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $e = $_POST['email'];
    $phoneN = $_POST['phone'];
    $g = $_POST['gender'];
    $userT = $_POST['users'];


    $sql = "UPDATE user
SET name = '$n',
    email = '$e',
    phoneNumber = '$phoneN',
    password= '$hashPass',
    UserImg ='$usersimg',
    gender ='$g',
    userType='$userT'
WHERE id = '$userId'";


    $stmt = $conn->prepare($sql);

    $stmt->execute();


    //check if it work
    if ($stmt) {

        echo 'ok';
        $_SESSION['InfoMessage'] = "تم تحديث بيانات المستخدم بنجاح ";
        header('location: dashboard.php'); //go to dashboard
        echo "after update";
    } else {
        echo "no";
    }
} //end if




?>
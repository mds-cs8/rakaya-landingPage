<?php


session_start();

include 'conn-db.php';

$email =   $_SESSION['user']['email']; //get user email
echo  $_SESSION['user']['id']; //get user email

//delete code

if (isset($_POST['submitDelete'])) {
    echo "delete";

    // $sql = "DELETE FROM user
    //     WHERE id = '$id'";

    $del = "DELETE FROM user WHERE email = '$email' ";
    // $stmt = $conn->prepare($del);
    // $stmt->execute();

    $stmt = mysqli_query($mysqli, $del);

    //check if it work
    if ($stmt) {
        session_unset();
        header('location:login.php');
        // exit();
    } else {
        echo "not deleted";
    }
}

?>
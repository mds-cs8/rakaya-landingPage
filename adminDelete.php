<?php 

include "conn-db.php"; 

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $stm = "DELETE FROM user WHERE id = $user_id";
    $q=$conn->prepare($stm);
    $q->execute();
    $data=$q->fetch();

    if(!$data){
        header('location: dashboard.php');
    } }

?>
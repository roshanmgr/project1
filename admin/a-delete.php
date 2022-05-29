<?php

    include "../database/config.php";

    session_start();
    
    // if(!isset($_SESSION['mobile_num']))
    // {
    //     // not logged in
    //     header('Location: ../login.php');
    //     exit();
    // }


    $id = $_GET['id'];

    $deleteQuery = "DELETE FROM register WHERE register_id='$id'";

    // echo $deleteQuery;

    if(mysqli_query($conn,$deleteQuery)){

        header("location:a-usertable.php");

        $_SESSION['success'] = "--- User deleted succedfully ---";
        // echo "delete";

    } else{

        $_SESSION['success'] = "Unable to delete data";
        // echo "unable to delete";
    }


?>
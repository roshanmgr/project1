<?php
include("../database/config.php");
session_start();

$mobile_num = $password = "";
$err = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty(trim($_POST['mobile_num'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter mobile_num + password";
    }
    else{
        $mobile_num = trim($_POST['mobile_num']);
        $password = md5(trim($_POST['password']));
    }


    $sql = "SELECT * FROM user WHERE mobile_num = '$mobile_num' and password = '$password'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    $count = mysqli_num_rows($result);

    if($count == 1) {

        $_SESSION['role'] = $row['role'];


        $mobile_num = $row['mobile_num'];
        $_SESSION['user_name'] = $row['username'];

        if($_SESSION['role'] == "admin"){
        header("location: ../admin/a-dashboard.php");
    }else {
        header("location: ../user/u-dashboard.php");
    }
    }else{
        //  echo $password;
        // echo '<script>alert("Either mobile number or Password is invalid")</script>';
        $err = "* Your Admin Login Name or Password is invalid";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/dynamic.css">

</head>
<body>
    <?php
    include('header.php');
    ?>
<form class="login-form" method="post">
        <h3>login now </h3>
        <div class="err">
    <?php 
    
    error_reporting(E_ERROR | E_PARSE);     

    echo $err; 
    
    ?>
    </div>
        <input type="text" name="mobile_num" placeholder="Mobile number" autocomplete="off" class="box">
        <input type="password" name="password" placeholder="your password" class="box">
        <!-- <p><a href="forgetpassword.php">forget password ?</a></p> -->
        <p>don't have an account <a href="../user/u-register.php">create now</a></p>
        <button type="submit" name="submit" class="btn">Login</button>
    </form> 

    
</body>
</html>


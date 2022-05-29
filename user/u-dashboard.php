<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    // header("location: a-login.php");
}


?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="css/a-dashboard.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="v<?php
    session_start();
    // if(!isset($_SESSION['mobile_num']))
    // {
    //     // not logged in
    //     header('Location: ../commonPage/login.php');
    //     exit();
    // }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../css/a-dashboard.css">
  
</head>

<body>
   

    <div class="side-nav">
        <header><a href="#" class="logo">  <span style="color:brown">S</span><span style="color:blueviolet">A</span><span style="color:greenyellow">H</span><span style="color:red">A</span><span style="color:grey">Y</span><span style="color:yellowgreen">O</span><span style="color:purple">G</span><span style="color:lavender">I</span> </a></header>
        <ul>
    
            <a href="#">
                <li><span class="menu">DashBoard</span></li>
            </a>
            <a href="loanrequest.php">
                <li><span class="menu">Request Loan</span></li>
            </a>
            <a href="admindonorHistory.php">
                <li><span class="menu">History</span></li>
            </a>
            <a href="../commonPage/logout.php">
                <li><span class="menu">Log Out</span></li>
            </a>
        
        </ul> 
    </div>
    <div class="content">
        
            <div class="header">
                Hello! <?php 
                            echo $_SESSION['user_name']; 
                        ?>
            </div>
            <p>
                Welcome to SAHAYOGI Dashboard
            </p>
    </div>

</body>
</html>
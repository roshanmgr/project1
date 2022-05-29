<?php
    session_start();
    if(!isset($_SESSION['user_name']))
    {
        // not logged in
        header('Location: ../commonPage/login.php');
        exit();
    }

    // echo $_SESSION['user_name'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/a-dashboard.css">
  
</head>

<body>
   

    <div class="side-nav">
        <header><a href="#" class="logo">  <span style="color:brown">S</span><span style="color:blueviolet">A</span><span style="color:greenyellow">H</span><span style="color:red">A</span><span style="color:grey">Y</span><span style="color:yellowgreen">O</span><span style="color:purple">G</span><span style="color:lavender">I</span> </a></header>
        <ul>
    
            <a href="a-usertable.php">
                <li><span class="menu">User</span></li>
            </a>
            <a href="loantable.php">
                <li><span class="menu">Loan Request</span></li>
            </a>
            <!-- <a href="#">
                <li><span class="menu">History</span></li>
            </a> -->
            <a href="../commonPage/logout.php">
                <li><span class="menu">Log Out</span></li>
            </a>
        
        </ul> 
    </div>
    <div class="content">
        
            <div class="header">
                Hello !<?php 
                            echo $_SESSION['user_name']; 
                        ?>
            </div>
            <p>
                Welcome to Admin Dashboard
            </p>
    </div>

</body>
</html>
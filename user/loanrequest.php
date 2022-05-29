
<!-- <?php include 'u-header.php'?> -->


<?php

    if(isset($_POST['submit'])) {

        include ("../database/config.php");

        $loanamount = $_POST['loanamount'];
        $email = $_POST['email'];
        $esewa_username = $_POST['esewa_username'];
        $esewa_num = $_POST['esewa_num'];    

        $sqlquery = "INSERT INTO loanrequest (loanamount, email, esewa_username, esewa_num) VALUES ('$loanamount', '$email', '$esewa_username', '$esewa_num')";

        echo $sqlquery;


            if (mysqli_query($conn, $sqlquery)){

                $success = "Request form submit succesfully";

            } else {
                echo "Error: " . $sqlquery . "<br>" . mysqli_error($conn);
            }

    }

?>

    <head>
        <title>Loan Request Form</title>
        <link rel="stylesheet" href="../css/form.css">
        <link rel="stylesheet" href="../css/dynamic.css">

    </head>

    
      <div class="success">
          <?php 
          
            error_reporting(E_ERROR | E_PARSE);     

            echo $success; 
          
          ?>
      </div>

    <center>
    <div class="container">
        <div class="title">Loan Request Form</div>
        <div class="content">
            
            <form action="" name="regForm" method="POST" onsubmit="return formValidation()">
                <div class="user-details">
                    
                    <div class="input-box">
                        <span class="details">Loan Amount(100--5,000)</span>
                        <input type="number" placeholder="Apply Amount between 100 - 5,000" id="loanamount" name="loanamount">
                        <span style="color:red" id="rLoanamountErr"></span>
                    </div>

                     <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" placeholder="Enter email" id="email" name="email">
                        <span style="color:red" id="rEmailErr"></span>
                    </div>

                    <div class="input-box">
                        <span class="details">Esewa Username</span>
                        <input type="text" placeholder="Enter Your Esewa Username" id="esewa_username" name="esewa_username">
                        <span style="color:red" id="rEsewa_usernameErr"></span>
                    </div>

                    
                    <div class="input-box">
                        <span class="details">Esewa Number</span>
                        <input type="tel" placeholder="Enter Your Esewa No." id="esewa_num" name="esewa_num">
                        <span style="color:red" id="rEsewa_numErr"></span>
                    </div>
            
            </div>

            <div class="button">
            <input type="submit" class="submit" value="Submit" name="submit">
            <!-- <button type="submit" name="submit" id="submit">Submit</button> -->
            </div>
        </form>

        </div>
        </div>
    </div>
    </center>

    <script src="../js/form.js"></script>

<!-- <?php include 'footer.php'?> -->
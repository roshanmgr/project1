<?php
    include "../database/config.php";
    session_start();
    if(!isset($_SESSION['user_name']))
    {
        // not logged in
        header('Location: ../commonPage/login.php');
        exit();
    }

    
?>

    <?php
        if(isset($_POST['submit'])) {
    
            $name = $_POST['name'];
            $mobile_num = trim($_POST['mobile_num']);
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $password = md5(trim($_POST['password']));
            $guardian_name = $_POST['guardian_name'];
            $relationship = $_POST['relationship'];
            $guardian_num = $_POST['guardian_num'];
    
        
    
            $insert = "INSERT INTO register (name, mobile_num, age, gender, password, guardian_name, relationship, guardian_num) VALUES ('$name', '$mobile_num', '$age', '$gender', '$password', '$guardian_name', '$relationship', '$guardian_num')";

            // echo $insert;

            if(mysqli_query($conn,$insert)){
                
                header("location: a-usertable.php");

                $_SESSION['success'] = "--- User added succedfully ---";

              
               
            } else {

                $_SESSION['success'] = "Unable to add data";
                
                // echo "unable to insert";
            }

            
        }
    ?> 

<?php include 'a-header.php'?>

    <head>
        <title>Add User</title>
        <link rel="stylesheet" href="../css/form.css">
    </head>

    <div class="title">
        <h1>Add User</h1>
    </div>

    <div style="float: left; margin-left: 70px; ">
        <button>
            <a style="text-decoration: none; font-weight: bold; color: black; font-size: 16px; "href="a-usertable.php">
                Back
            </a>
        </button>
    </div>

    <br>
    

    <center>
    <div class="container">
        <div class="title">Registration Form</div>
        <div class="content">
            
            <form action="" name="regForm" method="POST" onsubmit="return formValidation()">
                <div class="user-details">
                    
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" placeholder="Enter your name" id="name" name="name">
                        <span style="color:red" id="rNameErr"></span>
                    </div>
                    
                    <div class="input-box">
                        <span class="details">Mobile Number</span>
                        <input type="tel" placeholder="Enter Your mobile No." id="mobile_num" name="mobile_num">
                        <span style="color:red" id="rMobile_numErr"></span>
                    </div>
                    <div class="input-box">
                        <span class="details">Age</span>
                        <input type="number" placeholder="Enter your age" id="age" name="age">
                        <span style="color:red" id="rAgeErr"></span>
                    </div>
                    
                    <div class="input-box">
                        <span class="details">Gender</span>
                        <select id="gender" name="gender">
                        <option value="">None</option>
                        <option name= "Gender" value="Male">Male</option>
                        <option name= "Gender" value="Female">Female</option>
                        <option name= "Gender" value="Others">Others</option>
                        </select>
                        <br>
                        <span style="color:red" id="rGenderErr"></span>
                    </div>

                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" placeholder="Enter Password" id="password" name="password">
                        <span style="color:red" id="rPasswordErr"></span>
                    </div>
            <div class="input-box">
                <span class="details">Guardian Name</span>
                <input type="text" placeholder="Enter Guardian Name" id="guardian_name" name="guardian_name">
                <span style="color:red" id="rGuardian_nameErr"></span>
            </div>

            <div class="input-box">
                <span class="details">Relationship</span>
                <input type="text" placeholder="Enter Relation" id="relationship" name="relationship">
                <span style="color:red" id="rRelationshipErr"></span>
            </div>


            <div class="input-box">
                <span class="details">Guardian Number</span>
                <input type="tel" placeholder="Enter your address" id="guardian_num" name="guardian_num">
                <span style="color:red" id="rGuardian_numErr"></span>
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


</body>
</html>
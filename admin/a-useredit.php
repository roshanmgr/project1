<?php
    include "../database/config.php";

    session_start();

    if(!isset($_SESSION['user_name']))
    {
        // not logged in
        header('Location: ../commonPage/login.php');
        exit();
    }
    
    $id = $_GET['id'];

    $query = "SELECT * FROM register WHERE register_id=$id";

    $result = mysqli_query($conn,$query);

    $row = mysqli_fetch_assoc($result);   //fetch single row

    // print_r($row);

    // exit();

?>


<?php

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mobile_num = $_POST['mobile_num'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    // $password = $_POST['password'];
    $guardian_name = $_POST['guardian_name'];
    $relationship = $_POST['relationship'];
    $guardian_num = $_POST['guardian_num'];

        $update = "Update register SET name = '$name',mobile_num='$mobile_num', age ='$age', gender ='$gender', guardian_name = '$guardian_name', relationship = '$relationship',guardian_num='guardian_num' WHERE register_id=$id";

    if(mysqli_query($conn,$update)){

        $_SESSION['success'] = "--- User update succedfully ---";
        // echo '<script>alert("Update succesfully")</script>';
       
    } else {

        $_SESSION['success'] = "Unable to Update data";
        // echo '<script>alert("Unable to Update")</script>';
    }
    
    header("Location: a-usertable.php");
}
?>

<?php include 'a-header.php'?>
    <head>
        <title>Registration Form</title>
        <link rel="stylesheet" href="../css/form.css">

    </head>

    <div class="title">
        <h1>Edit User Information</h1>
    </div>

    <div style="float: left; margin-left: 70px; ">
        <button >
            <a style="text-decoration: none; font-weight: bold; color: black; font-size: 16px;" href="a-usertable.php">
                Back
            </a>
        </button>
    </div>
    
    <br>
    
    <center>
        <div class="container">
            <div class="content">
                <form action="" name="regForm" method="POST" onsubmit="return formValidation()">
                    <div class="user-details">

            <div class="input-box">
                <span class="details">Full Name</span>
                <input type="text" placeholder="Enter your name" id="name" name="name" 
                value=<?php echo $row['name']?> maxlength = "40" required>
                <span style="color:red" id="rNameErr"></span>
            </div>

            
            <div class="input-box">
                <span class="details">Mobile Number</span>
                <input type="text" placeholder="Enter your number" id="mobile_num" name="mobile_num" 
                value=<?php echo $row['mobile_num']?> >
                <span style="color:red" id="rmobile_numErr"></span>
            </div>
            
            <div class="input-box">
                <span class="details">Age</span>
                <input type="text" placeholder="Enter your age" id="age" name="age" 
                value=<?php echo $row['age']?> >
                <span style="color:red" id="rAgeErr"></span>
            </div>
            
            <div class="input-box">
                <span class="details">Gender</span>
                <select name="Gender" id="gender" 
                value=<?php echo $row['gender']?> >
        
                    <option value="Male"
                    <?php if($row['gender'] == 'Male'){ 
                        ?> selected <?php
                    } ?>
                    >Male</option>
        
                    <option value="Female"
                    <?php if($row['gender'] == 'Female'){ 
                        ?> selected <?php
                    } ?>
                    >Female</option>
        
                    <option value="Others"
                    <?php if($row['gender'] == 'Others'){ 
                        ?> selected <?php
                    } ?>
                    >Others</option>
        
                </select>
                <br>
                <span style="color:red" id="rGenderErr"></span>
            </div>

            <div class="input-box">
                <span class="details">Guardian Name</span>
                <input type="text" placeholder="Enter name" id="guardian_name" name="guardian_name" 
                value=<?php echo $row['guardian_name']?> >
                <span style="color:red" id="rGuardian_nameErr"></span>
            </div>

            <div class="input-box">
                <span class="details">Relationship</span>
                <input type="text" placeholder="Enter your address" id="relationship" name="relationship" 
                value=<?php echo $row['relationship']?> >
                <span style="color:red" id="rRelationshipErr"></span>
            </div>

            <div class="input-box">
                <span class="details">Guardian Name</span>
                <input type="tel" placeholder="Enter name" id="guardian_num" name="guardian_num" 
                value=<?php echo $row['guardian_num']?> >
                <span style="color:red" id="rGuardian_numErr"></span>
            </div>


            </div>

            <div class="button">
                <input type="submit" class="submit" value="Submit" name="submit">
            </div>

        </form>
        </div>
    </div>
    </center>

<script src="../js/editValidation.js"></script>

</body>
</html>
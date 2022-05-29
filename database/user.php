<?php
    include('../database/config.php');
    // $sql = "SELECT * FROM `register`";
    // $result = mysqli_query($conn,$sql);
    // $row = mysqli_fetch_assoc($result);

    // $name = $row['name'];
    // $password = $row['password'];
    // $mobile_num =$row['mobile_num'];

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $password =md5($_POST['password']);
        $mobile_num =$_POST['mobile_num'];

            $sql1 = "INSERT INTO `user`(`username`, `password`, `mobile_num`, `role`) VALUES ('$name','$password','$mobile_num', 'guest')";
            $result1 = mysqli_query($conn,$sql1);
            if($result1){
                echo "data inserted into the user table";
                var_dump($result1);
            }
            else{
                echo "not inserted into the user table";
            }

        }
?>
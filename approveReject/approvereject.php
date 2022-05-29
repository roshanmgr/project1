<?php
    include('../database/config.php');

    $id = $_GET["requestId"];
    $status = $_GET["status"];
    


    $sql = "update `loanrequest` set Status = '$status' where loan_id= $id";
    mysqli_query($conn, $sql);

    header("location: ../admin/a-dashboard.php");

?>
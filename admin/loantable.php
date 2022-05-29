<?php

    session_start();
    if(!isset($_SESSION['user_name']))
    {
        // not logged in
        header('Location: ../commonPage/login.php');
        exit();
    }
?>

<?php include ('a-header.php')?>

    <head>
        <title>Loan Requester Table</title>
    </head>

    <div class="title">
        <h1>Loan Request Information</h1>
    </div>

    <div class="search" style="display: inline-block;float: right; margin-right: 100px;">
        <h4>Search through Status</h4>
        
        <form action="loantable.php" method="get">
            <input type="hidden" name="pages" value="1"> 
                <select name="search" >
                    <option value="1">Approved</option>
                    <option value="2">Rejected</option>
                    <option value="0">Pending</option>
                    <option value="" selected>----</option>
                </select>
            <button type="submit">Search</button>
        </form> 
    </div>

    <br><br>

    <center>
    <table class="content-table">
        <thead>
            <tr>
                <th>S.N</th>
                <th>Loan Amount</th>
                <th>Email</th>
                <th>Esewa Username</th>
                <th>Esewa Number</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
    </div>

    <?php
        include "../database/config.php";
        
        $data_per_page= 10;

        if(isset($_GET['pages'])){
            $page  = $_GET["pages"];
        }
        else {
            $page = 1;
        }

        $start_from=($page-1)*$data_per_page;

        if(isset($_GET['search'])){
            $search = $_GET['search'];
        }else{
            $search="";
        }

        $sql = "select * from `loanrequest` where  status like '%$search%' limit $start_from,$data_per_page";

        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result)){
            // $id = 1;
            if(isset($_GET['pages'])){
            $i = (($_GET['pages']-1)*10)+1;
            }else{
                $i=1;
            }
            while($row = mysqli_fetch_assoc($result)){
            
    ?>

    <tbody>
    <tr>
        <td><?php echo $i;?></td>
        <!-- <td><?php echo $row ['id'];?></td> -->
        <td><?php echo $row ['loanamount']?></td>
        <td><?php echo $row ['email']?></td>
        <td><?php echo $row ['esewa_username']?></td>
        <td><?php echo $row ['esewa_num']?></td>
        <td>
            <?php
                if ($row['status']==0){
                    echo
                    '<p>Pending...</p>';
                }else if ($row['status']==1){
                    echo
                    '<p>Approved</p>';
                }else if($row['status']==2){
                    echo
                    '<p>Rejected</p>';
                }
            ?>
        </td>
        <td>
        <?php
            if ($row['status']==0){
        ?>
                <button class="approve" id="btn">
                    <a href="../approveReject/approvereject.php?requestId=<?php echo $row ['loan_id'];?>&status=1" onclick = "sendMail('<?php echo $row['email'];?>')">Approve</a>
                </button>
                <button class="reject" id="btn">
                    <a href="../approveReject/approvereject.php?requestId=<?php echo $row ['loan_id'];?>&status=2" onclick = "sendMail('<?php echo $row['email'];?>')">Reject</a>
                </button>
            <?php
                }
            ?>
           
        </td>
    </tr>
    <?php
        $i++;
        }

    }else{

    ?>
        <tr><td colspan="5">No Records found

        <?php }
        ?>

    </tbody>
    </table>

    <?php

        error_reporting(E_ERROR | E_PARSE);        

        $sql = "select * from `loanrequest`";
        $result = mysqli_query($conn,$sql);
        $total_data = mysqli_num_rows($result);
        // echo $total_data;
        $total_pages = ceil($total_data/$data_per_page);
        // echo $total_pages;


        for($i=1;$i<=$total_pages;$i++){


            echo '<a style="font-size:12px;color:red;padding: 5px;bottom:0;" href="loantable.php?pages='.$i.'&search='.$_GET['search'].'   ">'.$i.'</a>';
        }
        
    ?>

    <script>
      function sendMail(m){
         parent.location = "mailto:"+m;
      }
    </script> 

</center>
</body>
</html>
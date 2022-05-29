<?php
    session_start();
    // if(!isset($_SESSION['username']))
    // {
    //     // not logged in
    //     header('Location: ../login.php');
    //     exit();
    // }
?>

<?php include ('a-header.php')?>
<head>

    <title>Users</title>
</head>

   
    <div class="title">
        <h1>user</h1>
    </div>
    <div class="addInfo">
        <h4>Add User:</h4>
        <button class="add" ><a href="add.php">Add</a></button>
    </div>
    <div class="search">
        <h4>Search <i class="fa-solid fa-magnifying-glass"></i> </h4>
        
        <form action="admindonorHistory.php" method="get">
            <input type="hidden" name="pages" value="1"> 
            <input type="text" name="search" value="" placeholder="Search through name">
            <button type="submit">Submit</button>
        </form> 
    </div>

    <div class="success">
        <?php        
                error_reporting(E_ERROR | E_PARSE);
                echo $_SESSION['success']; 

        ?>

    </div>


    <center>
    <table class="content-table">
        <thead>
            <tr>
                <th>S.N</th>
                <!-- <th>Id</th> -->
                <th>Name</th>
                <th>Mobile number</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
        </thead>
    

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

             $sql = "select * from `register` where  name like '%$search%' limit $start_from,$data_per_page";

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
        <td><?php echo $row ['name']?></td>
        <td><?php echo $row ['mobile_num']?></td>
        <td><?php echo $row ['gender']?></td>
        <td> 
            <button class="edit">
                <a href="a-useredit.php?id=<?php echo $row['register_id'];?>">Edit</a>
            </button> 
            <button class="delete">
                <a href="a-delete.php?id=<?php echo $row['register_id'];?>" onclick="return confirm('Do you want to delete ?')";>Delete</a>
            </button>
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

        $sql = "select * from `register`";
        $result = mysqli_query($conn,$sql);
        $total_data = mysqli_num_rows($result);
        // echo $total_data;
        $total_pages = ceil($total_data/$data_per_page);
        // echo $total_pages;


        for($i=1;$i<=$total_pages;$i++){


            echo '<a style="font-size:12px;color:red;padding: 5px;bottom:0;" href="a-usertable.php?pages='.$i.'&search='.$_GET['search'].'   ">'.$i.'</a>';
        }
        
    ?>
    </center>
</body>
</html>
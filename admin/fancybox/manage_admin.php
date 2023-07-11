<?php 
include_once '../config/database.php';
include('header.php');
$db = new Database();

$sql = "select * from admin";
$result = $db->select($sql);

if(isset($_GET['deladmin'])){
    $del_ad = $_GET['deladmin'];

    $sql = "delete from admin where id = '$del_ad'";
    $del = $db->delete($sql);

    if($del){
        header('location: manage_admin.php');
    }else{
        echo "<script> alert(Deletation Failed!) </script>";
    }
}

?>




    <div class="col-md-9 pe-4">
    <div class="admin_add_button">
        <a href="add_admin.php" class="btn">Add NEW ADMIN</a>
    </div>


<div class="admin_list_table">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php
                    if($result){
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                    <tr class="tr_manage_admin">
                        <td scope="row"><?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['phone'];?></td>
                        <td><?php echo $row['address'];?></td>
                        <?php
                            if($row['Id'] != 1){
                                ?>
          
                        <td><a href="?deladmin=<?php echo $row['Id'] ?>" onclick="return confirm(`Are you sure to delete <?php echo $row['name'] ?> as a admin?`)" class="btn btn-sm btn-outline-danger">Remove</a></td>
                        <?php
                            }else{
                                ?>
                                <td></td>
                                <?php
                            }
                        ?>
                        
                        
                    </tr>
<?php
        }
    }
?>
   
                </tbody>
            </table>
        </div>
    </div>


    
    </div>
    








<?php include('footer.php');?>

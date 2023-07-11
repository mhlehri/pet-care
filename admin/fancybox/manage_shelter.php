<?php 
include_once '../config/database.php';
include('header.php');
$db = new Database();

$sql = "select * from shelter";
$result = $db->select($sql);

if(isset($_GET['deladmin'])){
    $del_ad = $_GET['deladmin'];

    $sql = "delete from shelter where id = '$del_ad'";
    $del = $db->delete($sql);

    if($del){
        header('location: manage_shelter.php');
    }else{
        echo "<script> alert(Deletation Failed!) </script>";
    }
}

?>




    <div class="col-md-9 pe-4">

<div class="admin_list_table">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>

                        <th scope="col">Sr no.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                
                        <th scope="col">Pet Name</th>
                        <th scope="col">Pet</th>
                        <th scope="col">days</th>
                        <th scope="col">Actions</th>

                    </tr>
                </thead>
                
                <tbody>
                <?php
                    if($result){
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                    <tr class="tr_manage_admin">
                        <td scope="row"><?php echo $row['id'];?></td>
                        <td ><?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['number'];?></td>
                        <td><?php echo $row['petname'];?></td>
                        <td><?php echo $row['spet'];?></td>
                        <td><?php echo $row['days'];?></td>
                      
                        <td><a href="?deladmin=<?php echo $row['id'] ?>" onclick="return confirm(`Are you sure to delete <?php echo $row['name'] ?> as a admin?`)" class="btn btn-sm btn-outline-danger">Remove</a></td>
            
                   
                        
                        
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

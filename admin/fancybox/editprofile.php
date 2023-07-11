<?php 
include_once '../config/database.php';
include('header.php'); 
$db = new Database();

$query = "select * from admin where id = '$id'";
$result = $db->select($query);

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    

    if(empty($name) || empty($phone) || empty($address))
    {
        echo  "<script>alert(`Field must not be empty!`);</script>";
    }
    else
    {
        $sql = "update admin set name = '$name', phone = '$phone', address = '$address' where id = '$id'";
        $res = $db->update($sql);

        if($res)
        {
            echo "<script>alert(`Updated Successfully!`);</script>";
            header("Refresh:0");
        }
        else
        {
            echo  "<script>alert(`Update Failed!`);</script>";
        }
    }
}

?>


                    
<?php
    if($result){
    while($row = mysqli_fetch_assoc($result)){
?>
    <div class="col-md-9">
        <div class="container-fluid edit_main_div">                    
            <div class="contain_edit">                                
        
                <form action="editprofile.php" method="post">
                    <legend class="text-center"> Edit Your Information</legend>
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?php echo $row['name'];?>">
                    
                    <?php
                        if($id == 1){
                    ?>

                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="<?php echo $row['email'];?>">
                    
                    <?php
                        }else{
                    ?>

                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="<?php echo $row['email'];?>" disabled>
                    
                    <?php
                        }                        
                    ?>

                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" value="<?php echo $row['phone'];?>">
                    <label for="address" class="form-label">address</label>
                    <input type="text" name="address" class="form-control mb-3" id="address" value="<?php echo $row['address'];?>">
                    <button type="submit" value="Submit" class="form-control btn btn-outline-success form-control" style="">SUBMIT</button>
                </form>
            
            </div>                                
        </div>
    </div>
<?php
        }
    }
?>  
                   


                    
                    
                

        
<?php include('footer.php');?>
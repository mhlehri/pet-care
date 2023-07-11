<?php 
include_once '../config/database.php';
include('header.php'); 

$db = new Database();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    if(empty($name) || empty($email) || empty($password) || empty($phone) || empty($address)){

        echo  "<script>alert(`Field must not be empty!`);</script>";
    }else{
        $sql = "insert into admin (name, email, phone, address, password) values('$name', '$email', '$phone', '$address', '$password')";
        $result= $db->insert($sql);

        if($result){
            echo "<script>alert(`Add Successfully!`);</script>";
            
        }else{
            echo  "<script>alert(`add Failed!`);</script>";
        }
    }
}
?>


           
            <div class="col-md-9">
                <div class="container-fluid edit_main_div">                    
                    <div class="contain_edit">
                        
                
                    <form action="add_admin.php" method="post">
                        <legend class="text-center">ADD NEW ADMIN</legend>
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="email">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">                             
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone">
                        <label for="address" class="form-label">address</label>
                        <input type="text" name="address" class="form-control mb-3" id="address">
                        <button type="submit" value="Submit" class="form-control btn btn-outline-success">SUBMIT</button>
                    </form>
                    
                    </div>
                        
                </div>
            </div>


             
                   


                    
                    
                

        
<?php include('footer.php');?>
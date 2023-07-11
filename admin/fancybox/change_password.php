<?php 
include_once '../config/database.php';

include('header.php'); 

$db = new Database();


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $o_pass = $_POST['o_pass'];
    $n_pass = $_POST['n_pass'];
    $r_pass = $_POST['r_pass'];

    $sql = "select * from admin where id = '$id'";
    $res = $db->select($sql);

    if($res){
        while($row = mysqli_fetch_assoc($res)){

            if($row['password'] != $o_pass){
                echo  "<script>alert(`Old Password did not match!`);</script>";
            }else{
                if($n_pass != $r_pass){
                    echo "<script>alert(`Confirm password did not match!`);</script>";
                }else{
                    $isql = "update admin set password = '$n_pass' where id = '$id'";
                    $ires = $db->update($isql);
                    
                    if($ires){
                        echo "<script>alert(`Changed Successfully!`);</script>";
                        
                    }else{
                        echo  "<script>alert(`Change Failed!`);</script>";
                    }
                }
            }
        } 
}
}

?>


                    
                
            <div class="col-md-9">
                <div class="container-fluid edit_main_div">                    
                    <div class="contain_edit">
                    <form action="change_password.php" method="post">
                        <legend class="text-center"> Change Password</legend>
                        <label for="#o_pass" class="form-label">Old Password</label>
                        <input type="password" name="o_pass" class="form-control" id="o_pass">
                        <label for="#n_pass" class="form-label">New Password</label>
                        <input type="password" name="n_pass" class="form-control" id="n_pass">
                        <label for="#r_pass" class="form-label">Confirm Password</label>
                        <input type="password" name="r_pass" class="form-control mb-3" id="r_pass">
                        <button type="submit" value="Submit" class="form-control btn btn-outline-success">SUBMIT</button>
                    </form>
                    </div>
                </div>
            </div>


               
                   


                    
    
<?php include('footer.php');?>
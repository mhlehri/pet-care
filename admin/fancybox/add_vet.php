
<?php 
    include_once '../config/database.php';
    include('header.php');
    $db = new Database();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $short = $_POST['short'];
        $full = $_POST['full'];

        
        $photo_name = $_FILES['vet_img']['name'];
        $photo_temp = $_FILES['vet_img']['tmp_name'];

        $div = explode('.', $photo_name);
        $fileextention = strtolower(end($div));
        $uniqe_Name = substr(md5(time()), 0, 10). '.' . $fileextention;
        $upload_photo = "upload/vet/" . $uniqe_Name;

        if(empty($name) || empty($email) || empty($phone) || empty($short) || empty($full) || empty($photo_name)){
            echo "<script>
                alert('Field must be fulfilled!');
            </script>";
        }else{
            move_uploaded_file($photo_temp, $upload_photo);

            $sql = "insert into vet_d (name, email, number, short, full, img) values('$name', '$email', '$phone', '$short', '$full', '$upload_photo')";
        $result= $db->insert($sql);

           if($result){
            echo "<script>
                alert('Add successfully');
                window.location.href= '';
            </script>";
           
           }else{
            echo "<script>
                alert('failed to add');
            </script>";
           }
        }
    }

?>


           
            <div class="col-md-9">
                <div class="container-fluid edit_main_div">                    
                    <div class="contain_edit">
                        
                
                    <form action="add_vet.php" method="post" enctype="multipart/form-data">
                        <legend class="text-center">ADD NEW VET</legend>
                        <label for="name" class="form-label">Vet Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                        <label for="email" class="form-label">Vet Email</label>
                        <input type="email" name="email" class="form-control" id="email">                           
                        <label for="phone" class="form-label">Vet Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone">
                        <label for="short" class="form-label">Bio</label>
                        <textarea class="form-control" name="short" id="short" rows="2"></textarea>
                        <label for="full" class="form-label">Details</label>
                        <textarea class="form-control" name="full" id="full" rows="4"></textarea>
                        <script>
                            CKEDITOR.replace('full');
                        </script>
                          <label for="vet_img" class="form-label">Vet Img <span>*</span></label>
                        <input type="file" class="form-control mb-3" name="vet_img" id="vet_img">
                        <button type="submit" value="Submit" class="form-control btn btn-outline-success">ADD VET</button>
                        
                    </form>
                    
                    </div>
                        
                </div>
            </div>


             
                   


                    
                    
                

        
<?php include('footer.php');?>
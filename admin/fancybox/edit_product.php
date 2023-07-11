<?php 
    include_once '../config/database.php';
    include('header.php');

    $db = new Database();


  

      


    
?>


<div class="col-md-9">
    <div class="manage_product edit_main_div">
        <div class="contain_edit">

        <?php
        
        if(isset($_GET['p1'])){
    
        $p1 = $_GET['p1'];
        $query = "select * from c_product_d where id = '$p1'";
        $result = $db->select($query);
    
            
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $product_name = $_POST['product_name'];
        $product_d_price = $_POST['product_d_price'];
        $product_a_price = $_POST['product_a_price'];
        $product_tag = $_POST['product_tag'];
        $product_delivery = $_POST['product_delivery'];
        $product_des = $_POST['product_des'];
    
        
        $photo_name = $_FILES['product_img']['name'];
        $photo_temp = $_FILES['product_img']['tmp_name'];
    
        $div = explode('.', $photo_name);
        $fileextention = strtolower(end($div));
        $uniqe_Name = substr(md5(time()), 0, 10). '.' . $fileextention;
        $upload_photo = "upload/cat_item/" . $uniqe_Name;
    
        if(empty($product_name) || empty($product_d_price) || empty($product_delivery) || empty($product_des) ){
            echo "<script>
                alert('Field must be fulfilled!');
            </script>";
        }else{
            if(empty($photo_name)){
                
            $sql = "update admin set name = '$product_name', price = '$product_d_price', a_price = '$product_a_price', tag = '$product_tag', d_method = '$product_delivery', p_des = '$product_des' where id = '$p1'";
            $res = $db->update($sql);
            }  

        else{
            
            move_uploaded_file($photo_temp, $upload_photo);
            $sql = "update admin set name = '$product_name', price = '$product_d_price', a_price = '$product_a_price', tag = '$product_tag', d_method = '$product_delivery', p_des = '$product_des', p_img = '$upload_photo'  where id = '$p1'";
            $res = $db->update($sql);
    
            if($res)
            {
                echo "<script>alert(`Updated Successfully!`);</script>";
                header("edit_product.php");
            }
            else
            {
                echo  "<script>alert(`Update Failed!`);</script>";
            }
        }
    }

}
            if($result){
                while($row=mysqli_fetch_assoc($result)){

        ?>
        <form action="" method="post" enctype="multipart/form-data">
            
        <label for="product_img" class="form-label">Add Product Image <span>*</span></label>
            <input type="file" class="form-control" name="product_img" id="product_img" value="">
            <img src="<?= $row['p_img'] ?>" alt="" width="50px" height="50px"><br>

            <label for="product_name" class="form-label">Add Product Name </label>
            <input type="text" class="form-control" name="product_name" id="product_name" value="<?= $row['name'] ?>">

            <label for="product_d_price" class="form-label">Add Product Price</label>
            <input type="text" class="form-control" name="product_d_price" id="product_d_price" value="<?= $row['price'] ?>">

            <label for="product_a_price" class="form-label">Add Product Actual Price</label>
            <input type="text" class="form-control" name="product_a_price" id="product_a_price" value="<?= $row['a_price'] ?>">

            <label for="product_tag" class="form-label">Add Product Tag</label>
            <input type="text" class="form-control" name="product_tag" id="product_tag" value="<?= $row['tag'] ?>">

            <label for="product_delivery" class="form-label">Add Product Delivery Method Info </label>
            <input type="text" class="form-control" name="product_delivery" id="product_delivery" value="<?= $row['d_method'] ?>">          

            <label for="product_des" class="form-label">Add Product Description </label>
            <textarea class="form-control mb-4" name="product_des" id="product_des" rows="2"><?= $row['p_des'] ?></textarea>

            <button class="btn btn-outline-success form-control" type="submit" name="update_product">UPDATE</button>

        </form>

        <?php
            }
        }
        }
        ?>
        <?php
        
        if(isset($_GET['p2'])){
    
        $p1 = $_GET['p2'];
        $query = "select * from d_product_d where id = '$p1'";
        $result = $db->select($query);
    
        
            if($result){
                while($row=mysqli_fetch_assoc($result)){

        ?>
        <form action="" method="post">
            
        <label for="product_img" class="form-label">Add Product Image <span>*</span></label>
            <input type="file" class="form-control" name="product_img" id="product_img" value="">
            <img src="<?= $row['p_img'] ?>" alt="" width="50px" height="50px"><br>

            <label for="product_name" class="form-label">Add Product Name </label>
            <input type="text" class="form-control" name="product_name" id="product_name" value="<?= $row['name'] ?>">

            <label for="product_d_price" class="form-label">Add Product Price</label>
            <input type="text" class="form-control" name="product_d_price" id="product_d_price" value="<?= $row['price'] ?>">

            <label for="product_a_price" class="form-label">Add Product Actual Price</label>
            <input type="text" class="form-control" name="product_a_price" id="product_a_price" value="<?= $row['a_price'] ?>">

            <label for="product_tag" class="form-label">Add Product Tag</label>
            <input type="text" class="form-control" name="product_tag" id="product_tag" value="<?= $row['tag'] ?>">

            <label for="product_delivery" class="form-label">Add Product Delivery Method Info </label>
            <input type="text" class="form-control" name="product_delivery" id="product_delivery" value="<?= $row['d_method'] ?>">          

            <label for="product_des" class="form-label">Add Product Description </label>
            <textarea class="form-control mb-4" name="product_des" id="product_des" rows="2"><?= $row['p_des'] ?></textarea>

            <button class="btn btn-outline-success form-control" type="submit" name="update_product">UPDATE</button>

        </form>

        <?php
            }
        }
        }
        ?>
        
        <?php
        $result='';
        if(isset($_GET['p3'])){
    
        $p1 = $_GET['p3'];
        $query = "select * from b_product_d where id = '$p1'";
        $result = $db->select($query);
    
        
            if($result){
                while($row=mysqli_fetch_assoc($result)){

        ?>
        <form action="" method="post">
            
        <label for="product_img" class="form-label">Add Product Image <span>*</span></label>
            <input type="file" class="form-control" name="product_img" id="product_img" value="">
            <img src="<?= $row['p_img'] ?>" alt="" width="50px" height="50px"><br>

            <label for="product_name" class="form-label">Add Product Name </label>
            <input type="text" class="form-control" name="product_name" id="product_name" value="<?= $row['name'] ?>">

            <label for="product_d_price" class="form-label">Add Product Price</label>
            <input type="text" class="form-control" name="product_d_price" id="product_d_price" value="<?= $row['price'] ?>">

            <label for="product_a_price" class="form-label">Add Product Actual Price</label>
            <input type="text" class="form-control" name="product_a_price" id="product_a_price" value="<?= $row['a_price'] ?>">

            <label for="product_tag" class="form-label">Add Product Tag</label>
            <input type="text" class="form-control" name="product_tag" id="product_tag" value="<?= $row['tag'] ?>">

            <label for="product_delivery" class="form-label">Add Product Delivery Method Info </label>
            <input type="text" class="form-control" name="product_delivery" id="product_delivery" value="<?= $row['d_method'] ?>">          

            <label for="product_des" class="form-label">Add Product Description </label>
            <textarea class="form-control mb-4" name="product_des" id="product_des" rows="2"><?= $row['p_des'] ?></textarea>

            <button class="btn btn-outline-success form-control" type="submit" name="update_product">UPDATE</button>

        </form>

        <?php
            }
        }
        }
        ?>
        <?php
        $result='';
        if(isset($_GET['p4'])){
    
        $p1 = $_GET['p4'];
        $query = "select * from m_d where id = '$p1'";
        $result = $db->select($query);
    
        
            if($result){
                while($row=mysqli_fetch_assoc($result)){

        ?>
        <form action="" method="post">
            
        <label for="product_img" class="form-label">Add Product Image <span>*</span></label>
            <input type="file" class="form-control" name="product_img" id="product_img" value="">
            <img src="<?= $row['p_img'] ?>" alt="" width="50px" height="50px"><br>

            <label for="product_name" class="form-label">Add Product Name </label>
            <input type="text" class="form-control" name="product_name" id="product_name" value="<?= $row['name'] ?>">

            <label for="product_d_price" class="form-label">Add Product Price</label>
            <input type="text" class="form-control" name="product_d_price" id="product_d_price" value="<?= $row['price'] ?>">

            <label for="product_a_price" class="form-label">Add Product Actual Price</label>
            <input type="text" class="form-control" name="product_a_price" id="product_a_price" value="<?= $row['a_price'] ?>">

            <label for="product_tag" class="form-label">Add Product Tag</label>
            <input type="text" class="form-control" name="product_tag" id="product_tag" value="<?= $row['tag'] ?>">

            <label for="product_delivery" class="form-label">Add Product Delivery Method Info </label>
            <input type="text" class="form-control" name="product_delivery" id="product_delivery" value="<?= $row['d_method'] ?>">          

            <label for="product_des" class="form-label">Add Product Description </label>
            <textarea class="form-control mb-4" name="product_des" id="product_des" rows="2"><?= $row['p_des'] ?></textarea>

            <button class="btn btn-outline-success form-control" type="submit" name="update_product">UPDATE</button>

        </form>

        <?php
            }
        }
        }
        ?>
        <?php
        $result='';
        if(isset($_GET['p5'])){
    
        $p1 = $_GET['p5'];
        $query = "select * from m_d where id = '$p1'";
        $result = $db->select($query);
    
        
            if($result){
                while($row=mysqli_fetch_assoc($result)){

        ?>
        <form action="" method="post">
            
        <label for="product_img" class="form-label">Add Product Image <span>*</span></label>
            <input type="file" class="form-control" name="product_img" id="product_img" value="">
            <img src="<?= $row['p_img'] ?>" alt="" width="50px" height="50px"><br>

            <label for="product_name" class="form-label">Add Product Name </label>
            <input type="text" class="form-control" name="product_name" id="product_name" value="<?= $row['name'] ?>">

            <label for="product_d_price" class="form-label">Add Product Price</label>
            <input type="text" class="form-control" name="product_d_price" id="product_d_price" value="<?= $row['price'] ?>">

            <label for="product_a_price" class="form-label">Add Product Actual Price</label>
            <input type="text" class="form-control" name="product_a_price" id="product_a_price" value="<?= $row['a_price'] ?>">

            <label for="product_tag" class="form-label">Add Product Tag</label>
            <input type="text" class="form-control" name="product_tag" id="product_tag" value="<?= $row['tag'] ?>">

            <label for="product_delivery" class="form-label">Add Product Delivery Method Info </label>
            <input type="text" class="form-control" name="product_delivery" id="product_delivery" value="<?= $row['d_method'] ?>">          

            <label for="product_des" class="form-label">Add Product Description </label>
            <textarea class="form-control mb-4" name="product_des" id="product_des" rows="2"><?= $row['p_des'] ?></textarea>

            <button class="btn btn-outline-success form-control" type="submit" name="update_product">UPDATE</button>

        </form>

        <?php
            }
        }
        }
        ?>
        
        
        </div>
    </div>
</div>


<?php include('footer.php');?>

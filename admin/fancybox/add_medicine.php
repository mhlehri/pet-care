<?php 
    include_once '../config/database.php';
    include('header.php');
    $db = new Database();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
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
        $upload_photo = "upload/medicine/" . $uniqe_Name;

        if(empty($product_name) || empty($product_d_price) || empty($product_delivery) || empty($product_des) || empty($photo_name)){
            echo "<script>
                alert('Field must be fulfilled!');
            </script>";
        }else{
            move_uploaded_file($photo_temp, $upload_photo);

            $sql = "insert into m_d (name, price, a_price, tag, d_method, p_des, p_img) values ('$product_name', '$product_d_price', '$product_a_price' , '$product_tag', '$product_delivery', '$product_des', '$upload_photo')";

           $result = $db->insert($sql);

           if($result){
            echo "<script>
                alert('Add successfully');
                window.location.href= 'manage_product.php#home-tab';
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
    <div class="manage_product edit_main_div">
    <div class="contain_edit">
        <h4 class='text-center'>Add Pets Medicine</h4>
        <form action="add_medicine.php" method="post" enctype="multipart/form-data">
            
            <label for="product_img" class="form-label">Add Product Image <span>*</span></label>
            <input type="file" class="form-control" name="product_img" id="product_img">

            <label for="product_name" class="form-label">Add Product Name <span>*</span></label>
            <input type="text" class="form-control" name="product_name" id="product_name">

            <label for="product_d_price" class="form-label">Add Product Price <span>*</span></label>
            <input type="text" class="form-control" name="product_d_price" id="product_d_price">

            <label for="product_a_price" class="form-label">Add Product Actual Price</label>
            <input type="text" class="form-control" name="product_a_price" id="product_a_price">

            <label for="product_tag" class="form-label">Add Product Tag</label>
            <input type="text" class="form-control" name="product_tag" id="product_tag">

            <label for="product_delivery" class="form-label">Add Product Delivery Method Info <span>*</span></label>
            <input type="text" class="form-control" name="product_delivery" id="product_delivery">          

            <label for="product_des" class="form-label">Add Product Description <span>*</span></label>
            <textarea class="form-control" name="product_des" id="product_des" rows="2"></textarea>
            <script>
                
            </script>
            <br>
            <button class="btn btn-outline-success form-control" type="submit" name="add_product">ADD</button>

        </form>
    </div>
    </div>
</div>


<?php include('footer.php');?>
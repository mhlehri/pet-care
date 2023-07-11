<?php 
    include_once '../admin/config/database.php';
    include('header.php');
    $db = new Database();



?>


<div class="container my-5">
    <div class="row my-4">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <div class="purchase_product">
        <form action="" method="post">
            
            <label for="user_name" class="form-label">Reciver Name*</label>
            <input type="text" class="mb-3" name="user_name" id="user_name" required>

            <label for="user_email" class="form-label">Email address*</label>
            <input type="email" class="mb-3" name="user_email" id="user_email" required>

            <label for="user_number" class="form-label">Phone Number*</label>
            <input type="text" class="mb-3" name="user_number" id="user_number" required>

            <label for="user_ex_number" class="form-label">Alternative Number</label>
            <input type="text" class="mb-3" name="user_ex_number" id="user_ex_number">

            <label for="user_region" class="form-label">Select Rigion*</label>
            <select name="user_region" id="user_region" class='mb-3' name="user_region" required>
                <option value="dhaka">Dhaka</option>
                <option value="chattogram" >Chattogram</option>
                <option value="sylhet" >Sylhet</option>
                <option value="rajshahi">Rajshahi</option>
                <option value="rangpur" >Rangpur</option>
                <option value="khulna">Khulna</option>
                <option value="barishal">Barishal</option>
                <option value="mymensingh">Mymensingh</option>
            </select>

            <label for="user_address" class="form-label">Address*</label>
            <textarea name="user_address" id="user_address" rows="1"  class="mb-3" required></textarea>          

            <label for="user_message" class="form-label">Message In Persell</label>
            <textarea name="user_message" id="user_message" rows="1" class="mb-4"></textarea>          
            
            <button class="btn btn-outline" type="submit" name="">Place Order</button>

        </form>
    </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    
</div>


<?php include('footer.php');?>
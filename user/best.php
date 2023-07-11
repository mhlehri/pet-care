<div class="product_details php">
    <div class="container">
        <?php  

                $best_sql = "SELECT * FROM `best_d`  where name = '$pdetail'";
                $best_details = $db->select($best_sql);
                if($best_details){
                while($row = mysqli_fetch_assoc($best_details)){
                ?>

                <div class="row py-5">
                <div class="col-md-7">
                    <img src="../admin/fancybox/<?= $row['p_img']; ?>" alt="" srcset="" width="100%">
                    <p><?= $row['p_des'] ?></p>
                </div>
                <div class="col-md-5">
                    <h2><?= $row['name'];?></h2>
                    <p><span class="dis_price">$<?= $row['price']; ?></span><span class="actual_price"><small>$<?= $row['a_price']; ?></small></span><span class="dis_per">(50% off)</span></p>
                    <p><?= $row['d_method'] ?></p>
                    <input class="form-check-input" type="radio" name="" id="" checked>
                    <label class="form-check-label" for="">
                    Cash On Delivery
                    </label>
                    <form action="" method="post">
                <div>              
                <button type="submit" class="btn btn-outline form-control w-50 mt-5" name="add_to_cart">Add To Cart <i class="fa-solid fa-cart-shopping"></i></button>
                </div>
                <input type="hidden" name="item_name" value="<?= $row['name']; ?>"> 
                <input type="hidden" name="item_price" value="<?= $row['price']; ?>"> 
            </form>
                </div>
            </div>
            <?php

            }
            } 
        ?>

    </div>
</div>


<?php include('footer.php');?>
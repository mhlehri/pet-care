<?php include('header.php');

    include_once '../admin/config/database.php';
    $db = new Database();
    

    if($_SERVER["REQUEST_METHOD"]=='POST')
    {
        if(isset($_POST["add_to_cart"]))
        {
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
            if(isset($_SESSION['cart']))
            {
                $myitems=array_column($_SESSION['cart'], 'item_name');
                if(in_array($_POST['item_name'], $myitems))
                {
                    echo "<script> 
                    alert('Item Already Added!');
                    window.location.href='';
                    </script>";
                }
                else
                {
                $count=count($_SESSION['cart']);
                $_SESSION['cart'][$count]=array('item_name'=>$_POST['item_name'], 'item_price'=>$_POST['item_price'], 'Quantity'=>1);
                echo "<script> 
                alert('Item Added!');
                window.location.href= '';
                </script>";
                }
            }
            else
            {
                $_SESSION['cart'][0]=array('item_name'=>$_POST['item_name'], 'item_price'=>$_POST['item_price'], 'Quantity'=>1);
                echo "<script> 
                alert('Item Added!');
                window.location.href= '';
                </script>";
            }
        }else{echo
            "<script> 
                        alert('You are not logged in!');
                        window.location.href= 'login.php';
                        </script>";
        }
    }
}


    
    if(isset($_GET['details'])){
        $pdetail = $_GET['details'];
    
    }

?>



<div class="product_details php">
    <div class="container">
    <?php  

            $p_sql = "SELECT * FROM c_product_d union all SELECT * FROM d_product_d union all SELECT * FROM b_product_d union all SELECT * FROM m_d union all SELECT * FROM best_d  ";
            $p_details = $db->select($p_sql);
            if($p_details){
            while($row = mysqli_fetch_assoc($p_details)){
                if($row['name']==$pdetail){

               
            ?>

            <div class="row py-5">
            <div class="col-md-7">
                <img src="../admin/fancybox/<?= $row['p_img']; ?>" alt="" srcset="" width="100%">
            </div>
            <div class="col-md-5">
                <h2><?= $row['name'];?></h2>
                <p><span class="dis_price">$<?= $row['price']; ?></span><span class="actual_price"><small>$<?= $row['a_price']; ?></small></span><span class="dis_per">(50% off)</span></p>
                <p><?= $row['d_method']?></p>
                <input class="form-check-input" type="radio" name="" id="" checked>
                <label class="form-check-label" for="">
                Cash On Delivery
                </label>
                <form action="" method="post">
            <div>              
            <button type="submit" class="btn btn-outline form-control w-50 mt-5" name="add_to_cart">Add To Cart <i class="fa-solid fa-cart-shopping fa-shake"></i></button>
            </div>
            <input type="hidden" name="item_name" value="<?= $row['name']; ?>"> 
            <input type="hidden" name="item_price" value="<?= $row['price']; ?>"> 
            </form>
            </div>
            </div>
            <h2>Description</h2>
            <p><?= $row['p_des'] ?></p>
    <?php
 }
    }
    } 
    ?>

        
</div>
</div>




<?php include('footer.php');?>



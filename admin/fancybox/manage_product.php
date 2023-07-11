<?php 
    include_once '../config/database.php';
    include('header.php');
    $db = new Database();

    $cat_sql = "select * from c_product_d order by id desc limit 5";
    $cat_result = $db->select($cat_sql) ;
    $dog_sql = "select * from d_product_d order by id desc limit 5";
    $dog_result = $db->select($dog_sql);
    $bird_sql = "select * from b_product_d order by id desc limit 5";
    $bird_result = $db->select($bird_sql);
    $m_sql = "select * from m_d order by id desc limit 5";
    $m_result = $db->select($m_sql);
    $best_sql = "select * from best_d order by id desc limit 5";
    $best_result = $db->select($best_sql);

    



        
if(isset($_GET['deladmin'])){
    $del_c = $_GET['deladmin'];
    $sql = "delete from c_product_d where id = '$del_c'";
    $del = $db->delete($sql);
    if($del){
        header('location: manage_product.php');
    }else{
        echo "<script> alert(Deletation Failed!) </script>";
    }
}
if(isset($_GET['deladmin1'])){
    $del_d = $_GET['deladmin1'];
    $sql = "delete from d_product_d where id = '$del_d'";
    $del = $db->delete($sql);
    if($del){
        header('location: manage_product.php');
    }else{
        echo "<script> alert(Deletation Failed!) </script>";
    }
}
if(isset($_GET['deladmin2'])){
    $del_b = $_GET['deladmin2'];
    $sql = "delete from b_product_d where id = '$del_b'";
    $del = $db->delete($sql);
    if($del){
        header('location: manage_product.php');
    }else{
        echo "<script> alert(Deletation Failed!) </script>";
    }
}
if(isset($_GET['deladmin3'])){
    $del_m = $_GET['deladmin3'];
    $sql = "delete from m_d where id = '$del_m'";
    $del = $db->delete($sql);
    if($del){
        header('location: manage_product.php');
    }else{
        echo "<script> alert(Deletation Failed!) </script>";
    }
}
if(isset($_GET['deladmin4'])){
    $del_best = $_GET['deladmin4'];
    $sql = "delete from best_d where id = '$del_best'";
    $del = $db->delete($sql);
    if($del){
        header('location: manage_product.php');
    }else{
        echo "<script> alert(Deletation Failed!) </script>";
    }
}

    ?>


<div class="col-md-9 pe-4">
    <div class="manage_product">
    <ul class="nav nav-tabs mt-2" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active " id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Cat Items</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Dog Items</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Bird Items</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false">Medicine</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="disable-tab" data-bs-toggle="tab" data-bs-target="#disable-tab-pane" type="button" role="tab" aria-controls="disable-tab-pane" aria-selected="false">Best Selling Products</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <div class="">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                if($cat_result){
                                    while($row = mysqli_fetch_assoc($cat_result)){
                            ?>

                            <tr class="tr_manage_admin">
                                <td scope="row"><?= $row['name']; ?></td>
                                <td>$<?= $row['price']; ?></td>
                                <td><a href="#magicDiv<?= $row['id'] ?>" class="btn btn-sm btn-outline-success fancybox me-2">Details</a>  <a href="?deladmin=<?php echo $row['id']; ?>" onclick="return confirm(`Are you sure to delete?`)" class="btn btn-sm btn-outline-danger">Remove</a></td>
                            </tr>

                            <div id="magicDiv<?= $row['id'] ?>" style="display:none; width:600px;">
                                <img src="<?= $row['p_img'] ?>" alt="" width="100%"> 
                                <h2 class="p_name"><?= $row['name'];?></h2>
                                <p><span class="dis_price">$<?= $row['price'] ;?></span> <span class="actual_price">$<?= $row['a_price']; ?></span> (<?= $row['tag'] ?>)</p>
                                <h6><?= $row['d_method'] ?></h6>
                                <p><?= $row['p_des']?></p>
                            </div>

                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
  </div>

  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
  <div class="admin_list_table">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                                if($dog_result){
                                    while($row = mysqli_fetch_assoc($dog_result)){
                            ?>

                            <tr class="tr_manage_admin">
                                <td scope="row"><?= $row['name']; ?></td>
                                <td>$<?= $row['price']; ?></td>                                  
                                <td><a href="#magicDiv<?= $row['id'] ?>" class="btn btn-sm btn-outline-success fancybox me-2">Details</a>   <a href="?deladmin1=<?php echo $row['id']; ?>" onclick="return confirm(`Are you sure to delete?`)" class="btn btn-sm btn-outline-danger">Remove</a></td>
                            </tr>

                            <div id="magicDiv<?= $row['id'] ?>" style="display:none; width:600px;">
                                <img src="<?= $row['p_img'] ?>" alt="" width="100%"> 
                                <h2 class="p_name"><?= $row['name'];?></h2>
                                <p><span class="dis_price"><?= $row['price'] ;?></span> <span class="actual_price"><?= $row['a_price']; ?></span> (<?= $row['tag'] ?>)</p>
                                <h6><?= $row['d_method'] ?></h6>
                                <p><?= $row['p_des']?></p>
                            </div>

                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
  </div>

  <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="2">
  <div class="admin_list_table">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                                if($bird_result){
                                    while($row = mysqli_fetch_assoc($bird_result)){
                            ?>

<tr class="tr_manage_admin">
                                <td scope="row"><?= $row['name']; ?></td>
                                <td>$<?= $row['price']; ?></td>                                  
                                <td><a href="#magicDiv<?= $row['id'] ?>" class="btn btn-sm btn-outline-success fancybox me-2">Details</a>   <a href="?deladmin2=<?php echo $row['id']; ?>" onclick="return confirm(`Are you sure to delete?`)" class="btn btn-sm btn-outline-danger">Remove</a></td>
                            </tr>

                            <div id="magicDiv<?= $row['id'] ?>" style="display:none; width:600px;">
                                <img src="<?= $row['p_img'] ?>" alt="" width="100%"> 
                                <h2 class="p_name"><?= $row['name'];?></h2>
                                <p><span class="dis_price"><?= $row['price'] ;?></span> <span class="actual_price"><?= $row['a_price']; ?></span> (<?= $row['tag'] ?>)</p>
                                <h6><?= $row['d_method'] ?></h6>
                                <p><?= $row['p_des']?></p>
                            </div>

                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
  </div>
  <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
  <div class="admin_list_table">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>                           
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                                if($m_result){
                                    while($row = mysqli_fetch_assoc($m_result)){
                            ?>

<tr class="tr_manage_admin">
                                <td scope="row"><?= $row['name']; ?></td>
                                <td>$<?= $row['price']; ?></td>                                  
                                <td><a href="#magicDiv<?= $row['id'] ?>" class="btn btn-sm btn-outline-success fancybox me-2">Details</a>   <a href="?deladmin3=<?php echo $row['id']; ?>" onclick="return confirm(`Are you sure to delete?`)" class="btn btn-sm btn-outline-danger">Remove</a></td>
                            </tr>

                            <div id="magicDiv<?= $row['id'] ?>" style="display:none; width:600px;">
                                <img src="<?= $row['p_img'] ?>" alt="" width="100%"> 
                                <h2 class="p_name"><?= $row['name'];?></h2>
                                <p><span class="dis_price"><?= $row['price'] ;?></span> <span class="actual_price"><?= $row['a_price']; ?></span> (<?= $row['tag'] ?>)</p>
                                <h6><?= $row['d_method'] ?></h6>
                                <p><?= $row['p_des']?></p>
                            </div>

                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
  </div>
</div>
  <div class="tab-pane fade" id="disable-tab-pane" role="tabpanel" aria-labelledby="disable-tab" tabindex="0">
  <div class="admin_list_table">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>                           
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                                if($best_result){
                                    while($row = mysqli_fetch_assoc($best_result)){
                            ?>

<tr class="tr_manage_admin">
                                <td scope="row"><?= $row['name']; ?></td>
                                <td>$<?= $row['price']; ?></td>                                  
                                <td><a href="#magicDiv<?= $row['id'] ?>" class="btn btn-sm btn-outline-success fancybox me-2">Details</a>   <a href="?deladmin4=<?php echo $row['id']; ?>" onclick="return confirm(`Are you sure to delete?`)" class="btn btn-sm btn-outline-danger">Remove</a></td>
                            </tr>

                            <div id="magicDiv<?= $row['id'] ?>" style="display:none; width:600px;">
                                <img src="<?= $row['p_img'] ?>" alt="" width="100%"> 
                                <h2 class="p_name"><?= $row['name'];?></h2>
                                <p><span class="dis_price"><?= $row['price'] ;?></span> <span class="actual_price"><?= $row['a_price']; ?></span> (<?= $row['tag'] ?>)</p>
                                <h6><?= $row['d_method'] ?></h6>
                                <p><?= $row['p_des']?></p>
                            </div>

                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
  </div>
</div>




    </div>
</div>


<?php include('footer.php');?>

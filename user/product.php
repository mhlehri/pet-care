<?php include('header.php');

include_once '../admin/config/database.php';
$db = new Database();
$cat_sql = "select * from c_product_d order by id desc";
$cat_result = $db->select($cat_sql) ;
$dog_sql = "select * from d_product_d order by id desc";
$dog_result = $db->select($dog_sql);
$bird_sql = "select * from b_product_d order by id desc";
$bird_result = $db->select($bird_sql);
$m_sql = "select * from m_d order by id desc";
$m_result = $db->select($m_sql);




?>

    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="1000">
          <img src="./product_img/product_bannar/2.jpg" class="d-block w-100" alt="..."/>
          <h2 class="bannar_dis_tag">40% off</h2>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img
            src="./product_img/product_bannar/1.jpg"
            class="d-block w-100"
            alt="..."
          />
          <h2 class="bannar_dis_tag">60% off</h2>
        </div>
        <div class="carousel-item">
          <img
            src="./product_img/product_bannar/3.jpg"
            class="d-block w-100"
            alt="..."
          />
          <h2 class="bannar_dis_tag">20% off</h2>
        </div>
      </div>
    </div>

  <!-- cat product -->

  <div class="product bgcolor py-5" id="cat_items">
    <div class="container">
      <h1 class=" mb-4 bgheader">Cat Items</h1>
      <div class="product_show row">
        <div class="arrow_prec"><span><i class="fa-solid fa-chevron-left"></i></span></div>
        <div class="arrow_nextc"><span><i class="fa-solid fa-chevron-right"></i></span></div>
        <div class="all_product d-flex cat">

 
        <?php
            if($cat_result){
            while($row = mysqli_fetch_assoc($cat_result)){
        ?>

          <a href="product_details.php?details=<?php echo $row['name'];?>" class="cardt card"><div>
              <div class="card_img"><img src="../admin/fancybox/<?= $row['p_img'] ?>" alt="">
                <p class="dis_tag dis_per"><?= $row['tag'] ?></p>
              </div>
              <div class="card_info">
                <h4><?= $row['name'] ?></h4>
                <p><span class="dis_price ">$<?= $row['price'] ?></span><span class="actual_price"><small>$<?= $row['a_price'] ?></small></span></p>
              </div>
           </div></a>

          <?php
              }
            }
          ?>

        </div>
      </div>
    </div>
  </div>

  <!-- dog product -->

  <div class="product bgcolor py-5" id="dog_items">
    <div class="container">
      <h1 class=" mb-4 bgheader">Dog Items</h1>
      <div class="product_show row">
        <div class="arrow_pred"><span><i class="fa-solid fa-chevron-left"></i></span></div>
        <div class="arrow_nextd"><span><i class="fa-solid fa-chevron-right"></i></span></div>
        <div class="all_product d-flex dog">

 
        <?php
            if($dog_result){
            while($row = mysqli_fetch_assoc($dog_result)){
        ?>

          <a href="product_details.php?details=<?php echo $row['name'];?>" class="cardt card"><div>
              <div class="card_img"><img src="../admin/fancybox/<?= $row['p_img'] ?>" alt="">
                <p class="dis_tag dis_per"><?= $row['tag'] ?></p>
              </div>
              <div class="card_info">
                <h4><?= $row['name'] ?></h4>
                <p><span class="dis_price ">$<?= $row['price'] ?></span><span class="actual_price"><small>$<?= $row['a_price'] ?></small></span></p>
              </div>
           </div></a>

          <?php
              }
            }
          ?>

        </div>
      </div>
    </div>
  </div>

 
  <!-- bird product -->

  <div class="product bgcolor py-5" id="bird_items">
    <div class="container">
      <h1 class=" mb-4 bgheader">Bird Items</h1>
      <div class="product_show row">
        <div class="arrow_prec"><span><i class="fa-solid fa-chevron-left"></i></span></div>
        <div class="arrow_nextc"><span><i class="fa-solid fa-chevron-right"></i></span></div>
        <div class="all_product d-flex bird">

 
        <?php
            if($bird_result){
            while($row = mysqli_fetch_assoc($bird_result)){
        ?>

          <a href="product_details.php?details=<?php echo $row['name'];?>" class="cardt card"><div>
              <div class="card_img"><img src="../admin/fancybox/<?= $row['p_img'] ?>" alt="">
                <p class="dis_tag dis_per"><?= $row['tag'] ?></p>
              </div>
              <div class="card_info">
                <h4><?= $row['name'] ?></h4>
                <p><span class="dis_price ">$<?= $row['price'] ?></span><span class="actual_price"><small>$<?= $row['a_price'] ?></small></span></p>
              </div>
           </div></a>

          <?php
              }
            }
          ?>

        </div>
      </div>
    </div>
  </div>

   <!-- medicine product -->
  <div class="product bgcolor py-5" id="medicine">
    <div class="container">
      <h1 class=" mb-4 bgheader">Pet's Medicine</h1>
      <div class="product_show row">
        <div class="arrow_prem"><span><i class="fa-solid fa-chevron-left"></i></span></div>
        <div class="arrow_nextm"><span><i class="fa-solid fa-chevron-right"></i></span></div>
        <div class="all_product d-flex m">

 
        <?php
            if($m_result){
            while($row = mysqli_fetch_assoc($m_result)){
        ?>

          <a href="product_details.php?details=<?php echo $row['name'];?>" class="cardt card"><div>
              <div class="card_img"><img src="../admin/fancybox/<?= $row['p_img'] ?>" alt="">
                <p class="dis_tag dis_per"><?= $row['tag'] ?></p>
              </div>
              <div class="card_info">
                <h4><?= $row['name'] ?></h4>
                <p><span class="dis_price ">$<?= $row['price'] ?></span><span class="actual_price"><small>$<?= $row['a_price'] ?></small></span></p>
              </div>
           </div></a>

          <?php
              }
            }
          ?>

        </div>
      </div>
    </div>
  </div>



 




    


<?php include('footer.php'); ?>

<?php include('header.php');

    include_once '../admin/config/database.php';
    $db = new Database();
    $cat_sql = "select * from c_product_d order by id desc";
    $cat_result = $db->select($cat_sql) ;

?>

<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./img/114.png" class="d-block w-100" alt="..."/>
          <h2 class="bannar_dis_tags about_text_animation1">Brand New Luxurious Products</h2>
          <h2 class="bannar_dis_tags about_text_animation2">All Verified By CATZONE.org</h2>
        </div>
      </div>
    </div>




  <div class="cat_product py-5">
    <div class="container">
      <div class="row d-flex justify-content-center">

          <h1 class="veterinerSectionHeader mb-4 bgheader text-center">All Cat Items Over Here</h1>

 
        <?php
            if($cat_result){
            while($row = mysqli_fetch_assoc($cat_result)){
        ?>

          <div class="col-sm-4 mb-3">
          <a href="product_details.php?details=<?php echo $row['name'];?>">
          <div class="card">
            <img class="card-img-top" src="../admin/fancybox/<?= $row['p_img'];?>" alt="<?= $row['name'];?>" />
            <div class="card-body">
            <p class="dis_tag dis_per"><?= $row['tag'] ?></p>
              </div>
              <div class="card_info">
                <h4><?= $row['name'] ?></h4>
                <p><span class="dis_price ">$<?= $row['price'] ?></span><span class="actual_price"><small>$<?= $row['a_price'] ?></small></span></p>
              </div>
           </div></a>
        </div>

          <?php
              }
            }
          ?>

        </div>
      </div>
    </div>



<?php include('footer.php');?>

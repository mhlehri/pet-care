<?php include('header.php');

    include_once '../admin/config/database.php';
    $db = new Database();
    $filter='';

?>





  <div class="search py-5">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <?php
            if(isset($_GET['search'])){
                $filter=$_GET['search'];
                $p_sql = "SELECT * FROM c_product_d  where name LIKE '%$filter%' union SELECT * FROM d_product_d  where name LIKE '%$filter%' union SELECT * FROM b_product_d  where name LIKE '%$filter%' ";
                $p_search = $db->select($p_sql);
               


        ?>
                <h3 class="veterinerSectionHeader mb-4 bgheader text-center">Results for <?php echo $filter;?><h5><?php  
                 $count = mysqli_num_rows($p_search);
                 if($count > 0){
                     echo $count . " Records Found";
                 }if($count == 0){
                     echo "0 Records Found";
                 }if($count == ""){
                     echo "";
                 } ?></h5></h3>
                
        <?php
            if(empty($p_search)){
                
        ?>

            <div class='col-sm-4 mb-3'><h3 class='text-center pb-5 mb-5'>no result found</h3></div>

              <?php
                
            }
            else{
                foreach($p_search as $items){

                
                ?>
                
                

                <div class="col-sm-4 mb-3">

                    <a href="product_details.php?details=<?php echo $items['name'];?>">
                    <div class="card">
                    <img class="card-img-top" src="../admin/fancybox/<?= $items['p_img'];?>" alt="<?= $items['name'];?>" />
                    <div class="card-body">
                    <p class="dis_tag dis_per"><?= $items['tag'] ?></p>
                        </div>
                        <div class="card_info">
                        <h4><?= $items['name'] ?></h4>
                        <p><span class="dis_price ">$<?= $items['price'] ?></span><span class="actual_price"><small>$<?= $items['a_price'] ?></small></span></p>
                        </div>
                    </div></a>
            </div>
        <?php
                }
              }
            }
            
          ?>
        </div>
      </div>
    </div>



<?php include('footer.php');?>

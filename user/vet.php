<?php 
include('header.php');
include_once '../admin/config/database.php';
$db = new Database();

if($_SERVER['REQUEST_METHOD']=='POST'){
  $oname = $_POST['ownername'];
  $email = $_POST['email'];
  $onum = $_POST['ownernum'];
  $pet = $_POST['petname'];
  $spet = $_POST['spet'];
  $days = $_POST['days'];

  if(empty($oname) || empty($email) || empty($onum) || empty($pet) || empty($spet) || empty($days)){

    echo "<script> alert('Field must not be fulfilled! ');</script>";

  }
  else{
    $sql = "insert into shelter (name, email, number, petname, spet, days) values ('$oname','$email','$onum', '$pet','$spet','$days')";
    $result = $db->insert($sql);
  
    if($result)
    {
      echo "<script> alert('You booked shelter successfully! ');</script>";
    }
    else
    {
      echo "<script> alert('');</script>";
    }
  }



}
?>


<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="1000">
          <img src="./img/vb1.jpg" class="d-block w-100" alt="..."/>
        </div>
      </div>
</div>


<div class="container">
  <div class="row my-4">
  <h1 class="allAboutOurShelter mb-4 bgheader">PetCare's Medical Team [Vets]</h1>
    <div class="col-md-6">
      <img src="./img/vb2.jpg" alt="" width="100%" class="mb-3">
      <img src="./img/vb5.jpg" alt="" width="100%" class="mb-3">
    </div>
    <div class="col-md-6">
      <h2 class="bgheader">All About Our Vets</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus dolore praesentium ullam ea? Ut, provident?</p>
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam, quis corrupti ipsam error facilis nostrum tempore officiis, incidunt natus sequi at adipisci, tenetur dolore est.</p>
      <h3 class="bgheader">Our Medical Support</h3>
      <ul>
        <li>Safe and Fresh foods.</li>
        <li>Sound Evironment.</li>
        <li>Free Medical Supports.</li>
        <li>Free Medicines.</li>
        <li>Daily Walkout.</li>
        <li>Daily Health Checkup.</li>
        <li>Lots Of Playing Toys.</li>
        <li>Beloved Servicemen.</li>
      </ul>
    </div>
  </div>



  <div class="veterinerS py-5">
    <div class="container">
      <div class="row d-flex justify-content-center">

          <h1 class="veterinerSectionHeader mb-4 bgheader">Book An Appointment Now</h1>

        
        <?php
        
            $sqlv = "select * from vet_d";
            $resultv=$db->select($sqlv);
            if($resultv){
              while ($row=mysqli_fetch_assoc($resultv)) {
        ?>

        <div class="col-sm-4 mb-3">
          <a href="vet_details.php?details=<?php echo $row['name'];?>">
          <div class="card  text-center">
            <img class="card-img-top" src="../admin/fancybox/<?= $row['img'];?>" alt="<?= $row['name'];?>" />
            <div class="card-body">
              <h4 class="card-title"><?= $row['name'];?></h4>
              <p><?= $row['short']; ?></p>

              <p>
                <span><i class="fa-solid fa-phone"></i> <?= $row['number']; ?><br /></span>
                <span><i class="fa-solid fa-envelope"></i>
                <?= $row['email']; ?></span>
              </p>
              <a href="vet_details.php?details=<?php echo $row['name'];?>#form" target="_blank"><button type="button" class="form-control btn btn-outline">
                  Book Appointment
                </button></a>
            </div>
          </div>
          </a>
        </div>


        <?php
              }
            }
        ?>

    
      </div>
    </div>
  </div>

        </div>




<?php include('footer.php');?>
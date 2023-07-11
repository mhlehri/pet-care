<?php 
include('header.php');
include_once '../admin/config/database.php';
$db = new Database();

if($_SERVER['REQUEST_METHOD']=='POST'){
  $oname = $_POST['ownername'];
  $email = $_POST['email'];
  $onum = $_POST['ownernum'];
  $pet = $_POST['petname'];
  $spet = $_POST['pet'];
  $days = $_POST['days'];

  $petselected= implode(",",$spet);

  if(empty($oname) || empty($email) || empty($onum) || empty($pet) || empty($petselected) || empty($days)){

    echo "<script> alert('Field must be fulfilled! ');</script>";

  }
  else{
    $sql = "insert into shelter (name, email, number, petname, spet, days) values ('$oname','$email','$onum', '$pet','$petselected','$days')";
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
        <div class="carousel-item active">
          <img src="./img/careb.jpg" class="d-block w-100" alt="..."/>
        </div>
      </div>
</div>


<div class="container">
  <div class="row my-4">
  <h1 class="allAboutOurShelter mb-4 bgheader">PetCare's Shelter</h1>
    <div class="col-md-6">
      <img src="./img/carecentercat.jpg" alt="" width="100%" class="mb-3">
      <img src="./img/carecenterdog.jpg" alt="" width="100%" class="mb-3">
    </div>
    <div class="col-md-6">
      <h2 class="bgheader">All About Our Shelter</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus dolore praesentium ullam ea? Ut, provident?</p>
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam, quis corrupti ipsam error facilis nostrum tempore officiis, incidunt natus sequi at adipisci, tenetur dolore est.</p>
      <h3 class="bgheader">Shelter Features</h3>
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



<div class="row my-4">

  <h1 class="mb-4 bgheader text-center" id="form">Book Shelter</h1>
  <div class="col-md-3"></div>
  <div class="col-md-6">
  <form action="shelter.php#form" method="post"  class="py-5 px-4 " style='' >
    <div class="alert alert-secondary" role="alert">
    You have to pay $80/day for single pet.
    </div>
        <label for="ownername" class="form-label">Your Name*</label>
        <input type="text" class=""  name="ownername" id="ownername" required>
        <label for="email" class="form-label mt-2">Your Email*</label>
        <input type="email" class=""  name="email" id="email" required>
        <label for="ownernum" class="form-label mt-2">Your Number*</label>
        <input type="text" class="" name="ownernum" id="ownernum" required>
        <label for="petname" class="form-label mt-2">Pet Name*</label>
        <input type="text" class="" name="petname" id="petname" required>
        <label for="spet" class="form-label mt-2">Select Pet*</label> <br>
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox"  name="pet[]" value="cat" id="catc">
          <label class="form-check-label" for="catc">Cat</label>
        </div>
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" name="pet[]" value="dog" id="dogc">
          <label class="form-check-label" for="dogc"> Dog </label>
        </div>
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" name="pet[]" value="bird" id="birdc">
          <label class="form-check-label" for="birdc"> Bird </label>
        </div>
        <label for="days" class="form-label mt-2">For how many days* (Maximum 20 Days)</label>
        <input type="text" class="" name="days" id="days" min="1"max="20" required>
        <button type="submit" name="submitpet" class="mt-4 btn btn-outline form-control" >Book</button>

      </form>
  </div>
  <div class="col-md-3"></div>

    </div>
  </div>
</div>


















<?php include('footer.php');?>
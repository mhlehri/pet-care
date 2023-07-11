<?php include('header.php');

    include_once '../admin/config/database.php';
    $db = new Database();

      
    if(isset($_GET['details'])){
        $vetdetail = $_GET['details'];
    }
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $oname = $_POST['ownername'];
      $email = $_POST['email'];
      $onum = $_POST['ownernum'];
      $pet = $_POST['petname'];
      $spet = $_POST['pet'];
      $vname = $_POST['vetname'];
      $date = $_POST['date'];
      $petselected= implode(",",$spet);

      if(empty($oname) || empty($email) || empty($onum) || empty($pet) || empty($spet) || empty($petselected)|| empty($vname) || empty($date)){
    
        echo "<script> alert('Field must be fulfilled! ');</script>";
        header("location: vet_details.php?");
    
      }
      else{
        $sql = "insert into b_vet (name, email, number, petname, spet, vname, date) values ('$oname','$email','$onum', '$pet','$petselected', '$vname','$date')";
        $result = $db->insert($sql);
      
        if($result)
        {
          echo "<script> alert('You Appointment Recived! ');</script>";
        }
        else
        {
          echo "<script> alert('');</script>";
        }
      }
    
    
    
    }

    ?>




<div class="vet_details">
    <div class="container">
        
    <?php  

            $vet_sql = "SELECT * FROM `vet_d`  where name = '$vetdetail'";
            $vet_details = $db->select($vet_sql);
            if($vet_details){
            while($row = mysqli_fetch_assoc($vet_details)){
    ?>

            <div class="row py-5">
            <div class="col-md-7">
                <img src="../admin/fancybox/<?= $row['img']; ?>" alt="" srcset="" width="100%">
            </div>
            <div class="col-md-5">
                <h2 class='bgheader'><?= $row['name'];?></h2>
                <h5 style='text-decoration:underline;'>Qualification</h5>
                <p><?= $row['short'] ?></p>
                <h5 style='text-decoration:underline;'>Contacts</h5>
                <p><i class="fa-solid fa-phone"></i> <?= $row['number'] ?></p>
                <p><i class="fa-solid fa-envelope"></i> <?= $row['email'] ?></p>
            </div>
            <div class="row mt-4">
            <h2 class="my-0">More Details</h2>
            <p class='my-0'><?= $row['full'] ?></p>
            </div>

            <div class="row my-4">

                
                <div class="col-md-6">
                <h3 class="bgheader text-center" id="">Location of Our Clinic</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58343.987989968075!2d90.24003632302917!3d23.942779826195842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755e812b12f6237%3A0xd4fdc9162c360ca0!2z4Kas4Ka-4KaH4Kaq4Ka-4KaH4Kay!5e0!3m2!1sbn!2sbd!4v1686448190340!5m2!1sbn!2sbd" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  <h3 class="bgheader text-center" id="">Treatment Costs</h3>
                  <ul> 
                    <li>Neuter = $120</li>
                    <li>Spay = $130</li>
                    <li>Vaccine = $20</li>
                    <li>Polio = $20</li>
                    <li>Mosat = $190</li>
                    <li>Sergery = $180</li>
                    <li>Neuter = $100</li>
                  </ul>
                </div>
                <div class="col-md-6">
                <h3 class="bgheader text-center" id="form">Appointment Form</h3>
                <form action="vet_details.php?details=<?php echo $row['name'];?>" method="post"  class="py-5 px-4" id="">
                   
                        <label for="ownername" class="form-label">Your Name*</label>
                        <input type="text" class=""  name="ownername" id="ownername" required>
                        <label for="email" class="form-label mt-2">Your Email*</label>
                        <input type="email" class=""  name="email" id="email" required>
                        <label for="ownernum" class="form-label mt-2">Your Number*</label>
                        <input type="text" class="" name="ownernum" id="ownernum" required>
                        <label for="petname" class="form-label mt-2">Pet Name*</label>
                        <input type="text" class="" name="petname" id="petname" required>
                        <label for="spet" class="form-label mt-2">Select Pet*</label>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" name="pet[]" value="cat" id="catc">
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
                        <input type="hidden" class="" name="vetname" value="<?= $row['name']; ?>" id="vname"> 
                        <label for="date" class="form-label mt-2">Select Date* - Available time [10am to 4pm]</label>
                        <input type="date" id="date" name="date" class='' required>
                        <button type="submit" name="submitpet" class="mt-4 btn btn-outline form-control" >Book</button>

                    </form>
                </div>
             
    </div>
  </div>
            
    <?php

            }
            } 
    ?>


        </div>
</div>






<?php include('footer.php');?>
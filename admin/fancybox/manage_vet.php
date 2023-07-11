<?php 
    include_once '../config/database.php';
    include('header.php');
    $db = new Database();

    $sql = "select * from vet_d order by id desc";
    $result = $db->select($sql) ;
    $csql = "select * from b_vet order by id desc";
    $cresult = $db->select($csql) ;


    
if(isset($_GET['deladmin'])){
    $del_ad = $_GET['deladmin'];
    $sql = "delete from vet_d where id = '$del_ad'";
    $del = $db->delete($sql);
    if($del){
        header('location: manage_vet.php');
    }else{
        echo "<script> alert(Deletation Failed!) </script>";
    }
}
if(isset($_GET['deladmin1'])){
    $del_a = $_GET['deladmin1'];
    $sql = "delete from b_vet where id = '$del_a'";
    $del = $db->delete($sql);
    if($del){
        header('location: manage_vet.php');
    }else{
        echo "<script> alert(Deletation Failed!) </script>";
    }
}


    ?>
    <div class="col-md-9 pe-4">
    <ul class="nav nav-tabs mt-2" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Appointment</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Vet Info</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
  <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sr. No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                if($cresult){
                                    while($row = mysqli_fetch_assoc($cresult)){
                            ?>

                            <tr class="tr_manage_admin">
                                <td scope="row"><?= $row['id']; ?></td>
                                <td><?= $row['name']; ?></td>
                                <td><?= $row['date']; ?></td>
                                <td><a href="#magicDiv<?= $row['id'] ?>" class="btn btn-sm btn-outline-success fancybox me-2">Details</a>   <a href="?deladmin1=<?php echo $row['id']; ?>" onclick="return confirm(`Are you sure to delete?`)" class="btn btn-sm btn-outline-danger">Remove</a></td>
                            </tr>

                            <div id="magicDiv<?= $row['id'] ?>" style="display:none; width:600px;">
                                <strong> Name:</strong> <h2><?= $row['name'];?></h2>
                                <strong> Email:</strong>  <p><?= $row['email'];?></p>
                                <strong> Number:</strong>  <p><?= $row['number'];?></p>
                                <strong> Pet Name:</strong>  <p><?= $row['petname'];?></p>
                                <strong> Pet:</strong>  <p><?= $row['spet'];?></p>
                                <strong> Vet Name:</strong> <p><?= $row['vname'];?></p>
                            </div>

                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
  </div>
  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
    
<div class="admin_add_button">
        <a href="add_vet.php" class="btn">ADD NEW VET</a>
    </div>
     <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sr. No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                if($result){
                                    while($row = mysqli_fetch_assoc($result)){
                            ?>

                            <tr class="tr_manage_admin">
                                <td scope="row"><?= $row['id']; ?></td>
                                <td><?= $row['name']; ?></td>
                                <td><a href="#magicDiv<?= $row['id'] ?>" class="btn btn-sm btn-outline-success fancybox me-2">Details</a>     <a href="?deladmin=<?php echo $row['id']; ?>" onclick="return confirm(`Are you sure to delete?`)" class="btn btn-sm btn-outline-danger">Remove</a></td>
                            </tr>

                            <div id="magicDiv<?= $row['id'] ?>" style="display:none; width:600px;">
                                <img src="<?= $row['img'] ?>" alt="" width="100%"> 
                                <h2><?= $row['name'];?></h2>
                                <p><?= $row['short'];?></p>
                                <p><span><i class="fa-solid fa-envelope"></i> <?= $row['email'] ;?></span></p>
                                <p><span><i class="fa-solid fa-phone"></i> <?= $row['number'] ;?></span></p>
                                <p><span><?= $row['full'] ;?></span></p>

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


<?php include('footer.php');?>


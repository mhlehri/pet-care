<?php
 session_start();
if($_SESSION['name'] != 'xy2a1'){
    header('location: login.php');
}
$id =  $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | PetCare</title>
    <link rel="shortcut icon" href="../fancybox/upload/paw-solid.ico" type="image/x-icon" />

    <link rel="stylesheet" href="admin_style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <script src="./fancybox-tools/jquery-1.10.2.min.js"></script>
      <script src="./fancybox-tools/jquery.fancybox.pack.js"></script>
      <link rel="stylesheet" href="./fancybox-tools/jquery.fancybox.css" media='screen'>
      <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
      <script type='text/javascript'>
        $(document).ready(
            function (){
                $('.fancybox').fancybox();
            }
        );
      </script>
      
      
</head>
<body>

        <h1 class="Admin_Page_header px-0">Admin Panel</h1>
        

<div class="container-fluid p-0">
<div class="row">

<div class="col-md-3 pe-0">
    <div class="nav_item">
    <h2 class="nav_title" style="color:white;">controls <span><i class="fa-solid fa-circle-exclamation"></i></span> </h2>
    <div class="navigation_bar">
    <ul>
        <li><a href="home.php"><i class="fa-solid fa-house"></i> Home</a></li>
        <li><a href="editprofile.php"><i class="fa-solid fa-user"></i> Edit Profile</a></li>
        <li><a href="change_password.php"><i class="fa-solid fa-lock"></i> Change Password</a></li>
        <li><a href="manage_admin.php"><i class="fa-solid fa-user-ninja"></i> Manage Admin</a></li>
        <li><a href="add_product.php"><i class="fa-solid fa-cart-plus"></i> Add Product</a></li>
        <li><a href="manage_product.php"><i class="fa-solid fa-list-check"></i> Manage Product</a></li>
        <li><a href="manage_shelter.php"><i class="fa-solid fa-paw"></i> Manage Shelter Info</a></li>
        <li><a href="manage_vet.php"><i class="fa-solid fa-shield-cat"></i> Vets & Appointment</a></li>
        <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket fa-fade"></i> Log Out</a></li>
    </ul>
    </div>
    </div>
</div>



   
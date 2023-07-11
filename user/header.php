<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700;900&display=swap&family=Aoboshi+One&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="slick.css">
  <link rel="stylesheet" href="slick-theme.css">
  <link rel="shortcut icon" href="./img/paw-solid.ico" type="image/x-icon">
  <title>PetCare</title>

  <style>
 input[type="password"],
    input[type="text"],
    input[type="email"],
    input[type="date"],select,textarea
 {
      border:none;
      outline:none;
      border-bottom: 1px solid #6b3a19e3;
      background: transparent;
      width:100%;
      color:#111;
      appearance:none;
    }
    input[type="search"]
 {
      border:none;
      outline:none;
      border-bottom: 1px solid #6b3a19e3;
      background: transparent;
      width:100%;
      color:#111;
    }
    input[type="password"]:focus,
    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="date"]:focus,
    select:focus,
    textarea:focus
     {
      border-bottom: 1px solid #ddd0c8;
      
    }
    input[type="search"]:focus
     {
      border-bottom: 1px solid #88786f;
      
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-md w-100 hu d-flex align-items-center" >
  <div class="container">
  <a class="navbar-brand pb-0" href="index.php" style="text-shadow: 1px 1px 10px #111"><h3 class="pb-0 mb-0"><i class="fa-solid fa-paw text-white"></i><span class='text-white bg-black'>Pet</span><span class='text-white'>Care</span></h3></a>
  <button
    class="navbar-toggler"
    type="button"
    data-bs-toggle="collapse"
    data-bs-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-sm-0">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="index.php"
          >Home</a
        >
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php" target="">About</a>
      </li>

      <li class="nav-item dropDown">
        <a class="nav-link dropdown-toggles" href="product.php" > Products </a>
        <ul class="dropdownMenu">
          <li>
            <a class="dropdownItem text-decoration-none" href="cat.php"
              >Cat Items</a
            >
          </li>

          <li>
            <a class="dropdownItem text-decoration-none" href="dog.php"
              >Dog Items</a
            >
          </li>

          <li>
            <a class="dropdownItem text-decoration-none" href="bird.php"
              >Bird Items</a>
          </li>
          <li>
            <a class="dropdownItem text-decoration-none" href="medicine.php"
              >Medicine <i class="fa-solid fa-capsules"></i></a
            >
          </li>
        </ul>
      </li>
      <li class="nav-item dropDown">
        <a class="nav-link dropdown-toggles"> Services </a>
        <ul class="dropdownMenu">
          <li>
            <a class="dropdownItem text-decoration-none" href="shelter.php"
              >Shelter <i class="fa-solid fa-shield-heart"></i></a
            >
          </li>

          <li>
            <a class="dropdownItem text-decoration-none" href="vet.php"
              >Vets 
            </a>
          </li>
        </ul>
      </li>
    </ul>
   <label for="sea" type="button" class="btnclick me-2 btn btn-outline" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <a>Search <i class="fa-solid fa-magnifying-glass"></i></a>
</label>

    <div class="nav-cart d-flex me-2">
      <?php
          $count=0;
        if(isset($_SESSION['cart'])){
          $count=count($_SESSION['cart']);
        }
      ?>
      <a
        href="my_cart.php"
        class="flex-column justify-content-center align-items-center btn btn-outline"
        ><i class="fa-solid fa-cart-shopping"></i><sup><?php echo $count;?></sup></a>
    </div>
    <div class="nav-cart d-flex">
      <?php
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
          ?>
        
          <div class="btn-group">
            <button type="button" class="btn btn-outline"> <a><i class="fa-solid fa-user"></i> <?php echo $_SESSION['username'];?></a></button>
            <button type="button" class="btn btn-outline dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            </button>
            <ul class="dropdown-menu bgheader p-0" aria-labelledby="defaultDropdown">
              <li><a class="dropdown-item btn-outline" onclick="alert('You are gonna log out?')" href="logout.php">logout</a></li>
            </ul>
          </div>
      <?php
        }else{

          ?>

    <a href="login.php" class=" flex-column justify-content-center align-items-center btn btn-outline">Login</a>

      <?php
        }
      ?>
      
    </div>
  </div>
</div>

 </nav>




<!-- Modal -->
<div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-right bgheaders">

      <div class="modal-body d-flex justify-content-between align-items-center">
      <form class="d-flex me-1 w-100" role="search" method="get" action="search.php">
      <input
        style=""
        class="w-100" name='search'
        type="search" required value="<?php if(isset($_GET['search'])){ echo $_GET['search']; }?>"
        placeholder="Search"
        aria-label="Search" id='sea'
      />
      <button class="btn btn-outline" type="submit" name="" ><i class="fa-solid fa-magnifying-glass"></i>
      </button>
    </form>
    <button type="button" class="btn-close ms-3" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    </div>
  </div>
</div>
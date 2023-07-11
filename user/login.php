<?php     
  session_start();
    include_once '../admin/config/database.php';
    $db = new Database();
    $mssge='';


  if(isset($_POST['login'])){
    $username_email=$_POST['username_email'];


    $sql="SELECT * FROM reg WHERE username='$username_email' OR email='$username_email'";
    $result=$db->select($sql);

    
    if($result){
      if(mysqli_num_rows($result)==1){
       
        $r_fetch=mysqli_fetch_assoc($result);
        if($_POST['password'] == $r_fetch['password']){
         
          $_SESSION['logged_in']=true;
          $_SESSION['username']=$r_fetch['username'];
          header("location: index.php");
          
        }else
        {
          echo "<script>alert('Incorrect Password!');</script>";
        }

        }else{
          echo "<script>alert('Username or Email is not registered!');</script>";
        }
        
      
  }

}



?>

<!doctype html>
<html lang="en">

<head>

  <title>PetCare | Login</title>
  <link rel="shortcut icon" href="./img/paw-solid.ico" type="image/x-icon">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700;900&display=swap&family=Aoboshi+One&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
      body{
        background: whitesmoke;
        font-family: "Roboto Mono", monospace;
      }
    .login_form{
      background-color: white;
      color:#111;
      width: 400px;
      border-radius:5px;
      box-shadow: 1px 1px 10px rgba(0, 0, 0, .1);
    }

    input[type="password"],
    input[type="text"],
    input[type="email"] {
      border:none;
      outline:none;
      border-bottom: 1px solid #111;
      background: transparent;
      width:100%;
      color:#111;
    }
    input[type="password"]:focus,
    input[type="text"]:focus,
    input[type="email"]:focus {
      border-bottom: 1px solid #ddd0c8;
      
    }

    button{
      color:#111;
      background: transparent;
      border:1px solid #111;
      outline:none;
      padding:5px 10px;
      border-radius:5px;
    }
    button:hover{
      color:white;
      background: #111;

    }

</style>

<body>
 



        <div style='height: 100vh; width: 100vw;' class="d-flex justify-content-center align-items-center">
            <div class="login_form p-5">
              <form method="post">
              <h4 class="text-center mb-3"><i class="fa-solid fa-paw text-black"></i><span class='text-white bg-black'>Pet</span><span class='text-black'>Care</span></h4>
                <label for="username_email" class="form-label">Username or Email</label>
                <input type="text" class="mb-2" name="username_email" id="username_email">
                <label for="password" class="form-label">Password</label>
                <input type="password" class=" mb-4" name="password" id="password">
                <button type="submit" name="login" class="mb-2">Login</button> <br>
                Don't have an account? <a href="signup.php">signup</a>
              </form>
            </div>
        </div>









  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
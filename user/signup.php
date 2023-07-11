<?php     

    include_once '../admin/config/database.php';
    $db = new Database();

if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['signup'])){
    $fname=$_POST['full_name'];
    $uname=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['npassword'];
    $rpassword=$_POST['rpassword'];
   

    $sql="SELECT * FROM reg WHERE username='$uname' OR email='$email'";
    $result=$db->select($sql);

    
    if($result){
      if(mysqli_num_rows($result)>0)
      {
        $result_fetch = mysqli_fetch_assoc($result);
        if($result_fetch['username'] == $uname)
        {
          echo "<script>alert('username already taken!');
          window.location.href= 'signup.php'</script>";
        }else
        {
          echo "<script>alert('Email already registered!');
          window.location.href= 'signup.php'</script>";
        }
      }
      elseif(empty($fname) || empty($uname) || empty($email) || empty($password) || empty($rpassword))
      {
        echo "<script>alert('all field required!');
          </script>";
      }else
      {
        if($password != $rpassword)
        {
          echo "<script>alert(`Confirm password did not match!`);</script>";
        }
        else
        {
          $q="INSERT INTO `reg`(`full_name`, `username`, `email`, `password`) VALUES ('$_POST[full_name]','$_POST[username]','$_POST[email]','$_POST[npassword]')";
          $re=$db->insert($q);
        if($re)
        {
          echo "<script>alert('registation successfull!');
          window.location.href='login.php';
          </script>";
        }
        else
        {
          echo "<script>alert('connot connect !');</script>";
        }
        }
        }        
      }
      else
      {
        echo "<script>alert('connot connect to server!');</script>";
    }
    }
  }


?>
<!doctype html>
<html lang="en">

<head>

  <title>PetCare | Signup</title>
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
              <form method="POST" action="">
              <h4 class="text-center mb-3"><i class="fa-solid fa-paw text-black"></i><span class='text-white bg-black'>Pet</span><span class='text-black'>Care</span></h4>
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" class="mb-2" name="full_name" id="full_name">
                <label for="username" class="form-label">Username </label>
                <input type="text" class="mb-2" name="username" id="username">
                <label for="email" class="form-label">Email </label>
                <input type="email" class="mb-2" name="email" id="email">
                <label for="npassword" class="form-label">Password </label>
                <input type="password" class=" mb-2" name="npassword" id="npassword">
                <label for="rpassword" class="form-label">Confirm Password </label>
                <input type="password" class=" mb-4" name="rpassword" id="rpassword">
                <button type="submit" name="signup" class="mb-2">Signup</button> <br>
                Already have an account. <a href="login.php">Login</a>
              </form>
            </div>
        </div>









  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
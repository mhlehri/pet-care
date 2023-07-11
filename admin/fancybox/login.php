<?php

    session_start();
    session_destroy();


    include_once '../config/database.php';
    $db = new Database();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "select * from admin where email = '$email' and password = '$password'";

        $result = $db->select($query);

        if($result){
            while($row = mysqli_fetch_assoc($result)){
                
               session_start();
                $_SESSION['name'] = 'xy2a1';
                $_SESSION['id'] = $row['Id'];

                header("location: home.php");

            }
        }else{
            echo "<script>alert(`Failed! Email or Password didn't match`);</script>";
        }

    };

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login Page | PetCare</title>
    <link rel="stylesheet" href="admin_style.css" />
    <link rel="shortcut icon" href="../../img/logo.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"/>
</head>
<body class="bgimage">

            <div class="loginpage d-flex justify-content-center">
                <div class="login_form">
                    <form method="post">
                        <h2 class="text-center py-2"> <img width="50px" src="../../img/logo.png" alt=""><br> Admin Panel login</h2>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" placeholder="example@gmail.com" class="form-control" id="email">
                        <div class="mb-3">
                            <label for="pass"  class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="pass">
                        </div>
                        <button type="submit" class="btn btn-outline-danger form-control mt-2">Login</button>
                    </form>
                </div>
            </div>


</body>
</html>
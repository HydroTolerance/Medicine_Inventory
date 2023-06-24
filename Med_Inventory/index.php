







<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Log in</title>
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <script src="index.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <style type="text/css">

.lalagyan{
    align-items: center;
    align-content: center;
    display: flex;
    flex-direction: column;
}
.container{
    height: 500px;
    width: 600px;
    background-color: white;
    box-shadow: 5px 10px 8px 10px #888888;
    align-items: center;
    text-align: left;
    border-radius: 25px;
    margin: auto;
    margin-top: 15%;
}

#regheaders{
    margin-bottom: 10px;   
    color: rgb(0, 102, 255);
    text-align: center;
    padding-top: 30px;
}

::placeholder{
    color: rgb(0, 102, 255);
}
#details{
    display: flex;
    flex-direction: column;
    padding: 10px;
    z-index: 1;
}
input[type=text],[type=password] {
  padding: 12px 20px;
  margin: 8px 0;
  border: 2px solid rgb(0, 102, 255);
  font-weight: bolder;
  font-size: 20px;
  border-radius: 25px;
  align-self: center;
  color: rgb(0, 102, 255);
  width: 80%;
}

input[type=checkbox],[type=password] {
  padding: 12px 20px;
  margin: 8px 0;
  border: 2px solid rgb(0, 102, 255);
  font-weight: bolder;
  font-size: 20px;
  border-radius: 25px;
  align-self: center;
  color: rgb(0, 102, 255);
  width: 80%;
}



input[type=submit]{
    margin-top: 40px;
    background-color: rgb(0, 102, 255);
    width: 500px;
    border-radius: 25px;
    align-self: center;
    padding: 10px;
    border-style: none;
    color: white;
    font-weight: bolder;
    font-size: 30px;
    cursor: pointer;
}
input[type=submit]:hover {
    background-color: rgb(6, 54, 126);
}

input[type=checkbox] {
    transform: scale(1.5);
}

input[placeholder]{
    text-align: center;
}
img{
    width: 300px;
    margin-bottom: -110%;
}

.newuser{
    font-size: 20px;
    margin-top: 20px;
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
}
.move{
    position: relative;
    margin-top: 10px;
    left: -180px;
    font-family: Arial, Helvetica, sans-serif;
}
.show {
    position: relative;
    margin-top: 5px;
    top: 3px;
    left: -200px;
    font-size: 15px;
}


@media screen and (max-width: 700px) {xX
  .container{   
    width: 310px;
    height: 470px;
  }
  input[type=submit]{
    width: 80%;
  }
  img{
    margin-bottom: -35%;
  }
}
@media screen and (max-width: 1500px) {
  .container{   
    width: 610px;
    height: 570px;
  }
  input[type=submit]{
    width: 80%;
  }
  img{
    margin-bottom: -30%;
  }
}
</style>
<body style="background-image: url('assets/DoctorBackground.png');background-repeat: no-repeat; background-position: left;">
<?php

    require "config.php";
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!empty($_SESSION["ID"]) || !empty($_SESSION["USERNAME"])){
        header("location: Admin.php");
    }
    if(isset($_POST["submit"])){
        $username = $_POST["USERNAME"];
        $password = $_POST["PASSWORD"];
        $result = mysqli_query($variable,"SELECT * FROM admin_account WHERE USERNAME = '$username'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) > 0){
            if($password == $row['PASSWORD']){
                $_SESSION["LOGIN"] = true;
                $_SESSION["ID"] = $row["ID"];
                echo"<script> 
                Swal.fire({
                    icon: 'success',
                    title: 'You are Now Login',
                    text: 'Welcome to the Inventory',
                    timerProgressBar: true,
                  }).then(function (result) {
                    if (result.value) {
                        window.location = 'dashboard.php';}})</script>";
            }
            else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Wrong Password!',
                  })
             </script>";
            }
        }

        else{
            echo "<script> Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'User is Not Registered!',
              })</script>";
        }
    }




?>
<div class="main">
<div class="sub">
</div>
<div class="lalagyan">
    <div>
    <img src="assets/DoctorProf.png" style="margin-bottom: -120px; margin-top:50px; margin-left:140px;">
         <div class="container">
            <div id="regheaders"><h1>Log In</h1></div>
            <form name="reg" method="POST" id="details">
            <input class="input" type="text" id="USERNAME" name="USERNAME" required placeholder="Username">
            <input class="input" type="password" id="myInput" name="PASSWORD" required placeholder="Password">
            <div class="move">
                <input type="checkbox" onclick="myFunction()"><label for="" class="show">Show Password </label> 
            </div>
            <input name="submit" type="submit" value="Submit">
            </form>
            <div class="newuser">
                <label for="">New User? <a href="register.php">Registration</a></label>
            </div>
            
        </div>
    </div>
        
</div>
</div>
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<?php include "scripts.php" ?>
</body>
</html>
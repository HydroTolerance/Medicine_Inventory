<?php
require "config.php";
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(!empty($_SESSION["ID"])){
    header("location: dashboard.php");
}
if(isset($_POST["submit"])){
    $username = $_POST["USERNAME"];
    $password = $_POST["PASSWORD"];
    $confirm = $_POST["CONFIRMPASSWORD"];
    $firstname = $_POST["FIRSTNAME"];
    $lastname = $_POST["LASTNAME"];
    $duplicate = mysqli_query($variable, "SELECT * FROM admin_account WHERE USERNAME = '$username'");
    if(mysqli_num_rows($duplicate) > 0){
        echo "<script> alert('Username is already Available');</script>";
    }
    else {
        if($password == $confirm){
            $query = "INSERT INTO admin_account (USERNAME, PASSWORD, FIRSTNAME, LASTNAME) VALUES('$username', '$password','$firstname', '$lastname')";
            mysqli_query($variable, $query);
            header("location:index.php");

        }
        else {
            echo "<script> alert('Password does not match');</script>";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Log in</title>
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="login.css">
        <style type="text/css">

.lalagyan{
    align-items: center;
    align-content: center;
    display: flex;
    flex-direction: column;
}
.container{
    height: 600px;
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

input[type=submit]{
    margin-top: 20px;
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

.newuser{
    font-size: 20px;
    margin-top: 20px;
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
}

input[placeholder]{
    text-align: center;
}
img{
    width: 300px;
    margin-bottom: -110%;
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
</head>
<body style="background-image: url('assets/DoctorBackground.png');background-repeat: no-repeat; background-position: left;">
<div class="main">
<div class="sub">
</div>
<div class="lalagyan">
<div>
<img src="assets/DoctorProf.png" style="margin-bottom: -120px; margin-top:50px; margin-left:140px;">
        <div class="container">
            <div id="regheaders"><h1>Register</h1></div>
            <form name="reg" method="POST" id="details">
                <input class="input" type="text" id="FIRSTNAME" name="FIRSTNAME" required placeholder="First Name">
                <input class="input" type="text" id="LASTNAME" name="LASTNAME" required placeholder="Last Name">
                <input class="input" type="text" id="USERNAME" name="USERNAME" required placeholder="Username">
                <input class="input" type="PASSWORD" id="PASSWORD" name="PASSWORD" required placeholder="Password">
                <input class="input" type="PASSWORD" id="CONFIRMPASSWORD" name="CONFIRMPASSWORD" required placeholder="Confirm Password">
                <input name="submit" type="submit" value="Register">
                <div class="newuser">
                <label for="">New User? <a href="index.php">Login</a></label>
            </div>
            </form>
</div>
</div>
</div>
</div>
</html>
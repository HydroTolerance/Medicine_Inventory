<?php
    require "config.php";
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!empty($_SESSION["ID"])){
        $id = $_SESSION["ID"];
        $result = mysqli_query($variable, "SELECT * FROM admin_account WHERE ID = $id");
        $row = mysqli_fetch_assoc($result); 
    }

    else{
        header("location: login.php");
    }

?>
<!DOCTYPE html>
<html>
<head>
  <link href='https://fonts.googleapis.com/css?family=Allan' rel='stylesheet'>
<title>Notes</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  body {
  font-family: Arial;
  margin: 0;
}
  #notecontainer{
    background-image: url('assets/stickynote.png');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    width: 650px;
    height: 600px;
    font-family: 'Allan';
    font-weight: bold;    
  }

  #number{
    line-height: 160px;
    margin-left: 20%;
    font-size: 50px;
    margin-top: 50px;
  }

  #details{
    margin-top: -0px;
    text-align: center;
    font-size: 35px;
  }

  #notedetails{
    line-height: 70px;
    text-align: center;
    margin-left: 25%;
    font-size: 30px;
    text-overflow: string;
    width: 300px;
  }

  .notes{
    width: 100%;
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
  }

  a{
    cursor: pointer;
  }

  #icon{
    margin-left: 400px;
    margin-top: -300px;
    width: 60px;
  }
  #add{
    width: 100px;
    position: absolute;
  }

  #board{
    width: 100%;
    display: flex;
    flex-direction: row;
    flex-wrap:wrap;
  }

</style>
</head>
<body >
<body style="background-color: #b99976;">
<div>
<?php 
    include("sidebar.php");
    ?>
</div>

<div class="content">
<div class="buttons">
  <div class="button1">
    <a onclick="window.location.href='noteadd.php';">
        <img id="add" src="assets/addnote.jpg">
    </a>
  </div>
</div>
  <div style="background-color: #b99976;">

<?php
include("config.php");
$count=1;
$sel_query="SELECT * FROM notes ORDER BY ID DESC;";
$result = mysqli_query($variable,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<div id="board">  
  <div class="notes">
    <div id="notecontainer">
      <div id="number"><?php echo $count; ?></div>
        <div id="details">
          <?php echo $row["FIRSTNAME"]; ?>
          <?php echo $row["LASTNAME"]; ?>
        </div>
        <div id="notedetails">
          <?php echo $row["NOTE"]; ?>
        </div>
    </div>
  </div>

<a onclick="return confirm('Are you sure! You want to delte this?')" href="notedelete.php?id=<?php echo $row["ID"]; ?>"><img id="icon" src="assets/delete.png"></a>
<?php $count++; } ?>

</div>

</div>
    
</div>

</body>
</html>
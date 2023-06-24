<?php
    require "config.php";
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!empty($_SESSION["ID"])){
        $id = $_SESSION["ID"];
        $result = mysqli_query($variable, "SELECT * FROM staff_account WHERE ID = $id");
        $row = mysqli_fetch_assoc($result); 
    }

    else{
        header("location: login.php");
    }

?>






<?php
include "config.php";
    if(isset($_POST["search"]))
    {
        $valueToSearch = $_POST["valueToSearch"];
        $query = "SELECT * FROM staff_account WHERE CONCAT(ID, FIRSTNAME, ROUND(SHIFT)) LIKE '%".$valueToSearch."%'";
        $search_result = filterTable($query);
    }
    else{
        $query = "SELECT * FROM staff_account";
        $search_result = filterTable($query);
    }
    function filterTable($query){
        include "config.php";
        $filter_result = mysqli_query($variable, $query);
        return $filter_result;
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <title>Medicine</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="index.js"></script>
</head>
<body id="landing_body">
<div>
<?php 
    include("sidebar1.php");
    ?>
</div>
<div class="content">
    <div>
        <?php 
            include("navbardash.php");
        ?>
    </div>
<!-- 
    <div class="p-4 header bg-primary text-white">
        <h3 class="p-3 text-center">Pharmaceutical Inventory System</h3>
    </div>
    -->
    <div id="dashboard_table" style="border-top:1px solid black;">
        <h2 class="p-4">Staffs Account</h2>
    </div>
    <?php
        if(isset($_GET['msg'])){
            $msg = $_GET['msg'];
            
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">'.$msg.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';

        }
        ?>
<br>
    <form action="" method="post">
        <div  class="d-flex justify-content-center ">
            <div id="searchbox" class="input-group mb-3 w-50 ms-3">
                <input type="text" name="valueToSearch" placeholder="Search Medicine" class="form-control" size="100">
                <input type="submit" name="search" value="Search" class="btn btn-primary">
            </div>
        </div>
        
   

    <table class="table table-striped  text-center mt-4 h5">
        <thead class="bg-primary text-white">
            <tr >
                <td scope="col">STAFF ID</td>
                <td scope="col">FIRSTNAME</td>
                <td scope="col">LASTNAME</td>
                <td scope="col">SHIFT</td>
            </tr>
        </thead>
            
        <tbody>

        
    <?php
    include "config.php";
    $sql = "SELECT * FROM staff_account";
    $result = mysqli_query($variable, $sql);
    while($row = mysqli_fetch_assoc($result)){
        ?>
        <?php while($row = mysqli_fetch_array($search_result)):?>
            <tr>
                <td><?php echo $row['ID']?></td>
                <td><?php echo $row['FIRSTNAME']?></td>
                <td><?php echo $row['LASTNAME']?></td>
                <td><?php echo $row['SHIFT']?></td>
                <td>
                </td>
            </tr>
            <?php endwhile;?>
<?php
    }
    ?>
        </tbody>
    </table>
    </form>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
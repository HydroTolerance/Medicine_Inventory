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
        $query = "SELECT * FROM `medicines` WHERE CONCAT(`id`, `medicine`, `type`) LIKE '%".$valueToSearch."%'";
        $search_result = filterTable($query);
    }
    else{
        $query = "SELECT * FROM medicines";
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
    <div id="dashboard_table">
        <h2 class="p-4 ">Medicine</h2>
    </div>
    <?php
        if(isset($_GET['msg'])){
            $msg = $_GET['msg'];
            
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">'.$msg.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';

        }
        ?>
    <form method="post" action="export.php">
    <div class="d-flex mb-3 justify-content-end">
        <a class="m-2 text-decoration-none text-center flex-fill p-3 bg-primary bg-gradient h2 text-white rounded " href="createadmin1.php">Add Items</a>
        <input type="submit"value="Export to Excel" name="export" class="m-2 flex-fill  p-3 bg-success bg-gradient text-center text-decoration-none text-white rounded h2" values>
    </div>
    </form>

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
                <td scope="col">MED ID</td>
                <td scope="col">IMAGE</td>
                <td scope="col">MEDICINE</td>
                <td scope="col">QUANTITY</td>
                <td scope="col">TYPE</td>
                <td scope="col">PRICE</td>
                <td scope="col">TOTAL</td>
                <td scope="col">EXPIRATION</td>
                <td  scope="col"> ACTION</td>
            </tr>
        </thead>
            
        <tbody>

        
    <?php
    include "config.php";
    $sql = "SELECT * FROM `medicines`";
    $result = mysqli_query($variable, $sql);
    while($row = mysqli_fetch_assoc($result)){
        ?>
        <?php while($row = mysqli_fetch_array($search_result)):?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><img src="img/<?php echo $row['image']; ?>" width="125" height="100" title="<?php echo $row['image']; ?>"></td>
                <td><?php echo $row['medicine']?></td>
                <td><?php echo $row['quantity']?></td>
                <td><?php echo $row['type']?></td>
                <td><?php echo $row['price']?></td>
                <td><?php echo $row['quantity']*$row['price']?></td>
                <td><?php echo $row['expirydate']?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']?>" class="link-dark"><span class="material-icons me-3">edit</span></a>
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
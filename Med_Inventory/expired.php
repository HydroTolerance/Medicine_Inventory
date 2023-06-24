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
<style>
    body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

div.content {
  margin-left: 250px;
  padding: 1px 16px;
  height: 1000px;
}

</style>
<body id="landing_body">
<div>
<?php 
    include("sidebar.php");
    ?>
</div>
<div class="content">
<div>
    <?php 
        include("adminnavbardash.php");
    ?>
</div>
    <div id="dashboard_table" style="border-top:1px solid black;">
        <h2 class="p-4">Medicine</h2>
    </div>


    <form action="" method="post">
    <?php
    include "config.php";
    $sql = "SELECT * FROM medicines WHERE expirydate < NOW()";
    $result = mysqli_query($variable, $sql);
?>
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
                <td scope="col">ITEMS SOLD</td>
                <td scope="col">ALL PRICES</td>
                <td scope="col">EXPIRATION</td>
            </tr>
        </thead>
            
        <tbody>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id']?></td>
            <td><img src="img/<?php echo $row['image']; ?>" width="125" height="100" title="<?php echo $row['image']; ?>"></td>
            <td><?php echo $row['medicine']?></td>
            <td><?php echo $row['quantity']?></td>
            <td><?php echo $row['type']?></td>
            <td>₱<?php echo $row['price']?></td>
            <td>₱<?php echo $row['quantity'] * $row['price']?></td>
            <td>₱<?php echo $row['sales_quantity']?></td>
            <td>₱<?php echo $row['quantity'] - $row['sales_quantity']?></td>
            <td><?php echo $row['expirydate']?></td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
</div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
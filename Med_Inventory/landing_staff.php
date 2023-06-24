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
<style>
    body {
  margin: 0;
  font-family: "Lato", sans-serif;
}
.main {
  height: 600px;
  flex: 70%;
  padding: 20px;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  
}
#box {
  height: 200px;
  width: 439px;
  padding: 10px;
  display: flex;
  flex-direction: column;
  color: white;
  border-top-left-radius: 25px;
  border-top-right-radius: 25px;
  margin-bottom: 30px;
}

h5{
  width: 420px;
  margin-left: -2.5%;
  padding: 20px;
  text-align: center;
}
#box2 {
  background-color: white;
  height: 200px;
  width: 400px;
  padding: 30px;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 270px;
  background-color: #ADD8E6;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 250px;
  padding: 1px 16px;
  height: 1000px;
}

#arrow{
  background-color: white;
  width: 20px;
  height: 20px;
  border-radius: 50%;
}
.box_io {
  padding: 30px;
  background-color: white;
}


@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
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
    <form method="post" action="export.php">
    <div class="d-flex mb-3 justify-content-end">
    <span class="material-symbols-outlined" style="font-size: 65px; margin-top:10px;">group</span>
        <a class="m-2 text-decoration-none text-center p-3 bg-primary bg-gradient h4 text-white rounded " href="create_staff.php">Add Staff</a>
    </div>
    </form>

    <form action="" method="post">
        <div  class="d-flex justify-content-center " style="margin-top: -70px;">
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
                <td  scope="col"> ACTION</td>
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
                <td><?php echo date("h:iA", strtotime($row['SHIFT'])); ?></td>
                <td>
                    <a href="edit_staff.php?ID=<?php echo $row['ID']?>" class="link-dark"><span class="material-icons me-3">edit</span></a>
                    <a href="delete_staff.php?id=<?php echo $row['ID']?>" onclick="return confirm('Are you sure! want to delete?')" class="link-dark"><span class="material-icons ms-2">delete</span></a>
                </td>
            </tr>
            <?php endwhile;?>
<?php
    }
    ?>
        </tbody>
    </table>
    </form>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    // Function to handle the delete action
    function handleDelete(id) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this item!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                // Redirect to delete.php with the specified ID
                window.location.href = "delete.php?id=" + id;
            }
        });
    }

    // Attach event listener to the delete links
    const deleteLinks = document.querySelectorAll('.delete-link');
    deleteLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault();
            const id = link.getAttribute('href').split('=')[1];
            handleDelete(id);
        });
    });
</script>
   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
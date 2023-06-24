<?php 
include "config.php";
$id = $_GET["id"];
$sql = "DELETE FROM `medicines_admin` WHERE id = $id";
$result = mysqli_query($variable, $sql);

mysqli_close($variable);

    if($sql)
    {
        header ("location: landingadmin.php?msg=Deleted Successul");
        exit(0);
    }
        else
    {
        echo "Not Deleted";
        exit(0);
    }
?>
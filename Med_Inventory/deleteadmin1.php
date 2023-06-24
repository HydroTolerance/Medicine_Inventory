<?php 
include "config.php";
$id = $_GET["id"];
$image = "SELECT * FROM `medicines_admin` WHERE id = '$id'";
$result = mysqli_query($variable, $image);
$after = mysqli_fetch_assoc($result);

if ($after['image'] != 'default.png') {
    unlink('img/'.$after['image']);
}
$sql = "DELETE FROM `medicines_admin` WHERE id = $id";
$result = mysqli_query($variable, $sql);

mysqli_close($variable);

    if($sql)
    {
        header ("location: landingadmin1.php?msg=Deleted Successul");
        exit(0);
    }
        else
    {
        echo "Not Deleted";
        exit(0);
    }
?>
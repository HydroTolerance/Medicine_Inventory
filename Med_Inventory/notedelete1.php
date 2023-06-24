<?php
require('config.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM notes WHERE id=$id"; 
$result = mysqli_query($variable,$query);
header("Location: notes1.php"); 
?>
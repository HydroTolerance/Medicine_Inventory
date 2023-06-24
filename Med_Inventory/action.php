<?php
include "config.php";
    if(isset($_POST["refresh"]))
    {
        $valueToFilt = $_POST["valueToFilt"];
        $arola = "SELECT * FROM `medicines` WHERE CONCAT(`type`) LIKE '%".$valueToFilt."%'";
        $filter_result = filterTable1($arola);
    }
    else{
        $arola = "SELECT * FROM medicines";
        $filter_result = filterTable1($arola);
    }
    function filterTable1($arola){
        include "config.php";
        $filter_result = mysqli_query($variable, $arola);
        return $filter_result;
    }
?>

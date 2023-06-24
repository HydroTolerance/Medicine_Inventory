<?php

$host = "localhost";
$username = "root";
$password = "";//password to username, if locked
$db_name = "user_accounts";//name of database to access here

$variable = mysqli_connect($host, $username, $password, $db_name) or die("Can't access database");
?>
<?php

$dbhost="localhost";
$dbuser = "root";
$dbpass = "";
$dberror = "could not connect to the db";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass) or die($dberror);

mysqli_select_db($conn,"mydb");

?>

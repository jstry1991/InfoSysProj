<?php

$dbhost="localhost";
$dbuser = "root";
$dbpass = "";
$dberror = "could not connect to the db";
$dbname = "mydb";

$conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname) or die($dberror);

?>

<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "crud_vuejs";

$connection = mysqli_connect($host,$user,$password,$dbname);

if (mysqli_connect_errno()){
    die('Please check your connection '.mysqli_connect_error());
}

?>
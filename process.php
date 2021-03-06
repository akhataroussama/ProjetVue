<?php
    $connect = mysqli_connect('localhost','root','','crud_vuejs');
    if ($connect -> connect_error) {
        die('Connection failed !' . $connect->connect_error);
    }
    
    

?>
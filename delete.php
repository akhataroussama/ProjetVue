<?php
include 'connexion.php';

    $query = "DELETE FROM `users` WHERE `ID`={$_GET['i']}";
    $result = mysqli_query($connection,$query);

    header("location:index.php?delete=User Deleted Successfuly !!");



?>
<?php
include "includes/db.php";
include "includes/header.php";



if(isset($_GET['book_id_i'])){
    $carte_id = $_GET['book_id_i'];
    $id_user = $_SESSION['id'];

    $query = "UPDATE donate SET id_user_solicitant = {$id_user} WHERE id_carte_donata = {$carte_id}";
    $insert_query = mysqli_query($connection, $query);

    header("Location: adopta.php");
  }
?>

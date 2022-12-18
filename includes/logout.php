<?php ob_start(); ?>
<?php session_start(); ?>

<?php
$_SESSION['username'] = null;
$_SESSION['id'] = null;
$_SESSION['rol'] = null;

//$query = "DELETE FROM cos_produse";
//$delete_query = mysqli_query($connection, $query);

header("Location: ../index.php");
?>

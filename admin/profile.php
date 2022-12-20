<?php include "includes/admin_header.php"; ?>

<?php

    if(isset($_SESSION["username"])){
    $username = $_SESSION["username"];
    $id_user = $_SESSION['id'];
    $query = "SELECT * FROM user_admin WHERE id_user = '{$id_user}'";
    $select_profile_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_profile_query)){
        $nume = $row['nume'];
        $prenume = $row['prenume'];
        $localitate = $row['localitate'];
        $email = $row['email'];
    }

      if(isset($_POST['update_profile'])){
          $nume = $_POST['nume'];
          $prenume = $_POST['prenume'];
          $localitate = $_POST['localitate'];
          $email = $_POST['email'];

          $query = "UPDATE user_admin SET nume = '{$nume}',  prenume = '{$prenume}', ";
          $query .= "localitate = '{$localitate}', email = '{$email}' WHERE id_user = '{$id_user}' ";
          $update_query = mysqli_query($connection, $query);
          confirmQuery($update_query);
          header("Location: profile.php");
  }
  if(isset($_POST['create_profile'])){
      $nume = $_POST['nume'];
      $prenume = $_POST['prenume'];
      $localitate = $_POST['localitate'];
      $email = $_POST['email'];

      $query = "INSERT INTO `user_admin`(`id_user`, `nume`, `prenume`, `localitate`, `email`) VALUES ('{$id_user}','{$nume}','{$prenume}','{$localitate}', '{$email}')";
      $update_query = mysqli_query($connection, $query);
      confirmQuery($update_query);

      header("Location: profile.php");
}


}

?>

    <div id="wrapper">

        <!-- Navigation -->

        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small><?php echo $_SESSION['username']; ?></small>
                    </h1>


                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="nume">Nume</label>
                            <input value="<?php if(isset($nume)){echo $nume;} ?>" type="text" class="form-control" name="nume">
                        </div>

                        <div class="form-group">
                            <label for="prenume">Prenume</label>
                            <input value="<?php if(isset($prenume)){echo $prenume;} ?>" type="text" class="form-control" name="prenume">
                        </div>

                        <div class="form-group">
                            <label for="localitate">Localitate</label>
                            <input value="<?php if(isset($localitate)){echo $localitate;}  ?>" type="text" class="form-control" name="localitate">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input value="<?php if(isset($email)){echo $email;} ?>" type="email" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name='<?php if(isset($email)){echo "update_profile";} else{echo "create_profile";} ?>' value='<?php if(isset($email)){echo "Actualizeaza";} else{echo "Salveaza";} ?>'>
                        </div>

                    </form>





                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>

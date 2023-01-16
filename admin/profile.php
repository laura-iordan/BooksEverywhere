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

                    <?php
                    if(isset($_POST['change_pass'])){
                        $parola = $_POST['password'];
                        $c_parola = $_POST['conf_password'];

                        if($parola==$c_parola){
                            $parola = mysqli_real_escape_string($connection, $parola);

                            $query = "UPDATE `users` SET `password`='{$parola}' WHERE user_id = {$id_user}";
                            $register_user_query = mysqli_query($connection, $query);
                            if(!$register_user_query){
                                die("QUERY FAILED" . mysqli_error($connection));
                            }  ?>
                              <script>
                                alert('Parola a fost schimbata cu succes!');
                                document.location.href = 'profile.php';
                              </script>
                              ";
                          <?php
                        } else{ ?>
                          <script>
                            alert('Parolele nu sunt identice!');
                            document.location.href = 'profile.php';
                          </script>
                          ";
                      <?php  }
                    }
                    ?>


                    <div class="button-group">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Schimba parola</button>

                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-dialog" style="width: 300px;">
                                <div class="modal-content text-center">
                                    <div class="modal-header h5 text-white bg-primary justify-content-center">
                                        Schimbare Parola
                                    </div>
                                    <div class="modal-body px-5">
                                        <p class="py-2">
                                            Introduceti noua parola:
                                        </p>
                                        <form class="" action="profile.php" method="post">
                                          <div class="form-outline">
                                              <input name="password" type="password" id="password" class="form-control my-3" />
                                              <label class="form-label" for="password">Parola</label>
                                              <input name="conf_password" type="password" id="conf_password" class="form-control my-3" />
                                              <label class="form-label" for="conf_password">Confirmare parola</label>
                                          </div>
                                          <button class="btn btn-primary" name="change_pass" type="submit">Schimba parola</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>





                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>

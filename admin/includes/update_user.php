<?php


    if(isset($_GET['p_id'])){
        $user_id = $_GET['p_id'];

        $query = "SELECT * FROM users WHERE user_id = {$user_id}";
        $select_user_by_id = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_user_by_id)){
            $role = $row['role'];
        }


    if($role == 1){

      $query = "SELECT * FROM users JOIN user_elev ON user_id = id_user WHERE user_id = {$user_id}";
      $select_user_by_id = mysqli_query($connection, $query);

      while($row = mysqli_fetch_assoc($select_user_by_id)){
          $username  = $row['username'];
          $email = $row['email'];
          $nume  = $row['nume'];
          $prenume = $row['prenume'];
          $localitate  = $row['localitate'];
          $scoala = $row['scoala'];
          $role = $row['role'];
      }


      if(isset($_POST['update_user'])){
          $username = $_POST['username'];
          $email = $_POST['email'];
          $nume = $_POST['nume'];
          $prenume = $_POST['prenume'];
          $localitate = $_POST['localitate'];
          $scoala = $_POST['scoala'];
          $role = $POST['role'];

          $query = "UPDATE users SET username = '{$username}', email = '{$email}', role = '{$role}' WHERE user_id= {$user_id}";
          $update_query = mysqli_query($connection, $query);
          confirmQuery($update_query);
          $query = "UPDATE user_elev SET nume = '{$nume}', email = '{$email}', prenume = '{$prenume}', localitate = '{$localitate}', scoala = '{$scoala}' WHERE id_user= {$user_id}";
          $update_query = mysqli_query($connection, $query);
          confirmQuery($update_query);

          header("Location: users.php");
      }
  ?>

  <form action="" method="post" enctype="multipart/form-data">

      <div class="form-group">
          <label for="username">Username</label>
          <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
      </div>

      <div class="form-group">
          <label for="email">Email</label>
          <input value="<?php echo $email; ?>" type="email" class="form-control" name="email">
      </div>

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
          <label for="scoala">Scoala</label>
          <input value="<?php if(isset($scoala)){echo $scoala;} ?>" type="text" class="form-control" name="scoala">
      </div>

      <div class="form-group">
          <label for="role">Role</label>
          <input value="<?php echo $role; ?>" type="text" class="form-control" name="role">
      </div>

      <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_user" value="Modifica">
      </div>

  </form>


<?php } else if($role == 2){


        $query = "SELECT * FROM users JOIN user_admin ON user_id = id_user WHERE user_id = {$user_id} ";
        $select_user_by_id = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_user_by_id)){
            $username  = $row['username'];
            $email = $row['email'];
            $nume  = $row['nume'];
            $prenume = $row['prenume'];
            $localitate  = $row['localitate'];
            $role = $row['role'];
        }


        if(isset($_POST['update_user'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $nume = $_POST['nume'];
            $prenume = $_POST['prenume'];
            $localitate = $_POST['localitate'];

            $query = "UPDATE users SET username = '{$username}', email = '{$email}', role = '{$role}' WHERE user_id= {$user_id}";
            $update_query = mysqli_query($connection, $query);
            confirmQuery($update_query);
            $query = "UPDATE user_admin SET nume = '{$nume}', email = '{$email}', prenume = '{$prenume}', localitate = '{$localitate}' WHERE id_user= {$user_id}";
            $update_query = mysqli_query($connection, $query);
            confirmQuery($update_query);

            header("Location: users.php");
        }
    ?>

    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="username">Username</label>
            <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input value="<?php echo $email; ?>" type="email" class="form-control" name="email">
        </div>

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
            <label for="role">Role</label>
            <input value="<?php echo $role; ?>" type="text" class="form-control" name="role">
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update_user" value="Modifica">
        </div>

    </form>

<?php } else if($role == 3){
  $query = "SELECT * FROM users JOIN user_utilizator ON user_id = id_user WHERE user_id = {$user_id} ";
  $select_user_by_id = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_user_by_id)){
      $username  = $row['username'];
      $email = $row['email'];
      $nume  = $row['nume'];
      $prenume = $row['prenume'];
      $localitate  = $row['localitate'];
      $role = $row['role'];
  }


  if(isset($_POST['update_user'])){
      $username = $_POST['username'];
      $email = $_POST['email'];
      $nume = $_POST['nume'];
      $prenume = $_POST['prenume'];
      $localitate = $_POST['localitate'];

      $query = "UPDATE users SET username = '{$username}', email = '{$email}', role = '{$role}' WHERE user_id= {$user_id}";
      $update_query = mysqli_query($connection, $query);
      confirmQuery($update_query);
      $query = "UPDATE user_utilizator SET nume = '{$nume}', email = '{$email}', prenume = '{$prenume}', localitate = '{$localitate}' WHERE id_user= {$user_id}";
      $update_query = mysqli_query($connection, $query);
      confirmQuery($update_query);

      header("Location: users.php");
  }
?>

<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
      <label for="username">Username</label>
      <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
  </div>

  <div class="form-group">
      <label for="email">Email</label>
      <input value="<?php echo $email; ?>" type="email" class="form-control" name="email">
  </div>

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
      <label for="role">Role</label>
      <input value="<?php echo $role; ?>" type="text" class="form-control" name="role">
  </div>

  <div class="form-group">
      <input class="btn btn-primary" type="submit" name="update_user" value="Modifica">
  </div>

</form>

<?php } } ?>

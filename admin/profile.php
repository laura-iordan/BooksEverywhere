<?php include "includes/admin_header.php"; ?>

<?php 

    if(isset($_SESSION["username"])){
    $username = $_SESSION["username"];
    $query = "SELECT * FROM utilizatori WHERE u_username = '{$username}'";
    $select_profile_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($select_profile_query)){
        $email = $row['u_email'];
        $username = $row['u_username'];
        $password = $row['u_parola'];
        $nume = $row['u_nume'];
        $prenume = $row['u_prenume'];
        $rol = $row['u_role'];
    }

    if(isset($_POST['update_profile'])){
        $u_nume = $_POST['nume'];
        $u_prenume = $_POST['prenume'];
        $username = $_POST['username'];
        $u_email = $_POST['email'];
        $u_password = $_POST['password'];

        $query = "UPDATE utilizatori SET u_nume = '{$u_nume}',  u_prenume = '{$u_prenume}', ";
        $query .= "u_username = '{$username}', u_email = '{$u_email}',  u_parola = '{$u_password}' WHERE u_username = '{$username}' ";
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
                            <input value="<?php echo $nume ?>" type="text" class="form-control" name="nume">
                        </div>

                        <div class="form-group">
                            <label for="prenume">Prenume</label>
                            <input value="<?php echo $prenume ?>" type="text" class="form-control" name="prenume">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input value="<?php echo $username ?>" type="text" class="form-control" name="username">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input value="<?php echo $email ?>" type="email" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input value="<?php echo $password ?>" type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="update_profile" value="Salveaza">
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

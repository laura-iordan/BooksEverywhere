<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $parola = $_POST['password'];
    $c_parola = $_POST['conf_password'];
    $role = $_POST['role'];
    $email = $_POST['email'];

    if(!empty($username) && !empty($parola) && $parola==$c_parola){
        $username = mysqli_real_escape_string($connection, $username);
        $parola = mysqli_real_escape_string($connection, $parola);
        $role = mysqli_real_escape_string($connection, $role);
        $email = mysqli_real_escape_string($connection, $email);

        $query = "INSERT INTO users (username, password, email, role) VALUES ('{$username}', '{$parola}', '{$email}', '{$role}')";
        $register_user_query = mysqli_query($connection, $query);
        if(!$register_user_query){
            die("QUERY FAILED" . mysqli_error($connection));
        }
    }
}
?>


    <!-- Navigation -->

    <?php  include "includes/navigation.php"; ?>


    <!-- Page Content -->
    <div class="container">

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Introduceti Username-ul">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">Email</label>
                            <input type="text" name="email" id="username" class="form-control" placeholder="Introduceti email-ul">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Parola</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Introduceti parola">
                        </div>
                         <div class="form-group">
                            <label for="conf_password" class="sr-only">Password</label>
                            <input type="password" name="conf_password" id="key" class="form-control" placeholder="Confirmati parola">
                        </div>
                        <div class="form-group checkbox">
                          <label for="role">Selecteaza:</label>
                            <select name="role" class="form-control" id="role">
                              <option value="1">Elev</option>
                              <option value="3">Utilizator</option>
                            </select>
                        </div>
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Inregistrare">

                    </form>

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>

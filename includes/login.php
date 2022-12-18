<?php include "db.php"; ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE username='{$username}'";
    $select_user_query = mysqli_query($connection, $query);

    if(!$select_user_query){
        die("QUERY FAILED". mysqli_error($connection));
    }

    while($row = mysqli_fetch_array($select_user_query)){
        $db_id = $row['user_id'];
        $db_username = $row['username'];
        $db_rol = $row['role'];
        $db_password = $row['password'];
    }

    if($username !== $db_username && $password !== $db_password){
        header('Location: ../index.php');
    } else if($username === $db_username && $password === $db_password && $db_rol == 2){
        $_SESSION['username'] = $db_username;
        $_SESSION['rol'] = $db_rol;
        $_SESSION['id'] = $db_id;

        header('Location: ../admin');
    } else if($username === $db_username && $password === $db_password && $db_rol == 1){
        $_SESSION['username'] = $db_username;
        $_SESSION['rol'] = $db_rol;
        $_SESSION['id'] = $db_id;

        header('Location: ../elev');
    } else if($username === $db_username && $password === $db_password && $db_rol == 3){
        $_SESSION['username'] = $db_username;
        $_SESSION['rol'] = $db_rol;
        $_SESSION['id'] = $db_id;

        header('Location: ../user');
    } else{
        header('Location: ../registration.php');
    }
}
?>

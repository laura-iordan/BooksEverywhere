<?php
include "includes/db.php";
include "includes/header.php";

?>
<?php
if(isset($_GET['book_id_fav'])){
  $carte_id = $_GET['book_id_fav'];

  $query = "SELECT * FROM books WHERE id_carte = {$carte_id}";
  $select_carte_query = mysqli_query($connection_b1, $query);

          while($row = mysqli_fetch_assoc($select_carte_query)){

              $titlu  = $row['titlu'];
              $autor  = $row['autor'];
              $id_carte= $row['id_carte'];
              $id_biblioteca= $row['id_biblioteca'];
              $categorie = $row['categorie'];
          }
    $query = "SELECT * FROM categorie WHERE cat_titlu = '{$categorie}'";
    $select_cat_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_cat_query)){

                $cat_id  = $row['cat_id'];

            }
    if(!isset($cat_id)){
      $query = "INSERT INTO `categorie`(`cat_titlu`) VALUES ('$categorie')";
      $insert_query = mysqli_query($connection, $query);

      $query = "SELECT * FROM categorie WHERE cat_titlu = '{$categorie}'";
      $select_cat_query = mysqli_query($connection, $query);

              while($row = mysqli_fetch_assoc($select_cat_query)){

                  $cat_id  = $row['cat_id'];

              }
    }


          $username = $_SESSION["username"];
          $id_user = $_SESSION['id'];

          $query = "SELECT * FROM favorite WHERE id_carte = {$id_carte}";
          $select_query = mysqli_query($connection, $query);
          while($row = mysqli_fetch_assoc($select_query)){
              $id_carte_fav= $row['id_carte'];
          }

          if(!isset($id_carte_fav)){
            $query = "INSERT INTO favorite (id_carte, id_biblioteca, id_user, id_categorie, titlu, autor) VALUES ('{$id_carte}','{$id_biblioteca}', '{$id_user}', '{$cat_id}', '{$titlu}', '{$autor}')";
            $insert_query = mysqli_query($connection, $query);

            if(!$insert_query)
       {
           echo mysqli_error($connection);
           die();
       }
       else
       {
           echo "Query succesfully executed!";
       }
       if(isset($_SESSION['rol'])){
         if($_SESSION['rol'] == 1){
           header("Location: elev/favorite.php");
         } else if ($_SESSION['rol'] == 2) {
           header("Location: admin/favorite.php");
         } else if($_SESSION['rol'] == 3){
           header("Location: user/favorite.php");
          }}
         } else{
           header("Location: book.php?p_id_fav={$id_carte}");
         }
}
?>

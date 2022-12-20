<?php
include "includes/db.php";
include "includes/header.php";

?>
<?php
    if(isset($_GET['book_id'])){
        $carte_id = $_GET['book_id'];

    $query = "SELECT * FROM books WHERE id_carte = {$carte_id}";
    $select_carte_query = mysqli_query($connection_b1, $query);

            while($row = mysqli_fetch_assoc($select_carte_query)){

                $titlu  = $row['titlu'];
                $autor  = $row['autor'];
                $id_biblioteca = $row['id_biblioteca'];
                $id_carte= $row['id_carte'];
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

        $query = "SELECT * FROM categorie WHERE cat_titlu = {$categorie}";
        $select_cat_query = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_cat_query)){

                    $cat_id  = $row['cat_id'];

                }
      }


            $username = $_SESSION["username"];
            $id_user = $_SESSION['id'];

       $current_date = date("Y/m/d");
       $year = date('Y', strtotime($current_date));
       $month = date('m', strtotime($current_date));
    $day = date('d', strtotime($current_date));
   if($month < 12){
     if($day < 15){
       $day = 1;
     } else{
       $day = 15;
     }
     $month += 1;
   } else{
     if($day < 15){
       $day = 1;
     } else{
       $day = 15;
     }
     $month = 1;
     $year += 1;
   }

   $date=date_create();
   date_date_set($date,$year,$month,$day);
   $data_restituire = date_format($date,"Y/m/d");

   $query = "SELECT * FROM imprumutate WHERE id_carte = {$id_carte}";
   $select_query = mysqli_query($connection, $query);
   while($row = mysqli_fetch_assoc($select_query)){
       $id_carte_imprumutata= $row['id_carte'];
   }

   if(!isset($id_carte_imprumutata)){
     $query = "INSERT INTO imprumutate (id_biblioteca, id_carte, id_user, id_categorie, titlu, autor, data_imprumut, data_restituire) VALUES ('{$id_biblioteca}', '{$id_carte}','{$id_user}', '{$cat_id}', '{$titlu}', '{$autor}', '{$current_date}', '{$data_restituire}')";
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


    $query = "UPDATE books SET data_imprumut='{$current_date}', data_restituire='{$data_restituire}' WHERE id_carte = {$id_carte}";
    $insert_query = mysqli_query($connection_b1, $query);

    if(isset($_SESSION['rol'])){
      if($_SESSION['rol'] == 1){
        header("Location: elev/contul_meu.php");
      } else if ($_SESSION['rol'] == 2) {
        header("Location: admin/contul_meu.php");
      } else if($_SESSION['rol'] == 3){
        header("Location: user/contul_meu.php");
      }}
  } else{
    header("Location: book.php?p_id={$id_carte}");
  }
}

?>

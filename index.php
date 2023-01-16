<?php
include "includes/db.php";
include "includes/header.php";
include "functions.php";

?>

    <!-- Navigation -->

<?php

include "includes/navigation.php";

?>


    <div style="margin-top: 2rem; margin-bottom: 2rem">
        <img src="images\pexels-pixabay-159711.jpg" width="100%" height="600" alt="">
    </div>

    <?php
    $current_date = date("Y-m-d");
    $query = "SELECT * FROM users JOIN imprumutate ON users.user_id = imprumutate.id_user";
    $select_query = mysqli_query($connection, $query);


    if(!$select_query){
        die("QUERY FAILED". mysqli_error($connection));
    }

    while($row = mysqli_fetch_array($select_query)){

        $id_imprumut = $row['id_imprumut'];
        $username = $row['username'];
        $email = $row['email'];
        $data_restituire = $row['data_restituire'];
        $autor = $row['autor'];
        $titlu = $row['titlu'];
        $notificare = $row['notificare'];

        if(($current_date > $data_restituire) && $notificare == 0){
          echo "Ceva";
          header('Location: ./includes/notification.php');
  }}
  if(isset($_GET['check'])){
    echo "
    <script>
      alert('Username-ul sau parola sunt gresite!');
    </script>
    ";
  }

    if(isset($_SESSION['id'])){
      $username = $_SESSION['username'];
      $id_user = $_SESSION['id'];
        $current_date = date("Y-m-d");
        $query = "SELECT * FROM users JOIN imprumutate ON users.user_id = imprumutate.id_user WHERE user_id = {$id_user}";
        $select_query = mysqli_query($connection, $query);


        if(!$select_query){
            die("QUERY FAILED". mysqli_error($connection));
        }

        while($row = mysqli_fetch_array($select_query)){
            $id_imp = $row['id_imprumut'];
            $username = $row['username'];
            $email = $row['email'];
            $data_restituire = $row['data_restituire'];
            $autor = $row['autor'];
            $titlu = $row['titlu'];
            $notificare = $row['notificare'];

            if($current_date > $data_restituire){


            ?>

            <div class="modal show" id="exampleModal<?php echo $id_imp?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title notif" id="exampleModalLabel">Notificare depasire termen</h3>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p class="py-2">
                        Termenul de restituire a fost depasit pentru cartea <?php echo $titlu; ?>, de <?php echo $autor; ?>
                    </p>
                  </div>
                  <div class="modal-footer">
                    <a type="button" class="btn btn-primary" href="elev/imprumuturi.php">Vizualizeaza carti imprumutate</a>
                    <button type="button" class="btn btn-primary" data-mdb-dismiss="modal"  onclick="closeFunction(<?php echo $id_imp?>)">Close</button>
                    <script type="text/javascript">
                      function closeFunction(n) {
                      var element = document.getElementById("exampleModal"+n);
                        element.classList.remove("show").add("fade");

                    }
                    </script>

                  </div>
                </div>
              </div>
            </div>

    </div>

  <?php }}} ?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <h1 class="page-header">
                    BIBLIOTECA
                    <small></small>
                </h1>



                <div class="grid-container">
                <?php

                $lista_titluri = array();

                $query = "SELECT titlu FROM books ";
                $select_all_produse_query = mysqli_query($connection_b1, $query);
                while($row = mysqli_fetch_assoc($select_all_produse_query)){
                  if(!in_array($row['titlu'], $lista_titluri)){
                    array_push($lista_titluri, $row['titlu']);
                  }
                }

                foreach ($lista_titluri as $value) {
                $query = "SELECT * FROM books WHERE titlu = '{$value}' ORDER BY data_imprumut ASC";
                $select_all_produse_query = mysqli_query($connection_b1, $query);

                        while($row = mysqli_fetch_assoc($select_all_produse_query)){
                            $produs_id  = $row['id_carte'];
                            $produs_titlu  = $row['titlu'];
                            $produs_autor  = $row['autor'];
                            $produs_imagine  = $row['imagine'];
                            $produs_descriere  = $row['descriere'];
                            $categorie = $row['categorie'];

                            $query = "SELECT * FROM categorie WHERE cat_titlu = '{$categorie}'";
                            $result = mysqli_query($connection, $query);

                            if (mysqli_num_rows($result) == 0) {
                              $query = "INSERT INTO `categorie`(`cat_titlu`) VALUES ('{$categorie}')";
                              $insert_query = mysqli_query($connection, $query);
                            }




                            ?>
                <div class="grid-item">
                  <div class="card text-center" style="width: 15rem; height: 40rem">

                      <a class="" href="book.php?p_id=<?php echo $produs_id; ?>">

                          <img class="card-img-center img-rounded" style="height: 16rem" src="images/<?php echo $produs_imagine ?>" alt="">


                      </a>


                    <div class="card-body">
                      <h3><a href="book.php?p_id=<?php echo $produs_id; ?>"><?php echo $produs_titlu ?></a></h4>
                      <h5 class="card-title" >de <a href="book.php?p_id=<?php echo $produs_id; ?>"><?php echo $produs_autor ?></a></h5>
                      <p class="card-text"><a class="btn btn-primary" href="book.php?p_id=<?php echo $produs_id; ?>">Citeste mai mult<span class="glyphicon glyphicon-chevron-right"></span></a></p>


                    </div>
                  </div>
                <!--<h2>
                    <a href="book.php?p_id=<?php echo $produs_id; ?>"><?php echo $produs_titlu ?></a>
                </h2>
                <p class="lead">
                    de <a href="book.php?p_id=<?php echo $produs_id; ?>"><?php echo $produs_autor ?></a>
                </p>
                <hr>
                <a href="book.php?p_id=<?php echo $produs_id; ?>">
                    <img class="img-responsive" width="100" src="images/<?php echo $produs_imagine ?>" alt="">
                </a>
                <hr>
                 <p><?php echo $produs_descriere ?></p>
                <a class="btn btn-primary" href="book.php?p_id=<?php echo $produs_id; ?>">Citeste mai mult<span class="glyphicon glyphicon-chevron-right"></span></a>-->
                <hr>
                </div>



              <?php break;}} ?>

                </div>




            </div>





<?php

include "includes/sidebar.php";

?>


        </div>
        <!-- /.row -->

        <hr>

<?php

include "includes/footer.php";

?>

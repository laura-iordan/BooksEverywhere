<?php
include "includes/db.php";
include "includes/header.php";

?>

    <!-- Navigation -->

<?php

include "includes/navigation.php";

?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <?php



                ?>

                <div class="grid-container">
                <?php
                $username = $_SESSION['username'];
                if(isset($_GET['p_id'])){
                    $carte_id_p = $_GET['p_id'];


                $query = "SELECT * FROM books WHERE id_carte = {$carte_id_p}";
                $select_all_carti_query = mysqli_query($connection_b1, $query);

                        while($row = mysqli_fetch_assoc($select_all_carti_query)){
                            $carte_id  = $row['id_carte'];
                            $carte_titlu  = $row['titlu'];
                            $carte_autor  = $row['autor'];
                            $carte_imagine  = $row['imagine'];
                            $carte_descriere  = $row['descriere'];

                            $data_restituire = $row['data_restituire'];
                            $date=date_create($data_restituire);
                            $data_restituire = date_format($date, "Y/m/d");
                            $data_restituire=date_create($data_restituire);
                            /*if(!is_null($row['data_restituire'])){
                                $data_restituire = $row['data_restituire'];
                            } else{
                              $data_restituire = date("Y/m/d");
                            }*/

                            ?>




                <div class="card text-center" style="width: 50rem;">
                  <img class="card-img-top img-rounded" src="images/<?php echo $carte_imagine ?>" alt="" width="100" height="200">
                  <div class="card-body">
                    <h4><a href="book.php?p_id=<?php echo $carte_id; ?>"><?php echo $carte_titlu ?></a></h4>
                    <h5 class="card-title">de <a href="book.php?autor=<?php echo $carte_autor; ?>"><?php echo $carte_autor ?></a></h5>
                    <p class="card-text"><?php echo $carte_descriere ?></p>
                    <p><?php echo $username;?></p>

                    <?php
                    $current_date = date("Y/m/d");
                    $today = date_create($current_date);
                    if(isset($data_restituire)){

                      if(date_diff($today, $data_restituire)->days > 60){
                        ?>
                        <a class="btn btn-primary" <?php if(isset($username)){ ?>href="imprumut.php?book_id_disp=<?php echo $carte_id_disp; ?>"<?php } else{echo 'href="registration.php"';} ?>>Anunta-ma cand este diponibila <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <a class="btn btn-primary" <?php if(isset($username)){ ?>href="imprumut.php?book_id_fav=<?php echo $carte_id_fav; ?>">Salveaza la favorite <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <?php
                      } else{ ?>
                        <a class="btn btn-primary" <?php if(isset($username)){ ?>href="imprumut.php?book_id=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Imprumuta <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <a class="btn btn-primary" <?php if(isset($username)){ ?>href="imprumut.php?book_id_fav=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Salveaza la favorite <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <h5>Disponibil: <?php echo $data_restituire->format("d M"); ?> </h5>

                        <?php
                      }
                    } else{?>

                      <a class="btn btn-primary" <?php if(isset($username)){ ?>href="imprumut.php?book_id=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Imprumuta <span class="glyphicon glyphicon-chevron-right"></span></a>
                      <a class="btn btn-primary" <?php if(isset($username)){ ?>href="imprumut.php?book_id_fav=<?php echo $carte_id_fav; ?>"<?php } else{echo 'href="registration.php"';} ?>>Salveaza la favorite <span class="glyphicon glyphicon-chevron-right"></span></a>
                      <h5>Disponibil: <?php echo date("d M"); ?> </h5>
                      <?php

                    }
                    ?>





                    <h6></h6>
                  </div>
                </div>



              <?php }}} else if(isset($_GET['autor'])){
                  $carte_autor = $_GET['autor'];


              $query = "SELECT * FROM books WHERE autor = '{$carte_autor}'";
              $select_all_carti_query = mysqli_query($connection_b1, $query);

                      while($row = mysqli_fetch_assoc($select_all_carti_query)){
                          $carte_id  = $row['id_carte'];
                          $carte_titlu  = $row['titlu'];
                          $carte_autor  = $row['autor'];
                          $carte_imagine  = $row['imagine'];
                          $carte_descriere  = $row['descriere'];


                          ?>


              <div class="card text-center" style="width: 60rem;">
                <img class="card-img-top img-rounded" src="images/<?php echo $carte_imagine ?>" alt="" width="100" height="200">
                <div class="card-body">
                  <h4><a href="book.php?p_id=<?php echo $carte_id; ?>"><?php echo $carte_titlu ?></a></h4>
                  <h5 class="card-title">de <a href="book.php?autor=<?php echo $carte_autor; ?>"><?php echo $carte_autor ?></a></h5>
                  <p class="card-text"><?php echo $carte_descriere ?></p>
                  <a class="btn btn-primary" <?php if(isset($username)){ ?>href="imprumut.php?book_id=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Imprumuta <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <a class="btn btn-primary" <?php if(isset($username)){ ?>href="imprumut.php?book_id_fav=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Salveaza la favorite <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <a class="btn btn-primary" <?php if(isset($username)){ ?>href="imprumut.php?book_id_disp=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Anunta-ma cand este diponibila <span class="glyphicon glyphicon-chevron-right"></span></a>

                </div>
              </div>



              <?php } } ?>

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

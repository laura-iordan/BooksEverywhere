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

                    <small></small>
                </h1>

                <?php



                ?>

                <div class="grid-container">
                <?php
                $username = $_SESSION['username'];
                $id_user = $_SESSION['id'];
                if(isset($_GET['autor'])){
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

                              <!--<div class="grid-container">-->
                                <div class="grid-item">
                                  <div class="card text-center" style="width: 15rem; height: 40rem">

                                      <a class="" href="book.php?p_id=<?php echo $carte_id; ?>">

                                          <img class="card-img-center img-rounded" style="height: 16rem" src="images/<?php echo $carte_imagine ?>" alt="">


                                      </a>


                                    <div class="card-body">
                                      <h3><a href="book.php?p_id=<?php echo $carte_id; ?>"><?php echo $carte_titlu ?></a></h4>
                                      <h5 class="card-title" >de <a href="book.php?p_id=<?php echo $carte_id; ?>"><?php echo $carte_autor ?></a></h5>
                                      <p class="card-text"><a class="btn btn-primary" href="book.php?p_id=<?php echo $carte_id; ?>">Citeste mai mult<span class="glyphicon glyphicon-chevron-right"></span></a></p>


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
                  <!--<div class="card text-center" style="width: 60rem;">
                    <img class="card-img-top img-rounded" src="images/<?php echo $carte_imagine ?>" alt="" width="100" height="200">
                    <div class="card-body">
                      <h4><a href="book.php?p_id=<?php echo $carte_id; ?>"><?php echo $carte_titlu ?></a></h4>
                      <h5 class="card-title">de <a href="book.php?autor=<?php echo $carte_autor; ?>"><?php echo $carte_autor ?></a></h5>
                      <p class="card-text"><?php echo $carte_descriere ?></p>


                    <?php
                    $current_date = date("Y/m/d");
                    if(isset($data_restituire)){

                      if((strtotime($data_restituire)-strtotime($current_date))/(24*60*60) > 60){
                        ?>
                        <a class="btn btn-primary" <?php if(isset($username)){ ?>href="imprumut.php?book_id_disp=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Anunta-ma cand este diponibila <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <a class="btn btn-primary" <?php if(isset($username)){ ?>href="favorite.php?book_id_fav=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Salveaza la favorite <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <?php
                      } else{ ?>
                        <a class="btn btn-primary" <?php if(isset($username)){ ?>href="imprumut.php?book_id=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Imprumuta <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <a class="btn btn-primary" <?php if(isset($username)){ ?>href="favorite.php?book_id_fav=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Salveaza la favorite <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <h5>Disponibila: <?php echo date("d M", strtotime($data_restituire)); ?> </h5>

                        <?php
                      }
                    } else{?>

                      <a class="btn btn-primary" <?php if(isset($username)){ ?>href="imprumut.php?book_id=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Imprumuta <span class="glyphicon glyphicon-chevron-right"></span></a>
                      <a class="btn btn-primary" <?php if(isset($username)){ ?>href="favorite.php?book_id_fav=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Salveaza la favorite <span class="glyphicon glyphicon-chevron-right"></span></a>
                      <h5>Disponibil: <?php echo date("d M"); ?> </h5>
                      <?php

                    }
                    ?>

                  </div>
                </div>-->

                <hr>


                <!--</div>-->
                </div>



              <?php } ?>





            <?php } ?>
              <hr>













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

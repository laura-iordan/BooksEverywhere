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
                if(isset($_GET['p_id'])){
                    $carte_id_p = $_GET['p_id'];

                  $query = "SELECT * FROM users WHERE user_id = {$id_user}";
                  $select_user_query = mysqli_query($connection, $query);
                  while($row = mysqli_fetch_assoc($select_user_query)){
                    echo $role = $row['role'];
                  }

                $query = "SELECT * FROM books WHERE id_carte = {$carte_id_p}";
                $select_all_carti_query = mysqli_query($connection_b1, $query);

                        while($row = mysqli_fetch_assoc($select_all_carti_query)){
                            $carte_id  = $row['id_carte'];
                            $carte_titlu  = $row['titlu'];
                            $carte_autor  = $row['autor'];
                            $carte_imagine  = $row['imagine'];
                            $carte_descriere  = $row['descriere'];

                            $data_restituire = $row['data_restituire'];

                            if(!empty($data_restituire)){
                            $date=strtotime($data_restituire);
                            $data_restituire = date("Y/m/d", $date);
                          }



                            //echo $data_restituire=date_create($data_restituire);
                            /*if(!is_null($row['data_restituire'])){
                                $data_restituire = $row['data_restituire'];
                            } else{
                              $data_restituire = date("Y/m/d");
                            }*/

                            ?>




                <div class="card text-center" style="width: 50rem;">
                  <img class="card-img-top img-rounded" src="images/<?php echo $carte_imagine ?>" alt="" width="100" height="200">



                  <div class="rate">
                    <input type="radio" id="star5" name="rate" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text">1 star</label>

                  </div>



                  <div class="card-body">
                    <h4><a href="book.php?p_id=<?php echo $carte_id; ?>"><?php echo $carte_titlu ?></a></h4>
                    <h5 class="card-title">de <a href="book_by_author1.php?autor=<?php echo $carte_autor; ?>"><?php echo $carte_autor ?></a></h5>
                    <p class="card-text"><?php echo $carte_descriere ?></p>




                    <?php
                    $current_date = date("Y/m/d");
                    if(isset($data_restituire)){

                      $query = "SELECT * FROM imprumutate WHERE id_carte = {$carte_id_p}";
                      $select_carte_imprumutata_query = mysqli_query($connection, $query);

                              while($row = mysqli_fetch_assoc($select_carte_imprumutata_query)){
                                  $user_id = $row["id_user"];
                                }
                      /*if(isset($id_user)){*/

                      if($id_user == $user_id && $role == 1 ){
                        ?>

                        <a class="btn btn-primary" <?php if(isset($username)){ ?>href="imprumut.php?book_id_disp=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Returneaza <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <?php


                      /*}*/} else{

                      ?>

                      <a class="btn btn-primary" <?php if(isset($username)){ ?>href="imprumut.php?book_id_disp=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Anunta-ma cand este diponibila <span class="glyphicon glyphicon-chevron-right"></span></a>
                      <a class="btn btn-primary" <?php if(isset($username)){ ?>href="favorite.php?book_id_fav=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Salveaza la favorite <span class="glyphicon glyphicon-chevron-right"></span></a>

                      <?php

                    /*  if((strtotime($data_restituire)-strtotime($current_date))/(24*60*60) > 60){
                        ?>
                        <a class="btn btn-primary" <?php if(isset($username)){ ?>href="imprumut.php?book_id_disp=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Anunta-ma cand este diponibila <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <a class="btn btn-primary" <?php if(isset($username)){ ?>href="favorite.php?book_id_fav=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Salveaza la favorite <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <?php
                      } else{ ?>
                        <a class="btn btn-primary" <?php if(isset($username)){ ?>href="imprumut.php?book_id=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Imprumuta <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <a class="btn btn-primary" <?php if(isset($username)){ ?>href="favorite.php?book_id_fav=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Salveaza la favorite <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <h5>Disponibila: <?php echo date("d M", strtotime($data_restituire)); ?> </h5>

                        <?php
                      }*/
                    }}else{?>

                      <a class="btn btn-primary" <?php if(isset($username)){ ?>href="imprumut.php?book_id=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Imprumuta <span class="glyphicon glyphicon-chevron-right"></span></a>
                      <a class="btn btn-primary" <?php if(isset($username)){ ?>href="favorite.php?book_id_fav=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Salveaza la favorite <span class="glyphicon glyphicon-chevron-right"></span></a>

                      <h5>Disponibil: <?php echo date("d M"); ?> </h5>
                      <?php

                    }
                    ?>






                  </div>

                </div>



              <?php } ?>

              <hr>


              </div>



              <!-- Blog Comments -->

              <!-- Comments Form -->

              <?php

              if(isset($_POST['recenzie_commit'])){
                $recenzie = $_POST['recenzie'];
                $current_date = date("Y/m/d");

                $query = "INSERT INTO recenzii(id_carte, id_user, continut_recenzie, data, status, cat) ";
                $query .= "VALUE('{$carte_id_p}', {$id_user}, '{$recenzie}', '{$current_date}', 'aprobat', 1) ";

                $add_recenzie_query = mysqli_query($connection, $query);

                if(!$add_recenzie_query){
                    die("QUERY FAILED". mysqli_error($connection));
                } else{
                  echo "Success!";
                }

                header("Location: book.php?p_id={$carte_id_p}");
              }
               ?>

              <div class="well">
                  <h4>Adaugati o recenzie:</h4>
                  <form action="" method="POST" role="form">
                      <div class="form-group">
                          <textarea name="recenzie" class="form-control" rows="3"></textarea>
                      </div>
                      <button type="submit" name="recenzie_commit" class="btn btn-primary">Submit</button>
                  </form>
              </div>

              <!-- Comment -->

              <?php $query = "SELECT * FROM recenzii LEFT JOIN users ON recenzii.id_user = users.user_id WHERE id_carte={$carte_id_p} AND status = 'aprobat' and cat=1";
              $select_recenzii = mysqli_query($connection, $query);

              while($row = mysqli_fetch_assoc($select_recenzii)){
                  $username = $row['username'];
                  $continut  = $row['continut_recenzie'];
                  $data  = $row['data'];
                  $status  = $row['status']; ?>

                  <div class="media">
                      <a class="pull-left" href="#">
                          <img class="media-object" src="http://placehold.it/64x64" alt="">
                      </a>
                      <div class="media-body">
                          <h4 class="media-heading"><?php echo $username; ?>
                              <small><?php echo $data; ?></small>
                          </h4>
                          <?php echo $continut; ?>
                      </div>
                  </div>


            <?php  } ?>






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

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
                    if(isset($id_user)){
                    $query = "SELECT * FROM users WHERE user_id = {$id_user}";
                    $select_user_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_user_query)){
                      $role = $row['role'];
                    }
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
                          }}

                          $query = "SELECT * FROM books WHERE titlu = '{$carte_titlu}' ORDER BY data_imprumut ASC";
                          $select_all_produse_query = mysqli_query($connection_b1, $query);

                                  while($row = mysqli_fetch_assoc($select_all_produse_query)){
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


                  <?php
                  $query = "SELECT count(rating) as count, sum(rating) as total FROM rating WHERE titlu = '{$carte_titlu}'";
                  $select_rating=mysqli_query($connection, $query);


                  while($row=mysqli_fetch_assoc($select_rating))
                  {
                  $count = $row['count'];
                  $total = $row['total'];
                  }
                  if($count == 0){
                    $rating = 0;
                  } else{
                    $rating = $total/$count;
                  }


                    ?>
                  <div>
                  <form method="post" action="">
                  <p id="total_votes">Total Votes:<?php echo $count;?></p>
                  <div class="div">
                  <p>Rating: <?php echo $rating;?></p>

                  <?php
                  for($i=1; $i<=5; $i++) { ?>
                    <input type="hidden" id="php<?php echo $i; ?>_hidden" value="<?php echo $i; ?>">
                    <img style="height: 3rem;" src="images/star1.png" onmouseover="change(this.id);" id="php<?php echo $i; ?>" class="php">
                  <?php } ?>


                  <!--<input type="hidden" id="php1_hidden" value="1">
                  <img style="height: 3rem;" src="images/star1.png" onmouseover="change(this.id);" id="php1" class="php">
                  <input type="hidden" id="php2_hidden" value="2">
                  <img style="height: 3rem;" src="images/star1.png" onmouseover="change(this.id);" id="php2" class="php">
                  <input type="hidden" id="php3_hidden" value="3">
                  <img style="height: 3rem;" src="images/star1.png" onmouseover="change(this.id);" id="php3" class="php">
                  <input type="hidden" id="php4_hidden" value="4">
                  <img style="height: 3rem;" src="images/star1.png" onmouseover="change(this.id);" id="php4" class="php">
                  <input type="hidden" id="php5_hidden" value="5">
                  <img style="height: 3rem;" src="images/star1.png" onmouseover="change(this.id);" id="php5" class="php">-->
                  </div>



                  <input type="hidden" name="phprating" id="phprating" value="0">
                  <input type="submit" value="Submit" name="submit_rating" class="btn btn-primary">

                  </form>
                  </div>

                  <?php
                  if(isset($_POST['submit_rating']))
                    {

                      $php_rating=$_POST['phprating'];
                      //echo $php_rating;
                      $query = "INSERT INTO rating(`id_user`, `id_carte`, `rating`, `titlu`) VALUES ( {$id_user}, {$carte_id_p}, {$php_rating}, '{$carte_titlu}')";
                      $insert_rating = mysqli_query($connection, $query);



                      header("Location: book.php?p_id={$carte_id_p}");
                    }
                   ?>


                  <div class="card-body">
                    <h4><a href="book.php?p_id=<?php echo $carte_id; ?>"><?php echo $carte_titlu ?></a></h4>
                    <h5 class="card-title">de <a href="book_by_author1.php?autor=<?php echo $carte_autor; ?>"><?php echo $carte_autor ?></a></h5>
                    <p class="card-text"><?php echo $carte_descriere ?></p>




                    <?php
                    if(isset($id_user)){
                    $query = "SELECT count(id_imprumut) as nr_imprum FROM imprumutate WHERE id_user = {$id_user}";
                    $select_query = mysqli_query($connection, $query);
                      while($row = mysqli_fetch_assoc($select_query)){
                        $nr_imprum = $row['nr_imprum'];
                      }


                    $query = "SELECT * FROM imprumutate WHERE titlu = '{$carte_titlu}' AND id_user = {$id_user}";
                    $select_carte_imprumutata_query = mysqli_query($connection, $query);
                    $user_id = 0;
                            while($row = mysqli_fetch_assoc($select_carte_imprumutata_query)){
                                $user_id = $row["id_user"];
                                $titlu = $row['titlu'];
                                $data_restituire_i = $row['data_restituire'];
                              }

                    $current_date = date("Y/m/d");
                    if(isset($data_restituire) || isset($data_restituire_i)){

                      if($id_user == $user_id && $role == 1 && $carte_titlu == $titlu){
                        ?>

                        <a class="btn btn-primary" <?php if(isset($username)){ ?>href="./elev/imprumuturi.php?delete=<?php echo $carte_id ?>"<?php } else{echo 'href="registration.php"';} ?>>Returneaza <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <?php


                      /*}*/} else if($role == 1){

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
                    }}else if($role == 1){
                      if($nr_imprum >= 5){ ?>
                        <a class="btn btn-primary" <?php if(isset($username)){ ?>href="favorite.php?book_id_fav=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Salveaza la favorite <span class="glyphicon glyphicon-chevron-right"></span></a>
                      <?php } else{
                      ?>

                      <a class="btn btn-primary" <?php if(isset($username)){ ?>href="imprumut.php?book_id=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Imprumuta <span class="glyphicon glyphicon-chevron-right"></span></a>
                      <a class="btn btn-primary" <?php if(isset($username)){ ?>href="favorite.php?book_id_fav=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Salveaza la favorite <span class="glyphicon glyphicon-chevron-right"></span></a>

                      <h5>Disponibil: <?php echo date("d M"); ?> </h5>
                      <?php

                    }}}
                    ?>






                  </div>

                </div>



              <?php break; } ?>

              <hr>


              </div>



              <!-- Blog Comments -->

              <!-- Comments Form -->

              <?php

              if(isset($_POST['recenzie_commit'])){
                if(!isset($id_user)){
                  echo "
                  <script>
                    alert('Trebuie sa fiti logat pentru a lasa o recenzie');
                  </script>
                  ";
                } else{
                $recenzie = $_POST['recenzie'];
                $current_date = date("Y/m/d");

                $query = "INSERT INTO recenzii(id_carte, id_user, continut_recenzie, data, status, cat) ";
                $query .= "VALUE('{$carte_id_p}', {$id_user}, '{$recenzie}', '{$current_date}', 'aprobat', 1) ";

                $add_recenzie_query = mysqli_query($connection, $query);

                if(!$add_recenzie_query){
                    die("QUERY FAILED". mysqli_error($connection));
                }

                header("Location: book.php?p_id={$carte_id_p}");
              }}
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

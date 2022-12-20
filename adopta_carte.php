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


                <div class="grid-container">
                <?php
                $username = $_SESSION['username'];
                $id_user = $_SESSION['id'];
                if(isset($_GET['p_id'])){
                    $carte_id_p = $_GET['p_id'];


                $query = "SELECT * FROM donate WHERE id_carte_donata = {$carte_id_p}";
                $select_all_carti_query = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_all_carti_query)){
                            $carte_id  = $row['id_carte_donata'];
                            $carte_titlu  = $row['titlu'];
                            $carte_autor  = $row['autor'];
                            $carte_imagine  = $row['imagine'];
                            $carte_descriere  = $row['descriere'];
                            ?>
                <div class="card text-center" style="width: 50rem;">
                  <img class="card-img-top img-rounded" src="images/<?php echo $carte_imagine ?>" alt="" width="100" height="200">
                  <div class="card-body">
                    <h4><a href="adopta.php?p_id=<?php echo $carte_id; ?>"><?php echo $carte_titlu ?></a></h4>
                    <h5 class="card-title">de <a href="adopta.php?p_id=<?php echo $carte_id; ?>"><?php echo $carte_autor ?></a></h5>
                    <p class="card-text"><?php echo $carte_descriere ?></p>
                    <a class="btn btn-primary" <?php if(isset($username)){ ?>href="adopt.php?book_id_i=<?php echo $carte_id; ?>"<?php } else{echo 'href="registration.php"';} ?>>Adopta <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <h6></h6>
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
                $query .= "VALUE('{$carte_id_p}', {$id_user}, '{$recenzie}', '{$current_date}', 'aprobat', 2) ";

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

              <?php $query = "SELECT * FROM recenzii LEFT JOIN users ON recenzii.id_user = users.user_id WHERE id_carte={$carte_id_p} AND status = 'aprobat' AND cat=2;";
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

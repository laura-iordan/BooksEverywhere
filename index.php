<?php
include "includes/db.php";
include "includes/header.php";

?>

    <!-- Navigation -->

<?php

include "includes/navigation.php";

?>

    <div style="margin-top: 2rem; margin-bottom: 2rem">
        <img src="images\pexels-pixabay-159711.jpg" width="100%" height="600" alt="">
    </div>


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

                $query = "SELECT * FROM books";
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



                <?php } ?>

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

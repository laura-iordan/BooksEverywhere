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
                    ADOPTA
                    <small></small>
                </h1>

                <div class="grid-container">
                <?php

                $query = "SELECT * FROM donate WHERE id_user_solicitant IS NULL";
                $select_all_produse_query = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_all_produse_query)){
                            $id_carte  = $row['id_carte_donata'];
                            $id_user_d = $row['id_user'];
                            $titlu  = $row['titlu'];
                            $autor  = $row['autor'];
                            $imagine  = $row['imagine'];
                            $descriere  = $row['descriere'];
                            $tags  = $row['tags'];


                            ?>
                <div class="grid-item">
                  <div class="card text-center" style="width: 15rem; height: 30rem">

                      <a class="" href="adopta_carte.php?p_id=<?php echo $id_carte; ?>">

                          <img class="card-img-center img-rounded" style="height: 16rem" src="images/<?php echo $imagine ?>" alt="">


                      </a>


                    <div class="card-body">
                      <h3><a href="adopta_carte.php?p_id=<?php echo $id_carte; ?>"><?php echo $titlu ?></a></h4>
                      <h5 class="card-title">de <a href="adopta_carte.php?p_id=<?php echo $id_carte; ?>"><?php echo $autor ?></a></h5>
                      <p class="card-text"><a class="btn btn-primary" href="adopta_carte.php?p_id=<?php echo $id_carte; ?>">Citeste mai mult<span class="glyphicon glyphicon-chevron-right"></span></a></p>


                    </div>
                  </div>

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

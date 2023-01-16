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
                    $autor = $_GET['autor'];


                $query = "SELECT * FROM books WHERE autor='{$autor}'";
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

                            <hr>
                            </div>



              <?php } ?>

              <hr>


              </div>



              <!-- Blog Comments -->

              <!-- Comments Form -->



              <hr>


            </div>



<?php
}
include "includes/sidebar.php";

?>


        </div>
        <!-- /.row -->

        <hr>

<?php

include "includes/footer.php";

?>

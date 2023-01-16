<?php
    include "includes/db.php";
    include "includes/header.php";
    include "functions.php";

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


                    if(isset($_POST['submit'])){
                        $search =  $_POST['search'];

                        $lista_titluri = array();

                        $query = "SELECT * FROM books";
                        $search_query = mysqli_query($connection_b1, $query);

                        if(!$search_query){
                            die("QUERY FAILED" . mysqli_error($connection_b1));
                        }

                        $count = 0;

                        while($row = mysqli_fetch_assoc($search_query)){
                          $carte_id  = $row['id_carte'];
                          $carte_titlu  = $row['titlu'];
                          $carte_autor  = $row['autor'];
                          $carte_imagine  = $row['imagine'];
                          $carte_descriere  = $row['descriere'];

                          //echo $carte_autor;
                          //echo $search;

                          $cautare_autor = SearchString(strtolower($carte_autor), strtolower($search));
                          $nr_cautare_autor = count($cautare_autor);

                          if($nr_cautare_autor>0){
                            if(in_array($carte_titlu, $lista_titluri) == false){
                              array_push($lista_titluri, $carte_titlu);
                            }
                          } else{
                            $cautare_autor = SearchString(strtolower($carte_titlu), strtolower($search));
                            $nr_cautare_autor = count($cautare_autor);

                            if($nr_cautare_autor>0){
                              if(in_array($carte_titlu, $lista_titluri) == false){
                                array_push($lista_titluri, $carte_titlu);
                              }
                            }
                          }



                          //echo $nr_cautare_autor;
                          /*if($nr_cautare_autor > 0){
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
                            </div>



                          <?php } else{
                            $cautare_titlu = SearchString(strtolower($carte_titlu), strtolower($search));
                            $nr_cautare_titlu = count($cautare_titlu);
                            if($nr_cautare_titlu > 0){
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
                              </div>



                            <?php } else{
                              //echo "<h3> NO RESULT </h3>";
                            }
                          }*/
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



                      <?php break;}} }?>



                </div>





                <!-- First Blog Post -->




        </div>

            <!-- Blog Sidebar Widgets Column -->

        <?php

            include "includes/sidebar.php";

        ?>


    </div>
    <!-- /.row -->

    <hr>

<?php

    include "includes/footer.php";

?>

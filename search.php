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


                    if(isset($_POST['submit'])){
                        $search =  $_POST['search'];

                        $query = "SELECT * FROM books WHERE tags LIKE '%$search%' ";
                        $search_query = mysqli_query($connection_b1, $query);

                        if(!$search_query){
                            die("QUERY FAILED" . mysqli_error($connection_b1));
                        }

                        $count = mysqli_num_rows($search_query);
                        if($count == 0){
                            echo "<h3> NO RESULT </h3>";
                        } else{


                                    while($row = mysqli_fetch_assoc($search_query)){
                                        $carte_id  = $row['id_carte'];
                                        $carte_titlu  = $row['titlu'];
                                        $carte_autor  = $row['autor'];
                                        $carte_imagine  = $row['imagine'];
                                        $carte_descriere  = $row['descriere'];


                                        ?>
                            <div class="grid-item">
                            <h2>
                                <a href="book.php?p_id=<?php echo $carte_id; ?>"><?php echo $carte_titlu ?></a>
                            </h2>
                            <p class="lead">
                                de <a href="book.php?p_id=<?php echo $carte_id; ?>"><?php echo $carte_autor ?></a>
                            </p>
                            <hr>
                            <a href="book.php?p_id=<?php echo $carte_id; ?>">
                            <img class="" src="images/<?php echo $carte_imagine ?>" alt="">
                            </a>
                            <hr>

                            <!-- <p><?php echo $carte_descriere ?></p> -->
                            <a class="btn btn-primary" href="book.php?p_id=<?php echo $carte_id; ?>">Citeste mai mult <span class="glyphicon glyphicon-chevron-right"></span></a>

                            <hr>
                            </div>



                            <?php }
                        }
                    }

                    ?>


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

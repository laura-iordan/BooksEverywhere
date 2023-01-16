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
                if(isset($_GET['category'])){
                    $categorie = $_GET['category'];
                }

                $query = "SELECT * FROM books WHERE categorie = '{$categorie}'";
                $select_all_produse_query = mysqli_query($connection_b1, $query);


                        while($row = mysqli_fetch_assoc($select_all_produse_query)){
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
                    <img class="" width="100" src="images/<?php echo $carte_imagine ?>" alt="">
                </a>
                <hr>

                <!-- <p><?php echo $carte_descriere ?></p> -->
                <a class="btn btn-primary" href="book.php?p_id=<?php echo $carte_id; ?>">Citeste mai mult<span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                </div>



                <?php } ?>

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

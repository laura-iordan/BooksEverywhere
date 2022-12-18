<?php
include "includes/db.php";
include "includes/header.php";

?>

    <!-- Navigation -->

<?php

include "includes/navigation.php";

?>

    <div>
        <img src="images/books-1617327__340.jpg" width="100%" height="500" alt="">
    </div>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <h1 class="page-header">
                    IMPRUMUTA
                    <small>Secondary Text</small>
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


                            ?>
                <div class="grid-item">
                <h2>
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
                <!-- <p><?php echo $produs_descriere ?></p> -->
                <a class="btn btn-primary" href="book.php?p_id=<?php echo $produs_id; ?>">Citeste mai mult<span class="glyphicon glyphicon-chevron-right"></span></a>

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

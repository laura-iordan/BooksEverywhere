<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->

        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small><?php echo $_SESSION['username']; ?></small>
                    </h1>

                    <?php

                    if(isset($_POST['add_book'])){
                        $carte_titlu = $_POST['titlu'];
                        $carte_autor = $_POST['autor'];

                        $carte_imagine = $_FILES['imagine']['name'];
                        $carte_imagine_tmp = $_FILES['imagine']['tmp_name'];

                        $carte_descriere = $_POST['descriere'];
                        $carte_tags = $_POST['tags'];
                        $categorie = $_POST['categorie'];

                        move_uploaded_file($carte_imagine_tmp, "../images/$carte_imagine");
                        $user_id = $_SESSION['id'];
                        $query = "INSERT INTO books(id_biblioteca, categorie, titlu, autor, imagine, descriere, tags) ";
                        $query .= "VALUE(10, '{$categorie}', '{$carte_titlu}', '{$carte_autor}', '{$carte_imagine}', '{$carte_descriere}', '{$carte_tags}') ";

                        $add_book_query = mysqli_query($connection_b1, $query);


                        header("Location: add_book.php");


                    }

                    ?>

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="titlu">Titlu carte</label>
                            <input type="text" class="form-control" name="titlu">
                        </div>

                        <div class="form-group">
                            <label for="autor">Autor carte</label>
                            <input type="text" class="form-control" name="autor">
                        </div>

                        <div class="form-group">
                            <label for="imagine">Imagine carte</label>
                            <input type="file" class="form-control" name="imagine">
                        </div>

                        <div class="form-group">
                            <label for="descriere">Descriere carte</label>
                            <textarea class="form-control" name="descriere" id="" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="descriere">Categorie</label>
                            <textarea class="form-control" name="categorie" id="" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="tags">Tags carte</label>
                            <input type="text" class="form-control" name="tags">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="add_book" value="Adauga carte">
                        </div>

                    </form>



                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>

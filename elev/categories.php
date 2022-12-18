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
                            <small>Author</small>
                        </h1>

                        <div class="col-xs-6">

                            <?php insertCategorii(); ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-titlu">Adauga categorie</label>
                                    <input class="form-control" type="text" name="cat_titlu">  
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Adauga categorie">
                                </div>
                            </form>
                            
                            <?php 
                            if(isset($_GET['edit'])){
                                $cat_id = $_GET['edit'];
                                include "includes/update_categories.php";
                            }
                            ?>
                            
                        </div>

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Titlul categoriei</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php findAllCategorii(); ?>

                                    <?php deleteCategorii(); ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>

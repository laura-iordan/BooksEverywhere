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
                        Welcome
                        <?php echo $_SESSION['username']; ?>
                    </h1>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Titlu</th>
                                <th>Autor</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $username = $_SESSION['username'];
                            $id_user = $_SESSION['id'];

                            $query = "SELECT * FROM favorite WHERE id_user = {$id_user}";
                            $result = mysqli_query($connection, $query);


                            while($row = mysqli_fetch_assoc($result)){
                                $titlu  = $row['titlu'];
                                $autor  = $row['autor'];
                                $id_carte = $row['id_carte'];

                                echo "<tr>";
                                echo "<td>{$titlu}</td>";
                                echo "<td>{$autor}</td>";
                                echo "<td><a href='../imprumut.php?book_id={$id_carte}'>Imprumuta</a></td>";
                                echo "<td><a href='favorite.php?delete={$id_carte}'>Sterge</a></td>";
                                echo "<tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                    <?php
                    if(isset($_GET['delete'])){
                        $id_carte = $_GET['delete'];
                        $query = "DELETE FROM favorite WHERE id_carte = {$id_carte} AND id_user = {$id_user}";
                        $delete_query = mysqli_query($connection, $query);
                        header("Location: favorite.php");
                    }
                    ?>



                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>

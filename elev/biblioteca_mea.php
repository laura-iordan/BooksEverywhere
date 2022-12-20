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
                                <th>Imagine</th>
                                <th>Descriere</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $username = $_SESSION['username'];
                            $id_user = $_SESSION['id'];

                            $query = "SELECT * FROM biblioteca_mea WHERE id_user = {$id_user}";
                            $result = mysqli_query($connection, $query);


                            while($row = mysqli_fetch_assoc($result)){
                                $id_carte_citita = $row['id_carte_citita'];
                                $titlu  = $row['titlu'];
                                $autor  = $row['autor'];
                                $imagine  = $row['imagine'];
                                $descriere = $row['descriere'];

                                echo "<tr>";
                                echo "<td>{$titlu}</td>";
                                echo "<td>{$autor}</td>";
                                echo "<td><img width='100' src='../images/$imagine'></td>";
                                echo "<td>{$descriere}</td>";
                                echo "<td><a href='biblioteca_mea.php?delete={$id_carte_citita}'>Sterge</a></td>";

                                echo "<tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                    <?php
                    if(isset($_GET['delete'])){
                        echo $carte_id_s = $_GET['delete'];
                        $query = "DELETE FROM biblioteca_mea WHERE id_carte_citita = {$carte_id_s} AND id_user = {$id_user}";
                        $delete_query = mysqli_query($connection, $query);
                        header("Location: biblioteca_mea.php");
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

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
                                <th>Data returnare</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $username = $_SESSION['username'];
                            $id_user = $_SESSION['id'];

                            $query = "SELECT * FROM imprumutate WHERE id_user = {$id_user}";
                            $result = mysqli_query($connection, $query);


                            while($row = mysqli_fetch_assoc($result)){
                                $titlu  = $row['titlu'];
                                $autor  = $row['autor'];
                                $data  = $row['data_restituire'];
                                $id_carte = $row['id_carte'];

                                echo "<tr>";
                                echo "<td>{$titlu}</td>";
                                echo "<td>{$autor}</td>";
                                echo "<td>{$data}</td>";
                                echo "<td><a href='contul_meu.php?delete={$id_carte}'>Returneaza</a></td>";
                                echo "<td><a href='contul_meu.php?delete={$id_carte}'>Prelungeste</a></td>";
                                echo "<tr>";
                            }
                            ?>
                        </tbody>
                    </table>



                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>

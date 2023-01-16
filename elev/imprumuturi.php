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
                                <th>Biblioteca</th>
                                <th>ID Utilizator</th>
                                <th>Utilizator</th>
                                <th>Titlu</th>
                                <th>Autor</th>
                                <th>Data imprumut</th>
                                <th>Data returnare</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $username = $_SESSION['username'];
                            $id_user = $_SESSION['id'];


                            $query = "SELECT * FROM imprumutate JOIN users on imprumutate.id_user = users.user_id JOIN categorie ON imprumutate.id_categorie = categorie.cat_id WHERE id_user={$id_user}";
                            $result = mysqli_query($connection, $query);


                            while($row = mysqli_fetch_assoc($result)){
                                $id_carte = $row['id_carte'];
                                $id_biblioteca = $row['id_biblioteca'];
                                $id_user = $row['id_user'];
                                $username = $row['username'];
                                $titlu = $row['titlu'];
                                $autor = $row['autor'];
                                $data_imprumut = $row['data_imprumut'];
                                $data_restituire = $row['data_restituire'];

                                echo "<tr>";
                                echo "<td>{$id_biblioteca}</td>";
                                echo "<td>{$id_user}</td>";
                                echo "<td>{$username}</td>";
                                echo "<td>{$titlu}</td>";
                                echo "<td>{$autor}</td>";
                                echo "<td>{$data_imprumut}</td>";
                                echo "<td>{$data_restituire}</td>";
                                echo "<td><a href='imprumuturi.php?delete={$id_carte}'>Returneaza</a></td>";
                                echo "<td><a href='imprumuturi.php?update={$id_carte}'>Prelungeste</a></td>";
                                echo "<tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                    <?php
                    if(isset($_GET['delete'])){
                        $carte_id_s = $_GET['delete'];

                        $query = "SELECT * FROM imprumutate WHERE id_carte = {$carte_id_s}";
                        $result = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_assoc($result)){
                            $titlu = $row['titlu'];
                          }



                        $query = "DELETE FROM imprumutate WHERE id_carte = {$carte_id_s}";
                        $delete_query = mysqli_query($connection, $query);

                        $query = "UPDATE `books` SET `data_imprumut`=null,`data_restituire`= null, `prelungire` = 0 WHERE id_carte = {$carte_id_s}";
                        $update_query = mysqli_query($connection_b1, $query);



                        $query = "SELECT * FROM favorite WHERE titlu = '{$titlu}'";
                        $result = mysqli_query($connection, $query);




                        while($row = mysqli_fetch_assoc($result)){
                            $id_carte = $row['id_carte'];
                          }
                        if(isset($id_carte)){
                          $query = "DELETE FROM favorite WHERE id_carte = {$carte_id_s} ";
                          $delete_query = mysqli_query($connection, $query);


                        }

                        $query = "SELECT * FROM biblioteca_mea WHERE id_carte_b = {$carte_id_s} AND id_user = {$id_user}";
                        $result = mysqli_query($connection, $query);

                        $row = mysqli_fetch_assoc($result);



                          if(empty($row)){
                            $query = "SELECT * FROM books WHERE id_carte = {$carte_id_s}";
                            $result = mysqli_query($connection_b1, $query);


                            while($row = mysqli_fetch_assoc($result)){
                                $id_carte = $row['id_carte'];
                                $id_biblioteca = $row['id_biblioteca'];
                                $titlu = $row['titlu'];
                                $autor = $row['autor'];
                                $imagine = $row['imagine'];
                                $descriere = $row['descriere'];
                              }
                            $id_user = $_SESSION['id'];

                            $query = "INSERT INTO `biblioteca_mea`(`id_carte_b`, `id_biblioteca`, `id_user`, `titlu`, `autor`, `imagine`, `descriere`) VALUES ('{$id_carte}','{$id_biblioteca}','{$id_user}','{$titlu}','{$autor}','{$imagine}','{$descriere}')";
                            $insert_query = mysqli_query($connection, $query);


                          }
                          header("Location: imprumuturi.php");

                        }

                        if(isset($_GET['update'])){
                            $carte_id_s = $_GET['update'];
                            echo $carte_id_s;
                            $query = "SELECT * FROM books WHERE id_carte = $carte_id_s";
                            $select_query = mysqli_query($connection_b1, $query);
                            $prelungire;
                            $data_restituire;
                            while($row = mysqli_fetch_assoc($select_query)){
                                echo $data_restituire = $row['data_restituire'];
                                echo $prelungire = $row['prelungire'];
                              }



                              echo $data_restituire;

                            if($prelungire == 0){

                              $year = date('Y', strtotime($data_restituire));
                              $month = date('m', strtotime($data_restituire));
                              $day = date('d', strtotime($data_restituire));
                              if($month < 12){
                                if($day == 15){
                                  $day = 1;
                                  $month += 1;
                                } else{
                                  $day = 15;
                                }

                              } else{
                                if($day == 15){
                                  $day = 1;
                                  $month = 1;
                                  $year += 1;
                                } else{
                                  $day = 15;
                                }

                              }

                              //$d1 = "{$month}-{$day}-{$year}";

                              //$d = new DateTime($d1);

                              //$timestamp = $d->getTimestamp(); // Unix timestamp
                              //$formatted_date = $d->format('Y-m-d');

                              $date=date_create();
                              date_date_set($date,$year,$month,$day);
                              $data_restituire = date_format($date,"Y-m-d");

                              $query = "UPDATE `books` SET `data_restituire`= '{$data_restituire}', `prelungire` = 1 WHERE id_carte = {$carte_id_s}";
                              $update_query = mysqli_query($connection_b1, $query);

                              $query = "UPDATE `imprumutate` SET `data_restituire`= '{$data_restituire}' WHERE id_carte = {$carte_id_s}";
                              $update_query = mysqli_query($connection, $query);

                            }

                              header("Location: imprumuturi.php");
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

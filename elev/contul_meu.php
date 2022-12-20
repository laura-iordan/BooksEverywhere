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
                                echo "<td><a href='contul_meu.php?update={$id_carte}'>Prelungeste</a></td>";
                                echo "<tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                    <?php
                    if(isset($_GET['delete'])){
                        $carte_id_s = $_GET['delete'];
                        $query = "DELETE FROM imprumutate WHERE id_carte = {$carte_id_s} ";
                        $delete_query = mysqli_query($connection, $query);

                        $query = "UPDATE `books` SET `data_imprumut`=null,`data_restituire`= null, `prelungire` = 0 WHERE id_carte = {$carte_id_s}";
                        $update_query = mysqli_query($connection_b1, $query);



                        $query = "SELECT * FROM favorite WHERE id_carte = {$carte_id_s}";
                        $result = mysqli_query($connection, $query);




                        while($row = mysqli_fetch_assoc($result)){
                            $id_carte = $row['id_carte'];
                          }
                        if(isset($id_carte)){
                          $query = "DELETE FROM favorite WHERE id_carte = {$carte_id_s} ";
                          $delete_query = mysqli_query($connection, $query);


                        }

                        $query = "SELECT * FROM biblioteca_mea WHERE id_carte_b = {$carte_id_s}";
                        $result = mysqli_query($connection, $query);

                        $row = mysqli_fetch_assoc($result);



                          if(empty($row)){
                            $query = "SELECT * FROM books WHERE id_carte = {$carte_id_s}";
                            $result = mysqli_query($connection_b1, $query);

                            if(!$result){
                                die("QUERY FAILED". mysqli_error($connection));
                            } else{
                              echo "Success 2";
                            }

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

                            if(!$insert_query){
                                die("QUERY FAILED". mysqli_error($connection));
                            } else{
                              echo "Success biblioteca mea";
                            }

                          }
                          header("Location: contul_meu.php");
                        }

                        if(isset($_GET['update'])){
                            $carte_id_s = $_GET['update'];
                            $query = "SELECT * FROM books WHERE id_carte = {$carte_id_s}";
                            $select_query = mysqli_query($connection_b1, $query);

                            while($row = mysqli_fetch_assoc($select_query)){
                                $data_restituire = $row['data_restituire'];
                                $prelungire = $row['prelungire'];
                              }
                            //echo $data_restituire;

                            if($prelungire == 1){

                              $year = date('Y', strtotime($data_restituire));
                              $month = date('m', strtotime($data_restituire));
                              $day = date('d', strtotime($data_restituire));
                              if($month < 12){
                                if($day <= 15){
                                  $day = 1;
                                } else{
                                  $day = 15;
                                }
                                $month += 1;
                              } else{
                                if($day < 15){
                                  $day = 1;
                                } else{
                                  $day = 15;
                                }
                                $month = 1;
                                $year += 1;
                              }

                              $date=date_create();
                              date_date_set($date,$year,$month,$day);
                              $data_restituire = date_format($date,"Y-m-d");

                              $query = "UPDATE `books` SET `data_restituire`= NULL, `prelungire` = 1 WHERE id_carte = {$carte_id_s}";
                              $update_query = mysqli_query($connection_b1, $query);


                              $query = "UPDATE `books` SET `data_restituire`= {$data_restituire}, `prelungire` = 1 WHERE id_carte = {$carte_id_s}";
                              $update_query = mysqli_query($connection_b1, $query);

                              if(!$update_query){
                                  die("QUERY FAILED". mysqli_error($connection));
                              } else{
                                echo "Success1!";
                              }

                              $query = "UPDATE `imprumutate` SET `data_restituire`= NULL WHERE id_carte = {$carte_id_s}";
                              $update_query = mysqli_query($connection, $query);

                              $query = "UPDATE `imprumutate` SET `data_restituire`= {$data_restituire} WHERE id_carte = {$carte_id_s}";
                              $update_query = mysqli_query($connection, $query);

                              if(!$update_query){
                                  die("QUERY FAILED". mysqli_error($connection));
                              } else{
                                echo "Success!";
                              }

                            }

                              //header("Location: contul_meu.php");
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

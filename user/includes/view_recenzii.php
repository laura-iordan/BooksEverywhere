<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Titlu</th>
                                <th>Autor</th>
                                <th>Autor recenzie</th>
                                <th>Recenzie</th>
                                <th>Data</th>
                                <th>Sterge</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user_id = $_SESSION['id'];
                            $query = "SELECT * FROM recenzii LEFT JOIN users ON recenzii.id_user = users.user_id WHERE id_user = {$user_id}";
                            $select_recenzii = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($select_recenzii)){
                                $id_user = $row['id_user'];
                                $id_recenzie = $row['id_recenzie'];
                                $id_carte  = $row['id_carte'];
                                $username = $row['username'];
                                $continut  = $row['continut_recenzie'];
                                $data  = $row['data'];
                                $status  = $row['status'];





                                  $query = "SELECT * FROM books  WHERE id_carte = {$id_carte}";
                                  $select_carte = mysqli_query($connection_b1, $query);

                                  while($row = mysqli_fetch_assoc($select_carte)){
                                    $titlu = $row['titlu'];
                                    $autor = $row['autor'];


                                  echo "<tr>";
                                  echo "<td>{$titlu}</td>";
                                  echo "<td>{$autor}</td>";
                                  echo "<td>{$username}</td>";
                                  echo "<td>{$continut}</td>";
                                  echo "<td>{$data}</td>";
                                  echo "<td><a href='recenzie.php?delete={$id_recenzie}'>Sterge</a></td>";
                                  echo "<tr>";
                                }

                            }
                            ?>

                            <?php
                            if(isset($_GET['delete'])){
                                $recenzie_id_s = $_GET['delete'];
                                $query = "DELETE FROM recenzii WHERE id_recenzie = {$recenzie_id_s} ";
                                $delete_query = mysqli_query($connection, $query);
                                header("Location: recenzie.php");
                            }
                            ?>
                        </tbody>
                    </table>

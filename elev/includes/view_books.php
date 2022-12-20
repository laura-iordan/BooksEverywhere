<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Titlu</th>
                                <th>Autor</th>
                                <th>Imagine</th>
                                <th>Descriere</th>
                                <th>Tags</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user_id = $_SESSION['id'];
                            $query = "SELECT * FROM donate WHERE id_user = {$user_id}";
                            $select_carti = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($select_carti)){
                                $carte_id  = $row['id_carte_donata'];
                                $carte_titlu  = $row['titlu'];
                                $carte_autor  = $row['autor'];
                                $carte_imagine  = $row['imagine'];
                                $carte_descriere  = $row['descriere'];
                                $carte_tags  = $row['tags'];
                                echo "<tr>";
                                echo "<td>{$carte_titlu}</td>";
                                echo "<td>{$carte_autor}</td>";
                                echo "<td><img width='100' src='../images/$carte_imagine'></td>";
                                echo "<td>{$carte_descriere}</td>";
                                echo "<td>{$carte_tags}</td>";
                                echo "<td><a href='books.php?delete={$carte_id}'>Sterge</a></td>";
                                echo "<td><a href='books.php?source=update_book&p_id={$carte_id}'>Editeaza</a></td>";
                                echo "<tr>";
                            }
                            ?>
                            <?php
                            if(isset($_GET['delete'])){
                                $carte_id_s = $_GET['delete'];
                                $query = "DELETE FROM donate WHERE id_carte_donata = {$carte_id_s} ";
                                $delete_query = mysqli_query($connection, $query);
                                header("Location: books.php");
                            }
                            ?>
                        </tbody>
                    </table>

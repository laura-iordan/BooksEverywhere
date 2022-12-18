<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Autor</th>
                                <th>Titlu</th>
                                <th>Categorie</th>
                                <th>Imagine</th>
                                <th>Descriere</th>
                                <th>Pret</th>
                                <th>Stoc</th>
                                <th>Tags</th>
                                <th>Recenzii</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query = "SELECT * FROM produse";
                            $select_produse = mysqli_query($connection, $query);
                        
                            while($row = mysqli_fetch_assoc($select_produse)){
                                $produs_id  = $row['produs_id'];
                                $produs_titlu  = $row['produs_titlu'];
                                $produs_autor  = $row['produs_autor'];
                                $produs_categorie_id = $row['produs_categorie_id'];
                                $produs_imagine  = $row['produs_imagine'];
                                $produs_descriere  = $row['produs_descriere'];
                                $produs_pret  = $row['produs_pret'];
                                $produs_cantitate  = $row['produs_cantitate'];
                                $produs_tags  = $row['produs_tags'];
                                $produs_recenzie_count = $row['produs_recenzie_count'];
                                echo "<tr>";
                                echo "<td>{$produs_id}</td>";
                                echo "<td>{$produs_titlu}</td>";

                                $query = "SELECT * FROM categorii WHERE cat_id={$produs_categorie_id}";
                                $select_categorii_id = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($select_categorii_id)){
                                    $cat_id = $row['cat_id'];
                                    $cat_titlu = $row['cat_titlu'];
                                    echo "<td>{$cat_titlu}</td>";
                                }
                                echo "<td>{$produs_autor}</td>";
                                echo "<td><img width='100' src='../images/$produs_imagine'></td>";
                                echo "<td>{$produs_descriere}</td>";
                                echo "<td>{$produs_pret}</td>";
                                echo "<td>{$produs_cantitate}</td>";
                                echo "<td>{$produs_tags}</td>";
                                echo "<td>{$produs_recenzie_count}</td>";
                                echo "<td><a href='books.php?delete={$produs_id}'>Sterge</a></td>";
                                echo "<td><a href='books.php?source=update_book&p_id={$produs_id}'>Editeaza</a></td>";
                                echo "<tr>";
                            }
                            ?>
                            <?php
                            if(isset($_GET['delete'])){
                                $produs_id_s = $_GET['delete']; 
                                $query = "DELETE FROM produse WHERE produs_id = {$produs_id_s} ";
                                $delete_query = mysqli_query($connection, $query);
                                header("Location: books.php");
                            }
                            ?>
                        </tbody>
                    </table>
<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Username</th>
                                <th>Nume</th>
                                <th>Prenume</th>
                                <th>Email</th>
                                <th>Localitate</th>
                                <!-- <th>Editeaza</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //$user_id = $_SESSION['id'];
                            //$username = $_SESSION['username'];

                            $query = "SELECT * FROM users";
                            $result_i = mysqli_query($connection, $query);

                            while($rows = mysqli_fetch_assoc($result_i)){
                                $user_id_i = $rows['user_id'];
                                $username = $rows['username'];
                                echo $username;
                                echo $role = $rows['role'];
                                if($role == 1){
                                  $query = "SELECT * FROM user_elev WHERE id_user = {$user_id_i}";
                                  $result = mysqli_query($connection, $query);

                                  if(mysqli_num_rows($result) == 0){
                                    echo "<tr>";
                                    echo "<td>{$user_id_i}</td>";
                                    echo "<td>{$username}</td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    //echo "<td><a href='books.php?source=update_book&p_id={$user_id_i}'>Editeaza</a></td>";
                                    echo "<tr>";
                                  } else{

                                  while($row = mysqli_fetch_assoc($result)){
                                    $nume = $row['nume'];
                                    $prenume  = $row['prenume'];
                                    $email  = $row['email'];
                                    $localitate  = $row['localitate'];
                                    echo "<tr>";
                                    echo "<td>{$user_id_i}</td>";
                                    echo "<td>{$username}</td>";
                                    echo "<td>{$nume}</td>";
                                    echo "<td>{$prenume}</td>";
                                    echo "<td>{$email}</td>";
                                    echo "<td>{$localitate}</td>";
                                    //echo "<td><a href='books.php?source=update_book&p_id={$user_id_i}'>Editeaza</a></td>";
                                    echo "<tr>";
                                  }}
                                }

                                if($role == 2){
                                  $query = "SELECT * FROM user_admin WHERE id_user = {$user_id_i}";
                                  $result = mysqli_query($connection, $query);

                                  if(mysqli_num_rows($result) == 0){
                                    echo "<tr>";
                                    echo "<td>{$user_id_i}</td>";
                                    echo "<td>{$username}</td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    //echo "<td><a href='books.php?source=update_book&p_id={$user_id_i}'>Editeaza</a></td>";
                                    echo "<tr>";
                                  } else{



                                  while($row = mysqli_fetch_assoc($result)){
                                    $nume = $row['nume'];
                                    $prenume = $row['prenume'];
                                    $email = $row['email'];
                                    $localitate = $row['localitate'];
                                    echo "<tr>";
                                    echo "<td>{$user_id_i}</td>";
                                    echo "<td>{$username}</td>";
                                    echo "<td>{$nume}</td>";
                                    echo "<td>{$prenume}</td>";
                                    echo "<td>{$email}</td>";
                                    echo "<td>{$localitate}</td>";
                                    //echo "<td><a href='books.php?source=update_book&p_id={$user_id_i}'>Editeaza</a></td>";
                                    echo "<tr>";
                                  }}
                                }

                                if($role == 3){
                                  $query = "SELECT * FROM user_utilizator WHERE id_user = {$user_id_i}";
                                  $result = mysqli_query($connection, $query);

                                  if(mysqli_num_rows($result) == 0){
                                    echo "<tr>";
                                    echo "<td>{$user_id_i}</td>";
                                    echo "<td>{$username}</td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    //echo "<td><a href='books.php?source=update_book&p_id={$user_id_i}'>Editeaza</a></td>";
                                    echo "<tr>";
                                  } else{

                                  while($row = mysqli_fetch_assoc($result)){
                                    $nume  = $row['nume'];
                                    $prenume  = $row['prenume'];
                                    $email  = $row['email'];
                                    $localitate  = $row['localitate'];
                                    echo "<tr>";
                                    echo "<td>{$user_id_i}</td>";
                                    echo "<td>{$username}</td>";
                                    echo "<td>{$nume}</td>";
                                    echo "<td>{$prenume}</td>";
                                    echo "<td>{$email}</td>";
                                    echo "<td>{$localitate}</td>";
                                    //echo "<td><a href='books.php?source=update_book&p_id={$user_id_i}'>Editeaza</a></td>";
                                    echo "<tr>";
                                  }}
                                }

                            }
                            ?>
                            <?php

                            ?>
                        </tbody>
                    </table>

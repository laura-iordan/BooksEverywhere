<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Books Everywhere</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php
                        /*
                        $query = "SELECT * FROM categorii";
                        $select_all_categorii_query = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_all_categorii_query)){
                            $cat_titlu  = $row['cat_titlu'];
                            echo "<li><a href='#'>{$cat_titlu}</a></li>";

                        }*/
                    ?>
                    <li>
                        <a href="admin">Doneaza</a>
                    </li>
                    <li>
                        <a href="admin">Cere o carte</a>
                    </li>
                    <li>

                      <?php
                      if(isset($_SESSION['rol'])){
                        if($_SESSION['rol'] == 1){
                            echo '<a href="elev">Admin</a>';
                        } elseif ($_SESSION['rol'] == 2) {
                          echo '<a href="admin">Admin</a>';
                        } elseif($_SESSION['rol'] == 3){
                          echo '<a href="user">Admin</a>';
                        }
                      } else{
                        echo '<a href="admin">Admin</a>';
                      }



                      ?>
                    </li>

                    <li>
                        <a href="registration.php">Registration</a>
                    </li>
                    <!--
                    <li>
                        <a href="#">Contact</a>
                    </li>

                    -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

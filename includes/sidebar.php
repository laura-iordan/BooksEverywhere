<div class="col-md-4">




                <!-- Blog Search Well -->
                <div class="well">
                    <h3>Cautare</h3>
                    <form action="search.php" method="post">
                        <div class="input-group">
                            <input name="search" type="text" class="form-control" >
                            <span class="input-group-btn">
                                <button name="submit" class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>
                    </form>

                    <!-- /.input-group -->
                </div>

                <div class="well">
                    <h3>Inregistrare</h3>
                    <form action="includes/login.php" method="post">
                        <div class="form-group">
                            <input name="username" type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="input-group">
                            <input name="password" type="password" class="form-control" placeholder="Parola">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" name="login" type="submit">Submit</button>
                            </span>
                        </div>
                    </form>

                    <!-- /.input-group -->
                </div>



                <!-- Blog Categories Well -->
                <div class="well">

                    <?php
                         $query = "SELECT * FROM categorie";
                         $select_categorii_sidebar = mysqli_query($connection, $query);
                    ?>

                    <h3>Categorii</h3>
                    <div class="row">
                        <div class="col-lg-12">


                            <ul class="list-unstyled">
                                <?php
                                    while($row = mysqli_fetch_assoc($select_categorii_sidebar)){
                                        $cat_id  = $row['cat_id'];
                                        $cat_titlu  = $row['cat_titlu'];
                                        echo "<li><h4><a href='category.php?category=$cat_titlu'>{$cat_titlu}</a></h4></li>";

                                    }
                                ?>
                            </ul>
                        </div>

                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php// include "widget.php";?>

            </div>

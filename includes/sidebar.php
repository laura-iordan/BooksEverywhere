<div class="col-md-4">




                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Cautare</h4>
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
                    <h4>Inregistrare</h4>
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

                    <h4>Categorii</h4>
                    <div class="row">
                        <div class="col-lg-12">


                            <ul class="list-unstyled">
                                <?php
                                    while($row = mysqli_fetch_assoc($select_categorii_sidebar)){
                                        $cat_id  = $row['cat_id'];
                                        $cat_titlu  = $row['cat_titlu'];
                                        echo "<li><a href='category.php?category= $cat_id'>{$cat_titlu}</a></li>";

                                    }
                                ?>
                            </ul>
                        </div>

                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include "widget.php";?>

            </div>

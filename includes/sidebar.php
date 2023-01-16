<div class="col-md-4">




                <!-- Blog Search Well -->
                <div class="well">
                    <h3>Cautare</h3>
                    <form action="searchKMP.php" method="post">
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

                    <div class="button-group">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Ai uitat parola?</button>

                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-dialog" style="width: 300px;">
                                <div class="modal-content text-center">
                                    <div class="modal-header h5 text-white bg-primary justify-content-center">
                                        Resetare Parola
                                    </div>
                                    <div class="modal-body px-5">
                                        <p class="py-2">
                                            Introduceti adresa de email si veti primi o parola resetata.
                                        </p>
                                        <form class="" action="includes/reset.php" method="post">
                                          <div class="form-outline">
                                              <input name="email_reset" type="email" id="typeEmail" class="form-control my-3" />
                                              <label class="form-label" for="typeEmail">Email</label>
                                          </div>
                                          <button class="btn btn-primary" name="reset" type="submit">Reseteaza parola</button>
                                        </form>

                                        <div class="d-flex justify-content-between mt-4">
                                            <a class="" href="index.php">Login</a>
                                            <a class="" href="registration.php">Register</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>

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

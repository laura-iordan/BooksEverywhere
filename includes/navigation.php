<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <ul class="nav navbar-nav">
    <li>
      <div class="container-fluid">

            <a class="navbar-brand" href="index.php" style="font-size: 3.85rem">Books Everywhere</a>


      </div>
    </li>
    <li>


        <div class="container" style="padding-left: 25%">
            <!-- Brand and toggle get grouped for better mobile display -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li>
                      <a href="adopta.php">Adopta o carte</a>
                  </li>

                    <?php
                        /*
                        $query = "SELECT * FROM categorii";
                        $select_all_categorii_query = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_all_categorii_query)){
                            $cat_titlu  = $row['cat_titlu'];
                            echo "<li><a href='#'>{$cat_titlu}</a></li>";

                        }*/
                    ?>


                      <?php
                      if(isset($_SESSION['rol'])){
                        if($_SESSION['rol'] == 1){ ?>


                          <li>
                              <a href="elev/books.php?source=add_book">Doneaza</a>
                          </li>

                          <li>
                              <a href="elev">Admin</a>
                          </li>
                        <?php } else if ($_SESSION['rol'] == 2) { ?>
                          <li>
                              <a href="admin/books.php?source=add_book">Doneaza</a>
                          </li>

                          <li>
                              <a href="admin">Admin</a>
                          </li>
                        <?php } else if($_SESSION['rol'] == 3){ ?>
                          <li>
                              <a href="user/books.php?source=add_book">Doneaza</a>
                          </li>

                          <li>
                              <a href="user">Admin</a>
                          </li>
                        <?php }} else{ ?>
                        <li>
                            <a href="admin">Doneaza</a>
                        </li>
                        <li>
                            <a href="admin">Admin</a>
                        </li>

                      <?php } ?>



                    <!--
                    <li>
                        <a href="#">Contact</a>
                    </li>

                    -->
                </ul>

                <ul class="nav navbar-right top-nav">

                </ul>


            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
      </li>
      <li>

      </li>
    </ul>
    <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>




    </div>
    <ul class="nav navbar-right top-nav">
        <?php if(isset($_SESSION['rol'])){ ?>
        <li class="dropdown">
            <a style="margin-right: 2rem; height: 5rem; font-size: 2rem; color: #9d9d9d; background-color: transparent;" href="#" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <?php if($_SESSION['rol'] == 1){ ?>
                <li>
                    <a href="elev/profile.php"><i class="fa fa-fw fa-user"></i> Profil</a>
                </li>
                <?php } else if ($_SESSION['rol'] == 2) { ?>
                <li>
                    <a href="admin/profile.php"><i class="fa fa-fw fa-user"></i> Profil</a>
                </li>
                <?php } else if($_SESSION['rol'] == 3){ ?>
                  <li>
                      <a href="user/profile.php"><i class="fa fa-fw fa-user"></i> Profil</a>
                  </li>
                <?php } ?>
                <li class="divider"></li>
                <li>
                    <a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
      <?php } else{ ?>
        <ul class="nav navbar-nav">
          <li>
              <a style="margin-right: 2rem; height: 5rem; font-size: 2rem; color: #9d9d9d; background-color: transparent;" href="registration.php">Sign up</a>
          </li>

       <?php } ?>
    </ul>
    </nav>

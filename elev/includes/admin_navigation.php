<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Librarie Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
            <li><a href="../index.php">Home</a></li>



                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>


            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->



            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i> Profil</a>

                    </li>
                    <li>
                        <a href="./contul_meu.php"><i class="fa fa-fw fa-wrench"></i> Contul meu</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#produse_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Contul meu <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="produse_dropdown" class="collapse">
                            <li>
                                <a href="./books.php">Vizualizare produse</a>
                            </li>
                            <li>
                                <a href="books.php?source=add_book">Adaugare produse</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="./favorite.php"><i class="fa fa-fw fa-wrench"></i> Favorite</a>
                    </li>
                    <li class="active">
                        <a href="shop_cart.php"><i class="fa fa-fw fa-file"></i>Cos de cumparaturi</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Utilizatori <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                </ul>
            </div>



            <!-- /.navbar-collapse -->
        </nav>
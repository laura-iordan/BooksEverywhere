<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->

        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome 
                        <?php echo $_SESSION['username']; ?>
                    </h1>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Produs</th>
                                <th>Numar bucati</th>
                                <th>Pret</th>
                                <th>Valoare</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query = "SELECT * FROM cos_produse";
                            $select_produse = mysqli_query($connection, $query);
                            $total_value = 0;
                        
                            while($row = mysqli_fetch_assoc($select_produse)){
                                $book  = $row['c_carte'];
                                $number  = $row['c_bucati'];
                                $price  = $row['c_pret'];
                                $value = $number * $price;
                                $total_value += $value;
                                echo "<tr>";
                                echo "<td>{$book}</td>";
                                echo "<td>{$number}</td>";
                                echo "<td>{$price}</td>";
                                echo "<td>{$value}</td>";
                                echo "<tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <h3>Total valoare: <?php echo $total_value; ?> lei</h3>
                    <div class="form-group">
                        <button>
                        <a href='shop_cart.php?submit_order'>Plaseaza comanda</a>
                        </button>
                        <!--<input class="btn btn-primary" type="submit" name="submit_order" value="Plaseaza comanda">-->
                    </div>
                    <?php 
                    if(isset($_GET['submit_order'])){ 
                        
                        $query = "DELETE FROM cos_produse";
                        $delete_query = mysqli_query($connection, $query);
                        header("Location: ../index.php");
                    }
                    ?>
                        

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>

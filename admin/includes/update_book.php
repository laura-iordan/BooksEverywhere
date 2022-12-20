<?php
    if(isset($_GET['p_id'])){
        $p_id_u = $_GET['p_id'];
    }

    $query = "SELECT * FROM donate WHERE id_carte_donata = {$p_id_u}";
    $select_carte_by_id = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_carte_by_id)){
        $carte_titlu  = $row['titlu'];
        $carte_autor  = $row['autor'];
        $carte_imagine  = $row['imagine'];
        $carte_descriere  = $row['descriere'];
        $carte_tags  = $row['tags'];
    }

    if(isset($_POST['update_book'])){
        $carte_titlu = $_POST['titlu'];
        $carte_autor = $_POST['autor'];
        $carte_imagine = $_FILES['imagine']['name'];
        $carte_imagine_tmp = $_FILES['imagine']['tmp_name'];
        $carte_descriere = $_POST['descriere'];
        $carte_tags = $_POST['tags'];

        move_uploaded_file($carte_imagine_tmp, "../images/$carte_imagine");

        /*if(empty($carte_imagine)){

            $query = "SELECT * FROM produse WHERE PRODUS_ID = {$p_id_u}";
            $selecteaza_imagine = mysqli_query($connection, $query);

            while($row = mysqli_fetch_array($selecteaza_imagine)){
                $produs_imagine = $row['produs_imagine'];
            }
        }*/

        $query = "UPDATE donate SET titlu = '{$carte_titlu}', autor = '{$carte_autor}', imagine = '{$carte_imagine}', ";
        $query .= "descriere = '{$carte_descriere}', tags = '{$carte_tags}' WHERE id_carte_donata= {$p_id_u}";
        $update_query = mysqli_query($connection, $query);
        confirmQuery($update_query);
        header("Location: books.php");
    }
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="titlu">Titlu carte</label>
        <input value="<?php echo $carte_titlu; ?>" type="text" class="form-control" name="titlu">
    </div>

    <!--<div class="form-group">
        <select name="produs_categorie" id="">
            <?php/*
                $query = "SELECT * FROM categorii";
                $select_categorii = mysqli_query($connection, $query);
                confirmQuery($select_categorii);

                while($row = mysqli_fetch_assoc($select_categorii)){
                    $cat_id  = $row['cat_id'];
                    $cat_titlu  = $row['cat_titlu'];
                    echo "<option value='{$cat_id}'>{$cat_titlu}</option>";
                }*/


            ?>
        </select>
    </div>-->

    <div class="form-group">
        <label for="autor">Autor carte</label>
        <input value="<?php echo $carte_autor; ?>" type="text" class="form-control" name="autor">
    </div>

    <div class="form-group">

        <label for="imagine">Imagine carte</label>
        <img width="100" src="../images/<?php echo $carte_imagine?>" alt="">
        <input type="file" class="form-control" name="imagine">
    </div>

    <div class="form-group">
        <label for="descriere">Descriere carte</label>
        <textarea class="form-control" name="descriere" id="" cols="30" rows="10"><?php echo $carte_descriere; ?>
        </textarea>
    </div>

    <div class="form-group">
        <label for="tags">Tags carte</label>
        <input value="<?php echo $carte_tags; ?>" type="text" class="form-control" name="tags">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_book" value="Modifica">
    </div>

</form>

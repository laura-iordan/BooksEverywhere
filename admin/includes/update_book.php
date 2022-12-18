<?php 
    if(isset($_GET['p_id'])){
        $p_id_u = $_GET['p_id'];
    }

    $query = "SELECT * FROM produse WHERE produs_id = {$p_id_u}";
    $select_produse_by_id = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_produse_by_id)){
        $produs_categorie_id  = $row['produs_categorie_id'];
        $produs_titlu  = $row['produs_titlu'];
        $produs_autor  = $row['produs_autor'];
        $produs_imagine  = $row['produs_imagine'];
        $produs_descriere  = $row['produs_descriere'];
        $produs_pret  = $row['produs_pret'];
        $produs_cantitate  = $row['produs_cantitate'];
        $produs_tags  = $row['produs_tags'];
        $produs_recenzie_count = $row['produs_recenzie_count'];
    }

    if(isset($_POST['update_book'])){
        $produs_titlu = $_POST['titlu'];
        $produs_categorie_id = $_POST['produs_categorie'];
        $produs_autor = $_POST['autor'];

        $produs_imagine = $_FILES['imagine']['name'];
        $produs_imagine_tmp = $_FILES['imagine']['tmp_name'];

        $produs_descriere = $_POST['descriere'];
        $produs_pret = $_POST['pret'];
        $produs_cantitate = $_POST['cantitate'];
        $produs_tags = $_POST['tags']; 

        move_uploaded_file($produs_imagine_tmp, "../images/$produs_imagine");

        if(empty($produs_imagine)){

            $query = "SELECT * FROM produse WHERE PRODUS_ID = {$p_id_u}";
            $selecteaza_imagine = mysqli_query($connection, $query);

            while($row = mysqli_fetch_array($selecteaza_imagine)){
                $produs_imagine = $row['produs_imagine'];
            }
        }

        $query = "UPDATE produse SET produs_titlu = '{$produs_titlu}',  produs_categorie_id = '{$produs_categorie_id}', ";
        $query .= "produs_autor = '{$produs_autor}', produs_imagine = '{$produs_imagine}',  produs_descriere = '{$produs_descriere}', ";
        $query .= "produs_pret = '{$produs_pret}', produs_cantitate = '{$produs_cantitate}',  produs_tags = '{$produs_tags}' WHERE produs_id = {$p_id_u}";
        $update_query = mysqli_query($connection, $query);
        confirmQuery($update_query);
        header("Location: books.php");
    }
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="titlu">Titlu carte</label>
        <input value="<?php echo $produs_titlu; ?>" type="text" class="form-control" name="titlu">
    </div>

    <div class="form-group">
        <select name="produs_categorie" id="">
            <?php 
                $query = "SELECT * FROM categorii";
                $select_categorii = mysqli_query($connection, $query);
                confirmQuery($select_categorii);
            
                while($row = mysqli_fetch_assoc($select_categorii)){
                    $cat_id  = $row['cat_id'];
                    $cat_titlu  = $row['cat_titlu'];
                    echo "<option value='{$cat_id}'>{$cat_titlu}</option>";
                }

                
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="autor">Autor carte</label>
        <input value="<?php echo $produs_autor; ?>" type="text" class="form-control" name="autor">
    </div>

    <div class="form-group">
        
        <label for="imagine">Imagine carte</label>
        <img width="100" src="../images/<?php echo $produs_imagine?>" alt="">
        <input type="file" class="form-control" name="imagine">
    </div>

    <div class="form-group">
        <label for="descriere">Descriere carte</label>
        <textarea class="form-control" name="descriere" id="" cols="30" rows="10"><?php echo $produs_descriere; ?>
        </textarea>
    </div>

    <div class="form-group">
        <label for="pret">Pret carte</label>
        <input value="<?php echo $produs_pret; ?>" type="text" class="form-control" name="pret">
    </div>

    <div class="form-group">
        <label for="cantitate">Cantitate</label>
        <input value="<?php echo $produs_cantitate; ?>" type="text" class="form-control" name="cantitate">
    </div>

    <div class="form-group">
        <label for="tags">Tags carte</label>
        <input value="<?php echo $produs_tags; ?>" type="text" class="form-control" name="tags">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_book" value="Modifica">
    </div>

</form>
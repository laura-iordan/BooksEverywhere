<?php 

if(isset($_POST['add_book'])){
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

    $query = "INSERT INTO produse(produs_categorie_id, produs_titlu, produs_autor, produs_imagine, produs_descriere, produs_pret, produs_cantitate, produs_tags) ";
    $query .= "VALUE({$produs_categorie_id}, '{$produs_titlu}', '{$produs_autor}', '{$produs_imagine}', '{$produs_descriere}', {$produs_pret}, {$produs_cantitate}, '{$produs_tags}') ";

    $add_book_query = mysqli_query($connection, $query);

    confirmQuery($add_book_query);

    header("Location: books.php");


}

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="titlu">Titlu carte</label>
        <input type="text" class="form-control" name="titlu">
    </div>

    <div class="form-group">
        <label for="autor">Autor carte</label>
        <input type="text" class="form-control" name="autor">
    </div>

    <div class="form-group">
        <label for="id_categorie">Id categorie carte</label>
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
        <label for="imagine">Imagine carte</label>
        <input type="file" class="form-control" name="imagine">
    </div>

    <div class="form-group">
        <label for="descriere">Descriere carte</label>
        <textarea class="form-control" name="descriere" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <label for="pret">Pret carte</label>
        <input type="text" class="form-control" name="pret">
    </div>

    <div class="form-group">
        <label for="cantitate">Cantitate</label>
        <input type="text" class="form-control" name="cantitate">
    </div>

    <div class="form-group">
        <label for="tags">Tags carte</label>
        <input type="text" class="form-control" name="tags">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_book" value="Adauga carte">
    </div>

</form>
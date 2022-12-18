<form action="" method="post">
    <div class="form-group">
        <label for="cat-titlu">Editeaza categorie</label>

        <?php 
            if(isset($_GET['edit'])){
                $cat_id = $_GET['edit'];
            
                $query = "SELECT * FROM categorii WHERE cat_id = {$cat_id} ";
                $select_categorii_id = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_categorii_id)){
                    $cat_id = $row['cat_id'];
                    $cat_titlu = $row['cat_titlu'];
        ?>

        <input value = "<?php if(isset($cat_titlu)){echo $cat_titlu;} ?>" class="form-control" type="text" name="cat_titlu">
        
        <?php }} ?>

        <?php 
            if(isset($_POST['update_categorie'])){
                $cat_titlu_u = $_POST['cat_titlu']; 
                $query = "UPDATE categorii SET cat_titlu = '{$cat_titlu_u}' WHERE cat_id = {$cat_id}";
                $update_query = mysqli_query($connection, $query);
                confirmQuery($update_query);
                header("Location: categories.php");
            }
        ?>



        
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_categorie" value="Editeaza categorie">
    </div>
</form>
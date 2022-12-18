<?php 

function confirmQuery($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED". mysqli_error($connection));
    }
}

function insertCategorii(){
    global $connection;
    if(isset($_POST['submit'])){
        $cat_titlu = $_POST['cat_titlu'];
        if($cat_titlu == "" || empty($cat_titlu)){
            echo "Campul nu trebuie sa fie gol.";
        } else{
            $query = "INSERT INTO categorii(cat_titlu) ";
            $query .= "VALUE('{$cat_titlu}') ";

            $create_categorie_query = mysqli_query($connection, $query);

            if(!$create_categorie_query){
                die("QUERY FAILED". mysqli_error($connection));
            }
        }
    }
}

function findAllCategorii(){
    global $connection;
    $query = "SELECT * FROM categorii";
    $select_categorii = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_categorii)){
        $cat_id  = $row['cat_id'];
        $cat_titlu  = $row['cat_titlu'];
        echo "<tr><td>{$cat_id}</td>";
        echo "<td>{$cat_titlu}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Sterge</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Editeaza</a></td><tr>";
    }
}

function deleteCategorii(){
    global $connection;
    if(isset($_GET['delete'])){
        $cat_id_s = $_GET['delete']; 
        $query = "DELETE FROM categorii WHERE cat_id = {$cat_id_s} ";
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
}

?>
<?php

if(isset($_POST['add_book'])){
    $carte_titlu = $_POST['titlu'];
    $carte_autor = $_POST['autor'];

    $carte_imagine = $_FILES['imagine']['name'];
    $carte_imagine_tmp = $_FILES['imagine']['tmp_name'];

    $carte_descriere = $_POST['descriere'];
    $carte_tags = $_POST['tags'];

    move_uploaded_file($carte_imagine_tmp, "../images/$carte_imagine");
    $user_id = $_SESSION['id'];
    $query = "INSERT INTO donate(id_user, titlu, autor, imagine, descriere, tags) ";
    $query .= "VALUE({$user_id}, '{$carte_titlu}', '{$carte_autor}', '{$carte_imagine}', '{$carte_descriere}', '{$carte_tags}') ";

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
        <label for="imagine">Imagine carte</label>
        <input type="file" class="form-control" name="imagine">
    </div>

    <div class="form-group">
        <label for="descriere">Descriere carte</label>
        <textarea class="form-control" name="descriere" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <label for="tags">Tags carte</label>
        <input type="text" class="form-control" name="tags">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_book" value="Adauga carte">
    </div>

</form>

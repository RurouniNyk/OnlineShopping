<?php 

    include 'dbconnect.php';; 

    $id=$_POST['id'];
    $name=$_POST['name'];
    $fullpath=$_POST['oldphoto'];
    $photo=$_FILES['photo'];

    if($photo['size']>0){
        $basepath="img/category/";
        $fullpath=$basepath.$photo['name'];
        move_uploaded_file($photo['tmp_name'], $fullpath);
    }

    $sql = "UPDATE categories SET name=:item_name, logo=:item_photo WHERE categories.id=:item_id";
    $stmit= $pdo->prepare($sql); 
    $stmit->bindParam('item_id', $id);
    $stmit->bindParam(':item_name', $name);
    $stmit->bindParam(':item_photo', $fullpath);
    $stmit->execute();
    
    header("location:categories_list.php");
?>
<?php 

    include 'dbconnect.php';; 

    $id=$_POST['id'];
    $name=$_POST['name'];
    $fullpath=$_POST['oldphoto'];
    $photo=$_FILES['photo'];

    if($photo['size']>0){
        $basepath="img/brands/";
        $fullpath=$basepath.$photo['name'];
        move_uploaded_file($photo['tmp_name'], $fullpath);
    }

    $sql = "UPDATE brands SET name=:item_name, photo=:item_photo WHERE brands.id=:item_id";
    $stmit= $pdo->prepare($sql); 
    $stmit->bindParam('item_id', $id);
    $stmit->bindParam(':item_name', $name);
    $stmit->bindParam(':item_photo', $fullpath);
    $stmit->execute();
    
    header("location:brand_list.php");
?>
<?php
    include 'dbconnect.php';

    $name=$_POST['name'];
    $photo=$_FILES['logo'];



    $basepath="img/category/";
    $fullpath=$basepath.$photo['name'];
    move_uploaded_file($photo['tmp_name'], $fullpath);

    $sql="INSERT INTO categories (name, logo)
    VALUES(:item_name,:item_photo)";
    $stmit = $pdo->prepare($sql);
    $stmit->bindParam(':item_name',$name);
    $stmit->bindParam(':item_photo',$fullpath);

    $stmit->execute();

    if($stmit->rowCount()){
        header("location:categories_list.php");
    }else{
        echo "error";
    }
?>
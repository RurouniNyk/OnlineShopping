<?php
    include 'dbconnect.php';

    $name=$_POST['name'];
    $photo=$_FILES['photo'];



    $basepath="img/brands/";
    $fullpath=$basepath.$photo['name'];
    move_uploaded_file($photo['tmp_name'], $fullpath);

    $sql="INSERT INTO brands (name, photo)
    VALUES(:item_name,:item_photo)";
    $stmit = $pdo->prepare($sql);
    $stmit->bindParam(':item_name',$name);
    $stmit->bindParam(':item_photo',$fullpath);

    $stmit->execute();

    if($stmit->rowCount()){
        header("location:brand_list.php");
    }else{
        echo "error";
    }
?>
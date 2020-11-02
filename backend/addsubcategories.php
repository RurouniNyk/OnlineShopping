<?php
    include 'dbconnect.php';

    $name=$_POST['name'];
    $category_id=$_POST['category_id'];


    $sql="INSERT INTO subcategories (name, category_id)
    VALUES(:item_name,:item_category_id)";
    $stmit = $pdo->prepare($sql);
    $stmit->bindParam(':item_name',$name);
    $stmit->bindParam(':item_category_id',$category_id);

    $stmit->execute();

    if($stmit->rowCount()){
        header("location:subcategories_list.php");
    }else{
        echo "error";
    }
?>